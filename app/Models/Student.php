<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['first_name', 'last_name', 'date_of_birth', 'gender', 'address', 'contact', 'parent_id', 'student_class_id'];
    public function guardian()
    {
       return $this->belongsTo(Guardian::class, 'parent_id');
    }
    public function studentClass()
    {
       return $this->hasMany(StudentClass::class,);
    }
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
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
