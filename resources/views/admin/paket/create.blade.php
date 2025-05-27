<x-admin-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-bold">Tambah Paket</h1>
    </x-slot>

    <h1 class="text-2xl font-bold mb-2">Tambah Paket</h1>

    <div class="bg-white p-6 rounded-lg shadow-md">
        <form action="{{ route('admin.paket.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="nama_paket" class="block text-sm font-medium text-gray-700">Nama Paket</label>
                <input type="text" name="nama_paket" id="nama_paket" value="{{ old('nama_paket') }}"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    required>
                @error('nama')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="5"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    required>{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="harga" class="block text-sm font-medium text-gray-700">Harga</label>
                <input type="number" name="harga" id="harga" value="{{ old('harga') }}"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    required>
                @error('harga')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="durasi_hari" class="block text-sm font-medium text-gray-700">Durasi Hari</label>
                <input type="number" name="durasi_hari" id="durasi_hari" value="{{ old('durasi_hari') }}"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    required>
                @error('durasi_hari')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="tanggal_keberangkatan" class="block text-sm font-medium text-gray-700">Tanggal
                    Keberangkatan</label>
                <input type="date" name="tanggal_keberangkatan" id="tanggal_keberangkatan"
                    value="{{ old('tanggal_keberangkatan') }}"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    required>
                @error('tanggal_keberangkatan')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="kuota" class="block text-sm font-medium text-gray-700">Kuota</label>
                <input type="number" name="kuota" id="kuota" value="{{ old('kuota') }}"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    required>
                @error('kuota')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="gambar_url" class="block text-sm font-medium text-gray-700">Gambar</label>
                <input type="file" name="gambar_url" id="gambar_url"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    required>
                @error('gambar_url')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-end gap-2">
                <a href="{{ route('admin.paket.index') }}"
                    class="px-4 py-2 bg-red-600 rounded-md text-white font-medium tracking-wide hover:bg-red-500 ml-3">Batal</a>
                <button type="submit"
                    class="px-4 py-2 bg-blue-600 rounded-md text-white font-medium tracking-wide hover:bg-blue-500 ml-3">Tambah</button>
            </div>
        </form>
    </div>
</x-admin-layout>
