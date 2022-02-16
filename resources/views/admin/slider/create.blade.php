<x-layouts.admin>
    <x-slot name="title">
        Add to slider
    </x-slot>
    <div class="p-2">

        <div class="flex flex-col">

            <div class="flex flex-row justify-between p-2 border mb-1 shadow-sm rounded-md">
                <h1 class="text-2xl">Adding to slider</h1>
                <a class="p-3 bg-orange-500 hover:bg-orange-600 text-white rounded-md inline-block float-right" href="{{ route('slider.index') }}">Back</a>
            </div>

            <div class="rounded-md border">
                <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-col p-3 space-y-2">

                        <div class="flex flex-row ">
                            <div class="w-2/12 pl-6 pt-3">
                                <label class="" for="title">Title</label>
                            </div>
                            <div class="w-10/12 pl-4">
                                <input class="bg-gray-00 p-3 rounded-md border @error('title') border-red-500 @enderror
                                placeholder:italic
                                w-full focus:outline-none focus:bg-gray-50"
                                type="text" id="title" name="title" placeholder="Enter Title" value="{{ old('title') }}">
                                @error('title')
                                <p class="text-red-500">{{ $message }}</p>
                                @enderror
                            </div> 
                        </div>

                        <div class="flex flex-row ">
                            <div class="w-2/12 pl-6 pt-3">
                                <label class="" for="image">Image</label>
                            </div>
                            <div class="w-10/12 pl-4">
                                <input class="bg-gray-00 p-3 rounded-md border @error('image') border-red-500 @enderror
                                file:text-violet-600 file:rounded-full file:border-0 file:px-3
                                file:shadow-md file:shadow-violet-700 file:py-2 file:hover:text-white file:hover:bg-violet-500
                                w-full focus:outline-none focus:bg-gray-50"
                                type="file" id="image" name="image" value="{{ old('image') }}">
                                @error('image')
                                <p class="text-red-500">{{ $message }}</p>
                                @enderror
                            </div> 
                        </div>

                        <div class="flex flex-row ">
                            <div class="w-2/12 pl-6 pt-3">
                                <label class="" for="description">Description</label>
                            </div>
                            <div class="w-10/12 pl-4">
                                <input class="bg-gray-00 p-3 rounded-md border @error('description') border-red-500 @enderror w-full focus:outline-none focus:bg-gray-50"
                                type="text" id="description" name="description" placeholder="Enter Description" value="{{ old('description') }}">
                                @error('description')
                                <p class="text-red-500">{{ $message }}</p>
                                @enderror
                            </div> 
                        </div>

                        <div>
                            <div class="p-3 float-right">
                                <button class="bg-green-500 hover:bg-green-600 p-3 text-white rounded" type="submit">Save</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
            
        </div>    
        
    </div>
</x-layouts.admin>