<?php
    session_start();
	
	include('../../../connex.php');
	
    ini_set('memory_limit','512M');
    ini_set('max_execution_time', 12000);

    $id_pers=$_GET['personnel_id'];

    $red=$con->prepare(" SELECT * FROM personnel LEFT JOIN service ON service.id_service=personnel.service_id LEFT JOIN fonction ON fonction.id_fonction=personnel.fonction_id WHERE id_personnel=:A ");
    $red->execute(array('A'=>$id_pers));
    $inf=$red->fetch();

    // $red1=$con->prepare(" SELECT * FROM personnel LEFT JOIN utilisateur ON personnel.id_personnel=utilisateur.personnel_id LEFT JOIN groupe_utilisateur ON utilisateur.type_groupe_id=groupe_utilisateur.id_type_groupe WHERE id_utilisateur=:A ");
    // $red1->execute(array('A'=>$id_pers));
    // $inf1=$red1->fetch();
    
    // $type_groupe=$inf1['type_groupe_id'];

    $nom= $inf['nom_personnel'];
    $email= $inf['email_personnel'];
    $tel= $inf['tel_personnel'];
    $service=$inf['lib_service'];
    $fonction= $inf['lib_fonction'];
    
    $test['nom'] = stripslashes($nom);
    $test['email'] = stripslashes($email);
    $test['tel'] = stripslashes($tel);
    $test['service'] = stripslashes($service);
    $test['fonction'] = stripslashes($fonction);
    // $test['type_groupe'] = stripslashes($type_groupe);

    // var_dump($test);

    echo json_encode($test);
   
	
unset($con);

?>