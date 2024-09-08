<x-admin-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <section class=" px-5 w-full mx-auto pb-5 mt-28 md:mt-5">
        <h1 class=" text-center font-bold text-xl pb-5">Edit Episode</h1>
        {{-- card form --}}
        <div class=" md:w-1/2 w-full container mx-auto ">
            <form action="/dashboard/episode-update/{{ $video->id }}" method="POST" enctype="multipart/form-data" class=" w-full flex flex-wrap">
                @csrf
                <input type="hidden" name="oldthumbnail" value="{{ $video->thumbnail }}">
                @method('PUT')
                <div class=" w-full flex flex-wrap py-2">
                    <label for="name" class="font-semibold w-full">Masukan Nama Episode</label>
                    <input required type="text" name="name" id="name" class="py-1 px-2 shadow-md w-full rounded-md border outline-none" placeholder="Masukan di sini" value="{{ $video->name }}">
                </div>
                <div class=" w-full flex flex-wrap py-2">
                    <label for="episode" class="font-semibold w-full">Episode ke</label>
                    <input required type="number" name="episode" id="episode" class="py-1 px-2 shadow-md w-full rounded-md border outline-none" placeholder="Masukan di sini" value="{{ $video->episode }}">
                </div>
                <div class=" w-full flex flex-wrap py-2">
                    <label for="thumbnail" class="font-semibold w-full">Thumbnail</label>
                    <input type="file" name="thumbnail" id="thumbnail" class="py-1 px-2 shadow-md w-full rounded-md border outline-none">
                </div>
                <div class=" w-full flex flex-wrap py-2">
                    <label for="api" class="font-semibold w-full">Maskan Api / Link Stream</label>
                    <input required type="text" name="api" id="api" class="py-1 px-2 shadow-md w-full rounded-md border outline-none" placeholder="Masukan di sini" value="{{ $video->api }}">
                </div>
                <div class=" w-full flex flex-wrap py-2">
                    <label for="anime_id" class="font-semibold w-full">Pilih Anime</label>
                    <select name="anime_id" id="anime_id" class="py-2 px-2 shadow-md w-full rounded-md border outline-none">
                        @foreach ($animes as $anime )
                        <option @if($anime->id == $video->anime_id) selected @endif value="{{ $anime->id }}">{{ $anime->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class=" w-full flex flex-wrap py-2">
                    <button type="submit" class="py-2 px-10 hover:bg-emerald-800 bg-emerald-600 text-white font-bold rounded-md shadow-md">Save</button>
                </div>
            </form>
        </div>
        {{-- end card form --}}
    </section>
</x-admin-layout>
