@extends('./Layout/isCompany')

@section('content')
<div>
    <div class="pt-[100px] pb-[100px] h-auto flex bg-[#0081C9] justify-center items-center">
        <div class="wrapper w-auto h-auto bg-[#ffff] p-10 rounded-2xl drop-shadow-2xl">
            <h1 class="text-[#0081C9] mb-[15px] text-center text-[40px] font-bold">Edit Lowongan</h1>
            <form class="flex justify-center flex-col " enctype="multipart/form-data" method="POST" action={{ route('edit') }}>
                @csrf
                <label class="mb-[5px]" for="">Judul Pekerjaan</label>
                <input class="sm:w-[700px] h-[35px] rounded-md p-1 drop-shadow-md" type="text" name="title" placeholder="Judul Pekerjaan "value="{{$job->title}}">
                @if ($errors->has('title'))
                <span class="bg-[#FFB4B4] text-[#ffffff] rounded-md text-center w-[300px] mt-1">{{ $errors->first('title') }}</span>
                @endif

                <label class="mb-[5px]" for="">Nama Perusahaan</label>
                <input class="sm:w-[700px] h-[35px] rounded-md p-1  drop-shadow-md" type="text" name="nama_perusahaan" placeholder="Nama Perusahaan"value="{{$job->nama_perusahaan}}">
                @if ($errors->has('nama_perusahaan'))
                <span class="bg-[#FFB4B4] text-[#ffffff] text-center rounded-md w-[300px] mt-1">{{ $errors->first('nama_perusahaan') }}</span>
                @endif

                <label class="mb-[5px]" for="">Web Perusahaan</label>
                <input class="sm:w-[700px] h-[35px] rounded-md p-1  drop-shadow-md" type="text" name="web_perusahaan" placeholder="Web Perusahaan"value="{{$job->web_perusahaan}}">
                @if ($errors->has('web_perusahaan'))
                <span class="bg-[#FFB4B4] text-[#ffffff] text-center rounded-md w-[300px] mt-1">{{ $errors->first('web_perusahaan') }}</span>
                @endif

                <label class="mb-[5px]" for="">Alamat Perusahaan</label>
                <input class="sm:w-[700px] h-[35px] rounded-md p-1 drop-shadow-md" type="text" name="lokasi" placeholder="Alamat Perusahaan"value="{{$job->lokasi}}">
                @if ($errors->has('lokasi'))
                <span class="bg-[#FFB4B4] text-[#ffffff] text-center rounded-md w-[300px] mt-1">{{ $errors->first('lokasi') }}</span>
                @endif

                <label class="mb-[5px]" for="">Gaji</label>
                <input class="sm:w-[700px] h-[35px] rounded-md p-1 drop-shadow-md" type="text" name="gaji" placeholder="Gaji" value="{{$job->gaji}}">
                @if ($errors->has('gaji'))
                <span class="bg-[#FFB4B4] text-[#ffffff] text-center rounded-md w-[300px] mt-1">{{ $errors->first('gaji') }}</span>
                @endif

                <label class="mb-[5px]" for="">Logo Perusahaan</label>
                <input class="m-[5px] p-[5px] rounded-lg drop-shadow-xl" type="file" placeholder="image" name="image">
                @if ($errors->has('image'))
                <span class="bg-[#FFB4B4] text-[#ffffff] text-center rounded-md w-[300px] mt-1">{{ $errors->first('image') }}</span>
                @endif
               
                <label class="mb-[5px]" for="">Deskripsi Pekerjaan & Kriteria Lengkap</label>
                <textarea class="sm:w-[700px]  rounded-md p-1 drop-shadow-md h-[100px]" type="text" name="full_description" placeholder="Deskripsi pekerjaan & kriteria" >{{$job->full_description}}</textarea>
                @if ($errors->has('full_description'))
                <span class="bg-[#FFB4B4] text-[#ffffff] text-center rounded- w-[300px] mt-1">{{ $errors->first('full_description') }}</span>
                @endif
                
                <input type="hidden" name="user_id" value="{{$user->id}}" >
                <input type="hidden" name="id" value="{{$job->id}}" >
                <input type="hidden" name="jenis" value="{{$job->jenis}}">
                @if ($errors->has('jenis'))
                <span class="bg-[#FFB4B4] text-white text-center rounded-md w-[300px] mt-1">{{ $errors->first('jenis') }}</span>
                @endif
                
                <span class="bg-[#FFB4B4] text-[#ffffff] text-center rounded-md w-[300px] mt-1">{{session()->get('error')}}</span>
                <span class="bg-[#b4ffc7] text-[#ffffff] text-center rounded-md w-[300px] mt-1">{{session()->get('msg')}}</span>
                
                
                <button class=" bg-blue-700 h-fit w-[200px] py-[10px] text-[#eaeaea] text-[18px] rounded-lg items-self-center" type="submit">Edit Lowongan</button>
            </form>
            
        </div>
    </div>
    
      
@endsection