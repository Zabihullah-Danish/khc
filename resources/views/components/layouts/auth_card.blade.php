<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <title>{{ $title ?? " " }}</title>
</head>
<body>
    
    {{-- Authenticate --}}
    <div class="container max-w-xl border mx-auto mt-28 rounded-md shadow-lg p-10">
        {{ $slot }}
    </div>

</body>
</html>