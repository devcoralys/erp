<?php
session_start();

if(!empty($_FILES)){
	
	include('../../../connex.php');
	

    $date=gmdate('Y-m-d H:i:s');

    $seol =  '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$secuy  ='';
	for($i=0;$i < 6;$i++)
	{ 
        $secuy.= substr($seol,rand()%(strlen($seol)),1);	
	}
	$num=$secuy;
		
	$tmp_name=$_FILES["file"]['tmp_name'];
    $name=$_FILES["file"]['name'];
    $info = pathinfo($name);
    $extension = $info['extension'];
    $img=$info["filename"]."_".$_SESSION['ref_dos']."_".$num.".".$extension;
    move_uploaded_file($tmp_name, '../doc/'.$img);
	
	$con->query("INSERT INTO doc (lib_doc, dossier_id_doc, date_ajout_doc, taille_doc) VALUES('".$img."', '".$_SESSION['ref_dos']."', '".$date."', '".$_FILES["file"]['size']."') ");
		
	
}
?>