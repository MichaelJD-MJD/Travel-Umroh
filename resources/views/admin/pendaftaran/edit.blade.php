<x-admin-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-bold">Edit Status</h1>
    </x-slot>

    <div class="bg-white p-6 rounded-lg shadow-md">
        <form action="{{ route('admin.pendaftaran.update', $pendaftaran) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="diupload_oleh" value="{{ auth()->user()->id }}">

            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <select name="status" id="status" class="mt-1 block w-full px-3 py-2 border border-gray-300 bg-white text-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                required>
                    <option value="Baru" selected disabled>Baru</option>
                    <option value="Dikonfirmasi">Dikonfirmasi</option> 
                </select>
                @error('status')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="tanggal_dikonfirmasi" class="block text-sm font-medium text-gray-700">Tanggal
                    Dikonfirmasi</label>
                <input type="date" name="tanggal_dikonfirmasi" id="tanggal_dikonfirmasi" value="{{ old('tanggal_dikonfirmasi', \Carbon\Carbon::parse($pendaftaran->tanggal_dikonfirmasi)->format('Y-m-d')) }}"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    required>
                @error('tanggal_dikonfirmasi')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-end gap-2">
                <a href="{{ route('admin.pendaftaran.index') }}" class="px-4 py-2 bg-red-600 rounded-md text-white font-medium tracking-wide hover:bg-red-500 ml-3">Batal</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 rounded-md text-white font-medium tracking-wide hover:bg-blue-500 ml-3">Edit</button>
            </div>
        </form>
    </div>
</x-admin-layout>
