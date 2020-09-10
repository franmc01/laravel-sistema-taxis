<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>Cédula de identidad</th>
        <th>Correo Electrónico</th>
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
        </tr>
    @endforeach
    </tbody>
</table>
