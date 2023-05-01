@extends('/Layout/isGuest')

@section('content')
<div class="pt-[10%] pb-4 h-auto   flex flex- bg-[#ffffff] justify-center items-center">
    <div class=" w-auto h-auto bg-[#ffff] p-10 rounded-2xl drop-shadow-2xl">
        <h1 class="text-[#0081C9] mb-[15px] text-center text-[40px] font-bold">Register</h1>
        <form class="flex justify-center flex-col " method="POST" action={{ route('register_action') }}>
            @csrf
            <div class="flex flex-col md:flex-row">
                <div class="flex flex-col">
                    <label class="mb-[5px]" for="">Username</label>
                    <input class="w-[350px] mr-[10px] h-[35px] rounded-lg p-1 drop-shadow-md" type="text" name="username" placeholder="username">
                    @if ($errors->has('username'))
                    <span class="bg-[#FFB4B4] text-white rounded-md text-center w-[300px] mt-1">{{ $errors->first('username') }}</span>
                    @endif
                </div>
                <div class="flex flex-col">
                    <label class="mb-[5px]" for="">Nama Lengkap</label>
                    <input class="w-[350px] mr-[10px] h-[35px] rounded-lg p-1  drop-shadow-md" type="text" name="fullname" placeholder="Nama Lengkap">
                    @if ($errors->has('fullname'))
                    <span class="bg-[#FFB4B4] text-white text-center rounded-md w-[300px] mt-1">{{ $errors->first('fullname') }}</span>
                    @endif
                </div>
            </div>
            <div class="flex flex-col md:flex-row">
                <div class="flex flex-col">
                    <label class="mb-[5px]" for="">E-mail</label>
                    <input class="w-[350px] mr-[10px] h-[35px] rounded-lg p-1 drop-shadow-md" type="text" name="email" placeholder="Email">
                    @if ($errors->has('email'))
                    <span class="bg-[#FFB4B4] text-white text-center rounded-md w-[300px] mt-1">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="flex flex-col">
                    <label class="mb-[5px]" for="">No-Telp</label>
                    <input class="w-[350px] mr-[10px] h-[35px] rounded-lg p-1 drop-shadow-md" type="text" name="telp" placeholder="No-Telp">
                    @if ($errors->has('telp'))
                    <span class="bg-[#FFB4B4] text-white text-center rounded-md w-[300px] mt-1">{{ $errors->first('telp') }}</span>
                    @endif
                </div>
            </div>
            <div class="flex flex-col md:flex-row">
                <div class="flex flex-col">
                    <label class="mb-[5px]" for="">Password</label>
                    <input class="w-[350px] mr-[10px] h-[35px] rounded-lg p-1 drop-shadow-md" type="password" name="password" placeholder="******">
                    @if ($errors->has('password'))
                    <span class="bg-[#FFB4B4] text-white text-center rounded-md w-[300px] mt-1">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="flex flex-col ">  
                    <label class="mb-[5px]" for="">Konfirmasi Password</label>
                    <input class="w-[350px] mr-[10px] h-[35px] mb-[15px] p-1 rounded-lg drop-shadow-md" type="password" name ="password_confirmation"placeholder="******">
                    @if ($errors->has('password_confirmation'))
                    <span class="bg-[#FFB4B4] text-white text-center rounded-md w-[300px] mt-1">{{ $errors->first('password_confirmation') }}</span>
                    @endif
                </div>
            </div>
            <label for="">Pilih Role :</label>
            <div >
                <input type="radio"name="role" value="pelamar">
                <label for="">Pelamar</label>
                <input type="radio"name="role" value="perusahaan">
                <label for="">Perusahaan</label>
            </div>
            @if ($errors->has('role'))
            <span class="bg-[#FFB4B4] text-white text-center rounded-md w-[300px] mt-1">{{ $errors->first('role') }}</span>
            @endif
            <i class="text-[10px] text-[tomato] m-[5px] text-right ">{{session()->get('error')}}</i>
            
            
            <span class="bg-[#7fdc6b] text-white text-center rounded-md w-[300px] mt-1">{{session()->get('msg')}}</span>
            
            <button class=" bg-blue-700 h-fit w-[200px] py-[10px] text-white text-[18px] rounded-lg items-self-center" type="submit">Register</button>
        </form>
        
    </div>
</div>

@endsection