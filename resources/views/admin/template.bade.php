<x-layouts.admin>
    <x-slot name="title">
        Page Tile here
    </x-slot>
    <div class="p-2">

        <div class="flex flex-col">

            <div class="flex flex-row justify-between p-2 border mb-1 shadow-sm rounded-md">
                <h1 class="text-2xl">Page title</h1>
                <a class="p-3 bg-blue-500 text-white rounded-md inline-block float-right" href="{{ route('users.create') }}">button here</a>
            </div>

            <div class="rounded-md border">
                content here
            </div>
            
        </div>    
        
    </div>
</x-layouts.admin>