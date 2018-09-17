@component('mail::message')
# Activate your account

Klik link berikut untuk mengaktifkan akun anda.
 
@component('mail::button', ['url' => url('/api/cariin/user/confirm_email?email=' . $user->email . '&token=' . $user->activation_token) ])
Aktifkan!
@endcomponent
 
Thanks,
 
{{ config('app.name') }}
@endcomponent