<x-layouts.admin>
    <x-slot name="title">
        Setting Permissions
    </x-slot>
    <div class="p-2">

        <div class="flex flex-col">

            <div class="flex flex-row justify-between p-2 border mb-1 shadow-sm rounded-md">
                <h1 class="text-2xl">Setup Permissions for <span class=" text-white shadow p-1 bg-fuchsia-500 rounded">{{ $user->name }}</span></h1>
                <a class="p-3 bg-orange-500 hover:bg-orange-600 text-white rounded-md inline-block float-right" href="{{ route('users.index') }}">Back to list</a>
            </div>

            <x-message />

            <div class="rounded-md border">
                <div class="p-2">

                        <form action="{{ route('userStatus', $user) }}" method="POST">
                            @csrf
                            
                            <fieldset class="border rounded-md p-2 shadow bg-sky-50 mb-4">
                                <legend class="bg-sky-900 rounded p-3 text-white shadow-sm">User Status</legend>
                                <div class="w-full flex flex-col px-5">
                                    
                                    <div>
                                        <input class="w-4 h-4" type="radio" name="blocked" id="blocked" value="1" @if($user->blocked) checked @endif >
                                        <label for="blocked">Blocked</label>
                                    </div>
                                    <div>
                                        <input class="w-4 h-4" type="radio" name="blocked" id="open" value="0" @if(!$user->blocked) checked @endif >
                                        <label for="open">Not Blocked</label>
                                    </div>
                                    <div>
                                        <div class="float-right">
                                            <button class="bg-blue-500 hover:bg-blue-600 text-white p-3 rounded-md" type="submit">Update</button>
                                        </div>
                                        
                                    </div>

                                </div>
                            </fieldset>
                        </form>

                    @if(!$user->blocked)

                        <form action="{{ route('userLevel', $user) }}" method="POST">
                            @csrf
                            
                            <fieldset class="border rounded-md p-2 shadow bg-sky-50 mb-4">
                                <legend class="bg-sky-900 rounded p-3 text-white shadow-sm">User Level</legend>
                                <div class="w-full flex flex-col px-5">
                                    
                                    <div>
                                        <input class="w-4 h-4" type="radio" name="admin" id="admin" value="1" @if($user->is_admin) checked @endif >
                                        <label for="admin">Admin</label>
                                    </div>
                                    <div>
                                        <input class="w-4 h-4" type="radio" name="admin" id="noneAdmin" value="0" @if(!$user->is_admin) checked @endif >
                                        <label for="noneAdmin">Other User</label>
                                    </div>
                                    <div>
                                        <div class="float-right">
                                            <button class="bg-blue-500 hover:bg-blue-600 text-white p-3 rounded-md" type="submit">Update</button>
                                        </div>
                                        
                                    </div>

                                </div>
                            </fieldset>
                        </form>

                        <form method="POST">
                            @csrf
                            <fieldset class="border rounded-md p-2 shadow bg-sky-50">

                                <legend class="bg-sky-900 rounded p-3 text-white shadow-sm">View Models</legend>
                                

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
                                        <div>
                                            <div class="float-right">
                                                <input type="submit" formaction="{{ route('updateKhcModel',$model) }}" value="Update" class="bg-blue-500 
                                                cursor-pointer hover:bg-blue-600 text-white p-3 rounded-md">
                                            </div> 
                                        </div>
                                       
                                        
                                    </div>
                                    
                                
                            </fieldset>
                        </form>

                        <form action="{{ route('updateModelsPermission',$user) }}" method="POST">
                            @csrf
                            <fieldset class="border rounded-md p-2 shadow bg-sky-50 mt-4">
                                <legend class="bg-sky-900 rounded p-3 text-white shadow-sm">Model Permissions</legend>
                                <div class="flex flex-col px-5 border border-gray-300 rounded">
                                    <div class="">
                                        <fieldset class="bg-sky-100 p-3 rounded-md flex flex-col shadow border px-10
                                        @if(!$model->users) bg-red-50 cursor-not-allowed @endif">
                                            <legend class="p-1 font-bold rounded-md">Users Permission</legend>
                                            <div>
                                                <input class="w-4 h-4" type="checkbox" id="create_user" name="create_user" value="1"
                                                 @if($permission->create_user) checked @endif @if(!$model->users) disabled @endif>
                                                <label for="create_user">Create User</label>
                                            </div>
                                            <div>
                                                <input class="w-4 h-4" type="checkbox" id="view_user" name="view_user" value="1" 
                                                @if($permission->view_user) checked @endif @if(!$model->users) disabled @endif>
                                                <label for="view_user">View User</label>
                                            </div>
                                            <div>
                                                <input class="w-4 h-4" type="checkbox" id="edit_user" name="edit_user" value="1" 
                                                @if($permission->edit_user) checked @endif @if(!$model->users) disabled @endif>
                                                <label for="edit_user">Edit User</label>
                                            </div>
                                            <div>
                                                <input class="w-4 h-4" type="checkbox" id="delete_user" name="delete_user" value="1" 
                                                @if($permission->delete_user) checked @endif @if(!$model->users) disabled @endif>
                                                <label for="delete_user">Delete User</label>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div>
                                        <fieldset class="bg-sky-100 p-3 rounded-md flex flex-col shadow border px-10 
                                        @if(!$model->posts) bg-red-50 cursor-not-allowed @endif">
                                            <legend class="p-1 font-bold rounded-md">Posts Permission</legend>
                                            <div>
                                                <input class="w-4 h-4" type="checkbox" id="create_post" name="create_post" value="1" 
                                                @if($permission->create_post) checked @endif @if(!$model->posts) disabled @endif>
                                                <label for="create_post">Create Post</label>
                                            </div>
                                            <div>
                                                <input class="w-4 h-4" type="checkbox" id="view_post" name="view_post" value="1" 
                                                @if($permission->view_post) checked @endif @if(!$model->posts) disabled @endif>
                                                <label for="view_post">View Post</label>
                                            </div>
                                            <div>
                                                <input class="w-4 h-4" type="checkbox" id="edit_post" name="edit_post" value="1" 
                                                @if($permission->edit_post) checked @endif @if(!$model->posts) disabled @endif>
                                                <label for="edit_post">Edit Post</label>
                                            </div>
                                            <div>
                                                <input class="w-4 h-4" type="checkbox" id="delete_post" name="delete_post" value="1" 
                                                @if($permission->delete_post) checked @endif @if(!$model->posts) disabled @endif>
                                                <label for="delete_post">Delete Post</label>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div>
                                        <fieldset class="bg-sky-100 p-3 rounded-md flex flex-col shadow border px-10 
                                        @if(!$model->tags) bg-red-50 cursor-not-allowed @endif">
                                            <legend class="p-1 font-bold rounded-md">Tags Permission</legend>
                                            <div>
                                                <input class="w-4 h-4" type="checkbox" id="create_tag" name="create_tag" value="1" 
                                                @if($permission->create_tag) checked @endif @if(!$model->tags) disabled @endif>
                                                <label for="create_tag">Create Tag</label>
                                            </div>
                                            <div>
                                                <input class="w-4 h-4" type="checkbox" id="edit_tag" name="edit_tag" value="1" 
                                                @if($permission->edit_tag) checked @endif @if(!$model->tags) disabled @endif>
                                                <label for="edit_tag">Edit Tag</label>
                                            </div>
                                            <div>
                                                <input class="w-4 h-4" type="checkbox" id="delete_tag" name="delete_tag" value="1" 
                                                @if($permission->delete_tag) checked @endif @if(!$model->tags) disabled @endif>
                                                <label for="delete_tag">Delete Tag</label>
                                            </div>
                                            <div class="invisible">
                                                
                                            </div>
                                            
                                        </fieldset>
                                    </div>
                                    <div>
                                        <fieldset class="bg-sky-100 p-3 rounded-md flex flex-col shadow border px-10
                                        @if(!$model->ads) bg-red-50 cursor-not-allowed @endif ">
                                            <legend class="p-1 font-bold rounded-md">Ads Permission</legend>
                                            <div>
                                                <input class="w-4 h-4" type="checkbox" id="create_ads" name="create_ads" value="1" 
                                                @if($permission->create_ads) checked @endif @if(!$model->ads) disabled @endif>
                                                <label for="create_ads">Create Ads</label>
                                            </div>
                                            <div>
                                                <input class="w-4 h-4" type="checkbox" id="view_ads" name="view_ads" value="1" 
                                                @if($permission->view_ads) checked @endif @if(!$model->ads) disabled @endif>
                                                <label for="view_ads">View Ads</label>
                                            </div>
                                            <div>
                                                <input class="w-4 h-4" type="checkbox" id="edit_ads" name="edit_ads" value="1" 
                                                @if($permission->edit_ads) checked @endif @if(!$model->ads) disabled @endif>
                                                <label for="edit_ads">Edit Ads</label>
                                            </div>
                                            <div>
                                                <input class="w-4 h-4" type="checkbox" id="delete_ads" name="delete_ads" value="1" 
                                                @if($permission->delete_ads) checked @endif @if(!$model->ads) disabled @endif>
                                                <label for="delete_ads">Delete Ads</label>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div>
                                        <fieldset class="bg-sky-100 p-3 rounded-md flex flex-col shadow border px-10 
                                        @if(!$model->slider) bg-red-50 cursor-not-allowed @endif">
                                            <legend class="p-1 font-bold rounded-md">Slider Permission</legend>
                                            <div>
                                                <input class="w-4 h-4" type="checkbox" id="create_slider" name="create_slider" value="1" 
                                                @if($permission->create_slider) checked @endif @if(!$model->slider) disabled @endif>
                                                <label for="create_slider">Create Slider</label>
                                            </div>
                                            <div>
                                                <input class="w-4 h-4" type="checkbox" id="view_slider" name="view_slider" value="1" 
                                                @if($permission->view_slider) checked @endif @if(!$model->slider) disabled @endif>
                                                <label for="view_slider">View Slider</label>
                                            </div>
                                            <div>
                                                <input class="w-4 h-4" type="checkbox" id="edit_slider" name="edit_slider" value="1" 
                                                @if($permission->edit_slider) checked @endif @if(!$model->slider) disabled @endif>
                                                <label for="edit_slider">Edit Slider</label>
                                            </div>
                                            <div>
                                                <input class="w-4 h-4" type="checkbox" id="delete_slider" name="delete_slider" value="1" 
                                                @if($permission->delete_slider) checked @endif @if(!$model->slider) disabled @endif>
                                                <label for="delete_slider">Delete Slider</label>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div>
                                        <div class="float-right m-2">
                                            <input class="bg-blue-500 hover:bg-blue-600 text-white rounded-md p-3 cursor-pointer" type="submit" value="Update">
                                        </div>
                                    </div>
                                    
                                </div>
                            </fieldset>
                        </form>
                    @endif       
                </div>
                
            </div>
            
        </div>    
        
    </div>
</x-layouts.admin>