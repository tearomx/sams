<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQueuesTable extends Migration
{
    public function up()
    {
        Schema::create('queues', function (Blueprint $table) {
            $table->id();
            $table->string('student_id'); // ID ของนักเรียน
            $table->string('leave_type'); // ประเภทการลา
            $table->string('grade');     // สาเหตุ
            $table->string('room');      // ห้อง
            $table->timestamp('leave_date'); // วันที่ลา
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('queues');
    }
}
