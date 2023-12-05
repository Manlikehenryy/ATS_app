<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;
    protected $fillable = ['first_name','last_name','email','mobile_no','years_of_exp',
    'skills','status','file_path','certification','bachelor_deg','job_id','score'];

}
