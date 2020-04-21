<button type="submit" class="btn btn-info btn-xs activar" id="{{ $user->id }}">
    <span style="padding-right:5px">
        <i class="fa fa-user-check" aria-hidden="true"></i>
    </span> Reactivar cuenta
</button>

<script>
    $(document).on('click','.activar',function () {
        var id= $(this).attr('id');
        var token = $("meta[name='csrf-token']").attr("content");
        Swal.fire({
        title: 'Está seguro que desea activar esta cuenta?',
        text: 'Si confirma la acción esta cuenta tendra acceso al sistema nuevamente',
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, activar cuenta!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url:"restaurar/"+id,
                    type: 'GET',
                    data: {
                        "id": id,
                        "_token": token,
                    },
                    success:function(response)
                    {
                        Swal.fire( 'Genial!', 'La cuenta ha sido activada correctamente', 'success' )
                        $('#eliminados').DataTable().ajax.reload();
                    }
                });
            }
        })
    });
</script>


