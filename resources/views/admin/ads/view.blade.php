<x-layouts.admin>
    <x-slot name="title">
        {{ $ad->title }}
    </x-slot>
    <div class="p-2">

        <div class="flex flex-col">

            <div class="flex flex-row justify-between p-2 border mb-1 shadow-sm rounded-md">
                <h1 class="text-2xl">{{ $ad->title }}</h1>
                <div class="px-2">
                    <a class="p-3 bg-orange-500 hover:bg-orange-600 text-white rounded-md inline-block float-right" href="{{ route('ads.index') }}">Back</a>
                </div>
                
            </div>

            <div class="rounded-md border">
                <div class="flex flex-row p-3 ">
                    <p>Expire Date</p>
                    <p class="ml-12 text-gray-600">{{ $ad->expire_at }}</p>
                </div>
                <div class="flex flex-row p-3 ">
                    <p>Website Link</p>
                    <a class="ml-12 text-blue-500 underline" href="{{ $ad->website_link }}" target="_blank">{{ $ad->website_link }}</a>
                </div>
                <div class="p-3">
                    <div class="rounded-md">
                        <img src="{{ asset('storage/ads/' . $ad->ads_photo) }}" alt="">
                    </div>
                </div>
            </div>
            
        </div>    
        
    </div>
</x-layouts.admin>