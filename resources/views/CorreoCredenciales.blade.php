@component('mail::message')
# ¡Hola, {{ $user->nombres }} {{ $user->apellidos }}!
Te damos la bienvenida al sistema de la compañía de
taxis convencional TRANS LASINPAR S.A,

Tus credenciales de acceso son las siguientes:
@component('mail::table')
| Usuario | Contraseña |
| :------------- |:-------------|
| {{ $user->cedula }}|{{ $password }} |

@endcomponent

Le recomendamos iniciar sesión en el sistema y establecer
una nueva contraseña, como medida de seguridad.
<br>
<br>
Para acceder al sistema:
@component('mail::button', ['url' => 'login'])
Presione aquí
@endcomponent
@endcomponent
