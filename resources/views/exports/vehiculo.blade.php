
<table>
    <thead>
    <tr>
        <th style="font-weight:bold">ID</th>
        <th style="font-weight:bold">Marca</th>
        <th style="font-weight:bold">Tipo de vehiculo</th>
        <th style="font-weight:bold">Placa</th>
        <th style="font-weight:bold">Año</th>
        <th style="font-weight:bold">Socio del vehiculo</th>
    </tr>
    </thead>
    <tbody>
    @foreach($cars as $car)
        <tr>
            <td>{{ $car->id }}</td>
            <td>{{ $car->marca }}</td>
            <td>{{ $car->tipoVehiculo  }}</td>
            <td>{{ $car->placa }}</td>
            <td>{{ $car->anio }}</td>
            <td>{{ $car->users->nombres." " }}{{ $car->users->apellidos }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
