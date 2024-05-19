<?php
session_start();
include('../../../connex.php');

$id = $_GET["ref"];

//$_SESSION['valid_id']=$id;

if($id!='')
{

$red=$con->prepare("SELECT * FROM besoin LEFT JOIN article_besoin ON article_besoin.besoin_num = besoin.num_fiche LEFT JOIN article ON article.num_article=article_besoin.article_num LEFT JOIN utilisateur ON utilisateur.secur=besoin.demandeur_secur WHERE id_besoin=:A " ); 
$red->execute(array('A' =>$id));
$util=$red->fetch();

echo'
  <p style="text-align:center;">
  <b>Fiche N°</b> '.$util['num_fiche'].'
  <br>
  <b>Objet</b> : '.$util['objet_demande'].'
  <br>
  <b>Demandeur</b> : '.$util['nom_utilisateur'].'
  </p>
  <p style="text-align:center;">
      <div class="row"></div>
      <label class="label" for="motif_decision">Motif de votre décision (facultatif)</label> 
      <textarea class="form-control" id="motif_decision" name="motif_decision"></textarea>
  </p>
  <div class="row">&nbsp;</div>
  <span style="padding:10px;">Veuillez cliquer sur <b>"Accepter"</b> ou <b>"Réfuser"</b> pour définir le statut de cette fiche.</span>

  <div class="modal-footer ajout-footer">
    <button type="button" data-id="'.$id.'" id="submit_besoin_refus" class="btn btn-danger button_annuler" data-dismiss="modal"><i class="fa fa-ban"></i> Réfuser</button>
    <button type="submit" data-id="'.$id.'" id="submit_besoin_valid" class="btn btn-success button_supprimer"><i class="fa fa-check"></i> Accepter</button>&nbsp;&nbsp;&nbsp;
  </div>
';

}

unset($con);
?>
