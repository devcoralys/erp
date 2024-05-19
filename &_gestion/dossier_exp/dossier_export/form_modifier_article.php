<?php
session_start();
include('../../../connex.php');

$id = $_GET["ref"];

if($id!='')
{

$res=$con->prepare("SELECT * FROM article WHERE id_article=:A");
$res->execute(array('A'=>$id));
$row=$res->fetch();

$code_tarifaire= $row['code_tarifaire']; 
$fob_euro= $row['fob_euro']; 
$fob_cfa= $row['fob_cfa']; 
$fret=$row['fret']; 
$ass=$row['ass']; 
$caf=$row['caf']; 
$dd=$row['dd'];
$taux=$row['taux'];
?>

                                     
<form name="form_article_mod" id="form_article_mod" class="form-horizontal" action="#">
		
		<div class="row">
        <div data-simplebar  style="max-height: 325px;">
    <!-- article_body -->
    <div class="row">
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="code_tarifaire" name="code_tarifaire" placeholder="CODE TARIFAIRE" value="<?php echo $code_tarifaire; ?>">
                            <label for="floatingInput">CODE TARIFAIRE </label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input readonly type="text" class="form-control" id="fob_cfa" name="fob_cfa" placeholder="FOB" value="<?php echo $fob_cfa; ?>">
                            <label for="floatingInput">FOB  (en CFA)</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input readonly type="text" class="form-control" id="caf" name="caf" placeholder="CAF" value="<?php echo $caf; ?>">
                            <label for="floatingInput">CAF  </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="fob_euro" name="fob_euro" placeholder="FOB" value="<?php echo $fob_euro; ?>">
                            <label for="floatingInput">FOB (en euro) </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="fret" name="fret" placeholder="FRET" value="<?php echo $fret; ?>">
                            <label for="floatingInput">FRET  </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="ass" name="ass" placeholder="ASS" value="<?php echo $ass; ?>">
                            <label for="floatingInput">ASS  </label>
                        </div>
                    </div>
          
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="taux" name="taux" placeholder="TAUX" value="<?php echo $taux; ?>">
                            <label for="floatingInput">TAUX TARIFAIRE </label>
                        </div>
                    </div>
                </div> 
    <!-- /article_body -->
</div>

		</div>

        <div class="row">&nbsp;</div>

		 <div class="modal-footer ajout-footer_file"> 
		 <button type="submit" id="envoie_article" class="btn button_valid"><i class="fa fa-check"></i> Valider</button>&nbsp;&nbsp;
         <button type="button" class="btn button_annul" data-dismiss="modal"><i class="fa fa-times"></i> Annuler</button>
         </div>
      </form>									
									
										
											
															
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