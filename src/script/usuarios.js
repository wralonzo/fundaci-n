$('.editbtn ').on('click',function(){
	$tr=$(this).closest('tr');
	var datos=$tr.children('td').map(function() {
		return $(this).text();
	});
	$('#update_id').val(datos[0]);
	$('#nombre').val(datos[1]);
	$('#apellido').val(datos[2]);
	$('#dpi').val(datos[3]);
	$('#telefono').val(datos[4]);
  $('#fecha_nacimiento').val(datos[5]);
	$('#genero').val(datos[6]);
	$('#usuario').val(datos[7]);


	
});
