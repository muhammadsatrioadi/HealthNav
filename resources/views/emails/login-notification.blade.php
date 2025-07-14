@component('mail::message')
# Login Notification

This is a notification to inform you that your account ({{ $email }}) has been logged in.

If you did not perform this action, please change your password immediately.

@component('mail::button', ['url' => url('/login')])
Go to Login Page
@endcomponent

Thanks,
{{ config('app.name') }}
@endcomponent
