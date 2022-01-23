<x-layouts.client>
  
    <div class="p-2">

        @foreach ($posts as $post)
            
        <a href="">
        <div class="border rounded-md flex flex-row justify-between p-1">
            <div class="w-3/12 overflow-hidden rounded-md m-1">
                <img src="{{ asset('storage/uploads/' . $post->image) }}" width="100%"  />
            </div>
            <div class="w-9/12 flex flex-col">
                <h1 class="text-2xl">{{ $post->title }}</h1>
                <p class="text-justify h-32 overflow-y-clip">{{ $post->content }}
                
                
            </div>
           
        </div>
         </a>
        @endforeach

    
        

    </div>

</x-layouts.client>