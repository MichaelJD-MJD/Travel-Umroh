<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Profile Perusahaan
        </h2>
    </x-slot>

    <div class="pb-12 bg-gray-100">
        {{-- Header --}}
        <div class="px-8 py-6 mb-6 bg-green-800 text-white">
            <h2 data-aos="fade-right" data-aos-duration="1500" class="text-2xl font-bold">Tentang Kami</h2>
            <p data-aos="fade-right" data-aos-duration="1500" class="text-white">Travel Umroh / Haji Berizin Resmi</p>
        </div>
    
        {{-- Konten Tentang Kami --}}
        <div class="p-6 md:flex md:items-start md:gap-6  rounded-md">
            {{-- Logo --}}
            <div data-aos="fade-up" data-aos-duration="1500" class="w-full md:w-1/3 mb-6 md:mb-0 flex justify-center">
                <img src="{{ asset('images/logo.png') }}" alt="Logo"
                    class="w-72 h-72 object-contain border border-gray-300 bg-gray-100 p-4 rounded-md">
            </div>
    
            {{-- Deskripsi --}}
            <div class=" bg-white p-6 w-full md:w-2/3">
                <h3 data-aos="fade-left" data-aos-duration="1500" class="text-xl font-semibold mb-2">Deskripsi</h3>
                <p data-aos="fade-left" data-aos-duration="1500" class="text-gray-700 mb-4">
                    KBIH (Kelompok Bimbingan Ibadah Haji) AS-SYAMIAH merupakan lembaga resmi yang berafiliasi dengan
                    Kementerian Agama Republik Indonesia. Berdiri sejak tahun 2010, KBIH ini berlokasi di Jl. Ariodillah IV
                    Kompleks Ariodillah Indah Block C No 8. Lembaga ini memiliki visi menjadi penyelenggara ibadah haji dan
                    umrah yang profesional, amanah, dan berbasis syariah.
                </p>
                <p data-aos="fade-left" data-aos-duration="1500" class="font-medium mb-2">Misi utamanya meliputi:</p>
                <ol data-aos="fade-left" data-aos-duration="1500" class="list-decimal list-inside text-gray-700 space-y-1">
                    <li>Memberikan pembinaan ibadah secara komprehensif kepada jamaah.</li>
                    <li>Menyelenggarakan perjalanan haji/umrah dengan pelayanan terbaik.</li>
                    <li>Membangun sistem administrasi yang transparan dan akuntabel.</li>
                </ol>
            </div>
        </div>
    </div>
    



</x-app-layout>
