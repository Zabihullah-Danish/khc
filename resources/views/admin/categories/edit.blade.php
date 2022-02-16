<x-layouts.admin>
    <x-slot name="title">
        Categories
    </x-slot>
    <div class="p-2">

        <div class="flex flex-col">

            <div class="flex flex-row justify-between p-2 border mb-1 shadow-sm rounded-md">
                <h1 class="text-2xl">Categories list</h1>
                <a class="p-3 bg-orange-500 text-white hover:bg-orange-600 rounded-md inline-block float-right" href="{{ route('posts.index') }}">Back</a>
            </div>

            <x-message />

            <div class="rounded-md border">
                <div class="p-3 bg-gray-100">
                    <p class="text-blue-500">Total Categories: {{ $categories->count() }}</p>
                </div>
                <div class="shadow-xl shadow-sky-300 mb-3">
                    <form action="{{ route('category.update', $category) }}" method="POST">
                        @csrf
                        <div class="flex flex-row justify-center p-2 px-6">
                            <input class="bg-gray-00 p-3 rounded-md border w-full focus:outline-none
                            placeholder-blue-900 focus:bg-gray-50"
                             type="text" name="category" id="tag" placeholder="Enter new category" value="{{ $category->category }}" required autofocus>
                             <button class="bg-blue-500 hover:bg-blue-600 p-2 rounded text-white -ml-12">Update</button>
                             <a class="p-2 text-2xl text-white ml-1 bg-red-500 rounded-md border
                             hover:bg-white hover:border-red-500 hover:text-red-500
                             " href="{{ route('category.index') }}" title="Cancel">&#9746;</a>
                        </div>
                    </form>
                </div>
                <div class="px-4 py-6">
                    <div class="flex flex-row justify-between px-2 py-2 font-bold">
                        <h1>Category</h1>
                        <h1>Actions</h1>
                    </div>
                    @forelse ($categories as $category)
                        <div class="flex flex-row justify-between border-b hover:bg-sky-50 even:bg-gray-100 odd:bg-gray-50 rounded-md">
                            <p class="p-3">{{ $category->category }}</p>
                            <div class="p-2 pt-2 text-xs flex">
                                <a class="p-2 bg-blue-500 hover:bg-white border hover:border-blue-500 hover:text-blue-500 rounded text-white transition-all"
                                 href="{{ route('category.edit',$category) }}">Edit</a>
                                 <form action="{{ route('category.destroy', $category) }}" onsubmit="return confirm('Are you sure to delete this Tag?')" method="POST">
                                    @csrf
                                    @method('delete')
                                <button class="p-2 bg-red-500 hover:bg-white border hover:border-red-500
                                 hover:text-red-500 rounded text-white transition-all inline" type="submit">Delete</button>
                                 </form>
                            </div>
                        </div>
                        
                    @empty
                        <p class="p-3">No category yet</p>
                    @endforelse
                </div>
                
            </div>
            
        </div>    
        
    </div>
</x-layouts.admin>