@component('mail::message')
# Mensaje de usuario

##Nombres:
{{ $message ->name}}

##Email:
{{ $message ->email}}

##Mensaje:
{{ $message ->message}}

@component('mail::button', ['url' => '/'])
Activar cuenta
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
