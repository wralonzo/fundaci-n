<?php
require_once('tcpdf/tcpdf.php'); //Llamando a la Libreria TCPDF
require_once('config.php'); //Llamando a la conexión para BD
date_default_timezone_set('America/Guatemala');


ob_end_clean(); //limpiar la memoria


class MYPDF extends TCPDF{

    	public function Header() {
            $bMargin = $this->getBreakMargin();
            $auto_page_break = $this->AutoPageBreak;
            $this->SetAutoPageBreak(false, 0);
            $img_file = dirname( __FILE__ ) .'../assets/img/programa.jpeg';
            $this->Image($img_file, 70, 25, 60, 25, '', '', '', false, 50, '', false, false, 0);
            $this->SetAutoPageBreak($auto_page_break, $bMargin);
            $this->setPageMark();
	    }
}


//Iniciando un nuevo pdf
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, 'mm', 'Letter', true, 'UTF-8', false);

//Establecer margenes del PDF
$pdf->SetMargins(10, 35, 25);
$pdf->SetHeaderMargin(20);
$pdf->setPrintFooter(false);
$pdf->setPrintHeader(true); //Eliminar la linea superior del PDF por defecto
$pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM); //Activa o desactiva el modo de salto de página automático

//Informacion del PDF
$pdf->SetCreator('UrianViera');
$pdf->SetAuthor('UrianViera');
$pdf->SetTitle('Informe de clientes');

/** Eje de Coordenadas
 *          Y
 *          -
 *          -
 *          -
 *  X ------------- X
 *          -
 *          -
 *          -
 *          Y
 *
 * $pdf->SetXY(X, Y);
 */

//Agregando la primera página
$pdf->AddPage();
$pdf->SetFont('helvetica','B',10); //Tipo de fuente y tamaño de letra
$pdf->SetXY(150, 20);
//$pdf->Write(0, 'Código: 0014ABC');
$pdf->SetXY(150, 25);
$pdf->Write(0, 'Fecha: '. date('d-m-Y'));
$pdf->SetXY(150, 30);
$pdf->Write(0, 'Hora: '. date('h:i A'));

$canal ='WebDeveloper';
$pdf->SetFont('helvetica','B',10); //Tipo de fuente y tamaño de letra
$pdf->SetXY(15, 20); //Margen en X y en Y
$pdf->SetTextColor(204,0,0);
$pdf->Write(0, 'Reporte Fundabiem');
$pdf->SetTextColor(0, 0, 0); //Color Negrita
$pdf->SetXY(15, 25);




$pdf->Ln(35); //Salto de Linea
$pdf->Cell(40,26,'',0,0,'C');
/*$pdf->SetDrawColor(50, 0, 0, 0);
$pdf->SetFillColor(100, 0, 0, 0); */
$pdf->SetTextColor(34,68,136);
//$pdf->SetTextColor(255,204,0); //Amarillo
//$pdf->SetTextColor(34,68,136); //Azul
//$pdf->SetTextColor(153,204,0); //Verde
//$pdf->SetTextColor(204,0,0); //Marron
//$pdf->SetTextColor(245,245,205); //Gris claro
//$pdf->SetTextColor(100, 0, 0); //Color Carne
$pdf->SetFont('helvetica','B', 15);
$pdf->Cell(100,6,'Listado de Pacientes',0,0,'C');


$pdf->Ln(10); //Salto de Linea
$pdf->SetTextColor(0, 0, 0);

//Almando la cabecera de la Tabla
$pdf->SetFillColor(232,232,232);
$pdf->SetFont('helvetica','B',10); //La B es para letras en Negritas
$pdf->Cell(50,6,'Nombre y Apellido',1,0,'C',1);
$pdf->Cell(25,6,'Telefono',1,0,'C',1);
$pdf->Cell(35,6,'No Expediente',1,0,'C',1);
//$pdf->Cell(15,6,'Edad',1,0,'C',1);
$pdf->Cell(50,6,'Direccion',1,0,'C',1);
//$pdf->Cell(35,6,'Lugar',1,0,'C',1);
$pdf->Cell(25,6,'Fecha Ingreso',1,1,'C',1);

/*El 1 despues de  Fecha Ingreso indica que hasta alli
llega la linea */

$pdf->SetFont('helvetica','',7);


//SQL para consultas Pacientes
$fechaInit = date("Y-m-d", strtotime($_POST['fecha_creacion']));
$fechaFin  = date("Y-m-d", strtotime($_POST['fechaFin']));

//$sqlTrabajadores = ("SELECT * FROM cliente WHERE  (fecha_creacion>='$fechaInit' and fecha_creacion<='$fechaFin') ORDER BY fecha_creacion ASC");
$sqlTrabajadores = ("SELECT * FROM cliente p INNER JOIN salud pr on p.idusuario = pr.id WHERE  p.idusuario = 2 AND p.idestado = 1 AND `fecha_creacion` BETWEEN '$fechaInit' AND '$fechaFin' ORDER BY fecha_creacion ASC");
//$sqlTrabajadores = ("SELECT * FROM trabajadores");
$query = mysqli_query($con, $sqlTrabajadores);

while ($dataRow = mysqli_fetch_array($query)) {
        $pdf->Cell(50,6,($dataRow['Nombre'].' '.$dataRow['Apellido']),1,0,'C');
        $pdf->Cell(25,6,$dataRow['Telefono1'],1,0,'C');
        $pdf->Cell(35,6,$dataRow['N_expediente'],1,0,'C');
        //$pdf->Cell(15,6,$dataRow['edad'],1,0,'C');
        $pdf->Cell(50,6,($dataRow['Direccion']),1,0,'C');
        //$pdf->Cell(35,6,($dataRow['Lugar_n']),1,0,'C');
        $pdf->Cell(25,6,(date('m-d-Y', strtotime($dataRow['fecha_creacion']))),1,1,'C');
    }


//$pdf->AddPage(); //Agregar nueva Pagina

$pdf->Output('Reporte Fundabiem '.date('d_m_y').'.pdf', 'I');
// Output funcion que recibe 2 parameros, el nombre del archivo, ver archivo o descargar,
// La D es para Forzar una descarga
