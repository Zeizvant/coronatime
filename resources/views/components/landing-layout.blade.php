@props(['header', 'section'])
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
    <script defer src="https://unpkg.com/alpinejs@3.2.4/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
    <title>Coronatime</title>
</head>
<body class="w-full flex flex-col items-center justify-center">
<div class="border-grey border-b w-full flex justify-center">
    <div class="h-[80px] sm:mx-auto flex justify-center w-11/12 md:w-full md:w-5/6 xl:w-[1284px] mx-4 p-0 md:mx-auto">
        <div class="w-full m-auto md:mx-10 xl:m-0 box-border xl:w-[1284px] flex flex-col md:items-center">
            <div class="w-full box-border flex justify-between items-center">
                <a href="{{ route('index') }}">
                    <img class="h-[32px] md:h-auto md:m-y-[20px] m-6 ml-0" src="{{ asset('images/coronatime-main.svg') }}" alt="logo" />
                </a>
                <div class="flex gap-8 items-center">
                    <x-language-dropdown></x-language-dropdown>
                    <x-menu></x-menu>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="sm:mx-auto flex justify-center w-full md:w-full md:w-5/6 xl:w-[1284px] mx-4 p-0 md:mx-auto">
    <div class="m-auto w-11/12 md:mx-10 xl:m-0 box-border xl:w-[1284px] flex flex-col md:items-center">
        <div class="w-full box-border flex flex-col">
            <h1 class="my-10 main-dark text-base text-sm md:text-base font-extrabold">{{$header}}</h1>
            <div class="border-grey border-b flex gap-6 md:gap-[72px]">
                @if($section == 'worldwide')
                    <a href="{{ route('index') }}"><div class="cursor-pointer border-[#010414] font-bold border-b-[3px] pb-4">{{ __('landing.worldwide') }}</div></a>
                    <a href="{{ route('landing.country') }}"><div class="cursor-pointer pb-4">{{ __('landing.by_country') }}</div></a>
                @else
                    <a href="{{ route('index') }}"><div class="cursor-pointer pb-4">{{ __('landing.worldwide') }}</div></a>
                    <a href="{{ route('landing.country') }}"><div class="cursor-pointer border-[#010414] font-bold border-b-[3px] pb-4">{{ __('landing.by_country') }}</div></a>
                @endif
            </div>
            {{$slot}}
        </div>
    </div>
</div>

</body>
</html>

