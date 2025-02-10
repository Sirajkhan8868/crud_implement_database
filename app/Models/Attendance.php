<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $fillable = ['student_id', 'student_class_id', 'date', 'status'];
    public function students()
    {
        return $this->belongsTo(Student::class);
    }
    public function studentClass()
    {
        return $this->belongsTo(StudentClass::class);;
    }
}
