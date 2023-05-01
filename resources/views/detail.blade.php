@extends('/Layout/isUser')

@section('content')

<div class=" h-auto py-[200px] flex flex-col sm:flex-row items-center justify-center ">
   <div class="h-[500px]  sm:w-[700px] p-8 sm:border-l-[1px] sm:border-y sm:border-gray-500 rounded-l-lg bg-white">
      <h3 class="text-[#0081C9]">{{$job->title}}</h3>
      <img  class="h-[60px] rounded-xl object-cover mr-[20px]" src={{ asset("storage/".$job->image) }} alt="" />
      <h5 class=" flex flex-row items-center">
         <svg class="mr-[5px]" fill="#000000" width="20px" height="20px" viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M8 2L8 6L4 6L4 48L15 48L15 39L19 39L19 48L30 48L30 6L26 6L26 2 Z M 10 10L12 10L12 12L10 12 Z M 14 10L16 10L16 12L14 12 Z M 18 10L20 10L20 12L18 12 Z M 22 10L24 10L24 12L22 12 Z M 32 14L32 18L34 18L34 20L32 20L32 22L34 22L34 24L32 24L32 26L34 26L34 28L32 28L32 30L34 30L34 32L32 32L32 34L34 34L34 36L32 36L32 38L34 38L34 40L32 40L32 42L34 42L34 44L32 44L32 48L46 48L46 14 Z M 10 15L12 15L12 19L10 19 Z M 14 15L16 15L16 19L14 19 Z M 18 15L20 15L20 19L18 19 Z M 22 15L24 15L24 19L22 19 Z M 36 18L38 18L38 20L36 20 Z M 40 18L42 18L42 20L40 20 Z M 10 21L12 21L12 25L10 25 Z M 14 21L16 21L16 25L14 25 Z M 18 21L20 21L20 25L18 25 Z M 22 21L24 21L24 25L22 25 Z M 36 22L38 22L38 24L36 24 Z M 40 22L42 22L42 24L40 24 Z M 36 26L38 26L38 28L36 28 Z M 40 26L42 26L42 28L40 28 Z M 10 27L12 27L12 31L10 31 Z M 14 27L16 27L16 31L14 31 Z M 18 27L20 27L20 31L18 31 Z M 22 27L24 27L24 31L22 31 Z M 36 30L38 30L38 32L36 32 Z M 40 30L42 30L42 32L40 32 Z M 10 33L12 33L12 37L10 37 Z M 14 33L16 33L16 37L14 37 Z M 18 33L20 33L20 37L18 37 Z M 22 33L24 33L24 37L22 37 Z M 36 34L38 34L38 36L36 36 Z M 40 34L42 34L42 36L40 36 Z M 36 38L38 38L38 40L36 40 Z M 40 38L42 38L42 40L40 40 Z M 10 39L12 39L12 44L10 44 Z M 22 39L24 39L24 44L22 44 Z M 36 42L38 42L38 44L36 44 Z M 40 42L42 42L42 44L40 44Z"/></svg>
         <a class="no-underline text-[#333]" href={{$job->web_perusahaan}}>{{$job->nama_perusahaan}}</a></h5>
         <h6 class=" flex flex-row items-center">
            <svg  width="20px" height="20px" viewBox="0 0 1024 1024" class="icon mr-[5px]"  version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M917.52 369.86L594.24 98.59l-98.62 117.52-181.15-67.54-124.33 290.24h-80.28V914h804.57V438.81h-54.78l57.87-68.95zM603.24 201.62l211.25 177.23-50.33 59.96H404.21l199.03-237.19z m-248.99 39.84l91.47 34.1-136.98 163.25h-39.01l84.52-197.35z m487.04 599.39H183.01v-328.9H841.3v328.9z" fill="#0F1F3C" /><path d="M621.68 640.96h146.29v73.14H621.68z" fill="#0F1F3C" /></svg>
            Rp.{{$job->gaji}}</h6>
            <h5 class=" flex flex-row items-center">
               <svg class="mr-[5px]" width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M12.8159 20.6077C16.8509 18.5502 20 15.1429 20 11C20 6.58172 16.4183 3 12 3C7.58172 3 4 6.58172 4 11C4 15.1429 7.14909 18.5502 11.1841 20.6077C11.6968 20.8691 12.3032 20.8691 12.8159 20.6077Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M15 11C15 12.6569 13.6569 14 12 14C10.3431 14 9 12.6569 9 11C9 9.34315 10.3431 8 12 8C13.6569 8 15 9.34315 15 11Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
               </svg>
               {{$job->lokasi}}</h5>
               <h6 class=" flex flex-row items-center">
                  <svg class="mr-[5px]" fill="#000000" width="15px" height="15px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
                     <path d="M0 16q0-3.232 1.28-6.208t3.392-5.12 5.12-3.392 6.208-1.28q3.264 0 6.24 1.28t5.088 3.392 3.392 5.12 1.28 6.208q0 3.264-1.28 6.208t-3.392 5.12-5.12 3.424-6.208 1.248-6.208-1.248-5.12-3.424-3.392-5.12-1.28-6.208zM4 16q0 3.264 1.6 6.048t4.384 4.352 6.016 1.6 6.016-1.6 4.384-4.352 1.6-6.048-1.6-6.016-4.384-4.352-6.016-1.632-6.016 1.632-4.384 4.352-1.6 6.016zM14.016 16v-5.984q0-0.832 0.576-1.408t1.408-0.608 1.408 0.608 0.608 1.408v4h4q0.8 0 1.408 0.576t0.576 1.408-0.576 1.44-1.408 0.576h-6.016q-0.832 0-1.408-0.576t-0.576-1.44z"></path>
                  </svg>
                  {{$job->jenis}}
               </h6>
               <div class="h-[200px] whitespace-pre-line overflow-y-auto " >
                  <p>{{$full}}</p>
               </div>
               
               
            </div>
            <div class=" pt-[150px] px-4 sm:border-r-[1px] sm:border-y border-gray-500 sm:rounded-r-lg bg-slate-100 h-[500px] w-[300px]">
               <form class="flex justify-end flex-col " enctype="multipart/form-data" method="POST" action={{ route('recruitment') }}>
                  @csrf
                  
                  
                  
                  <input  type="hidden" name="job_id" value="{{$job->id}}">
                  <input  type="hidden" name="user_id" value="{{$job->user_id}}">
                  <input  type="hidden" name="applicant_id" value="{{$user->id}}">
                  <input  type="hidden" name="fullname" value="{{$user->fullname}}">
                  <input  type="hidden" name="image_user" value="{{$user->user_image}}">
                  <input  type="hidden" name="jenis" value="{{$job->jenis}}">
                  <input  type="hidden" name="logo" value="{{$job->image}}">
                  <input  type="hidden" name="email" value="{{$user->email}}">
                  <input  type="hidden" name="notelp" value="{{$user->telp}}">
                  <input  type="hidden" name="jobtitle" value="{{$job->title}}">
                  
                  
                  <label class="mb-[5px]" for="">Masukan CV</label>

                  <p>
                     *Pastikan Data yang anda masukan saat registrasi benar
                  </p>
                  <input class="m-[5px] p-[5px] rounded-lg drop-shadow-xl" type="file"  name="cv">
                  @if ($errors->has('cv'))
                  <span class="bg-[#FFB4B4] text-[#ffffff] text-center rounded-md w-[250px] mt-1">{{ $errors->first('cv') }}</span>
                  @endif
                  
                  <span class="bg-[#FFB4B4] text-white text-center rounded-md w-[250px] mt-1">{{session()->get('error')}}</span>
                  <span class="bg-[#7fdc6b] text-white text-center rounded-md w-[250px] mt-1">{{session()->get('msg')}}</span>
                  
                  <button class=" bg-blue-700 h-fit w-[200px] mt-[30px] py-[10px] text-[#eaeaea] text-[18px] rounded-lg items-self-center" type="submit">Lamar Pekerjaan</button>
               </form>
               
            </div>
         </div>
         
         
         @endsection