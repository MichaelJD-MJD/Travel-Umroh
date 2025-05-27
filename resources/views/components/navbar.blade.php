{{-- navbar --}}
<div class="bg-white px-6 py-4 shadow fixed top-0 left-0 right-0 z-50">
    <div class="flex items-center justify-between w-full mx-auto">
        {{-- Logo --}}
        <a href="/">
            <div class="flex items-center gap-2">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-8 h-8">
                <span class="text-2xl font-semibold text-black tracking-wide">AS-SYAMIAH</span>
            </div>
        </a>

        {{-- Hamburger button --}}
        <button id="menu-toggle" class="md:hidden text-gray-700 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 transition-transform duration-300 ease-in-out"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

        {{-- Menu navigasi (desktop) --}}
        <div class="hidden md:flex items-center gap-6 text-base">
            {{-- Desktop navigation --}}
            <a href="/"
                class="{{ request()->is('/') ? 'text-[#1A5646] font-semibold' : 'text-[#001F5B]' }} hover:underline">Beranda</a>
            <a href="/paket"
                class="{{ request()->is('paket') ? 'text-[#1A5646] font-semibold' : 'text-[#001F5B]' }} hover:underline">Paket
                travel</a>
            <a href="/galeri"
                class="{{ request()->is('galeri') ? 'text-[#1A5646] font-semibold' : 'text-[#001F5B]' }} hover:underline">Galeri</a>
            <a href="/profile-perusahaan"
                class="{{ request()->is('profile-perusahaan') ? 'text-[#1A5646] font-semibold' : 'text-[#001F5B]' }} hover:underline">Profile</a>
            <a href="/kontak"
                class="{{ request()->is('kontak') ? 'text-[#1A5646] font-semibold' : 'text-[#001F5B]' }} hover:underline">Kontak</a>


            {{-- Tampilkan tombol masuk jika user belum login --}}
            @guest
                <a href="/login" class="bg-primary text-white px-4 py-2 rounded hover:opacity-90 transition">Masuk</a>
            @else
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="bg-primary text-white px-4 py-2 rounded hover:opacity-90 transition">
                        Logout
                    </button>
                </form>
            @endguest

        </div>
    </div>

    {{-- Menu navigasi (mobile) --}}
    <div id="nav-menu"
        class="max-h-0 overflow-hidden transition-all duration-500 ease-in-out md:hidden flex flex-col gap-4 mt-4 px-6 text-base bg-white rounded-b-lg shadow">
        <a href="/"
            class="{{ request()->is('/') ? 'text-[#1A5646] font-semibold' : 'text-[#001F5B]' }} hover:underline mt-2">Beranda</a>
        <a href="/paket"
            class="{{ request()->is('paket') ? 'text-[#1A5646] font-semibold' : 'text-[#001F5B]' }} hover:underline">Paket
            travel</a>
        <a href="/galeri"
            class="{{ request()->is('galeri') ? 'text-[#1A5646] font-semibold' : 'text-[#001F5B]' }} hover:underline">Galeri</a>
        <a href="/profile-perusahaan"
            class="{{ request()->is('profile-perusahaan') ? 'text-[#1A5646] font-semibold' : 'text-[#001F5B]' }} hover:underline">Profile</a>
        <a href="/kontak"
            class="{{ request()->is('kontak') ? 'text-[#1A5646] font-semibold' : 'text-[#001F5B]' }} hover:underline">Kontak</a>


        {{-- Tampilkan tombol masuk jika user belum login --}}
        @guest
            <a href="/login" class="bg-primary text-white px-4 py-2 rounded hover:opacity-90 transition">Masuk</a>
        @else
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="bg-primary text-white px-4 py-2 rounded hover:opacity-90 transition">
                    Logout
                </button>
            </form>
        @endguest
    </div>
</div>

{{-- Script toggle hamburger menu --}}
<script>
    const toggle = document.getElementById('menu-toggle');
    const menu = document.getElementById('nav-menu');

    let isOpen = false;
    toggle.addEventListener('click', () => {
        isOpen = !isOpen;
        if (isOpen) {
            menu.classList.remove('max-h-0');
            menu.classList.add('max-h-[500px]'); // kira-kira cukup untuk kontennya
        } else {
            menu.classList.add('max-h-0');
            menu.classList.remove('max-h-[500px]');
        }
    });
</script>
