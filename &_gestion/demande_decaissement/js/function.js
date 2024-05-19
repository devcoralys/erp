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
	$(location).attr('href', 'demande_decaissement.php');
	//alert('Boutton d\'annulation enfonce');
});

$(".import, .export, .autre_envoi, .groupage, .charge_fournisseur").hide();



$("#affectation").live('change', function(){
	
	if($("#affectation").val()=='import'){
		$(".import").show();
		$(".export, .autre_envoi, .groupage, .charge_fournisseur").hide();
		// $(".export, .autre_envoi, .groupage, .charge_fournisseur").removeAttribute('required');
		// $("#num_dossier_import").setAttribute('required', 'required');
	}

	if($("#affectation").val()=='export'){
		$(".export").show();
		$(".import, .autre_envoi, .groupage, .charge_fournisseur").hide();
		// $(".import, .autre_envoi, .groupage, .charge_fournisseur").removeAttribute('required');
		// $("#num_dossier_export").setAttribute('required', 'required');
	}

	if($("#affectation").val()=='groupage'){
		$(".groupage").show();
		$(".import, .export, .autre_envoi, .charge_fournisseur").hide();
		// $(".import, .export, .autre_envoi, .charge_fournisseur").removeAttribute('required');
		$("#num_groupage").setAttribute('required', 'required');
	}

	if($("#affectation").val()=='autre_envoi'){
		$(".autre_envoi").show();
		$(".import, .export, .groupage , .charge_fournisseur").hide();
		// $(".import, .export, .groupage , .charge_fournisseur").removeAttribute('required');
		// $("#num_autre_envoi").setAttribute('required', 'required');
	}

	if($("#affectation").val()=='charge_fournisseur'){
		$(".charge_fournisseur").show();
		$(".import, .export, .groupage, .autre_envoi").hide();
		// $(".import, .export, .groupage, .autre_envoi").removeAttribute('required');
		// $("#code_fournisseur").setAttribute('required', 'required');
	}

});

/**demande_decaissement**/
$('#select_besoin_id').on('change', function(){
	var id_ref = $('#select_besoin_id').val();

	$.ajax({
		type: "GET",
		url: "caisse/calcul_total.php",
		data: "ref="+id_ref,
		success: function(msg){
			$("#montant_demande_decaissement").val(msg);	
		}
	});
});

$('#ajout_demande_decaissement').live('click', function(){
	$('#myModal_demande_decaissement').modal('show');
});
$('#form_demande_decaissement').live('submit',function(){		 
   	
	$.ajax({
	type: "POST",
	url: "demande_decaissement/ajout_demande_decaissement.php",
	data: 
	"date_demande_decaissement="+$("#date_demande_decaissement").val()
	+"&num_recu_demande_decaissement="+$("#num_recu_demande_decaissement").val()
	+"&num_dossier_demande_decaissement="+$("#num_dossier_demande_decaissement").val()
	+"&nom_client_demande_decaissement="+$("#nom_client_demande_decaissement").val()
	+"&montant_demande_decaissement="+$("#montant_demande_decaissement").val()
	+"&motif_demande_decaissement="+$("#motif_demande_decaissement").val()
	+"&mode_reglement="+$("#mode_reglement").val()
	+"&affectation="+$("#affectation").val()
	+"&num_dossier_import="+$("#num_dossier_import").val()
	+"&num_dossier_export="+$("#num_dossier_export").val()
	+"&num_groupage="+$("#num_groupage").val()
	+"&num_autre_envoi="+$("#num_autre_envoi").val()
	+"&code_fournisseur="+$("#code_fournisseur").val()
	,
	success: function(msg){

		// alert(	"date_demande_decaissement="+$("#date_demande_decaissement").val()
		// +"&num_recu_demande_decaissement="+$("#num_recu_demande_decaissement").val()
		// +"&num_dossier_demande_decaissement="+$("#num_dossier_demande_decaissement").val()
		// +"&nom_client_demande_decaissement="+$("#nom_client_demande_decaissement").val()
		// +"&montant_demande_decaissement="+$("#montant_demande_decaissement").val()
		// +"&motif_demande_decaissement="+$("#motif_demande_decaissement").val()
		// +"&mode_reglement="+$("#mode_reglement").val()
		// +"&affectation="+$("#affectation").val()
		// +"&num_dossier_import="+$("#num_dossier_import").val()
		// +"&num_dossier_export="+$("#num_dossier_export").val()
		// +"&num_groupage="+$("#num_groupage").val()
		// +"&num_autre_envoi="+$("#num_autre_envoi").val()
		// +"&code_fournisseur="+$("#code_fournisseur").val());

			 $(location).attr('href','demande_decaissement.php');
	}
	
 });
	
 return false;
}); 

$('.detail_demande_decaissement').live('click', function(){

	var id_ref = $(this).attr('data-id');
		$.ajax({
		type: "GET",
		url: "demande_decaissement/recup_demande_decaissement.php",
		data: "ref="+id_ref,
		success: function(msg){
			$(location).attr('href', 'vetement_demande_decaissement.php');	
		}
	});
	
});

/**demande_decaissement**/

$('#recher_date_debut').on('keyup',function(){
   
	var recher_date_debut=$("#recher_date_debut").val();
	var recher_date_fin=$("#recher_date_fin").val();
	var recher_etat=$("#recher_etat").val();

	var page_id=0;

    var dataString = 'page_id='+page_id+'&recher_date_debut='+recher_date_debut+'&recher_date_fin='+recher_date_fin+'&recher_etat='+recher_etat;
	$.ajax({
			type: "POST",
			url: "demande_decaissement/charge_demande_decaissement.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').show();
				$(".aff_demande_decaissement").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_demande_decaissement").html(result).show();
			}
	 });
});
$('#recher_date_fin').on('keyup',function(){
   
	var recher_date_debut=$("#recher_date_debut").val();
	var recher_date_fin=$("#recher_date_fin").val();
	var recher_etat=$("#recher_etat").val();

	var page_id=0;

    var dataString = 'page_id='+page_id+'&recher_date_debut='+recher_date_debut+'&recher_date_fin='+recher_date_fin+'&recher_etat='+recher_etat;
	$.ajax({
			type: "POST",
			url: "demande_decaissement/charge_demande_decaissement.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').show();
				$(".aff_demande_decaissement").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_demande_decaissement").html(result).show();
			}
	 });
});
$('#recher_date_debut').on('change',function(){
   
	var recher_date_debut=$("#recher_date_debut").val();
	var recher_date_fin=$("#recher_date_fin").val();
	var recher_etat=$("#recher_etat").val();

	var page_id=0;

    var dataString = 'page_id='+page_id+'&recher_date_debut='+recher_date_debut+'&recher_date_fin='+recher_date_fin+'&recher_etat='+recher_etat;
	$.ajax({
			type: "POST",
			url: "demande_decaissement/charge_demande_decaissement.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').show();
				$(".aff_demande_decaissement").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_demande_decaissement").html(result).show();
			}
	 });
});
$('#recher_date_fin').on('change',function(){
   
	var recher_date_debut=$("#recher_date_debut").val();
	var recher_date_fin=$("#recher_date_fin").val();
	var recher_etat=$("#recher_etat").val();

	var page_id=0;

    var dataString = 'page_id='+page_id+'&recher_date_debut='+recher_date_debut+'&recher_date_fin='+recher_date_fin+'&recher_etat='+recher_etat;
	$.ajax({
			type: "POST",
			url: "demande_decaissement/charge_demande_decaissement.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').show();
				$(".aff_demande_decaissement").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_demande_decaissement").html(result).show();
			}
	 });
});
$('#recher_etat').on('change',function(){
   
	var recher_date_debut=$("#recher_date_debut").val();
	var recher_date_fin=$("#recher_date_fin").val();
	var recher_etat=$("#recher_etat").val();

	var page_id=0;

    var dataString = 'page_id='+page_id+'&recher_date_debut='+recher_date_debut+'&recher_date_fin='+recher_date_fin+'&recher_etat='+recher_etat;
	$.ajax({
			type: "POST",
			url: "demande_decaissement/charge_demande_decaissement.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').show();
				$(".aff_demande_decaissement").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_demande_decaissement").html(result).show();
			}
	 });
});


change_page_demande_decaissement('0');
});

function change_page_demande_decaissement(page_id){
	
	var recher_date_debut=$("#recher_date_debut").val();
	var recher_date_fin=$("#recher_date_fin").val();
	var recher_etat=$("#recher_etat").val();

	var page_id=0;

    var dataString = 'page_id='+page_id+'&recher_date_debut='+recher_date_debut+'&recher_date_fin='+recher_date_fin+'&recher_etat='+recher_etat;
    
	$.ajax({
			type: "POST",
			url: "demande_decaissement/charge_demande_decaissement.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/giphy.gif" style="width:55px; height:55px;" />').show();
				$(".aff_demande_decaissement").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/giphy.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_demande_decaissement").html(result).show();
			}
	 });

}
