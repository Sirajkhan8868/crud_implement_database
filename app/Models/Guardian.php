<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    use HasFactory;
    protected $fillable = ['first_name', 'last_name', 'email', 'password', 'address'];

    public function Student()
    {
        return $this->hasMany(Student::class, 'parent_id');
    }
}
