<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="AGOSOFT" content="">
    <meta name="keyword" content="">
	<title>&nbsp;</title>
	
	</head>

<body onLoad="window.print()">
  
<?php

session_start ();
$date=gmdate('d/m/Y H:i');

ini_set('memory_limit','512M');
ini_set('max_execution_time', 12000);


$couleur[0]="#F1F1F1";
$couleur[1]="#FFFFFF"; 
$i=1;



?>
	
<!--Etat codage Import-->

<table style="width: 5.5e+2pt;margin-left:-45.85pt;border-collapse:collapse;border:none;" >
    <tbody>
        <tr>
            <td colspan="2" class="elm_1">
                <p class="espace"><strong><span style='font-family:"Arial",sans-serif;'>Bureau</span></strong></p>
            </td>
            <td colspan="5" class="elm_2">
                <p class="elm_4"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'><input type="text" style="width:150px; text-align:center; border:0px;"></span></strong></p>
            </td>
         
            <td colspan="6" style="width: 144.55pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 21.4pt;vertical-align: middle;">
                <p class="elm_5"><strong><span style='font-family:"Arial",sans-serif;'>Type de d&eacute;claration&nbsp;:</span></strong></p>
            </td>
            <td class="elm_2">
                <p class="elm_4"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'><input type="text" style="width:20px; text-align:center; border:0px;"></span></strong></p>
            </td>
            <td class="elm_2">
                <p class="elm_4"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'><input type="text" style="width:20px; text-align:center; border:0px;"></span></strong></p>
            </td>
            <td colspan="9" style="width: 157.95pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 21.4pt;vertical-align: middle;">
                <p class="elm_5"><strong><span style='font-family:"Arial",sans-serif;'>Code R&eacute;gime&nbsp;:</span></strong></p>
            </td>
            <td class="elm_2">
                <p class="elm_4"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'><input type="text" style="width:20px; text-align:center; border:0px;"></span></strong></p>
            </td>
        </tr>
        <tr>
            <td style="width: 26.9pt;border-top: none;border-right: none;border-left: none;border-image: initial;border-bottom: 1pt solid windowtext;padding: 0cm 5.4pt;height: 3.2pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-size:8px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
            <td colspan="25" style="width: 518.55pt;border-top: none;border-right: none;border-left: none;border-image: initial;border-bottom: 1pt solid windowtext;padding: 0cm 5.4pt;height: 3.2pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-size:8px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
        </tr>
        <tr>
            <td style="width: 26.9pt;border: none;padding: 0cm 5.4pt;height: 3.2pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-size:7px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
            <td colspan="25" style="width: 518.55pt;border: none;padding: 0cm 5.4pt;height: 3.2pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-size:7px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="4" class="elm_3">
                <p class="espace"><strong><span style='font-family:"Arial",sans-serif;'>Exportateur</span></strong></p>
            </td>
            <td colspan="2" style="width: 93.8pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-family:"Arial",sans-serif;'>N&deg; RC&nbsp;:</span></strong></p>
            </td>
            <td colspan="20" style="width: 200.05pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 21.4pt;vertical-align: middle;">
                <p class="elm_4"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'><input type="text" style="width:100%; text-align:center; border:0px;"></span></strong></p>
            </td>
        </tr>
        <tr>
            <td style="width: 26.9pt;border: none;padding: 0cm 5.4pt;height: 3.2pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-size:4px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
            <td colspan="25" style="width: 518.55pt;border: none;padding: 0cm 5.4pt;height: 3.2pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-size:4px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                <p class="espace"><strong><span style='font-size:4px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
        </tr>
        <tr>
            <td style="width: 26.9pt;border: none;padding: 0cm 5.4pt;height: 4.85pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-size:8px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
            <td colspan="25" style="width: 518.55pt;border: none;padding: 0cm 5.4pt;height: 4.85pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-size:5px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
        </tr>
        <tr>
            <td style="width: 26.9pt;border-top: none;border-right: none;border-left: none;border-image: initial;border-bottom: 1pt solid windowtext;padding: 0cm 5.4pt;height: 3.5pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-size:9px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
            <td colspan="25" style="width: 518.55pt;border-top: none;border-right: none;border-left: none;border-image: initial;border-bottom: 1pt solid windowtext;padding: 0cm 5.4pt;height: 3.5pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-size:1px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="26" style="width: 545.45pt;border: none;padding: 0cm 5.4pt;height: 4.65pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-size:7px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="4" class="elm_3">
                <p class="espace"><strong><span style='font-family:"Arial",sans-serif;'>Destinataire&nbsp;</span></strong></p>
            </td>
            <td colspan="5" style="width: 93.8pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-family:"Arial",sans-serif;'>Raison Social&nbsp;:</span></strong></p>
            </td>
            <td colspan="17" style="width: 200.05pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 21.4pt;vertical-align: middle;">
                <p class="elm_4"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'><input type="text" style="width:100%; text-align:center; border:0px;"></span></strong></p>
            </td>
        </tr>
        <tr>
            <td style="width: 26.9pt;border: none;padding: 0cm 5.4pt;height: 3.2pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-size:4px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
            <td colspan="25" style="width: 518.55pt;border: none;padding: 0cm 5.4pt;height: 3.2pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-size:4px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                <p class="espace"><strong><span style='font-size:4px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="4" class="elm_3">
                <p class="espace"><strong><span style='font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
            <td colspan="5" style="width: 93.8pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-family:"Arial",sans-serif;'>Adresse&nbsp;:</span></strong></p>
            </td>
            <td colspan="17" style="width: 200.05pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 21.4pt;vertical-align: middle;">
                <p class="elm_4"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'><input type="text" style="width:100%; text-align:center; border:0px;"></span></strong></p>
            </td>
        </tr>
        <tr>
            <td style="width: 26.9pt;border: none;padding: 0cm 5.4pt;height: 4.85pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-size:8px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
            <td colspan="25" style="width: 518.55pt;border: none;padding: 0cm 5.4pt;height: 4.85pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-size:5px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="4" style="border:none;padding:0cm 0cm 0cm 0cm;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>&nbsp;</p>
            </td>
            <td colspan="5" style="width: 93.8pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-family:"Arial",sans-serif;'>N&deg; RC&nbsp;:</span></strong></p>
            </td>
            <td colspan="20" style="width: 200.05pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 21.4pt;vertical-align: middle;">
                <p class="elm_4"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'><input type="text" style="width:100%; text-align:center; border:0px;"></span></strong></p>
            </td>
            <td colspan="9" style="border:none;padding:0cm 0cm 0cm 0cm;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>&nbsp;</p>
            </td>
        </tr>
        <tr>
            <td style="width: 26.9pt;border-top: none;border-right: none;border-left: none;border-image: initial;border-bottom: 1pt solid windowtext;padding: 0cm 5.4pt;height: 3.5pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-size:9px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
            <td colspan="25" style="width: 518.55pt;border-top: none;border-right: none;border-left: none;border-image: initial;border-bottom: 1pt solid windowtext;padding: 0cm 5.4pt;height: 3.5pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-size:1px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="26" style="width: 545.45pt;border-top: none;border-right: none;border-left: none;border-image: initial;border-bottom: 1pt solid windowtext;padding: 0cm 5.4pt;height: 5.15pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-size:1px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                <p class="espace"><strong><span style='font-size:1px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                <p class="espace"><strong><span style='font-size:1px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="26" style="width: 545.45pt;border: none;padding: 0cm 5.4pt;height: 5.9pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-size:5px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="3" style="width: 74.9pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-family:"Arial",sans-serif;'>Manifeste</span></strong></p>
            </td>
            <td colspan="8" style="width: 200.05pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 21.4pt;vertical-align: middle;">
                <p class="elm_4"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'><input type="text" style="width:100%; text-align:center; border:0px;"></span></strong></p>
            </td>
            <td colspan="6" style="width: 117.95pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                <p class="elm_5"><strong><span style='font-family:"Arial",sans-serif;'>Total Colis&nbsp;:</span></strong></p>
            </td>
            <td colspan="9" style="width: 200.05pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 21.4pt;vertical-align: middle;">
                <p class="elm_4"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'><input type="text" style="width:100%; text-align:center; border:0px;"></span></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="26" style="width: 545.45pt;border: none;padding: 0cm 5.4pt;height: 11.3pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-size:4px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="4" style="width: 122.15pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 21.65pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-family:"Arial",sans-serif;'>Code&nbsp;</span></strong></p>
                <p class="espace"><strong><span style='font-family:"Arial",sans-serif;'>dernier pays</span></strong></p>
            </td>
            <td style="width: 200.05pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 21.4pt;vertical-align: middle;">
                <p class="elm_4"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'><input type="text" style="width:100%; text-align:center; border:0px;"></span></strong></p>
            </td>
            <td style="width: 200.05pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 21.4pt;vertical-align: middle;">
                <p class="elm_4"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'><input type="text" style="width:100%; text-align:center; border:0px;"></span></strong></p>
            </td>
            <td colspan="3" style="width: 96.4pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 21.65pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-family:"Arial",sans-serif;'>Pays d&rsquo;exploitation&nbsp;:</span></strong></p>
            </td>
            <td colspan="6" style="width: 200.05pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 21.4pt;vertical-align: middle;">
                <p class="elm_4"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'><input type="text" style="width:100%; text-align:center; border:0px;"></span></strong></p>
            </td>
            <td colspan="5" style="width: 108pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 21.65pt;vertical-align: middle;">
                <p class="elm_5"><strong><span style='font-family:"Arial",sans-serif;'>Code pays destination&nbsp;:</span></strong></p>
            </td>
            <td style="width: 200.05pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 21.4pt;vertical-align: middle;">
                <p class="elm_4"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'><input type="text" style="width:100%; text-align:center; border:0px;"></span></strong></p>
            </td>
            <td colspan="4" style="width: 200.05pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 21.4pt;vertical-align: middle;">
                <p class="elm_4"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'><input type="text" style="width:100%; text-align:center; border:0px;"></span></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="26" style="width: 545.45pt;border-top: none;border-right: none;border-left: none;border-image: initial;border-bottom: 1pt solid windowtext;padding: 0cm 5.4pt;height: 16.8pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-size:9px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="26" style="width: 545.45pt;border: none;padding: 0cm 5.4pt;height: 6.45pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-size:5px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="26" style="width: 545.45pt;border-right: none;border-bottom: none;border-left: none;border-image: initial;border-top: 1pt solid windowtext;padding: 0cm 5.4pt;height: 4.75pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="5" style="width: 122.15pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-family:"Arial",sans-serif;'>N&deg; &nbsp;VOL / NAVIRE</span></strong></p>
            </td>
            <td colspan="10" style="width: 200.05pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 21.4pt;vertical-align: middle;">
                <p class="elm_4"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'><input type="text" style="width:100%; text-align:center; border:0px;"></span></strong></p>
            </td>
            <td colspan="4" style="width: 77.2pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                <p class="elm_5"><strong><span style='font-family:"Arial",sans-serif;'>Code Nationalit&eacute;</span></strong></p>
            </td>
            <td colspan="2" style="width: 200.05pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 21.4pt;vertical-align: middle;">
                <p class="elm_4"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'><input type="text" style="width:100%; text-align:center; border:0px;"></span></strong></p>
            </td>
            <td colspan="4" style="width: 200.05pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 21.4pt;vertical-align: middle;">
                <p class="elm_4"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'><input type="text" style="width:100%; text-align:center; border:0px;"></span></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="26" style="width: 545.45pt;border: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
        </tr>

        <tr>
            <td colspan="5" style="width: 122.15pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-family:"Arial",sans-serif;'>N&deg; LTA / NAVIRE</span></strong></p>
            </td>
            <td colspan="10" style="width: 200.05pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 21.4pt;vertical-align: middle;">
                <p class="elm_4"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'><input type="text" style="width:100%; text-align:center; border:0px;"></span></strong></p>
            </td>
            <td colspan="4" style="width: 77.2pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                <p class="elm_5"><strong><span style='font-family:"Arial",sans-serif;'>Code Nationalit&eacute;</span></strong></p>
            </td>
            <td colspan="2" style="width: 200.05pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 21.4pt;vertical-align: middle;">
                <p class="elm_4"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'><input type="text" style="width:100%; text-align:center; border:0px;"></span></strong></p>
            </td>
            <td colspan="4" style="width: 200.05pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 21.4pt;vertical-align: middle;">
                <p class="elm_4"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'><input type="text" style="width:100%; text-align:center; border:0px;"></span></strong></p>
            </td>
        </tr>

        <tr>
            <td colspan="26" style="width: 545.45pt;border-top: none;border-right: none;border-left: none;border-image: initial;border-bottom: 1pt solid windowtext;padding: 0cm 5.4pt;height: 3.8pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-size:7px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="26" style="width: 545.45pt;border: none;padding: 0cm 5.4pt;height: 4.6pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-size:8px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="5" style="width: 145.6pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                <p class="elm_5"><strong><span style='font-family:"Arial",sans-serif;'>Mode de Transport Frontiere</span></strong></p>
            </td>
            <td colspan="2" style="width: 200.05pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 21.4pt;vertical-align: middle;">
                <p class="elm_4"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'><input type="text" style="width:100%; text-align:center; border:0px;"></span></strong></p>
            </td>
            <td style="width: 48.75pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
            <td colspan="6" style="width: 142.15pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                <p class="elm_5"><strong><span style='font-family:"Arial",sans-serif;'>Lieux de Charge / decharg</span></strong></p>
            </td>
            <td colspan="9" style="width: 200.05pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 21.4pt;vertical-align: middle;">
                <p class="elm_4"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'><input type="text" style="width:100%; text-align:center; border:0px;"></span></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="26" style="width: 545.45pt;border: none;padding: 0cm 5.4pt;height: 20.7pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-size:7px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="3" class="class_titre">
                <p class="espace"><strong><span style='font-family:"Arial",sans-serif;'>Bureau d&rsquo;Entr&eacute;e</span></strong></p>
            </td>
            <td colspan="5" class="elm_2">
                <p class="elm_4"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'><input type="text" style="width:150px; text-align:center; border:0px;"></span></strong></p>
            </td>
            <td colspan="2" style="width: 72.95pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                <p class="elm_5"><strong><span style='font-family:"Arial",sans-serif;'>Monnaie</span></strong></p>
            </td>
            <td colspan="4" class="elm_2">
                <p class="elm_4"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'><input type="text" style="width:150px; text-align:center; border:0px;"></span></strong></p>
            </td>
            <td colspan="6" style="width: 76.9pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                <p class="elm_5"><strong><span style='font-family:"Arial",sans-serif;'>Montant Facture</span></strong></p>
            </td>
            <td colspan="10" class="elm_2">
                <p class="elm_4"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'><input type="text" style="width:120px; text-align:center; border:0px;"></span></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="26" style="width: 545.45pt;border: none;padding: 0cm 5.4pt;height: 9.3pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="3" class="class_titre">
                <p class="elm_4"><strong><span style='font-family:"Arial",sans-serif;'>Incoterm</span></strong></p>
            </td>
            <td colspan="3" class="elm_2">
                <p class="elm_4"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'><input type="text" style="width:150px; text-align:center; border:0px;"></span></strong></p>
            </td>
            <td colspan="3" style="width: 95.65pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                <p class="elm_5"><strong><span style='font-family:"Arial",sans-serif;'>Banque</span></strong></p>
            </td>
            <td colspan="6" style="width: 119.25pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-family:"Arial",sans-serif;'><input type="text" style="width100%; text-align:center; border:0px; font-size: 18px;"></span></strong></span></strong></p>
            </td>
            <td colspan="8" style="width: 130.9pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-family:"Arial",sans-serif;'>Condition de paiement</span></strong></p>
            </td>
            <td colspan="2" style="width: 54.05pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-family:"Arial",sans-serif;'><input type="text" style="width:30px; text-align:center; border:0px; font-size: 18px;"></span></strong></span></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="26" style="width: 545.45pt;border: none;padding: 0cm 5.4pt;height: 8.4pt;vertical-align: middle;">
                <p class="elm_4"><strong><span style='font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="5" style="width: 108.95pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-family:"Arial",sans-serif;'>Nombre de Colis</span></strong></p>
            </td>
            <td colspan="8" style="width: 181.8pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-family:"Arial",sans-serif;'><input type="text" style="width:100%; text-align:center; border:0px; font-size: 22px;"></span></strong></p>
            </td>
            <td colspan="4" style="width: 109.05pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                <p class="elm_5"><strong><span style='font-family:"Arial",sans-serif;'>Marque &nbsp; &nbsp;&nbsp;</span></strong></p>
                <p class="elm_5"><strong><span style='font-family:"Arial",sans-serif;'>de Colis</span></strong></p>
            </td>
            <td colspan="8" style="width: 145.65pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-family:"Arial",sans-serif;'><input type="text" style="width:100%; text-align:center; border:0px; font-size: 22px;"></span></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="26" style="width: 545.45pt;border: none;padding: 0cm 5.4pt;height: 8.4pt;vertical-align: middle;">
                <p class="espace"><span style='font-size:9px;font-family:"Arial",sans-serif;'>&nbsp;</span></p>
            </td>
        </tr>
        <tr>
            <td colspan="3" style="width: 74.9pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;padding: 0cm 5.4pt;height: 30.8pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-family:"Arial",sans-serif;'>Position Tarifaire</span></strong></p>
            </td>
            <td colspan="7" style="width: 166.35pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 30.8pt;vertical-align: middle;">
                <p class="espace"><strong><span style="font-size:16px;"><input type="text" style="width:100%; text-align:center; border:0px; font-size: 18px;"></span></strong></p>
            </td>
            <td colspan="4" style="width: 72.35pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 30.8pt;vertical-align: middle;">
                <p class="elm_5"><strong><span style='font-family:"Arial",sans-serif;'>Code pays d&rsquo;origine</span></strong></p>
            </td>
            <td style="width: 23.45pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 30.8pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'><input type="text" style="width:100%; text-align:center; border:0px; font-size: 22px;"></span></strong></p>
            </td>
            <td style="width: 23.45pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 30.8pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'><input type="text" style="width:100%; text-align:center; border:0px; font-size: 22px;"></span></strong></p>
            </td>
            <td colspan="7" style="width: 103.85pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 30.8pt;vertical-align: middle;">
                <p class="elm_5"><strong><span style='font-family:"Arial",sans-serif;'>Type Emballage</span></strong></p>
            </td>
            <td colspan="3" style="width: 81.1pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 30.8pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-family:"Arial",sans-serif;'><input type="text" style="width:100%; text-align:center; border:0px; font-size: 22px;"></span></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="26" style="width: 545.45pt;border-top: none;border-right: none;border-left: none;border-image: initial;border-bottom: 1pt solid windowtext;padding: 0cm 5.4pt;height: 3.5pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-size:5px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="3" style="width: 74.9pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;padding: 0cm 5.4pt;height: 30.8pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-family:"Arial",sans-serif;'>N&deg; Conteneur</span></strong></p>
            </td>
            <td colspan="7" style="width: 166.35pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 30.8pt;vertical-align: middle;">
                <p class="espace"><strong><span style="font-size:16px;"><input type="text" style="width:100%; text-align:center; border:0px; font-size: 28px;"></span></strong></p>
            </td>
            <td colspan="11" style="width: 184.95pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 30.8pt;vertical-align: middle;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:right; vertical-align: middle;'><strong><span style='font-family:"Arial",sans-serif;'>N&deg; P&uml;lomb</span></strong></p>
            </td>
            <td colspan="5" style="border:none;border-bottom:solid windowtext 1.0pt; vertical-align: middle;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif; vertical-align:middle;'><input type="text" style="width:100%; text-align:center; border:0px; font-size: 28px;"></p>
            </td>
        </tr>
        <tr>
            <td colspan="26" style="width: 545.45pt;border: none;padding: 0cm 5.4pt;height: 4.05pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-size:8px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="26" style="width: 545.45pt;border-right: none;border-bottom: none;border-left: none;border-image: initial;border-top: 1pt solid windowtext;padding: 0cm 5.4pt;height: 13.7pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-size:7px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                <p class="espace"><strong><span style='font-size:7px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                <p class="espace"><strong><span style='font-size:7px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="7" style="width: 145.6pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                <p class="elm_4"><strong><span style='font-size:16px;font-family:"Arial",sans-serif;'>Poids Brut</span></strong></p>
            </td>
            <td colspan="4" style="width: 119.85pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'><input type="text" style="width:100%; text-align:center; border:0px; font-size: 28px;"></span></strong></p>
            </td>
            <td colspan="3" rowspan="2" style="width: 48.15pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-family:"Arial",sans-serif;'><input type="text" style="width:100%; text-align:center; border:0px; font-size: 28px;"></span></strong></p>
            </td>
            <td colspan="5" style="width: 96.85pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                <p class="elm_5"><strong><span style='font-family:"Arial",sans-serif;'>R&eacute;gime</span></strong></p>
            </td>
            <td colspan="7" style="width: 135pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-family:"Arial",sans-serif;'><input type="text" style="width:100%; text-align:center; border:0px; font-size: 28px;"></span></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="7" style="width: 145.6pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                <p class="elm_4"><strong><span style='font-size:16px;font-family:"Arial",sans-serif;'>Poids Net</span></strong></p>
            </td>
            <td colspan="4" style="width: 119.85pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'><input type="text" style="width:100%; text-align:center; border:0px; font-size: 28px;"></span></strong></p>
            </td>
            <td colspan="12" style="border:none;padding:0cm 0cm 0cm 0cm;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>&nbsp;</p>
            </td>
        </tr>
        <tr>
            <td style="border:none;"><br></td>
            <td style="border:none;"><br></td>
            <td style="border:none;"><br></td>
            <td style="border:none;"><br></td>
            <td style="border:none;"><br></td>
            <td style="border:none;"><br></td>
            <td style="border:none;"><br></td>
            <td style="border:none;"><br></td>
            <td style="border:none;"><br></td>
            <td style="border:none;"><br></td>
            <td style="border:none;"><br></td>
            <td style="border:none;"><br></td>
            <td style="border:none;"><br></td>
            <td style="border:none;"><br></td>
            <td style="border:none;"><br></td>
            <td style="border:none;"><br></td>
            <td style="border:none;"><br></td>
            <td style="border:none;"><br></td>
            <td style="border:none;"><br></td>
            <td style="border:none;"><br></td>
            <td style="border:none;"><br></td>
            <td style="border:none;"><br></td>
            <td style="border:none;"><br></td>
            <td style="border:none;"><br></td>
            <td style="border:none;"><br></td>
            <td style="border:none;"><br></td>
        </tr>
    </tbody>
</table>
<p style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>&nbsp;</p>
                                               <!-- / /Etat codage Import-->




  </body>
</html>
