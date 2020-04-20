    <form action="{{route("usuarios.destroy", $id)}}" method='POST'>
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-xs"><span style="padding-right:5px"><i class="fa fa-user-lock"></i></span>Banear perfil</button>
    </form>
