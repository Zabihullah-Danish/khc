<x-layouts.admin>
    <x-slot name="title">
        {{ $post->title }}
    </x-slot>
    <div class="p-2">

        <div class="flex flex-col">

            <div class="flex flex-row justify-between p-2 border mb-1 shadow-sm rounded-md">
                
                <h1 class="text-2xl px-4 font-bold">{{ $post->title }}</h1>
                <div>
                    <a class="p-3 bg-orange-500 hover:bg-orange-600 text-white rounded-md inline-block float-right cursor-pointer" onclick="goBack()">Back</a> 
                </div>
               
            </div>

            <div class="rounded-md border p-2">
                <span class="text-xs text-gray-500 p-2">{{ $post->category->category }}</span>
                <p class="text-justify">{!! $post->content !!}</p>
                <img class="w-full h-[600px]" src="{{ asset('storage/uploads/'. $post->image) }}"  width="50%" />
            </div>
            
        </div>    
        
    </div>
</x-layouts.admin>