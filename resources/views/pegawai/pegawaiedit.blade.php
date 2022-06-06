<x-app-layout>
	 <div class="text-md mb-7"><b>Edit Menu</b>. Dokumen <i>{{$documents->namadoc}}</i> terakhir diupdate pada {{$documents->updated_at->diffForHumans()}}.</div>
	<div class="bg-green-100 px-5 py-5 rounded-lg border-4 border-blue-300">
        <form action="{{route('pegawai.update',$documents->id)}}" method="post" enctype="multipart/form-data" novalidate>
            @csrf

            <div class="mb-7">
                <x-label for="nama" :value="__('Nama')" />
                <x-input id="nama" class="block mt-1 mx-3 w-2/3 border-green-500" type="text" name="nama" value="{{Auth::user()->name}}" readonly />
                <!-- <x-validation-message name="nama"/> -->
            </div>
            <div class="mb-7">
                <x-label for="kode" :value="__('Kode')" />
                <x-input id="kode" class="block mt-1 mx-3 w-2/3" type="text" name="kode" value="{{$documents->kode}}" required autofocus />
                <!-- <x-validation-message name="kode"/> -->
                @error('kode')
                    <div class="text-red-500 mt-2">Mohon isi kode dokumen</div>
                @enderror
            </div>
            <div class="mb-5">
                <input type="file" name="dokumen" id="dokumen" required autofocus>{{$documents->dokumen}}
                @error('dokumen')
                    <div class="text-red-500 mt-2">Mohon upload file dokumen</div>
                @enderror
            </div>
            <div class="mb-7">
                <x-label for="namadoc" :value="__('Nama Doc')" />
                <x-input id="namadoc" class="block mt-1 mx-3 w-2/3" type="text" name="namadoc" value="{{$documents->namadoc}}" required autofocus />
                <x-validation-message name="namadoc"/>
            </div>
            <div class="mb-7">
                <x-label for="bidang_id" :value="__('Bidang/Bagian')" />
                <select class="block mt-1 mx-3 w-2/3 h-10 focus:outline-none rounded-lg px-3 border focus:border-blue-500 focus:ring focus:ring-blue-100 transition duration-200" name="bidang_id" id="bidang_id">
                    <option disabled value>Pilih Bidang/Bagian</option>
                    <option value="{{ $documents->bidang_id }}">{{ $documents->bidang->bidang }}</option>
                    @foreach ($bidang as $item)
                        <option value="{{ $item->id }}">{{ $item->bidang }}</option>
                    @endforeach
                </select>
            </div>
            <!-- <div class="mb-7">
                <x-label for="tanggal" :value="__('Tanggal')" />
                <x-input type="date" id="tanggal" class="block mt-1 mx-3 w-1/3" name="tanggal" :value="old('tanggal')" required autofocus />
                <x-validation-message name="tanggal"/>
            </div> -->
            <div class="mb-7">
                <x-label for="keterangan" :value="__('Keterangan')" />
                <textarea id="keterangan" class="block mt-1 mx-3 w-2/3 focus:outline-none rounded-lg px-3 border focus:border-blue-500 focus:ring focus:ring-blue-100 transition duration-200" type="text" name="keterangan" autofocus>{{ $documents->keterangan }}</textarea>
                <!-- <x-validation-message name="keterangan"/> -->
            </div>

            <x-button>
                Update Data
            </x-button>
        </form>
    </div>

</x-app-layout>
