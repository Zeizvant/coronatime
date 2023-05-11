<form action="{{ route('password.send.email') }}" method="POST" class="flex flex-col justify-between md:justify-start md:gap-14 h-[500px] gap-6">
    @csrf
    <x-input type="email" name="email" label="{{ __('forms.email') }}" placeholder="{{ __('forms.enter_your_email') }}"></x-input>
    <x-form-button text="{{ __('forms.reset_password') }}"></x-form-button>
</form>
