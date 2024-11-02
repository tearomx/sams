<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Queue extends Model
{
    protected $fillable = ['student_id', 'leave_type', 'grade', 'room', 'leave_date'];
}
