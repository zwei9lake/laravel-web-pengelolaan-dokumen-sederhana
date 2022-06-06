<x-app-layout>
    <div>
        <h1 class="text-4xl sm:text-5xl md:text-7xl mb-40 font-bold text-black mb-5">Perencanaan Program</h1>
    </div>

     <button class="bg-green-600 hover:bg-yellow-500 text-white font-bold py-2 px-4 rounded my-3 ml-5 mb-7">
            Tambah Data
        </button>

    <table class="min-w-full divide-y divide-green-200 border-gray-400 border-2 ">
                <thead class="bg-green-50">
                <tr class="flex">
                    <th scope="col" class="w-2/6 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Name
                    </th>
                    <th scope="col" class="w-1/6 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Kode Doc.
                    </th>
                    <th scope="col" class="w-2/6 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Nama Doc.
                    </th>
                    <th scope="col" class="w-2/6 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Tanggal Upload
                    </th>
                    <th scope="col" class="w-2/6 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Keterangan
                    </th>

                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr class="lg:hover:bg-gray-100 flex">
                        <td class="w-2/6 px-6 py-4 whitespace-nowrap">
                            
                        </td>
                        <td class="w-1/6 px-6 py-4 whitespace-nowrap">
                            
                        </td>
                       
                        <td class="w-2/6 px-6 py-4 col-2">
                        <span class="px-4 inline-flex text-comicsans leading-5 font-bold rounded-full bg-yellow-100">
                            
                        </span>
                        </td>
                        <td class="w-2/6 px-6 py-4" align="center">
                            <span class="px-4 inline-flex text-comicsans leading-5 font-bold rounded-full bg-blue-400">
                            
                        </td>
                        <td class="w-1/6 px-6 py-4" align="center">
                            <span class="px-4 inline-flex text-comicsans leading-5 font-bold rounded-full bg-blue-400">
                        </td>
                    </tr>
                    
                </tbody>
            </table>
</x-app-layout>
 