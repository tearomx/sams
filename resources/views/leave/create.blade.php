<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Form</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-md rounded-lg p-8 w-full max-w-md">
        <h1 class="text-3xl font-bold text-center text-blue-400/60 drop-shadow-md hover:text-blue-500/70 duration-200 mb-6">ระบบลา</h1>

        <form method="POST" action="{{ route('leave.submit') }}">
            @csrf

            <!-- Success message -->
            @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 rounded-md">
                <p class="text-green-700">{{ session('success') }}</p>
            </div>
            @endif

            <!-- Error message -->
            @if(session('error'))
            <div class="mb-4 p-4 bg-red-100 rounded-md">
                <p class="text-red-700">{{ session('error') }}</p>
            </div>
            @endif

            <!-- Select ชื่อ -->
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-semibold mb-2">ชื่อ:</label>
                <select id="name" name="name" class="mt-1 block w-full bg-blue-50 border border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 p-2 text-gray-800 appearance-none">
                    <option value="">เลือกชื่อ</option>
                    @foreach($students as $student)
                    <option value="{{ $student->id }}">{{ $student->number . '.' . $student->prefix . ' ' . $student->first_name . ' ' . $student->last_name }}</option>
                    @endforeach
                </select>
                @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Select ประเภทการลา -->
            <div class="mb-4">
                <label for="leave-type" class="block text-gray-700 font-semibold mb-2">ประเภทการลา:</label>
                <select id="leave-type" name="leave_type" class="mt-1 block w-full bg-blue-50 border border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 p-2 text-gray-800 appearance-none">
                    <option value="">เลือกประเภทการลา</option>
                    <option value="sick">ลาป่วย</option>
                    <option value="personal">ลากิจ</option>
                </select>
                @error('leave_type')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" class="w-full text-blue-400/60 drop-shadow-md hover:text-blue-500 bg-blue-200/30 rounded-md px-4 py-2 transition duration-150">ส่ง</button>
            </div>
        </form>

        @if(isset($submittedData))
        <div class="mt-4 p-4 bg-green-100 rounded-md">
            <h2 class="font-semibold text-green-700">ข้อมูลที่ส่ง:</h2>
            <ul class="list-disc ml-5 mt-2">
                @foreach($submittedData as $key => $value)
                @if($key !== '_token') <!-- Skip the _token -->
                <li><strong>{{ $key }}:</strong> {{ $value }}</li>
                @endif
                @endforeach
            </ul>
        </div>
        @endif

    </div>
</body>

</html>