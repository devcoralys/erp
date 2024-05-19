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

/**decaissement**/
$('#select_besoin_id').on('change', function(){
	var id_ref = $('#select_besoin_id').val();

	$.ajax({
		type: "GET",
		url: "caisse/calcul_total.php",
		data: "ref="+id_ref,
		success: function(msg){
			$("#montant_decaissement").val(msg);	
		}
	});
});

$('#ajout_decaissement').live('click', function(){
	$('#myModal_decaissement').modal('show');
});
$('#form_decaissement').live('submit',function(){		 
   	
	$.ajax({
	type: "POST",
	url: "decaissement/ajout_decaissement.php",
	data: "date_decaissement="+$("#date_decaissement").val()+"&num_recu_decaissement="+$("#num_recu_decaissement").val()+"&num_dossier_decaissement="+$("#num_dossier_decaissement").val()+"&nom_client_decaissement="+$("#nom_client_decaissement").val()+"&montant_decaissement="+$("#montant_decaissement").val()+"&motif_decaissement="+$("#motif_decaissement").val(),
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
			 $('#myModal_decaissement').modal('toggle');
			 $("div.msg_erreur").hide(); 
			 $("#client_num").val('');
			 $("#date_depot_decaissement").val('');
			 $("#date_retrait_decaissement").val('');
			 $("#secur_traite_decaissement").val('');
			 //change_page_decaissement('0');
			 */
			 $(location).attr('href','decaissement.php');
			 /*
		}
		*/
	}
 });
	
 return false;
}); 

$('.detail_decaissement').live('click', function(){

	var id_ref = $(this).attr('data-id');
		$.ajax({
		type: "GET",
		url: "decaissement/recup_decaissement.php",
		data: "ref="+id_ref,
		success: function(msg){
			$(location).attr('href', 'vetement_decaissement.php');	
		}
	});
	
});

/**decaissement**/

$('#recher_date_debut').on('keyup',function(){
   
	var recher_date_debut=$("#recher_date_debut").val();
	var recher_date_fin=$("#recher_date_fin").val();
	var recher_num_recu=$("#recher_num_recu").val();
	var recher_num_dossier=$("#recher_num_dossier").val();

	var page_id=0;

    var dataString = 'page_id='+page_id+'&recher_date_debut='+recher_date_debut+'&recher_date_fin='+recher_date_fin+'&recher_num_recu='+recher_num_recu+'&recher_num_dossier='+recher_num_dossier;
	$.ajax({
			type: "POST",
			url: "decaissement/charge_decaissement.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').show();
				$(".aff_decaissement").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_decaissement").html(result).show();
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
			url: "decaissement/charge_decaissement.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').show();
				$(".aff_decaissement").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_decaissement").html(result).show();
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
			url: "decaissement/charge_decaissement.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').show();
				$(".aff_decaissement").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_decaissement").html(result).show();
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
			url: "decaissement/charge_decaissement.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').show();
				$(".aff_decaissement").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_decaissement").html(result).show();
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
			url: "decaissement/charge_decaissement.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').show();
				$(".aff_decaissement").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_decaissement").html(result).show();
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
			url: "decaissement/charge_decaissement.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').show();
				$(".aff_decaissement").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_decaissement").html(result).show();
			}
	 });
});

change_page_decaissement('0');
});

function change_page_decaissement(page_id){
	
	var recher_date_debut=$("#recher_date_debut").val();
	var recher_date_fin=$("#recher_date_fin").val();
	var recher_num_recu=$("#recher_num_recu").val();
	var recher_num_dossier=$("#recher_num_dossier").val();
 
	var page_id=0;

    var dataString = 'page_id='+page_id+'&recher_date_debut='+recher_date_debut+'&recher_date_fin='+recher_date_fin+'&recher_num_recu='+recher_num_recu+'&recher_num_dossier='+recher_num_dossier;
	$.ajax({
			type: "POST",
			url: "decaissement/charge_decaissement.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/giphy.gif" style="width:55px; height:55px;" />').show();
				$(".aff_decaissement").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/giphy.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_decaissement").html(result).show();
			}
	 });

}
