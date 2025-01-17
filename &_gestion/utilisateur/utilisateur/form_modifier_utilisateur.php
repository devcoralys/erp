<script>
$('#groupe_mod').on('change', function () {
		var id=$("#groupe_mod").val();
		if(id!='')
		{
		$.ajax({
			type: "GET",
		   url: "utilisateur/choix_droit.php",
		   data:"cpt_id="+id,
		   success: function(msg){
		   $(".af_choix_mod").html(msg);
		   }
		});
		}
		else
		{
		$(".af_choix_mod").html("");
		}
	});
</script>
<?php

session_start();
include('../../../connex.php');

$id = $_GET["ref"];

if($id!='')
{
$red=$con->prepare(" SELECT * FROM utilisateur LEFT JOIN personnel ON personnel.id_personnel=utilisateur.personnel_id INNER JOIN service ON service.id_service=personnel.service_id INNER JOIN fonction ON fonction.id_fonction=personnel.fonction_id WHERE id_utilisateur=:A"); 
$red->execute(array('A' =>$id));
$uti=$red->fetch();

$_SESSION['id_utilisateur_mod']=$uti["id_utilisateur"];
$_SESSION['nom_utilisateur_mod']=$uti["nom_personnel"];
$_SESSION['email_utilisateur_mod']=$uti["email_personnel"];
$_SESSION['tel_personnel_mod']=$uti["tel_personnel"];
$_SESSION['type_groupe_id_mod']=$uti["type_groupe_id"];
$_SESSION['personnel_id']=$uti['personnel_id'];
$_SESSION['fonction_id']=$uti['lib_fonction'];
?>	
		 <form name="form_utilisateur_mod" id="form_utilisateur_mod" class="form-horizontal" action="#">
		
		<div class="row">

		<div class="col-xs-12">
         <label class="label_col">Sélectionner une personne<span class="semi_aste">*</span></label>
         <select class="form-control" data-placeholder="Choisir le(s) service(s)" id="demo-chosen-select" name="personnel_id_mod" style="width: 100%;" data-live-search="true" data-width="100%">
               <option value="">Veuillez choisir une personne...</option>
                <?php
	  //include('../../connex.php');
	  $red=$con->prepare("SELECT * FROM personnel WHERE valide!=1 ORDER BY nom_personnel ASC");
      $red->execute();
      while($ro=$red->fetch())
	  {
	  ?>
	  <option <?php if($_SESSION['personnel_id']==$ro['id_personnel']){ echo ' selected ';}; ?> value="<?php echo''.$ro['id_personnel'].''; ?>"><?php echo''.stripslashes($ro['nom_personnel']).'' ; ?></option>
      <?php
	  }
	  ?>
      </select>
     </div>
      <div class="row">&nbsp;</div> <div class="row">&nbsp;</div>

      <hr/>
			 
	 <div class="col-xs-7">
         <label class="label_col">Email utilisateur<span class="semi_aste">*</span></label>
 <input type="email" readonly class="form-control input" id="email_mod" name="email_mod" value="<?php echo''.stripslashes($uti['email_personnel']).''; ?>" />
     </div>
	 
	 <div class="col-xs-5">
         <label class="label_col">T&eacute;l&eacute;phone utilisateur</label>
   <input type="text" readonly class="form-control input" id="tel_personnel_mod" name="tel_personnel_mod"  value="<?php echo''.stripslashes($uti['tel_personnel']).''; ?>" />
     </div>
	 
	 <div class="col-xs-12">
         <label class="label_col">Service<span class="semi_aste">*</span></label>
		 <input type="text" readonly class="form-control input" id="service_mod" name="lib_service_mod"  value="<?php echo''.stripslashes($uti['lib_service']).''; ?>" />
     </div>

	 <div class="col-xs-12">
         <label class="label_col">Profession personnel</label>
		 <input type="text" readonly class="form-control input" id="fonction_mod" name="lib_fonction_mod"  value="<?php echo''.stripslashes($uti['lib_fonction']).''; ?>" />
     </div>
	 <div class="col-xs-12">&nbsp;</div>
	  <div class="col-xs-12">
         <label class="label_col">Groupe utilisateur<span class="semi_aste">*</span></label>
		 
       <select class="form-control" data-placeholder="Choisir le groupe" id="demo-chosen-select_" name="groupe_mod" style="width: 100%;">
	   <option value="">Choisir...</option>
                <?php
	  $red=$con->prepare("SELECT * FROM groupe_utilisateur ORDER BY nom_type_groupe ASC");
      $red->execute();
      while($ro=$red->fetch())
	  {
	  ?>
	  <option value="<?php echo''.$ro['id_type_groupe'].''; ?>" <?php if($uti["type_groupe_id"]==$ro['id_type_groupe']){ echo'selected'; } ?>><?php echo''.stripslashes($ro['nom_type_groupe']).'' ; ?></option>
      <?php
	  }
	  ?>
      </select>
     </div>
		 
      <div class="col-xs-12" style="">&nbsp;</div>
   
	
	<div class="pull-right"> 
    	<button type="button" data-dismiss="modal" class="btn btn-danger button_annul"><i class="fa fa-times"></i> Annuler</button>&nbsp;&nbsp;
		<button type="submit" id="submit_mod" class="btn button_enregistrer"><i class="fa fa-floppy-o"></i> Enregistrer</button>
    </div>
	</div>

      </form>
				
<?php
}
unset($con);
?>
    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/nifty.min.js"></script>

    <script src="../../plugins/bootstrap-select/bootstrap-select.min.js"></script>
    <script src="../../plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
    <script src="../../plugins/chosen/chosen.jquery.min.js"></script>
    <script src="../../plugins/select2/js/select2.min.js"></script>
    <script src="../../js/demo/form-component.js"></script>
	
	<script type="text/javascript" src="../../js_me/plugins/jquery/jquery-ui.min.js"></script>
    <script type="text/javascript" src="../../js_me/plugins/jquery/jquery-migrate.min.js"></script>   

<script>
  $(function () {
    $('.select2').select2()
  })

  $("#demo-chosen-select").on('change', function () {
		var id_pers=$("#demo-chosen-select").val();
		$("#utilisateur_mod").val('');
		if(id_pers!='')
		{
		$.ajax({
		   type: "GET",
		   dataType:"json",
		   url: "utilisateur/charge_info_pers.php",
		   data:"personnel_id="+id_pers,
		   success: function(msg){

			$("#utilisateur_mod").val(msg.nom);
			$("#email_mod").val(msg.email);
			$("#tel_personnel_mod").val(msg.tel);
			$("#service_mod").val(msg.service);
			$("#fonction_mod").val(msg.fonction);
			$("#demo-chosen-select_").val(msg.type_groupe);
		   }
		});
		}
		else
		{
			$("div.msg_erreur").html("Veuillez s&eacute;lectionner une personne svp !").show();
		}
	});

	$('#demo-chosen-select_').on('change', function () {
		var id=$("#demo-chosen-select_").val();
		if(id!='')
		{
		$.ajax({
		   type: "GET",
		   url: "utilisateur/choix_droit.php",
		   data:"cpt_id="+id,
		   success: function(msg){
		   $(".af_choix").html(msg);
		   }
		});
		}
		else
		{
		$(".af_choix").html("");
		}
	});
 
</script>