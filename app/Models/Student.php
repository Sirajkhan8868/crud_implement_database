<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['first_name', 'last_name', 'date_of_birth', 'gender', 'address', 'contact', 'guardian_id', 'student_class_id', 'enrollment_date'];
    public function guardian()
    {
        return $this->belongsTo(Guardian::class);
    }
    public function studentClass()
    {
        return $this->belongsTo(StudentClass::class);
    }
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function results()
    {
        return $this->hasMany(Result::class);
    }
    public function fees()
    {
        return $this->hasMany(Fee::class);
    }
    public function libraries()
    {
        return $this->hasMany(Library::class);
    }
}
