<x-main-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <section class=" w-full mt-24">
        <form action="" method="get" class=" w-full flex  container mx-auto px-5">
            <input type="text" name="keyword" class=" w-11/12 border py-1 px-2">
            <button class=" w-1/12 border bg-slate-600 font-bold text-white rounded-md">Search</button>
        </form>
    </section>

    <section class=" w-full">
        <div class=" container mx-auto flex flex-wrap">
            {{-- JUDUL --}}
            <h1 class="font-bold text-xl w-full mb-3 px-5">Anime Terbaru</h1>
            {{-- END JUDUL --}}
            <div class=" w-full flex flex-wrap">
                @foreach ($animes as $anime)
                {{-- BOX-CARD --}}
                <div class=" w-1/2 md:w-3/12 xl:w-2/12 mb-5">
                    {{-- card --}}
                    <div class=" hover:scale-110 transition-all duration-300 border my-2 mx-5 rounded-md overflow-hidden shadow-md hover:shadow-lg">
                        {{-- card-header --}}
                        <div style="background-image: url({{ asset('storage/img/' . $anime->image) }});" class=" h-52 md:h-60 w-full relative group transition-all duration-700 overflow-hidden bg-cover bg-center">
                            <div class=" absolute hidden group-hover:flex bg-slate-800 opacity-70  right-0 left-0 top-0 bottom-0 justify-center items-center">
                                <a href="anime-detail/{{ $anime->id }}" class=" text-white h-full w-full flex justify-center items-center cursor-pointer font-bold ">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class=" fill-current h-20 w-20">
                                        <path d="M7 6v12l10-6z"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        {{-- end-cardheader --}}
                        {{-- card_body --}}
                        <div class=" w-full flex flex-wrap pt-2 pb-4 px-2 h-1/6">
                            <h1 class=" font-bold text-slate-700 text-base text-nowrap text-ellipsis overflow-x-hidden mb-2">{{ $anime->name }}</h1>
                            <h1 class=" w-full font-semibold py-1 px-2 text-center text-slate-500  rounded-full border">{{ $anime->status }}</h1>
                        </div>
                        {{-- end card_body --}}
                    </div>
                    {{-- end card --}}
                </div>
                {{-- END-BOX-CARD --}}
                @endforeach
            </div>
        </div>
    </section>

</x-main-layout>
