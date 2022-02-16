<x-layouts.auth_card>

    <x-slot name="title">
        Login
    </x-slot>

    <div class="p-1 mx-auto">
        <a href="{{ route('index') }}">
        <img class="mx-auto rounded-md" src="{{ asset('storage/images/laravel.png') }}" width="100" height="100" />
        </a>
    </div>
    <div class="p-1">
        @error('loginError')
            <p class="p-2 text-red-500">{{ $message }}</p>
        @enderror
        <x-message />
        <form action="{{ route('authenticate') }}" method="POST">
            @csrf
            <div class="flex flex-col mx-auto p-2 space-y-5">
                <input class="p-3 border rounded-xl focus:bg-stone-100  focus:outline-none" type="email" name="email" placeholder="Enter email" value="{{ old('email') }}" />
                @error('email')
                <p class="text-red-500 pl-2">{{ $message }}</p>
                @enderror
                <input class="p-3 border rounded-xl focus:bg-stone-100  focus:outline-none" type="password" name="password" placeholder="Enter password" />
                @error('password')
                <p class="text-red-500 pl-2">{{ $message }}</p>
                @enderror
                
                <div class="pl-2">
                    <label class="" for="remember_me">Remember me</label>
                    <input class="" type="checkbox" name="remember_me" id="remember_me" />
                </div>
                
                <input class="bg-stone-900 text-white p-3 
                    rounded-md hover:bg-stone-700 
                    hover:text-green-500 hover:font-bold
                    transition-all duration-500 cursor-pointer"
                    type="submit" name="submit" value="Login" />
                <a class="text-blue-500 hover:text-blue-600" href="">Forgot password</a>
            </div>
            
        </form>
    </div>
</x-layouts.auth_card>