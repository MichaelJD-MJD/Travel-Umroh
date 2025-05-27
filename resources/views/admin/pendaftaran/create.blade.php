<x-admin-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-bold">Tambah Pendaftaran</h1>
    </x-slot>

    <h1 class="text-2xl font-bold mb-2">Tambah Pendaftaran</h1>

    <div class="bg-white p-6 rounded-lg shadow-md">
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 mb-4 rounded">
                <ul class="list-none text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.pendaftaran.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

            {{-- Select Paket --}}
            <div class="mb-4">
                <label for="paket_id" class="block text-sm font-medium text-gray-700">Ingin Mendaftar Paket Apa ?</label>
                <select name="paket_id" id="paket_id"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 bg-white text-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    required>
                    <option value="" disabled selected>Pilih Paket</option>
                    @foreach($pakets as $paket)
                        <option value="{{ $paket->paket_id }}">{{ $paket->nama_paket }}</option>
                    @endforeach
                </select>
                @error('paket_id')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            {{-- Tanggal Pendaftaran
            <div class="mb-4">
                <label for="tanggal_pendaftaran" class="block text-sm font-medium text-gray-700">Tanggal Pendaftaran</label>
                <input type="date" name="tanggal_pendaftaran" id="tanggal_pendaftaran" value="{{ old('tanggal_pendaftaran') }}"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 bg-gray-100 text-gray-700 cursor-not-allowed rounded-md shadow-sm focus:outline-none sm:text-sm"
                    required>
                @error('tanggal_pendaftaran')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div> --}}

            {{-- Tombol --}}
            <div class="flex items-center justify-end gap-2">
                <a href="{{ route('admin.pendaftaran.index') }}"
                    class="px-4 py-2 bg-red-600 rounded-md text-white font-medium tracking-wide hover:bg-red-500">Batal</a>
                <button type="submit"
                    class="px-4 py-2 bg-blue-600 rounded-md text-white font-medium tracking-wide hover:bg-blue-500">Tambah</button>
            </div>
        </form>
    </div>
</x-admin-layout>
