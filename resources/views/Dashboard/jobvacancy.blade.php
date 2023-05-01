@extends('Layout/isCompany')


@section('content')

<div class="p-[50px]">
    <div class="p-[10px] bg-[#ffffff] rounded-lg border-1 border-gray-500  ">
        <h1 class="text-[#333] mb-[15px] text-center text-[40px] font-bold ">Lowongan Anda</h1>
        
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nama Pekerjaan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Perusahaan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Lokasi
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Gaji
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($job_lists as $job)
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <td class="px-6 py-4">
                            {{$job->title}}
                        </td>
                        <td class="px-6 py-4">
                            {{$job->nama_perusahaan}}
                        </td>
            
                        <td class="px-6 py-4">
                            {{$job->lokasi}}
                        </td>
                        <td class="px-6 py-4">
                            {{$job->gaji}}
                        </td>
                        
                        <td class="px-6 py-4">
                            <div>
                                
                                <form method="post" action={{route('delete')}}>
                                    @csrf
                                    <input type="hidden" name="id" value={{$job->id}}>
                                    <button type="submit">
                                        <?xml version="1.0" encoding="utf-8"?><!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                                        <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 12V17" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M14 12V17" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M4 7H20" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M6 10V18C6 19.6569 7.34315 21 9 21H15C16.6569 21 18 19.6569 18 18V10" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </button>
                                </form>
                                
                                <form method="get" action={{route('edit_form')}}>
                                    @csrf
                                    <input type="hidden" name="id" value={{$job->id}}>
                                    <input type="hidden" name="user_id"value={{$job->user_id}}>
                                    <button type="submit">
                                        <?xml version="1.0" encoding="utf-8"?><!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                                        <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="m3.99 16.854-1.314 3.504a.75.75 0 0 0 .966.965l3.503-1.314a3 3 0 0 0 1.068-.687L18.36 9.175s-.354-1.061-1.414-2.122c-1.06-1.06-2.122-1.414-2.122-1.414L4.677 15.786a3 3 0 0 0-.687 1.068zm12.249-12.63 1.383-1.383c.248-.248.579-.406.925-.348.487.08 1.232.322 1.934 1.025.703.703.945 1.447 1.025 1.934.058.346-.1.677-.348.925L19.774 7.76s-.353-1.06-1.414-2.12c-1.06-1.062-2.121-1.415-2.121-1.415z" fill="#000000"/></svg>
                                    </button>
                                </form>
                                
                                
                            </div>
                            
                        </td>
                        
                        
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
        
       
    </div>
    
</div>


@endsection