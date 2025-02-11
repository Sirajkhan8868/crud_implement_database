<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'email', 'address', 'contact'];

    public function students()
    {
        return $this->hasMany(Student::class, 'guardian_id');
    }
}
