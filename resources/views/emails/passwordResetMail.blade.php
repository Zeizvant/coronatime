<!DOCTYPE html>
<head>
    @vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="w-full flex justify-center items-center mt-5 lg:mt-[150px]">
<div class="w-343 md:w-[520px] gap-10 flex flex-col justify-center items-center">
    <img class="md:w-[520px]" src="{{ asset('images/email-verification.png') }}"/>
    <h1 class="text-center font-black text-xl md:text-2xl main-dark mb-10 md:mb-14">{{ __('forms.recover_password' ) }}</h1>
    <p>{{ __('forms.click_this_button_to_recover_a_password')  }}:</p>
    <a class="w-full max-w-[392px] flex justify-center items-center h-[56px] cursor-pointer rounded-lg uppercase text-sm md:text-base font-black text-white main-green-bg mb-10" href="{{ route('password.new', $token) }}">
        {{ __('forms.recover_password') }}
    </a>
</div>
</body>
