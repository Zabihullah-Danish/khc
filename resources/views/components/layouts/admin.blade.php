<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ url('css/app.css') }}" rel="stylesheet" />

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
       <div class="min-h-screen max-w-7xl bg-white mx-auto ">
           
            <div class="flex flex-row p-1 shadow-md">

                <div class="w-2/12">
                    <div class="w-20 h-20 rounded-full overflow-hidden mx-auto mt-3">
                        <img class="min-h-full" src="{{ asset('storage/images/download.jpg') }}" />
                    </div>
                </div>

                <div class="w-10/12 flex flex-row justify-between p-4">
                    
                    <div class="p-4">
                        <button>|||</button>
                    </div>
                    <div class="flex flex-row">

                        <div class="rounded-full w-16 h-16 overflow-hidden">
                            <img class="min-h-full" src="{{ asset('storage/images/laravel.png') }}"  />
                        </div>
                        <div class="p-4">
                            @auth
                            <p>{{ Auth::user()->name }}</p>
                        @endauth
                        </div>
                        <div class="p-4">
                            <a class="p-2 bg-stone-400 rounded-md" href="{{ route('logout') }}">Logout</a>
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