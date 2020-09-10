<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Fecha</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Monto</th>
            <th>Estado</th>
            <th>Observación</th>
        </tr>
    </thead>
    <tbody>
@foreach ($cuota as $item)
<tr>
    <td scope="row">{{ $item->id }}</td>
    <td scope="row">{{ $item->fecha }}</td>
    <td scope="row">{{ $item->users->nombres }}</td>
    <td scope="row">{{ $item->users->apellidos }}</td>
    <td scope="row">{{ $item->monto }}</td>
    @if ($item->pago)
    <td scope="row">Pagado</td>
    @else
    <td scope="row">Pendiente</td>
    @endif

    <td scope="row">{{ $item->observacion }}</td>
</tr>
@endforeach
    </tbody>
</table>
