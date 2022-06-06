<x-app-layout>
	 <style>
        .tooltip {
          position: relative;
          display: inline-block;
        }

        .tooltip .tooltiptext {
          visibility: hidden;
          width: 60px;
          background-color: #555;
          color: #fff;
          text-align: center;
          border-radius: 6px;
          padding: 5px 0;
          position: absolute;
          z-index: 1;
          bottom: 125%;
          left: 50%;
          margin-left: -30px;
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

	<form action="{{route('pegawai.table.cari')}}" method="GET" enctype="multipart/form-data">
		<input type="text" class="focus:outline-none rounded-lg px-3 border focus:border-blue-500 focus:ring focus:ring-blue-100 transition duration-200 mb-7" name="cari" placeholder="Cari Judul Doc" value="{{ old('cari') }}">
		<input type="submit" class="px-4 py-2 rounded-lg bg-gray-200 hover:bg-gray-300" value="SEARCH">
		<input type="reset" class="px-4 py-2 rounded-lg bg-gray-200 hover hover:bg-gray-300"value="RESET">
	</form>

  <div class="overflow-auto">
  	<table class="table-fixed min-w-full divide-y divide-green-200 border-gray-500 border-2 md:overflow-scroll mt-7">
  		<thead class="bg-green-50 border-b border-green-500">
  			<tr class="">
  				<th class="px-2 py-3 w-12 text-center text-xs font-medium text-gray-500 uppercase tracking-wider flex justify-center">no</th>
  				<th class="px-2 py-3 w-1/5 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
  				<th class="px-2 py-3 w-1/5 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Doc</th>
  				<th class="px-2 py-3 w-2/5 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dokumen</th>
  				<th class="px-2 py-3 w-1/5 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
  			</tr>
  		</thead>

  		@forelse($documents as $item)
  		<tbody class="divide-y divide-green-200">
    		<tr class="hover:bg-gray-200 divide-x divide-green-100">
    			{{-- <!-- <td>{{($documents->currentPage() - 1) + $loop->iteration}}</td> --> --}}
    			<td class="px-2 py-4 text-center">{{($documents->currentPage()- 1) * $documents->perpage() + $loop->index + 1 }}</td>
    			<td class="px-2 py-4">{{$item->nama}}</td>
    			<td class="px-2 py-4">{{$item->namadoc}}</td>
    			<td class="px-2 py-4"><a href="{{url('moyai/'.$item->dokumen)}}" class="text-red-500">{{$item->dokumen}}</a>
      			<a href="{{route('pegawai.table.show',$item->id)}}">
    	             <div class="tooltip">
    	                <span class="tooltiptext">Details</span>
    	                <svg class="w-7 inline-block bg-blue-400 hover:bg-blue-600 ring-2 ring-blue-400 ring-opacity-50 rounded-md py-1 px-1 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
    	                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
    	                </svg>
    	            </div>
            </a></td>
    			<td class="px-2 py-4">{{$item->created_at->format("d F, Y H:i")}}</td>
        </tr>
      @empty
        <tr>
          <td colspan="2" class="">Data Kosong</td>
        </tr>
  		</tbody>
  		@endforelse
  	</table>
  </div>
	<div class="mt-10">{{$documents->links()}}</div>
</x-app-layout>
