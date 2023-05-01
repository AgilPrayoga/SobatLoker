@extends('/Layout/isUser')

@section('content')
<div class="pt-[15%] bg-slate-100  flex  md:flex-row flex-col  justify-center   items-center">
    
    <div class="w-[300px]  bg-white rounded-lg p-4 flex flex-col  justify-center m-4 " >
        <H1></H1>
        <div class="h-[100px] w-[100px] flex items-self-center">
            <img  class="h-[100px] rounded-full object-cover mr-[20px]" src={{ asset("storage/".$user->user_image) }} alt="" />
            
        </div>
        
        <h6>Welcome,{{$user->username}}</h6>
        
        <h6 class="flex flex-row  ">
            <svg class="mr-2" width="20px" height="20px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"><g id="Icon"><circle cx="12" cy="7" r="5.75"/><path d="M21.25,21c-0,0.966 -0.783,1.75 -1.75,1.75l-15,-0c-0.967,-0 -1.75,-0.784 -1.75,-1.75c-0,-4.28 3.47,-7.75 7.75,-7.75l3,0c4.28,0 7.75,3.47 7.75,7.75Zm-0.729,0.729c-0.013,0.005 -0.021,0.011 -0.021,0.021l0.021,-0.021Z"/></g></svg>
            {{$user->fullname}}</h6>
            
            <h6 class="flex flex-row ">
                <svg class="mr-2" width="20px" height="20px" version="1.1" id="Icons" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                viewBox="0 0 32 32" style="enable-background:new 0 0 32 32;" xml:space="preserve">
                <g>
                    <g>
                        <path d="M16,16.8l13.8-9.2C29.2,5.5,27.3,4,25,4H7C4.7,4,2.8,5.5,2.2,7.6L16,16.8z"/>
                    </g>
                    <g>
                        <path d="M16.6,18.8C16.4,18.9,16.2,19,16,19s-0.4-0.1-0.6-0.2L2,9.9V23c0,2.8,2.2,5,5,5h18c2.8,0,5-2.2,5-5V9.9L16.6,18.8z"/>
                    </g>
                </g>
            </svg>
            {{$user->email}}</h6>
            
            <h6 class="flex flex-row ">
                <svg class="mr-2" width="20px" height="20px" viewBox="0 0 18 18" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <g id="Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="Rounded" transform="translate(-749.000000, -1263.000000)">
                            <g id="Communication" transform="translate(100.000000, 1162.000000)">
                                <g id="-Round-/-Communication-/-phone" transform="translate(646.000000, 98.000000)">
                                    <g>
                                        <polygon id="Path" points="0 0 24 0 24 24 0 24"></polygon>
                                        <path d="M19.23,15.26 L16.69,14.97 C16.08,14.9 15.48,15.11 15.05,15.54 L13.21,17.38 C10.38,15.94 8.06,13.63 6.62,10.79 L8.47,8.94 C8.9,8.51 9.11,7.91 9.04,7.3 L8.75,4.78 C8.63,3.77 7.78,3.01 6.76,3.01 L5.03,3.01 C3.9,3.01 2.96,3.95 3.03,5.08 C3.56,13.62 10.39,20.44 18.92,20.97 C20.05,21.04 20.99,20.1 20.99,18.97 L20.99,17.24 C21,16.23 20.24,15.38 19.23,15.26 Z" id="🔹Icon-Color" fill="#1D1D1D"></path>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </g>
                </svg>
                {{$user->telp}}</h6>
            </div>
            <div>
                <div class="wrapper ml-[15px] w-auto h-[530px] sm:p-10 bg-[#ffff]  rounded-2xl">
                    <form class="flex justify-center flex-col " method="POST" enctype="multipart/form-data" action={{route('edit_profile')}}>
                        @csrf
                        <h1 class="text-[#0081C9] mb-[15px] text-center text-[40px] font-bold">Edit Profile</h1>
                        <div class="flex flex-col">
                            <label class="mb-[5px]" for="">Foto Profile</label>
                            <input class="m-[5px] p-[5px] rounded-lg drop-shadow-xl" type="file" placeholder="image" name="user_image">
                            @if ($errors->has('user_image'))
                            <span class="bg-[#FFB4B4] text-[#ffffff] text-center rounded-md w-[300px] mt-1">{{ $errors->first('user_image') }}</span>
                            @endif
                        </div>
                        <div class="flex flex-col">
                            <label class="mb-[5px]" for="">Username</label>
                            <input class="w-[350px] mr-[10px] h-[35px] rounded-lg p-1 drop-shadow-md" type="text" name="username" placeholder="username" value="{{$user->username}}">
                            @if ($errors->has('username'))
                            <span class="bg-[#FFB4B4] text-[#eaeaea] rounded-md text-center w-[300px] mt-1">{{ $errors->first('username') }}</span>
                            @endif
                        </div>
                        <div class="flex flex-col">
                            <label class="mb-[5px]" for="">Fullname</label>
                            <input class="w-[350px] mr-[10px] h-[35px] rounded-lg p-1 drop-shadow-md" type="text" name="fullname" placeholder="fullname" value="{{$user->fullname}}">
                            @if ($errors->has('fullname'))
                            <span class="bg-[#FFB4B4] text-[#eaeaea] rounded-md text-center w-[300px] mt-1">{{ $errors->first('fullname') }}</span>
                            @endif
                        </div>
                        <div class="flex flex-col">
                            <label class="mb-[5px]" for="">Email</label>
                            <input class="w-[350px] mr-[10px] h-[35px] rounded-lg p-1 drop-shadow-md" type="text" name="email" placeholder="email" value="{{$user->email}}">
                            @if ($errors->has('email'))
                            <span class="bg-[#FFB4B4] text-[#eaeaea] rounded-md text-center w-[300px] mt-1">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="flex flex-col">
                            <label class="mb-[5px]" for="">No-Telp</label>
                            <input class="w-[350px] mr-[10px] h-[35px] rounded-lg p-1 drop-shadow-md" type="text" name="telp" placeholder="No-Telp" value="{{$user->telp}}">
                            @if ($errors->has('telp'))
                            <span class="bg-[#FFB4B4] text-[#eaeaea] rounded-md text-center w-[300px] mt-1">{{ $errors->first('telp') }}</span>
                            @endif
                        </div>
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <button class=" bg-blue-700 mt-[15px] h-fit w-[200px] py-[10px] text-[#eaeaea] text-[18px] rounded-lg items-self-center" type="submit">Edit</button>
                    </form>
                </div>
                
                
            </div>
        </div>
        @endsection