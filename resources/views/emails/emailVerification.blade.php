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
    {{ __('forms.recover_password') }}
</p>
<p style="text-align: center; color: #010414; font-size: 18px">
    {{ __('forms.click_this_button_to_verify_your_email') }}
</p>
<x-mail::button url="{{ route('verification.verify', $token) }}" color="success">
    {{ __('forms.verify_email') }}
</x-mail::button>
</body>
