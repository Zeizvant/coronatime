<form
    action="{{ route('register.store') }}"
    method="POST"
    class="flex flex-col gap-10"
    >
    @csrf
    <x-input type="text" name="username" label="{{ __('forms.username') }}" placeholder="{{ __('forms.enter_unique_username') }}"></x-input>
    <x-input type="text" name="email" label="{{ __('forms.email') }}" placeholder="{{ __('forms.enter_your_email') }}"></x-input>
    <x-password-input register="true" name="password" label="{{ __('forms.password') }}" placeholder="{{ __('forms.fill_in_password') }}"></x-password-input>
    <x-password-confirmation-input name="password_confirmation" label="{{ __('forms.repeat_password') }}" placeholder="{{ __('forms.repeat_password') }}"></x-password-confirmation-input>
    <div class="flex justify-between items-center">
        <x-remember-device-checkbox></x-remember-device-checkbox>
    </div>
    <x-form-button text="{{ __('forms.sign_up') }}"></x-form-button>
    <p class="text-sm md:text-base text-center font-normal ">{{ __('forms.don’t_have_an_account?') }} <a href="{{ route('login') }}" class="font-semibold">{{ __('forms.log_in') }}</a></p>
</form>
