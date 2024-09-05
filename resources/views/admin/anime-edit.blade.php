<x-admin-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <section class=" px-5 w-full mx-auto pb-5 mt-28 md:mt-5">
        <h1 class=" text-center font-bold text-xl pb-5">Edit anime : {{ $anime->name }}</h1>

        {{-- card form --}}
        <div class=" md:w-1/2 w-full container mx-auto ">
            <form action="/dashboard/anime-update/{{ $anime->id }}" method="POST" enctype="multipart/form-data" class=" w-full flex flex-wrap">
                @csrf
                @method('PUT')
                {{-- gambar default --}}
                <input type="hidden" name="imagebawaan" value="{{ $anime->image }}">

                <div class=" w-full flex flex-wrap py-2">
                    <label for="name" class="font-semibold w-full">Masukan Nama anime</label>
                    <input required type="text" name="name" id="name" class="py-1 px-2 shadow-md w-full rounded-md border outline-none" placeholder="Masukan di sini" value="{{ $anime->name }}">
                </div>
                <div class=" w-full flex flex-wrap py-2">
                    <label for="studio" class="font-semibold w-full">Masukan Nama Studio</label>
                    <input required type="text" name="studio" id="studio" class="py-1 px-2 shadow-md w-full rounded-md border outline-none" placeholder="Masukan di sini" value="{{ $anime->studio }}">
                </div>
                <div class=" w-full flex flex-wrap py-2">
                    <label for="producer" class="font-semibold w-full">Masukan Nama producer</label>
                    <input required type="text" name="producer" id="producer" class="py-1 px-2 shadow-md w-full rounded-md border outline-none" placeholder="Masukan di sini" value="{{ $anime->producer }}">
                </div>
                <div class=" w-full flex flex-wrap py-2">
                    <label for="status" class="font-semibold w-full">Pilih status anime</label>
                    <div class=" flex items-center">
                        <div class="me-10 flex">
                            <input required class="me-1" type="radio" name="status" id="ongoing" value="Ongoing" @if($anime->status == 'Ongoing') checked @endif>
                            <label for="ongoing">Ongoing</label>
                        </div>
                        <div class=" me-10 flex">
                            <input required class="me-1" type="radio" name="status" id="completed" value="Completed" @if($anime->status == 'Completed') checked @endif>
                            <label for="ongoing">Completed</label>
                        </div>
                    </div>
                </div>
                <div class=" w-full flex flex-wrap py-2">
                    <label for="image" class="font-semibold w-full  mb-1">Masukan image cover</label>
                    <input type="file" name="image" id="image" class="py-2 px-2 shadow-md w-full rounded-md border outline-none" placeholder="Masukan di sini">
                </div>
                <div class=" w-full flex flex-wrap py-2">
                    <label for="trailer" class="font-semibold w-full">Trailer</label>
                    <input required type="text" name="trailer" id="trailer" class="py-1 px-2 shadow-md w-full rounded-md border outline-none" placeholder="Masukan di sini" value="{{ $anime->trailer }}">
                </div>
                <div class=" w-full flex flex-wrap py-2">
                    <label for="description" class="font-semibold w-full  mb-1">Masukan deskripsi anime</label>
                    <textarea class="border px-2 py-2 outline-none w-full rounded-md shadow-md" name="description" id="" cols="30" rows="8">{{ $anime->description }}</textarea>
                </div>
                <div class=" w-full flex flex-wrap py-2">
                    <button type="submit" class="py-2 px-10 hover:bg-emerald-800 bg-emerald-600 text-white font-bold rounded-md shadow-md">Save</button>
                </div>

            </form>
        </div>
        {{-- end card form --}}
    </section>
</x-admin-layout>
