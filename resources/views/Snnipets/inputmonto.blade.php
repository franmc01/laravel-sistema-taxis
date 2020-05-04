<input type="text" name="monto" id="{{ $id }}" class="monto" value="{{ $monto }}">
<script>
$(document).ready(function() {
    $('.pago').change(function () {
        var id = $(this).attr('id');
        if ($( 'select[id='+id+']' ).val() === "1") {
            $('input[id='+id+']').val("2.00");            
        } else {
            $('input[id='+id+']').val("0.00");                        
        }
    });
});
</script>