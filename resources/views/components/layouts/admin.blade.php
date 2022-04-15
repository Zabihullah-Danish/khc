<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />

    {{-- links --}}
    {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script> --}}

    <x-head.tinymce-config/>

    <title>{{ $title ?? 'KHC' }}</title>
</head>
<body>
    
    {{-- Designing admin layout --}}
    <div class="min-h-screen bg-zinc-300 shadow-md">
       <div class="min-h-screen w-full bg-white mx-auto ">
           
            <div class="flex flex-row p-1 shadow-md">

                <div class="w-2/12">
                    <div class="w-20 h-20 rounded-full overflow-hidden mx-auto mt-3">
                        <img class="min-h-full" src="{{ asset('storage/images/logo.jpg') }}" />
                    </div>
                </div>

                <div class="w-10/12 flex flex-row justify-between p-4">
                    
                    <div class="p-4">
                        <button>|||</button>
                    </div>
                    <div class="flex flex-row">

                        <div class="rounded-full w-16 h-16 overflow-hidden">
                            {{-- <img class="min-h-full" src="{{ asset('storage/images/laravel.png') }}"  /> --}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="" class="ionicon" viewBox="0 0 512 512"><title>Login</title><path d="M258.9 48C141.92 46.42 46.42 141.92 48 258.9c1.56 112.19 92.91 203.54 205.1 205.1 117 1.6 212.48-93.9 210.88-210.88C462.44 140.91 371.09 49.56 258.9 48zm126.42 327.25a4 4 0 01-6.14-.32 124.27 124.27 0 00-32.35-29.59C321.37 329 289.11 320 256 320s-65.37 9-90.83 25.34a124.24 124.24 0 00-32.35 29.58 4 4 0 01-6.14.32A175.32 175.32 0 0180 259c-1.63-97.31 78.22-178.76 175.57-179S432 158.81 432 256a175.32 175.32 0 01-46.68 119.25z"/><path d="M256 144c-19.72 0-37.55 7.39-50.22 20.82s-19 32-17.57 51.93C191.11 256 221.52 288 256 288s64.83-32 67.79-71.24c1.48-19.74-4.8-38.14-17.68-51.82C293.39 151.44 275.59 144 256 144z"/></svg>
                        </div>
                        <div class="p-4">
                            @auth
                            <p>{{ Auth::user()->name }}</p>
                        @endauth
                        </div>
                        <div class="p-4">
                            <a class="p-2 bg-stone-100 rounded-md" href="{{ route('index') }}">Home Page</a>
                        </div>
                           
                    </div>

                </div>
                
            </div>
            {{-- Navigation links and content area --}}
            <div class="flex flex-row ">
                <div class="w-2/12 min-h-screen flex flex-col bg-stone-100">
                    <div class="sticky top-0">
                        <div class=" bg-stone-900">
                            <a @if(Auth::user()->blocked) onclick="event.preventDefault(); document.getElementById('logout').submit()" @endif 
                                class="mx-5 p-3 text-white inline-block" href="{{ route('dashboard') }}">Dashboard</a>
                        </div> 
                        
                        <div class="hover:bg-stone-200  @if(!Auth::user()->khc_model->users) hidden @endif">
                            <a href="{{ route('users.index') }}" class="hover:bg-stone-200 mx-5 p-3 rounded-md cursor-pointer inline-block">User Management</a>
                        </div>  
                                          
                        <div class="hover:bg-stone-200 @if(!Auth::user()->khc_model->posts) hidden @endif">
                            <a href="{{ route('posts.index') }}" class=" mx-5 p-3 rounded-md cursor-pointer inline-block">Post Management</a>
                            <div class="hidden">
                                <a href="">One</a>
                                <a href="">two</a>
                            </div>
                        </div>                  
                        
                        <div class="hover:bg-stone-200 @if(!Auth::user()->khc_model->tags) hidden @endif">
                            <a href="{{ route('tags.index') }}" class=" mx-5 p-3 rounded-md cursor-pointer inline-block">Tags Management</a>
                        </div>
                          
                        <div class="hover:bg-stone-200 @if(!Auth::user()->khc_model->ads) hidden @endif">
                            <a href="{{ route('ads.index') }}" class=" mx-5 p-3 rounded-md cursor-pointer inline-block">Ads Management</a>
                        </div>
                       
                        <div class="hover:bg-stone-200 @if(!Auth::user()->khc_model->slider) hidden @endif">
                            <a href="{{ route('slider.index') }}" class=" mx-5 p-3 rounded-md cursor-pointer inline-block">Slider Management</a>
                        </div>
                        <div class="mx-5 p-3 py-28">
                            <div class="mt-20">
                                <a class=" text-red-500" href="{{ route('logout') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 inline" class="ionicon" viewBox="0 0 512 512"><title>Log Out</title><path d="M304 336v40a40 40 0 01-40 40H104a40 40 0 01-40-40V136a40 40 0 0140-40h152c22.09 0 48 17.91 48 40v40M368 336l80-80-80-80M176 256h256" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>
                                    <span class="text-xs font-mono">Logout</span>
                                </a>
                            </div>
                        </div>
                        
                    </div>
                    
                    
                </div>
                <div class="w-10/12 ">
                    {{ $slot }}
                </div>
            </div>
       </div>
    </div>

    <form id="logout" action="{{ route('logout') }}" method="get">@csrf</form>

    <script>
        function goBack() {
        window.history.back();
        }
    </script>

    <script>
        $(document).ready(function() {
        $('#summernote').summernote();
        });
    </script>

<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <script>
        var quill = new Quill('#editor', {
        theme: 'snow'

        });
    </script>
    

    {{-- ionioncs icons --}}
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>
</html>