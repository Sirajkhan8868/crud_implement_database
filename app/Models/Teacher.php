<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'email', 'address', 'contact', 'hire_date', 'department_id'];

    public function StudentClass()
    {
        return $this->hasMany(Student::class);
    }
    public function courses()
    {
        return $this->hasMany(Course::class);
    }

}
