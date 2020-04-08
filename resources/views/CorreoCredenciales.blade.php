@component('mail::message')
# ¡Hola, {{ $user->nombres }} {{ $user->apellidos }}!
Te damos la bienvenida de parte de todo el equipo de trabajo de la compañia de taxis Trans. LaSinpar.

Tus credenciales de acceso son las siguientes:
@component('mail::table')
| Usuario      | Contraseña     |
| :------------- |:-------------|
| {{ $user->cedula }}|{{ $password }} |

@endcomponent

Le recomendamos iniciar sesión en el sistema, y establecer una nueva contraseña, para
<br>
<br>
Para acceder al sistema:
@component('mail::button', ['url' => 'login'])
¡ Click aquí !
@endcomponent
@endcomponent
