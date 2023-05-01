<x-auth-layout>
    <div>
        <h2 class="font-black text-xl md:text-2xl main-dark mb-2 md:mb-4">{{ __('forms.welcome_back') }}</h2>
        <p class="text-base md:text-xl font-normal main-grey mb-6">{{ __('forms.welcome_back_please_enter_your_details') }}</p>
        <x-login-form></x-login-form>
    </div>
</x-auth-layout>
