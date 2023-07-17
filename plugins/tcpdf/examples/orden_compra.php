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
                    <h2 style="text-align:right; font-size:11px; margin-bottom:-100%; color:#1B4F72;">PURCHASE ORDER / ORDEN DE COMPRAS</h2>
                    <p style="text-align:right; font-size:8px; line-height: -1;">DATE/FECHA $fecha</p>
                    <p style="text-align:right; font-size:8px; line-height:-1;">PO #  $respuestaFac[codigo]  </p>
                    <p style="text-align:right; font-size:6px; ">PLEASE INCLUDE THIS PO# IN ANY RELATED DOCUMENT. POR FAVOR INCLUIR ESTE NUMERO DE ORDEN EN CUALQUIER CORRESPONDENCIA ASOCIADA</p>
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
            <th style="background-color:#1B4F72; text-align:center; border:0.5px solid black; font-weight: bold; color:white; font-size:6px; height:14px;" colspan="2">PROJECT /CLIENTE</th>
            <th style="background-color:#1B4F72; text-align:center; border:0.5px solid black; font-weight: bold; color:white; font-size:6px; height:14px;">PROJECT / PROYECTO</th>
            <th style="text-align:center; border:0.5px solid white; font-weight: bold; color:white; font-size:6px; height:14px;">INSURANCE INCLUDED / SEGURO INCLUIDO</th>
            <th style=" text-align:right; border:0.5px solid white;  font-weight: bold;color:black; font-size:10px; height:14px;">SUBTOTAL</th>
            <th style=" text-align:right; border:0.5px solid black;  color:black; font-size:10px; height:14px;" >$respuestaFac[moneda]  &nbsp;$respuestaFac[subtotal_soli] </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="text-align:left; font-size:8px; height:18px; border:0.5px solid black;">Aceptado por:</td>
            <td style="text-align:left; font-size:8px; border:0.5px solid black;"> </td>
            <td style="text-align:left; font-size:8px; border:0.5px solid white; border-right:0.5px solid black;"> </td>
            <td style="text-align:left; font-size:8px; border:0px solid white;" > </td>
            <td style="text-align:right;  font-size:10px; font-weight: bold; border:0.5px solid white;" >TAXES</td>
            <td style="text-align:right; font-size:10px; border:0.5px solid black;" >$respuestaFac[moneda]  &nbsp;$respuestaFac[taxes]</td>
        </tr>
        <tr>
            <td style="text-align:left; font-size:8px; height:18px; border:0.5px solid black;">Cargo:</td>
            <td style="text-align:left; font-size:8px; border:0.5px solid black;"> </td>
            <td style="text-align:right;  font-size:10px; border:0.5px solid white; border-right:0.5px solid black;" ></td>
            <td style="text-align:right;  font-size:10px; border:0.5px solid white;" ></td>
            <td style="text-align:right;  font-size:10px;  font-weight: bold; border:0.5px solid white;" >SHIPPING</td>
            <td style="text-align:right; font-size:10px; border:0.5px solid black;" >$respuestaFac[moneda]  &nbsp;$respuestaFac[pago_envio_soli]</td>
            
        </tr>
        <tr>
            <td style="text-align:left; font-size:8px; height:18px; border:0.5px solid black;">Fecha:</td>
            <td style="text-align:left; font-size:8px; border:0.5px solid black;"> </td>
            <td style="text-align:right;  font-size:10px; border:0.5px solid white; border-right:0.5px solid black;" ></td>
            <td style="text-align:right;  font-size:10px; border:0.5px solid white;" ></td>
            <td style="text-align:right;  font-size:10px; font-weight: bold; border-bottom:2px solid black;" >OTHER/OTROS</td>
            <td style="text-align:right; font-size:10px; border-bottom:2px solid black; border:0.5px solid black;" >$respuestaFac[moneda]  &nbsp; $respuestaFac[otros_soli]</td>
        </tr>
        <tr>
            <td style="text-align:left; font-size:8px; height:18px;border:0.5px solid black;">Firma y sello:</td>
            <td style="text-align:left; font-size:8px; border:0.5px solid black;"> </td>
            <td style="text-align:right;  font-size:10px; border-bottom:0.5px solid black;border-right:0.5px solid black;" ></td>
            <td style="text-align:right;  font-size:10px; border:0.5px solid white;" ></td>
            <td style="text-align:right;  font-size:10px; font-weight: bold; border:0.5px solid white;" >TOTAL</td>
            <td style="text-align:right; font-size:10px; border:0.5px solid black;" >$respuestaFac[moneda] &nbsp; $respuestaFac[total_soli]</td>
            
        </tr>

        <tr>
            <td style="text-align:left; font-size:8px; height:18px;border:0.5px solid white;"></td>
            <td style="text-align:left; font-size:8px; border:0.5px solid white;"> </td>
            <td style="text-align:right;  font-size:10px; border:0.5px solid white;" ></td>
            <td style="text-align:right;  font-size:10px; border:0.5px solid white;" ></td>
            <td style="text-align:right;  font-weight: bold; font-size:10px; border:0.5px solid white;" >MONEDA</td>
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
            General T&C apply, unless other condictions are agreed upon in written.</th>    
        </tr>
        <tr style="border:0.5px solid white; text-align:center; font-size:8px;" >
            <th style=" colspan="5"  border:0.5px solid white; font-weight: bold; color:white; font-size:2px; height:14px;">
            Condiciones generales de compra aplican, en caso de no existir otras mutuamente aceptadas de forma escrita.</th>
        </tr>
        <tr style="border:0.5px solid white; text-align:center; font-size:8px;" >
            <th style=" colspan="5"  border:0.5px solid white; font-weight: bold; color:white; font-size:2px; height:14px;">
            Any questions about this purchase order, please contact. Cualquier duda sobre este pedido, por favor comuniquese con:</th>
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
        $html = <<<EOF
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
                    <td style="width: 33%; height: 18px;">Fecha: $fecha  </td>
                </tr>
                <tr style="height: 18px;">
                    <td style="width: 33%; height: 18px; text-align:center;">CONDICIONES GENERALES DE 
                    COMPRA</td>
                    <td style="width: 33%; height: 18px;">Pagina:  </td>
                </tr>
            </tbody>
        </table>
        
        <br><br><br>
        EOF;
        
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
        
        <br><br><br>
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

<br><br><br>
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

<br><br><br>
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
        ob_end_clean();
        // Close and output PDF document
        // This method has several options, check the source code documentation for more information.
        $pdf->Output('orden-de-compra_' . $respuestaFac['codigo'] . '.pdf', 'I');

    }
}

//============================================================+
// END OF FILE
//============================================================+

$factura = new imprimirFactura();
$factura->id = $_GET["id"];
$factura->traerImpresionFactura();
