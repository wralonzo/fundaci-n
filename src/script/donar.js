$('.editbtn').on('click',function(){
	$tr=$(this).closest('tr');
	var datos=$tr.children('td').map(function() {
		return $(this).text();
	});
	$('#update_id').val(datos[0]);
	$('#titulo').val(datos[1]);
	$('#fecha').val(datos[2]);
	$('#descripcion').val(datos[3]);
	$('#imagen').val(datos[4]);




});
