<x-layouts.admin>
    <x-slot name="title">
        Users Management
    </x-slot>
    <div class="p-2">
        <div class="flex flex-col">
            <div class="flex flex-row justify-between p-2 border mb-1 shadow-sm rounded-md">
                <h1 class="text-2xl">Users details</h1>
                <a class="p-3 bg-blue-500 text-white rounded-md inline-block float-right
                 @if(!Auth::user()->permission->create_user) invisible @endif" href="{{ route('users.create') }}">Create New</a>
            </div>

            <x-message />

            <div class="rounded-md border">
                <table class="w-full ">
    
                    <tr class="text-left pl-2">
                        <th class="pl-2">ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Actions</th>
                        
                    </tr>
                    @foreach($users as $user)
                    <tr class="text-sm border-b @if(!Auth::user()->is_admin && $user->is_admin) hidden @elseif($user->is_admin) bg-sky-900 text-white @endif
                         hover:text-yellow-400 hover:bg-gray-900 transition-all ">
                        <td class="pl-2 @if($user->blocked) text-red-500 @endif">{{ $user->id }}</td>
                        <td class="@if($user->blocked) text-red-500 @endif">{{ $user->name }}</td>
                        <td class="@if($user->blocked) text-red-500 @endif">{{ $user->email }}</td>
                        <td class="@if($user->blocked) text-red-500 @endif">{{ $user->created_at }}</td>
                        <td class="@if($user->blocked) text-red-500 @endif">{{ $user->updated_at }}</td>
                        <td class="flex flex-row">
                            <a class="px-3 py-1 bg-stone-900 hover:bg-stone-700 hover:shadow-md text-orange-500 hover:text-white  inline-block
                             @if(!Auth::user()->permission->view_user OR !Auth::user()->permission->edit_user) invisible @endif" href="{{ route('users.edit',$user) }}">Edit</a>
                            <form action="{{ route('users.destroy',$user) }}" onsubmit="return confirm('Are you sure delete it?')" method="POST">
                               @csrf
                                @method('delete')
                                <input class="px-3 py-1 bg-stone-900 hover:bg-stone-700 hover:shadow-md text-orange-500 hover:text-white cursor-pointer
                                @if(!Auth::user()->permission->delete_user) hidden @endif" type="submit" value="Delete">
                            </form>
                            @if(Auth::user()->is_admin)
                            <a class="px-3 py-1 bg-stone-900 hover:bg-stone-700 hover:shadow-md text-orange-500 hover:text-white  inline-block" href="{{ route('permissions.index',$user) }}">Permissions</a>
                            @endif
                        </td>
                       
                    </tr>
                    @endforeach
                </table>
            </div>
            
        </div>
        
        
            
        
    </div>
</x-layouts.admin>