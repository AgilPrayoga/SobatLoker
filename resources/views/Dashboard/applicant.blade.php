@extends('/Layout/isCompany')

@section('content')
<div class="p-[50px]">
    <div class="p-[50px] bg-[#ffffff] rounded-lg border-1 border-gray-500 ">
        <h1 class="text-[#0081C9] mb-[15px] text-center text-[40px] font-bold">Pelamar</h1>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

            <table class="w-full text-sm text-left text-gray-500 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nama Pekerjaan
                        </th>
                        <th scope="col" class="px-6 py-3">
                           Foto Profile
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Lengkap
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            No-Telp
                        </th>
                        <th scope="col" class="px-6 py-3">
                            CV
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($applicant as $appli)
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <td class="px-6 py-4">
                            {{$appli->jobtitle}}
                        </td>
                        <td class="px-6 py-4">
                            <img  class="h-[60px] rounded-xl object-cover mr-[20px]" src={{ asset("storage/".$appli->image_user) }} alt="" />
                        </td>
                        <td class="px-6 py-4">
                            {{$appli->fullname}}
                        </td>
                        <td class="px-6 py-4">
                            {{$appli->email}}
                        </td>
                        <td class="px-6 py-4">
                            {{$appli->notelp}}
                        </td>
                        <td class="px-6 py-4">
                            <a href={{ asset("storage/".$appli->cv) }} download="{{$appli->fullname}}.pdf">Download Cv</a>
                        </td>
                        <td class="px-6 py-4">
                            {{$appli->document}}                    
                        </td>
                        
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
        
    </div>
    
</div>


@endsection