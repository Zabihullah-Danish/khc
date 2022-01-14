<x-layouts.client>
  
    <div class="p-2">
        <div class="border rounded-md flex flex-row justify-between p-1">
            <div class="w-3/12 overflow-hidden rounded-md m-1">
                <img src="{{ asset('storage/images/laravel.png') }}" width="100%"  />
            </div>
            <div class="w-9/12 flex flex-col">
                <h1 class="text-2xl">Laravel</h1>
                <p class="text-justify inline">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam dolorum, tenetur vero sapiente alias, delectus consequatur cumque fugiat, 
                quisquam temporibus voluptatum exercitationem odio! Accusantium voluptatibus eum ipsam non voluptate quisquam.
                <a class="hover:text-stone-400 bg-blue-200 rounded-md p-0.5 " href="">Read more...</a></p>
                
            </div>
           
        </div>

        @foreach ($posts as $post)
            
        
        <div class="border rounded-md flex flex-row justify-between p-1">
            <div class="w-3/12 overflow-hidden rounded-md m-1">
                <img src="{{ asset('storage/uploads/' . $post->image) }}" width="100%"  />
            </div>
            <div class="w-9/12 flex flex-col">
                <h1 class="text-2xl">{{ $post->title }}</h1>
                <p class="text-justify inline">{{ $post->content }}
                <a class="hover:text-stone-400 bg-blue-200 rounded-md p-0.5 " href="">Read more...</a></p>
                
            </div>
           
        </div>

        @endforeach

        <div class="">
            {{ $posts->links() }}
        </div>
        

    </div>

</x-layouts.client>