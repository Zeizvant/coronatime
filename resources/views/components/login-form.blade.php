<form action="POST" class="flex flex-col gap-6">
    <x-input type="text" name="username" label="{{ __('forms.username') }}" placeholder="{{ __('forms.enter_unique_username_or_email') }}"></x-input>
    <x-password-input name="password" label="{{ __('forms.password') }}" placeholder="{{ __('forms.fill_in_password') }}" ></x-password-input>
    <div class="flex justify-between items-center">
        <x-remember-device-checkbox></x-remember-device-checkbox>
        <a href="#" class="text-sm md:text-base font-semibold text-[#2029F3]">{{ __('forms.forgot_password?') }}</a>
    </div>
    <x-form-button text="{{ __('forms.log_in') }}"></x-form-button>
    <p class="text-sm md:text-base text-center font-normal ">{{ __('forms.don’t_have_an_account?') }} <a href="#" class="font-semibold">{{ __('forms.sign_up_for_free') }}</a></p>
</form>
