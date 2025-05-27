<x-admin-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-bold">Edit Role</h1>
    </x-slot>

    <div class="bg-white p-6 rounded-lg shadow-md">
        <form action="{{ route('admin.galeri.update', $galeri) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="diupload_oleh" value="{{ auth()->user()->id }}">

            <div class="mb-4">
                <label for="judul" class="block text-sm font-medium text-gray-700">Judul</label>
                <input type="text" name="judul" id="judul" value="{{ old('judul', $galeri->judul) }}"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    required>
                @error('judul')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    required>{{ old('deskripsi', $galeri->deskripsi) }}</textarea>

                @error('deskripsi')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="tanggal_upload" class="block text-sm font-medium text-gray-700">Tanggal
                    Upload</label>
                <input type="date" name="tanggal_upload" id="tanggal_upload" value="{{ old('tanggal_upload', \Carbon\Carbon::parse($galeri->tanggal_upload)->format('Y-m-d')) }}"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    required>
                @error('tanggal_upload')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="url_gambar" class="block text-sm font-medium text-gray-700">Gambar</label>
                <input type="file" name="url_gambar" id="url_gambar"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    >
                @error('url_gambar')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-end gap-2">
                <a href="{{ route('admin.galeri.index') }}" class="px-4 py-2 bg-red-600 rounded-md text-white font-medium tracking-wide hover:bg-red-500 ml-3">Batal</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 rounded-md text-white font-medium tracking-wide hover:bg-blue-500 ml-3">Edit</button>
            </div>
        </form>
    </div>
</x-admin-layout>
