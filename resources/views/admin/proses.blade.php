<x-app-layout>
  <style>
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
      bottom: 125%;
      left: 50%;
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

    <!-- <form action="{{route('admin.manage.cari')}}" method="GET" enctype="multipart/form-data">
        <input type="text" class="focus:outline-none rounded-lg px-3 border focus:border-blue-500 focus:ring focus:ring-blue-100 transition duration-200" name="cari" placeholder="Cari Judul Doc" value="{{ old('cari') }}">
        <input type="submit" class="px-4 py-1 bg-gray-200 hover:bg-gray-300 mb-7" value="SEARCH">
        <input type="reset" class="px-4 py-1 bg-gray-200 hover hover:bg-gray-300"value="RESET">
    </form> -->
    {{-- <a href="{{route('admin.export')}}" class="w-40 text-center bg-green-500 rounded-lg transform hover:scale-110 motion-reduce:transform-none block text-white font-bold py-2 px-4 ml-5">Export to excel
      </a> --}}
    <div class="overflow-auto">
    <table class="table-fixed min-w-full divide-y divide-green-200 border-gray-500 border-2 md:overflow-scroll mt-7">
        <thead class="bg-green-50 border-b border-green-500">
            <tr class="">
                <th class="px-2 py-3 w-12 text-center text-xs font-medium text-gray-500 uppercase tracking-wider flex justify-center">no</th>
                <th class="px-2 py-3 w-1/5 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
                <th class="px-2 py-3 w-2/5 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Doc</th>
                <th class="px-2 py-3 w-1/5 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                <th class="px-2 py-3 w-1/5 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
            </tr>
        </thead>

        @forelse($documents as $item)
        <tbody class="divide-y divide-green-200">
        <tr class="hover:bg-gray-200 divide-x divide-green-100">
            <!-- <td>{{($documents->currentPage() - 1) + $loop->iteration}}</td> -->
            <td class="px-2 py-4 text-center">{{($documents->currentPage()- 1) * $documents->perpage() + $loop->index + 1 }}</td>
            <td class="px-2 py-4">{{$item->nama}}</td>
            <td class="px-2 py-4">{{$item->namadoc}}</td>
            <td class="px-2 py-4">
             @if (($item->status_id) == '2')
                  <div class="tooltip">
                    <span class="tooltiptext">Approve</span>
                      <svg class="w-7 inline-block text-green-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                      fill="currentColor">
                        <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd" />
                    </svg>
                  </div>
                @else
                  <div class="tooltip">
                    <span class="tooltiptext">Process</span>
                      <svg class="bg-yellow-500 rounded-full h-6 w-6 flex items-center justify-center py-1 px-1 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.933 12.8a1 1 0 000-1.6L6.6 7.2A1 1 0 005 8v8a1 1 0 001.6.8l5.333-4zM19.933 12.8a1 1 0 000-1.6l-5.333-4A1 1 0 0013 8v8a1 1 0 001.6.8l5.333-4z" />
                    </svg>

                  </div>
                @endif</td>
            <td class="px-2 py-4">{{$item->created_at->format("d F, Y H:i")}}</td>
        </tr>
         @empty
          <tr>
            <td colspan="2" class="text-center py-4">Data Kosong</td>
          </tr>
        </tbody>

        @endforelse
    </table>
    </div>

    <div class="mt-10">{{$documents->links()}}</div>
</x-app-layout>
