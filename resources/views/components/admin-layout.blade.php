<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | {{ $title }}</title>
    @vite(['resources/css/app.css','resources/js/app.js',])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body class="poppins flex overflow-x-hidden">
    {{-- NAVBAR MOBILE --}}
    <x-navbar-handphone></x-navbar-handphone>
    {{-- END NAVBAR MOBILE --}}

    {{-- SIDE_BAR --}}
    <section class=" hidden md:block md:w-3/12"></section>
    <section id="sidebar" class=" hidden w-8/12 md:block md:w-3/12 min-h-screen bg-emerald-600  ps-5 fixed z-50 top-20 md:top-0">
        {{-- Brand --}}
        <h1 class="font-bold  justify-center pt-5 pb-16 text-2xl text-white">WIBIKI</h1>
        {{-- end brand --}}

        {{-- NAV LIST --}}
        <ul>
            <li>
                <a href="/dashboard" class=" font-semibold  py-2 flex items-center text-white transition-all hover:px-5 hover:text-emerald-600 hover:bg-white rounded-s-md">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class=" fill-current h-4 w-4  me-1">
                        <path d="m21.743 12.331-9-10c-.379-.422-1.107-.422-1.486 0l-9 10a.998.998 0 0 0-.17 1.076c.16.361.518.593.913.593h2v7a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-4h4v4a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-7h2a.998.998 0 0 0 .743-1.669z">
                        </path>
                    </svg>
                    Beranda
                </a>
            </li>
            <li>
                <a href="/dashboard/daftar-anime" class=" font-semibold  py-2 flex items-center text-white transition-all hover:px-5 hover:text-emerald-600 hover:bg-white rounded-s-md">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class=" fill-current h-4 w-4 me-1">
                        <path d="M4 6h2v2H4zm0 5h2v2H4zm0 5h2v2H4zm16-8V6H8.023v2H18.8zM8 11h12v2H8zm0 5h12v2H8z">
                        </path>
                    </svg>
                    Daftar Anime
                </a>
            </li>
            <li>
                <a href="/dashboard/daftar-episode" class=" font-semibold  py-2 flex items-center text-white transition-all hover:px-5 hover:text-emerald-600 hover:bg-white rounded-s-md">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class=" fill-current h-4 w-4 me-1">
                        <path d="M19.875 3H4.125C2.953 3 2 3.897 2 5v14c0 1.103.953 2 2.125 2h15.75C21.047 21 22 20.103 22 19V5c0-1.103-.953-2-2.125-2zm0 16H4.125c-.057 0-.096-.016-.113-.016-.007 0-.011.002-.012.008L3.988 5.046c.007-.01.052-.046.137-.046h15.75c.079.001.122.028.125.008l.012 13.946c-.007.01-.052.046-.137.046z">
                        </path>
                        <path d="M6 7h6v6H6zm7 8H6v2h12v-2h-4zm1-4h4v2h-4zm0-4h4v2h-4z"></path>
                    </svg>
                    Daftar Episode
                </a>
            </li>
            <li>
                <a href="/logout" class=" font-semibold  py-2 flex items-center text-white transition-all hover:px-5 hover:text-emerald-600 hover:bg-white rounded-s-md">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class=" fill-current h-4 w-4 me-1">
                        <path d="M5 5v14a1 1 0 0 0 1 1h3v-2H7V6h2V4H6a1 1 0 0 0-1 1zm14.242-.97-8-2A1 1 0 0 0 10 3v18a.998.998 0 0 0 1.242.97l8-2A1 1 0 0 0 20 19V5a1 1 0 0 0-.758-.97zM15 12.188a1.001 1.001 0 0 1-2 0v-.377a1 1 0 1 1 2 .001v.376z">
                        </path>
                    </svg>
                    Logout
                </a>
            </li>
        </ul>
        {{-- END NAV LIST --}}
    </section>
    {{-- END_SIDE_BAR --}}
    {{-- ======================================================================================== --}}

    {{-- ======================================================================================== --}}
    {{-- CONTENT --}}
    <section class=" w-full md:w-9/12">
        {{-- infromasi of admin --}}
        <div class=" w-full shadow-md h-20 px-5 hidden md:flex flex-wrap bg-white">
            <div class=" w-1/2 md:w-10/12 flex flex-wrap items-center">
                <span class=" font-bold text-2xl text-slate-800 w-full text-end md:text-start">Dashboard</span>
                <span class=" block text-emerald-500 font-semibold">Hi {{ Auth::user()->name }}, Selamat
                    datang di dashboard</span>
            </div>
            {{-- tampilakan jika di medium --}}
            <div class=" hidden md:w-2/12 md:flex flex-wrap justify-end items-center">
                <img class=" w-3/12 rounded-full" src="https://img1.freepnges.com/20181113/iqx/kisspng-computer-icons-scalable-vector-graphics-portable-n-5beb682f1fbae7.41510561154215428713.jpg" alt="">
                <h2 class=" px-2 font-semibold text-slate-800">{{ Str::upper(Auth::user()->role->name) }}</h2>
            </div>
        </div>
        {{-- end informasi of admin --}}

        {{-- untuk content utama --}}
        {{ $slot }}
        {{-- end untuk content utama --}}
    </section>
    {{-- END CONTENT --}}
    {{-- ======================================================================================== --}}
    <script>
        const burger = document.getElementById("burger");
        const sidebar = document.getElementById("sidebar");

        burger.addEventListener('click', () => {
            sidebar.classList.toggle('hidden')
            burger.classList.toggle('ring-2')
            sidebar.classList.toggle('sidebar-animate')
        })

    </script>
</body>

</html>
