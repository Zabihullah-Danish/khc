<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/slider.css') }}" rel="stylesheet" />
    <title>{{ $title ?? 'Blog' }}</title>
</head>
<body class="bg-white">
    {{-- Navigation Bar --}}
    <div class="bg-stone-900">
        <div class="bg-stone-900 text-white">
            <div class="container max-w-7xl mx-auto flex justify-between">
                <div class="">
                    <img class="inline" src="{{ asset('storage/images/laravel.png') }}" width="100" />
                    <a class="p-4 inline-block hover:bg-stone-800 rounded-md" href="{{ route('index') }}">Home</a>
                    <a class="p-4 inline-block hover:bg-stone-800 rounded-md" href="">Services</a>
                    <a class="p-4 inline-block hover:bg-stone-800 rounded-md" href="">Contact</a>
                    <a class="p-4 inline-block hover:bg-stone-800 rounded-md" href="">About</a>
                </div>
                <div>
                    <a class="inline-block p-4 hover:text-green-500 hover:font-bold transition-all duration-200 delay-100" href="{{ route('login') }}">Login</a>
                </div>
            </div>
        </div>
    </div>
        {{-- Slider --}}
        <div class="container max-w-7xl border border-gray-100 mx-auto shadow">

            <div class=" rounded-md w-full h-auto">
               
                {{ $slider }}
                
            </div>
        </div>

        {{-- Content here --}}
        <div class="container max-w-7xl mx-auto bg-white shadow-md border border-gray-100">

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
        <div class="bg-stone-900">
            <div class="containter max-w-7xl p-1 bg-stone-800 text-white mx-auto">
                <div class="grid grid-flow-col grid-cols-4 p-4 ml-10 ">
                    <div class="flex flex-col text-gray-200">
                        <h2 class="font-bold btn-primary">Services</h2>
                        <a class="hover:pl-2 transition-all duration-500 delay-150 hover:text-green-500" href="">IT Solutions</a>
                        <a class="hover:pl-2 transition-all duration-200" href="">Web Development</a>
                        <a class="hover:pl-2 transition-all duration-200" href="">Queue System Installation</a>
                        <a class="hover:pl-2 transition-all duration-200" href="">Web Development</a>
                    </div>

                    <div class="">About Us</div>
                    <div class="">
                        Contact Us
                    </div>
                    <div>
                        Follow Us
                    </div>

                </div>
            </div>
        </div>

        <script src="{{ asset('js/slider.js') }}"></script>
        <script>
            function goBack()
            {
                window.history.back();
            }
        </script>

        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>