<x-layouts.client>
   
    <x-slot name="slider">
        <div class="slideshow-container">

            @foreach($sliders as $slider)
            <div class="mySlides fade">
                {{-- <div class="numbertext">1 / 3</div> --}}
                <img class="w-full h-[30rem]" src="{{ asset('storage/slider/'. $slider->image) }}">
                <div class="absolute p-2 bottom-2 items-center w-full text-center">
                    <div class="mx-auto text-4xl border border-sky-300
                    bg-sky-900 bg-opacity-40
                    animate-pulse transition-shadow shadow-md rounded-md shadow-sky-300 inline-block p-3 text-gray-200 font-mono">
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
                    <p class="text-xs text-gray-400">{{ $post->created_at }}</p>
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
                {{ $post->tags }}
            </div>
            <div class="p-2 mt-1">
                <h1 class="text-xl font-mono">See also smillair posts</h1>
                <hr>
                @foreach($postByCategories as $postCategory)

                <div class="p-2">
                    <a class="" href="{{ route('viewPostDetails',$postCategory) }}">
                        <div class="flex flex-row rounded-md border border-gray-100 overflow-hidden mb-3 shadow-sm hover:shadow-lg hover:shadow-sky-100 hover:border-gray-200 transition-all duration-500">
                            <div class="w-auto h-48 rounded-md overflow-hidden">
                                <img class="w-56 h-48 rounded-md" src="{{ asset('storage/uploads/' . $postCategory->image) }}" alt="">
                            </div>
                            <div class="flex flex-col h-48 overflow-clip p-2 w-full">
                                <div class="h-24 overflow-clip">
                                    <h1 class="text-4xl leading-loose">{{ $postCategory->title }}</h1>
                                </div>
                                <div class="h-14 overflow-hidden">
                                    <p class="text-justify">{!! $postCategory->content !!}</p>
                                </div>
                                <div class="h-8 flex flex-row justify-between">
            
                                    <span class="text-gray-500">&nbsp;Read more...</span>
                                    <div class="flex flex-row space-x-2">
                                        <p class="text-xs text-gray-400 mt-1">{{ ucfirst($postCategory->category->category) }}</p>
                                        <p class="text-xs text-gray-400 mt-1">{{ $postCategory->created_at }}</p>
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
        <div>
            <h1 class="text-xl text-blue-400 p-2 font-serif text-right  animate-pulse animate-bounce transition-all duration-700">آعلانات شما در اینجا با کمترین قیمت</h1>
        </div>
        <div class="flex flex-col space-y-3 w-[19rem]">
            @foreach($ads as $ad)
            @if($ad->expire_at != date('Y-m-d'))
            <a href="{{ $ad->website_link }}" target="_blank">
                <div class="w-auto h-auto border rounded overflow-hidden">
                    <img class="" src="{{ asset('storage/ads/' . $ad->ads_photo) }}" width="100%" height="100%" alt="">
                </div>
            </a>
            @endif
            @endforeach
        </div>
    </x-slot>

</x-layouts.client>