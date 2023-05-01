<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class job_lists extends Model
{
    protected $fillable=['title','jenis','nama_perusahaan','web_perusahaan','lokasi','image','user_id','gaji','description','full_description'];
    use HasFactory;

    public function users()
    {
        return $this->belongsTo(Users::class);
    }
    
}
