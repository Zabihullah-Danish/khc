

@if (session('success'))
    <p class="bg-lime-300 p-3 m-1 rounded text-blue-400 ">{{ session('success') }}</p>
@elseif (session('warning'))
    <p class="bg-orange-300 p-3 m-1 rounded text-gray-600 ">{{ session('warning') }}</p>
@elseif (session('danger'))
    <p class="bg-red-400 p-3 m-1 rounded text-white ">{{ session('danger') }}</p>
@endif