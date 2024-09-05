<x-main-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    {{-- Gambar dan Iformasi anime --}}
    <section class="w-full px-5 py-5 flex flex-wrap mt-24">
        {{-- cover anime --}}
        <div class=" w-full pb-5  md:w-1/2  xl:w-4/12">
            <img class=" w-full md:w-11/12 xl:w-8/12 rounded-lg shadow-lg" src="{{ asset('storage/img/' . $anime->image) }}" alt="">
        </div>
        {{-- cover anime --}}
        {{-- Informasi --}}
        <div class=" w-full md:w-1/2  xl:w-8/12 text-base text-justify">
            <h1 class=" text-2xl font-bold pb-5 text-slate-800">{{ $anime->name }}</h1>
            <table class="font-bold hidden md:block text-slate-800 mb-5">
                <tr>
                    <td class="pe-5">Status</td>
                    @if($anime->status == "Completed")
                    <td>: <span class="ms-2 rounded-md text-emerald-600 ">{{ $anime->status }}</span></td>
                    @else
                    <td>: <span class="ms-2 rounded-md text-red-600 ">{{ $anime->status }}</span></td>
                    @endif
                </tr>
                <tr>
                    <td class="pe-5">Studio</td>
                    <td>: <span class="ms-2">{{ $anime->studio }}</span></td>
                </tr>
                <tr>
                    <td class="pe-5">Producer</td>
                    <td>: <span class="ms-2">{{ $anime->producer }}</span></td>
                </tr>
            </table>
            <div class="md:hidden w-full flex flex-wrap">
                <span class=" w-full font-bold text-slate-700 text-lg">Status</span>
                @if($anime->status == "Completed")
                <span> <span class=" text-emerald-600 font-semibold">{{ $anime->status }}</span></span>
                @else
                <span> <span class=" text-red-600 ">{{ $anime->status }}</span></span>
                @endif
            </div>
            <div class="md:hidden w-full flex flex-wrap">
                <span class=" w-full font-bold text-slate-700 text-lg">Studio</span>
                <span> <span class="font-semibold">{{ $anime->studio }}</span></span>
            </div>
            <div class="md:hidden w-full flex flex-wrap mb-5">
                <span class=" w-full font-bold text-slate-700 text-lg">Producer</span>
                <span> <span class="font-semibold ">{{ $anime->producer }}</span></span>
            </div>
            <h1 class=" font-bold text-xl pb-3 text-slate-800">Deskirpsi</h1>
            <p class=" text-slate-500">{{ $anime->description }}</p>
        </div>
        {{-- end ifromasi anime --}}
    </section>
    {{--End Gambar dan Iformasi anime --}}


    {{-- EPISODE --}}
    <section class="w-full px-5 py-5 flex flex-wrap">
        {{-- TRAILER < MD --}}
        <div class=" md:hidden block w-full mb-4">
            <h1 class=" font-bold w-full text-2xl mb-3">Trailer</h1>
            <iframe class="w-full rounded-md" height="210" src="https://www.youtube.com/embed/62r_G9bEPlU?si=K7ADzoNDpBnUczqX&amp;start=3" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
        {{-- // PLAY EPISODE --}}
        <div class="w-full md:w-1/2 mb-4">
            <h1 class=" font-bold w-full text-2xl mb-2">Play Episode</h1>
            @if($anime->videos->count() == 0)
            <h1 class=" font-semibold py-2 p-3 bg-red-600  rounded-md my-2 w-full text-white text-center ring-2 ring-red-800">Belum Ada Episode</h1>
            @endif
            <ul class=" w-full md:pe-5 text-white">
                @foreach ($anime->videos as $episode)
                <li class=" py-1 w-full">
                    <a class=" w-full py-2 px-2 rounded-md bg-green-600 flex items-center justify-between" href="/episode-detail/{{ $episode->id }}">
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
        </div>
        {{-- TRAILER MD + --}}
        <div class=" hidden md:block md:w-1/2">
            <h1 class=" font-bold w-full text-2xl mb-3">Trailer</h1>
            <iframe class="w-full rounded-md" height="380" src="https://www.youtube.com/embed/62r_G9bEPlU?si=K7ADzoNDpBnUczqX&amp;start=3" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
    </section>
    {{--END EPISODE --}}
</x-main-layout>
