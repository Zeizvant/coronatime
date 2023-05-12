@props(['text'])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <title>Coronatime</title>
</head>
<body class="w-full">
<div class="flex justify-center w-full">
    <div class="w-343 md:w-392 flex flex-col gap-[200px] md:gap-[252px]">
        <div class="w-full flex justify-start md:justify-center">
            <a href="{{ route('index') }}">
                <img class=" m-6 ml-0" src="{{ asset('images/coronatime.svg') }}" alt="logo" />

            </a>
        </div>
        <div class="flex flex-col items-center justify-stretch gap-4">
            <img src="{{ asset('images/confirm_animation.gif') }}" />
            <p class="text-lg text-center font-normal main-dark">{{ $text }}</p>
            <div class="absolute bottom-10 md:static">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
</body>
</html>

