@extends('/Layout/isGuest')

@section('content')
<div class=" pt-[100px] h-screen flex bg-[#0081C9] justify-center items-center">
    <div class="wrapper w-auto h-auto bg-[#ffff] p-10 rounded-2xl drop-shadow-2xl">
        <h1 class="text-[#0081C9] mb-[15px] text-center text-[40px] font-bold">Sobat Loker</h1>
        <form class="flex justify-center flex-col " method="POST" action={{ route('login_action') }}>
            @csrf
            <label class="mb-[5px]" for="">Username</label>
            <input class="w-[300px] h-[35px] rounded-lg p-1 drop-shadow-md" type="text" name="username" placeholder="username">
            <label class="mb-[5px] mt-[15px]" for="">Password</label>
            <input class="w-[300px] h-[35px] mb-[15px] p-1 rounded-lg drop-shadow-md" type="password" name ="password"placeholder="password">

            <span class="bg-[#FFB4B4] text-white text-center rounded-md w-[300px] mt-1">{{session()->get('error')}}</span>
            <span class="bg-[#b4ffc7] text-white text-center rounded-md w-[300px] mt-1">{{session()->get('msg')}}</span>
            <p class=" m-[10px]">Belum punya akun? <a class="text-[#0081C9] hover:text-[#165577]" href={{route('register_form')}}> Daftar</a></p>
            <button class=" bg-blue-700 h-fit w-[200px] py-[10px] text-[#eaeaea] text-[18px] rounded-lg items-self-center" type="submit">Login</button>
        </form>
        
    </div>
</div>
<div>
</div>
    
@endsection