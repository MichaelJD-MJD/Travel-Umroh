<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            List Paket
        </h2>
    </x-slot>

    <div class="pb-12 bg-grey-100">
        <div class="px-8 py-6 mb-6 bg-green-800 text-white">
            <h2 data-aos="fade-right" data-aos-duration="1500" class="text-2xl font-bold">List Paket</h2>
            <p data-aos="fade-right" data-aos-duration="1500" class="text-white">Pilih Paket Yang Sesuai dengan Kebutuhan Anda</p>
        </div>

        {{-- Daftar Paket --}}
        <div class="px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($pakets as $paket)
                <div data-aos="zoom-in" data-aos-duration="1500"
                    class="bg-white text-black rounded-lg overflow-hidden shadow-md hover:shadow-xl transform hover:-translate-y-1 transition duration-300 flex flex-col">
                    {{-- Gambar Paket --}}
                    <div class="h-[200px] w-full overflow-hidden">
                        <img src="{{ $paket->gambar_url }}" alt="{{ $paket->nama_paket }}"
                            class="w-full h-full object-cover">
                    </div>

                    {{-- Konten --}}
                    <div class="flex flex-col justify-between flex-grow p-4">
                        <div>
                            <h3 class="text-lg font-bold uppercase mb-1">{{ $paket->nama_paket }}</h3>
                            <p class="text-sm text-gray-600 mb-4">Mulai Dari Rp
                                {{ number_format($paket->harga, 0, ',', '.') }}</p>
                            <div class="flex gap-2">
                                <img src="{{ asset('images/icon/schedule.png') }}" class="w-4 h-4" alt="">
                                <p class="text-sm text-gray-600 mb-4">: {{ $paket->tanggal_keberangkatan }}</p>
                            </div>
                        </div>
                        <a href="{{ route('paket-detail', ['id' => $paket->paket_id]) }}"
                            class="inline-block bg-green-300 text-black px-4 py-2 rounded hover:bg-green-400 text-center transition-colors duration-200">
                            Selengkapnya
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


</x-app-layout>
