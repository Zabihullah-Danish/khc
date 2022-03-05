<x-layouts.admin>
    <x-slot name="title">
        Create Post
    </x-slot>
    <div class="p-2">

        <div class="flex flex-col">

            <div class="flex flex-row justify-between p-2 border mb-1 shadow-sm rounded-md">
                <h1 class="text-2xl">Creating New Post</h1>
                <a class="p-3 bg-orange-500 hover:bg-orange-600 text-white rounded-md inline-block float-right" href="{{ route('posts.index') }}">Back</a>
            </div>

            @if(count($errors) > 0)
                {{ "Hello" }}
            @endif

            <div class="rounded-md border p-2">
                <div>
                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="flex flex-col space-y-2">

                            <div class="flex flex-row">
                                <div class="w-2/12 pl-6 pt-3">
                                    <label class="" for="title">Title</label>
                                </div>
                                <div class="w-10/12 pl-4">
                                    <input class="bg-gray-00 p-3 rounded-md border @error('title') border-red-500 @enderror w-full focus:outline-none focus:bg-gray-50"
                                     type="text" id="title" name="title" placeholder="Enter Title" value="{{ old('title') }}">
                                    @error('title')
                                    <p class="text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                            </div>

                            <div class="flex flex-row h-auto">
                                <div class="w-2/12 pl-6 pt-3">
                                    <label class="" for="summernote">Content</label>
                                </div>
                                <div class="w-10/12 pl-4">
                                    {{-- <textarea class="bg-gray-00 p-3 rounded-md border @error('content') border-red-500 @enderror 
                                    ckeditor form-control 
                                    w-full focus:outline-none focus:bg-gray-50"
                                     type="text" id="summernote" name="content" rows="10" placeholder="Enter post details">{{ old('content') }}</textarea>  --}}
                                     <x-forms.tinymce-editor>{{ old('content') }}</x-forms.tinymce-editor>
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
                                     type="text" id="tags" name="tags" placeholder="Enter tags" value="{{ old('tags') }}">
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
                                     name="category" id="category" value="{{ old('category') }}">
                                        <option disabled selected>--- Select Category ---</option>
                                        @foreach($categories as $category)

                                        <option class="@if(!Auth::user()->is_admin && $category->category == "about") hidden @endif" value="{{ $category->id }}">{{ $category->category }}</option>
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
                                     type="file" id="image" name="image">
                                    @error('image')
                                    <p class="text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="">
                                
                                <div class="text-right">
                                    <input class="bg-green-500 hover:bg-green-600 cursor-pointer text-white p-3 rounded-md border" type="submit" name="submit" value="Post">
                                    
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
            
        </div>    
        
    </div>
</x-layouts.admin>