<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/slider.css') }}" rel="stylesheet" />
    {{-- <link href="{{ asset('css/hidden.css') }}" rel="stylesheet" /> --}}
    <title>{{ $title ?? 'Blog' }}</title>
</head>
<body class="bg-white" onmouseout="dropdownClose()">

    {{-- Navigation Bar --}}
    <div class="bg-white">
        <div class="bg-white text-gray-700 shadow">
            <div class="container max-w-7xl mx-auto flex justify-between">
                <div class="flex p-2">
                    <div>
                        <img class="inline" src="{{ asset('storage/images/laravel.png') }}" width="90" />
                    </div>
                    <div>
                        <a class="p-4 inline-block hover:bg-stone-100 hover:text-sky-500 rounded-md font-serif" href="{{ route('index') }}">Home</a>
                    </div>
                    <div>
                        <button onmouseover="dropdownOpen()" class="p-4 inline-block hover:bg-stone-100 hover:text-sky-500 rounded-md font-sans" >Services
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 inline" class="ionicon" viewBox="0 0 512 512"><title>Chevron Down</title><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M112 184l144 144 144-144"/></svg>
                        </button>
                        <div style="display: none;" id="dropdown" onmouseover="dropdownOpen()"   class="absolute z-10 hidden">
                            <ul class=" bg-gray-50 text-gray-600 shadow rounded">
                                {{ $categoryList }}
                            </ul>
                        </div>
                    </div>
                    <div>
                        <a class="p-4 inline-block hover:bg-stone-100 hover:text-sky-500 rounded-md" href="">Contact</a>
                    </div>
                    <div>
                        <a class="p-4 inline-block hover:bg-stone-100 hover:text-sky-500 rounded-md" href="{{ route('about') }}">About</a>
                    </div>
                    {{-- <div class="p-1 pl-6 relative">
                        <input onclick="search()" class="p-2 pl-3 border border-gray-100 rounded-full w-96 -mr-14 focus:outline-none shadow " type="search" name="search" placeholder="Search content">
                        <input class="-ml-3 p-1 text-xs bg-gray-700 text-gray-400 rounded-full" type="submit" value="Search" name="submit">
                        <div id="searchArea" class="absolute border z-10 hidden mt-5 bg-white transition-all duration-300 delay-500 left-0">
                            <div class="w-full left-0 relative  transition-all duration-300 delay-500">
                                <p>Search Content here</p>
                            </div>
                        </div>
                    </div> --}}
                    
                    
                </div>
                <div class="p-2">
                    @if(Auth::user())
                    <div class="flex">
                        <h1 class="p-4 text-green-500 h-4 inline">{{ Auth::user()->name }}</h1>
                        <a href="{{ route('dashboard') }}" class="p-4">
                            {{-- <svg xmlns="http://www.w3.org/2000/svg" class="w-6" class="ionicon" viewBox="0 0 512 512"><title>Dashboard</title><path d="M262.29 192.31a64 64 0 1057.4 57.4 64.13 64.13 0 00-57.4-57.4zM416.39 256a154.34 154.34 0 01-1.53 20.79l45.21 35.46a10.81 10.81 0 012.45 13.75l-42.77 74a10.81 10.81 0 01-13.14 4.59l-44.9-18.08a16.11 16.11 0 00-15.17 1.75A164.48 164.48 0 01325 400.8a15.94 15.94 0 00-8.82 12.14l-6.73 47.89a11.08 11.08 0 01-10.68 9.17h-85.54a11.11 11.11 0 01-10.69-8.87l-6.72-47.82a16.07 16.07 0 00-9-12.22 155.3 155.3 0 01-21.46-12.57 16 16 0 00-15.11-1.71l-44.89 18.07a10.81 10.81 0 01-13.14-4.58l-42.77-74a10.8 10.8 0 012.45-13.75l38.21-30a16.05 16.05 0 006-14.08c-.36-4.17-.58-8.33-.58-12.5s.21-8.27.58-12.35a16 16 0 00-6.07-13.94l-38.19-30A10.81 10.81 0 0149.48 186l42.77-74a10.81 10.81 0 0113.14-4.59l44.9 18.08a16.11 16.11 0 0015.17-1.75A164.48 164.48 0 01187 111.2a15.94 15.94 0 008.82-12.14l6.73-47.89A11.08 11.08 0 01213.23 42h85.54a11.11 11.11 0 0110.69 8.87l6.72 47.82a16.07 16.07 0 009 12.22 155.3 155.3 0 0121.46 12.57 16 16 0 0015.11 1.71l44.89-18.07a10.81 10.81 0 0113.14 4.58l42.77 74a10.8 10.8 0 01-2.45 13.75l-38.21 30a16.05 16.05 0 00-6.05 14.08c.33 4.14.55 8.3.55 12.47z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg> --}}
                            <span class="text-gray-600 hover:text-sky-500">Dashboard</span>
                        </a>
                        <a href="{{ route('logout') }}" class="p-4 text-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6" class="ionicon" viewBox="0 0 512 512"><title>Log Out</title><path d="M304 336v40a40 40 0 01-40 40H104a40 40 0 01-40-40V136a40 40 0 0140-40h152c22.09 0 48 17.91 48 40v40M368 336l80-80-80-80M176 256h256" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>
                        </a>
                    </div>
                    
                    @else
                    <a class="inline-block p-4 text-gray-600 rounded-full hover:shadow hover:shadow-sky-500 " href="{{ route('login') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6" class="ionicon" viewBox="0 0 512 512"><title>Login</title><path d="M258.9 48C141.92 46.42 46.42 141.92 48 258.9c1.56 112.19 92.91 203.54 205.1 205.1 117 1.6 212.48-93.9 210.88-210.88C462.44 140.91 371.09 49.56 258.9 48zm126.42 327.25a4 4 0 01-6.14-.32 124.27 124.27 0 00-32.35-29.59C321.37 329 289.11 320 256 320s-65.37 9-90.83 25.34a124.24 124.24 0 00-32.35 29.58 4 4 0 01-6.14.32A175.32 175.32 0 0180 259c-1.63-97.31 78.22-178.76 175.57-179S432 158.81 432 256a175.32 175.32 0 01-46.68 119.25z"/><path d="M256 144c-19.72 0-37.55 7.39-50.22 20.82s-19 32-17.57 51.93C191.11 256 221.52 288 256 288s64.83-32 67.79-71.24c1.48-19.74-4.8-38.14-17.68-51.82C293.39 151.44 275.59 144 256 144z"/></svg>
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
        {{-- Slider --}}
        <div class="container max-w-7xl border border-gray-100 mx-auto shadow-2xl shadow-gray-300">

            <div class=" rounded-md w-full h-auto">
               
                {{ $slider }}
                
            </div>
        </div>

        {{-- Content here --}}

        <div class="container max-w-7xl mx-auto bg-white shadow-2xl shadow-gray-300 ">

            <div class="flex flex-row">

                <div class="w-9/12 m-1">
                    {{ $slot }}
                </div>

                <div class="w-3/12 m-1">

                   {{$ads}}

                </div>

            </div>
            
        </div>

        {{-- Footer --}}
        <div class="bg-stone-100">
            <div class="containter max-w-7xl p-1 bg-stone-100 mx-auto">
                <div class="grid grid-flow-col grid-cols-4 p-4 ml-10 ">
                    <div class="flex flex-col text-gray-500">
                        <h2 class="font-bold btn-primary pb-3">Services</h2>
                        <div class="flex flex-col text-gray-400">
                            {{ $services }}
                        </div>
                    </div>

                    <div class="font-bold text-gray-500">
                        <h1 class=" pb-3">About</h1>
                        <div class="pr-4 text-gray-400">
                            <a class="font-normal hover:text-sky-500" href="{{ route('about') }}">Karwan hedayat trading company...</a>
                        </div>
                    </div>
                    <div class="">
                        <h1 class="font-bold text-gray-500 pb-3">Contact</h1> 
                        <div class="text-gray-400 font-mono">
                            <p class="hover:text-sky-500 cursor-pointer"><span class=" text-xl">&#9993; </span>info@khc.af</p>
                            <p class="hover:text-sky-500 cursor-pointer"><span class=" text-xl">&#9990; </span>+93799624470</p>
                        </div> 
                    </div>
                    <div class="font-bold text-gray-500">
                        <h1 class="pb-3">Follow Us</h1>
                        <div class="flex flex-row space-x-1">
                            <a href="">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 opacity-60 hover:opacity-100" class="ionicon" viewBox="0 0 512 512"><title></title><path d="M480 257.35c0-123.7-100.3-224-224-224s-224 100.3-224 224c0 111.8 81.9 204.47 189 221.29V322.12h-56.89v-64.77H221V208c0-56.13 33.45-87.16 84.61-87.16 24.51 0 50.15 4.38 50.15 4.38v55.13H327.5c-27.81 0-36.51 17.26-36.51 35v42h62.12l-9.92 64.77H291v156.54c107.1-16.81 189-109.48 189-221.31z" fill-rule="evenodd"/></svg>
                            </a>
                            <a href="">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 opacity-60 hover:opacity-100" class="ionicon" viewBox="0 0 512 512"><title></title><path d="M508.64 148.79c0-45-33.1-81.2-74-81.2C379.24 65 322.74 64 265 64h-18c-57.6 0-114.2 1-169.6 3.6C36.6 67.6 3.5 104 3.5 149 1 184.59-.06 220.19 0 255.79q-.15 53.4 3.4 106.9c0 45 33.1 81.5 73.9 81.5 58.2 2.7 117.9 3.9 178.6 3.8q91.2.3 178.6-3.8c40.9 0 74-36.5 74-81.5 2.4-35.7 3.5-71.3 3.4-107q.34-53.4-3.26-106.9zM207 353.89v-196.5l145 98.2z"/></svg>
                            </a>
                            <a href="">

                            </a>
                        </div>
                    </div>

                </div>
               
            </div>
            <div class="text-center p-2 bg-stone-200 flex flex-row justify-center">
                <h1 class="text-gray-400 text-sm">Developed by <span class="font-bold text-zinc-400">Zabihullah Danish&nbsp;&nbsp;</span></h1>
                <a class="text-white inline-block" href="https://github.com/Zabihullah-Danish">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 opacity-60 hover:opacity-100" class="ionicon" viewBox="0 0 512 512"><title>Zabihullah-Danish</title><path d="M256 32C132.3 32 32 134.9 32 261.7c0 101.5 64.2 187.5 153.2 217.9a17.56 17.56 0 003.8.4c8.3 0 11.5-6.1 11.5-11.4 0-5.5-.2-19.9-.3-39.1a102.4 102.4 0 01-22.6 2.7c-43.1 0-52.9-33.5-52.9-33.5-10.2-26.5-24.9-33.6-24.9-33.6-19.5-13.7-.1-14.1 1.4-14.1h.1c22.5 2 34.3 23.8 34.3 23.8 11.2 19.6 26.2 25.1 39.6 25.1a63 63 0 0025.6-6c2-14.8 7.8-24.9 14.2-30.7-49.7-5.8-102-25.5-102-113.5 0-25.1 8.7-45.6 23-61.6-2.3-5.8-10-29.2 2.2-60.8a18.64 18.64 0 015-.5c8.1 0 26.4 3.1 56.6 24.1a208.21 208.21 0 01112.2 0c30.2-21 48.5-24.1 56.6-24.1a18.64 18.64 0 015 .5c12.2 31.6 4.5 55 2.2 60.8 14.3 16.1 23 36.6 23 61.6 0 88.2-52.4 107.6-102.3 113.3 8 7.1 15.2 21.1 15.2 42.5 0 30.7-.3 55.5-.3 63 0 5.4 3.1 11.5 11.4 11.5a19.35 19.35 0 004-.4C415.9 449.2 480 363.1 480 261.7 480 134.9 379.7 32 256 32z"/></svg>
                </a>
                <a class="inline-block" href="https://www.linkedin.com/in/zabihullah-danish-0b3114181/">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 opacity-60 hover:opacity-100" class="ionicon" viewBox="0 0 512 512"><title>Zabihullah Danish</title><path d="M444.17 32H70.28C49.85 32 32 46.7 32 66.89v374.72C32 461.91 49.85 480 70.28 480h373.78c20.54 0 35.94-18.21 35.94-38.39V66.89C480.12 46.7 464.6 32 444.17 32zm-273.3 373.43h-64.18V205.88h64.18zM141 175.54h-.46c-20.54 0-33.84-15.29-33.84-34.43 0-19.49 13.65-34.42 34.65-34.42s33.85 14.82 34.31 34.42c-.01 19.14-13.31 34.43-34.66 34.43zm264.43 229.89h-64.18V296.32c0-26.14-9.34-44-32.56-44-17.74 0-28.24 12-32.91 23.69-1.75 4.2-2.22 9.92-2.22 15.76v113.66h-64.18V205.88h64.18v27.77c9.34-13.3 23.93-32.44 57.88-32.44 42.13 0 74 27.77 74 87.64z"/></svg>
                </a>
            </div>
        </div>

        <script src="{{ asset('js/slider.js') }}"></script>
        <script>
            function goBack()
            {
                window.history.back();
            }

           

            function dropdownOpen()
            {

                // var x = document.getElementById("dropdown");
                document.getElementById('dropdown').style.display = "block";
                // x.classList.toggle('hidden');
            }

            function dropdownClose()
            {
                document.getElementById('dropdown').style.display = 'none';
            }

            function search()
            {
                var search = document.getElementById('searchArea');
                search.classList.toggle('hidden');
            }

            
        </script>

        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>