<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            List Galeri
        </h2>
    </x-slot>

    <div class="pb-12 bg-gray-100 min-h-screen">
        {{-- Header --}}
        <div class="px-8 py-6 mb-6 bg-green-800 text-white">
            <h2 data-aos="fade-right" data-aos-duration="1500" class="text-2xl font-bold">Galeri Foto</h2>
            <p data-aos="fade-right" data-aos-duration="1500"class="text-white">Kumpulan momen dan kegiatan</p>
        </div>
    
        {{-- Galeri --}}
        <section x-data="{ showModal: false, modalImage: '', modalTitle: '', modalDesc: '', modalDate: '' }"
            class="px-8">
    
            {{-- Grid Foto --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
                @foreach ($galeris as $galeri)
                    <div data-aos="zoom-in" data-aos-duration="1500" class="overflow-hidden rounded-lg shadow-md cursor-pointer bg-gray-200 hover:shadow-lg transition">
                        <img src="{{ $galeri->url_gambar }}" alt="{{ $galeri->judul }}"
                            class="w-full h-48 object-cover transition-transform duration-300 hover:scale-105"
                            @click="
                                modalImage = '{{ $galeri->url_gambar }}';
                                modalTitle = '{{ $galeri->judul }}';
                                modalDesc = '{{ $galeri->deskripsi }}';
                                modalDate = '{{ \Carbon\Carbon::parse($galeri->created_at)->translatedFormat('d F Y') }}';
                                setTimeout(() => showModal = true, 10);
                            ">
                    </div>
                @endforeach
            </div>
    
            {{-- Modal --}}
            <div x-show="showModal" x-transition
                class="fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center z-50 px-4 py-8"
                x-cloak
                @click.away="showModal = false">
                <div class="bg-white rounded-lg shadow-xl max-w-3xl w-full relative overflow-hidden">
                    <button @click="showModal = false"
                        class="absolute top-2 right-2 text-gray-500 hover:text-black text-xl font-bold z-10">
                        &times;
                    </button>
                    <img :src="modalImage" alt="Preview"
                        class="w-full h-96 object-cover rounded-t-lg">
    
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2" x-text="modalTitle"></h3>
                        <p class="text-gray-600 text-sm mb-4" x-text="modalDesc"></p>
                        <p class="text-sm text-gray-500">Diunggah pada: <span x-text="modalDate"></span></p>
                    </div>
                </div>
            </div>
        </section>
    </div>
    


</x-app-layout>
