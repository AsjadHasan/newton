@component('mail::message')
# Done


You are receiving this email because we received a password change request for your account.
You are Changing your password ?
If ans is not than, From the forget password link, you can change your password.

@component('mail::button', ['url' => 'http://127.0.0.1:8000/password/reset'])
Forget Password Link
@endcomponent

If you did not request a password reset, no further action is required.

Regards,
<br>
{{ config('app.name') }}
@endcomponent
