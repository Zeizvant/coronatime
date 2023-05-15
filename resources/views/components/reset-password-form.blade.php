<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<form action="{{ route('password.send.email') }}"
      method="POST"
      x-data="{
        email: '',
        validation: {
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
      x-init="$watch('email', value => { validate('email') })"
      class="flex flex-col justify-between md:justify-start md:gap-14 h-[500px] gap-6 relative">

    @csrf
    <x-input type="text" name="email" label="{{ __('forms.email') }}" placeholder="{{ __('forms.enter_your_email') }}"></x-input>
    <x-form-button text="{{ __('forms.reset_password') }}"></x-form-button>
</form>
