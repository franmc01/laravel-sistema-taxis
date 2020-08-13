/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import $ from 'jquery';
import * as bootstrap from "bootstrap";
import 'datatables.net'
import 'select2'
import 'datatables.net-dt'
import 'jquery-ui';
import 'jquery-ui/themes/base/core.css';
import 'jquery-ui/themes/base/theme.css';
import 'jquery-ui/themes/base/menu.css';
import 'jquery-ui/ui/widgets/datepicker';
import 'jquery-ui/themes/base/datepicker.css';
// resources/js/app.js
$.datepicker.regional['es'] = {
    closeText: 'Cerrar',
    prevText: '< Ant',
    nextText: 'Sig >',
    currentText: 'Hoy',
    monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
    monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
    dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
    dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
    dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
    weekHeader: 'Sm',
    dateFormat: 'yy/mm/dd',
    firstDay: 1,
    isRTL: false,
    showMonthAfterYear: false,
    yearSuffix: ''
};
var table = $('#tablacuotas').dataTable({
    destroy: true,
    paging: true,
    searching: false,
    language: {
      "emptyTable":			"No hay datos disponibles en la tabla.",
      "info":		   			"Del _START_ al _END_ de _TOTAL_ ",
      "infoEmpty":			"Mostrando 0 registros de un total de 0.",
      "infoFiltered":			"(filtrados de un total de _MAX_ registros)",
      "infoPostFix":			"(actualizados)",
      "lengthMenu":			"Ver _MENU_ registros",
      "loadingRecords":		"Cargando...",
      "processing":			"Procesando...",
      "search":				"Buscar:",
      "searchPlaceholder":	"",
      "zeroRecords":			"No se han encontrado coincidencias.",
      "paginate": {
        "first":			"Primera",
        "last":				"Última",
        "next":				"Siguiente",
        "previous":			"Anterior"
      },
      "aria": {
        "sortAscending":	"Ordenación ascendente",
        "sortDescending":	"Ordenación descendente"
      }
    },
//                      data: Response.data,
    columns:[
        {
            data: 'id',
            name: 'id',
        },
        {
            data: 'fecha',
            name: 'fecha'
        },
        {
            data: 'users.nombres',
            name: 'nombres'
        },
        {
            data: 'users.apellidos',
            name: 'apellidos'
        },
        {
            data: 'pago',
            name: 'pago'
        },
        {
            data: 'monto',
            name: 'monto'
        },
        {
            data: 'observacion',
            name: 'observacion'
        },
    ],
    "lengthMenu":				[[5, 10, 20, 25, 50, -1], [5, 10, 20, 25, 50, "Todos"]],
    "iDisplayLength":			10,

});

$('#mostrar').submit(function(event){
      var route = $('#mostrar').data('route');
      var formData = document.getElementById('datepicker');
      var fecha = formData.value;
      $.ajax({
          type: 'POST',
          url: route,
          data: {fecha:fecha},
          success: function(Response)
          {
            $('#tablacuotas').dataTable().fnClearTable();
            $('#tablacuotas').dataTable().fnAddData(Response.data);
            $('button[name=pago]').on('click', function () {
                var id = $(this).attr('id');
                botones(id);
            });
          }
      });
      event.preventDefault();
  });

  $('#consultar').submit(function(event){
      var route = $('#consultar').data('route');
      var fecha1 = $('input[name=fecha1]').val();
      var fecha2 = $('input[name=fecha2]').val();
      var user = $('select[name=user]').val();
      $.ajax({
          type: 'POST',
          url: route,
          data: {
            fecha1:fecha1,
            fecha2:fecha2,
            user:user,
          },
          success: function(Response)
          {
            $('#tablacuotas').dataTable().fnClearTable();
            $('#tablacuotas').dataTable().fnAddData(Response.data);
            $('button[name=pago]').on('click', function () {
                var id = $(this).attr('id');
                botones(id);
            });
          }
      });
      event.preventDefault();
  });

  var botones = function(id) {
    if ($('input[name=pago][id='+id+']').val() === "1") {
        $('input[name=monto][id='+id+']').val("0.00");
        $('input[name=pago][id='+id+']').val("0");
        $('button[name=pago][id='+id+']').text("No pagado");
    } else {
        $('input[name=monto][id='+id+']').val("2.00");                        
        $('input[name=pago][id='+id+']').val("1");
        $('button[name=pago][id='+id+']').text("Pagado");
    }
  };

  $('#formGuardar').on('submit', function(e){
    var myRows = { myRows: [] };
    var pagos = table.$('input[name=pago]').serializeArray();
    var monto = table.$('input[name=monto]').serializeArray();          
    var observacion = table.$('input[name=observacion]').serializeArray();          
    var $th = $('#tablacuotas th');
    $('#tablacuotas tbody tr').each(function(i, tr){
      var obj = {}, $tds = $(tr).find('td');
      $th.each(function(index, th){
          obj[$(th).text()] = $tds.eq(index).text();
          if ($(th).text()=="Pago") {
            obj[$(th).text()] = pagos[i].value;
          }
          if ($(th).text()=="Monto") {
            obj[$(th).text()] = monto[i].value;
          }
          if ($(th).text()=="Observacion") {
            obj[$(th).text()] = observacion[i].value;
          }
      });
      myRows.myRows.push(obj);
    });
    var url = $('#formGuardar').data('route');
    $.ajax({
      type: 'POST',
      url: url,
      data: myRows,
      success: function(res) {
        if (true) {
          $('#exito').modal("show");
        }
      }
    });
    event.preventDefault();  
  });
$.ajaxSetup({
    headers:
    { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
});

$.datepicker.setDefaults($.datepicker.regional['es']);
$('#datepicker').datepicker({
    onSelect: function(dateText) {
        var route = $('#mostrar').data('route');
        var formData = document.getElementById('datepicker');
        var fecha = formData.value;
        $.ajax({
            type: 'POST',
            url: route,
            data: {fecha:fecha},
            success: function(Response)
            {
              $('#tablacuotas').dataTable().fnClearTable();
              $('#tablacuotas').dataTable().fnAddData(Response.data);
              $('button[name=pago]').on('click', function () {
                  var id = $(this).attr('id');
                  botones(id);
              });
            }
        });
    }
});





/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


