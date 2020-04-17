$(document).ready(function(){
  $('#vehicle_table').DataTable({
      processing:true,
      serverSide:true,
      ajax:{
          url:"{{ route('vehiculos.index') }}"
      },
      columns:[
          {
              data: 'marca',
              name: 'marca'
          },
          {
              data: 'tipoVehiculo',
              name: 'tipoVehiculo'
          },
          {
              data: 'placa',
              name: 'placa'
          },
          {
              data: 'anio',
              name: 'anio'
          },
          {
              data: 'users.nombres',
              name: 'users.nombres',
          },
          {
              data: 'users.apellidos',
              name: 'users.apellidos',
          },
          {
              data: 'action',
              name: 'action',
              orderable: false
          }
      ]
  });


$('#sample_form').on('submit', function(event){
event.preventDefault();
if($('#action').val()=="Edit")
{
  $.ajax({
      url:"{{ route('vehiculos.update') }}",
      method:"POST",
      data:new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      dataType: "json",
      success:function(data)
      {
          var html ='';
          if(data.errors){
              html = '<div class="alert alert-danger alert-dismissible">';
              html +='<ul>';
              for(var count = 0; count < 1; count ++)
              {
                  html+='<li>' + data.errors[count] +'</li>';
              }
              html +='</ul';
              html +='</div>';
          }
          if(data.success)
          {
                html='<div class="alert alert-success">' + data.success + '</div>';
                $('#sample_form')[0].reset();
                $('#store_image').html('');
                $('#vehicle_table').DataTable().ajax.reload();
          }
          $('#form_result').html(html);
      }
  });
}

  });
  $(document).on('click','.edit', function(){
      var id = $(this).attr('id');
      $('#form_result').html('');
      $.ajax({
          url:"/vehiculos/"+id+"/edit",
          dataType:"json",
          success:function(html){
              $('#marca').val(html.data.marca);
              $('#tipoVehiculo').val(html.data.tipoVehiculo);
              $('#placa').val(html.data.placa);
              $('#anio').val(html.data.anio);
              $('#user_id').val(html.data.user_id);
//                  $('#store_image').html("<img src= {{ URL::to('/') }}/images/" + html.data.image + " width='70' class='img-thumbnail' />");
              $('#hidden_id').val(html.data.id);
              $('.modal-title').text("Edit New Record");
              $('#action_button').val("Edit");
              $('#action').val("Edit");
              $('#formModal').modal('show');
          }
      })
  });
  //inicia el desmadre
  $(document).on('click','.view', function(){
      var id = $(this).attr('id');
      $('#form_result').html('');
      $.ajax({
          url:"/vehiculos/"+id,
          dataType:"json",
          success:function(html){
              $('#vmarca').text(html.data.marca);
              $('#vtipoVehiculo').text(html.data.tipoVehiculo);
              $('#vplaca').text(html.data.placa);
              $('#vanio').text(html.data.anio);
              $('#vuser_id').text(html.data.user_id);
              $('#vusernombres').text(html.data.users.nombres);
              $('#vuserapellidos').text(html.data.users.apellidos);
              $('#vstore_image').html("<img src= {{ URL::to('storage') }}/" + html.data.users.foto_perfil + " style='text-align:center' class='img-rounded img-fill' height='220' width='220'/>");
              $('#exampleModal').modal('show');
          }
      })
  });
  //termina el desmadre



  var user_id;
  $(document).on('click','.delete',function(){
      user_id = $(this).attr('id');
      $('#confirmModal').modal('show');
  });

  $('#ok_button').click(function(){
      $.ajax({
          url:"vehiculos/destroy/"+user_id, beforeSend:function(){
              $('#ok_button').text('Deleting...');
          },
          success:function(data)
          {
              setTimeout(function(){
                  $('#confirmModal').modal('hide');
                  $('#vehicle_table').DataTable().ajax.reload();
              },2000);
          }
      })
  });
});