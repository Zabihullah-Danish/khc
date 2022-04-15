<x-layouts.admin>
    <x-slot name="title">
        Dashboard
    </x-slot>
    <div class="p-2">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 p-10">
            <div class="w-60 h-60 border rounded-md overflow-hidden shadow-md hover:shadow hover:shadow-sky-500 transition-all">
                <div class="h-5/6 bg-fuchsia-300 py-14 text-7xl hover:text-8xl transition-all duration-700 cursor-pointer">
                    <h1 class=" text-gray-200 text-center">{{ $users->count() }}</h1>
                </div>
                <div class="h-1/6 bg-fuchsia-400">
                    <a href="{{ route('users.index') }}"><h1 class="text-2xl text-center text-white hover:text-blue-500">Users</h1></a>
                </div>
            </div>
            <div class="w-60 h-60 border rounded-md overflow-hidden shadow-md hover:shadow hover:shadow-sky-500 transition-all">
                <div class="h-5/6 bg-violet-300 py-14 text-7xl hover:text-8xl transition-all duration-700 cursor-pointer">
                    <h1 class=" text-gray-200 text-center">
                        @if(Auth::user()->is_admin)
                        {{ $posts->count() }}
                        @else
                        {{ auth()->user()->posts->count() }}
                        @endif
                    </h1>
                </div>
                <div class="h-1/6 bg-violet-400">
                    <a href="{{ route('posts.index') }}"><h1 class="text-2xl text-center text-white hover:text-blue-500">Posts</h1></a>
                </div>
            </div>
            @if(Auth::user()->is_admin)
            <div class="w-60 h-60 border rounded-md overflow-hidden shadow-md hover:shadow hover:shadow-sky-500 transition-all">
                <div class="h-5/6 bg-sky-300 py-14 text-7xl hover:text-8xl transition-all duration-700 cursor-pointer">
                    <h1 class=" text-gray-200 text-center">{{ $trashedPosts->count() }}</h1>
                </div>
                <div class="h-1/6 bg-sky-400">
                    <a href="{{ route('posts.trashed') }}"><h1 class="text-2xl text-center text-white hover:text-blue-500">Trashed Posts</h1></a>
                </div>
            </div>
            @endif
            <div class="w-60 h-60 border rounded-md overflow-hidden shadow-md hover:shadow hover:shadow-sky-500 transition-all">
                <div class="h-5/6 bg-pink-300 py-14 text-7xl hover:text-8xl transition-all duration-700 cursor-pointer">
                    <h1 class=" text-gray-200 text-center">
                        @if(Auth::user()->is_admin)
                        {{ $ads->count() }}
                        @else
                        {{ auth()->user()->advertisements->count() }}
                        @endif
                    </h1>
                </div>
                <div class="h-1/6 bg-pink-400">
                    <a href="{{ route('ads.index') }}"><h1 class="text-2xl text-center text-white hover:text-blue-500">Advertisements</h1></a>
                </div>
            </div>
            <div class="w-60 h-60 border rounded-md overflow-hidden shadow-md hover:shadow hover:shadow-sky-500 transition-all">
                <div class="h-5/6 bg-rose-300 py-14 text-7xl hover:text-8xl transition-all duration-700 cursor-pointer">
                    <h1 class=" text-gray-200 text-center">{{ $sliders->count() }}</h1>
                </div>
                <div class="h-1/6 bg-rose-400">
                    <a href="{{ route('slider.index') }}"><h1 class="text-2xl text-center text-white hover:text-blue-500">Slider</h1></a>
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin>