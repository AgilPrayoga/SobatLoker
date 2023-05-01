@extends('layout/isCompany')

@section('content')
<div>
    <div class=" h-auto flex justify-center items-center mb-9 pt-14">
        <div class="wrapper w-auto h-auto bg-[#ffff] p-2 sm:p-8 rounded-2xl border-1 border-gray-500">
            <h1 class="text-[#0081C9] mb-[15px] text-center text-[40px] font-bold">Tambahkan Pekerjaan</h1>
            <form class="flex justify-center flex-col " enctype="multipart/form-data" method="POST" action={{ route('create') }}>
                @csrf
                <div class="flex flex-col sm:flex-row">
                    <div class="flex flex-col">
                        
                        <label class="mb-[5px]" for="">Judul Pekerjaan</label>
                        <input class="sm:w-[340px] mr-[10px] h-[35px] rounded-lg p-1 drop-shadow-md" type="text" name="title" placeholder="Judul Pekerjaan">
                        @if ($errors->has('title'))
                        <span class="bg-[#FFB4B4] text-[#ffffff] rounded-md text-center w-[300px] mt-1">{{ $errors->first('title') }}</span>
                        @endif
                    </div>
                    <div class="flex flex-col">
                        
                        <label class="mb-[5px]" for="">Nama Perusahaan</label>
                        <input class="sm:w-[350px] h-[35px] rounded-lg p-1  drop-shadow-md" type="text" name="nama_perusahaan" placeholder="Nama Perusahaan">
                        @if ($errors->has('nama_perusahaan'))
                        <span class="bg-[#FFB4B4] text-[#ffffff] text-center rounded-md w-[300px] mt-1">{{ $errors->first('nama_perusahaan') }}</span>
                        @endif
                    </div>
                </div>
                
                <div class="flex flex-col sm:flex-row">
                    <div class="flex flex-col" >
                        <label class="mb-[5px]" for="">Web Perusahaan</label>
                        <input class="sm:w-[340px] mr-[10px] h-[35px] rounded-lg p-1  drop-shadow-md" type="text" name="web_perusahaan" placeholder="Web Perusahaan">
                        @if ($errors->has('web_perusahaan'))
                        <span class="bg-[#FFB4B4] text-[#ffffff] text-center rounded-md w-[300px] mt-1">{{ $errors->first('web_perusahaan') }}</span>
                        @endif
                    </div>
                    
                    <div class="flex flex-col">
                        <label class="mb-[5px]" for="">Gaji</label>
                        <input class="sm:w-[340px] mr-[10px]  h-[35px] rounded-lg p-1 drop-shadow-md" type="text" name="gaji" placeholder="Gaji">
                        @if ($errors->has('gaji'))
                        <span class="bg-[#FFB4B4] text-[#ffffff] text-center rounded-md w-[300px] mt-1">{{ $errors->first('gaji') }}</span>
                        @endif
                    </div>
                </div>
                
                <label class="mb-[5px]" for="">Alamat Perusahaan</label>
                <input class="sm:w-[340px] sm:w-[700px] h-[35px] rounded-lg p-1 drop-shadow-md" type="text" name="lokasi" placeholder="Alamat Perusahaan">
                @if ($errors->has('lokasi'))
                <span class="bg-[#FFB4B4] text-[#ffffff] text-center rounded-md w-[300px] mt-1">{{ $errors->first('lokasi') }}</span>
                @endif
                
                
                <label class="mb-[5px]" for="">Logo Perusahaan</label>
                <input class="m-[5px] p-[5px] rounded-lg drop-shadow-xl" type="file" placeholder="image" name="image">
                @if ($errors->has('image'))
                <span class="bg-[#FFB4B4] text-[#ffffff] text-center rounded-md w-[300px] mt-1">{{ $errors->first('image') }}</span>
                @endif
                
                
                
                <label class="mb-[5px]" for="">Deskripsi Pekerjaan & Kriteria Lengkap</label>
                <textarea class="w-[] sm:w-[500px]  rounded-lg p-1 drop-shadow-md h-[100px]" type="text" name="full_description" placeholder="Deskripsi pekerjaan & kriteria"></textarea>
                @if ($errors->has('full_description'))
                <span class="bg-[#FFB4B4] text-[#ffffff] text-center rounded-md w-[300px] mt-1">{{ $errors->first('full_description') }}</span>
                @endif
                <input type="hidden" name="id" value="{{$user->id}}" >
                <span class="bg-[#FFB4B4] text-[#ffffff] text-center rounded-md w-[300px] mt-1">{{session()->get('error')}}</span>
                <span class="bg-[#b4ffc7] text-[#ffffff] text-center rounded-md w-[300px] mt-1">{{session()->get('msg')}}</span>
                
                <label >Jenis Pekerjaan :</label>
                <div class="flex flex-col sm:flex-row">
                    <div class="m-2">
                        <input type="radio"name="jenis" value="Penuh Waktu">
                        <label for="">Penuh Waktu</label>
                    </div>
                    <div class="m-2" >
                        <input type="radio"name="jenis" value="Paruh Waktu">
                        <label for="">Paruh Waktu</label>
                    </div>
                    <div class="m-2">
                        <input type="radio"name="jenis" value="Pekerja Lepas">
                        <label for="">Pekerja Lepas</label>
                    </div>
                    
                    
                    
                </div>
                @if ($errors->has('jenis'))
                <span class="bg-[#FFB4B4] text-white text-center rounded-md w-[300px] mt-1">{{ $errors->first('jenis') }}</span>
                @endif
                
                <button class=" bg-blue-700 h-fit mt-[20px] w-[200px] py-[10px] text-[#eaeaea] text-[18px] rounded-lg items-self-center" type="submit">Luncurkan Pekerjaan</button>
            </form>
            
        </div>
    </div>
    @endsection