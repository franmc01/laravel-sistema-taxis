<button type="submit" class="btn btn-danger btn-xs eliminar" id={{ $user->id }}>
    <span style="padding-right:5px">
        <i class="fa fa-user-alt-slash" aria-hidden="true"></i>
    </span> Eliminar cuenta
</button>

<script>
    $(document).on('click','.eliminar',function () {
        var id= $(this).attr('id');
        var token = $("meta[name='csrf-token']").attr("content");
        Swal.fire({
        title: 'Está seguro que desea eliminar esta cuenta?',
        text: 'Si confirma la acción esta cuenta desaparecerá de la base datos, asi como la información relacionada',
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar cuenta!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url:"eliminar/"+id,
                    type: 'GET',
                    data: {
                        "id": id,
                        "_token": token,
                    },
                    success:function(response)
                    {
                        Swal.fire( 'Genial!', 'La cuenta ha sido eliminada correctamente', 'success' )
                        $('#eliminados').DataTable().ajax.reload();
                    }
                });
            }
        })
    });
</script>
