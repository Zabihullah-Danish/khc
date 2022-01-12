<x-layouts.admin>
    <x-slot name="title">
        Users Management
    </x-slot>
    <div class="p-2">
        <div class="flex flex-col">
            <div class="flex flex-row justify-between p-2 border mb-1 shadow-sm rounded-md">
                <h1 class="text-2xl">Users details</h1>
                <a class="p-3 bg-blue-500 text-white rounded-md inline-block float-right" href="{{ route('users.create') }}">Create New</a>
            </div>

            @if(session('message'))
                <p class="m-2 p-3 rounded-md text-white bg-red-400">{{ session('message') }}</p>
            @endif

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
                    <tr class="text-sm border-b even:bg-gray-100 hover:bg-gray-900 hover:text-yellow-400 transition-all">
                        <td class="pl-2">{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->updated_at }}</td>
                        <td class="flex flex-row">
                            <a class="px-3 py-1 bg-stone-900 hover:bg-stone-700 hover:shadow-md text-orange-500 hover:text-white  inline-block" href="{{ route('users.edit',$user) }}">Edit</a>
                            <form action="{{ route('users.destroy',$user) }}" onsubmit="return confirm('Are you sure delete it?')" method="POST">
                               @csrf
                                @method('delete')
                                <input class="px-3 py-1 bg-stone-900 hover:bg-stone-700 hover:shadow-md text-orange-500 hover:text-white cursor-pointer" type="submit" value="Delete">
                            </form>
                            <a class="px-3 py-1 bg-stone-900 hover:bg-stone-700 hover:shadow-md text-orange-500 hover:text-white  inline-block" href="">Permissions</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            
        </div>
        
        
            
        
    </div>
</x-layouts.admin>