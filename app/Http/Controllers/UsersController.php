<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Http\Controllers\Controller;
use App\Models\job_lists;
use App\Models\recruitment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class UsersController extends Controller
{
    public function home_user(){
        $users= Users::where('cpytoken',Session::get('cpytoken'))->first();
        if(Session::has('token')){
            return view('/IsLogin/home',[
                'user'=>$users
            ]);
        }else
        {
            return redirect()->back()->with('error','Login terlebih dahulu!');
        }
        
    }
    public function joblists_user(){
        if(Session::has('token')){
            $users= Users::where('token',Session::get('token'))->first();
            $joblist=job_lists::get();
            
            return view('/IsLogin/joblists',[
                'user'=>$users,
                'job' =>$joblist,
                
                
            ]);
        }else
        {
            return redirect()->back()->with('error','Login terlebih dahulu!');
        }
    }
    
    public function login_form()
    {
        return view('login');
    }
    public function login_action(Request $request)
    {
        
        //validasi login
        $users = Users::where('username',$request->username)->first();
        if($users == null){
            return redirect()->back()->with('error','username/password salah!');
        }
        
        $db_password=$users->password;
        $hashed_password =Hash::check($request->password,$db_password);
        
        
        if ($hashed_password){
            //membuat token random 
            if($users->role=="perusahaan")
            {
                
                $users->cpytoken =Str::random(23);
                $users->save();
                $request->session()->put('token',$users->token);
                $request->session()->put('cpytoken',$users->cpytoken);
                $request->session()->put('id',$users->id);
                return to_route('corporation_index');
            }else
            {
                
                $users->token =Str::random(20);
                $users->save();
                $request->session()->put('id',$users->id);
                $request->session()->put('token',$users->token);
                return to_route('joblists_user');
            }
            
            //menaruh token dari database ke session
            
            
            //->dashboard
        }else{
            return redirect()->back()->with('error','Username atau password tidak di temukan!');
        }
        
    }
    
    
    public function dashboard_index($id)
    {
        $idsession= Session::get('id');
        $idauth=strval($idsession);
        
        
        
        if(Session::has('cpytoken')){
            if($idauth !== $id)
            {
                return abort(404);
                
            }else
            {
                
                $users= Users::where('cpytoken',Session::get('cpytoken'))->first();
                $job_lists = job_lists::with('users')->where('user_id',$id)-> get();
                return view('Dashboard/index',[
                    "user"=>$users,
                    "job_lists"=>$job_lists
                    
                    
                    
                ]);
            }
            
            
            
        }else
        {
            return to_route('login_form')->with('msg','Login sebagai perusahaan!!');
        }
        
    }
    public function logout(Request $request)
    {
        Users::where('token',$request->token)->update([
            'token'=>null,
            'cpytoken'=>null
        ]);
        session()->pull('cpytoken','token');
        session()->pull('id');
        
        
        return to_route('login_form')->with('msg','anda telah logout');
        
    }
    
    public function register_form()
    {
        return view('register');
        
        
    }
    public function register_action(Request $request)
    {
        $request->validate([
            'username'=>['required','unique:Users','max : 30'],
            'fullname'=>['required'],
            'email'=>['required','email'],
            'telp'=>['required','numeric','min:11'],
            'role'=>['required'],
            'token'=>['nullable'],
            'cptoken'=>['nullable'],
            'password'=>['required','confirmed'],
            'password_confirmation'=>['required',]
        ]);
        
        
        $created = Users::create([
            "username"=>$request->username,
            "fullname"=>$request->fullname,
            "email"=>$request->email,
            "role"=>$request->role,
            "telp"=>$request->telp,
            "user_image"=>"profilepicture\pp.png",
            "password"=>bcrypt($request->password),
            
            
        ]);
        if($created){
            return to_route('login_form')->with('msg','akun berhasil di buat.');
        }
        else{
            return view('register_form')->with('msg','akun gagal di buat.!!');
        }
        
        
    }
    
    public function dashboard(){
        return view('layout/isCompany');
    }
    
    public function detail($id){
        
        if(Session::has('token')){
            $job = job_lists::find($id);
            $detail=$job->full_description;
            $users= Users::where('token',Session::get('token'))->first();
            if($users === null){
                return to_route('login_form')->with('msg','login terlebih dahulu!!');
            }else{
                
                return view('detail',[
                    "job"=>$job,
                    "user"=>$users,
                    "full"=>$detail
                ]);}
                
            }else{
                return to_route('login_form')->with('msg','login terlebih dahulu!');
            }
        }
        
        public function profile($id){
            $idsession = Session::get('id');
            $idauth=strval($idsession);
            $user=Users::find($id);
            
            if(Session::has('token')){
                
                if($idauth === $id ){
                    return view('/IsLogin/profile',[
                        "user"=>$user
                    ]);
                }else
                {
                    return to_route('login_form')->with('msg','anda tidak memiliki akses!');
                }
                
            }else{
                return to_route('login_form')->with('msg','Login Terlebih Dahulu!!');
            }
            
            
        }
        public function edit_profile(Request $request){
            
            $edited=$request->validate([
                'id'=>['required'],
                'username'=>['required'],
                'fullname'=>['required'],
                'email'=>['required'],
                'telp'=>['required'],
                'user_image'=>['nullable','file','image'],
                
            ]);
            
            if ($request->user_image == null){
                
                $edit= Users::where('id',$request->id)->update($edited);
                
                
            }
            else{
                
                $edited['user_image']=$request->file('user_image')->store('profilepicture');
                $edit= Users::where('id',$request->id)->update($edited);
            }
            
            
            
            
            
            if($edit){
                return redirect()->back()->with('msg','lowongan berhasil di edit!.');
            }
            else{
                return redirect()->back()->with('msg','lowongan gagal di edit!.');
            }
        }
        public function myjob($id){
            $idsession = Session::get('id');
            $idauth=strval($idsession);
            $recruitment=recruitment::where('applicant_id',$id)->get();
            $users= Users::where('token',Session::get('token'))->first();
            if(Session::has('token')){
                
                if($idauth === $id ){
                    return view('/IsLogin/myjob',[
                        "recruitment"=>$recruitment,
                        "user"=>$users
                    ]);
                }else
                {
                    return to_route('login_form')->with('msg','anda tidak memiliki akses!');
                }
                
            }else{
                return to_route('login_form')->with('msg','Login Terlebih Dahulu!!');
            }
            
            
        }
        
        
    }
    