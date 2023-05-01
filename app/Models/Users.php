<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $fillable=['username','user_image','password','email','telp','fullname','role'];
    use HasFactory;

    public function job_lists()
    {
        return $this->hasMany(job_lists::class);
    }
}
