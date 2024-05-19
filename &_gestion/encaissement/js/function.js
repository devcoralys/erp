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

/**encaissement**/
$('#select_besoin_id').on('change', function(){
	var id_ref = $('#select_besoin_id').val();

	$.ajax({
		type: "GET",
		url: "caisse/calcul_total.php",
		data: "ref="+id_ref,
		success: function(msg){
			$("#montant_encaissement").val(msg);	
		}
	});
});

$('#ajout_encaissement').live('click', function(){
	$('#myModal_encaissement').modal('show');
});
$('#form_encaissement').live('submit',function(){		 
   	
	$.ajax({
	type: "POST",
	url: "encaissement/ajout_encaissement.php",
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

$('.detail_encaissement').live('click', function(){

	var id_ref = $(this).attr('data-id');
		$.ajax({
		type: "GET",
		url: "encaissement/recup_encaissement.php",
		data: "ref="+id_ref,
		success: function(msg){
			$(location).attr('href', 'vetement_encaissement.php');	
		}
	});
	
});

/**encaissement**/

$('#recher_date_debut').on('keyup',function(){
   
	var recher_date_debut=$("#recher_date_debut").val();
	var recher_date_fin=$("#recher_date_fin").val();
	var recher_num_recu=$("#recher_num_recu").val();
	var recher_num_dossier=$("#recher_num_dossier").val();

	var page_id=0;

    var dataString = 'page_id='+page_id+'&recher_date_debut='+recher_date_debut+'&recher_date_fin='+recher_date_fin+'&recher_num_recu='+recher_num_recu+'&recher_num_dossier='+recher_num_dossier;
	$.ajax({
			type: "POST",
			url: "encaissement/charge_encaissement.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').show();
				$(".aff_encaissement").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_encaissement").html(result).show();
			}
	 });
});
$('#recher_date_fin').on('keyup',function(){
   
	var recher_date_debut=$("#recher_date_debut").val();
	var recher_date_fin=$("#recher_date_fin").val();
	var recher_num_recu=$("#recher_num_recu").val();
	var recher_num_dossier=$("#recher_num_dossier").val();

	var page_id=0;

    var dataString = 'page_id='+page_id+'&recher_date_debut='+recher_date_debut+'&recher_date_fin='+recher_date_fin+'&recher_num_recu='+recher_num_recu+'&recher_num_dossier='+recher_num_dossier;
	$.ajax({
			type: "POST",
			url: "encaissement/charge_encaissement.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').show();
				$(".aff_encaissement").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_encaissement").html(result).show();
			}
	 });
});
$('#recher_date_debut').on('change',function(){
   
	var recher_date_debut=$("#recher_date_debut").val();
	var recher_date_fin=$("#recher_date_fin").val();
	var recher_num_recu=$("#recher_num_recu").val();
	var recher_num_dossier=$("#recher_num_dossier").val();
 
	var page_id=0;

    var dataString = 'page_id='+page_id+'&recher_date_debut='+recher_date_debut+'&recher_date_fin='+recher_date_fin+'&recher_num_recu='+recher_num_recu+'&recher_num_dossier='+recher_num_dossier;
	$.ajax({
			type: "POST",
			url: "encaissement/charge_encaissement.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').show();
				$(".aff_encaissement").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_encaissement").html(result).show();
			}
	 });
});
$('#recher_date_fin').on('change',function(){
   
	var recher_date_debut=$("#recher_date_debut").val();
	var recher_date_fin=$("#recher_date_fin").val();
	var recher_num_recu=$("#recher_num_recu").val();
	var recher_num_dossier=$("#recher_num_dossier").val();
 
	var page_id=0;

    var dataString = 'page_id='+page_id+'&recher_date_debut='+recher_date_debut+'&recher_date_fin='+recher_date_fin+'&recher_num_recu='+recher_num_recu+'&recher_num_dossier='+recher_num_dossier;
	$.ajax({
			type: "POST",
			url: "encaissement/charge_encaissement.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').show();
				$(".aff_encaissement").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_encaissement").html(result).show();
			}
	 });
});
$('#recher_num_recu').on('keyup',function(){
   
	var recher_date_debut=$("#recher_date_debut").val();
	var recher_date_fin=$("#recher_date_fin").val();
	var recher_num_recu=$("#recher_num_recu").val();
	var recher_num_dossier=$("#recher_num_dossier").val();
 
	var page_id=0;

    var dataString = 'page_id='+page_id+'&recher_date_debut='+recher_date_debut+'&recher_date_fin='+recher_date_fin+'&recher_num_recu='+recher_num_recu+'&recher_num_dossier='+recher_num_dossier;
	$.ajax({
			type: "POST",
			url: "encaissement/charge_encaissement.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').show();
				$(".aff_encaissement").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_encaissement").html(result).show();
			}
	 });
});
$('#recher_num_dossier').on('keyup',function(){
   
	var recher_date_debut=$("#recher_date_debut").val();
	var recher_date_fin=$("#recher_date_fin").val();
	var recher_num_recu=$("#recher_num_recu").val();
	var recher_num_dossier=$("#recher_num_dossier").val();
 
	var page_id=0;

    var dataString = 'page_id='+page_id+'&recher_date_debut='+recher_date_debut+'&recher_date_fin='+recher_date_fin+'&recher_num_recu='+recher_num_recu+'&recher_num_dossier='+recher_num_dossier;
	$.ajax({
			type: "POST",
			url: "encaissement/charge_encaissement.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').show();
				$(".aff_encaissement").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_encaissement").html(result).show();
			}
	 });
});

change_page_encaissement('0');
});

function change_page_encaissement(page_id){
	
	var recher_date_debut=$("#recher_date_debut").val();
	var recher_date_fin=$("#recher_date_fin").val();
	var recher_num_recu=$("#recher_num_recu").val();
	var recher_num_dossier=$("#recher_num_dossier").val();
 
	var page_id=0;

    var dataString = 'page_id='+page_id+'&recher_date_debut='+recher_date_debut+'&recher_date_fin='+recher_date_fin+'&recher_num_recu='+recher_num_recu+'&recher_num_dossier='+recher_num_dossier;
    
	$.ajax({
			type: "POST",
			url: "encaissement/charge_encaissement.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/giphy.gif" style="width:55px; height:55px;" />').show();
				$(".aff_encaissement").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/giphy.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_encaissement").html(result).show();
			}
	 });

}
