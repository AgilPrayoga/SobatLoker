@extends('Layout/isUser')

@section('content')
<div class=" pt-[80px] flex flex-row items-center justify-center">
    <div class="sm:p-[50px]">
        <div class="sm:p-[50px] bg-[#ffffff] rounded-lg shadow-xl ">
            <h1 class="text-[#0081C9] mb-[15px] text-center text-[40px] font-bold">Riwayat Pekerjaan</h1>
            <span class="bg-[#FFB4B4] py-1  text-[#ffffff] text-center rounded-md w-[300px] mt-1">{{session()->get('error')}}</span>
            @foreach ($recruitment as $recruitment)
            <div class="flex flex-row m-2">
                
                <div class="bg-white p-2 flex items-center flex-col sm:flex-row text-[#333] border-y-[1px] border-l-[1px] border-gray-500 rounded-l-lg w-[250px] sm:w-[400px]">
                    <img  class="h-[60px] rounded-xl object-cover mr-[20px]" src={{ asset("storage/".$recruitment->logo) }} alt="" />
                    <div class="flex ">
                        
                        
                        <a class="text-[#333] no-underline" href="/joblists/{{$recruitment->job_id}}"><h5 class="ml-[10px]">{{$recruitment->jobtitle}}</h5></a>
                    </div>
                    
                    
                </div>
                
                <div class="border-y-[1px]  border-r-[1px] rounded-r-lg items-center border-gray-500 flex flex-row">
                    <a href={{ asset("storage/".$recruitment->cv) }} download="{{$recruitment->fullname}}.pdf">
                        <svg width="50px" height="50px" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="none">
                            <path fill="#000000" fill-rule="evenodd" d="M4 1a2 2 0 00-2 2v14a2 2 0 002 2h12a2 2 0 002-2V7.414A2 2 0 0017.414 6L13 1.586A2 2 0 0011.586 1H4zm0 2h7.586L16 7.414V17H4V3zm2 2a1 1 0 000 2h5a1 1 0 100-2H6zm-1 5a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h8a1 1 0 100-2H6z"/>
                        </svg>
                    </a>
                    
                    <form method="post" action={{route('cancel')}}>
                        @csrf
                        <input type="hidden" name="id" value={{$recruitment->id}}>
                        <button type="submit">
                            <svg  width="50px" height="50px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" stroke="#FFB4B4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M9 5H7C5.89543 5 5 5.89543 5 7V19C5 20.1046 5.89543 21 7 21H10M15 5H17C18.1046 5 19 5.89543 19 7V12" stroke="#FFB4B4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M14 16L16.5 18.5M19 21L16.5 18.5M16.5 18.5L19 16M16.5 18.5L14 21" stroke="#FFB4B4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </form>
                    
                </div>
            </div>
            @endforeach
            
            
        </div>
        
    </div>
    
</div>
@endsection