<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = ['course_code', 'course_name', 'description', 'credits'];

    public function teacher()
    {
       return $this->belongsTo(Teacher::class);
    }
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
    public function exams()
    {
        return $this->hasMany(Exam::class);
    }
}
