<nav class=" w-full h-20 fixed top-0 z-50 shadow-md bg-slate-700 bg-opacity-50">
    <div class=" h-full w-full px-5 container mx-auto flex justify-between items-center backdrop-blur-sm ">
        {{-- brand --}}
        <div class=" flex justify-start w-2/12">
            <div class="font-bold text-2xl  text-white">
                <a href="">WIBIKI</a>
            </div>
        </div>
        {{--end brand --}}

        {{-- hamburger --}}
        <button id="hamburger" class=" md:hidden h-10  w-10 flex flex-wrap items-center group relative">
            <span id="garis1" class="block h-[2px] w-full bg-white transition-all"></span>
            <span id="garis2" class="block h-[2px] w-full bg-white transition-all"></span>
            <span id="garis3" class="block h-[2px] w-full bg-white transition-all"></span>
        </button>
        {{-- end hamburger --}}

        {{-- nav-item --}}
        <ul id="nav-menu" class="md:flex hidden md:static absolute md:text-white text-white md:w-auto w-5/12 gap-5 font-semibold top-20 -right-1 bg-emerald-600 rounded-blclas-md md:bg-transparent p-2">
            <li>
                <a class="flex hover:bg-white hover:text-black transition-all duration-500 py-1 px-4 rounded-md" href="/">
                    Beranda
                </a>
            </li>
            <li><a class="flex hover:bg-white hover:text-black transition-all duration-500 py-1 px-4 rounded-md" href="/list-anime">List Anime</a></li>
            <li class="relative">
                <button id="kategori" class=" ring-white active:bg-slate-500 hover:bg-white hover:text-black transition-all duration-500 py-1 ps-4 pe-3 rounded-md cursor-pointer flex items-center">
                    Kategori
                    <svg id="row" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class=" fill-current h-5 w-5 ">
                        <path d="M16.293 9.293 12 13.586 7.707 9.293l-1.414 1.414L12 16.414l5.707-5.707z"></path>
                    </svg>
                </button>
                <ul id="dropitem" class=" hidden text-black static md:absolute my-2 py-2 px-4 bg-white w-full top-7 rounded-md shadow-md border">
                    <li>asu</li>
                    <li>Asu</li>
                </ul>
            </li>
        </ul>
        {{-- nav-item --}}

        {{-- contac us pc --}}
        <div class=" hidden md:flex justify-end w-2/12">
            <div class=" bg-white hover:bg-slate-300  hover:scale-105 transition-all shadow-md text-slate-600 py-1 px-5 rounded-md font-semibold">
                @if(Auth::user())
                <a href="/dashboard">Dashboard</a>
                @else
                <a href="/login">Contac US</a>
                @endif
            </div>
        </div>
        {{-- contac us pc --}}
    </div>
</nav>
