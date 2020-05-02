{{-- <a class="btn btn-xs btn-warning text-white" href="{{route('usuarios.edit',$id)}}"><span style="padding-right:5px"><i class="fa fa-user-edit"></i></span>Pagar</a> --}}
<select name="pago" id="pago">
    <option value="1">Pago {{ $id }}</option>
    <option value="0">No Pago {{ $id }}</option>
</select>
