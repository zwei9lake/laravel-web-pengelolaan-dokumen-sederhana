<style>@media screen and (max-width: 700px) {
  .sidebar {
    background-color: #FF0000;
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}
</style>
<div class="md:w-1/6 bg-green-400 min-h-screen px-4 py-6 overflow-auto relative">
  <!-- <div class="sidebar"> -->
    <div class="mb-9">
  		<div class="font-medium px-2 text-black-400 uppercase text-xl">
  			Hallo, <div class="text-center bg-green-500 rounded-lg hover:bg-yellow-500 text-white font-bold py-2 px-4 my-3 ml-5 mb-7">{{Auth::user()->name}}</div>
  		</div>
  	</div>

    <div class="mb-7">
      <div class="font-medium text-black-400 uppercase text-lg">
        <svg class="w-7 pb-3 inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
        </svg>
          Main Menu
      </div>

        <a href="{{ route('dashboard') }}" class="transform hover:scale-110 motion-reduce:transform-none block text-white pl-9 py-2 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700 {{Request::path()==='dashboard' ? 'bg-green-500' : ''}}">
          Dashboard</a>
    </div>

  	@can('create documents')
  	<div class="mb-7">
  		<div class="font-medium text-black-400 uppercase text-lg">
        <svg class="w-7 pb-3 inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2" />
        </svg>
  			Data Dokumen
  		</div>
        <a href="{{route('pegawai.create')}}" class="transform hover:scale-110 motion-reduce:transform-none block text-white pl-9 py-2 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700 {{Request::path()==='pegawai/create' ? 'bg-green-500' : ''}}">
          Tambah</a>
        <a href="{{route('pegawai.table')}}" class="transform hover:scale-110 motion-reduce:transform-none block text-white pl-9 py-2 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700 {{Request::is('pegawai/table*') ? 'bg-green-500' : ''}}">
          Cari</a>
        <a href="{{route('pegawai.mydoc')}}" class="transform hover:scale-110 motion-reduce:transform-none block text-white pl-9 py-2 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700 {{Request::is('pegawai/mydoc*') ? 'bg-green-500' : ''}}">
        Dokumen Ku</a>
    </div>
    @endcan

    @can('manage admin')
    <div class="mb-7">
      <div class="font-medium text-black-400 uppercase text-lg">
        <svg class="w-7 pb-3 inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
        </svg>
        Admin
      </div>

        <a href="{{route('admin.manage')}}" class="transform hover:scale-110 motion-reduce:transform-none block text-white pl-9 py-2 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700 {{Request::is('admin/manage*') ? 'bg-green-500' : ''}}">
          Kelola Dokumen</a>

          <a href="{{route('admin.diterima')}}" class="transform hover:scale-110 motion-reduce:transform-none block text-white pl-9 py-2 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700 {{Request::is('admin/diterima*') ? 'bg-green-500' : ''}}">
          Dokumen Diterima</a>

          <a href="{{route('admin.proses')}}" class="transform hover:scale-110 motion-reduce:transform-none block text-white pl-9 py-2 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700 {{Request::is('admin/proses*') ? 'bg-green-500' : ''}}">
          Dokumen Diproses</a>

        <a href="{{route('admin.showusers')}}" class="transform hover:scale-110 motion-reduce:transform-none block text-white pl-9 py-2 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700 {{Request::is('admin/showusers*') ? 'bg-green-500' : ''}}"">
          Show Users</a>
      </div>
      @endcan

  	<div class="mt-10">
  		<div class="pl-5">

    			<form method="POST" action="{{ route('logout') }}">
            @csrf


          <a href="route('logout')" class="text-red-500 text-center bg-green-500 rounded-lg hover:bg-red-800 font-bold py-2 px-4 mx-4"
                onclick="event.preventDefault();
                    this.closest('form').submit();"><svg class="w-7 pb-1 inline-block text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
            </svg>Logout
          </a>
          </form>
  		</div>
    </div>
</div>
