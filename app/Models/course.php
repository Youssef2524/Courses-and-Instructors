<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'start_date'];

    public function instructors()
    {
        return $this->belongsToMany(Instructor::class);
    }
}
