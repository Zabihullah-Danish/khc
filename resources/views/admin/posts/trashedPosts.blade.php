<x-layouts.admin>
    <x-slot name="title">
        Post Management
    </x-slot>
    <div class="p-2">

        <div class="flex flex-col">

            <div class="flex flex-row justify-between p-2 border mb-1 shadow-sm rounded-md">
                <h1 class="text-2xl">List of Trashed Posts</h1>
                <div>
                    <a class="p-3 px-5 ml-2 bg-blue-500 hover:bg-blue-600 text-white rounded-md inline-block float-right
                    @if(!Auth::user()->permission->create_post) invisible @endif" href="{{ route('posts.create') }}">Create New</a>
                    <a class="p-3 px-5 bg-orange-500 hover:bg-orange-600 text-white rounded-md inline-block float-right" href="{{ route('posts.index') }}">Back</a>
                </div>
                
            </div>

            <x-message />

            <div class="rounded-md border">
                <div class="p-2">
                    <p class="font-bold">Total: {{ $trashedPosts->count() }}</p>
                    <hr>
                </div>
                <div>
                    <table class="w-full">
                        <tr class="text-left shadow">
                            <th class="w-1/12 p-2 ">ID</th>
                            <th class="w-6/12 p-2 ">Title</th>
                            <th class="w-2/12 p-2 ">Created At</th>
                            <th class="w-2/12 p-2 ">Updated At</th>
                            <th class="w-1/12 p-2 ">Actions</th>
                        </tr>
                        @foreach ($trashedPosts as $post)
                        <tr class="border h-16 hover:bg-sky-50 align-baseline">
                            <td class="pl-2">{{ $post->id }}</td>
                            <td class="pl-2">{{ $post->title }}</td>
                            <td>{{ $post->created_at }}</td>
                            <td>{{ $post->updated_at }}</td>
                            <td class="flex flex-row space-x-1 p-2">
                                <a onclick="return confirm('Are you sure to restore the post')" class="text-blue-500 hover:bg-blue-500 hover:text-white p-2
                                "href="{{ route('posts.restore',$post->id) }}">Restore</a>
                                <a onclick="return confirm('Are sure to delete the post permanently?')" class="text-red-500 hover:bg-red-500 hover:text-white p-2
                                "href="{{ route('posts.delete',$post->id) }}">Delete</a>
                               
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                
            </div>
            
        </div>    
        
    </div>
</x-layouts.admin>