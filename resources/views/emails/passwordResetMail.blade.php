<header>
    <style>
        .header{
            text-align: center;
            color: #010414;
            font-size: 25px;
            font-weight: 900;
            margin-top: 40px
        }
        img{
            width: 520px;
            display: block;
            margin: auto;
            margin-top: 100px;
        }
    </style>
</header>
<body>
<img src="{{ asset('images/email-verification.png') }}"/>
<p class="header">
    {{ __('forms.confirmation_email') }}
</p>
<p style="text-align: center; color: #010414; font-size: 18px">
    {{ __('forms.click_this_button_to_recover_a_password') }}
</p>
<x-mail::button url="{{ route('password.set.new', $token) }}" color="success">
    {{ __('forms.recover_password') }}
</x-mail::button>
</body>


