<x-app-layout>
	 <form action="{{route('admin.showusers.cari')}}" method="GET" enctype="multipart/form-data">
        <input type="text" class="focus:outline-none rounded-lg px-3 border focus:border-blue-500 focus:ring focus:ring-blue-100 transition duration-200" name="cari" placeholder="Cari Nama User" value="{{ old('cari') }}">
        <input type="submit" class="px-4 py-2 rounded-lg bg-gray-200 hover:bg-gray-300 mb-7" value="SEARCH">
        <input type="reset" class="px-4 py-2 rounded-lg bg-gray-200 hover hover:bg-gray-300"value="RESET">
    </form>

    <div class="overflow-auto">
    <table class="table-fixed min-w-full divide-y divide-green-200 border-gray-500 border-2 md:overflow-scroll mt-7">
        <thead class="bg-green-50 border-b border-green-500">
            <tr class="">
                <th class="px-2 py-3 w-12 text-center text-xs font-medium text-gray-500 uppercase tracking-wider flex justify-center">no</th>
                <th class="px-2 py-3 w-1/5 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Id</th>
                <th class="px-2 py-3 w-2/5 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                <th class="px-2 py-3 w-1/5 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Register</th>
                <th class="px-2 py-3 w-1/5 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Verifikasi</th>
            </tr>
        </thead>
        @forelse($user as $item)
        <tbody class="divide-y divide-green-200">
        <tr class="hover:bg-gray-200 divide-x divide-green-100">
           <td class="px-2 py-4 text-center">{{($user->currentPage()- 1) * 3 + $loop->iteration}}</td>
            <td class="px-2 py-4">{{$item->id}}</td>
            <td class="px-2 py-4">{{$item->name}}</td>
            <td class="px-2 py-4">{{$item->created_at}}</td>
            <td class="px-2 py-4">{{$item->email_verified_at}}</td>
        </tr>
         @empty
          <tr>
            <td colspan="2" class="text-center py-4">Data Kosong</td>
          </tr>
        </tbody>

        @endforelse
    </table>
    </div>

    <div class="mt-10">{{$user->links()}}</div>
</x-app-layout>
