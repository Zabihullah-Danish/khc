<x-layouts.admin>
    <x-slot name="title">
        Post Management
    </x-slot>
    <div class="p-2">

        <div class="flex flex-col">

            <div class="flex flex-row justify-between p-2 border mb-1 shadow-sm rounded-md">
                <h1 class="text-2xl">Posts</h1>
                <a class="p-3 bg-blue-500 text-white rounded-md inline-block float-right" href="{{ route('posts.create') }}">Create New</a>
            </div>

            <x-message />

            <div class="rounded-md border">
                <div class="">
                    <table class="w-full">
                        <tr class="text-left pl-2 text-sm w-full">
                            <th class="p-2 w-1/12">ID</th>
                            <th class="pl-2 w-2/12">Title</th>
                            <th class="pl-2 w-5/12">Content</th>
                            <th class="pl-2 w-1/12">Created At</th>
                            <th class="pl-2 w-1/12">Updated At</th>
                            <th class="pl-2 w-2/12">Acitons</th>
                        </tr>
                        @foreach ($posts as $post)
                        <tr class="border-b-2 odd:bg-zinc-50 even:bg-gray-100 text-xs w-full hover:bg-gray-900 hover:text-white h-20 overflow-y-clip transition-all align-text-top">

                            <td class="pl-2">{{ $post->id }}</td>
                            <td class="pl-2">{{ $post->title }}</td>
                            <td class="pl-2">{{ $post->content }}</td>
                            <td class="pl-2">{{ $post->created_at }}</td>
                            <td class="pl-2">{{ $post->updated_at }}</td>
                            <td>
                                <div class="rounded m-2 flex flex-row">
                                    <a class="px-3 py-2 bg-gray-500 hover:bg-gray-600 text-gray-300 hover:text-white transition-all -mr-2 rounded" href="{{ route('posts.show',$post) }}">View</a>
                                    <a class="px-3 py-2 bg-blue-500 hover:bg-blue-600 text-gray-300 hover:text-white transition-all -mr-2" href="{{ route('posts.edit',$post) }}">Edit</a>
                                    <form action="{{ route('posts.destroy',$post) }}" onsubmit="return confirm('Are sure delete the post')" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="px-3 py-2 bg-red-500 hover:bg-red-600 text-gray-300 hover:text-white transition-all rounded" >Delete</button>
                                    </form>
                                    
                                </div>
                                
                            </td>
                        </tr>
                        @endforeach
                        
                    </table>
                </div>
            </div>
            
        </div>    
        
    </div>
</x-layouts.admin>