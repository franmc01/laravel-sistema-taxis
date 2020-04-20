
<button type="button" class="btn btn-xs btn-info text-white ver" data-toggle="modal" id="{{ $user->id }}"  data-target="#modal-sm"><span style="padding-right:5px"><i class="fa fa-user-edit"></i></span>
    Ver perfil
</button>



<div class="modal fade" id="modal-sm">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Datos personales</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <center>
            <div id="image"></div>
            <h4 class="media-heading" id="nombre"></h4>
            <h4 id="apellido"></h4>
            <span><strong>Status: </strong></span>
                <span class="badge bg-success">Activo</span>
            </center>
        </div>
        <div class="modal-footer justify-content-left">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>



  <script>
        $(document).on('click','.ver', function(){
          var id = $(this).attr('id');
          $.ajax({
            url:"/usuarios/"+id,
            dataType:"json",
            success: function(html) {
                $('#image').html("<img src= {{ URL::to('/storage') }}/" + html.data.foto_perfil + " style='text-align:center' class='img-rounded' height='220' width='220'/>");
                $('#nombre').text(html.data.nombres);
                $('#apellido').text(html.data.apellidos);
            }
        });
        });
  </script>


