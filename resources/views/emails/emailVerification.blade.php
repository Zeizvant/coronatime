<!DOCTYPE html>
<head>
    @vite('resources/css/app.css')
</head>
<body class="w-full flex justify-center items-center mt-5 lg:mt-[150px]">
    <div class="w-343 md:w-[520px] gap-10 flex flex-col justify-center items-center">
        <img  class="md:w-[520px]" src="{{ asset('images/email-verification.png') }}"/>
        <h1 class="text-center font-black text-xl md:text-2xl main-dark mb-10 md:mb-14">{{ __('forms.confirmation_email' ) }}</h1>
        <p>{{ __('forms.click_this_button_to_verify_your_email')  }}:</p>
        <a class="w-full max-w-[392px] flex justify-center items-center h-[56px] cursor-pointer rounded-lg uppercase text-sm md:text-base font-black text-white main-green-bg mb-10" href="{{ route('verification.verify', $token) }}">
            {{ __('forms.verify_email') }}
        </a>
    </div>
</body>

