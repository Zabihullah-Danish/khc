<x-layouts.admin>
    <x-slot name="title">
        Create New Tags
    </x-slot>
    <div class="p-2">

        <div class="flex flex-col">

            <div class="flex flex-row justify-between p-2 border mb-1 shadow-sm rounded-md">
                <h1 class="text-2xl">Creating New Tag</h1>
                <a class="p-3 bg-orange-500 text-white rounded-md inline-block float-right" href="{{ route('tags.index') }}">back</a>
            </div>

            <x-message />

            <div class="rounded-md border">
                <div>
                    <form action="{{ route('tags.store') }}" method="POST">
                        @csrf
                        <div class="flex flex-row justify-center py-5 px-20">
                            <label class="1/5 p-3" for="tag">Tag Name</label>
                            <input class="bg-gray-00 p-3 rounded-md border @error('tag') border-red-500 @enderror w-5/6 focus:outline-none focus:bg-gray-50"
                             type="text" name="tag" id="tag" required>
                        </div>
                        <div class="px-28 py-2 text-right">
                            <button class="bg-blue-500 hover:bg-blue-600 p-3 rounded text-white">Save</button>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>    
        
    </div>
</x-layouts.admin>