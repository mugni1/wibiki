<x-main-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    {{-- //STREAM --}}
    <section class="mt-24 w-full px-5 mb-5">
        {{-- Dekstop --}}
        <iframe src="{{ $video->api }}" height="480" class=" w-full rounded-md hidden md:block" allow="autoplay" allowfullscreen></iframe>
        {{-- Mobile / Tablet --}}
        <iframe src="{{ $video->api }}" height="280" class=" w-full rounded-md md:hidden" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    </section>
    {{-- //END STREAM --}}

    {{-- INFORMATION  --}}
    <section class=" mb-5 px-5 w-full flex flex-wrap ">
        <div class=" flex justify-between text-emerald-600 mb-2 pb-2 border-emerald-600 border-b w-full">
            <h1 class=" font-bold text-xl ">Episode {{ $video->episode }}</h1>
            <h1 class=" text-xl font-semibold">{{ $video->name }}</h1>
        </div>
        <h1 class=" font-bold text-lg w-full text-slate-700">{{ $video->anime->name }}</h1>
    </section>
    {{-- END INFORMATION --}}

    {{-- DOWNLOAD ANIME --}}
    <section class=" mb-5 px-5 w-full flex flex-wrap">
        <h1 class=" w-full text-slate-800 font-semibold">Stream</h1>
        <div class=" w-full">
            <button class=" py-1 mb-1 shadow-md px-5 text-white bg-emerald-600 rounded-md">360p</button>
            <button class=" py-1 mb-1 shadow-md px-5 text-white bg-emerald-600 rounded-md">480p</button>
            <button class=" py-1 mb-1 shadow-md px-5 text-white bg-emerald-600 rounded-md">720p - HD</button>
            <button class=" py-1 mb-1 shadow-md px-5 text-white bg-emerald-600 rounded-md">1080p - FHD</button>
        </div>
    </section>
    {{-- END DOWNLOAD ANIME --}}
    {{-- DOWNLOAD ANIME --}}
    <section class=" mb-5 px-5 w-full flex flex-wrap">
        <h1 class=" w-full text-slate-800 font-semibold">Download</h1>
        <div class=" w-full">
            <button class=" py-1 mb-1 shadow-md px-5 text-white bg-sky-600 rounded-md">360p</button>
            <button class=" py-1 mb-1 shadow-md px-5 text-white bg-sky-600 rounded-md">480p</button>
            <button class=" py-1 mb-1 shadow-md px-5 text-white bg-sky-600 rounded-md">720p - HD</button>
            <button class=" py-1 mb-1 shadow-md px-5 text-white bg-sky-600 rounded-md">1080p - FHD</button>
        </div>
    </section>
    {{-- END DOWNLOAD ANIME --}}
</x-main-layout>
