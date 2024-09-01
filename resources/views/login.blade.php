<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
</head>
<body>
    <section class="min-h-screen w-full flex justify-center items-center">
        {{-- card --}}
        <div class=" w-full md:w-3/12 px-5 mx-10 border shadow-xl rounded-md">
            <div class="w-full my-5">
                <h1 class=" font-bold text-center text-2xl">LOGIN</h1>
            </div>

            {{-- SESSION FLASH SUCCES--}}
            @if(Session::has('status'))
            <div id="notif-succes" class=" w-full mx-auto border-2 bg-red-500 border-red-700 py-3 px-2 mb-5 rounded-md text-white flex show-animate">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class=" fill-current me-2">
                    <path d="M11.953 2C6.465 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.493 2 11.953 2zM13 17h-2v-2h2v2zm0-4h-2V7h2v6z"></path>
                </svg> {{ Session::get('pesan') }}
            </div>
            @endif
            {{-- END SESSION FLASH SUCCES --}}

            <form class="w-full" action="login-auth" method="post">
                @csrf
                <div class=" w-full pb-4">
                    <label for="email" class="font-bold text-slate-800 ">Masukan Email</label>
                    <input class="py-1 px-2 rounded-md shadow-sm border w-full outline-none cursor-pointer" type="email" name="email" id="email" placeholder="Masukan di sini" required>
                </div>
                <div class=" w-full pb-4">
                    <label for="password" class="font-bold text-slate-800 ">Masukan Password</label>
                    <div class=" relative group">
                        <input id="inputpw" class=" relative py-1 px-2 rounded-md shadow-sm border w-full outline-none cursor-pointer" type="password" name="password" id="password" placeholder="Masukan di sini" required>
                        <div id="showpw" class="absolute top-0 bottom-0 right-0 cursor-pointer flex items-center px-2 border-s text-slate-600">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="fill-current h-5 w-5 top-2  right-2  ">
                                <path d="M12 9a3.02 3.02 0 0 0-3 3c0 1.642 1.358 3 3 3 1.641 0 3-1.358 3-3 0-1.641-1.359-3-3-3z"></path>
                                <path d="M12 5c-7.633 0-9.927 6.617-9.948 6.684L1.946 12l.105.316C2.073 12.383 4.367 19 12 19s9.927-6.617 9.948-6.684l.106-.316-.105-.316C21.927 11.617 19.633 5 12 5zm0 12c-5.351 0-7.424-3.846-7.926-5C4.578 10.842 6.652 7 12 7c5.351 0 7.424 3.846 7.926 5-.504 1.158-2.578 5-7.926 5z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class=" w-full pb-4">
                    <button type="submit" class=" w-full py-1 shadow-sm text-white text-center bg-emerald-500 rounded-md font-bold text-base">Submit</button>
                    <div class=" text-blue-600 w-full block text-center py-2 underline text-sm"><a href="/">Masuk sebagai user</a></d>
                    </div>
            </form>
        </div>
        {{-- end_card --}}
    </section>

    <script>
        // LOGIN_SHOW_PW
        const inputpw = document.getElementById("inputpw");
        const showpw = document.getElementById("showpw");

        showpw.onclick = function() {
            if (inputpw.type == "password") {
                inputpw.type = "text";
            } else {
                inputpw.type = "password";
            }
        };

    </script>
</body>
</html>
