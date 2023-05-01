<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\job_lists;
use App\Models\recruitment;
use App\Models\Users;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use User;

class DashboardController extends Controller
{
    public function jobvacancy_list(){
        if(Session::has('cpytoken')){
            $id=Session::get('id');
            $users= Users::where('cpytoken',Session::get('cpytoken'))->first();
            $job_lists = job_lists::with('users')->where('user_id',$id)-> get();
            return view('/Dashboard/jobvacancy',[
                "user"=>$users,
                "job_lists"=>$job_lists
                
                
                
            ]);
        }
        else{
            return to_route('login_form')->with('msg','Login sebagai perusahaan!!');
        }
        
        
    }
    public function corporation_index(){
        if(Session::has('cpytoken')){
            $users= Users::where('cpytoken',Session::get('cpytoken'))->first();
            return view('/Dashboard/corporationPage',[
                "user"=>$users,
                
                
                
            ]);
        }
        else{
            return to_route('login_form')->with('msg','Login sebagai perusahaan!!');
        }
        
        
    }
    
    
    
    
    //Create Function
    public function create_form($id){
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
                return view('Dashboard/create',[
                    "user"=>$users,
                    "job_lists"=>$job_lists
                    
                    
                    
                ]);
            }
            
            
            
        }else
        {
            return to_route('login_form')->with('msg','Login sebagai perusahaan!!');
        }
    }
    
    public function create(Request $request){
        
        $datajob=$request->validate([
            'title'=>['required'],
            'nama_perusahaan'=>['required'],
            'web_perusahaan'=>['nullable'],
            'lokasi'=>['required'],
            'gaji'=>['required'],
            'image'=>['required','file','image'],
            'jenis'=>['required'],
            
            'full_description'=>['required']
            
        ]);
        $image=$datajob['image']=$request->file('image')->store('images');
        $created = job_lists::create([
            "title"=>$request->title,
            "nama_perusahaan"=>$request->nama_perusahaan,
            "web_perusahaan"=>$request->web_perusahaan,
            "lokasi"=>$request->lokasi,
            "gaji"=>$request->gaji,
            "jenis"=>$request->jenis,
            "full_description"=>str_replace(array("/r/n"), "<br/>",$request->full_description),
            "user_id"=>$request->id,
            "image"=>$image
            
            
            
        ]);
        $created->save();
        if($created){
            return redirect()->back()->with('msg','pekerjaan berhasil di publikasikan!.');
        }
        else{
            return view('dashboard_index')->with('msg','akun gagal di buat.!!');
        }
        
        
    }
    
    
    
    //Delete Function
    public function delete(Request $request)
    {   
        $job=job_lists::find($request->id);
        
        File::delete("storage/".$job->image);

        $delete_job = $job->delete();

        recruitment::where('job_id',$request->id)->delete();
        
        if($delete_job)
        {
            return redirect()->back()->with('msg','item berhasil dihapus!!');
            
        }else
        {
            return redirect()->back()->with('msg','item tidak berhasil dihapus!!');
        }
        
        
    }
    
    
    
    //Edit Function
    public function edit_form(Request $request){
        if(Session::get('cpytoken') == null){
            return to_route('login')->with('error','Login terlebih dahulu!!');
        }
        $cpyuser= Users::where('cpytoken',Session::get('cpytoken'))->first();
        if($cpyuser){
            
            $job = job_lists::find($request->id);
            
            
            
            return view('/Dashboard/editForm',[
                "job"=>$job,
                "user"=>$cpyuser,
                
            ]);
        }
        else{
            
            
            return redirect()->back()->with('error','Login terlebih dahulu!!');
        }
    }
    public function edit(Request $request){
        
        $edited=$request->validate([
            'title'=>['required'],
            'nama_perusahaan'=>['required'],
            'web_perusahaan'=>['nullable'],
            'lokasi'=>['required'],
            'gaji'=>['required'],
            'image'=>['nullable','file','image'],
            'jenis'=>['required'],
            'user_id'=>['required'],
            'full_description'=>['required'],
        ]);
        
        if ($request->image == null){
            
            $edit= job_lists::where('id',$request->id)->update($edited);
            
        }
        else{
            
            $edited['image']=$request->file('image')->store('images');
            $edit= job_lists::where('id',$request->id)->update($edited);
        }
        
        if($edit){
            return to_route('jobvacancy_list')->with('msg','lowongan berhasil di edit!.');
        }
        else{
            return to_route('edit_form')->with('msg','lowongan gagal di edit!.');
        }
    }
    
    
    
    
    public function dashboard_joblists(){
        
        $joblist=job_lists::get();
        $id=Session::get('id');
        $users =Users::find($id);
        
        return view('dashboard/joblists',[
            'job' =>$joblist,
            'user'=>$users
            
            
        ]);
    }
    
    public function applicant(){
        
        if(Session::has('cpytoken')){
            $id=Session::get('id');
            $users= Users::where('cpytoken',Session::get('cpytoken'))->first();
            $applicants = recruitment::where('user_id',$id)->get();
            return view('Dashboard/applicant',[
                "user"=>$users,
                "applicant"=>$applicants
                
            ]);
        }
        else{
            return to_route('login_form')->with('msg','Login sebagai perusahaan!!');
        }
        
    }
    
}