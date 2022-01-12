<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <title>{{ $title ?? 'KHC' }}</title>
</head>
<body>
    
    {{-- Designing admin layout --}}
    <div class="min-h-screen bg-zinc-300">
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
                    <div class=" bg-stone-900">
                        <a class="mx-5 p-3 text-white inline-block" href="{{ route('dashboard') }}">Dashboard</a>
                    </div> 
                    {{-- @if (Auth::user()->is_admin) --}}
                    <div class="hover:bg-stone-200">
                        <a href="{{ route('users.index') }}" class="hover:bg-stone-200 mx-5 p-3 rounded-md cursor-pointer inline-block">User Management</a>
                    </div>  
                    {{-- @endif --}}
                    
                    
                    <div class="hover:bg-stone-200">
                        <a href="{{ route('posts.index') }}" class=" mx-5 p-3 rounded-md cursor-pointer inline-block">Post Management</a>
                    </div>
                    <div class="hover:bg-stone-200">
                        <a href="" class=" mx-5 p-3 rounded-md cursor-pointer inline-block">Tags Management</a>
                    </div>
                    <div class="hover:bg-stone-200">
                        <a href="" class=" mx-5 p-3 rounded-md cursor-pointer inline-block">Ads Management</a>
                    </div>
                    <div class="hover:bg-stone-200">
                        <a href="" class=" mx-5 p-3 rounded-md cursor-pointer inline-block">Slider Management</a>
                    </div>
                    
                </div>
                <div class="w-10/12 ">
                    {{ $slot }}
                </div>
            </div>
       </div>
    </div>

    <script>
        function goBack() {
        window.history.back();
        }
    </script>

</body>
</html>