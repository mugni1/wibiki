<x-admin-layout>
    {{-- Title --}}
    <x-slot:title>Home</x-slot:title>
    {{-- End Title --}}

    {{-- Informasi_Anime_episode_Category --}}
    <section class=" px-5 mt-28 md:mt-10 flex flex-row justify-between gap-2 md:gap-5 ">
        {{-- card --}}
        <div class=" w-4/12 flex flex-wrap items-center px-5 py-2 shadow-md rounded-xl border bg-yellow-600">
            <h1 class="w-full text-xl font-bold text-white">{{ $animes->total() }}</h1>
            <h1 class=" w-full text-slate-200">Anime</h1>
        </div>
        {{-- endcard --}}
        {{-- card --}}
        <div class=" w-4/12 flex flex-wrap items-center px-5 py-2 shadow-md rounded-xl border bg-purple-600">
            <h1 class="w-full text-xl font-bold text-white">{{ $videos->total() }}</h1>
            <h1 class=" w-full text-slate-200">Episode</h1>
        </div>
        {{-- endcard --}}
        {{-- card --}}
        <div class=" w-4/12 flex flex-wrap items-center px-5 py-2 shadow-md rounded-xl border bg-pink-600">
            <h1 class="w-full text-xl font-bold text-white">100</h1>
            <h1 class=" w-full text-slate-200">Category</h1>
        </div>
        {{-- endcard --}}
    </section>
    {{--End Informasi_Anime_episode_Category --}}

    {{-- Section of Table Anime --}}
    <section class=" px-5 w-full mt-10 pb-5">
        <h1 class=" py-2 px-5 mb-5 text-xl font-bold text-white bg-emerald-600 inline-block rounded-lg">Top 10 Anime Terbaru</h1>
        <table class=" w-full me-5 shadow-lg">
            <tr>
                <th class=" border w-3/12 py-2">Name</th>
                <th class=" hidden md:table-cell border w-2/12">Status</th>
                <th class=" hidden md:table-cell h-full border w-4/12">Studio</th>
                <th class=" border w-3/12" colspan=" 3"><span class="hidden md:block">Edit / Delete / Read</span><span class="block md:hidden">Action</span></th>
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
                    <a href="/anime-edit/{{ $anime->id }}" class=" w-9/12 mx-auto flex justify-center py-2 bg-yellow-500 rounded-md text-white my-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class=" fill-current h-5 w-5">
                            <path d="m18.988 2.012 3 3L19.701 7.3l-3-3zM8 16h3l7.287-7.287-3-3L8 13z"></path>
                            <path d="M19 19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .896-2 2v14c0 1.104.897 2 2 2h14a2 2 0 0 0 2-2v-8.668l-2 2V19z"></path>
                        </svg>
                    </a>
                </td>
                <td class=" border ">
                    <a href="/anime-delete/{{ $anime->id }}" class=" w-9/12 mx-auto flex justify-center py-2 bg-red-500 rounded-md text-white my-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class=" fill-current h-5 w-5">
                            <path d="M6 7H5v13a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7H6zm4 12H8v-9h2v9zm6 0h-2v-9h2v9zm.618-15L15 2H9L7.382 4H3v2h18V4z"></path>
                        </svg>
                    </a>
                </td>
                <td class=" border ">
                    <a href="/dashboard/anime-detail/{{ $anime->id }}" class=" w-9/12 mx-auto flex justify-center py-2 bg-sky-500 rounded-md text-white my-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class=" fill-current h-5 w-5">
                            <path d="M12 5c-7.633 0-9.927 6.617-9.948 6.684L1.946 12l.105.316C2.073 12.383 4.367 19 12 19s9.927-6.617 9.948-6.684l.106-.316-.105-.316C21.927 11.617 19.633 5 12 5zm0 11c-2.206 0-4-1.794-4-4s1.794-4 4-4 4 1.794 4 4-1.794 4-4 4z"></path>
                            <path d="M12 10c-1.084 0-2 .916-2 2s.916 2 2 2 2-.916 2-2-.916-2-2-2z"></path>
                        </svg>
                    </a>
                </td>
            </tr>
            @endforeach
        </table>
    </section>
    {{--End Section of Table Anime --}}

</x-admin-layout>
