
<table>
    <thead>
    <tr>
        <th style="font-weight:bold">ID</th>
        <th style="font-weight:bold">Nombres</th>
        <th style="font-weight:bold">Apellidos</th>
        <th style="font-weight:bold">Cédula de identidad</th>
        <th style="font-weight:bold">Correo Electrónico</th>
        <th style="font-weight:bold">Rol</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->nombres }}</td>
            <td>{{ $user->apellidos }}</td>
            <td>{{ $user->cedula }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->getRoleNames()->implode(',') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
