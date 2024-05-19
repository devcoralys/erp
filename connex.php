<?php 
try
{
$con = new PDO('mysql:host=localhost;dbname=sttci_app_db_2024', 'sttci_ulrich', '@Succes2019');
//$con = new PDO('mysql:host=localhost; dbname=mtransit_db', 'root', '');
}
catch(Exception $e)
{
echo 'Erreur : '.$e->getMessage().'<br />';
echo 'N째 : '.$e->getCode();
}
