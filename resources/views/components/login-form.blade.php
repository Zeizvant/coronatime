<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<form action="{{ route('login') }}"
      class="flex flex-col gap-10"
      method="POST" class="flex flex-col gap-6"
      x-data="{
        username: '',
        password: '',
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
            password: {
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
            $watch('password', value => { validate('password') })">
    @csrf
    <x-input type="text" name="username" label="{{ __('forms.username') }}" placeholder="{{ __('forms.enter_unique_username_or_email') }}"></x-input>
    <x-password-input name="password" label="{{ __('forms.password') }}" placeholder="{{ __('forms.fill_in_password') }}" ></x-password-input>
    <div class="flex justify-between items-center">
        <x-remember-device-checkbox></x-remember-device-checkbox>
        <a href="{{ route('password.reset') }}" class="text-sm md:text-base font-semibold text-[#2029F3]">{{ __('forms.forgot_password?') }}</a>
    </div>
    <x-form-button text="{{ __('forms.log_in') }}"></x-form-button>
    <p class="text-sm md:text-base text-center font-normal ">{{ __('forms.don’t_have_an_account?') }} <a href="{{ route('register') }}" class="font-semibold">{{ __('forms.sign_up_for_free') }}</a></p>
</form>
