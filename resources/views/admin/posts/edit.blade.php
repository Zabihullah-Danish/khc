<x-layouts.admin>
    <x-slot name="title">
        Update Post
    </x-slot>
    <div class="p-2">

        <div class="flex flex-col">

            <div class="flex flex-row justify-between p-2 border mb-1 shadow-sm rounded-md">
                <h1 class="text-2xl">Update Post information</h1>
                <a class="p-3 bg-orange-500 hover:bg-orange-600 text-white rounded-md inline-block float-right" href="{{ route('posts.index') }}">Back</a>
            </div>

            <x-message />

            <div class="rounded-md border p-2">
                <div>
                    <form action="{{ route('posts.update',$post) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="flex flex-col space-y-2">

                            <div class="flex flex-row">
                                <div class="w-2/12 pl-6 pt-3">
                                    <label class="" for="title">Title</label>
                                </div>
                                <div class="w-10/12 pl-4">
                                    <input class="bg-gray-00 p-3 rounded-md border @error('title') border-red-500 @enderror w-full focus:outline-none focus:bg-gray-50"
                                     type="text" id="title" name="title" placeholder="Enter Title" value="{{ old('title',$post->title) }}">
                                    @error('title')
                                    <p class="text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                            </div>

                            <div class="flex flex-row">
                                <div class="w-2/12 pl-6 pt-3">
                                    <label class="" for="content">Content</label>
                                </div>
                                <div class="w-10/12 pl-4">
                                    {{-- <textarea class="bg-gray-00 p-3 rounded-md border @error('content') border-red-500 @enderror w-full focus:outline-none focus:bg-gray-50"
                                     type="text" id="content" name="content" rows="10" placeholder="Enter post details">{{ old('content',$post->content) }}</textarea> --}}
                                     <x-forms.tinymce-editor>{{ $post->content }}</x-forms.tinymce-editor>
                                     @error('content')
                                    <p class="text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="flex flex-row">
                                <div class="w-2/12 pl-6 pt-3">
                                    <label class="" for="tags">Post Tags</label>
                                </div>
                                <div class="w-10/12 pl-4">
                                    <input class="bg-gray-00 p-3 rounded-md border @error('tags') border-red-500 @enderror w-full focus:outline-none focus:bg-gray-50"
                                     type="text" id="tags" name="tags" placeholder="Enter tags" value="{{ old('tags',$tags) }}">
                                    <span class="text-xs bg-gray-900 text-white p-1">Separete tags by comma " , "</span>
                                   
                                    @error('tags')
                                    <p class="text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="flex flex-row">
                                <div class="w-2/12 pl-6 pt-3">
                                    <label class="" for="category">Post Category</label>
                                </div>
                                <div class="w-10/12 pl-4">
                                    <select class="bg-gray-00 p-3 rounded-md border @error('category') border-red-500 @enderror w-full focus:outline-none focus:bg-gray-50"
                                     name="category" id="category">
                                        <option class="font-bold" {{ $post->category->id }} value="{{ $post->category->id }}" selected>{{ $post->category->category }}</option>
                                        @foreach($categories as $category)
                                        <option class="@if($post->category->id == $category->id) hidden @endif" value="{{ $category->id }}" >{{ $category->category }}</option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                    <p class="text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="flex flex-row">
                                <div class="w-2/12 pl-6 pt-3">
                                    <label class="" for="image">Post Image</label>
                                </div>
                                <div class="w-10/12 pl-4">
                                    <input class="bg-gray-00 p-3 rounded-md border @error('image') border-red-500 @enderror w-full focus:outline-none focus:bg-gray-50"
                                     type="file" id="image" name="image" value="{{ old('image',$post->image) }}">
                                    @error('image')
                                    <p class="text-red-500">{{ $message }}</p>
                                    @enderror
                                    <img src="{{ asset('storage/uploads/'. $post->image) }}" alt="post image" width="80" />
                                </div>
                            </div>

                            <div class="">
                                
                                <div class="text-right">
                                    <input class="bg-green-500 hover:bg-green-600 cursor-pointer text-white p-3 rounded-md border" type="submit" name="submit" value="Update">
                                    
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
            
        </div>    
        
    </div>
</x-layouts.admin>