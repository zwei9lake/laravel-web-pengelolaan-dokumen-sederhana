<x-app-layout>
    <div class="text-md mb-7">Dibuat oleh <b><i>{{$documents->nama}}</i></b>, pada {{$documents->created_at->format("d F Y H:i")}} </div>
    <div class="md:py-12 md:mx-24 bg-green-500 border-4 border-blue-500 rounded-md">
    <table class="md:flex justify-center">
        <tr>
            <td class="text-lg">
                User

                {{-- <!-- <x-input id="nama" class="block mt-1 mx-3 w-4/5 border-green-500" type="text" name="nama" value="{{Auth::user()->name}}" readonly /> --> --}}
                <!-- <x-validation-message name="nama"/> -->
            </td>
            <td class="block mt-3 mx-7 w-full">:</td>
            <td><input type="text" id="nama" class="block mt-3 w-4/5 border-green-500 rounded-md" type="text" name="nama" value="{{$documents->nama}}" readonly></td>
        </tr>
        <tr>
            <td class="text-lg">Kode</td>
            <td class="block mt-4 mx-7 w-full">:</td>
            <td><input type="text" id="kode" class="block mt-3 w-4/5 border-green-500 rounded-md" type="text" name="kode" value="{{$documents->kode}}" readonly></td>
        </tr>
        <tr>
            <td class="text-lg">Status</td>
            <td class="block mt-4 mx-7 w-full">:</td>
            <td><div class="bg-white block mt-3 w-4/5 border-green-500 rounded-md" type="text" name="status" value="" readonly>{{$documents->status_label}}</td>
        </tr>
        <tr>
            <td class="text-lg">Bidang</td>
            <td class="block mt-4 mx-7 w-full">:</td>
            <td><div class="bg-white block mt-3 w-full border-green-500 rounded-md" type="text" name="status" value="" readonly>{{$documents->bidang->bidang}}</td>
        </tr>
        <tr>
            <td class="text-lg">Nama Doc</td>
            <td class="block mt-4 mx-7 w-full">:</td>
            <td><input type="text" id="namadoc" class="block mt-3 w-full border-green-500 rounded-md" type="text" name="namadoc" value="{{$documents->namadoc}}" readonly></td>
        </tr>
        <tr>
            <td class="text-lg">Documents</td>
            <td class="block mt-4 mb-4 mx-7 w-full">:</td>
            <td><a href="{{url('moyai/'.$documents->dokumen)}}" class="text-red-500">{{$documents->dokumen}}</a></td>
        </tr>
        <tr>
            <td class="text-lg">Keterangan</td>
            <td class="block mt-4 mx-7">:</td>
            <td><input type="text" id="keterangan" class="block mt-3 w-full border-green-500 rounded-md" type="text" name="keterangan" value="{{$documents->keterangan}}" readonly></td>
        </tr>
        <tr>
            <td class="text-lg">Tanggal Upload</td>
            <td class="block mt-4 mx-7 w-full">:</td>
            <td><input type="text" id="tanggalupload" class="block mt-3 w-full border-green-500 rounded-md" type="text" name="keterangan" value="{{$documents->created_at->format('d F, Y H:i')}}" readonly></td>
        </tr>
         <tr>
            <td class="text-lg">Tanggal Update</td>
            <td class="block mt-4 mx-7 w-full">:</td>
            <td><input type="text" id="tanggalupload" class="block mt-3 w-full border-green-500 rounded-md" type="text" name="keterangan" value="{{$documents->updated_at->format('d F, Y H:i')}}" readonly></td>
        </tr>
            <!-- <x-validation-message name="keterangan"/> -->
        </div>
    </table>
</div>
</x-app-layout>
