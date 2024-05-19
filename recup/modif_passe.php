 
<?php
session_start();

include('../connex.php');

$pass_ac=addslashes($_POST['c_new']);

$pass_a= hash("sha512", $pass_ac);

$rel=$con->prepare("SELECT * FROM utilisateur WHERE secur=:B"); 
$rel->execute(array( 'B' => $_SESSION['id_secur']));
$count = $rel->rowCount();

if($count>0)
{			  
$sql= $con->prepare("UPDATE utilisateur SET motpass_utilisateur='".$pass_a."' WHERE secur='".$_SESSION['id_secur']."'");
$sql->execute();
echo'0';
}
else
{
echo'1';
}

unset($con);
?>
 
 