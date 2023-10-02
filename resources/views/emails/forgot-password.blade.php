@component('mail::message')
<div style="margin:auto;width:150px">
    <h3>Fogot Password</h3>
</div>

You are receiving this email because we received a password reset request for your account.

@component('mail::button', ['url' => $data['url']])
Reset Password
@endcomponent

This password reset link will expire in 60 minutes.

If you did not request a password reset, no further action is required.

Thanks,<br>
{{ config('app.name') }}
@endcomponent


