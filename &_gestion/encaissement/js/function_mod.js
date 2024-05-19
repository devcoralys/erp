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

$("#retour_enc").live('click', function(){
	$(location).attr('href', 'encaissement.php');
	//alert('Boutton d\'annulation enfonce');
});

$("#fermer").live('click', function(){
	$(location).attr('href', 'caisse.php');
	//alert('Boutton d\'annulation enfonce');
});


$('#form_encaissement').live('submit',function(){		 
   	
	$.ajax({
	type: "POST",
	url: "encaissement/modif_encaissement.php",
	data: "date_encaissement="+$("#date_encaissement").val()+"&num_recu_encaissement="+$("#num_recu_encaissement").val()+"&num_dossier_encaissement="+$("#num_dossier_encaissement").val()+"&nom_client_encaissement="+$("#nom_client_encaissement").val()+"&montant_encaissement="+$("#montant_encaissement").val()+"&motif_encaissement="+$("#motif_encaissement").val()+"&mode_reglement="+$("#mode_reglement").val(),
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
			 $('#myModal_encaissement').modal('toggle');
			 $("div.msg_erreur").hide(); 
			 $("#client_num").val('');
			 $("#date_depot_encaissement").val('');
			 $("#date_retrait_encaissement").val('');
			 $("#secur_traite_encaissement").val('');
			 //change_page_encaissement('0');
			 */
			 $(location).attr('href','encaissement.php');
			 /*
		}
		*/
	}
 });
	
 return false;
}); 
/*
$('.detail_declaration').live('click', function(){

	var id_ref = $(this).attr('data-id');
		$.ajax({
		type: "GET",
		url: "declaration/recup_declaration.php",
		data: "ref="+id_ref,
		success: function(msg){
			$(location).attr('href', 'vetement_declaration.php');	
		}
	});
	
});
*/
/**declaration**/

change_page_declaration('0');
});

function change_page_declaration(page_id_cons){
	
	var page_id_cons=0;

	var dataString = 'page_id_cons='+ page_id_cons;
	$.ajax({
			type: "POST",
			url: "declaration/charge_declaration.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/giphy.gif" style="width:55px; height:55px;" />').show();
				$(".aff_declaration").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/giphy.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_declaration").html(result).show();
			}
	 });

}
