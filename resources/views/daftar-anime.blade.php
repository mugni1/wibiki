<x-main-layout>
    <x-slot:title>{{ Asu }}</x-slot:title>
    <section class=" w-full mt-24 pb-5">
        <div class=" container mx-auto px-5 w-full">
            <form action="" method="get" class=" w-1/2 flex shadow-md">
                <input type="text" name="keyword" class=" w-10/12 border py-1 px-2 outline-none rounded-s-md" placeholder="Search Anime ...">
                <button class=" w-2/12  bg-slate-600 font-bold text-white rounded-e-md">Search</button>
            </form>
        </div>
    </section>
</x-main-layout>

{{-- Script --}}
<script>
    const navbar = document.getElementById('navbar');
    navbar.classList.remove('hidden')

</script>
{{-- END SCRIPT --}}
