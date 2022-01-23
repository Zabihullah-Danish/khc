<x-layouts.admin>
    <x-slot name="title">
        Setting Permissions
    </x-slot>
    <div class="p-2">

        <div class="flex flex-col">

            <div class="flex flex-row justify-between p-2 border mb-1 shadow-sm rounded-md">
                <h1 class="text-2xl">Setup Permissions for <span class="underline text-gray-700 shadow p-1 bg-zinc-200">{{ $model->user->name }}</span></h1>
                <a class="p-3 bg-orange-500 hover:bg-orange-600 text-white rounded-md inline-block float-right" href="{{ route('users.index') }}">Back to list</a>
            </div>

            <x-message />

            <div class="rounded-md border">
                <div class="p-2">
                    
                        <form action="{{ route('updateKhcModel',$model) }}" method="POST">
                            @csrf
                            <fieldset class="border rounded-md p-2 shadow bg-sky-50">

                                <legend class="bg-sky-900 rounded p-1 text-white shadow-sm">View Models</legend>

                                <div class="w-full flex flex-col px-5">
                                    
                                    <div>   
                                        <input class="w-4 h-4" type="checkbox" name="users" id="users" value="1" @if($model->users) checked @endif >
                                        <label for="users">Users</label>
                                    </div>
                                    
                                    <div>
                                        <input class="w-4 h-4" type="checkbox" id="posts" name="posts" value="1" @if($model->posts) checked @endif >
                                        <label for="posts">Posts</label>
                                    </div>
                                    <div>
                                        <input class="w-4 h-4" type="checkbox" id="tags" name="tags" value="1" @if($model->tags) checked @endif >
                                        <label for="tags">Tags</label>
                                    </div>
                                    <div>
                                        <input class="w-4 h-4" type="checkbox" id="ads" name="ads" value="1" @if($model->ads) checked @endif >
                                        <label for="ads">Ads</label>
                                    </div>
                                    <div>
                                        <input class="w-4 h-4" type="checkbox" id="slider" name="slider" value="1" @if($model->slider) checked @endif >
                                        <label for="slider">Slider</label>
                                    </div>
                                    <div class="text-right py-2">
                                        
                                        <button class=" p-3 bg-blue-500 hover:bg-blue-600 rounded inline-block text-white" type="submit">Update</a>
                                    </div>

                                    
                                    
                                </div>

                            </fieldset>
                        
                        </form>
                             
                </div>
                
            </div>
            
        </div>    
        
    </div>
</x-layouts.admin>