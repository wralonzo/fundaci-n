$('#fecha_nacimiento').on('change', function()){
	$('#edad').val(calcular_edad());
});

function calcular_edad(){
	var fecha_seleccionada = $('#fecha_nacimiento').val();
	var fecha_nacimiento = new Date(fecha_seleccionada);
	var fecha_actual = new Date();
	var edad = (parseInt((fecha_actual - fecha_nacimiento) / (1000*60*60*24*365)));
	return edad;
}
