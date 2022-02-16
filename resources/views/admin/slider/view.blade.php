<x-layouts.admin>
    <x-slot name="title">
        {{ $slider->title }}
    </x-slot>
    <div class="p-2">

        <div class="flex flex-col">

            <div class="flex flex-row justify-between p-2 border mb-1 shadow-sm rounded-md">
                <h1 class="text-2xl">{{ $slider->title }}</h1>
                <a onclick="goBack()" class="p-3 bg-orange-500 hover:bg-orange-600 text-white rounded-md inline-block float-right cursor-pointer" >Back</a>
            </div>

            <div class="rounded-md border">
                <div class="flex flex-col">
                    <div class="p-3 ">
                        <p class="">{{ $slider->description }}</p>
                    </div>
                    <div class="p-3">
                        <img class="rounded-md" src="{{ asset('storage/slider/' . $slider->image) }}" alt="">
                    </div>
                </div>
            </div>
            
        </div>    
        
    </div>
</x-layouts.admin>