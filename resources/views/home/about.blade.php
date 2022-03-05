<x-layouts.client>

    <x-slot name="title">
        Karwan Hedayat Trading company
    </x-slot>

    <x-slot name="categoryList">
        @foreach($categories as $category)
            <li class=" hover:bg-gray-600 hover:text-sky-500 px-7 @if($category->posts->count() == 0) hidden @endif 
                @if($category->category == "about") hidden @endif">
                <a class="inline-block p-3" href="{{ route('viewPostsByCategory', $category) }}">{{ $category->category }}</a>
            </li>
        @endforeach
    </x-slot>

    <x-slot name="slider">
        <div class="slideshow-container">

            @foreach($sliders as $slider)
            <div class="mySlides fade">
                {{-- <div class="numbertext">1 / 3</div> --}}
                <img class="w-full h-[30rem]" src="{{ asset('storage/slider/'. $slider->image) }}">
                <div class="absolute p-2 bottom-2 items-center w-full text-center">
                    <div class="mx-auto text-4xl border border-sky-300
                    bg-sky-900 bg-opacity-40
                    animate-pulse transition-shadow shadow-md rounded-md shadow-sky-300 inline-block p-3 text-sky-300 font-mono">
                        {{ $slider->title }}
                    </div>
                </div>
                
                <div class="hidden">
                    <span class="dot"></span> 
                </div>
               
            </div>
            @endforeach

        </div>
        
    </x-slot>
  
    <div class="p-2">

        <div>
            @foreach ($categories as $category)
                @if($category->category == "about")
                    @foreach ($category->posts as $post)
                        <h1 class="text-3xl">{{ $post->title }}</h1>
                        <hr>
                        <p>{!! $post->content !!}</p>
                        {{-- <img  src="{{ asset('storage/uploads/'. $post->image) }}" width="50%" alt=""> --}}
                    @endforeach
                @endif
                
            @endforeach
        </div>

    </div>

    <x-slot name="ads">
        
        <div class="flex flex-col space-y-3 w-[19rem] py-2">
            @foreach($ads as $ad)
            @if($ad->expire_at >= date('Y-m-d'))
            <a href="{{ $ad->website_link }}" target="_blank">
                <div class="w-auto h-auto border rounded overflow-hidden">
                    <img class="" src="{{ asset('storage/ads/' . $ad->ads_photo) }}" width="100%" height="100%" alt="">
                </div>
            </a>
            @endif
            @endforeach
        </div>
    </x-slot>

    <x-slot name="services">
        @foreach($categories as $category)
            <a class="hover:text-sky-500 @if($category->category == "about") hidden @endif" href="{{ route('viewPostsByCategory', $category) }}">{{ $category->category }}</a>
        @endforeach
    </x-slot>

</x-layouts.client>