$(function () {
    'use strict';

    // init the validator
    // validator files are included in the download package
    // otherwise download from http://1000hz.github.io/bootstrap-validator

    $('#contact-form').validator();

    $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
    $(".btn-submit").click(function(e){
        e.preventDefault();
        var nombre=$("input[name=name]").val();
        var email=$("input[name=email]").val();
        var message=$("textarea[name=message]").val();
        $.ajax({
           type:'POST',
           url:'/correo',
           data:{name:nombre, email:email, message:message},
           success:function(){
            Swal.fire(
                'Correo enviado!',
                'Satisfactoriamente',
                'success',
              )
           }
        });
	});
});
