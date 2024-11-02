<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('prefix');     // คำนำหน้า
            $table->string('number');       // ห้อง
            $table->string('first_name'); // ชื่อ
            $table->string('last_name');  // นามสกุล
            $table->string('grade');      // ชั้น
            $table->string('room');       // ห้อง
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('students');
    }
}
