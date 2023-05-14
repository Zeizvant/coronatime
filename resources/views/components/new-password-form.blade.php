<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<form action="{{ route('password.set.new', $token) }}"
      method="POST"
      x-data="{
        password: '',
        password_confirmation: '',
        validation: {
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
      x-init="$watch('password', value => { validate('password') })
              $watch('password_confirmation', value => { validate('password_confirmation') })"
      class="flex flex-col justify-between h-[450px] md:justify-start md:gap-14 gap-6 relative">
    @csrf
    <div class="flex flex-col gap-10">
        <x-password-input register="false" name="password" label="{{ __('forms.new_password') }}" placeholder="{{ __('forms.enter_new_password') }}"></x-password-input>
        <x-password-confirmation-input name="password_confirmation" label="{{ __('forms.repeat_password') }}" placeholder="{{ __('forms.repeat_password') }}"></x-password-confirmation-input>
    </div>
    <x-form-button text="{{ __('forms.save_changes') }}"></x-form-button>
</form>
