<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title',
        'requirements',
        'pass_mark',
        'years_of_exp',
        'skills',
        'bachelor_degree',
        'certification',
        'job_description',
    ];
}
