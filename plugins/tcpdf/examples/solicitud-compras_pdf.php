<?php

require_once "../../../controladores/solicitudC.php";
require_once "../../../modelos/solicitudM.php";

class imprimirFactura
{
    public $id;
    // public $totalPages;

    public function traerImpresionFactura()
    {

        /* -------------------------------------------------------------------------- */
        /*                       TRER INFORMACION DE LA FACTURA                       */
        /* -------------------------------------------------------------------------- */

        $itemFac = "id";
        $valorFac = $this->id;

        echo $valorFac;
        echo $itemFac;
        $respuestaFac = SolicitudC::VistaSolicitudFAC($itemFac, $valorFac);


        /* -------------------------------------------------------------------------- */
        /*                              FORMATO DE FECHA                              */
        /* -------------------------------------------------------------------------- */

        $fechaOriginal = $respuestaFac["fecha"];
        $fecha = date("d/m/Y", strtotime(substr($fechaOriginal, 2)));

        /* -------------------------------------------------------------------------- */
        /*                              /FORMATO DE FECHA                             */
        /* -------------------------------------------------------------------------- */

        // Include the main TCPDF library (search for installation path).
        require_once('tcpdf_include.php');

        // create new PDF document
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->setFooterMargin(PDF_MARGIN_FOOTER);
    

        // set auto page breaks
        $pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        if (@file_exists(dirname(__FILE__) . '/lang/spa.php')) {
            require_once(dirname(__FILE__) . '/lang/spa.php');
            $pdf->setLanguageArray($l);
        }

        $pdf->setFont('helvetica', '', 14, '', true);
        $pdf->AddPage();
        $html = <<<EOF
        <!DOCTYPE html>
        <html>
        <head>
            <style>
                table {
                    border-collapse: collapse;

                }
                th, td {
                    border: 1px solid black;
                    padding: 4px;
                    text-align: center;
                }
                .left-section {
                    width: 50%;
                }
                .right-section {
                    width: 50%;
                }

            </style>
        </head>
        <body>
        <table>
            <tr>
                <td style="width:150px; border:none; padding-bottom:160px;"><img src="images/Retos_2.png"></td>
            </tr>
            <tr>
                <td class="right-section" style="border:none; text-align:left;">
                    <h2 style="text-align:left; font-size:11px; margin-bottom:-5px; color:#1B4F72;">RETOS ENERGETICOS SERVICIOS SA DE CV</h2>
                    <p style="text-align:left; font-size:8px; padding-top:-5px; padding-bottom:-5px; line-height: -1; color:#1B4F72;">JUAN DE GRIJALVA N. 610, FRACCIONAMIENTO REFORMA</p>
                    <p style="text-align:left; font-size:8px; padding-top:-5px; padding-bottom:-5px; line-height: -1; color:#1B4F72;">CP 91919, VERACRUZ VER; MEXICO</p>
                    <p style="text-align:left; font-size:8px; padding-top:-5px; padding-bottom:-5px; line-height: -1; color:#1B4F72;">TEL. +52 1 229 937 1727</p>
                    <p style="text-align:left; font-size:8px; padding-top:-5px; padding-bottom:-5px; line-height: -1; color:#1B4F72; text-decoration:underline;">www.retosenergeticos.com</p>
                </td>
                <td class="left-section" style="border:none;">
                    <h2 style="text-align:right; font-size:11px; margin-bottom:-100%; color:#1B4F72;">PURCHASE REQUEST/SOLICITUD DE COMPRA</h2>
                    <p style="text-align:right; font-size:8px; line-height: 0.2;">DATE/FECHA: $fecha</p>
                    
                </td>
            </tr>
        </table>

        </body>
        </html>
        EOF;
        // }

        // Print text using writeHTMLCell()
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

        /* -------------------------------------------------------------------------- */
        /*                       FIN DE PRIMER BLOQUE DE FACTURA                       */
        /* -------------------------------------------------------------------------- */


        $bloque2 = <<<EOF
    <table style="border:1px solid black; margin-bottom:-100px;">
    <tr>
        <th class="right-section" style="background-color:#1B4F72; font-weight: bold;  color:white; text-align:left; font-size:9px; height:19px;">VENDOR / SUMINISTRADOR</th>
        <th class="right-section" style="background-color:#1B4F72; font-weight: bold; color:white; text-align:center; font-size:9px; height:19px;">SHIP TO / LUGAR DE ENTREGA</th>
    </tr>
    <tr>
        <td height="100" style="border:1px solid black;" class="right-section">

            <p style="text-align:left; font-size:8px; color:#1B4F72; line-height:-.2">NOMBRE: $respuestaFac[nombre_prov]</p>
            <p style="text-align:left; font-size:8px; color:#1B4F72; line-height:.9">NOMBRE: $respuestaFac[nombre_prov]</p>
            <p style="text-align:left; font-size:8px; color:#1B4F72; line-height:-.1">DIRECCIÓN:  $respuestaFac[direccion] </p>
            <p style="text-align:left; font-size:8px; color:#1B4F72; line-height:.9">TEL.:  $respuestaFac[telefono]</p>
            <p style="text-align:left; font-size:8px; color:#1B4F72;">ATN.:  $respuestaFac[atn]</p>
            <p style="text-align:left; font-size:8px; color:#1B4F72; line-height:-.2">Email:  $respuestaFac[email]</p>
            <p style="text-align:left; font-size:8px; color:#1B4F72; text-decoration:underline;">www.retosenergeticos.com</p>
        </td>
        <td height="100"  class="left-section">

            <p style="text-align:center; font-size:8px; color:#1B4F72; line-height:-.1;">-</p>
            <p style="text-align:center; font-size:8px; color:#1B4F72; line-height:-.2;">$respuestaFac[lugarentr_solicitud] </p>
            <p style="text-align:center; font-size:8px; color:#1B4F72; line-height:.5;">$respuestaFac[direccion_lentrega]</p>
            <p style="text-align:center; font-size:8px; color:#1B4F72; line-height:-.2;"> $respuestaFac[cp_lentrega]</p>
            <p style="text-align:center; font-size:8px; color:#1B4F72;"> Solicitante:  $respuestaFac[solicitante_lentrega]</p>
            <p style="text-align:center; font-size:8px; color:#1B4F72; line-height:-.2;"> Email:  $respuestaFac[email_solicitante]</p>

        </td>
    </tr>
    <thead>
        <tr style="border:1px solid black;" >
            <th style="background-color:#1B4F72; text-align:center; border:0.5px solid black; font-weight: bold; color:white; font-size:6px; height:14px;">REQUISITIONER / SOLICITANTE</th>
            <th style="background-color:#1B4F72; text-align:center; border:0.5px solid black; font-weight: bold; color:white; font-size:6px; height:14px;">REQUESTED BY / FIRMA DEL SUPERVISOR</th>
            <th style="background-color:#1B4F72; text-align:center; border:0.5px solid black; font-weight: bold; color:white; font-size:6px; height:14px;">SHIP VIA / FORMA DE ENVIO</th>
            <th style="background-color:#1B4F72; text-align:center; border:0.5px solid black; font-weight: bold; color:white; font-size:6px; height:14px;">INCOTERMS</th>
            <th style="background-color:#1B4F72; text-align:center; border:0.5px solid black; font-weight: bold; color:white; font-size:6px; height:14px;">LEAD TIME / PLAZO DE ENTREGA </th>
        </tr>
    </thead>
    <thead>
        <tr style="border:1px solid black;" >
            <th style="text-align:center; font-size:8px; height:15px; border:1px solid black;">$respuestaFac[solicitante_soli]</th>
            <th style="text-align:center; font-size:8px; height:15px; border:1px solid black;">$respuestaFac[nombre]</th>
            <th style="text-align:center; font-size:8px; border:1px solid black;">$respuestaFac[forma_env]</th>
            <th style="text-align:center; font-size:8px; border:1px solid black;">$respuestaFac[incoterms]</th>
            <th style="text-align:center; font-size:8px; border:1px solid black;">$respuestaFac[plazo_entr]</th>
        </tr>
    </thead>
    <thead>
        <tr>
        <th style="background-color:#1B4F72; text-align:center; border:0.5px solid black; color:white; font-weight: bold; font-size:6px; height:14px;">CLIENT / CLIENTE</th>
            <th style="background-color:#1B4F72; text-align:center; border:0.5px solid black; font-weight: bold; color:white; font-size:6px; height:14px;">PROJECT / PROYECTO</th>
            <th style="background-color:#1B4F72; text-align:center; border:0.5px solid black; font-weight: bold; color:white; font-size:6px; height:14px;">INSURANCE INCLUDED / SEGURO INCLUIDO</th>
            <th style="background-color:#1B4F72; text-align:center; border:0.5px solid black; font-weight: bold; color:white; font-size:6px; height:14px;">VENDOR OFFER / OFERTA SUMINISTRADOR</th>
            <th style="background-color:#1B4F72; text-align:center; border:0.5px solid black; font-weight: bold; color:white; font-size:6px; height:14px;" colspan="2">SPECIAL INSTRUCTIONS / CONDICIONES ESPECIALES </th>
        </tr>
    </thead>
    <thead>
        <tr>
        <th style="text-align:center; text-align:center; font-size:8px; border:0.5px solid black;">$respuestaFac[nombrecomercial_cli]</th>
            <th style="text-align:center; text-align:center; font-size:8px; border:0.5px solid black;">$respuestaFac[proyecto_soli]</th>
            <th style="text-align:center; text-align:center; font-size:8px; border:0.5px solid black;">$respuestaFac[seguro_inclu]</th>
            <th style="text-align:center; text-align:center; font-size:8px; border:0.5px solid black;">$respuestaFac[oferta_suminis]</th>
            <th style="text-align:center; text-align:center; font-size:8px; border:0.5px solid black;" colspan="2">$respuestaFac[condicion_especial]</th>
        </tr>
    </thead>
</table>

<br><br><br><br>



EOF;
        // Print text using writeHTMLCell()
        $pdf->writeHTMLCell(0, 0, '', '', $bloque2, 0, 1, 0, true, '', true);

        /* -------------------------------------------------------------------------- */
        /*                       FIN DE PRIMER BLOQUE DE FACTURA                       */
        /* -------------------------------------------------------------------------- */

        $contenido = <<<EOF
<table>
<thead>
<tr>
    <th style="background-color:#1B4F72; color:white; width:16px; text-align:center; font-size:6px; height:19px; font-weight: bold;">#</th>
    <th style="background-color:#1B4F72; color:white; text-align:center; font-size:6px; height:19px; font-weight: bold;">VENDOR REF/ REF SUMINISTRADOR</th>
    <th style="background-color:#1B4F72; color:white; width:164px; text-align:center; font-size:6px; height:19px; font-weight: bold;">DESCRIPTION/ DESCRIPCION</th>
    <th style="background-color:#1B4F72; color:white; width:48px;text-align:center; font-size:6px; height:19px; font-weight: bold;">QTY/CANTIDAD</th>
    <th style="background-color:#1B4F72; color:white; text-align:center; font-size:6px; height:19px; font-weight: bold;">UD PRICE/ PRECIO UNITARIO</th>
    <th style="background-color:#1B4F72; color:white; text-align:center; font-size:6px; height:19px; font-weight: bold;">TASA</th>
    <th style="background-color:#1B4F72; color:white; text-align:center; font-size:6px; height:19px; font-weight: bold;">TOTAL</th>
    
</tr>
</thead>

    <tbody>
EOF;

        $respuestaFacRef = json_decode($respuestaFac["ref_suministrador"]);
        $r = $respuestaFacRef[0];
        $r2 = $respuestaFacRef[1];
        $r3 = $respuestaFacRef[2];
        $r4 = $respuestaFacRef[3];
        $r5 = $respuestaFacRef[4];
        $r6 = $respuestaFacRef[5];
        $r7 = $respuestaFacRef[6];
        $r8 = $respuestaFacRef[7];
        $r9 = $respuestaFacRef[8];
        $r10 = $respuestaFacRef[9];
        $r11 = $respuestaFacRef[10];
        $r12 = $respuestaFacRef[11];
        $r13 = $respuestaFacRef[12];
        $r14 = $respuestaFacRef[13];
        $r15 = $respuestaFacRef[14];
        $r16 = $respuestaFacRef[15];

        $respuestaFacRef = json_decode($respuestaFac["descripcion"]);
        $d = $respuestaFacRef[0];
        $d2 = $respuestaFacRef[1];
        $d3 = $respuestaFacRef[2];
        $d4 = $respuestaFacRef[3];
        $d5 = $respuestaFacRef[4];
        $d6 = $respuestaFacRef[5];
        $d7 = $respuestaFacRef[6];
        $d8 = $respuestaFacRef[7];
        $d9 = $respuestaFacRef[8];
        $d10 = $respuestaFacRef[9];
        $d11 = $respuestaFacRef[10];
        $d12 = $respuestaFacRef[11];
        $d13 = $respuestaFacRef[12];
        $d14 = $respuestaFacRef[13];
        $d15 = $respuestaFacRef[14];
        $d16 = $respuestaFacRef[15];

        $respuestaFacRef = json_decode($respuestaFac["cantidad"]);
        $c = $respuestaFacRef[0];
        $c2 = $respuestaFacRef[1];
        $c3 = $respuestaFacRef[2];
        $c4 = $respuestaFacRef[3];
        $c5 = $respuestaFacRef[4];
        $c6 = $respuestaFacRef[5];
        $c7 = $respuestaFacRef[6];
        $c8 = $respuestaFacRef[7];
        $c9 = $respuestaFacRef[8];
        $c10 = $respuestaFacRef[9];
        $c11 = $respuestaFacRef[10];
        $c12 = $respuestaFacRef[11];
        $c13 = $respuestaFacRef[12];
        $c14 = $respuestaFacRef[13];
        $c15 = $respuestaFacRef[14];
        $c16 = $respuestaFacRef[15];

        $respuestaFacRef = json_decode($respuestaFac["precio_unitario"]);
        $p = $respuestaFacRef[0];
        $p2 = $respuestaFacRef[1];
        $p3 = $respuestaFacRef[2];
        $p4 = $respuestaFacRef[3];
        $p5 = $respuestaFacRef[4];
        $p6 = $respuestaFacRef[5];
        $p7 = $respuestaFacRef[6];
        $p8 = $respuestaFacRef[7];
        $p9 = $respuestaFacRef[8];
        $p10 = $respuestaFacRef[9];
        $p11 = $respuestaFacRef[10];
        $p12 = $respuestaFacRef[11];
        $p13 = $respuestaFacRef[12];
        $p14 = $respuestaFacRef[13];
        $p15 = $respuestaFacRef[14];
        $p16 = $respuestaFacRef[15];

        $respuestaFacRef = json_decode($respuestaFac["tasa"]);
        $t = $respuestaFacRef[0];
        $t2 = $respuestaFacRef[1];
        $t3 = $respuestaFacRef[2];
        $t4 = $respuestaFacRef[3];
        $t5 = $respuestaFacRef[4];
        $t6 = $respuestaFacRef[5];
        $t7 = $respuestaFacRef[6];
        $t8 = $respuestaFacRef[7];
        $t9 = $respuestaFacRef[8];
        $t10 = $respuestaFacRef[9];
        $t11 = $respuestaFacRef[10];
        $t12 = $respuestaFacRef[11];
        $t13 = $respuestaFacRef[12];
        $t14 = $respuestaFacRef[13];
        $t15 = $respuestaFacRef[14];
        $t16 = $respuestaFacRef[15];

        $respuestaFacRef = json_decode($respuestaFac["total"]);
        $to = $respuestaFacRef[0];
        $to2 = $respuestaFacRef[1];
        $to3 = $respuestaFacRef[2];
        $to4 = $respuestaFacRef[3];
        $to5 = $respuestaFacRef[4];
        $to6 = $respuestaFacRef[5];
        $to7 = $respuestaFacRef[6];
        $to8 = $respuestaFacRef[7];
        $to9 = $respuestaFacRef[8];
        $to10 = $respuestaFacRef[9];
        $to11 = $respuestaFacRef[10];
        $to12 = $respuestaFacRef[11];
        $to13 = $respuestaFacRef[12];
        $to14 = $respuestaFacRef[13];
        $to15 = $respuestaFacRef[14];
        $to16 = $respuestaFacRef[15];


        $contenido .= <<<EOF
    <tr style="border:1px solid black;">
    <td style="text-align:center; font-size:8px; width:16px; height:15px; border:1px solid black;">1</td>
    <td style="text-align:center; font-size:8px; height:15px; border:1px solid black;">{$r}</td>
    <td style="text-align:center; font-size:8px; width:164px; border:1px solid black;">{$d}</td>
    <td style="text-align:center; font-size:8px; width:48px;border:1px solid black;">{$c}</td>
    <td style="text-align:center; font-size:8px; border:1px solid black;">{$p}</td>
    <td style="text-align:center; font-size:8px; border:1px solid black;">{$t}</td>
    <td style="text-align:center; font-size:8px; border:1px solid black;">{$to}</td>
    
    </tr>

    <tr style="border:1px solid black;">
    <td style="text-align:center; font-size:8px; width:16px; height:15px; border:1px solid black;">2</td>
    <td style="text-align:center; font-size:8px; height:15px; border:1px solid black;">{$r2}</td>
    <td style="text-align:center; font-size:8px; width:164px; border:1px solid black;">{$d2}</td>
    <td style="text-align:center; font-size:8px; border:1px solid black;">{$c2}</td>
    <td style="text-align:center; font-size:8px; border:1px solid black;">{$p2}</td>
    <td style="text-align:center; font-size:8px; border:1px solid black;">{$t2}</td>
    <td style="text-align:center; font-size:8px; border:1px solid black;">{$to2}</td>
    </tr>

    <tr style="border:1px solid black;">
    <td style="text-align:center; font-size:8px; width:16px; height:15px; border:1px solid black;">3</td>
    <td style="text-align:center; font-size:8px; height:15px; border:1px solid black;">{$r3}</td>
    <td style="text-align:center; font-size:8px; width:164px; border:1px solid black;">{$d3}</td>
    <td style="text-align:center; font-size:8px; border:1px solid black;">{$c3}</td>
    <td style="text-align:center; font-size:8px; border:1px solid black;">{$p3}</td>
    <td style="text-align:center; font-size:8px; border:1px solid black;">{$t3}</td>
    <td style="text-align:center; font-size:8px; border:1px solid black;">{$to3}</td>
    </tr>

    <tr style="border:1px solid black;">
    <td style="text-align:center; font-size:8px; width:16px; height:15px; border:1px solid black;">4</td>
    <td style="text-align:center; font-size:8px; height:15px; border:1px solid black;">{$r4}</td>
    <td style="text-align:center; font-size:8px; width:164px; border:1px solid black;">{$d4}</td>
    <td style="text-align:center; font-size:8px; border:1px solid black;">{$c4}</td>
    <td style="text-align:center; font-size:8px; border:1px solid black;">{$p4}</td>
    <td style="text-align:center; font-size:8px; border:1px solid black;">{$t4}</td>
    <td style="text-align:center; font-size:8px; border:1px solid black;">{$to4}</td>
    </tr>

    <tr style="border:1px solid black;">
    <td style="text-align:center; font-size:8px; width:16px; height:15px; border:1px solid black;">5</td>
    <td style="text-align:center; font-size:8px; height:15px; border:1px solid black;">{$r5}</td>
    <td style="text-align:center; font-size:8px; width:164px; border:1px solid black;">{$d5}</td>
    <td style="text-align:center; font-size:8px; border:1px solid black;">{$c5}</td>
    <td style="text-align:center; font-size:8px; border:1px solid black;">{$p5}</td>
    <td style="text-align:center; font-size:8px; border:1px solid black;">{$t5}</td>
    <td style="text-align:center; font-size:8px; border:1px solid black;">{$to5}</td>
    </tr>

    <tr style="border:1px solid black;">
    <td style="text-align:center; font-size:8px; width:16px; height:15px; border:1px solid black;">6</td>
    <td style="text-align:center; font-size:8px; height:15px; border:1px solid black;">{$r6}</td>
    <td style="text-align:center; font-size:8px; width:164px; border:1px solid black;">{$d6}</td>
    <td style="text-align:center; font-size:8px; border:1px solid black;">{$c6}</td>
    <td style="text-align:center; font-size:8px; border:1px solid black;">{$p6}</td>
    <td style="text-align:center; font-size:8px; border:1px solid black;">{$t6}</td>
    <td style="text-align:center; font-size:8px; border:1px solid black;">{$to6}</td>
    </tr>

    <tr style="border:1px solid black;">
    <td style="text-align:center; font-size:8px; width:16px; height:15px; border:1px solid black;">7</td>
    <td style="text-align:center; font-size:8px; height:15px; border:1px solid black;">{$r7}</td>
    <td style="text-align:center; font-size:8px; width:164px; border:1px solid black;">{$d7}</td>
    <td style="text-align:center; font-size:8px; border:1px solid black;">{$c7}</td>
    <td style="text-align:center; font-size:8px; border:1px solid black;">{$p7}</td>
    <td style="text-align:center; font-size:8px; border:1px solid black;">{$t7}</td>
    <td style="text-align:center; font-size:8px; border:1px solid black;">{$to7}</td>
    </tr>

    <tr style="border:1px solid black;">
    <td style="text-align:center; font-size:8px; width:16px; height:15px; border:1px solid black;">8</td>
    <td style="text-align:center; font-size:8px; height:15px; border:1px solid black;">{$r8}</td>
    <td style="text-align:center; font-size:8px; width:164px; border:1px solid black;">{$d8}</td>
    <td style="text-align:center; font-size:8px; border:1px solid black;">{$c8}</td>
    <td style="text-align:center; font-size:8px; border:1px solid black;">{$p8}</td>
    <td style="text-align:center; font-size:8px; border:1px solid black;">{$t8}</td>
    <td style="text-align:center; font-size:8px; border:1px solid black;">{$to8}</td>
    </tr>

    <tr style="border:1px solid black;">
    <td style="text-align:center; font-size:8px; width:16px; height:15px; border:1px solid black;">9</td>
    <td style="text-align:center; font-size:8px; height:15px; border:1px solid black;">{$r9}</td>
    <td style="text-align:center; font-size:8px; width:164px; border:1px solid black;">{$d9}</td>
    <td style="text-align:center; font-size:8px; border:1px solid black;">{$c9}</td>
    <td style="text-align:center; font-size:8px; border:1px solid black;">{$p9}</td>
    <td style="text-align:center; font-size:8px; border:1px solid black;">{$t9}</td>
    <td style="text-align:center; font-size:8px; border:1px solid black;">{$to9}</td>
    </tr>

    <tr style="border:1px solid black;">
    <td style="text-align:center; font-size:8px; width:16px; height:15px; border:1px solid black;">10</td>
    <td style="text-align:center; font-size:8px; height:15px; border:1px solid black;">{$r10}</td>
    <td style="text-align:center; font-size:8px; width:164px; border:1px solid black;">{$d10}</td>
    <td style="text-align:center; font-size:8px; border:1px solid black;">{$c10}</td>
    <td style="text-align:center; font-size:8px; border:1px solid black;">{$p10}</td>
    <td style="text-align:center; font-size:8px; border:1px solid black;">{$t10}</td>
    <td style="text-align:center; font-size:8px; border:1px solid black;">{$to10}</td>
    </tr>

EOF;


        $contenido .= <<<EOF
    </tbody>
</table>
EOF;

        // Agrega aquí el código adicional que desees realizar con la variable $contenido.

        $pdf->writeHTMLCell(0, 0, '', '', $contenido, 0, 1, 0, true, '', true);

        $contenido2 = <<<EOF
    <br><br>
    <table>
    <thead>
        <tr>
            <th style="background-color:#1B4F72; text-align:center; border:0.5px solid black; font-weight: bold; color:white; font-size:6px; height:14px;" colspan="2">REQ. BY: FIRMA SOLICITANTE</th>
            <th style="background-color:#1B4F72; text-align:center; border:0.5px solid black; font-weight: bold; color:white; font-size:6px; height:14px;" colspan="2">AUTH. BY: FIRMA AUTORIZADOR</th>
            <th style="text-align:center; border:0.5px solid white; font-weight: bold; color:white; font-size:6px; height:14px;">INSURANCE INCLUDED / SEGURO INCLUIDO</th>
            <th style=" text-align:right; border:0.5px solid white;  font-weight: bold;color:black; font-size:10px; height:14px;">SUBTOTAL</th>
            <th style=" text-align:right; border:0.5px solid black;  color:black; font-size:10px; height:14px;" >$respuestaFac[moneda]  &nbsp;$respuestaFac[subtotal_soli] </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="text-align:left; font-size:8px; height:18px; border-left:0.5px solid black; border-right:0.5px solid white;"></td>
            <td style="text-align:left; font-size:8px; border-left:0.5px solid white; border-right:0.5px solid black;"> </td>
            <td style="text-align:center;  font-size:10px; border:0.5px solid white; border-right:0.5px solid black;" colspan="2" ></td>
            <td style="text-align:right;  font-size:10px; border:0.5px solid white;" ></td>
            <td style="text-align:right;  font-size:10px; font-weight: bold; border:0.5px solid white;" >TAXES</td>
            <td style="text-align:right; font-size:10px; border:0.5px solid black;" >$respuestaFac[moneda]  &nbsp;$respuestaFac[taxes]</td>
        </tr>
        <tr>
            <td style="text-align:left; font-size:8px; height:18px; border-left:0.5px solid black; border-right:0.5px solid white;"></td>
            <td style="text-align:left; font-size:8px; border-left:0.5px solid white; border-right:0.5px solid black;"> </td>
            <td style="text-align:center;  font-size:10px; border:0.5px solid white; border-right:0.5px solid black;" colspan="2" ></td>
            <td style="text-align:right;  font-size:10px; border:0.5px solid white;" ></td>
            <td style="text-align:right;  font-size:10px;  font-weight: bold; border:0.5px solid white;" >SHIPPING</td>
            <td style="text-align:right; font-size:10px; border:0.5px solid black;" >$respuestaFac[moneda]  &nbsp;$respuestaFac[pago_envio_soli]</td>
            
        </tr>
        <tr>
            <td style="text-align:left; font-size:8px; height:18px; border-left:0.5px solid black; border-right:0.5px solid white;"></td>
            <td style="text-align:left; font-size:8px; border-left:0.5px solid white; border-right:0.5px solid black;"> </td>
            <td style="text-align:right;  font-size:10px; border:0.5px solid white; border-right:0.5px solid black;"colspan="2" ></td>
            <td style="text-align:right;  font-size:10px; border:0.5px solid white;"  ></td>
            <td style="text-align:right;  font-size:10px; font-weight: bold; border-bottom:2px solid black;" >OTHER/OTROS</td>
            <td style="text-align:right; font-size:10px; border-bottom:2px solid black; border:0.5px solid black;" >$respuestaFac[moneda]  &nbsp; $respuestaFac[otros_soli]</td>
        </tr>
        <tr>
            <td style="text-align:left; font-size:8px; border-bottom:0.5px solid black; border-left:0.5px solid black;"></td>
            <td style="text-align:left; font-size:8px; border-right:0.5px solid black; border-bottom:0.5px solid black;"> </td>
            <td style="text-align:right;  font-size:10px; border-bottom:0.5px solid black;border-right:0.5px solid black;" colspan="2" ></td>
            <td style="text-align:right;  font-size:10px; border:0.5px solid white;" ></td>
            <td style="text-align:right;  font-size:10px; font-weight: bold; border:0.5px solid white;" >TOTAL</td>
            <td style="text-align:right; font-size:10px; border:0.5px solid black;" >$respuestaFac[moneda] &nbsp; $respuestaFac[total_soli]</td>
            
        </tr>

        <tr>
            <td style="text-align:left; font-size:8px; height:18px;border:0.5px solid white;"></td>
            <td style="text-align:left; font-size:8px; border:0.5px solid white;"> </td>
            <td style="text-align:right;  font-size:10px; border:0.5px solid white;" colspan="2" ></td>
            <td style="text-align:right;  font-size:10px; border:0.5px solid white;" ></td>
            <td style="text-align:justify;  font-weight: bold; font-size:7px; border:0.5px solid white;" >MONEDA/CURRENCY</td>
            <td style="text-align:right; font-size:10px; border:0.5px solid black;">$respuestaFac[moneda]</td>
            
        </tr>


    </tbody>
    </table>

    EOF;
        // }

        // Print text using writeHTMLCell()
        $pdf->writeHTMLCell(0, 0, '', '', $contenido2, 0, 1, 0, true, '', true);


        $contenido3 = <<<EOF
    <br><br>
    <table style="border:1px solid white; margin-bottom:-100px;">
    <thead>
        <tr style="border:0.5px solid white; text-align:center; font-size:8px;" >
            <th style=" colspan="5"  border:0.5px solid white; font-weight: bold; color:white; font-size:2px; height:14px;">
            Any questions about this request order, please contact. Cualquier duda sobre esta solicitud, por favor comuniquese con:</th>    
        </tr>

        <tr style="border:0.5px solid white; text-align:center; font-size:8px;" >
        <th style=" colspan="5"  border:0.5px solid white; font-weight: bold; color:white; font-size:2px; height:14px;">
        $respuestaFac[solicitante_lentrega] &nbsp; Tel: 229 937 2717 &nbsp; $respuestaFac[email_solicitante]</th>
    </tr> 
    
    </thead>
    
    </table>

    EOF;

        $pdf->writeHTMLCell(0, 0, '', '', $contenido3, 0, 1, 0, true, '', true);
        // ---------------------------------------------------------



        ob_end_clean();
        // Close and output PDF document
        // This method has several options, check the source code documentation for more information.
        $pdf->Output('Solicitud-de-compra_.pdf', 'I');
    }
}

//============================================================+
// END OF FILE
//============================================================+

$factura = new imprimirFactura();
$factura->id = $_GET["id"];
$factura->traerImpresionFactura();
