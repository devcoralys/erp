$(document).ready(function(){ 

$("div.msg_erreur").hide(); 

$("div.chargement").html('<img src="../../img/giphy.gif" style="width:55px; height:55px;" />').show();
$("div.voir").hide();
setTimeout(function() {
$("div.chargement").html('<img src="../../img/giphy.gif" style="width:55px; height:55px;" />').hide();
$("div.voir").show();
}, 1500);

$('.button_annul').live('click',function(){
	$("div.msg_erreur").hide(); 
    $(".clo_er").hide(); 
	location.reload();
});

$(".button_annul").live('click', function(){
	$(location).attr('href', 'caisse.php');
	//alert('Boutton d\'annulation enfonce');
});

$("#fermer").live('click', function(){
	$(location).attr('href', 'caisse.php');
	//alert('Boutton d\'annulation enfonce');
});

/**reglement_fournisseur**/
$('#select_besoin_id').on('change', function(){
	var id_ref = $('#select_besoin_id').val();

	$.ajax({
		type: "GET",
		url: "caisse/calcul_total.php",
		data: "ref="+id_ref,
		success: function(msg){
			$("#montant_reglement_fournisseur").val(msg);	
		}
	});
});
/*
$("#montant_reglement_fournisseur").on('keyup', function(){
    $("#benefice_reglement_fournisseur").val($("#montant_reglement_fournisseur").val()-$("#depense_reglement_fournisseur").val());
});

$("#depense_reglement_fournisseur").on('keyup', function(){
    $("#benefice_reglement_fournisseur").val($("#montant_reglement_fournisseur").val()-$("#depense_reglement_fournisseur").val());
});
*/
$('#ajout_reglement_fournisseur').live('click', function(){
	$('#myModal_reglement_fournisseur').modal('show');
});
$('#form_reglement_fournisseur').live('submit',function(){		 
   	
	$.ajax({
	type: "POST",
	url: "reglement_fournisseur/ajout_reglement_fournisseur.php",
	data: "date_reglement_fournisseur="+$("#date_reglement_fournisseur").val()+"&num_dossier_reglement_fournisseur="+$("#num_dossier_reglement_fournisseur").val()+"&nom_client_reglement_fournisseur="+$("#nom_client_reglement_fournisseur").val()+"&montant_reglement_fournisseur="+$("#montant_reglement_fournisseur").val()+"&motif_reglement_fournisseur="+$("#motif_reglement_fournisseur").val()+"&mode_reglement="+$("#mode_reglement").val()+"&depense_reglement_fournisseur="+$("#depense_reglement_fournisseur").val()+"&benefice_reglement_fournisseur="+$("#benefice_reglement_fournisseur").val(),
	success: function(msg){
		/*
		if(msg==1)
		{
	 $("div.msg_erreur").addClass("red"); 
	 $("div.msg_erreur").removeClass("green");
	$("div.msg_erreur").html("Ce ticket existe d&eacute;j&agrave; !").show();
		}
		else
		{
			 $('#myModal_reglement_fournisseur').modal('toggle');
			 $("div.msg_erreur").hide(); 
			 $("#client_num").val('');
			 $("#date_depot_reglement_fournisseur").val('');
			 $("#date_retrait_reglement_fournisseur").val('');
			 $("#secur_traite_reglement_fournisseur").val('');
			 //change_page_reglement_fournisseur('0');
			 */
			 $(location).attr('href','reglement_fournisseur.php');
			 /*
		}
		*/
	}
 });
	
 return false;
}); 

$('.detail_reglement_fournisseur').live('click', function(){

	var id_ref = $(this).attr('data-id');
		$.ajax({
		type: "GET",
		url: "reglement_fournisseur/recup_reglement_fournisseur.php",
		data: "ref="+id_ref,
		success: function(msg){
			$(location).attr('href', 'vetement_reglement_fournisseur.php');	
		}
	});
	
});

/**reglement_fournisseur**/

change_page_reglement_fournisseur('0');
});

function change_page_reglement_fournisseur(page_id_cons){
	
	var page_id_cons=0;

	var dataString = 'page_id_cons='+ page_id_cons;
	$.ajax({
			type: "POST",
			url: "reglement_fournisseur/charge_reglement_fournisseur.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/giphy.gif" style="width:55px; height:55px;" />').show();
				$(".aff_reglement_fournisseur").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/giphy.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_reglement_fournisseur").html(result).show();
			}
	 });

}
