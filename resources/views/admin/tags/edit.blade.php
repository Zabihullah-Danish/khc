<x-layouts.admin>
    <x-slot name="title">
        Tags Management
    </x-slot>
    <div class="p-2">

        <div class="flex flex-col">

            <div class="flex flex-row justify-between p-2 border mb-1 shadow-sm rounded-md">
                <h1 class="text-2xl">List of Tags attached with all Posts</h1>
                <a class="p-3 bg-orange-600 hover:bg-orange-700 text-white rounded-md inline-block float-right" href="{{ route('tags.index') }}">Cancel</a>
            </div>

            <x-message />

            <div class="rounded-md border">
                <div class="shadow-xl shadow-sky-300 mb-3">
                    <form action="{{ route('tags.update',$tag) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="flex flex-row justify-center p-2 px-6">
                            <input class="bg-gray-00 p-3 rounded-md border w-full focus:outline-none focus:bg-gray-50"
                             type="text" name="tag" id="tag" value="{{ $tag->tag }}" placeholder="Enter tag here" required autofocus>
                             <button class="bg-blue-500 hover:bg-blue-600 p-2 rounded text-white -ml-12">update</button>
                        </div>
                        @error('tag')
                            <p class="px-6 text-red-500">{{ $message }}</p>
                        @enderror
                    </form>
                </div>
                <div class="px-4 py-2">
                    @forelse ($tags as $tag)
                        <div class="flex flex-row justify-between border-b hover:bg-sky-50 even:bg-gray-100 odd:bg-gray-50 rounded-md">
                            <p class="p-3">{{ $tag->tag }}</p>
                            <div class="p-2 pt-2 text-xs flex">
                                <a class="p-2 bg-blue-500 hover:bg-white border hover:border-blue-500 hover:text-blue-500 rounded text-white transition-all"
                                 href="{{ route('tags.edit',$tag) }}">Edit</a>
                                 <form action="{{ route('tags.destroy',$tag) }}" onsubmit="return confirm('Are you sure to delete this Tag?')" method="POST">
                                    @csrf
                                    @method('delete')
                                <button class="p-2 bg-red-500 hover:bg-white border hover:border-red-500
                                 hover:text-red-500 rounded text-white transition-all inline" type="submit">Delete</button>
                                 </form>
                            </div>
                        </div>
                        
                    @empty
                        
                    @endforelse
                </div>
            </div>
            
        </div>    
        
    </div>
</x-layouts.admin>