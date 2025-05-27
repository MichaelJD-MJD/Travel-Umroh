<x-admin-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-bold">Peserta</h1>
    </x-slot>

    @if (session('success'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" x-transition
            class="flex items-center mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-md">
            <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
            </svg>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    @if (session('error'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" x-transition
            class="flex items-center mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-md">
            <svg class="w-5 h-5 mr-2 text-red-600" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
            <span>{{ session('error') }}</span>
        </div>
    @endif

    <div class="bg-white p-6 rounded-lg shadow-md overflow-hidden">
        <div class="block space-y-4">
            <div class="mt-6">
                <div class="flex justify-between">
                    <h2 class="text-3xl font-bold text-gray-700 leading-tight">Daftar Peserta</h2>
                    <a href="{{ route('admin.peserta.create') }}"
                        class="mb-4 inline-block px-4 py-2 bg-blue-600 rounded text-white font-medium tracking-wide hover:bg-blue-500 ml-3">Tambah
                        Peserta</a>

                </div>

                <div class="overflow-x-auto -mx-4 sm:-mx-8 px-4 sm:px-8 py-4">
                    <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                        <table class="min-w-full leading-normal table-auto border-collapse border border-gray-200">
                            <thead>
                                <tr class="bg-gray-100 border-b border-gray-200">
                                    <th
                                        class="px-4 py-3 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider border-r border-gray-200 whitespace-nowrap">
                                        Id Pendaftaran</th>
                                    <th
                                        class="px-4 py-3 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider border-r border-gray-200 whitespace-nowrap">
                                        Nama Lengkap</th>
                                    <th
                                        class="px-4 py-3 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider border-r border-gray-200 whitespace-nowrap">
                                        Jenis Kelamin</th>
                                    <th
                                        class="px-4 py-3 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider border-r border-gray-200 whitespace-nowrap">
                                        Tanggal Lahir</th>
                                    <th
                                        class="px-4 py-3 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider border-r border-gray-200 whitespace-nowrap">
                                        NIK</th>
                                    <th
                                        class="px-4 py-3 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider border-r border-gray-200 whitespace-nowrap">
                                        Nomor Paspor</th>
                                    <th
                                        class="px-4 py-3 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider border-r border-gray-200 whitespace-nowrap">
                                        Alamat</th>
                                    <th
                                        class="px-4 py-3 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider border-r border-gray-200 whitespace-nowrap">
                                        Nomor Telepon</th>
                                    <th
                                        class="px-4 py-3 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider border-r border-gray-200 whitespace-nowrap">
                                        Email</th>
                                    <th
                                        class="px-4 py-3 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider whitespace-nowrap">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                @forelse ($pesertas as $peserta)
                                    <tr class="border-b border-gray-200 hover:bg-gray-50">
                                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">
                                            {{ $peserta->pendaftaran_id }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900 max-w-xs truncate">
                                            {{ $peserta->nama_lengkap }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900 max-w-xs truncate">
                                            {{ $peserta->jenis_kelamin }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">
                                            {{ \Carbon\Carbon::parse($peserta->tanggal_lahir)->format('d-m-Y') }}
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900 max-w-xs truncate">
                                            {{ $peserta->nik }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900 max-w-xs truncate">
                                            {{ $peserta->nomor_paspor }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900 max-w-xs truncate">
                                            {{ $peserta->alamat }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900 max-w-xs truncate">
                                            {{ $peserta->nomor_telepon }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900 max-w-xs truncate">
                                            {{ $peserta->email }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm">
                                            <a href="{{ route('admin.peserta.edit', $peserta->peserta_id) }}"
                                                class="inline-block w-28 text-center px-4 py-2 bg-green-600 rounded-md text-white font-medium tracking-wide hover:bg-green-500 ml-3">Edit</a>

                                            <!-- Konfirmasi Hapus dengan Alpine.js -->
                                            <div x-data="{ showConfirm: false }" class="inline-block ml-3">
                                                <!-- Tombol untuk membuka konfirmasi -->
                                                <button @click="showConfirm = true"
                                                    class="w-28 text-center px-4 py-2 bg-red-600 rounded-md text-white font-medium tracking-wide hover:bg-red-500">
                                                    Hapus
                                                </button>

                                                <!-- Modal konfirmasi -->
                                                <div x-show="showConfirm" x-transition
                                                    class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50">
                                                    <div @click.away="showConfirm = false"
                                                        class="bg-white rounded-lg shadow-lg p-6 ">
                                                        <h3 class="text-lg font-semibold mb-4 text-gray-800">Konfirmasi
                                                            Hapus</h3>
                                                        <p class="text-gray-600 mb-6">Apakah Anda yakin ingin menghapus
                                                            Peserta <strong>{{ $peserta->nama_lengkap }}</strong>?</p>
                                                        <div class="flex justify-end space-x-3 gap-2">
                                                            <button @click="showConfirm = false"
                                                                class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">Batal</button>
                                                            <form
                                                                action="{{ route('admin.peserta.destroy', $peserta->peserta_id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-500">Ya,
                                                                    Hapus</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="px-4 py-3 text-center text-gray-500 italic">Data
                                            peserta belum tersedia.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <div
                            class="flex flex-col xs:flex-row items-center justify-between px-5 py-5 bg-white border-t border-gray-200">
                            <span class="text-xs text-gray-900">
                                Showing {{ $pesertas->firstItem() }} to {{ $pesertas->lastItem() }} of
                                {{ $pesertas->total() }} Entries
                            </span>
                            <div class="inline-flex mt-2 xs:mt-0">
                                <a href="{{ $pesertas->previousPageUrl() ?? '#' }}"
                                    class="text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-l 
                                   {{ $pesertas->previousPageUrl() ? 'focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50' : 'opacity-50 cursor-not-allowed' }}">
                                    Prev
                                </a>
                                <a href="{{ $pesertas->nextPageUrl() ?? '#' }}"
                                    class="text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-r
                                   {{ $pesertas->nextPageUrl() ? 'focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50' : 'opacity-50 cursor-not-allowed' }}">
                                    Next
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-admin-layout>
