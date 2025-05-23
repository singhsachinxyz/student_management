<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'class_teacher_id');
    }
}
