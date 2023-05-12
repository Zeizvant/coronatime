<form action="{{ route('password.set.new', $token) }}" method="POST" class="flex flex-col justify-between h-[450px] md:justify-start md:gap-14 gap-6">
    @csrf
    <div class="flex flex-col gap-4 md:gap-6">
        <x-password-input name="password" label="{{ __('forms.new_password') }}" placeholder="{{ __('forms.enter_new_password') }}"></x-password-input>
        <x-password-confirmation-input name="password_confirmation" label="{{ __('forms.repeat_password') }}" placeholder="{{ __('forms.repeat_password') }}"></x-password-confirmation-input>
    </div>
    <x-form-button text="{{ __('forms.save_changes') }}"></x-form-button>
</form>
