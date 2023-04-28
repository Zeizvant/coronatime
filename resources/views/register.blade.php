<x-auth-layout>
    <div>
        <h2 class="font-black text-xl md:text-2xl main-dark mb-2 md:mb-4">{{ __('forms.welcome_to_coronatime') }}</h2>
        <p class="text-base md:text-xl font-normal main-grey mb-6">{{ __('forms.please_enter_required_info_to_sign_up') }}</p>
        <x-register-form></x-register-form>
    </div>
</x-auth-layout>
