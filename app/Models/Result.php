<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    protected $fillable = ['student_id', 'exam_id', 'marks_obtained', 'grade'];
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function exams()
    {
        return $this->belongsTo(Exam::class);
    }

}
