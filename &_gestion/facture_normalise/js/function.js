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

/**facture_normalise**/
$('#select_besoin_id').on('change', function(){
	var id_ref = $('#select_besoin_id').val();

	$.ajax({
		type: "GET",
		url: "caisse/calcul_total.php",
		data: "ref="+id_ref,
		success: function(msg){
			$("#montant_facture_normalise").val(msg);	
		}
	});
});

$('#ajout_facture_normalise').live('click', function(){
	$('#myModal_facture_normalise').modal('show');
});
$('#form_facture_normalise').live('submit',function(){		 
   	
	$.ajax({
	type: "POST",
	url: "facture_normalise/ajout_facture_normalise.php",
	data: "date_facture_normalise="+$("#date_facture_normalise").val()+"&num_recu_facture_normalise="+$("#num_recu_facture_normalise").val()+"&num_dossier_facture_normalise="+$("#num_dossier_facture_normalise").val()+"&nom_client_facture_normalise="+$("#nom_client_facture_normalise").val()+"&montant_facture_normalise="+$("#montant_facture_normalise").val()+"&motif_facture_normalise="+$("#motif_facture_normalise").val()+"&mode_reglement="+$("#mode_reglement").val()+"&demandeur_facture_normalise="+$("#demandeur_facture_normalise").val(),
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
			 $('#myModal_facture_normalise').modal('toggle');
			 $("div.msg_erreur").hide(); 
			 $("#client_num").val('');
			 $("#date_depot_facture_normalise").val('');
			 $("#date_retrait_facture_normalise").val('');
			 $("#secur_traite_facture_normalise").val('');
			 //change_page_facture_normalise('0');
			 */
			 $(location).attr('href','facture_normalise.php');
			 /*
		}
		*/
	}
 });
	
 return false;
}); 

$('.detail_facture_normalise').live('click', function(){

	var id_ref = $(this).attr('data-id');
		$.ajax({
		type: "GET",
		url: "facture_normalise/recup_facture_normalise.php",
		data: "ref="+id_ref,
		success: function(msg){
			$(location).attr('href', 'vetement_facture_normalise.php');	
		}
	});
	
});

/**facture_normalise**/

change_page_facture_normalise('0');
});

function change_page_facture_normalise(page_id_cons){
	
	var page_id_cons=0;

	var dataString = 'page_id_cons='+ page_id_cons;
	$.ajax({
			type: "POST",
			url: "facture_normalise/charge_facture_normalise.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/giphy.gif" style="width:55px; height:55px;" />').show();
				$(".aff_facture_normalise").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/giphy.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_facture_normalise").html(result).show();
			}
	 });

}
