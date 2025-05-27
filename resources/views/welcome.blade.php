<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @if (session('success'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show" x-transition
            class="fixed top-5 right-5 z-50 bg-green-500 text-white px-6 py-3 rounded shadow-lg">
            {{ session('success') }}
        </div>
    @endif

    {{-- Banner --}}
    <div class="relative w-full h-screen">
        <img src="{{ asset('images/banner.png') }}" alt="Banner" class="w-full h-full object-cover brightness-50">

        <div data-aos="zoom-in" data-aos-duration="1500" class="absolute inset-0 flex flex-col items-center justify-center text-center text-white px-4">
            <h1 class="text-3xl md:text-5xl font-extrabold leading-tight mb-4">
                Haji dan Umroh Nyaman,<br>
                Aman, Sesuai Sunnah.
            </h1>
            <p class="text-lg md:text-xl mb-2">Temukan Kedamaian Hati dalam Perjalanan</p>
            <p class="text-lg md:text-xl mb-6">Suci Bersama KBIH AS-SYAMIAH</p>
            <a href="/paket"
                class="bg-green-500 hover:bg-green-600 text-white font-semibold px-6 py-3 rounded transition">
                Jelajahi
            </a>
        </div>
    </div>

    {{-- Paket --}}
    <section class="bg-green-800 text-white py-12 px-4">
        <div data-aos="fade-down" data-aos-duration="1500" class="text-center mb-10">
            <h2 class="text-3xl font-bold mb-2">Paket Populer</h2>
            <p>Pilih paket yang sesuai dengan kebutuhan dan waktu Anda,</p>
            <p>dan mulailah perjalanan suci bersama kami.</p>
        </div>

        {{-- Daftar Paket --}}
        <div class="flex flex-wrap justify-center gap-6">
            @foreach ($pakets as $paket)
                <div data-aos="fade-up" data-aos-duration="1500"
                    class="bg-white text-black rounded-lg overflow-hidden shadow-md w-[250px] flex flex-col hover:shadow-xl hover:-translate-y-1">
                    {{-- Gambar Paket --}}
                    <div class="h-[200px] w-full overflow-hidden">
                        <img src="{{ $paket->gambar_url }}" alt="{{ $paket->nama_paket }}"
                            class="w-full h-full object-cover">
                    </div>

                    {{-- Konten --}}
                    <div class="flex flex-col justify-between flex-grow p-4">
                        <div>
                            <h3 class="text-lg font-bold uppercase mb-1">{{ $paket->nama_paket }}</h3>
                            <p class="text-sm mb-4">Mulai Dari Rp {{ number_format($paket->harga, 2) }}</p>
                        </div>
                        <a href="{{ route('paket-detail', ['id' => $paket->paket_id]) }}"
                            class="inline-block bg-green-300 text-black px-4 py-2 rounded hover:bg-green-400 mt-auto text-center">
                            Selengkapnya
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Tombol Paket Lainnya --}}
        <div data-aos="zoom-in-up" data-aos-duration="1500" class="mt-8 text-center">
            <a href="/paket" class="px-4 py-2 bg-green-300 text-black rounded-md hover:bg-green-400">Paket Lainnya</a>
        </div>
    </section>

    {{-- Mengapa memilih kami --}}
    <section class="py-12 px-4 bg-white">
        <div data-aos="fade-up" data-aos-duration="1500" class="text-center mb-10">
            <h2 class="text-3xl font-bold mb-2">Mengapa Memilih KBIH AS-SYAMIAH?</h2>
            <p>Kami berkomitmen untuk menjadi mitra terbaik</p>
            <p>Anda dalam ibadah haji dan umroh.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 max-w-6xl mx-auto">
            <div data-aos="fade-up" data-aos-duration="1500" class="bg-white border rounded-lg p-6 text-center shadow-sm hover:shadow-xl hover:-translate-y-1">
                <img src="{{ asset('images/icon/why-us-icon1.png') }}" class="w-12 mx-auto mb-4" alt="">
                <h3 class="text-lg font-semibold mb-2">Berizin Resmi</h3>
                <p class="text-gray-600 text-sm">KBIH AS-SYAMIAH adalah biro perjalanan haji dan umroh berijin resmi
                    Izin Umroh No. U. 257 Tahun 2020.</p>
            </div>

            <div data-aos="fade-up" data-aos-duration="1500" class="bg-white border rounded-lg p-6 text-center shadow-sm hover:shadow-xl hover:-translate-y-1">
                <img src="{{ asset('images/icon/why-us-icon2.png') }}" class="w-12 mx-auto mb-4" alt="">
                <h3 class="text-lg font-semibold mb-2">Berpengalaman</h3>
                <p class="text-gray-600 text-sm">Kami telah berpengalaman memberangkatkan ribuan jamaah dengan pelayanan
                    yang terbaik.</p>
            </div>

            <div  data-aos="fade-up" data-aos-duration="1500" class="bg-white border rounded-lg p-6 text-center shadow-sm hover:shadow-xl hover:-translate-y-1">
                <img src="{{ asset('images/icon/why-us-icon3.png') }}" class="w-12 mx-auto mb-4" alt="">
                <h3 class="text-lg font-semibold mb-2">Perlengkapan Berkualitas</h3>
                <p class="text-gray-600 text-sm">Kami menyediakan perlengkapan dengan kualitas yang terbaik memudahkan
                    Anda dalam perjalanan dan ibadah.</p>
            </div>

            <div  data-aos="fade-up" data-aos-duration="1500" class="bg-white border rounded-lg p-6 text-center shadow-sm hover:shadow-xl hover:-translate-y-1">
                <img src="{{ asset('images/icon/why-us-icon4.png') }}" class="w-12 mx-auto mb-4" alt="">
                <h3 class="text-lg font-semibold mb-2">Pendaftaran Mudah</h3>
                <p class="text-gray-600 text-sm">Cukup daftar online dan tunggu konfirmasi via WhatsApp. Tanpa biaya
                    tersembunyi.</p>
            </div>

            <div  data-aos="fade-up" data-aos-duration="1500" class="bg-white border rounded-lg p-6 text-center shadow-sm hover:shadow-xl hover:-translate-y-1">
                <img src="{{ asset('images/icon/why-us-icon5.png') }}" class="w-12 mx-auto mb-4" alt="">
                <h3 class="text-lg font-semibold mb-2">Fasilitas Nyaman</h3>
                <p class="text-gray-600 text-sm">Hotel bintang 4/5, transportasi full AC, dan katering halal bergizi
                    untuk menunjang ibadah Anda.</p>
            </div>

            <div  data-aos="fade-up" data-aos-duration="1500" class="bg-white border rounded-lg p-6 text-center shadow-sm hover:shadow-xl hover:-translate-y-1">
                <img src="{{ asset('images/icon/why-us-icon6.png') }}" class="w-12 mx-auto mb-4" alt="">
                <h3 class="text-lg font-semibold mb-2">Tim Profesional</h3>
                <p class="text-gray-600 text-sm">Seluruh tim kami berdedikasi melayani jamaah dengan sepenuh hati dan
                    penuh tanggung jawab.</p>
            </div>
        </div>
    </section>

    <!-- Galeri Section -->
    <section x-data="{ showModal: false, modalImage: '' }" class="py-12 px-4 bg-white">
        <div  data-aos="fade-down" data-aos-duration="1500" class="text-center mb-10">
            <h2 class="text-3xl font-bold mb-2 text-green-900">Galeri</h2>
            <p class="text-gray-600">Dokumentasi perjalanan ibadah para jamaah bersama KBIH</p>
            <p class="text-gray-600">AS-SYAMIAH dari Tanah Air hingga Tanah Suci.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 max-w-6xl mx-auto">
            @foreach ($galeris as $galeri)
                <div data-aos="fade-up" data-aos-duration="1500" class="overflow-hidden rounded-lg shadow-sm cursor-pointer">
                    <img src="{{ $galeri->url_gambar }}" alt="Galeri"
                        class="w-full h-48 object-cover transition-transform duration-300 hover:scale-105"
                        @click="
                            modalImage = '{{ $galeri->url_gambar }}';
                            setTimeout(() => showModal = true, 10);
                        ">
                </div>
            @endforeach
        </div>

        <div  data-aos="zoom-in-up" data-aos-duration="1500" class="text-center mt-8">
            <a href="/galeri" class="text-green-800 font-semibold hover:underline">Galeri Lainnya</a>
        </div>

        <!-- Modal -->
        <div x-show="showModal" x-transition
            class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50" x-cloak
            @click.away="showModal = false">
            <div class="relative max-w-3xl w-full px-4">
                <img :src="modalImage" alt="Preview" class="rounded-lg shadow-lg w-full h-auto">
                <button @click="showModal = false"
                    class="absolute top-2 right-6 text-black rounded-full p-1 hover:bg-gray-200">
                    ✕
                </button>
            </div>
        </div>
    </section>




</x-app-layout>
