<x-layouts.admin>
    <x-slot name="title">
        Slider Management
    </x-slot>
    <div class="p-2">

        <div class="flex flex-col">

            <div class="flex flex-row justify-between p-2 border mb-1 shadow-sm rounded-md">
                <h1 class="text-2xl">Slider Management</h1>
                <a class="p-3 bg-blue-500 hover:bg-blue-600 text-white rounded-md inline-block float-right 
                @if(!Auth::user()->permission->create_slider) invisible @endif" href="{{ route('slider.create') }}">Add to slider</a>
            </div>

            <x-message />

            <div class="rounded-md border">
                <div class="flex flex-col">
                    <div class="p-3 font-bold">
                        <p>Total: {{ $sliders->count() }}</p>
                        <hr>
                    </div>
                    <div class="flex flex-row">
                        <div class="w-4/6 p-3">
                            <h1 class="font-bold">Title</h1>
                        </div>
                        <div class="w-1/6 p-3">
                            <h1 class="font-bold">Images</h1>
                        </div>
                        <div class="w-1/6 p-3">
                            <h1 class="font-bold">Actions</h1>
                        </div>
                    </div>
                    @forelse($sliders as $slider)

                    <div class="flex flex-row justify-between border-b hover:bg-sky-50">
                        <div class="p-3 w-4/6">
                            <p>{{ $slider->title }}</p>
                        </div>
                        <div class="w-1/6 overflow-hidden mr-10">
                            <a class="hover:text-blue-500 hover:underline" href="{{ asset('storage/slider/' . $slider->image) }}" target="_blank">
                                {{ $slider->image }}
                            </a>
                        </div>
                        <div class=" w-1/6">
                            <div class="flex flex-row pr-2 text-xs py-3">
                                <a class="p-2 bg-gray-500 hover:bg-white border hover:border-gray-500 hover:text-gray-500 text-white rounded 
                                @if(!Auth::user()->permission->view_slider) hidden @endif"
                                 href="{{ route('slider.show', $slider) }}">View</a>
                                <a class="p-2 bg-blue-500 hover:bg-white border hover:border-blue-500 hover:text-blue-500 text-white rounded 
                                @if(!Auth::user()->permission->edit_slider) hidden @endif"
                                 href="{{ route('slider.edit', $slider) }}">Edit</a>
                                <form action="{{ route('slider.destroy', $slider) }}" method="POST" onsubmit="return confirm('Are sure to delete the slider?')">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="p-2 bg-red-500 hover:bg-white border hover:border-red-500 hover:text-red-500 text-white rounded
                                    @if(!Auth::user()->permission->delete_slider) hidden @endif">Delete</button>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                    @empty
                        <div class="p-3 bg-gray-100">
                            <p>Empty Slider</p>
                        </div>
                    @endforelse
                </div>
            </div>
            
        </div>    
        
    </div>
</x-layouts.admin>