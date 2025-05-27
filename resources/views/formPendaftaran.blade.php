<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Kontak Kami
        </h2>
    </x-slot>

    @if ($errors->any())
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show"
            class="fixed top-4 right-4 z-50 bg-red-100 border border-red-400 text-red-700 px-6 py-4 rounded shadow transition-opacity"
            x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-2"
            x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-2">
            <strong class="font-bold">Terjadi Kesalahan:</strong>
            <ul class="mt-1 list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show" x-transition
            class="fixed top-5 right-5 z-50 bg-green-500 text-white px-6 py-3 rounded shadow-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="pb-12 bg-green-50 px-6 py-8 min-h-screen">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            {{-- Kiri: Form Tambah Peserta --}}
            <div data-aos="fade-up" data-aos-duration="1500">
                <div class="bg-white p-6 rounded shadow border border-green-200">
                    <h2 class="text-lg font-semibold text-green-800 mb-4">Form Tambah Peserta</h2>
                    <form action="{{ route('pendaftaran-peserta') }}" method="POST" class="space-y-4">
                        @csrf
                        <input type="hidden" name="paket_id" value="{{ $paket->paket_id }}">
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                        <div>
                            <label class="block text-sm font-medium text-green-800">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap"
                                class="mt-1 w-full border border-green-300 rounded p-2 focus:ring-green-600 focus:border-green-600"
                                required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-green-800">Jenis Kelamin</label>
                            <select name="jenis_kelamin"
                                class="mt-1 w-full border border-green-300 rounded p-2 focus:ring-green-600 focus:border-green-600"
                                required>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-green-800">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir"
                                class="mt-1 w-full border border-green-300 rounded p-2 focus:ring-green-600 focus:border-green-600"
                                required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-green-800">NIK</label>
                            <input type="number" name="nik"
                                class="mt-1 w-full border border-green-300 rounded p-2 focus:ring-green-600 focus:border-green-600"
                                required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-green-800">Nomor Paspor</label>
                            <input type="number" name="nomor_paspor"
                                class="mt-1 w-full border border-green-300 rounded p-2 focus:ring-green-600 focus:border-green-600"
                                required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-green-800">Alamat</label>
                            <textarea name="alamat" rows="3"
                                class="mt-1 w-full border border-green-300 rounded p-2 focus:ring-green-600 focus:border-green-600" required></textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-green-800">Nomor Telepon</label>
                            <input type="number" name="nomor_telepon"
                                class="mt-1 w-full border border-green-300 rounded p-2 focus:ring-green-600 focus:border-green-600"
                                required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-green-800">Email</label>
                            <input type="email" name="email"
                                class="mt-1 w-full border border-green-300 rounded p-2 focus:ring-green-600 focus:border-green-600"
                                required>
                        </div>

                        <button type="submit"
                            class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                            Tambah Peserta
                        </button>
                    </form>
                </div>
            </div>

            {{-- Kanan: Daftar Peserta + Informasi Paket --}}
            <div data-aos="fade-left" data-aos-duration="1500" class="space-y-6">
                {{-- Daftar Peserta --}}
                @isset($pesertas)
                    @if ($pesertas->count())
                        <div class="overflow-x-auto bg-white p-4 rounded shadow border border-green-200">
                            <h2 class="text-lg font-semibold text-green-800 mb-2">Daftar Peserta</h2>
                            <table class="min-w-full bg-white border rounded text-sm">
                                <thead class="bg-green-200 text-green-900">
                                    <tr>
                                        <th class="p-2 text-left">Nama Peserta</th>
                                        <th class="p-2 text-left">Jenis Kelamin</th>
                                        <th class="p-2 text-left">Tanggal Lahir</th>
                                        <th class="p-2 text-left">NIK</th>
                                        <th class="p-2 text-left">No Paspor</th>
                                        <th class="p-2 text-left">Alamat</th>
                                        <th class="p-2 text-left">No Telepon</th>
                                        <th class="p-2 text-left">Email</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-green-100">
                                    @foreach ($pesertas as $peserta)
                                        <tr class="hover:bg-green-50">
                                            <td class="p-2">{{ $peserta->nama_lengkap }}</td>
                                            <td class="p-2">{{ $peserta->jenis_kelamin }}</td>
                                            <td class="p-2">{{ $peserta->tanggal_lahir }}</td>
                                            <td class="p-2">{{ $peserta->nik }}</td>
                                            <td class="p-2">{{ $peserta->nomor_paspor }}</td>
                                            <td class="p-2">{{ $peserta->alamat }}</td>
                                            <td class="p-2">{{ $peserta->nomor_telepon }}</td>
                                            <td class="p-2">{{ $peserta->email }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                @endisset

                {{-- Informasi Paket --}}
                <div class="bg-white p-6 rounded shadow border border-green-200">
                    <h2 class="text-lg font-semibold text-green-800 mb-4">Informasi Paket</h2>
                    <div class="space-y-2 text-sm text-green-900">
                        <div class="flex justify-between">
                            <p class="font-medium">Nama Paket</p>
                            <p>{{ $paket->nama_paket }}</p>
                        </div>
                        <div class="flex justify-between">
                            <p class="font-medium">Harga</p>
                            <p>{{ $paket->harga }}</p>
                        </div>
                        <div class="flex justify-between">
                            <p class="font-medium">Durasi</p>
                            <p>{{ $paket->durasi_hari }} Hari</p>
                        </div>
                        <div class="flex justify-between">
                            <p class="font-medium">Tanggal Keberangkatan</p>
                            <p>{{ $paket->tanggal_keberangkatan }}</p>
                        </div>
                    </div>
                </div>


                @isset($pesertas)
                    @if ($pesertas->count())
                        {{-- Tombol --}}
                        <div class="flex space-x-4 text-center">
                            {{-- Tombol Selesai --}}
                            <form action="{{ route('selesaikan-pendaftaran') }}" method="POST">
                                @csrf
                                <input type="hidden" name="paket_id" value="{{ $paket->paket_id }}">
                                <button type="submit"
                                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                                    Selesaikan Pendaftaran
                                </button>
                            </form>

                            {{-- Tombol Batalkan --}}
                            <a href="{{ route('batalkan-pendaftaran', ['paket_id' => $paket->paket_id]) }}"
                                class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">
                                Batalkan Pendaftaran
                            </a>
                        </div>
                    @endif
                @endisset

            </div>
        </div>
    </div>
</x-app-layout>
