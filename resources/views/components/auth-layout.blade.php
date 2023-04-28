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
    <title>Document</title>
</head>
<body>
    <div class="bg-white flex justify-between">
        <div class="flex flex-col items-center w-full xl:w-fit mt-6 m-4 lg:ml-[108px]">
            <div class="w-343 md:w-392">
                <div class="flex justify-start w-full">
                    <img class="mb-[43px]" src="{{ asset('images/coronatime.svg') }}" alt="logo" />
                </div>
                <div>
                    {{ $slot }}
                </div>
            </div>
        </div>
        <div class="max-h-screen fixed right-0 top-0">
            <img class="max-h-screen object-cover w-604 hidden xl:block" src="{{ asset('images/main_img.svg') }}"/>
        </div>
    </div>
</body>
</html>
