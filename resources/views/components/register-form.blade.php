<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<form
    action="{{ route('register.store') }}"
    method="POST"
    class="flex flex-col gap-10"
    x-data="{
        username: '',
        password: '',
        password_confirmation: '',
        email: '',
        validation: {
            username: {
                rule: {
                    required: function (field) {
                        if (field) {
                            return { error: 'false', message: ''}
                        } else {
                            return { error: 'true', message: 'This field is required.'}
                        }
                    },
                    minLength: function (field, value = 3) {
                        if (field && field.length >= value) {
                            return { error: 'false', message: ''}
                        } else {
                            return { error: 'true', message: `This field must have minimum ${value} characters length.`}
                        }
                    }
                },
                error: 'none',
                message: ''
            },
            email: {
                rule: {
                    required: function (field) {
                        if (field) {
                            return { error: 'false', message: ''}
                        } else {
                            return { error: 'true', message: 'This field is required.'}
                        }
                    },
                },
                error: 'none',
                message: ''
            },
            password: {
                rule: {
                    required: function (field) {
                        if (field) {
                            return { error: 'false', message: ''}
                        } else {
                            return { error: 'true', message: 'This field is required.'}
                        }
                    },
                    minLength: function (field, value = 3) {
                        if (field && field.length >= value) {
                            return { error: 'false', message: ''}
                        } else {
                            return { error: 'true', message: `This field must have minimum ${value} characters length.`}
                        }
                    }
                },
                error: 'none',
                message: ''
            },
            password_confirmation: {
                rule: {
                    required: function (field) {
                        if (field) {
                            return { error: 'false', message: ''}
                        } else {
                            return { error: 'true', message: 'This field is required.'}
                        }
                    },
                    pattern: function (field) {
                        if (password_confirmation.value === password.value) {
                            return { error: 'false', message: ''}
                        } else {
                            return { error: 'true', message: 'The password confirmation does not match.'}
                        }
                    },
                },
                error: 'none',
                message: ''
            },
        },
        validate (field) {
            for (const key in this.validation[field].rule) {
                const validationResult = this.validation[field].rule[key](this[field])
                if (validationResult.error === 'true') {
                    this.validation[field].error = 'true'
                    this.validation[field].message = validationResult.message
                    break
                }
                this.validation[field].error = 'false'
                this.validation[field].message = ''
                continue
            }
        }
    }"
    x-init="$watch('username', value => { validate('username') })
            $watch('email', value => { validate('email') })
            $watch('password', value => { validate('password') })
            $watch('password_confirmation', value => { validate('password_confirmation') })">
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
