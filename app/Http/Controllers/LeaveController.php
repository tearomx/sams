<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Queue;

class LeaveController extends Controller
{
    public function create()
    {
        $students = Student::all();
        return view('leave.create', compact('students'));
    }

    public function submit(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|exists:students,id',
            'leave_type' => 'required',
        ], [
            'name.required' => 'กรุณาเลือกนักเรียน',
            'name.exists' => 'นักเรียนที่เลือกไม่ถูกต้อง',
            'leave_type.required' => 'กรุณาระบุประเภทการลา',
        ]);


        // ดึงข้อมูลนักเรียนที่เลือก
        $studentData = Student::find($request->name);

        // Get current time in Thailand timezone
        date_default_timezone_set('Asia/Bangkok');
        $currentTime = now();

        // Check if current time is within the allowed range
        if ($currentTime->format('H') < 6 || $currentTime->format('H') > 16) {
            return redirect()->back()->with('error', 'คุณสามารถลาได้ตั้งแต่เวลา 06:00 ถึง 16:00 เท่านั้น');
        }

        // Check if the student has already taken leave today
        $existingLeave = Queue::where('student_id', $studentData->id)
            ->whereDate('leave_date', $currentTime->toDateString())
            ->first();

        if ($existingLeave) {
            return redirect()->back()->with('error', 'คุณได้ลาในวันนี้แล้ว');
        }

        // Create new leave record
        Queue::create([
            'student_id' => $studentData->id,
            'leave_type' => $request->leave_type,
            'grade' => $studentData->grade, // ใช้ข้อมูลจากนักเรียน
            'room' => $studentData->room,     // ใช้ข้อมูลจากนักเรียน
            'leave_date' => $currentTime,
        ]);

        // Set flash message
        return redirect()->back()->with('success', 'ส่งข้อมูลสำเร็จ');
    }
}
