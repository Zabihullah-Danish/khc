<x-layouts.client>

    <x-slot name="title">
        {{ $post->title }}
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

        <div class="flex flex-col">
            <div class="p-2 flex flex-row justify-between">
                <div class="flex flex-row space-x-2">
                    <p class="text-xs text-gray-400">{{ ucfirst($post->category->category) }}</p>
                    <p class="text-xs text-gray-400">{{ date_format($post->created_at,"Y-m-d") }}</p>
                </div>
                
                <button class="font-bold text-xl " onclick="goBack()">&larrhk;</button>
            </div>
            
            <div class="p-2">
                <h1 class="text-3xl font-bold text-justify">{{ $post->title }}</h1>
            </div>
            <div class="p-2">
                <img class="rounded-md" src="{{ asset('storage/uploads/' . $post->image) }}" alt="loading picture">
            </div>
            <div class="p-2">
                <p class="text-justify overflow-hidden">{!! $post->content !!}</p>
            </div>
            <div class="p-2">
                
                <h1 class="font-bold">Tags:</h1>
                <hr class="border-2">
            </div>
            <div class="p-2 flex flex-row space-x-2 ">
                @foreach($post->tags as $tag)
                <a href="{{ route('viewPostDetails',$post) }}" class="px-3 py-2 border hover:border-gray-400 cursor-pointer text-gray-600">{{ $tag->tag }}</a>
                @endforeach
            </div>
            <div class="p-2 mt-1">
                <h1 class="text-2xl font-mono bg-sky-500 text-white p-2 rounded">See also similar posts</h1>
                
                @foreach($postByCategories as $post)

                <div class="p-2">
                    <a class="" href="{{ route('viewPostDetails',$post) }}">
                        <div class="flex flex-row rounded-md border border-gray-100 overflow-hidden mb-3 shadow-sm hover:shadow-lg hover:shadow-sky-100 hover:border-gray-200 transition-all duration-500">
                            <div class="w-auto h-48 rounded-md overflow-hidden">
                                <img class="w-56 h-48 rounded-md" src="{{ asset('storage/uploads/' . $post->image) }}" alt="">
                            </div>
                            <div class="flex flex-col h-48 overflow-clip p-2 w-full">
                                <div class="h-24 overflow-clip">
                                    <h1 class="text-4xl leading-loose">{{ $post->title }}</h1>
                                </div>
                                <div class="h-14 overflow-hidden">
                                    <p class="text-justify">{!! $post->content !!}</p>
                                </div>
                                <div class="h-8 flex flex-row justify-between">
            
                                    <span class="text-gray-500">&nbsp;Read more...</span>
                                    <div class="flex flex-row space-x-2">
                                        <div class="text-xs flex space-x-1 text-gray-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4" class="ionicon" viewBox="0 0 512 512"><title>Eye</title><path d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>
                                            <span class="mt-1 pt-0.5 text-xs">{{ $post->views->count() }}</span>
                                        </div>
                                        <p class="text-xs text-gray-400 mt-1">{{ ucfirst($post->category->category) }}</p>
                                        <p class="text-xs text-gray-400 mt-1">{{ date_format($post->created_at,"Y-m-d") }}</p>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </a>
                    
                </div>
                @endforeach
            </div>

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