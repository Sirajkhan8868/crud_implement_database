<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model
{
    use HasFactory;

    protected $fillable = ['class_name', 'section', 'teacher_id'];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
    public function students()
    {
        return $this->hasMany(Student::class);
    }
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
