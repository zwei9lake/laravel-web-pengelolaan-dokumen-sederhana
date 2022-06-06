<x-app-layout>
        @if(session('success'))
            <div class="bg-green-100 border-t-4 border-teal-4 rounded-b text-green-900 px-4 py-3 shadow-lg mb-3">
                <div class="flex">
                    <div>
                        <p class="text-sm">
                            {{ session('success') }}
                        </p>
                    </div>
                </div>
            </div>
        @endif
         <div class="text-md mb-7"><b>Create Menu</b>. Silahkan tambah data dokumen dengan mengisi form berikut ini.</div>
    <div class="bg-green-100 px-5 py-5 rounded-lg border-4 border-blue-300 mx-2">
        <form action="{{route('pegawai.create')}}" method="post" enctype="multipart/form-data" novalidate>
            @csrf

            <div class="mb-7">
                <x-label for="nama" :value="__('Nama')" />
                <x-input id="nama" class="block mt-1 mx-3 w-2/3 border-green-500" type="text" name="nama" value="{{Auth::user()->name}}" readonly />
                <!-- <x-validation-message name="nama"/> -->
            </div>
            <div class="mb-7">
                <x-label for="kode" :value="__('Kode')" />
                <x-input id="kode" class="block mt-1 mx-3 w-2/3" type="text" name="kode" :value="old('kode')" required autofocus />
                <!-- <x-validation-message name="kode"/> -->
                @error('kode')
                    <div class="text-red-500 mt-2">Mohon isi kode dokumen</div>
                @enderror
            </div>
            <div class="mb-5">
                <x-label for="dokumen" :value="__('Input Dokumen')" />
                <input type="file" class="md:w-1/4 block mt-1 mx-3" name="dokumen" id="dokumen" required autofocus>
                @error('dokumen')
                    <div class="text-red-500 mt-2">Mohon upload dokumen</div>
                @enderror
            </div>
            <div class="mb-7">
                <x-label for="namadoc" :value="__('Judul Dokumen')" />
                <x-input id="namadoc" class="block mt-1 mx-3 w-2/3" type="text" name="namadoc" :value="old('namadoc')" required autofocus />
                <x-validation-message name="namadoc"/>
            </div>
            <div class="mb-7">
                <x-label for="bidang_id" :value="__('Bidang/Bagian')" />
                <select class="block mt-1 mx-3 w-2/3 h-10 focus:outline-none rounded-lg px-3 border focus:border-blue-500 focus:ring focus:ring-blue-100 transition duration-200" name="bidang_id" id="bidang_id">
                    <option disabled value>Pilih Bidang/Bagian</option>
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
                <textarea id="keterangan" class="block mt-1 mx-3 w-2/3 focus:outline-none rounded-lg px-3 border focus:border-blue-500 focus:ring focus:ring-blue-100 transition duration-200" type="text" name="keterangan" :value="old('keterangan')" autofocus /></textarea>
                <!-- <x-validation-message name="keterangan"/> -->
            </div>

            <x-button>
                Tambah Data
            </x-button>
        </form>
    </div>
</x-app-layout>
