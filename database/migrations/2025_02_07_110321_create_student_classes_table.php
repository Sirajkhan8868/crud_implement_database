<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('student_classes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_id')->nullable()->constrained('teachers')->onDelete('cascade'); // Nullable Fix
            $table->string('class_name');
            $table->string('section');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('student_classes');
    }
};
