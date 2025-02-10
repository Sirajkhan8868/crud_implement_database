<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $fillable = ['course_id', 'exams_id', 'obtained_marks'];
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function results()
    {
        return $this->hasMany(Result::class);
    }
}
