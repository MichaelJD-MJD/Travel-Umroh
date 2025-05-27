<x-admin-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-bold">Paket</h1>
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

    <div class="bg-white p-6 rounded-lg shadow-md overflow-hidden">
        <div class="block space-y-4">
            <div class="mt-6">
                <div class="flex justify-between">
                    <h2 class="text-3xl font-bold text-gray-700 leading-tight">Daftar Paket</h2>
                    <a href="{{ route('admin.paket.create') }}"
                        class="mb-4 inline-block px-4 py-2 bg-blue-600 rounded text-white font-medium tracking-wide hover:bg-blue-500 ml-3">Tambah
                        Paket</a>

                </div>

                <div class="overflow-x-auto -mx-4 sm:-mx-8 px-4 sm:px-8 py-4">
                    <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                        <table class="min-w-full leading-normal table-auto border-collapse border border-gray-200">
                            <thead>
                                <tr class="bg-gray-100 border-b border-gray-200">
                                    <th
                                        class="px-4 py-3 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider border-r border-gray-200 whitespace-nowrap">
                                        Nama</th>
                                    <th
                                        class="px-4 py-3 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider border-r border-gray-200 whitespace-nowrap">
                                        Deskripsi</th>
                                    <th
                                        class="px-4 py-3 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider border-r border-gray-200 whitespace-nowrap">
                                        Harga</th>
                                    <th
                                        class="px-4 py-3 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider border-r border-gray-200 whitespace-nowrap">
                                        Durasi</th>
                                    <th
                                        class="px-4 py-3 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider border-r border-gray-200 whitespace-nowrap">
                                        Tanggal Berangkat</th>
                                    <th
                                        class="px-4 py-3 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider border-r border-gray-200 whitespace-nowrap">
                                        Kuota</th>
                                    <th
                                        class="px-4 py-3 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider border-r border-gray-200 whitespace-nowrap">
                                        Gambar</th>
                                    <th
                                        class="px-4 py-3 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider whitespace-nowrap">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                @forelse ($pakets as $paket)
                                    <tr class="border-b border-gray-200 hover:bg-gray-50">
                                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">
                                            {{ $paket->nama_paket }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900 max-w-xs truncate">
                                            {!! nl2br(e($paket->deskripsi)) !!}</td>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">Rp
                                            {{ number_format($paket->harga, 0, ',', '.') }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">
                                            {{ $paket->durasi_hari }} hari</td>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">
                                            {{ \Carbon\Carbon::parse($paket->tanggal_keberangkatan)->format('d-m-Y') }}
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">
                                            {{ $paket->kuota }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            @if ($paket->gambar_url)
                                                <img src="{{ $paket->gambar_url }}" alt="{{ $paket->nama_paket }}"
                                                    class="w-24 h-auto rounded" />
                                            @else
                                                <span class="text-gray-400 text-xs italic">Tidak ada gambar</span>
                                            @endif
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm">
                                            <a href="{{ route('admin.paket.edit', $paket->paket_id) }}"
                                                class="inline-block w-28 text-center px-4 py-2 bg-green-600 rounded-md text-white font-medium tracking-wide hover:bg-green-500 ml-3">
                                                Edit
                                            </a>
                                        
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
                                                    <div @click.away="showConfirm = false" class="bg-white rounded-lg shadow-lg p-6 ">
                                                        <h3 class="text-lg font-semibold mb-4 text-gray-800">Konfirmasi Hapus</h3>
                                                        <p class="text-gray-600 mb-6">Apakah Anda yakin ingin menghapus paket <strong>{{ $paket->nama_paket }}</strong>?</p>
                                                        <div class="flex justify-end space-x-3 gap-2">
                                                            <button @click="showConfirm = false"
                                                                class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">Batal</button>
                                                            <form action="{{ route('admin.paket.destroy', $paket->paket_id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-500">Ya, Hapus</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="px-4 py-3 text-center text-gray-500 italic">Data paket
                                            belum tersedia.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <div
                            class="flex flex-col xs:flex-row items-center justify-between px-5 py-5 bg-white border-t border-gray-200">
                            <span class="text-xs text-gray-900">
                                Showing {{ $pakets->firstItem() }} to {{ $pakets->lastItem() }} of
                                {{ $pakets->total() }} Entries
                            </span>
                            <div class="inline-flex mt-2 xs:mt-0">
                                <a href="{{ $pakets->previousPageUrl() ?? '#' }}"
                                    class="text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-l 
                                   {{ $pakets->previousPageUrl() ? 'focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50' : 'opacity-50 cursor-not-allowed' }}">
                                    Prev
                                </a>
                                <a href="{{ $pakets->nextPageUrl() ?? '#' }}"
                                    class="text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-r
                                   {{ $pakets->nextPageUrl() ? 'focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50' : 'opacity-50 cursor-not-allowed' }}">
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
