@extends('/layout/isUser')

@section('content')

<div class= "h-screen  bg-[#0081C9] px-[10%] pt-[100px]">
        <div>
            <h1 class="text-[#FFC93C] text-[40px] font-extrabold">Kamu masih belum <br> dapat kerjaan, nih?</h1>
            <h3 class="text-white text-[25px] font-semibold">Jangan khawatir, ada Sobat Loker!</h3>
            <p class="text-white font-light">Disini, kamu bisa mencari dan melamar banyak pekerjaan yang <br> sesuai dengan pengalaman dan keahlianmu. Yuk, daftar dan <br> 
            bergabung di Sobat Loker, siapa tau kamu diterima dan dapat <br> pekerjaan impianmu.</p>
            
        </div>
        
        
    </div>
    <div class= "h-screen bg-white p-[30px] flex  flex-col px-[10%]" >
        <h3 class= "text-[#0081C9] text-center text-[20px] font-semibold">Tentang Kami</h3>
        
        <div class="flex justify-end ">
            <br>
            <div class="w-[500px]  flex justify-self-end flex-col">
                <p class= " text-left m-[5px]" >Sobat Loker adalah platform berbasis web, yang berdiri pada penyedia layanan informasi lowongan pekerjaan.
                     Pada platform ini, kami berharap dapat membangun ekosistem yang baik 
                     dimana para pemilik usaha dapat memberikan informasi lowongan pekerjaan 
                     agar mereka mendapatkan calon/kandidat pekerja terbaik. </p>
                <p class=" text-left m-[5px]">Begitu juga dari
                    sisi pelamar, mereka dapat mencari pekerjaan yang sesuai dengan pengalaman 
                    dan keahlian dibidangnya melalui platform ini.</p>
            </div>
            
        </div> <br>
    </div>

@endsection