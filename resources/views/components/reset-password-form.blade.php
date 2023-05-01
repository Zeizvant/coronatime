<form action="POST" class="flex flex-col justify-between md:justify-start md:gap-14 h-[500px] gap-6">
    <x-password-input name="password" label="{{ __('forms.password') }}" placeholder="{{ __('forms.fill_in_password') }}"></x-password-input>
    <x-form-button text="{{ __('forms.log_in') }}"></x-form-button>
</form>
