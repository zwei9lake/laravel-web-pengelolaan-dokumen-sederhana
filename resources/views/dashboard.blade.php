<x-app-layout>
    <style>
    img {
        display: block;
        margin-left: auto;
        margin-right: auto;
    }
    p {
        text-indent: 50px;
    }

    .tooltip {
      position: relative;
      display: inline-block;
    }

    .tooltip .tooltiptext {
      visibility: hidden;
      width: 80px;
      background-color: #555;
      color: #fff;
      text-align: center;
      border-radius: 6px;
      padding: 5px 0;
      position: absolute;
      z-index: 1;
      bottom: 90%;
      left: 18%;
      margin-left: -40px;
      opacity: 0;
      transition: opacity 0.3s;
    }

    .tooltip .tooltiptext::after {
      content: "";
      position: absolute;
      top: 100%;
      left: 50%;
      margin-left: -5px;
      border-width: 5px;
      border-style: solid;
      border-color: #555 transparent transparent transparent;
    }

    .tooltip:hover .tooltiptext {
      visibility: visible;
      opacity: 1;
    }
</style>
    @if(session('success'))
        <div class="bg-green-100 border-t-4 border-teal-4 rounded-b text-green-900 px-4 py-3 shadow-md my-3">
            <div class="flex">
                <div>
                    <p class="text-sm">
                        {{ session('success') }}
                    </p>
                </div>
            </div>
        </div>
    @endif

    @if(session('delete'))
        <div class="bg-red-300 border-t-4 border-teal-4 rounded-b text-green-900 px-4 py-3 shadow-md my-3">
            <div class="flex">
                <div>
                    <p class="text-sm">
                        {{ session('delete') }}
                    </p>
                </div>
            </div>
        </div>
    @endif

    <img src="{{('img/distanhor.jpg')}}" class="mt-10" alt="" width="400px" height="200px">
    <br>
    {{-- <p> --}}
        {{-- Sistem Informasi Pengendalian Dokumen Perencanaan Program merupakan salah satu sistem yang bergerak di bidang perencanaan program Dinas Pangan, Tanaman Pangan, dan Hortikultura Provinsi Riau. Sistem ini mengatur kegiatan inputan dan manajemen dokumen beserta hal-hal yang berkaitan dengan perencanaan dan semacamnya. --}}
    {{-- </p> --}}
    <p>
        Sistem Informasi Pengendalian Dokumen Dinas Pangan Tanaman Pangan dan Hortikultura Provinsi Riau merupakan salah satu sistem informasi yang bergerak di Dinas Pangan Tanaman Pangan dan Hortikultura Provinsi Riau. Sistem ini mengatur seluruh kegiatan inputan dan manajemen dokumen beserta hal-hal yang berkaitan dengan data di berbagai bidang Dinas.
    </p>

    <div class="flex space-x-10 ml-6 md:justify-center mt-10">
        <span class="py-5 px-1 w-1/4 tooltip">
            <span class="tooltiptext">Dokumen</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="md:py-4 inline-block w-20 bg-green-200 border-4 border-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                <span class="text-2xl ring-2 ring-black ring-opacity-50 py-8 pb-11 bg-white px-4">Total : {{$documents}}</span>
            </svg>
        </span>
        <span class="py-5 px-1 w-1/4 tooltip">
            <span class="tooltiptext">Dokumen Diterima</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="md:py-4 inline-block w-20 bg-green-400 border-4 border-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                <span class="text-2xl ring-2 ring-black ring-opacity-50 py-8 pb-11 bg-white px-4">Total : {{$approve}}</span>
            </svg>
        </span>
        <span class="py-5 px-1 w-1/4 tooltip">
            <span class="tooltiptext">Dokumen Diproses</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="md:py-4 inline-block w-20 bg-yellow-200 border-4 border-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                <span class="text-2xl ring-2 ring-black ring-opacity-50 py-8 pb-11 bg-white px-5">Total : {{$process}}</span>
            </svg>
        </span>
        <span class="py-5 px-1 w-1/4 tooltip">
            <span class="tooltiptext">User</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="md:py-4 inline-block w-20 bg-blue-200 border-4 border-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                <span class="text-2xl ring-2 ring-black ring-opacity-50 py-8 pb-11 bg-white px-5">Total : {{$user}}</span>
            </svg>
        </span>
    </div>
</x-app-layout>
