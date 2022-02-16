<x-layouts.admin>
    <x-slot name="title">
        Creating ads
    </x-slot>
    <div class="p-2">

        <div class="flex flex-col">

            <div class="flex flex-row justify-between p-2 border mb-1 shadow-sm rounded-md">
                <h1 class="text-2xl">Creating New Ads</h1>
                <a class="p-3 bg-orange-500 hover:bg-orange-600 text-white rounded-md inline-block float-right" href="{{ route('ads.index') }}">Back</a>
            </div>

            <div class="rounded-md border">
                <div>
                    <form action="{{ route('ads.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="flex flex-col">

                            <div class="flex flex-row justify-between p-3">
                                <label class="w-1/6 pl-5 p-3" for="title">Title</label>
                                <div class="w-5/6 flex flex-col">
                                    <input class="bg-gray-00 p-3 rounded-md border @error('title') border-red-500 @enderror focus:outline-none focus:bg-gray-50"
                                    type="text" id="title" name="title" placeholder="Enter ads title here" value="{{ old('title') }}">
                                    @error('title')
                                        <p class="text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                            </div>

                            <div class="flex flex-row justify-between p-3">
                                <label class="w-1/6 pl-5 p-3" for="photo">Ads Photo</label>
                                <div class="w-5/6 flex flex-col">
                                    <input class=" bg-gray-00 p-3 rounded-md border @error('photo') border-red-500 @enderror focus:outline-none focus:bg-gray-50"
                                    type="file" id="photo" name="photo" value="{{ old('photo') }}" >
                                    <span class="text-xs font-mono text-blue-900 font-bold">Photo must be in dimention of maximum 300x500</span>
                                    @error('photo')
                                        <p class="text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                            </div>

                            <div class="flex flex-row justify-between p-3">
                                <label class="w-1/6 pl-5 p-3" for="link">Website Link</label>
                                <input class="w-5/6 bg-gray-00 p-3 rounded-md border @error('link') border-red-500 @enderror focus:outline-none focus:bg-gray-50"
                                 type="text" id="link" name="link" placeholder="Enter website link if exist." value="{{ old('link') }}" >
                            </div>

                            <div class="flex flex-row justify-between p-3">
                                <label class="w-1/6 pl-5 p-3" for="expire_at">Expire date</label>
                                <div class="w-5/6 flex flex-col">
                                    <input class=" bg-gray-00 p-3 rounded-md border @error('expire_at') border-red-500 @enderror focus:outline-none focus:bg-gray-50"
                                    type="date" id="expire_at" name="expire_at" value="{{ old('expire_at') }}" >
                                    @error('expire_at')
                                        <p class="text-red-500">{{ $message }}</p>
                                    @enderror

                                </div>
                                
                            </div>

                            <div class="p-3">
                                <button class="p-3 bg-green-500 hover:bg-green-600 text-white rounded-md float-right" type="submit">Save</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
            
        </div>    
        
    </div>
</x-layouts.admin>