<x-layouts.admin>
    <x-slot name="title">
        Post Management
    </x-slot>
    <div class="p-2">

        <div class="flex flex-col">

            <div class="flex flex-row justify-between p-2 border mb-1 shadow-sm rounded-md">
                <h1 class="text-2xl">Posts</h1>
                <div>
                    <a class="p-3 px-5 ml-1 bg-blue-500 hover:bg-blue-600 text-white rounded-md inline-block float-right
                    @if(!Auth::user()->permission->create_post) invisible @endif" href="{{ route('posts.create') }}">Create New</a>
                    <a class="p-3 px-5 ml-1 bg-red-500 hover:bg-red-600 text-white rounded-md inline-block float-right
                    @if(!Auth::user()->is_admin) invisible @endif" href="{{ route('posts.trashed') }}">Trashed Posts</a>
                    <a class="p-3 px-5 bg-sky-500 hover:bg-sky-600 text-white rounded-md inline-block float-right
                    @if(!Auth::user()->is_admin) invisible @endif" href="{{ route('category.index') }}">Manage Categories</a>
                </div>
                
            </div>

            <x-message />

            <div class="rounded-md border">
                <div class="p-2">
                    <p class="font-bold">Total: {{ auth()->user()->posts->count() }}</p>
                    <hr>
                </div>
                <div>
                    <table class="w-full">
                        <tr class="text-left shadow sticky top-0 bg-white">
                            <th class="w-1/12 p-2 ">ID</th>
                            <th class="w-5/12 p-2 ">Title</th>
                            
                            <th class="w-2/12 p-2 ">Created At</th>
                            <th class="w-2/12 p-2 ">Updated At</th>
                            <th class="w-1/12 p-2">Category</th>
                            <th class="w-1/12 p-2 ">Actions</th>
                        </tr>
                        @foreach ($posts as $post)
                        <tr class="border h-16 hover:bg-sky-50 align-baseline">
                            <td class="pl-2">{{ $post->id }}</td>
                            <td class="pl-2 text-justify">{{ $post->title }}</td>
                            <td class="pl-2">{{ $post->created_at }}</td>
                            <td>{{ $post->updated_at }}</td>
                            <td class="pl-2">
                                @foreach($categories as $category)
                                    @if($category->id == $post->category_id)
                                    {{ $category->category }}
                                    @endif
                                @endforeach
                            </td>
                            <td class="inline-block">
                                <div class="flex flex-row mt-2">
                                    <a class="text-blue-500 hover:bg-blue-500 hover:text-white 
                                    @if(!Auth::user()->permission->view_post) hidden @endif" href="{{ route('posts.show',$post) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6" class="ionicon" viewBox="0 0 512 512"><title>View</title><path d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>
                                    </a>
                                    <a class="text-green-500 hover:bg-green-500 hover:text-white
                                    @if(!Auth::user()->permission->edit_post) hidden @endif" href="{{ route('posts.edit',$post) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6" class="ionicon" viewBox="0 0 512 512"><title>Edit</title><path d="M384 224v184a40 40 0 01-40 40H104a40 40 0 01-40-40V168a40 40 0 0140-40h167.48" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path d="M459.94 53.25a16.06 16.06 0 00-23.22-.56L424.35 65a8 8 0 000 11.31l11.34 11.32a8 8 0 0011.34 0l12.06-12c6.1-6.09 6.67-16.01.85-22.38zM399.34 90L218.82 270.2a9 9 0 00-2.31 3.93L208.16 299a3.91 3.91 0 004.86 4.86l24.85-8.35a9 9 0 003.93-2.31L422 112.66a9 9 0 000-12.66l-9.95-10a9 9 0 00-12.71 0z"/></svg>
                                    </a>
                                    <form class="" action="{{ route('posts.destroy',$post) }}" method="POST" onsubmit="return confirm('Are you sure delete the post')">
                                        @csrf
                                        @method('delete')
                                       <button class=" text-red-500 hover:bg-red-500 hover:text-white p-0.5 @if(!Auth::user()->permission->delete_post) hidden @endif" type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6" class="ionicon" viewBox="0 0 512 512"><title>Trash</title><path d="M112 112l20 320c.95 18.49 14.4 32 32 32h184c17.67 0 30.87-13.51 32-32l20-320" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M80 112h352"/><path d="M192 112V72h0a23.93 23.93 0 0124-24h80a23.93 23.93 0 0124 24h0v40M256 176v224M184 176l8 224M328 176l-8 224" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>
                                       </button>
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