$(function() {
    setTimeout(function(){
      $('body').addClass('loaded');
    }, 1000);


//FILTRANDO REGISTROS
$("#filtro").on("click", function(e){
e.preventDefault();

loaderF(true);

var f_nacimiento = $('input[name=fecha_nacimiento]').val();
var f_fin = $('input[name=fechaFin]').val();
console.log(f_nacimiento + '' + f_fin);

if(f_nacimiento !="" && f_fin !=""){
  $.post("filtro.php", {f_nacimiento, f_fin}, function (data) {
    $("#tableEmpleados").hide();
    $(".resultadoFiltro").html(data);
    loaderF(false);
  });
}else{
  $("#loaderFiltro").html('<p style="color:red;  font-weight:bold;">Debe seleccionar ambas fechas</p>');
}
} );


function loaderF(statusLoader){
  console.log(statusLoader);
  if(statusLoader){
    $("#loaderFiltro").show();
    $("#loaderFiltro").html('<img class="img-fluid" src="assets/img/cargando.svg" style="left:50%; right: 50%; width:50px;">');
  }else{
    $("#loaderFiltro").hide();
  }
}
});
