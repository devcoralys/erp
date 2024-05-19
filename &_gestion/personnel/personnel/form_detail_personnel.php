<?php
session_start();
include('../../../connex.php');

$id = $_GET["ref"];

if($id!='')
{

$res=$con->prepare("SELECT * FROM personnel WHERE id_personnel=:A");
$res->execute(array('A'=>$id));
$row=$res->fetch();

$date_nais = date("d/m/Y", strtotime($row['date_nais_personnel']));
$date_recru = date("d/m/Y", strtotime($row['date_recrutement']));
?>

                                     
										
										<div class="row bor_" style=" color:#383838">
										
										<div class="col-lg-4" style="height:290px; border-right:2px solid #D1D1D1;">
										
			                            <div>
										<?php  if($row['photo_personnel']!='') { ?>
			              <img src="../../photo/<?php echo $row['photo_personnel']; ?>" width="132px" height="142px" alt="Photo de profil">
										<?php }else{ ?>
										<img src="../../photo/profile-icon.png" width="132px" height="142px" alt="Photo de profil">
										<?php } ?>
			                            </div>
										
										 
										</div>
										
										
										<!---->
										 <div class="col-lg-8">
										 
										 <div class="form-group">
					                            <div class="col-lg-5 control-div"><b>MATRICULE</b> : </div>
					                            <div class="col-lg-7" style="margin-bottom:10px">
                                               <span class="c_0"> 
											   <?php 
											   if($row['matricule_personnel']!='')
											   { echo $row['matricule_personnel']; }
											   else{ echo'&nbsp;'; }
											   ?>
												</span>
					                            </div>
					                        </div>
					                        <div class="form-group">
					                            <div class="col-lg-5 control-div"><b>NOM & PR&Eacute;NOM</b> : </div>
					                            <div class="col-lg-7" style="margin-bottom:10px">
                                               <span class="c_1"> <?php  if($row['matricule_personnel']!='')
											   { echo $row['nom_personnel']; } else{ echo'&nbsp;'; } ?></span>
					                            </div>
					                        </div>
											<div class="form-group">
					                            <div class="col-lg-5 control-div" ><b>SEXE</b> : </div>
					                            <div class="col-lg-7" style="margin-bottom:10px">
					                           <span class="c_1"> <?php if($row['sexe_personnel']=='M'){ echo"HOMME"; } ?> 
												 <?php if($row['sexe_personnel']=='F'){ echo"FEMME"; } ?>  </span> 
					                            </div>
					                        </div>
											<div class="form-group">
					                       <div class="col-md-5 control-div"><b>DATE DE NAISSANCE</b> : </div>
					                       <div class="col-md-7" style="margin-bottom:10px">
                                        <span class="c_0"><?php echo $date_nais; ?></span>
					                     </div>
					                        </div>
									
											<div class="form-group">
					                            <div class="col-lg-5 control-div"><b>T&Eacute;L&Eacute;PHONE</b> : </div>
					                            <div class="col-lg-7" style="margin-bottom:10px">
			                                   <span class="c_0"> 
											   <?php if($row['tel_personnel']!=''){ echo $row['tel_personnel']; }
											   else{ echo'&nbsp;'; } ?>
											   </span>
					                            </div>
					                        </div>
											<div class="form-group">
					                            <div class="col-lg-5 control-div"><b>EMAIL</b> : </div>
					                            <div class="col-lg-7" style="margin-bottom:10px">
                                              <span class="c_1"> <?php if($row['email_personnel']!=''){
											    echo $row['email_personnel']; }else{ echo'&nbsp;'; } ?></span>
					                            </div>
					                        </div>
											<div class="form-group">
					                            <div class="col-lg-5 control-div"><b>DATE D'ENTREE</b> : </div>
					                            <div class="col-lg-7" style="margin-bottom:10px">
                                              <span class="c_0">  <?php echo $date_recru; ?></span>
					                            </div>
					                        </div>
											
											<div class="form-group">
					                            <div class="col-lg-5 control-div"><b>SERVICE</b> : </div>
					                            <div class="col-lg-7" style="margin-bottom:10px">
											   <span class="c_1">    <?php
	                                                $reg=$con->prepare("SELECT * FROM service WHERE id_service=:A"); 
                                                    $reg->execute(array('A' =>$row['service_id']));
                                                    $utig=$reg->fetch();
													 if($utig['lib_service']!=''){ echo''.stripslashes($utig['lib_service']).''; }
													 else{ echo'&nbsp;'; }
	                                                 ?></span>
					                            </div>
					                        </div>
											
											<div class="form-group">
					                            <div class="col-lg-5 control-div"><b>FONCTION</b> : </div>
					                            <div class="col-lg-7" style="margin-bottom:10px">
                                               <span class="c_1">  <?php
	                                                $rego=$con->prepare("SELECT * FROM fonction WHERE id_fonction=:A"); 
                                                    $rego->execute(array('A' =>$row['fonction_id']));
                                                    $utigo=$rego->fetch();
													if($utigo['lib_fonction']!=''){ echo''.stripslashes($utigo['lib_fonction']).''; }
													 else{ echo'&nbsp;'; }
	                                                 ?></span>
					                            </div>
					                        </div>
                                            <div class="form-group">
					                            <div class="col-lg-5 control-div"><b>STATUT</b> : </div>
					                            <div class="col-lg-7" style="margin-bottom:10px">
	                                          <span class="c_1">   <?php
	                                                $rego=$con->prepare("SELECT * FROM statut_personnel WHERE id_statut_personnel=:A"); 
                                                    $rego->execute(array('A' =>$row['statut_personnel_id']));
                                                    $utigo=$rego->fetch();
									    if($utigo['lib_statut_personnel']!=''){ echo''.stripslashes($utigo['lib_statut_personnel']).''; }
													else{ echo'&nbsp;'; }
	                                                 ?></span>
					                            </div>
					                        </div>
																						
											
										 </div>
							
															
<?php
unset($con);
}
?>
   