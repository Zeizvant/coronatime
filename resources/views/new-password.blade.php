<x-blank-layout>
    <div class="h-full">
        <h2 class="text-center font-black text-xl md:text-2xl main-dark mb-10 md:mb-14">{{ __('forms.reset_password') }}</h2>
        <x-new-password-form token="{{ $token }}"></x-new-password-form>
    </div>
</x-blank-layout>
