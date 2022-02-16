<x-layouts.admin>
    <x-slot name="title">
        Advertisements
    </x-slot>
    <div class="p-2">

        <div class="flex flex-col">

            <div class="flex flex-row justify-between p-2 border mb-1 shadow-sm rounded-md">
                <h1 class="text-2xl">Advertisements</h1>
                <a class="p-3 bg-blue-600 hover:bg-blue-700 text-white rounded-md inline-block float-right
                @if(!Auth::user()->permission->create_ads) invisible @endif" href="{{ route('ads.create') }}">New Ads</a>
            </div>

            <x-message />

            <div class="rounded-md border h-auto">
                <div class="p-2">
                    <div class="flex flex-row ">
                        <div class="w-4/6 p-2">
                            <p class="font-bold">Title</p>
                        </div>
                        <div class="w-1/6 p-2">
                            <p class="font-bold">Expiration Date</p>
                        </div>
                        <div class="w-1/6 p-2">
                            <p class="font-bold">Actions</p>
                        </div>
                    </div>
                    @forelse ($ads as $ad)
                    
                    <div class="flex flex-row justify-between border-b  hover:bg-sky-50 rounded
                         hover:text-blue-600
                         @if($ad->expire_at <= date('Y-m-d')) bg-pink-400 text-white @endif">
                        <div class="w-4/6 p-2">
                            <p>{{ $ad->title }}</p>
                        </div>
                        <div class="w-1/6 p-2">
                            @if($ad->expire_at <= date('Y-m-d'))
                            <p>Expired</p>
                            @else
                            <p>{{ $ad->expire_at }}</p>
                            @endif
                        </div>
                        <div class="w-1/6 text-xs p-2 flex flex-row">
                            <div>
                                <a class="bg-gray-500 hover:bg-white hover:text-gray-500 border hover:border-gray-500 p-2 rounded text-white
                                @if(!Auth::user()->permission->view_ads) hidden @endif inline-block"
                                 href="{{ route('ads.show', $ad) }}">View</a>
                            </div>
                            <div>
                                <a class="bg-blue-500 hover:bg-white hover:text-blue-500 border hover:border-blue-500 p-2 rounded text-white 
                                @if(!Auth::user()->permission->edit_ads) hidden @endif inline-block"
                                 href="{{ route('ads.edit', $ad) }}">Edit</a>
                            </div>
                            <div>
                                <form action="{{ route('ads.destroy', $ad) }}" method="POST" onsubmit="return confirm('Are you sure to delete the Ads')">
                                    @csrf
                                    @method('delete')
                                    <input class="inline-block bg-red-500 hover:bg-white hover:text-red-500 border 
                                     @if(!Auth::user()->permission->delete_ads) hidden @endif
                                     hover:border-red-500 p-2 rounded text-white cursor-pointer"
                                     type="submit" name="" id="" value="Delete">
                                </form>
                            </div>
                            
                        </div>
                    </div>
                    

                    @empty
                        <div>
                            User didn't make any ads yet.
                        </div>
                    @endforelse
                </div>
            </div>
            
        </div>    
        
    </div>
</x-layouts.admin>