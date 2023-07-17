<?php

// require_once('tcpdf_include.php');

// // create new PDF document
// $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// $pdf->startPageGroup();

// $pdf->AddPage();

// $bloque1 = <<<EOF

//     <table>
//         <tr>
//             <td style="width:150px"><img src="images/Retos_2.png"></td>
//         </tr>

//         <tr>
//         <td style="width:150px">
//             <div style="font-size:8.5px; text-align=left; line-height:15px; color:#1B4F72;>
//             <br>
//             JUAN DE GRIJALVA N. 610, FRACCIONAMIENTO REFORMA
//             </div>
//         </td>
//         </tr>

//     </table>
// EOF;

// $pdf->writeHTML($bloque1, true, false, true, false, '');

// $pdf->Output('factura.pdf', 'D');}}

require_once('tcpdf_include.php');

// Crea un nuevo documento PDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Establece los datos del documento
$pdf->SetCreator('Tu Nombre');
$pdf->SetAuthor('Tu Nombre');
$pdf->SetTitle('Factura');
$pdf->SetSubject('Factura');
$pdf->SetKeywords('Factura, TCPDF, PHP');

// Establece la configuración de la fuente
$pdf->setFontSubsetting(true);
$pdf->SetFont('helvetica', '', 12);

// Agrega una nueva página al documento
$pdf->AddPage();

// Agrega la imagen en la parte superior izquierda
$imageFile = 'ruta/de/la/imagen.png';
$pdf->Image($imageFile, 10, 10, 40, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);

// Establece el color del título "Orden de compra"
$pdf->SetTextColor(27, 79, 114); // #1B4F72 (azul)

$html = '<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1 style="text-align: right;">Orden de compra</h1>
    <br>
    <p><b>Cliente:</b> Nombre del cliente</p>
    <p><b>Dirección:</b> Dirección del cliente</p>
    <br>
    <table>
        <tr>
            <th>Cantidad</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Total</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Producto 1</td>
            <td>10.00</td>
            <td>10.00</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Producto 2</td>
            <td>15.00</td>
            <td>30.00</td>
        </tr>
        <tr>
        <td>2</td>
        <td>Producto 2</td>
        <td>15.00</td>
        <td>30.00</td>
    </tr>
    <tr>
    <td>2</td>
    <td>Producto 2</td>
    <td>15.00</td>
    <td>30.00</td>
</tr>
<tr>
<td>2</td>
<td>Producto 2</td>
<td>15.00</td>
<td>30.00</td>
</tr>
<tr>
<td>2</td>
<td>Producto 2</td>
<td>15.00</td>
<td>30.00</td>
</tr>
<tr>
<td>2</td>
<td>Producto 2</td>
<td>15.00</td>
<td>30.00</td>
</tr>
<tr>
<td>2</td>
<td>Producto 2</td>
<td>15.00</td>
<td>30.00</td>
</tr>
<tr>
<td>2</td>
<td>Producto 2</td>
<td>15.00</td>
<td>30.00</td>
</tr>
<tr>
<td>2</td>
<td>Producto 2</td>
<td>15.00</td>
<td>30.00</td>
</tr>
<tr>
<td>2</td>
<td>Producto 2</td>
<td>15.00</td>
<td>30.00</td>
</tr>
<tr>
<td>2</td>
<td>Producto 2</td>
<td>15.00</td>
<td>30.00</td>
</tr>
<tr>
<td>2</td>
<td>Producto 2</td>
<td>15.00</td>
<td>30.00</td>
</tr>
<tr>
<td>2</td>
<td>Producto 2</td>
<td>15.00</td>
<td>30.00</td>
</tr>
<tr>
<td>2</td>
<td>Producto 2</td>
<td>15.00</td>
<td>30.00</td>
</tr>
<tr>
<td>2</td>
<td>Producto 2</td>
<td>15.00</td>
<td>30.00</td>
</tr>
<tr>
<td>2</td>
<td>Producto 2</td>
<td>15.00</td>
<td>30.00</td>
</tr>
<tr>
<td>2</td>
<td>Producto 2</td>
<td>15.00</td>
<td>30.00</td>
</tr>
<tr>
<td>2</td>
<td>Producto 2</td>
<td>15.00</td>
<td>30.00</td>
</tr>
<tr>
<td>2</td>
<td>Producto 2</td>
<td>15.00</td>
<td>30.00</td>
</tr>
<tr>
<td>2</td>
<td>Producto 2</td>
<td>15.00</td>
<td>30.00</td>
</tr>
<tr>
<td>2</td>
<td>Producto 2</td>
<td>15.00</td>
<td>30.00</td>
</tr>
<tr>
<td>2</td>
<td>Producto 2</td>
<td>15.00</td>
<td>30.00</td>
</tr>
<tr>
<td>2</td>
<td>Producto 2</td>
<td>15.00</td>
<td>30.00</td>
</tr>
<tr>
<td>2</td>
<td>Producto 2</td>
<td>15.00</td>
<td>30.00</td>
</tr>
<tr>
<td>2</td>
<td>Producto 2</td>
<td>15.00</td>
<td>30.00</td>
</tr>
<tr>
<td>2</td>
<td>Producto 2</td>
<td>15.00</td>
<td>30.00</td>
</tr>
<tr>
<td>2</td>
<td>Producto 2</td>
<td>15.00</td>
<td>30.00</td>
</tr>
<tr>
<td>2</td>
<td>Producto 2</td>
<td>15.00</td>
<td>30.00</td>
</tr>
<tr>
<td>2</td>
<td>Producto 2</td>
<td>15.00</td>
<td>30.00</td>
</tr>
<tr>
<td>2</td>
<td>Producto 2</td>
<td>15.00</td>
<td>30.00</td>
</tr>
<tr>
<td>2</td>
<td>Producto 2</td>
<td>15.00</td>
<td>30.00</td>
</tr>
<tr>
<td>2</td>
<td>Producto 2</td>
<td>15.00</td>
<td>30.00</td>
</tr>
<tr>
<td>2</td>
<td>Producto 2</td>
<td>15.00</td>
<td>30.00</td>
</tr>
<tr>
<td>2</td>
<td>Producto 2</td>
<td>15.00</td>
<td>30.00</td>
</tr>
<tr>
<td>2</td>
<td>Producto 2</td>
<td>15.00</td>
<td>30.00</td>
</tr>
<tr>
<td>2</td>
<td>Producto 2</td>
<td>15.00</td>
<td>30.00</td>
</tr>
<tr>
<td>2</td>
<td>Producto 2</td>
<td>15.00</td>
<td>30.00</td>
</tr>
<tr>
<td>2</td>
<td>Producto 2</td>
<td>15.00</td>
<td>30.00</td>
</tr>
<tr>
<td>2</td>
<td>Producto 2</td>
<td>15.00</td>
<td>30.00</td>
</tr>
<tr>
<td>2</td>
<td>Producto 2</td>
<td>15.00</td>
<td>30.00</td>
</tr>
<tr>
<td>2</td>
<td>Producto 2</td>
<td>15.00</td>
<td>30.00</td>
</tr>
<tr>
<td>2</td>
<td>Producto 2</td>
<td>15.00</td>
<td>30.00</td>
</tr>
<tr>
<td>2</td>
<td>Producto 2</td>
<td>15.00</td>
<td>30.00</td>
</tr>
<tr>
<td>2</td>
<td>Producto 2</td>
<td>15.00</td>
<td>30.00</td>
</tr>
<tr>
<td>2</td>
<td>Producto 2</td>
<td>15.00</td>
<td>30.00</td>
</tr>
<tr>
<td>2</td>
<td>Producto 2</td>
<td>15.00</td>
<td>30.00</td>
</tr>
<tr>
<td>2</td>
<td>Producto 2</td>
<td>15.00</td>
<td>30.00</td>
</tr>
<tr>
<td>2</td>
<td>Producto 2</td>
<td>15.00</td>
<td>30.00</td>
</tr>
<tr>
<td>2</td>
<td>Producto 2</td>
<td>15.00</td>
<td>30.00</td>
</tr>
<tr>
<td>2</td>
<td>Producto 2</td>
<td>15.00</td>
<td>30.00</td>
</tr>
<tr>
<td>2</td>
<td>Producto 2</td>
<td>15.00</td>
<td>30.00</td>
</tr>
<tr>
<td>2</td>
<td>Producto 2</td>
<td>15.00</td>
<td>30.00</td>
</tr>
<tr>
<td>2</td>
<td>Producto 2</td>
<td>15.00</td>
<td>30.00</td>
</tr>
<tr>
<td>2</td>
<td>Producto 2</td>
<td>15.00</td>
<td>30.00</td>
</tr>
<tr>
<td>2</td>
<td>Producto 2</td>
<td>15.00</td>
<td>30.00</td>
</tr>
<tr>
<td>2</td>
<td>Producto 2</td>
<td>15.00</td>
<td>30.00</td>
</tr>
    </table>
    <br>
    <p style="text-align: right;"><b>Total:</b> 40.00</p>
</body>
</html>
';
$pdf->writeHTML($html, true, false, true, false, ''); // Escribir la tabla en el PDF

// Agrega una nueva página al documento
$pdf->AddPage();


// Establecer estilos de tabla
$style = array(
    'border' => true,
    'borderColor' => array(0, 0, 0), // Color del borde: negro
    'cellPadding' => 2, // Espaciado interno de celda
    'cellMargin' => 0, // Margen externo de celda
);

$pdf->SetFont('helvetica', 'B', 12);
// Definir contenido de la tabla
$html = '
<table border="1" style="width: 100%; height: 72px;">
    <tbody>
        <tr style="height: 18px;">
            <td rowspan="4" style="width: 33%; height: 82px; align-items:center;">
                <img style="width:160px; display: block; margin-left: auto; margin-right: auto;" src="images/Retos_2.png">
            </td>
            <td rowspan="3" style="width: 33%; height: 54px; text-align:center;">POLITICA</td>
            <td style="width: 33%; height: 18px;">Código: SPM7.101.B.1</td>
        </tr>
        <tr style="height: 18px;">
            <td style="width: 33%; height: 18px;">Rev: A </td>
        </tr>
        <tr style="height: 18px;">
            <td style="width: 33%; height: 18px;">Fecha: 22/06/2023  </td>
        </tr>
        <tr style="height: 18px;">
            <td style="width: 33%; height: 18px; text-align:center;">CONDICIONES GENERALES DE 
            COMPRA</td>
            <td style="width: 33%; height: 18px;">Fila 3, Columna 1</td>
        </tr>
    </tbody>
</table>

<br><br><br><br><br><br><br>
';

$content = '
<h3>1. INTRODUCCION</h3>
<p style="text-align: justify; margin-bottom:20px; color:black;">El presente documento define las condiciones generales de compra de las empresas Retos 
Energéticos Servicios, SA de CV, Energy Challenges LLC, Egoa Energia SL y Energy 
Challenges Inc. Independientemente del nombre particular señalado en el presente documento. 
Al conjunto de las citadas empresas, y a cada una de ellas, el presente documento se refiere 
como "EMPRESA COMPRADORA" de manera indistinta.</p>
<br><br><br>

<h3>2. GENERALIDADES</h3>
<p style="text-align: justify; color:black;">La aceptación de la presente orden de compra obliga al vendedor a ceñirse a estas 
condiciones generales y a las particulares del mismo. En el caso de discrepancias entre 
ambas, predomina lo indicado en las condiciones particulares señaladas en la orden de 
compra. Cualquier variación de las condiciones generales o particulares se considerará nula
de no mediar aceptación escrita por parte de la EMPRESA COMPRADORA firmada por un 
apoderado debidamente autorizado para ello.</p>

<h3>3. PLAZO DE ENTREGA</h3>
<p style="text-align: justify; color:black; ">Los plazos de entrega señalados en nuestra orden de compra se entienden para 
mercancías depositadas en el lugar convenido de acuerdo con la orden de compra. La
EMPRESA COMPRADORA se reserva el derecho de rechazar toda aquella mercancía que 
no haya sido entregada en los plazos señalados. El proveedor deberá adjuntar a la entrega 
del producto un albarán debidamente cumplimentado indicando número de orden de 
compra, cantidad, referencia de la EMPRESA COMPRADORA y descripción, línea de la 
orden de compra o posición a la que corresponde la entrega, fecha, observaciones si las
hubiera y cualquier otra documentación referida en la orden de compra.</p>';




$pdf->writeHTML($html, true, false, true, false, ''); // Escribir la tabla en el PDF

// Agregar el contenido HTML al PDF
$pdf->SetFont('helvetica', '', 14);
$pdf->writeHTML($content, true, false, true, false, '');



// Agrega una nueva página al documento
$pdf->AddPage();


// Establecer estilos de tabla
$style = array(
    'border' => true,
    'borderColor' => array(0, 0, 0), // Color del borde: negro
    'cellPadding' => 2, // Espaciado interno de celda
    'cellMargin' => 0, // Margen externo de celda
);
$pdf->SetFont('helvetica', 'B', 12);
// Definir contenido de la tabla
$html = '
<table border="1" style="width: 100%; height: 72px;">
    <tbody>
        <tr style="height: 18px;">
            <td rowspan="4" style="width: 33%; height: 82px; align-items:center;">
                <img style="width:160px; display: block; margin-left: auto; margin-right: auto;" src="images/Retos_2.png">
            </td>
            <td rowspan="3" style="width: 33%; height: 54px; text-align:center;">POLITICA</td>
            <td style="width: 33%; height: 18px;">Código: SPM7.101.B.1</td>
        </tr>
        <tr style="height: 18px;">
            <td style="width: 33%; height: 18px;">Rev: A </td>
        </tr>
        <tr style="height: 18px;">
            <td style="width: 33%; height: 18px;">Fecha: 22/06/2023  </td>
        </tr>
        <tr style="height: 18px;">
            <td style="width: 33%; height: 18px; text-align:center;">CONDICIONES GENERALES DE 
            COMPRA</td>
            <td style="width: 33%; height: 18px;">Fila 3, Columna 1</td>
        </tr>
    </tbody>
</table>

<br><br><br><br>
';

$content = '
<h3>4. PENALIDADES</h3>
<p style="text-align: justify; color:black;">En caso de demora de la fecha de entrega concertada, el suministrador abonará a la 
EMPRESA COMPRADORA una indemnización, por importe del 1% del valor total de la 
orden de compra, por cada semana completa de retraso, hasta un máximo del 10% del valor 
total de esta.</p>

<h3>5. TRANSPORTE Y EMBALAJES</h3>
<p style="text-align: justify; color:black;">El transporte se efectuará por cuenta del suministrador hasta el lugar de entrega acordado 
en la orden de compra, entendiéndose que las mercancías viajan por cuenta y riesgo del
suministrador hasta el punto acordado. Los materiales se suministrarán con el embalaje
adecuado para garantizar su entrega en buen estado. La EMPRESA COMPRADORA no 
responde de faltas, averías y cambios que puedan ocurrir en los transportes de estos 
envíos, debiendo reclamar en estos casos el suministrador ante la entidad responsable 
del transporte, por medio de los correspondientes documentos de transporte antes
de la entrega definitiva de la mercancía.</p>

<p style="text-align: justify; color:black;">Salvo que otra cosa se establezca en la orden de compra, la entrega deberá ser efectuada
Delivery Duty Paid (DDP) (interpretado de conformidad con los INCOTERMS vigentes en la
fecha de la orden de compra, a no ser que se señale un Incoterm/año particular en la orden 
de compra). La transferencia del riesgo se produce en el momento en que el Producto sea 
aceptado formalmente por la EMPRESA COMPRADORA salvo pacto en contrario, no están 
permitidas las expediciones parciales.</p>

<h3>6. FACTURACIÓN Y PAGOS</h3>
<p style="text-align: justify; color:black;">Deberán formularse una factura por cada orden de compra, haciendo figurar en la misma el 
número de la correspondiente orden de compra. Las facturas deberán obrar en nuestro 
poder en un plazo máximo de 5 días después de la fecha que se indique en la factura.
Las facturas que no cumplan estos requisitos serán devueltas, comenzado a contar el plazo 
de pago a partir de que se recibe la nueva factura conforme. En cualquier caso, no se</p>
';




$pdf->writeHTML($html, true, false, true, false, ''); // Escribir la tabla en el PDF

// Agregar el contenido HTML al PDF
$pdf->SetFont('helvetica', '', 14);
$pdf->writeHTML($content, true, false, true, false, '');


$pdf->AddPage();


// Establecer estilos de tabla
$style = array(
    'border' => true,
    'borderColor' => array(0, 0, 0), // Color del borde: negro
    'cellPadding' => 2, // Espaciado interno de celda
    'cellMargin' => 0, // Margen externo de celda
);
$pdf->SetFont('helvetica', 'B', 12);
// Definir contenido de la tabla
$html = '
<table border="1" style="width: 100%; height: 72px;">
    <tbody>
        <tr style="height: 18px;">
            <td rowspan="4" style="width: 33%; height: 82px; align-items:center;">
                <img style="width:160px; display: block; margin-left: auto; margin-right: auto;" src="images/Retos_2.png">
            </td>
            <td rowspan="3" style="width: 33%; height: 54px; text-align:center;">POLITICA</td>
            <td style="width: 33%; height: 18px;">Código: SPM7.101.B.1</td>
        </tr>
        <tr style="height: 18px;">
            <td style="width: 33%; height: 18px;">Rev: A </td>
        </tr>
        <tr style="height: 18px;">
            <td style="width: 33%; height: 18px;">Fecha: 22/06/2023  </td>
        </tr>
        <tr style="height: 18px;">
            <td style="width: 33%; height: 18px; text-align:center;">CONDICIONES GENERALES DE 
            COMPRA</td>
            <td style="width: 33%; height: 18px;">Fila 3, Columna 1</td>
        </tr>
    </tbody>
</table>

<br><br><br><br><br>
';

$content = '

<p style="text-align: justify; color:black;">
aceptarán facturas, y por tanto no se ejecutarán pagos en aquellos casos donde por causas 
del suministrador, no se recibiera la factura correcta de acuerdo con las presentes 
Condiciones Generales de Compra dentro de los siguientes 60 días de la entrega de los 
bienes, o ejecución del servicio.
Salvo pacto contrario, las facturas se harán efectivas a los 45 días fecha factura mediante 
transferencia bancaria a banco nacional en el territorio nacional del suministrador el último 
día de cada quincena. No se admitirán facturaciones parciales, salvo que se indique lo
contrario y sea aceptado de manera escrita por la EMPRESA COMPRADORA. Las facturas 
reunirán todos los requisitos establecidos legalmente.</p>

<h3>7. EJECUCIÓN</h3>
<p style="text-align: justify; color:black;">En aquellos casos en que las órdenes de compra emitidas por la EMPRESA 
COMPRADORA se refieran a obras o equipos cuya ejecución deba hacerse según planos 
facilitados por la EMPRESA COMPRADORA, el suministrador se ceñirá a las indicaciones
que figuren en dichos planos, tales como lista de materiales, normas, etc. Pudiendo la
EMPRESA COMPRADORA rechazar aquellos componentes o trabajos que no se ajusten 
con exactitud a los antes citados condicionantes.</p>

<p style="text-align: justify; color:black;">Si el suministrador cree encontrar errores o diferencias en la documentación deberá 
comunicarlo inmediatamente a la EMPRESA COMPRADORA por escrito con el fin 
de poder adoptar las medidas pertinentes al caso. De ninguna manera deberá el 
suministrador realizar cambios de forma unilateral.</p>

<h3>8. INSPECCIONES</h3>
<p style="text-align: justify; color:black;">El suministrador se compromete, durante el período de fabricación, a facilitar libre acceso a 
sus talleres o instalaciones tanto a la EMPRESA COMPRADORA como a sus inspectores, 
clientes o sus delegados, con el fin de poder inspeccionar en las instalaciones del 
suministrador, serán a su cuenta, dando además al personal en cuestión toda clase de 
facilidades y asistencia para facilitar su trabajo.</p>

';




$pdf->writeHTML($html, true, false, true, false, ''); // Escribir la tabla en el PDF

// Agregar el contenido HTML al PDF
$pdf->SetFont('helvetica', '', 14);
$pdf->writeHTML($content, true, false, true, false, '');


$pdf->AddPage();


// Establecer estilos de tabla
$style = array(
    'border' => true,
    'borderColor' => array(0, 0, 0), // Color del borde: negro
    'cellPadding' => 2, // Espaciado interno de celda
    'cellMargin' => 0, // Margen externo de celda
);
$pdf->SetFont('helvetica', 'B', 12);
// Definir contenido de la tabla
$html = '
<table border="1" style="width: 100%; height: 72px;">
    <tbody>
        <tr style="height: 18px;">
            <td rowspan="4" style="width: 33%; height: 82px; align-items:center;">
                <img style="width:160px; display: block; margin-left: auto; margin-right: auto;" src="images/Retos_2.png">
            </td>
            <td rowspan="3" style="width: 33%; height: 54px; text-align:center;">POLITICA</td>
            <td style="width: 33%; height: 18px;">Código: SPM7.101.B.1</td>
        </tr>
        <tr style="height: 18px;">
            <td style="width: 33%; height: 18px;">Rev: A </td>
        </tr>
        <tr style="height: 18px;">
            <td style="width: 33%; height: 18px;">Fecha: 22/06/2023  </td>
        </tr>
        <tr style="height: 18px;">
            <td style="width: 33%; height: 18px; text-align:center;">CONDICIONES GENERALES DE 
            COMPRA</td>
            <td style="width: 33%; height: 18px;">Fila 3, Columna 1</td>
        </tr>
    </tbody>
</table>

<br><br><br><br><br>
';

$content = '

<h3>La inspección no inhibirá al suministrador de la responsabilidad en cuanto a daños y 
deficiencias que se presenten durante el período de garantía.</h3>

<h3>9. GESTIÓN DE NO CONFORMIDADES</h3>
<p style="text-align: justify; color:black;">En caso de que se detecte un incumplimiento por parte del suministrador, se emite una No 
Conformidad con el fin de poder controlar y corregir dicha desviación, así como el 
establecimiento de acciones que garanticen que no habrá recurrencia en dicho incumplimiento.</p>
<p style="color:black">Para la atención de la no conformidad se requiere que el suministrador:</p>
<ul style="color:black">
  <li>Corrija la desviación.</li>
  <li>Realice un análisis para determinar la causa que ocasionó que se presentara esta desviación.</li>
  <li>Evalue la necesidad de tomar acciones para prevenir la recurrencia.</li>
  <li>Implemente las acciones necesarias.</li>
  <li>Entregue la evidencia de las acciones al responsable de QSE, para que valide la eficacia de estas, y proceda a su cierre, o solicite cambios/nuevas acciones.</li>
</ul>

<h3>10. INFORMES SOBRE EL PROGRESO</h3>
<p style="text-align: justify; color:black;">El suministrador se compromete a remitir a la EMPRESA COMPRADORA informes periódicos detallando e indicando el progreso de la fabricación a él encomendada, según acuerdo mutuo establecido entre ambos en cada caso particular.</p>

<h3>11. SUBCONTRATISTAS</h3>
<p style="text-align: justify; color:black;">Si el contratista contrata a subcontratistas, es obligación del contratista enviar los requisitos documentales conforme se describe en este documento, así como evidencia de la relación laboral entre ambas empresas.</p>

';




$pdf->writeHTML($html, true, false, true, false, ''); // Escribir la tabla en el PDF

// Agregar el contenido HTML al PDF
$pdf->SetFont('helvetica', '', 14);
$pdf->writeHTML($content, true, false, true, false, '');



$pdf->AddPage();


// Establecer estilos de tabla
$style = array(
    'border' => true,
    'borderColor' => array(0, 0, 0), // Color del borde: negro
    'cellPadding' => 2, // Espaciado interno de celda
    'cellMargin' => 0, // Margen externo de celda
);
$pdf->SetFont('helvetica', 'B', 12);
// Definir contenido de la tabla
$html = '
<table border="1" style="width: 100%; height: 72px;">
    <tbody>
        <tr style="height: 18px;">
            <td rowspan="4" style="width: 33%; height: 82px; align-items:center;">
                <img style="width:160px; display: block; margin-left: auto; margin-right: auto;" src="images/Retos_2.png">
            </td>
            <td rowspan="3" style="width: 33%; height: 54px; text-align:center;">POLITICA</td>
            <td style="width: 33%; height: 18px;">Código: SPM7.101.B.1</td>
        </tr>
        <tr style="height: 18px;">
            <td style="width: 33%; height: 18px;">Rev: A </td>
        </tr>
        <tr style="height: 18px;">
            <td style="width: 33%; height: 18px;">Fecha: 22/06/2023  </td>
        </tr>
        <tr style="height: 18px;">
            <td style="width: 33%; height: 18px; text-align:center;">CONDICIONES GENERALES DE 
            COMPRA</td>
            <td style="width: 33%; height: 18px;">Fila 3, Columna 1</td>
        </tr>
    </tbody>
</table>

<br><br><br>
';

$content = '


<h3>12. GARANTÍAS</h3>
<p style="text-align: justify; color:black;">El suministrador deberá garantizar la buena ejecución y calidad de fabricación y materiales suministrados durante un período mínimo de 18 meses desde el suministro y/o 12 meses contados a partir de la puesta en servicio de la instalación completa suministrada a la EMPRESA COMPRADORA, en la cual esté incorporado dicho suministro.</p>
<p style="text-align: justify; color:black;">Las faltas o defectos en el suministro, observado durante el citado período de garantía, deberán ser eliminados a la mayor brevedad posible por el suministrador corriendo él mismo con los gastos que ello origine, iniciándose de nuevo el plazo de garantía para el suministro, o parte de este, o repuesto utilizado en dicha corrección de falla o defecto.</p>

<h3>13. PROPIEDAD</h3>
<p style="text-align: justify; color:black;">Los proyectos, memorias, cálculos, dibujos y cuantos documentos y materiales proporcione la EMPRESA COMPRADORA, así como fotocopias o cualquier tipo de reproducción de información en cualquier medio de almacenaje físico o magnético, quedarán siempre en absoluta propiedad de la EMPRESA COMPRADORA, no pudiendo el suministrador disponer de ellos más que para la ejecución de los trabajos relacionados con la orden de compra y tampoco podrán ser entregados a otras personas o empresas sin autorización escrita por parte de la EMPRESA COMPRADORA, debiendo ser devueltos a petición de la EMPRESA COMPRADORA en un plazo máximo de 10 días tras notificación escrita.</p>
<p style="text-align: justify; color:black;">Igualmente, quedarán en propiedad de la EMPRESA COMPRADORA los troqueles, prototipos, ensayos y modelos que el suministrador confeccione para la ejecución de la obra comprendida en las órdenes de compra emitidas por la EMPRESA COMPRADORA.</p>



';




$pdf->writeHTML($html, true, false, true, false, ''); // Escribir la tabla en el PDF

// Agregar el contenido HTML al PDF
$pdf->SetFont('helvetica', '', 14);
$pdf->writeHTML($content, true, false, true, false, '');



$pdf->AddPage();


// Establecer estilos de tabla
$style = array(
    'border' => true,
    'borderColor' => array(0, 0, 0), // Color del borde: negro
    'cellPadding' => 2, // Espaciado interno de celda
    'cellMargin' => 0, // Margen externo de celda
);
$pdf->SetFont('helvetica', 'B', 12);
// Definir contenido de la tabla
$html = '
<table border="1" style="width: 100%; height: 72px;">
    <tbody>
        <tr style="height: 18px;">
            <td rowspan="4" style="width: 33%; height: 82px; align-items:center;">
                <img style="width:160px; display: block; margin-left: auto; margin-right: auto;" src="images/Retos_2.png">
            </td>
            <td rowspan="3" style="width: 33%; height: 54px; text-align:center;">POLITICA</td>
            <td style="width: 33%; height: 18px;">Código: SPM7.101.B.1</td>
        </tr>
        <tr style="height: 18px;">
            <td style="width: 33%; height: 18px;">Rev: A </td>
        </tr>
        <tr style="height: 18px;">
            <td style="width: 33%; height: 18px;">Fecha: 22/06/2023  </td>
        </tr>
        <tr style="height: 18px;">
            <td style="width: 33%; height: 18px; text-align:center;">CONDICIONES GENERALES DE 
            COMPRA</td>
            <td style="width: 33%; height: 18px;">Fila 3, Columna 1</td>
        </tr>
    </tbody>
</table>

<br><br><br>
';

$content = '


<h3>14. RESOLUCIÓN DE DIFERENCIAS</h3>
<p style="text-align: justify; color:black;">Los gastos que se ocasionen por retraso del recibo de la documentación de envío o por la 
no observancia de estas condiciones generales, será de cuenta del suministrador. En el 
caso de que sugieran diferencias en la interpretación y cumplimiento de estas condiciones 
generales o bien en lo que al cumplimiento de las condiciones de pago estipuladas se refiere 
o cualquier otra causa que pudiera surgir, tanto la EMPRESA COMPRADORA como el 
suministrador, aceptan únicamente para resolverlas los Tribunales que más adelante se
detallan, en función de la entidad o empresa compradora:</p>

<ol type="i">
  <li>ENERGY CHALLENGES LLC: Condado de Milwaukee, Estado Wisconsin, Estados Unidos de América</li>
  <li>RETOS ENERGETICOS SERVICIOS, SA DE CV: en el Estado de Veracruz, Ver. México</li>
  <li>ENERGY CHALLENGES Inc.: Condado de Milwaukee, Estado Wisconsin, Estados Unidos de América</li>
  <li>EGOA ENERGIA, SL: Ciudad de Bilbao, Bizkaia, España</li>
</ol>

<h3>15. PRECIOS</h3>
<p style="text-align: justify; color:black;">Los precios reflejados en la orden de compra serán fijos, firmes y definitivos y no podrán ser
objeto de revisión. En el precio se entienden incluidos todos los conceptos que integran o 
pueden integrar el coste del Producto/Servicio objeto de la orden de compra, incluyendo a 
título meramente enunciativo, salarios, cargas sociales, materiales consumibles, 
transportes, embalaje y etiquetado, accesorios, dispositivos, grúas y otras herramientas
necesarias, dietas por cualquier concepto, pagos en concepto de propiedad intelectual, 
gastos derivados de la inspección, pruebas y certificados especificados en la orden de 
compra, tipos de cambio, impuestos, aranceles y gravámenes de todo tipo.</p>


';




$pdf->writeHTML($html, true, false, true, false, ''); // Escribir la tabla en el PDF

// Agregar el contenido HTML al PDF
$pdf->SetFont('helvetica', '', 14);
$pdf->writeHTML($content, true, false, true, false, '');


$pdf->AddPage();


// Establecer estilos de tabla
$style = array(
    'border' => true,
    'borderColor' => array(0, 0, 0), // Color del borde: negro
    'cellPadding' => 2, // Espaciado interno de celda
    'cellMargin' => 0, // Margen externo de celda
);
$pdf->SetFont('helvetica', 'B', 12);
// Definir contenido de la tabla
$html = '
<table border="1" style="width: 100%; height: 72px;">
    <tbody>
        <tr style="height: 18px;">
            <td rowspan="4" style="width: 33%; height: 82px; align-items:center;">
                <img style="width:160px; display: block; margin-left: auto; margin-right: auto;" src="images/Retos_2.png">
            </td>
            <td rowspan="3" style="width: 33%; height: 54px; text-align:center;">POLITICA</td>
            <td style="width: 33%; height: 18px;">Código: SPM7.101.B.1</td>
        </tr>
        <tr style="height: 18px;">
            <td style="width: 33%; height: 18px;">Rev: A </td>
        </tr>
        <tr style="height: 18px;">
            <td style="width: 33%; height: 18px;">Fecha: 22/06/2023  </td>
        </tr>
        <tr style="height: 18px;">
            <td style="width: 33%; height: 18px; text-align:center;">CONDICIONES GENERALES DE 
            COMPRA</td>
            <td style="width: 33%; height: 18px;">Fila 3, Columna 1</td>
        </tr>
    </tbody>
</table>

<br><br><br>
';

$content = '

<h3>16. CALIDAD</h3>
<p style="text-align: justify; color:black;">El suministrador es responsable de la calidad de los Productos/Servicios que entrega a la 
EMPRESA COMPRADORA, independientemente de si los fabrica o ejecuta él mismo, o los 
adquiere a un subcontratista. Ninguna modificación técnica debe ser hecha sin 
consentimiento previo y escrito por parte de la EMPRESA COMPRADORA.</p>

<h3>17. SEGURIDAD</h3>
<p style="text-align: justify; color:black;">El suministrador deberá cumplir todo lo dispuesto en la normativa de Seguridad e Higiene 
en el Trabajo tanto en el país donde el suministrador desarrolla su actividad, como en el 
país destino de las mercancías en función del Incoterm pactado y punto de entrega, en 
cuanto a personal empleado, directa o indirectamente, para la ejecución del Contrato y
asumirá todas las responsabilidades por incumplimiento de sus obligaciones laborales, 
accidentes de trabajo e incumplimiento de Leyes Sociales. El suministrador se compromete 
además a comunicar a la EMPRESA COMPRADORA cualquier accidente grave que 
implique a su personal empleado o subcontratado.</p>

<p style="text-align: justify; color:black;">El suministrador informará por escrito a los trabajadores de los riesgos específicos que 
conlleva el desempeño de su trabajo y las medidas preventivas que obligatoriamente han 
de adoptar para evitarlos, y entregará a la EMPRESA COMPRADORA copia del escrito 
entregado a cada trabajador firmada por ellos.</p>

<h3>18. SEGUROS</h3>
<p style="text-align: justify; color:black;">Cada una de las partes contratará y mantendrá los seguros necesarios conforme a la 
legislación aplicable y a la buena práctica profesional, así como los que se requieran 
específicamente en el Contrato.</p>

<p style="text-align: justify; color:black;">Para trabajos de servicios o instalaciones, en el que el suministrador pudiera tener personal 
en las instalaciones de la EMPRESA COMPRADORA o de sus clientes, el suministrador
dispondrá de las pólizas que cubran suficientemente los riesgos por daños derivados de su 
actividad y de sus productos y, tendrán un importe de indemnización mínima superior a 
1,000,000.00 (un millón) dólares americanos.</p>

';


$pdf->writeHTML($html, true, false, true, false, ''); // Escribir la tabla en el PDF

// Agregar el contenido HTML al PDF
$pdf->SetFont('helvetica', '', 14);
$pdf->writeHTML($content, true, false, true, false, '');



$pdf->AddPage();


// Establecer estilos de tabla
$style = array(
    'border' => true,
    'borderColor' => array(0, 0, 0), // Color del borde: negro
    'cellPadding' => 2, // Espaciado interno de celda
    'cellMargin' => 0, // Margen externo de celda
);
$pdf->SetFont('helvetica', 'B', 12);
// Definir contenido de la tabla
$html = '
<table border="1" style="width: 100%; height: 72px;">
    <tbody>
        <tr style="height: 18px;">
            <td rowspan="4" style="width: 33%; height: 82px; align-items:center;">
                <img style="width:160px; display: block; margin-left: auto; margin-right: auto;" src="images/Retos_2.png">
            </td>
            <td rowspan="3" style="width: 33%; height: 54px; text-align:center;">POLITICA</td>
            <td style="width: 33%; height: 18px;">Código: SPM7.101.B.1</td>
        </tr>
        <tr style="height: 18px;">
            <td style="width: 33%; height: 18px;">Rev: A </td>
        </tr>
        <tr style="height: 18px;">
            <td style="width: 33%; height: 18px;">Fecha: 22/06/2023  </td>
        </tr>
        <tr style="height: 18px;">
            <td style="width: 33%; height: 18px; text-align:center;">CONDICIONES GENERALES DE 
            COMPRA</td>
            <td style="width: 33%; height: 18px;">Fila 3, Columna 1</td>
        </tr>
    </tbody>
</table>

<br><br><br>
';

$content = '

<p style="text-align: justify; color:black;">A requerimiento de la EMPRESA COMPRADORA, el suministrador le proporcionará copia 
de los justificantes de pago de las primas y copia de las pólizas contratadas, que no podrán 
ser modificadas o canceladas hasta que finalice la ejecución de la orden de compra.</p>

<h3>19. CONFIDENCIALIDAD</h3>
<p style="text-align: justify; color:black;">Toda la información técnica, económica o comercial relativa a la EMPRESA 
COMPRADORA, a las sociedades del grupo de la EMPRESA COMPRADORA, a sus 
clientes o a sus productos, que pueda llegar a conocer el suministrador como consecuencia 
del cumplimiento del Contrato, incluidos los propios términos de este, tendrá el carácter de 
información confidencial. El suministrador se obliga a no revelar a terceros dicha información 
confidencial y a no utilizarla, directa o indirectamente, para propósitos distintos de los 
previstos en el contrato.</p>

<p style="text-align: justify; color:black;">La transmisión de información confidencial por parte del suministrador a sus empleados sólo 
deberá hacerse cuando sea estrictamente necesario para la consecución de los fines del 
Contrato, garantizando en todo caso el suministrador el cumplimiento por parte de dichos 
empleados de la obligación de confidencialidad contenida en el párrafo anterior.</p>

<h3>20. FUERZA MAYOR</h3>
<p style="text-align: justify; color:black;">Se considera fuerza mayor cualquier acontecimiento imprevisto o que siendo previsible no 
pueda evitarse y que dificulte extraordinariamente o imposibilite el cumplimiento de las
obligaciones de cualquiera de las partes. A estos efectos, no se considerará causa de 
fuerza mayor las huelgas, paros y conflictos laborales que afecten únicamente a los 
empleados o personal dependiente del suministrador, la falta de medios de transporte o
materiales, demoras de los subcontratistas, ni aquellas circunstancias que no sean 
comunicadas a la EMPRESA COMPRADORA en el plazo de cinco días desde que
acontezcan las causas que las originen, con expresión de estas y del plazo de duración 
previsto, así como de las medidas alternativas adoptadas o adoptables para solucionar o
minimizar al máximo los inconvenientes que puedan surgir por dicha fuerza mayor.</p>

';


$pdf->writeHTML($html, true, false, true, false, ''); // Escribir la tabla en el PDF

// Agregar el contenido HTML al PDF
$pdf->SetFont('helvetica', '', 14);
$pdf->writeHTML($content, true, false, true, false, '');



$pdf->AddPage();


// Establecer estilos de tabla
$style = array(
    'border' => true,
    'borderColor' => array(0, 0, 0), // Color del borde: negro
    'cellPadding' => 2, // Espaciado interno de celda
    'cellMargin' => 0, // Margen externo de celda
);
$pdf->SetFont('helvetica', 'B', 12);
// Definir contenido de la tabla
$html = '
<table border="1" style="width: 100%; height: 72px;">
    <tbody>
        <tr style="height: 18px;">
            <td rowspan="4" style="width: 33%; height: 82px; align-items:center;">
                <img style="width:160px; display: block; margin-left: auto; margin-right: auto;" src="images/Retos_2.png">
            </td>
            <td rowspan="3" style="width: 33%; height: 54px; text-align:center;">POLITICA</td>
            <td style="width: 33%; height: 18px;">Código: SPM7.101.B.1</td>
        </tr>
        <tr style="height: 18px;">
            <td style="width: 33%; height: 18px;">Rev: A </td>
        </tr>
        <tr style="height: 18px;">
            <td style="width: 33%; height: 18px;">Fecha: 22/06/2023  </td>
        </tr>
        <tr style="height: 18px;">
            <td style="width: 33%; height: 18px; text-align:center;">CONDICIONES GENERALES DE 
            COMPRA</td>
            <td style="width: 33%; height: 18px;">Fila 3, Columna 1</td>
        </tr>
    </tbody>
</table>

<br><br><br>
';

$content = '

<p style="text-align: justify; color:black;">A requerimiento de la EMPRESA COMPRADORA, el suministrador le proporcionará copia 
de los justificantes de pago de las primas y copia de las pólizas contratadas, que no podrán 
ser modificadas o canceladas hasta que finalice la ejecución de la orden de compra.</p>

<h3>19. CONFIDENCIALIDAD</h3>
<p style="text-align: justify; color:black;">Toda la información técnica, económica o comercial relativa a la EMPRESA 
COMPRADORA, a las sociedades del grupo de la EMPRESA COMPRADORA, a sus 
clientes o a sus productos, que pueda llegar a conocer el suministrador como consecuencia 
del cumplimiento del Contrato, incluidos los propios términos de este, tendrá el carácter de 
información confidencial. El suministrador se obliga a no revelar a terceros dicha información 
confidencial y a no utilizarla, directa o indirectamente, para propósitos distintos de los 
previstos en el contrato.</p>

<p style="text-align: justify; color:black;">La transmisión de información confidencial por parte del suministrador a sus empleados sólo 
deberá hacerse cuando sea estrictamente necesario para la consecución de los fines del 
Contrato, garantizando en todo caso el suministrador el cumplimiento por parte de dichos 
empleados de la obligación de confidencialidad contenida en el párrafo anterior.</p>

<h3>20. FUERZA MAYOR</h3>
<p style="text-align: justify; color:black;">Se considera fuerza mayor cualquier acontecimiento imprevisto o que siendo previsible no 
pueda evitarse y que dificulte extraordinariamente o imposibilite el cumplimiento de las
obligaciones de cualquiera de las partes. A estos efectos, no se considerará causa de 
fuerza mayor las huelgas, paros y conflictos laborales que afecten únicamente a los 
empleados o personal dependiente del suministrador, la falta de medios de transporte o
materiales, demoras de los subcontratistas, ni aquellas circunstancias que no sean 
comunicadas a la EMPRESA COMPRADORA en el plazo de cinco días desde que
acontezcan las causas que las originen, con expresión de estas y del plazo de duración 
previsto, así como de las medidas alternativas adoptadas o adoptables para solucionar o
minimizar al máximo los inconvenientes que puedan surgir por dicha fuerza mayor.</p>

';


$pdf->writeHTML($html, true, false, true, false, ''); // Escribir la tabla en el PDF

// Agregar el contenido HTML al PDF
$pdf->SetFont('helvetica', '', 14);
$pdf->writeHTML($content, true, false, true, false, '');




$pdf->AddPage();


// Establecer estilos de tabla
$style = array(
    'border' => true,
    'borderColor' => array(0, 0, 0), // Color del borde: negro
    'cellPadding' => 2, // Espaciado interno de celda
    'cellMargin' => 0, // Margen externo de celda
);
$pdf->SetFont('helvetica', 'B', 12);
// Definir contenido de la tabla
$html = '
<table border="1" style="width: 100%; height: 72px;">
    <tbody>
        <tr style="height: 18px;">
            <td rowspan="4" style="width: 33%; height: 82px; align-items:center;">
                <img style="width:160px; display: block; margin-left: auto; margin-right: auto;" src="images/Retos_2.png">
            </td>
            <td rowspan="3" style="width: 33%; height: 54px; text-align:center;">POLITICA</td>
            <td style="width: 33%; height: 18px;">Código: SPM7.101.B.1</td>
        </tr>
        <tr style="height: 18px;">
            <td style="width: 33%; height: 18px;">Rev: A </td>
        </tr>
        <tr style="height: 18px;">
            <td style="width: 33%; height: 18px;">Fecha: 22/06/2023  </td>
        </tr>
        <tr style="height: 18px;">
            <td style="width: 33%; height: 18px; text-align:center;">CONDICIONES GENERALES DE 
            COMPRA</td>
            <td style="width: 33%; height: 18px;">Fila 3, Columna 1</td>
        </tr>
    </tbody>
</table>

<br><br><br>
';

$content = '


<p style="text-align: justify; color:black;">Cuando acontezca un supuesto de fuerza mayor el plazo de cumplimiento se prorrogará 
de forma equivalente al número de días durante los que se haya prolongado la fuerza 
mayor. Si el evento de fuerza mayor durase más de 60 días o si, dadas las circunstancias, 
fuera obvio que durará 60 días, la EMPRESA COMPRADORA podrá resolver el contrato 
mediante notificación al suministrador.</p>

<h3>21. INVALIDEZ</h3>
<p style="text-align: justify; color:black;">Cuando alguna de las cláusulas del Contrato o de estas CC fuese declarada ilegal, nula o 
inejecutable, total o parcialmente, dicha ilegalidad, nulidad o inejecutabilidad no se 
extenderá al resto de cláusulas, las cuales se mantendrán en vigor. Las partes acuerdan 
sustituir cualquier cláusula que deviniese ilegal, nula o inejecutable por otra válida, de 
efecto lo más similar posible.</p>

<h3>22. DURACIÓN Y CANCELACIÓN</h3>
<p style="text-align: justify; color:black;">Estas CC comenzarán a surtir efectos desde la aceptación de la correspondiente orden de 
compra relacionada con estas condiciones y permanecerán vigentes mientras dure la relación 
comercial entre la EMPRESA COMPRADORA y SUMINISTRADOR, así como durante el 
correspondiente plazo de garantía.</p>

<h3>23. FRAUDE Y CORRUPCIÓN</h3>
<p style="text-align: justify; color:black;">El suministrador impedirá cualquier actividad fraudulenta de sus representantes en relación 
con la recepción de cualquier suma de dinero procedente de la EMPRESA COMPRADORA
o las sociedades de su grupo. El suministrador asume y garantiza en relación con cualquier 
contrato con l a E M P R E S A C O M P R A D O R A y cualquier sociedad de su grupo: (i) 
que no ha entregado, y no entregará, ningún obsequio o comisión, y (ii) que no ha pactado,
ni pactará, el pago de comisión alguna a ningún empleado, agente o representante de la 
EMPRESA COMPRADORA.</p>




';


$pdf->writeHTML($html, true, false, true, false, ''); // Escribir la tabla en el PDF

// Agregar el contenido HTML al PDF
$pdf->SetFont('helvetica', '', 14);
$pdf->writeHTML($content, true, false, true, false, '');



$pdf->AddPage();


// Establecer estilos de tabla
$style = array(
    'border' => true,
    'borderColor' => array(0, 0, 0), // Color del borde: negro
    'cellPadding' => 2, // Espaciado interno de celda
    'cellMargin' => 0, // Margen externo de celda
);
$pdf->SetFont('helvetica', 'B', 12);
// Definir contenido de la tabla
$html = '
<table border="1" style="width: 100%; height: 72px;">
    <tbody>
        <tr style="height: 18px;">
            <td rowspan="4" style="width: 33%; height: 82px; align-items:center;">
                <img style="width:160px; display: block; margin-left: auto; margin-right: auto;" src="images/Retos_2.png">
            </td>
            <td rowspan="3" style="width: 33%; height: 54px; text-align:center;">POLITICA</td>
            <td style="width: 33%; height: 18px;">Código: SPM7.101.B.1</td>
        </tr>
        <tr style="height: 18px;">
            <td style="width: 33%; height: 18px;">Rev: A </td>
        </tr>
        <tr style="height: 18px;">
            <td style="width: 33%; height: 18px;">Fecha: 22/06/2023  </td>
        </tr>
        <tr style="height: 18px;">
            <td style="width: 33%; height: 18px; text-align:center;">CONDICIONES GENERALES DE 
            COMPRA</td>
            <td style="width: 33%; height: 18px;">Fila 3, Columna 1</td>
        </tr>
    </tbody>
</table>

<br><br><br>
';

$content = '
<p style="text-align: justify; color:black;">Si el suministrador, o quienes actúen en su nombre y representación, infringe lo dispuesto 
en este párrafo, la EMPRESA COMPRADORA podrá (i) resolver todos los Contratos con el 
suministrador y/o las sociedades de su grupo y reclamar al suministrador cualesquiera 
perjuicios económicos que tal resolución le haya causado, o (ii) reclamar al suministrador
cualesquiera perjuicios sufridos por la EMPRESA COMPRADORA y/o las sociedades de su 
grupo como consecuencia de cualquier infracción de este apartado, tanto si el contrato ha
sido objeto de resolución como si no lo hubiese sido.</p>

';


$pdf->writeHTML($html, true, false, true, false, ''); // Escribir la tabla en el PDF

// Agregar el contenido HTML al PDF
$pdf->SetFont('helvetica', '', 14);
$pdf->writeHTML($content, true, false, true, false, '');
// Genera el archivo PDF
$pdf->Output('factura.pdf', 'I');





?>