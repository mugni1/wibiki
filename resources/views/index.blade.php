<x-main-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <section class=" w-full">
        <div class=" container mx-auto mt-24 flex flex-wrap">

            <h1 class="font-bold text-xl w-full mb-3 px-5">Anime Terbaru</h1>

            <div class=" w-full flex flex-wrap">
                @foreach ($animes as $anime)
                <div class=" w-1/2 md:w-2/12 mb-5">
                    {{-- card --}}
                    <div class=" hover:scale-110 transition-all duration-300 border my-2 mx-5 rounded-md overflow-hidden shadow-md hover:shadow-lg">
                        {{-- card-header --}}
                        <div class=" w-full relative group transition-all duration-700">
                            <img src="{{ asset('storage/img/' . $anime->image) }}" alt="" class=" w-full">
                            <div class=" absolute  hidden group-hover:flex bg-slate-800 opacity-70  right-0 left-0 top-0 bottom-0 justify-center items-center">
                                <a href="anime-detail/{{ $anime->id }}" class=" text-white h-full w-full flex justify-center items-center cursor-pointer font-bold ">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class=" fill-current h-20 w-20">
                                        <path d="M7 6v12l10-6z"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        {{-- end-cardheader --}}
                        {{-- card_body --}}
                        <div class=" w-full flex flex-wrap py-2 px-2">
                            <h1 class=" font-bold text-slate-700 text-base text-nowrap text-ellipsis overflow-x-hidden">{{ $anime->name }}</h1>
                        </div>
                        {{-- end card_body --}}
                    </div>
                    {{-- end card --}}
                </div>
                @endforeach

            </div>

        </div>
    </section>

</x-main-layout>
