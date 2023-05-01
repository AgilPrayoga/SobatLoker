<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recruitment extends Model
{
    protected $fillable=['job_id','logo','jenis','user_id','applicant_id','fullname','image_user','email','notelp','jobtitle','cv'];
    use HasFactory;
}
