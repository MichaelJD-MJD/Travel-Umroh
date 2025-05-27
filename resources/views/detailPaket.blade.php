<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail Paket
        </h2>
    </x-slot>

    <div class="pb-12 bg-gray-100">
        <div class="mx-auto p-6 grid grid-cols-1 md:grid-cols-3 gap-8">

            {{-- Kiri (Detail Paket) --}}
            <div class="col-span-2 bg-white rounded shadow p-6">
                <h3 data-aos="fade-down" data-aos-duration="1500" class="text-xl font-semibold mb-1">{{ $paket->nama_paket }}</h3>
                <p data-aos="fade-down" data-aos-duration="1500" class="text-gray-600 text-lg mb-4">Rp {{ number_format($paket->harga, 0, ',', '.') }}</p>

                <img data-aos="zoom-in" data-aos-duration="1500" src="{{ $paket->gambar_url }}" alt="{{ $paket->nama_paket }}"
                    class="w-full max-h-72 object-cover object-center rounded mb-6">

                <h4 data-aos="fade-down" data-aos-duration="1500" class="text-lg font-semibold mb-2">Tentang Wisata</h4>
                <p data-aos="fade-down" data-aos-duration="1500" class="text-gray-700 leading-relaxed mb-6">{{ $paket->deskripsi }}</p>

                <div data-aos="fade-down" data-aos-duration="1500" class="flex justify-between text-center">
                    {{-- Kuota --}}
                    <div class="flex gap-2 items-center">
                        <img src="{{ asset('images/icon/people.png') }}" class="w-10 h-10" alt="kuota">
                        <div>
                            <p class="text-sm text-gray-500">Kuota</p>
                            <p class="font-semibold">{{ $paket->kuota }} Orang</p>
                        </div>
                    </div>

                    {{-- Durasi --}}
                    <div class="flex gap-2 items-center">
                        <img src="{{ asset('images/icon/repeat.png') }}" class="w-10 h-10" alt="durasi">
                        <div>
                            <p class="text-sm text-gray-500">Durasi</p>
                            <p class="font-semibold">{{ $paket->durasi_hari }} hari</p>
                        </div>
                    </div>

                    {{-- Tanggal Keberangkatan --}}
                    <div class="flex gap-2 items-center">
                        <img src="{{ asset('images/icon/schedule.png') }}" class="w-10 h-10" alt="tanggal">
                        <div>
                            <p class="text-sm text-gray-500">Tanggal Keberangkatan</p>
                            <p class="font-semibold">
                                {{ \Carbon\Carbon::parse($paket->tanggal_keberangkatan)->translatedFormat('d F Y') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Kanan (Info Travel) --}}
            <div x-data="{ open: false }" class="bg-white rounded shadow p-6">

                <h4 data-aos="fade-down" data-aos-duration="1500" class="text-lg font-semibold mb-2">Harga Paket</h4>
                <p data-aos="fade-down" data-aos-duration="1500" class="text-xl text-green-600 font-bold mb-4">Rp {{ number_format($paket->harga, 0, ',', '.') }} /
                    pax</p>
                <hr class="mb-4">

                <h4 data-aos="fade-down" data-aos-duration="1500" class="text-lg font-semibold mb-2">Informasi Travel</h4>
                <div data-aos="fade-down" data-aos-duration="1500" class="mb-2">
                    <p class="text-sm text-gray-500">Nama Perusahaan</p>
                    <p class="font-medium">KBIH AS-SYAMIAH</p>
                </div>
                <div data-aos="fade-down" data-aos-duration="1500" class="mb-2">
                    <p class="text-sm text-gray-500">Nomor Telepon</p>
                    <p class="font-medium">081234243424</p>
                </div>
                <div data-aos="fade-down" data-aos-duration="1500" class="mb-6">
                    <p class="text-sm text-gray-500">Email</p>
                    <p class="font-medium">assyamiah@gmail.com</p>
                </div>

                {{-- Tombol Daftar / Status --}}
                @if ($sudahDaftar)
                    <div data-aos="fade-down" data-aos-duration="1500" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-2 text-center">
                        Anda sudah terdaftar pada paket ini.
                    </div>
                @elseif ($paket->kuota <= 0)
                    <div data-aos="fade-down" data-aos-duration="1500" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-2 text-center">
                        Kuota sudah penuh.
                    </div>
                @else
                    <button data-aos="fade-down" data-aos-duration="1500" @click="open = true"
                        class="block w-full bg-green-400 hover:bg-green-500 text-white text-center py-2 rounded mb-2">
                        Daftar
                    </button>
                @endif


                {{-- Tombol WhatsApp --}}
                <a data-aos="fade-down" data-aos-duration="1500" href="https://api.whatsapp.com/send?phone=6281234123412&text=Halo%2C%20saya%20ingin%20bertanya%20lebih%20lanjut%20mengenai%20layanan%20Anda."
                    target="_blank"
                    class="block w-full bg-green-200 hover:bg-green-300 text-black text-center py-2 rounded">
                    Hubungi CS
                </a>

                {{-- Modal --}}
                <div x-show="open" x-cloak
                    class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
                    <div class="bg-white rounded p-6 max-w-lg w-full">
                        <h2 class="text-lg font-bold mb-4">Konfirmasi Pendaftaran</h2>
                        <p class="mb-6">Apakah Anda yakin ingin membuat pendaftaran paket ini?</p>
                        <div class="flex justify-end gap-4">
                            <button @click="open = false"
                                class="px-4 py-2 bg-gray-300 text-black rounded hover:bg-gray-400">
                                Batal
                            </button>
                            <form action="{{ route('form-pendaftaran-peserta', ['paket_id' => $paket->paket_id]) }}">
                                @csrf
                                <button type="submit"
                                    class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">
                                    Ya, Daftar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
