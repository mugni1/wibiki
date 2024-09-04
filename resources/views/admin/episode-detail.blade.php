<x-admin-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    {{-- //STREAM --}}
    <section class="mt-28 md:mt-5 w-full px-5">
        {{-- Dekstop --}}
        <iframe src="{{ $video->api }}" height="480" class=" w-full rounded-md hidden md:block" allow="autoplay"></iframe>
        {{-- Mobile / Tablet --}}
        <iframe src="{{ $video->api }}" height="280" class=" w-full rounded-md md:hidden" allow="autoplay"></iframe>
    </section>
    {{-- //END STREAM --}}

    <section class=" py-5 px-5 w-full flex flex-wrap ">
        <div class=" flex justify-between text-emerald-600 mb-2 pb-2 border-emerald-600 border-b w-full">
            <h1 class=" font-bold text-xl ">Episode {{ $video->episode }}</h1>
            <h1 class=" text-xl font-semibold">{{ $video->name }}</h1>
        </div>
        <h1 class=" font-bold text-lg w-full text-slate-700">{{ $video->anime->name }}</h1>
    </section>
</x-admin-layout>
