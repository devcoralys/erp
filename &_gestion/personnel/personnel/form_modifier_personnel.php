<script>
$(function () {
    // A chaque s�lection de fichier
    $('#form_pers_mod').find('input[name="photo_mod"]').on('change', function (e) {
        var files = $(this)[0].files;
 
        if (files.length > 0) {
            // On part du principe qu'il n'y qu'un seul fichier
            // �tant donn� que l'on a pas renseign� l'attribut "multiple"
            var file = files[0],
            $image_preview = $('#image_preview_mod');
 
            // Ici on injecte les informations recolt�es sur le fichier pour l'utilisateur
            $image_preview.find('.thumbnail').removeClass('hidden');
            $image_preview.find('img').attr('src', window.URL.createObjectURL(file));
        }
    });
});
$("#photo_mod").hide();
</script>
<?php
session_start();
include('../../../connex.php');

$id = $_GET["ref"];

if($id!='')
{

$res=$con->prepare("SELECT * FROM personnel WHERE id_personnel=:A");
$res->execute(array('A'=>$id));
$row=$res->fetch();

$date_nais = $row['date_nais_personnel'];
$date_recru = $row['date_recrutement'];
$_SESSION['id_pers_soi_mod']=$row['id_personnel'];
?>

                                     
										
										<div class="row">
										
										<div class="col-lg-4" style="/*background-color: #F7F7F7; height:407px; border:1px solid #D1D1D1*/">
										
			                            <div class="col_pho" id="image_preview_mod">
											<?php  if($row['photo_personnel']!='') { ?>
							<img src="../../photo/<?php echo $row['photo_personnel']; ?>" width="147px" height="150px" alt="Photo de profil">
											<?php }else{ ?>
											<img src="../../photo/photo_profil.jpg" width="147px" height="150px" alt="Photo de profil">
											<?php } ?>
			                            </div>
										
										<div class="col-lg-12" style="margin-top:10px">
					                        <span class="pull-left btn btn-file" for="photo_mod">
                                                <label for="photo" class="btn_ch"><i class="fa fa-paperclip"></i>&nbsp;Choisir photo</label>
					                            <input type="file" id="photo_mod" name="photo_mod">
					                        </span>
					                    </div>
									
										</div>
										
										
										
										 <div class="col-lg-8">
										<!-- <div class="form-group">
					                            <label class="col-lg-4 control-label"  style="margin-top:10px">Sexe<span class="rouge">*</span></label>
					                            <div class="col-lg-8">
					                                <div class="radio">
 <input id="mascu_mod" class="magic-radio" type="radio" name="sexe_mod" value="1" <?php //if($row['sexe_personnel']=="1"){ echo "checked"; } ?>>
					                                    <label for="mascu_mod">Masculin</label>
					
 <input id="fem_mod" class="magic-radio" type="radio" name="sexe_mod" value="2" <?php //if($row['sexe_personnel']=="2"){ echo "checked"; } ?>>
					                                    <label for="fem_mod">F&eacute;minin</label>
					                                </div>
					                            </div>
					                        </div>-->
											
										 <div class="form-group">
					                            <label class="col-lg-4 control-label">Matricule<span class="rouge">*</span></label>
					                            <div class="col-lg-5" style="margin-bottom:10px">
<input type="text" class="form-control" name="mat_mod" id="mat_mod" placeholder="Matricule" value="<?php echo $row['matricule_personnel']; ?>">
					                            </div>
					                        </div>
					                        <div class="form-group">
					                            <label class="col-lg-4 control-label">Nom & pr&eacute;nom(s)<span class="rouge">*</span></label>
					                            <div class="col-lg-8">
<input type="text" class="form-control" name="nom_mod" id="nom_mod" placeholder="Nom & pr&eacute;nom(s)" value="<?php echo $row['nom_personnel']; ?>">
					                            </div>
					                        </div>
											<div class="form-group">
					                            <label class="col-lg-4 control-label"  style="margin-top:10px">Sexe<span class="rouge">*</span></label>
					                            <div class="col-lg-8">
					                                <div class="radio">
 <input id="mascu_mod" class="magic-radio" type="radio" name="sexe_mod" value="M" <?php if($row['sexe_personnel']=="M"){ echo "checked"; } ?>>
					                                    <label for="mascu_mod">Masculin</label>
					
 <input id="fem_mod" class="magic-radio" type="radio" name="sexe_mod" value="F" <?php if($row['sexe_personnel']=="F"){ echo "checked"; } ?>>
					                                    <label for="fem_mod">F&eacute;minin</label>
					                                </div>
					                            </div>
					                        </div>
											<div class="form-group">
					                <label for="demo-msk-date" class="col-md-4 control-label">Date de naissance<span class="rouge">*</span></label>
					                    <div class="col-md-8" style="margin-bottom:10px">
<input type="date" id="date_nais_mod" name="date_nais_mod" class="form-control" value="<?php echo $date_nais; ?>">
					                    </div>
					                        </div>
									
											<div class="form-group">
					                            <label class="col-lg-4 control-label">T&eacute;l&eacute;phone<span class="rouge">*</span></label>
					                            <div class="col-lg-8" style="margin-bottom:10px">
			<input type="text" class="form-control" name="tel_mod" id="tel_mod" placeholder="T&eacute;l&eacute;phone" value="<?php echo $row['tel_personnel']; ?>">
					                            </div>
					                        </div>
											<div class="form-group">
					                            <label class="col-lg-4 control-label">Email<span class="rouge">*</span></label>
					                            <div class="col-lg-8" style="margin-bottom:10px">
<input type="email" class="form-control" name="email_mod" id="email_mod" placeholder="Email" value="<?php echo $row['email_personnel']; ?>">
					                            </div>
					                        </div>
											<div class="form-group">
					                            <label class="col-lg-4 control-label">Date d'entr&eacute;e<span class="rouge">*</span></label>
					                            <div class="col-lg-8" style="margin-bottom:10px">
<input type="date" class="form-control" name="date_entre_mod" id="date_entre_mod" placeholder="Date d'entr&eacute;e" value="<?php echo $date_recru; ?>">
					                            </div>
					                        </div>
											
											<div class="form-group">
					                            <label class="col-lg-4 control-label">Service<span class="rouge">*</span></label>
					                            <div class="col-lg-8" style="margin-bottom:10px">
     <select data-trigger class="form-control service_mod" id="demo-chosen-select" title="Choisir un service..." name="service_mod" data-live-search="true" data-width="100%">		                                              <option value="">Choisir un service...</option>
											  <?php
	                                                 $rem_1=$con->prepare("SELECT * FROM service ORDER BY lib_service ASC");
                                                     $rem_1->execute();
                                                     while($rom_1=$rem_1->fetch())
	                                                 {
	                                                 ?>
    <option value="<?php echo''.$rom_1['id_service'].''; ?>" <?php if($rom_1['id_service']==$row['service_id']){ echo'selected'; } ?>><?php echo''.stripslashes($rom_1['lib_service']).''; ?></option>
                                                     <?php
	                                                 }
	                                                 ?>
					                            </select>
					                            </div>
					                        </div>
											
											<div class="form-group">
					                            <label class="col-lg-4 control-label">Fonction<span class="rouge">*</span></label>
					                            <div class="col-lg-8" style="margin-bottom:10px">
 <select data-trigger class="form-control fonctio_mod" id="demo-chosen-select_" title="Choisir une fonction..." name="fonctio_mod" data-live-search="true" data-width="100%">
							<option value="">Choisir une fonction...</option>
							                        <?php
	                                                 $rem_2=$con->prepare("SELECT * FROM fonction ORDER BY lib_fonction ASC");
                                                     $rem_2->execute();
                                                     while($rom_2=$rem_2->fetch())
	                                                 {
	                                                 ?>
     <option value="<?php echo''.$rom_2['id_fonction'].''; ?>" <?php if($rom_2['id_fonction']==$row['fonction_id']){ echo'selected'; } ?>><?php echo''.mb_strimwidth(stripslashes($rom_2['lib_fonction']), 0, 25, "...").''; ?></option>
                                                     <?php
	                                                 }
	                                                 ?>
					                            </select>
					                            </div>
					                        </div>
											
											<div class="form-group">
					                            <label class="col-lg-4 control-label">Statut<span class="rouge">*</span></label>
					                            <div class="col-lg-8" style="margin-bottom:10px">
	<select data-trigger class="form-control statut_mod" id="demo-chosen-select_1" title="Choisir un statut..." name="statut_mod" data-live-search="true" data-width="100%">
						                            <option value="">Choisir un statut...</option>
					                                  <?php
	                                               $rem_3=$con->prepare("SELECT * FROM statut_personnel ORDER BY lib_statut_personnel ASC");
                                                     $rem_3->execute();
                                                     while($rom_3=$rem_3->fetch())
	                                                 {
	                                                 ?>
  <option value="<?php echo''.$rom_3['id_statut_personnel'].''; ?>" <?php if($rom_3['id_statut_personnel']==$row['statut_personnel_id']){ echo'selected'; } ?>><?php echo''.stripslashes($rom_3['lib_statut_personnel']).''; ?></option>
                                                     <?php
	                                                 }
	                                                 ?>
					                            </select>
					                            </div>
					                        </div>
											
										 </div>
							
															
<?php
unset($con);
}
?>
 <!-- JAVASCRIPT -->
 <script src="../../assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../../assets/libs/metismenujs/metismenujs.min.js"></script>
        <script src="../../assets/libs/simplebar/simplebar.min.js"></script>
        <script src="../../assets/libs/feather-icons/feather.min.js"></script>

        <!-- plugins -->
        <script src="../../assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>
        <script src="../../assets/libs/flatpickr/flatpickr.min.js"></script>

        <!-- Modern colorpicker bundle -->
        <script src="../../assets/libs/@simonwep/pickr/pickr.min.js"></script>

        <!-- init js -->
        <script src="../../assets/js/pages/form-advanced.init.js"></script>

        <script src="../...assets/js/app.js"></script>