$(document).ready(function(){ 

$("div.msg_erreur").hide(); 

$("div.chargement").html('<img src="../../img/giphy.gif" style="width:55px; height:55px;" />').show();
$("div.voir").hide();
setTimeout(function() {
$("div.chargement").html('<img src="../../img/giphy.gif" style="width:55px; height:55px;" />').hide();
$("div.voir").show();
}, 1500);

$("#annul").live('click', function(){
	$(location).attr('href', 'rapport.php');
	//alert('Boutton d\'annulation enfonce');
});

//$('input[name=immediat]').is(':checked')
/*
$("#observation_rapport").on('keyup',function(){
    alert($("#observation_rapport").val());
});
*/
$('#send_report_autre').live('click',function(){
    
	var observation_rapport=$("#observation_rapport").val();
	var date_rapport=$("#date_rapport").val();
	
	/*
	alert(
	    	"observation_rapport="+observation_rapport
	    	+"&date_rapport="+date_rapport
	
	    );
	*/
    
   
   	
	$.ajax({
	type: "POST",
	url: "rapport/ajout_rapport_autre.php",
	data: 

	"observation_rapport="+observation_rapport
	+"&date_rapport="+date_rapport
	,
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
			 $('#myModal_rapport').modal('toggle');
			 $("div.msg_erreur").hide(); 
			 $("#client_num").val('');
			 $("#date_depot_rapport").val('');
			 $("#date_retrait_rapport").val('');
			 $("#secur_traite_rapport").val('');
			 //change_page_rapport('0');
			 */
			 $(location).attr('href','rapport.php');
			 /*
		}
		*/
	}
 });
	
 return false;
}); 

$('#ajout_declaration').live('click', function(){
	$('#myModal_declaration').modal('show');
});
$('#send_report').live('click',function(){
    
    var date_rapport=$("#date_rapport").val();
	var num_dossier_rapport=$("#num_dossier_rapport").val();
	var nom_client_rapport=$("#nom_client_rapport").val();
	var montant_cotation_rapport=$("#montant_cotation_rapport").val();
	var montant_decaisse_rapport=$("#montant_decaisse_rapport").val();
	var montant_restant_rapport=$("#montant_restant_rapport").val();
	var num_declaration_rapport=$("#num_declaration_rapport").val();
	var date_declaration_rapport=$("#date_declaration_rapport").val();
	var avancement_dossier_rapport=$("#avancement_dossier_rapport").val();
	var date_livraison_rapport=$("#date_livraison_rapport").val();
	var benefice_rapport=$("#benefice_rapport").val();
	
	var statut_dossier_rapport="";
	var statut_facture_rapport="";
	
	if($('input[name=statut_dossier_rapport]').is(':checked'))
	{
	  statut_dossier_rapport='oui';
	}
	else
	{
	  statut_dossier_rapport='non';
	}
	
	if($('input[name=statut_facture_rapport]').is(':checked'))
	{
	  statut_facture_rapport='oui';
	}
	else
	{
	  statut_facture_rapport='non';
	}

	var date_transmission_facture_rapport=$("#date_transmission_facture_rapport").val();
	var date_cloture_dossier_rapport=$("#date_cloture_dossier_rapport").val();
	var observation_rapport=$("#observation_rapport").val();
	
	
	alert(
	    	"date_rapport="+date_rapport+
	"&num_dossier_rapport="+num_dossier_rapport+
	"&nom_client_rapport="+nom_client_rapport+
	"&montant_cotation_rapport="+montant_cotation_rapport+
	"&montant_decaisse_rapport="+montant_decaisse_rapport+
	"&montant_restant_rapport="+montant_restant_rapport+
	"&num_declaration_rapport="+num_declaration_rapport+
	"&date_declaration_rapport="+date_declaration_rapport+
	"&avancement_dossier_rapport="+avancement_dossier_rapport+
	"&date_livraison_rapport="+date_livraison_rapport+
	"&benefice_rapport="+benefice_rapport+
	"&statut_dossier_rapport="+statut_dossier_rapport+
	"&statut_facture_rapport="+statut_facture_rapport+
	"&date_transmission_facture_rapport="+date_transmission_facture_rapport+
	"&date_cloture_dossier_rapport="+date_cloture_dossier_rapport+
	"&observation_rapport="+observation_rapport
	
	    );
	
    
   
   	
	$.ajax({
	type: "POST",
	url: "rapport/ajout_rapport.php",
	data: 
 
	"date_rapport="+date_rapport+
	"&num_dossier_rapport="+num_dossier_rapport+
	"&nom_client_rapport="+nom_client_rapport+
	"&montant_cotation_rapport="+montant_cotation_rapport+
	"&montant_decaisse_rapport="+montant_decaisse_rapport+
	"&montant_restant_rapport="+montant_restant_rapport+
	"&num_declaration_rapport="+num_declaration_rapport+
	"&date_declaration_rapport="+date_declaration_rapport+
	"&avancement_dossier_rapport="+avancement_dossier_rapport+
	"&date_livraison_rapport="+date_livraison_rapport+
	"&benefice_rapport="+benefice_rapport+
	"&statut_dossier_rapport="+statut_dossier_rapport+
	"&statut_facture_rapport="+statut_facture_rapport+
	"&date_transmission_facture_rapport="+date_transmission_facture_rapport+
	"&date_cloture_dossier_rapport="+date_cloture_dossier_rapport+
	"&observation_rapport="+observation_rapport
	,
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
			 $('#myModal_rapport').modal('toggle');
			 $("div.msg_erreur").hide(); 
			 $("#client_num").val('');
			 $("#date_depot_rapport").val('');
			 $("#date_retrait_rapport").val('');
			 $("#secur_traite_rapport").val('');
			 //change_page_rapport('0');
			 */
			 $(location).attr('href','rapport.php');
			 /*
		}
		*/
	}
 });
	
 return false;
}); 


/**rapport**/

change_page_rapport('0');
});

function change_page_rapport(page_id_cons){
	
	var page_id_cons=0;

	var dataString = 'page_id_cons='+ page_id_cons;
	$.ajax({
			type: "POST",
			url: "rapport/charge_rapport.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/giphy.gif" style="width:55px; height:55px;" />').show();
				$(".aff_rapport").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/giphy.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_rapport").html(result).show();
			}
	 });

}
