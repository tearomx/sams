<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    // กำหนดชื่อ Table หากไม่ตรงตาม convention
    protected $table = 'students';

    // ฟิลด์ที่สามารถทำการ Mass Assignment ได้
    protected $fillable = [
        'prefix',
        'number',
        'first_name',
        'last_name',
        'grade',
        'room',
    ];
}
