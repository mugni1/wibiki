<x-main-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    {{-- CONTAINER INFROMASI ANIME --}}
    <section class=" w-full">
        {{-- BACGROUND --}}
        <section class=" w-full h-full absolute top-0 z-0 bg-no-repeat bg-cover bg-center" style="background-image: url('{{ asset('storage/img/'. $anime->image) }}')"></section>
        <section class=" w-full absolute top-0 z-10  h-full  bg-gradient-to-b  from-transparent  to-white backdrop-blur-sm"></section>
        {{-- END BACKGROUND --}}
        {{-- Gambar dan Iformasi anime --}}
        <section class="w-full min-h-screen px-5 flex flex-wrap items-center relative z-20 ">
            {{-- cover anime --}}
            <div class=" w-full pb-5 md:pb-0  md:w-3/12  xl:w-4/12">
                <img class=" w-full md:w-10/12 xl:w-8/12 rounded-lg shadow-lg shadow-slate-600" src="{{ asset('storage/img/' . $anime->image) }}" alt="">
            </div>
            {{-- cover anime --}}
            {{-- Informasi --}}
            <div class=" w-full md:w-9/12  xl:w-8/12 text-base text-justify rounded-md md:bg-slate-800 mt-5 md:mt-0 md:p-5 md:bg-opacity-60">
                <h1 class=" text-2xl font-bold pb-2 mb-2 text-black md:text-white border-b border-black md:border-white">{{ $anime->name }}</h1>
                {{-- Informasi mode tablet dan dekstop --}}
                <table class="font-bold hidden md:block text-white md:text-sm xl:text-lg">
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
                {{-- Informasi mode dekstop --}}
                {{-- Informasi di mode HP --}}
                <div class="md:hidden w-full flex flex-wrap">
                    <span class=" w-full font-bold text-slate-700 text-lg">Status</span>
                    @if($anime->status == "Completed")
                    <span> <span class=" text-teal-600 font-semibold">{{ $anime->status }}</span></span>
                    @else
                    <span> <span class=" text-red-600 ">{{ $anime->status }}</span></span>
                    @endif
                </div>
                <div class="md:hidden w-full flex flex-wrap">
                    <span class=" w-full font-bold text-slate-800 text-lg">Studio</span>
                    <span> <span class="font-semibold text-slate-600">{{ $anime->studio }}</span></span>
                </div>
                <div class="md:hidden w-full flex flex-wrap mb-5">
                    <span class=" w-full font-bold text-slate-800 text-lg">Producer</span>
                    <span> <span class="font-semibold text-slate-600">{{ $anime->producer }}</span></span>
                </div>
                {{--end Informasi di mode HP --}}
                <p class="md:text-slate-300 text-black text-sm xl:text-base">{{ $anime->description }}</p>
            </div>
            {{-- end ifromasi anime --}}
        </section>
        {{--End Gambar dan Iformasi anime --}}
    </section>
    {{-- end CONTAINER INFROMASI ANIME --}}

    {{-- EPISODE --}}
    <section class="w-full px-5 py-5 flex flex-wrap">
        {{-- TRAILER < MD --}}
        <div class=" md:hidden block w-full mb-4">
            <h1 class=" font-bold w-full text-2xl mb-3">Trailer</h1>
            @if($anime->trailer != null)
            <iframe class="w-full rounded-md" height="210" src="{{ $anime->trailer }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            @else
            <h1 class=" font-semibold py-2 p-3 bg-red-600  rounded-md my-2 w-full text-white text-center ring-2 ring-red-800">Tidak ada trailer</h1>
            @endif
        </div>
        {{-- // PLAY EPISODE --}}
        <div class="w-full md:w-1/2 mb-4">
            <h1 class=" font-bold w-full text-2xl mb-2">Play Episode</h1>
            @if($anime->videos->count() == 0)
            <h1 class=" font-semibold py-2 my-3 bg-red-600  rounded-md w-full text-white text-center ring-2 ring-red-800">Belum Ada Episode</h1>
            @endif
            <ul class=" w-full md:pe-5 text-white">
                @foreach ($anime->videos as $episode)
                <li class=" w-full mb-2">
                    <a class=" w-full py-2 px-2 rounded-md bg-teal-600 flex items-center justify-between" href="/episode-detail/{{ $episode->id }}">
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
        <div class=" hidden md:block md:w-5/12 mx-auto">
            <h1 class=" font-bold w-full text-2xl mb-3">Trailer</h1>
            @if($anime->trailer != null)
            <iframe class="w-full mx-auto rounded-md" height="360" src="{{ $anime->trailer }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            @else
            <h1 class=" font-semibold py-2 my-3 bg-red-600  rounded-md w-full text-white text-center ring-2 ring-red-800">Tidak ada trailer</h1>
            @endif
        </div>
    </section>
    {{--END EPISODE --}}
</x-main-layout>
