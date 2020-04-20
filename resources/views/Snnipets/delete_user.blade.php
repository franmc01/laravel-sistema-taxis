
        <button type="submit" id="{{ $user->id }}"  class="btn btn-danger btn-xs adios"><span style="padding-right:5px"><i class="fa fa-user-lock"></i></span>Banear perfil</button>




    <script>
     $(document).on('click', '.adios' ,function () {
        var id = $(this).attr('id');
        var token = $("meta[name='csrf-token']").attr("content");
        console.log(id);
        Swal.fire({
        title: 'Está seguro que desea banear la cuenta?',
        text: "Las cuentas baneadas, no tendrán acceso al sistema",
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, banear cuenta!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url:"usuarios/"+id,
                    type: 'DELETE',
                    data: {
                        "id": id,
                        "_token": token,
                    },
                    success:function(response)
                    {
                        Swal.fire( 'Genial!', 'La cuenta ha sido baneada correctamente', 'success' )
                        $('#tablausuarios').DataTable().ajax.reload();
                    }
                });
            }
        })

     });


    </script>


