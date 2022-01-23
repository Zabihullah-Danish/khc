<x-layouts.admin>
    <x-slot name="title">
        Users Registration
    </x-slot>
    <div class="p-2">
        <div class="flex flex-col">
            <div class="flex flex-row justify-between p-2 border mb-1 shadow-sm rounded-md">
                <h1 class="text-2xl">User Registration Form</h1>
                <a class="p-3 bg-orange-500 text-white rounded-md inline-block float-right" href="{{ route('users.index') }}">Cancel</a>
            </div>
            <div class="border rounded-md min-h-screen py-5">
                <form action="{{ route('users.store') }}" method="POST" autocomplete="off">
                    @csrf
                    <fieldset class="border m-3 rounded-md p-3">
                        <legend class="bg-gray-200 text-gray-700 p-2 rounded-md shadow-2xl">User Info</legend>
                    <div class="flex flex-col space-y-2">
                        
                        <div class="flex flex-row">
                            <div class="w-2/12 p-3">
                                <label for="name">Name</label>
                            </div>
                            <div class="w-10/12 pl-5 pr-10">
                                <input class="w-full p-3 rounded-md shadow-sm border
                                    focus:outline-none focus:bg-gray-50" type="text" id="name" name="name" placeholder="Enter name" value="{{ old('name') }}" >
                                @error('name')
                                    <p class="text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex flex-row">
                            <div class="w-2/12 p-3">
                                <label for="email">Email</label>
                            </div>
                            <div class="w-10/12 pl-5 pr-10">
                                <input class="w-full p-3 rounded-md shadow-sm border
                                    focus:outline-none focus:bg-gray-50" type="email" id="email" name="email" placeholder="Enter email" value="{{ old('email') }}">
                                    @error('email')
                                    <p class="text-red-500">{{ $message }}</p>
                                    @enderror
                            </div>
                        </div>

                        <div class="flex flex-row">
                            <div class="w-2/12 p-3">
                                <label for="password">Password</label>
                            </div>
                            <div class="w-10/12 pl-5 pr-10">
                                <input class="w-full p-3 rounded-md shadow-sm border
                                    focus:outline-none focus:bg-gray-50" type="password" id="password" name="password" placeholder="Enter password">
                                    @error('password')
                                    <p class="text-red-500">{{ $message }}</p>
                                    @enderror
                            </div>
                        </div>

                        <div class="flex flex-row">
                            <div class="w-2/12 p-3">
                                <label for="password_confirmation">Confirm Password</label>
                            </div>
                            <div class="w-10/12 pl-5 pr-10">
                                <input class="w-full p-3 rounded-md shadow-sm border
                                    focus:outline-none focus:bg-gray-50" type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm password">
                            </div>
                        </div>

                        

                        <div class="pr-10">
                            <div class="float-right">
                                <input class="px-3 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-md cursor-pointer" type="submit" value="Save" />
                            </div>
                        </div>
                        

                    </div>
                    
                    </fieldset>
                          
                   
                </form>

            </div>
            
        </div>
            
        
    </div>
</x-layouts.admin>