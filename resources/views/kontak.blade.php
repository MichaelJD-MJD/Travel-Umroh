<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Kontak Kami
        </h2>
    </x-slot>

    <div class="pb-12 bg-gray-100">
        <!-- Header -->
        <div class="px-8 py-6 mb-6 bg-green-800 text-white">
            <h2 data-aos="fade-right" data-aos-duration="1500" class="text-2xl font-bold">Kontak Kami</h2>
            <p data-aos="fade-right" data-aos-duration="1500" class="text-white">Silakan hubungi kami melalui salah satu kontak di bawah ini.</p>
        </div>
    
        <!-- Konten Kontak Kami -->
        <div class="p-6 md:flex md:items-start md:gap-6 rounded-md">
            <!-- Peta -->
            <div data-aos="fade-up" data-aos-duration="1500" class="w-full md:w-1/3 mb-6 md:mb-0 flex justify-center">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d1992.2372402776878!2d104.7390533064001!3d-2.9657618206307266!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sJl.%20Ariodillah%20IV%20Kompleks%20Ariodillah%20Indah%20Block%20C%20No%208.!5e0!3m2!1sid!2sid!4v1748055236243!5m2!1sid!2sid" 
                    width="100%" 
                    height="300" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade"
                    class="rounded-md shadow-md">
                </iframe>
            </div>
    
            <!-- Kontak Detail -->
            <div class="bg-white p-6 w-full md:w-2/3 rounded-md shadow-sm">
                <!-- Lokasi -->
                <div data-aos="fade-left" data-aos-duration="1500" class="mb-4">
                    <div class="flex items-center gap-2 mb-1">
                        <img src="{{ asset('images/icon/location.png') }}" alt="Lokasi" class="w-5 h-5">
                        <p class="font-medium">Lokasi</p>
                    </div>
                    <p class="text-gray-700">Jl. Ariodillah IV Kompleks Ariodillah Indah Block C No 8.</p>
                </div>
    
                <!-- WhatsApp -->
                <div data-aos="fade-left" data-aos-duration="1500" class="mb-4">
                    <div class="flex items-center gap-2 mb-1">
                        <img src="{{ asset('images/icon/whatsapp.png') }}" alt="Whatsapp" class="w-5 h-5">
                        <p class="font-medium">Whatsapp</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <p>081234123412</p>
                        <a 
                            href="https://api.whatsapp.com/send?phone=6281234123412&text=Halo%2C%20saya%20ingin%20bertanya%20lebih%20lanjut%20mengenai%20layanan%20Anda." 
                            target="_blank"
                            class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded">
                            Chat via WA
                        </a>
                    </div>
                </div>
    
                <!-- Instagram -->
                <div data-aos="fade-left" data-aos-duration="1500" class="mb-4">
                    <div class="flex items-center gap-2 mb-1">
                        <img src="{{ asset('images/icon/instagram.png') }}" alt="Instagram" class="w-5 h-5">
                        <p class="font-medium">Instagram</p>
                    </div>
                    <p>@assyamiah</p>
                </div>
    
                <!-- Email -->
                <div data-aos="fade-left" data-aos-duration="1500">
                    <div class="flex items-center gap-2 mb-1">
                        <img src="{{ asset('images/icon/email.png') }}" alt="Email" class="w-5 h-5">
                        <p class="font-medium">Email</p>
                    </div>
                    <p>assyamiah@gmail.com</p>
                </div>
            </div>
        </div>
    </div>
    
    




</x-app-layout>