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

/**reglement_client**/
$('#select_besoin_id').on('change', function(){
	var id_ref = $('#select_besoin_id').val();

	$.ajax({
		type: "GET",
		url: "caisse/calcul_total.php",
		data: "ref="+id_ref,
		success: function(msg){
			$("#montant_reglement_client").val(msg);	
		}
	});
});

$("#montant_reglement_client").on('keyup', function(){
    $("#benefice_reglement_client").val($("#montant_reglement_client").val()-$("#depense_reglement_client").val());
});

$("#depense_reglement_client").on('keyup', function(){
    $("#benefice_reglement_client").val($("#montant_reglement_client").val()-$("#depense_reglement_client").val());
});

$('#ajout_reglement_client').live('click', function(){
	$('#myModal_reglement_client').modal('show');
});
$('#form_reglement_client').live('submit',function(){		 
   	
	$.ajax({
	type: "POST",
	url: "reglement_client/ajout_reglement_client.php",
	data: "date_reglement_client="+$("#date_reglement_client").val()+"&num_dossier_reglement_client="+$("#num_dossier_reglement_client").val()+"&nom_client_reglement_client="+$("#nom_client_reglement_client").val()+"&montant_reglement_client="+$("#montant_reglement_client").val()+"&motif_reglement_client="+$("#motif_reglement_client").val()+"&mode_reglement="+$("#mode_reglement").val()+"&depense_reglement_client="+$("#depense_reglement_client").val()+"&benefice_reglement_client="+$("#benefice_reglement_client").val(),
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
			 $('#myModal_reglement_client').modal('toggle');
			 $("div.msg_erreur").hide(); 
			 $("#client_num").val('');
			 $("#date_depot_reglement_client").val('');
			 $("#date_retrait_reglement_client").val('');
			 $("#secur_traite_reglement_client").val('');
			 //change_page_reglement_client('0');
			 */
			 $(location).attr('href','reglement_client.php');
			 /*
		}
		*/
	}
 });
	
 return false;
}); 

$('.detail_reglement_client').live('click', function(){

	var id_ref = $(this).attr('data-id');
		$.ajax({
		type: "GET",
		url: "reglement_client/recup_reglement_client.php",
		data: "ref="+id_ref,
		success: function(msg){
			$(location).attr('href', 'vetement_reglement_client.php');	
		}
	});
	
});

/**reglement_client**/

change_page_reglement_client('0');
});

function change_page_reglement_client(page_id_cons){
	
	var page_id_cons=0;

	var dataString = 'page_id_cons='+ page_id_cons;
	$.ajax({
			type: "POST",
			url: "reglement_client/charge_reglement_client.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/giphy.gif" style="width:55px; height:55px;" />').show();
				$(".aff_reglement_client").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/giphy.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_reglement_client").html(result).show();
			}
	 });

}
