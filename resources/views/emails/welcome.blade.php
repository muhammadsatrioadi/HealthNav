@component('mail::message')
# Welcome to Our Application, {{ $name }}!

Thank you for registering with us. We are excited to have you as part of our community.

@component('mail::button', ['url' => url('/login')])
Login to Your Account
@endcomponent

Thanks,
{{ config('app.name') }}
@endcomponent
