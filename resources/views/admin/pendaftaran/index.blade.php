<x-admin-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-bold">Pendaftaran</h1>
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
                    <h2 class="text-3xl font-bold text-gray-700 leading-tight">Daftar Pendaftaran</h2>
                    <a href="{{ route('admin.pendaftaran.create') }}"
                        class="mb-4 inline-block px-4 py-2 bg-blue-600 rounded text-white font-medium tracking-wide hover:bg-blue-500 ml-3">Tambah
                        Pendaftaran</a>

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
                                        Paket</th>
                                    <th
                                        class="px-4 py-3 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider border-r border-gray-200 whitespace-nowrap">
                                        Status</th>
                                    <th
                                        class="px-4 py-3 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider border-r border-gray-200 whitespace-nowrap">
                                        Tanggal Pendaftaran</th>
                                    <th
                                        class="px-4 py-3 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider border-r border-gray-200 whitespace-nowrap">
                                        Tanggal Dikonfirmasi</th>
                                    <th
                                        class="px-4 py-3 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider whitespace-nowrap">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                @forelse ($pendaftarans as $pendaftaran)
                                    <tr class="border-b border-gray-200 hover:bg-gray-50">
                                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">
                                            {{ $pendaftaran->user->nama }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900 max-w-xs truncate">
                                            {{ $pendaftaran->paket->nama_paket }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900 max-w-xs truncate">
                                            {{ $pendaftaran->status }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">
                                            {{ \Carbon\Carbon::parse($pendaftaran->tanggal_pendaftaran)->format('d-m-Y') }}
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">
                                            @if ($pendaftaran->tanggal_dikonfirmasi)
                                                {{ \Carbon\Carbon::parse($pendaftaran->tanggal_dikonfirmasi)->format('d-m-Y') }}
                                            @else
                                                <span class="text-gray-500 italic">Belum dikonfirmasi</span>
                                            @endif
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm">
                                            <a href="{{ route('admin.pendaftaran.edit', $pendaftaran->pendaftaran_id) }}"
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
                                                            Pendaftaran <strong>{{ $pendaftaran->user->nama }}</strong>?</p>
                                                        <div class="flex justify-end space-x-3 gap-2">
                                                            <button @click="showConfirm = false"
                                                                class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">Batal</button>
                                                            <form
                                                                action="{{ route('admin.pendaftaran.destroy', $pendaftaran->pendaftaran_id) }}"
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
                                            pendaftaran belum tersedia.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <div
                            class="flex flex-col xs:flex-row items-center justify-between px-5 py-5 bg-white border-t border-gray-200">
                            <span class="text-xs text-gray-900">
                                Showing {{ $pendaftarans->firstItem() }} to {{ $pendaftarans->lastItem() }} of
                                {{ $pendaftarans->total() }} Entries
                            </span>
                            <div class="inline-flex mt-2 xs:mt-0">
                                <a href="{{ $pendaftarans->previousPageUrl() ?? '#' }}"
                                    class="text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-l 
                                   {{ $pendaftarans->previousPageUrl() ? 'focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50' : 'opacity-50 cursor-not-allowed' }}">
                                    Prev
                                </a>
                                <a href="{{ $pendaftarans->nextPageUrl() ?? '#' }}"
                                    class="text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-r
                                   {{ $pendaftarans->nextPageUrl() ? 'focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50' : 'opacity-50 cursor-not-allowed' }}">
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
