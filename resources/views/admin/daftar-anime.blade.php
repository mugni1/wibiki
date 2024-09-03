<x-admin-layout>
    {{-- Title --}}
    <x-slot:title>{{ $title }}</x-slot:title>
    {{-- Title --}}

    {{-- SECTION OF BTN ADD ANIME AND SHOW TRAHSHED --}}
    <section class=" px-5 w-full mx-auto flex justify-between my-5 mt-28 md:mt-5">
        <a class=" flex justify-center items-center py-2 px-3 bg-emerald-500 text-white rounded-full hover:bg-emerald-700 shadow-md" href="/dashboard/anime-add">
            <span class=" font-semibold"> Add New Anime</span>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class=" mx-2 h-5 w-5 fill-current">
                <path d="M6 22h12a2 2 0 0 0 2-2V8l-6-6H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2zm7-18 5 5h-5V4zM8 14h3v-3h2v3h3v2h-3v3h-2v-3H8v-2z"></path>
            </svg>
        </a>
        <a class=" flex justify-center items-center py-2 px-3 bg-emerald-500 text-white rounded-full hover:bg-emerald-700 shadow-md" href="/dashboard/anime-trashed">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class=" h-5 w-5 fill-current">
                <path d="m21.224 15.543-.813-1.464-1.748.972.812 1.461c.048.085.082.173.104.264a1.024 1.024 0 0 1-.014.5.988.988 0 0 1-.104.235 1 1 0 0 1-.347.352.978.978 0 0 1-.513.137H14v-2l-4 3 4 3v-2h4.601c.278 0 .552-.037.811-.109a2.948 2.948 0 0 0 1.319-.776c.178-.179.332-.38.456-.593a2.992 2.992 0 0 0 .336-2.215 3.163 3.163 0 0 0-.299-.764zM5.862 11.039l-2.31 4.62a3.06 3.06 0 0 0-.261.755 2.997 2.997 0 0 0 .851 2.735c.178.174.376.326.595.453A3.022 3.022 0 0 0 6.236 20H8v-2H6.236a1.016 1.016 0 0 1-.5-.13.974.974 0 0 1-.353-.349 1 1 0 0 1-.149-.468.933.933 0 0 1 .018-.245c.018-.087.048-.173.089-.256l2.256-4.512 1.599.923L8.598 8 4 9.964l1.862 1.075zm12.736 1.925L19.196 8l-1.638.945-2.843-5.117a2.95 2.95 0 0 0-1.913-1.459 3.227 3.227 0 0 0-.772-.083 3.003 3.003 0 0 0-1.498.433A2.967 2.967 0 0 0 9.41 3.944l-.732 1.464 1.789.895.732-1.465c.045-.09.101-.171.166-.242a.933.933 0 0 1 .443-.27 1.053 1.053 0 0 1 .53-.011.963.963 0 0 1 .63.485l2.858 5.146L14 11l4.598 1.964z"></path>
            </svg>
        </a>
    </section>
    {{--END SECTION OF BTN ADD ANIME AND SHOW TRAHSHED --}}

    {{-- SECTION SEARCH ANIME --}}
    <section class="px-5 w-full mx-auto pb-5">
        <form class=" w-full flex flex-wrap" action="" method="GET">
            <input class=" w-10/12 border py-2 px-3 rounded-s-md md:w-11/12 outline-none" type="text" name="keywords" placeholder="Search of name ..." id="">
            <button class=" w-2/12 py-1 px-3 bg-slate-600 rounded-e-md text-white md:w-1/12 flex justify-center items-center" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class=" fill-current w-8 h-8">
                    <path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z"></path>
                    <path d="M11.412 8.586c.379.38.588.882.588 1.414h2a3.977 3.977 0 0 0-1.174-2.828c-1.514-1.512-4.139-1.512-5.652 0l1.412 1.416c.76-.758 2.07-.756 2.826-.002z"></path>
                </svg>
            </button>
        </form>
    </section>
    {{--END SECTION SEARCH ANIME --}}

    {{-- SESSION FLASH SUCCES--}}
    @if(Session::has('status'))
    <section class="px-5 w-full mx-auto pb-5">
        <div id="notif-succes" class=" w-full mx-auto border-2 bg-green-500 border-green-700 py-3 px-5 rounded-md text-white flex show-animate">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class=" fill-current me-2">
                <path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path>
            </svg> {{ Session::get('pesan') }}
        </div>
    </section>
    @endif
    {{-- END SESSION FLASH SUCCES --}}

    {{-- Section of Table Anime --}}
    <section class="px-5 w-full pb-5">
        {{-- TABLE --}}
        <table class=" w-full me-5 shadow-md">
            <tr>
                <th class=" border w-7/12 md:w-3/12 py-2">Name</th>
                <th class=" hidden md:table-cell border w-2/12">Status</th>
                <th class=" hidden md:table-cell border  w-4/12">Studio</th>
                <th class=" border w-5/12 md:w-3/12" colspan=" 3"><span class="hidden md:block">Edit / Delete / Read</span><span class="block md:hidden">Action</span></th>
            </tr>
            @foreach ($animes as $anime)
            <tr>
                <td class=" border px-5">{{ $anime->name }}</td>
                <td class=" hidden md:table-cell border text-center">
                    @if($anime->status == "Completed")
                    <div class=" py-1 bg-green-300 text-green-700 rounded-md mx-2 my-2">{{ $anime->status }}</div>
                    @elseif($anime->status == "Ongoing")
                    <div class=" py-1 bg-red-300 text-red-700 rounded-md mx-2 my-2">{{ $anime->status }}</div>
                    @endif
                </td>
                <td class=" hidden md:table-cell border px-5">{{ $anime->studio }}</td>
                <td class=" border ">
                    <a href="/dashboard/anime-edit/{{ $anime->id }}" class=" w-9/12 mx-auto flex justify-center py-2 bg-yellow-500 rounded-md text-white my-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class=" fill-current h-5 w-5 ">
                            <path d="m18.988 2.012 3 3L19.701 7.3l-3-3zM8 16h3l7.287-7.287-3-3L8 13z"></path>
                            <path d="M19 19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .896-2 2v14c0 1.104.897 2 2 2h14a2 2 0 0 0 2-2v-8.668l-2 2V19z"></path>
                        </svg>
                    </a>
                </td>
                <td class=" border ">
                    <form action="/dashboard/anime-delete/{{ $anime->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="name" value="{{ $anime->name }}">
                        <button onclick=" return confirm('Apakah anda yakin akan menghapus data ini')" class=" w-9/12 mx-auto flex justify-center py-2 bg-red-500 rounded-md text-white my-2" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class=" fill-current h-5 w-5 ">
                                <path d="M6 7H5v13a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7H6zm4 12H8v-9h2v9zm6 0h-2v-9h2v9zm.618-15L15 2H9L7.382 4H3v2h18V4z"></path>
                            </svg>
                        </button>
                    </form>
                </td>
                <td class=" border ">
                    <a href="/dashboard/anime-detail/{{ $anime->id }}" class=" w-9/12 mx-auto flex justify-center py-2 bg-sky-500 rounded-md text-white my-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class=" fill-current h-5 w-5 ">
                            <path d="M12 5c-7.633 0-9.927 6.617-9.948 6.684L1.946 12l.105.316C2.073 12.383 4.367 19 12 19s9.927-6.617 9.948-6.684l.106-.316-.105-.316C21.927 11.617 19.633 5 12 5zm0 11c-2.206 0-4-1.794-4-4s1.794-4 4-4 4 1.794 4 4-1.794 4-4 4z"></path>
                            <path d="M12 10c-1.084 0-2 .916-2 2s.916 2 2 2 2-.916 2-2-.916-2-2-2z"></path>
                        </svg>
                    </a>
                </td>
            </tr>
            @endforeach
        </table>
        {{-- END TABLE --}}

        {{-- NEXT AND PREVIOUS --}}
        <div class=" w-full flex flex-wrap justify-between items-center my-5 py-2">
            <div class=" w-full W md:w-4/12 font-semibold mb-5">
                {{ $animes->withQueryString()->links() }}
            </div>
            <div class=" w-full md:w-4/12 font-semibold">
                <p>Halaman {{ $animes->currentPage() }} dari {{ $animes->lastPage() }}.</p>
            </div>
            <div class=" w-full md:w-4/12">
                <p class=" w-full">Menampilkan {{ $animes->count() }} dari {{ $animes->total() }} postingan</p>
            </div>
        </div>
        {{--END NEXT AND PREVIOUS --}}
    </section>
    {{--End Section of Table Anime --}}
</x-admin-layout>
