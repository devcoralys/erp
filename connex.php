<?php 
try
{
$con = new PDO('mysql:host=localhost;dbname=coralys1_erp_db', 'coralys1_admin_dev', '@Coralys2024');
//$con = new PDO('mysql:host=localhost; dbname=mtransit_db', 'root', '');
}
catch(Exception $e)
{
echo 'Erreur : '.$e->getMessage().'<br />';
echo 'N째 : '.$e->getCode();
}
