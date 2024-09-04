<x-main-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    {{-- Gambar dan Deskripsi --}}
    <section class="w-full px-5 py-5 flex flex-wrap mt-24">
        {{-- gambar --}}
        <div class=" w-full pb-5 md:w-4/12 flex items-center justify-start">
            <img class=" w-full md:w-8/12 rounded-lg shadow-lg" src="{{ asset('storage/img/' . $anime->image) }}" alt="">
        </div>
        {{-- deskripsi --}}
        <div class=" w-full md:w-8/12 text-base text-justify">
            <h1 class=" text-2xl font-bold pb-5">{{ $anime->name }}</h1>
            <h1 class=" font-bold text-xl pb-3 text-slate-800">Deskirpsi</h1>
            <p class=" text-slate-500">{{ $anime->description }}</p>
        </div>
    </section>
    {{--End Gambar dan Deskripsi --}}

    {{-- INFORMASI ANIME  --}}
    <section class="w-full px-5 py-5 flex flex-wrap">
        <table class=" w-full ">
            <tr>
                <th class=" border px-2 md:w-3/12">Nama</th>
                <th class=" border px-2 md:w-3/12">Status</th>
                <th class=" border px-2 md:w-3/12 hidden md:table-cell">Studio</th>
                <th class=" border px-2 md:w-3/12 hidden md:table-cell">Producer</th>
            </tr>
            <tr>
                <td class=" border px-2 text-center ">{{ $anime->name }}</td>
                <td class=" border px-2 text-center">{{ $anime->status }}</td>
                <td class=" border px-2 text-center hidden md:table-cell">{{ $anime->studio }}</td>
                <td class=" border px-2 text-center hidden md:table-cell">{{ $anime->producer }}</td>
            </tr>
            <tr class=" md:hidden ">
                <th class=" border px-2 text-center">Studio</th>
                <th class=" border px-2 text-center">Producer</th>
            </tr>
            <tr class=" md:hidden ">
                <td class=" border px-2 text-center">{{ $anime->studio }}</td>
                <td class=" border px-2 text-center">{{ $anime->producer }}</td>
            </tr>
        </table>
    </section>
    {{--END INFORMASI ANIME  --}}

    {{-- EPISODE --}}
    <section class="w-full px-5 py-5 flex flex-wrap">
        <h1 class=" font-bold w-full text-2xl mb-2">Episode</h1>
        @if($anime->videos->count() == 0)
        <h1 class=" font-semibold py-2 p-3 bg-red-600  rounded-md my-2 w-full text-white text-center ring-2 ring-red-800">Belum Ada Episode</h1>
        @endif
        <ul class=" w-full md:w-1/2 text-white">
            @foreach ($anime->videos as $episode)
            <li class=" py-1 w-full">
                <a class=" w-full py-2 px-2 rounded-md bg-green-600 flex items-center justify-between" href="/dashboard/episode-detail/{{ $episode->id }}">
                    <span>
                        Episode-{{ $episode->episode }} | {{ $episode->name }}
                    </span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="fill-current  h-8 w-8">
                        <path d="M7 6v12l10-6z"></path>
                    </svg>
                </a>
            </li>
            @endforeach
        </ul>
    </section>
    {{--END EPISODE --}}
</x-main-layout>
