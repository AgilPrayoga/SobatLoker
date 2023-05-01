<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\job_lists;
use App\Models\Users;
use Illuminate\Http\Request;

class OuterController extends Controller
{
    public function index(){
        return view('home');
    }

    public function joblists()
    {
        $joblist=job_lists::get();
        return view('joblists',[
            'job' =>$joblist,
            
            
        ]);
    }
}
