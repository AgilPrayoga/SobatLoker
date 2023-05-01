<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\recruitment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class RecruitmentController extends Controller
{
    public function recruitment(Request $request)
    {
        $data=$request->validate([
            
            'cv'=>['required','file'],
            
            
        ]);
        
        $issubmit=recruitment::where('job_id',$request->job_id)->where('applicant_id',$request->applicant_id)->first();
        
        if($issubmit)
        {
            return redirect()->back()->with('error','Anda hanya bisa mengirim berkas 1 kali!');
            
        }
        else{
            
            $cv=$data['cv']=$request->file('cv')->store('usercv');
            $created = recruitment::create([
                "job_id"=>$request->job_id,
                "user_id"=>$request->user_id,
                "applicant_id"=>$request->applicant_id,
                "fullname"=>$request->fullname,
                "logo"=>$request->logo,
                "image_user"=>$request->image_user,
                "jenis"=>$request->jenis,
                "email"=>$request->email,
                "notelp"=>$request->notelp,
                "jobtitle"=>$request->jobtitle,
                "cv"=>$cv,
                
                
                
            ]);
            if($created){
                return redirect()->back()->with('msg','Berkas Anda telah terkirim!,Periksa Email Anda untuk mendapatkan Info dari Perusahaan');
            }
            else{
                return view('dashboard_index')->with('msg','akun gagal di buat.!!');
            }
            
            
            
            
        }
    }
    
    public function cancel(Request $request){
        $rec = recruitment::find($request->id);
        
        File::delete("storage/".$rec->cv);
        $cancel = $rec->delete();
        if($cancel)
        {
            return redirect()->back()->with('error','riwayat berhasil dihapus!!');
            
        }else
        {
            return redirect()->back()->with('error','item tidak berhasil dihapus!!');
        }
    }
}
