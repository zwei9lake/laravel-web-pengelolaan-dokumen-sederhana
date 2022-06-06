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

    <form action="{{route('admin.manage.cari')}}" method="GET" enctype="multipart/form-data">
        <input type="text" class="focus:outline-none rounded-lg px-3 border focus:border-blue-500 focus:ring focus:ring-blue-100 transition duration-200" name="cari" placeholder="Cari Judul Doc" value="{{ old('cari') }}">
        <input type="submit" class="px-4 py-2 rounded-lg bg-gray-200 hover:bg-gray-300 mb-7" value="SEARCH">
        <input type="reset" class="px-4 py-2 rounded-lg bg-gray-200 hover hover:bg-gray-300"value="RESET">
    </form>
      <a href="{{route('admin.export')}}" class="w-40 text-center bg-green-500 rounded-lg transform hover:scale-110 motion-reduce:transform-none block text-white font-bold py-2 px-4 ml-5">Export to excel
      </a>
    <div class="overflow-auto">
    <table class="table-fixed min-w-full divide-y divide-green-200 border-gray-500 border-2 md:overflow-scroll mt-7">
        <thead class="bg-green-50 border-b border-green-500">
            <tr class="">
                <th class="px-2 py-3 w-12 text-center text-xs font-medium text-gray-500 uppercase tracking-wider flex justify-center">no</th>
                <th class="px-2 py-3 w-1/6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
                <th class="px-2 py-3 w-2/6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Doc</th>
                <th class="px-2 py-3 w-1/6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                <th class="px-2 py-3 w-1/6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                <th class="px-2 py-3 w-1/6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
            </tr>
        </thead>

        @forelse($documents as $item)
        <tbody class="divide-y divide-green-200">
        <tr class="hover:bg-gray-200 divide-x divide-green-100">
            {{--  <td>{{($documents->currentPage() - 1) + $loop->iteration}}</td> --}}
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
            <td class="px-2 py-4">
                <a href="{{route('admin.manage.edit',$item->id)}}">
                     <div class="tooltip">
                        <span class="tooltiptext">Edit</span>
                        <svg class="w-7 inline-block bg-yellow-500 hover:bg-yellow-600 ring-2 ring-yellow-500 ring-opacity-50 rounded-md py-1 px-1 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                        <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </a>
                <a class="px-2" href="{{route('admin.delete', $item->id)}}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                    <div class="tooltip">
                        <span class="tooltiptext">Delete</span>
                        <svg class="w-7 inline-block bg-red-500 hover:bg-red-600 ring-2 ring-red-500 ring-opacity-50 rounded-md py-1 px-1 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </a>
                <a href="{{route('admin.manage.show',$item->id)}}">
                     <div class="tooltip">
                        <span class="tooltiptext">Details</span>
                        <svg class="w-7 inline-block bg-blue-400 hover:bg-blue-600 ring-2 ring-blue-400 ring-opacity-50 rounded-md py-1 px-1 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                </a>
            </td>
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
