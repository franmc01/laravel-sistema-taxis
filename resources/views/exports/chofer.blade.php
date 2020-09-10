
<table>
    <thead>
    <tr>
        <th style="font-weight:bold">ID</th>
        <th style="font-weight:bold">Nombres</th>
        <th style="font-weight:bold">Apellidos</th>
        <th style="font-weight:bold">Cédula de identidad</th>
        <th style="font-weight:bold">Correo Electrónico</th>
        <th style="font-weight:bold">Teléfono</th>
        <th style="font-weight:bold">Fecha en la que inicio</th>
        <th style="font-weight:bold">Fecha en la que finaliza</th>
        <th style="font-weight:bold">Socio vinculado</th>
    </tr>
    </thead>
    <tbody>
    @foreach($choferes as $chofer)
        <tr>
            <td>{{ $chofer->id }}</td>
            <td>{{ $chofer->nombres }}</td>
            <td>{{ $chofer->apellidos }}</td>
            <td>{{ $chofer->cedula }}</td>
            <td>{{ $chofer->email }}</td>
            <td>{{ $chofer->telefono }}</td>
            <td>{{ $chofer->fecha_inicio }}</td>
            <td>{{ $chofer->fecha_fin }}</td>
            <td>{{ $chofer->users->nombres." " }}{{ $chofer->users->apellidos}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
