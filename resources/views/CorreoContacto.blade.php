@component('mail::message') 
<center style="font-weight:bold; color:black;">Email de contacto</center>
<br> 
##Mensaje: 
{{ $message ->message }} 
Atentamente,<br> 
{{ $message ->name }} 
@endcomponent

