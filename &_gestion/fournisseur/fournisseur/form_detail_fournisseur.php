<?php
session_start();
include('../../../connex.php');

$id = $_GET["ref"];

if($id!='')
{

$res=$con->prepare("SELECT * FROM fournisseur WHERE id_fournisseur=:A");
$res->execute(array('A'=>$id));
$row=$res->fetch();

?>

                                     
										
										<div class="row bor_" style=" color:#383838">
										
								
										
										
										<!---->
										 <div class="col-lg-12">
										 
										 <div class="form-group">
					                            <div class="col-lg-5 control-div"><b>CODE FOURNISSEUR</b> : </div>
					                            <div class="col-lg-7" style="margin-bottom:10px">
                                               <span class="c_1"> <?php  if($row['code_fournisseur']!='')
											   { echo $row['code_fournisseur']; } else{ echo'&nbsp;'; } ?></span>
					                            </div>
					                        </div>
								
					                        <div class="form-group">
					                            <div class="col-lg-5 control-div"><b>NOM DU FOURNISSEUR</b> : </div>
					                            <div class="col-lg-7" style="margin-bottom:10px">
                                               <span class="c_1"> <?php  if($row['nom_fournisseur']!='')
											   { echo $row['nom_fournisseur']; } else{ echo'&nbsp;'; } ?></span>
					                            </div>
					                        </div>
								
									
											<div class="form-group">
					                            <div class="col-lg-5 control-div"><b>T&Eacute;L&Eacute;PHONE</b> : </div>
					                            <div class="col-lg-7" style="margin-bottom:10px">
			                                   <span class="c_0"> 
											   <?php if($row['tel_fournisseur']!=''){ echo $row['tel_fournisseur']; }
											   else{ echo'&nbsp;'; } ?>
											   </span>
					                            </div>
					                        </div>
											<div class="form-group">
					                            <div class="col-lg-5 control-div"><b>EMAIL</b> : </div>
					                            <div class="col-lg-7" style="margin-bottom:10px">
                                              <span class="c_1"> <?php if($row['email_fournisseur']!=''){
											    echo $row['email_fournisseur']; }else{ echo'&nbsp;'; } ?></span>
					                            </div>
					                        </div>
											
																						
											
										 </div>
							
															
<?php
unset($con);
}
?>
   