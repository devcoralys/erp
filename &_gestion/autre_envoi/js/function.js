$(document).ready(function(){ 

$("div.msg_erreur").hide(); 

$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').show();
$("div.voir").hide();
setTimeout(function() {
$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').hide();
$("div.voir").show();
}, 1500);

$('.button_annul').live('click',function(){
	$("div.msg_erreur").hide(); 
    $(".clo_er").hide(); 
	location.reload();
});

$(".button_annul").live('click', function(){
	$(location).attr('href', 'autre_envoi.php');
	//alert('Boutton d\'annulation enfonce');
});

$("#fermer").live('click', function(){
	$(location).attr('href', 'autre_envoi.php');
	//alert('Boutton d\'annulation enfonce');
});

$("#select_single").hide();

var glob_val_col;

$("#frais_compagnie").on('keyup', function(){
    
    var frais_compagnie=$("#frais_compagnie").val();
    
    if(frais_compagnie!=='' && frais_compagnie!==0){
    	$.ajax({
			type: "POST",
			url: "autre_envoi/update_frais_compagnie.php",
			data: 'frais_compagnie='+frais_compagnie,
			cache: false,
			success: function(result){
				//
			}
	 	});
    }
});

//$('.bloc_assurance').hide();


/*	
$("#payer_assurance").live('click', function(){
	if( $('input[name=payer_assurance]').is(':checked') )
	{
	    var pu = $('#pu_colis_autre_envoi').val();
        var qte = $('#poids_colis_autre_envoi').val();
        var emballage_colis_autre_envoi = $('#emballage_colis_autre_envoi').val();
        var valeur_colis_autre_envoi=parseInt(pu*qte)+parseInt(emballage_colis_autre_envoi);

	    $('.bloc_assurance').show();
	    $("#montant_assurance").val(0.35*valeur_colis_autre_envoi);
	    
	    $('#montant_total_a_payer').html(parseInt($("#montant_assurance").val())+parseInt(valeur_colis_autre_envoi)+' FCFA').show();
	}
	else
	{
	    var pu = $('#pu_colis_autre_envoi').val();
        var qte = $('#poids_colis_autre_envoi').val();
        var emballage_colis_autre_envoi = $('#emballage_colis_autre_envoi').val();
        var valeur_colis_autre_envoi=parseInt(pu*qte)+parseInt(emballage_colis_autre_envoi);
	    
	    $('.bloc_assurance').hide();
	    $("#montant_assurance").val(0);
	    
	    $('#montant_total_a_payer').html(parseInt($("#montant_assurance").val())+parseInt(valeur_colis_autre_envoi)+' FCFA').show();
	}
	
	alert($("#montant_assurance").val());
});
*/

/**colis_autre_envoi**/
$("#poids_colis_autre_envoi").on('keyup', function(){
	$('#prix_total_colis_autre_envoi').hide();
	var pu = $('#pu_colis_autre_envoi').val();
	var qte = $('#poids_colis_autre_envoi').val();
	var emballage_colis_autre_envoi = $('#emballage_colis_autre_envoi').val();
	$('#prix_total_colis_autre_envoi').html(parseInt(pu*qte)+parseInt(emballage_colis_autre_envoi)+' FCFA').show();
	
	var valeur_colis_autre_envoi=parseInt(pu*qte)+parseInt(emballage_colis_autre_envoi);

	$('#prix_total_colis_autre_envoi').html(parseInt(valeur_colis_autre_envoi)+' FCFA').show();
	
});

$("#pu_colis_autre_envoi").on('keyup', function(){
	$('#prix_total_colis_autre_envoi').hide();
	var pu = $('#pu_colis_autre_envoi').val();
	var qte = $('#poids_colis_autre_envoi').val();
	var emballage_colis_autre_envoi = $('#emballage_colis_autre_envoi').val();
	$('#prix_total_colis_autre_envoi').html(parseInt(pu*qte)+parseInt(emballage_colis_autre_envoi)+' FCFA').show();
	
	var valeur_colis_autre_envoi=parseInt(pu*qte)+parseInt(emballage_colis_autre_envoi);
	/*
	if( $('input[name=payer_assurance]').is(':checked') )
	{
	    $("#montant_assurance").val(0.35*valeur_colis_autre_envoi);
	}
	else
	{
	    $("#montant_assurance").val(0);
	}
	*/
	
	$('#prix_total_colis_autre_envoi').html(parseInt(valeur_colis_autre_envoi)+' FCFA').show();
	
});

$("#emballage_colis_autre_envoi").on('keyup', function(){
	$('#prix_total_colis_autre_envoi').hide();
	var pu = $('#pu_colis_autre_envoi').val();
	var qte = $('#poids_colis_autre_envoi').val();
	var emballage_colis_autre_envoi = $('#emballage_colis_autre_envoi').val();
	$('#prix_total_colis_autre_envoi').html(parseInt(pu*qte)+parseInt(emballage_colis_autre_envoi)+' FCFA').show();
	
	var valeur_colis_autre_envoi=parseInt(pu*qte)+parseInt(emballage_colis_autre_envoi);
	
	
	/*
	if( $('input[name=payer_assurance]').is(':checked') )
	{
	    $("#montant_assurance").val(0.35*valeur_colis_autre_envoi);
	}
	else
	{
	    $("#montant_assurance").val(0);
	}
	*/
	
	$('#prix_total_colis_autre_envoi').html(parseInt(valeur_colis_autre_envoi)+' FCFA').show();
	
});




$('#ajout_colis_autre_envoi').live('click', function(){
	$('#myModal_colis_autre_envoi').modal('show');
});
$('#envoie_colis_autre_envoi').live('click',function(){	

	var nbre_colis_autre_envoi=$("#nbre_colis_autre_envoi").val();
	var nbre_article=$("#nbre_article").val();
	var nature_colis_autre_envoi=$("#nature_colis_autre_envoi").val();
	var poids_colis_autre_envoi=$("#poids_colis_autre_envoi").val();
	var pu_colis_autre_envoi=$("#pu_colis_autre_envoi").val();
	var emballage_colis_autre_envoi=$("#emballage_colis_autre_envoi").val();
	var time_autre_envoi=$("#time_autre_envoi").val();
	//var montant_assurance=$("#montant_assurance").val();


	var dataString=
	"nbre_colis_autre_envoi="+nbre_colis_autre_envoi
	+"&nature_colis_autre_envoi="+nature_colis_autre_envoi
	+"&poids_colis_autre_envoi="+poids_colis_autre_envoi
	+"&pu_colis_autre_envoi="+pu_colis_autre_envoi
	+"&emballage_colis_autre_envoi="+emballage_colis_autre_envoi
	+"&time_autre_envoi="+time_autre_envoi
	;
	
	    if(nbre_colis_autre_envoi=='' || nbre_article=='' || nature_colis_autre_envoi=='' || poids_colis_autre_envoi=='' || pu_colis_autre_envoi=='' || emballage_colis_autre_envoi=='')
	  {   
		    $("div.msg_erreur").show();
		    $("div.msg_erreur").html("Tous les champs sont obligatoires !").show();
	   }
	   else
	   {
	    $("div.msg_erreur").hide();
      
   	
	//alert(dataString);

	$.ajax({
	type: "POST",
	url: "autre_envoi/ajout_colis_autre_envoi.php",
	data: "nbre_colis_autre_envoi="+nbre_colis_autre_envoi+"&nbre_article="+nbre_article+"&nature_colis_autre_envoi="+nature_colis_autre_envoi+"&poids_colis_autre_envoi="+poids_colis_autre_envoi+"&pu_colis_autre_envoi="+pu_colis_autre_envoi+"&emballage_colis_autre_envoi="+emballage_colis_autre_envoi+"&time_autre_envoi="+time_autre_envoi,//+"&montant_assurance="+montant_assurance,
	success: function(msg){
		
		if(msg==1)
		{
			$("div.msg_erreur").addClass("red"); 
			$("div.msg_erreur").removeClass("green");
			$("div.msg_erreur").html("Cette fiche d'expression de autre_envois existe d&eacute;j&agrave; !").show();
		}
		else
		{
			 $('#myModal_autre_envoi').modal('toggle');
			 $("div.msg_erreur").hide(); 
			 $("#nbre_colis_autre_envoi").val('');
			 $("#nbre_article").val('');
			 $("#nature_colis_autre_envoi").val('');
			 $("#poids_colis_autre_envoi").val('');
			 $("#pu_colis_autre_envoi").val('');
			 $("#emballage_colis_autre_envoi").val('');
			 $("#time_autre_envoi").val('');
			 //$("#montant_assurance").val('');
			 //change_page_autre_envoi('0');
			 location.reload();
		}
	}
     });
       }
	
 return false;
}); 
/*Fin colis_autre_envois */



$("#valeur_colis_autre_envoi").on('keyup', function(){
//	$('#prix_total_colis_autre_envoi').hide();
	var vc = $('#valeur_colis_autre_envoi').val();
	var prc = 0.35;
	var ma = vc*prc;
	
	$('#montant_assurance').val(parseInt(ma));
	
	$('#montant_aff_assurance').html(parseInt(ma));
	
	
	$.ajax({
	type: "GET",
	url: "autre_envoi/calcul_total.php",
	//data: "valeur_colis_autre_envoi="+valeur_colis_autre_envoi+"&montant_assurance="+montant_assurance,//+"&time_autre_envoi="+time_autre_envoi,//+"&montant_assurance="+montant_assurance,
    	success: function(valeur){
    		
    		$('#prix_final_colis_autre_envoi').html(valeur+' FCFA').show();
    		
    		$('#montant_total_a_payer').html(parseInt(valeur)+parseInt(ma)+' FCFA').show();
    		
    		//alert(valeur);
    	}
    });
    
});
    
    
$('#ajout_assurance').live('click', function(){
	$('#myModal_assurance').modal('show');
});
$('#envoie_assurance').live('click',function(){	

	var valeur_colis_autre_envoi=$("#valeur_colis_autre_envoi").val();
	var montant_assurance=$("#montant_assurance").val();
//	var time_autre_envoi=$("#time_autre_envoi").val();


	var dataString=
	"valeur_colis_autre_envoi="+valeur_colis_autre_envoi
	+"&montant_assurance="+montant_assurance
//	+"&time_autre_envoi="+time_autre_envoi
	;
   	
	//alert(dataString);

	$.ajax({
	type: "POST",
	url: "autre_envoi/ajout_assurance.php",
	data: "valeur_colis_autre_envoi="+valeur_colis_autre_envoi+"&montant_assurance="+montant_assurance,//+"&time_autre_envoi="+time_autre_envoi,//+"&montant_assurance="+montant_assurance,
	success: function(msg){
		
		if(msg==1)
		{
			$("div.msg_erreur").addClass("red"); 
			$("div.msg_erreur").removeClass("green");
			$("div.msg_erreur").html("Cette assurance existe d&eacute;j&agrave; !").show();
		}
		else
		{
			 $('#myModal_autre_envoi').modal('toggle');
			 $("div.msg_erreur").hide(); 
			 $("#valeur_colis_autre_envoi").val('');
			 $("#montant_assurance").val('');
			// $("#time_autre_envoi").val('');
			 //change_page_autre_envoi('0');
			 location.reload();
		}
	}
 });
	
 return false;
}); 
/*Fin assurance */

/**autre_envoi**/

$(".div_dern_delai").hide();

$('input[name=immediat]').live('change', function(){
	if( $('input[name=immediat]').is(':checked') ){
		$(".div_dern_delai").show();
	} else {
		$(".div_dern_delai").hide();
	}
});

//Création
$('#ajout_autre_envoi').live('click', function(){
	$('#myModal_autre_envoi').modal('show');
});
$('#envoie_autre_envoi').live('click',function(){	

	var date_autre_envoi=$("#date_autre_envoi").val();
	//var code_colis_autre_envoi_autre_envoi=$("#code_colis_autre_envoi_autre_envoi").val();
	var expediteur_autre_envoi=$("#expediteur_autre_envoi").val();
	var num_cni_expediteur_autre_envoi=$("#num_cni_expediteur_autre_envoi").val();
	var tel_expediteur_autre_envoi=$("#tel_expediteur_autre_envoi").val();
	var destinataire_autre_envoi=$("#destinataire_autre_envoi").val();
	var destination_autre_envoi=$("#destination_autre_envoi").val();
	var tel_destinataire_autre_envoi=$("#tel_destinataire_autre_envoi").val();
	var adresse_recuperation_autre_envoi=$("#adresse_recuperation_autre_envoi").val();
	var nom_recuperateur=$("#nom_recuperateur").val();
	var tel_recuperateur=$("#tel_recuperateur").val();
	var mode_envoi=$("#mode_envoi").val();

	var dataString=
	"date_autre_envoi="+date_autre_envoi
	//+"&code_colis_autre_envoi_autre_envoi="+code_colis_autre_envoi_autre_envoi
	+"&expediteur_autre_envoi="+expediteur_autre_envoi
	+"&num_cni_expediteur_autre_envoi="+num_cni_expediteur_autre_envoi
	+"&tel_expediteur_autre_envoi="+tel_expediteur_autre_envoi
	+"&destinataire_autre_envoi="+destinataire_autre_envoi
	+"&destination_autre_envoi="+destination_autre_envoi
	+"&tel_destinataire_autre_envoi="+tel_destinataire_autre_envoi
	+"&adresse_recuperation_autre_envoi="+adresse_recuperation_autre_envoi
	+"&nom_recuperateur="+nom_recuperateur
	+"&tel_recuperateur="+tel_recuperateur
	+"&mode_envoi="+mode_envoi
	;
   	
	//alert(dataString);
	
	if(mode_envoi=='')
	  {   
		    $("div.msg_erreur").show();
		    $("div.msg_erreur").html("Le mode d'envoi est obligatoire !").show();
	   }
	   else if(num_cni_expediteur_autre_envoi=='')
	   {
	       $("div.msg_erreur").show();
		    $("div.msg_erreur").html("Le num&eacute;ro de pi&egrave;ce est obligatoire !").show();
	   }
	   else if(adresse_recuperation_autre_envoi=='')
	   {
	       $("div.msg_erreur").show();
		    $("div.msg_erreur").html("Ladresse de recuperation est obligatoire !").show();
	   }
	   else if(nom_recuperateur=='')
	   {
	       $("div.msg_erreur").show();
		    $("div.msg_erreur").html("Le nom du recuperateur est obligatoire !").show();
	   }
	   else if(tel_recuperateur=='')
	   {
	       $("div.msg_erreur").show();
		    $("div.msg_erreur").html("Le num&eacute;ro de telephone est obligatoire !").show();
	   }
	   else
	   {
	    $("div.msg_erreur").hide();

	$.ajax({
	type: "POST",
	url: "autre_envoi/ajout_autre_envoi.php",
	data: "date_autre_envoi="+date_autre_envoi/*+"&code_colis_autre_envoi_autre_envoi="+code_colis_autre_envoi_autre_envoi*/+"&expediteur_autre_envoi="+expediteur_autre_envoi+"&num_cni_expediteur_autre_envoi="+num_cni_expediteur_autre_envoi+"&tel_expediteur_autre_envoi="+tel_expediteur_autre_envoi+"&destinataire_autre_envoi="+destinataire_autre_envoi+"&destination_autre_envoi="+destination_autre_envoi+"&tel_destinataire_autre_envoi="+tel_destinataire_autre_envoi+"&adresse_recuperation_autre_envoi="+adresse_recuperation_autre_envoi+"&nom_recuperateur="+nom_recuperateur+"&tel_recuperateur="+tel_recuperateur+"&mode_envoi="+mode_envoi,
	success: function(msg){
		
		if(msg==1)
		{
	 $("div.msg_erreur").addClass("red"); 
	 $("div.msg_erreur").removeClass("green");
	$("div.msg_erreur").html("Cette fiche d'expression de autre_envois existe d&eacute;j&agrave; !").show();
		}
		else
		{
			 $('#myModal_autre_envoi').modal('toggle');
			 $("div.msg_erreur").hide(); 
			 $("#date_autre_envoi").val('');
			// $("#code_colis_autre_envoi_autre_envoi").val('');
			 $("#expediteur_autre_envoi").val('');
			 $("#num_cni_expediteur_autre_envoi").val('');
			 $("#tel_expediteur_autre_envoi").val('');
			 $("#code_colis_autre_envoi_autre_envoi").val('');
			 $("#destinataire_autre_envoi").val('');
			 $("#destination_autre_envoi").val('');
			 $("#tel_destinataire_autre_envoi").val('');
			 $("#adresse_recuperation_autre_envoi").val('');
			 $("#nom_recuperateur").val('');
			 $("#tel_recuperateur").val('');
			 $("#mode_envoi").val('');
			 //change_page_autre_envoi('0');
			 $(location).attr('href','autre_envoi.php');
		}
	}
 });
	   }
	
 return false;
}); 

//Modification
$(".edit_colis_autre_envoi").live('click', function() {
var id_ref = $(this).attr('data-id');

	$.ajax({
		type: "GET",
		url: "autre_envoi/form_modifier_colis_autre_envoi.php",
		data: "ref="+id_ref,
		success: function(msg){
			$("#affiche_colis_autre_envoi_mod").html(msg);
			$("#myModal_colis_autre_envoi_mod").modal('show');	
		}
	});

});
$('#form_colis_autre_envoi_mod').live('submit',function(){	

	$.ajax({
		type: "POST",
		url: "modif_colis_autre_envoi.php",
		data: "qte_colis_autre_envoi_mod="+$("#qte_colis_autre_envoi_mod").val()+"&designation_colis_autre_envoi_mod="+$("#designation_colis_autre_envoi_mod").val()+"&prix_colis_autre_envoi_mod="+$("#prix_colis_autre_envoi_mod").val(),
		success: function(msg){
			$(location).attr('href','detail_autre_envoi.php');
		}
	});
	return false;
});


$('.detail_autre_envoi').live('click', function(){

	var id_ref = $(this).attr('data-id');
		$.ajax({
		type: "GET",
		url: "autre_envoi/recup_autre_envoi.php",
		data: "ref="+id_ref,
		success: function(msg){
			$(location).reload();	
		}
	});
	
});

$("#terminer").live('click', function(){
	$("#myModal_terminer").modal('show');
});
$("#submit_terminer").live('click', function() {	
		$.ajax({
			type: "GET",
			url: "autre_envoi/terminer_autre_envoi.php",
			success: function(msg){
				location.reload();
			}
		});
});

//Validation

/**autre_envoi**/

/*Sup colis_autre_envoi */
$(".button_annul").live('click', function(){
	$('#myModal_colis_autre_envoi_sup').modal('toggle');
});
$(".delete_colis_autre_envoi").live('click', function() {
	var id_ref = $(this).attr('data-id');
		$.ajax({
		type: "GET",
		url: "autre_envoi/form_supprimer_colis_autre_envoi.php",
		data: "ref="+id_ref,
			success: function(msg){
				$("#affiche_colis_autre_envoi_sup").html(msg);
				$("#myModal_colis_autre_envoi_sup").modal('show');	
			}
		});
	});
	
	$('#submit_colis_autre_envoi_sup').live('click',function(){
		$(".aff_colis_autre_envoi").hide();				  
	$.ajax({
		type: "POST",
		url: "autre_envoi/sup_colis_autre_envoi.php",
		success: function(msg){
			
			$('#myModal_colis_autre_envoi_sup').modal('toggle');
			$("div.msg_erreur").hide(); 
			$(".clo_er").hide(); 
			//change_page_colis_autre_envoi('0');
			$(location).attr('href','autre_envoi.php');
			//$(".aff_colis_autre_envoi").html('Suppression effectu&eacute;e avec succ&egrave;s veuillez actualiser la page SVP !').show();
		}
	 });
	 return false;
	}); 


$('#recher_date_debut').on('keyup',function(){
   
	var recher_date_debut=$("#recher_date_debut").val();
	var recher_date_fin=$("#recher_date_fin").val();
	var recher_expediteur=$("#recher_expediteur").val();
	var recher_num_cni=$("#recher_num_cni").val();
	var recher_code_colis_autre_envoi=$("#recher_code_colis_autre_envoi").val();
	var recher_destinataire=$("#recher_destinataire").val();
	var recher_destination=$("#recher_destination").val();
 
	var page_id=0;

    var dataString = 'page_id='+page_id+'&recher_date_debut='+recher_date_debut+'&recher_date_fin='+recher_date_fin+'&recher_expediteur='+recher_expediteur+'&recher_num_cni_='+recher_num_cni+'&recher_code_colis_autre_envoi='+recher_code_colis_autre_envoi+'&recher_destinataire='+recher_destinataire+'&recher_destination='+recher_destination;
	$.ajax({
			type: "POST",
			url: "autre_envoi/charge_autre_envoi.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').show();
				$(".aff_autre_envoi").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_autre_envoi").html(result).show();
			}
	 });
});
$('#recher_date_fin').on('keyup',function(){
   
	var recher_date_debut=$("#recher_date_debut").val();
	var recher_date_fin=$("#recher_date_fin").val();
	var recher_expediteur=$("#recher_expediteur").val();
	var recher_num_cni=$("#recher_num_cni").val();
	var recher_code_colis_autre_envoi=$("#recher_code_colis_autre_envoi").val();
	var recher_destinataire=$("#recher_destinataire").val();
	var recher_destination=$("#recher_destination").val();
 
	var page_id=0;

    var dataString = 'page_id='+page_id+'&recher_date_debut='+recher_date_debut+'&recher_date_fin='+recher_date_fin+'&recher_expediteur='+recher_expediteur+'&recher_num_cni_='+recher_num_cni+'&recher_code_colis_autre_envoi='+recher_code_colis_autre_envoi+'&recher_destinataire='+recher_destinataire+'&recher_destination='+recher_destination;
	$.ajax({
			type: "POST",
			url: "autre_envoi/charge_autre_envoi.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').show();
				$(".aff_autre_envoi").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_autre_envoi").html(result).show();
			}
	 });
});
$('#recher_date_debut').on('change',function(){
   
	var recher_date_debut=$("#recher_date_debut").val();
	var recher_date_fin=$("#recher_date_fin").val();
	var recher_expediteur=$("#recher_expediteur").val();
	var recher_num_cni=$("#recher_num_cni").val();
	var recher_code_colis_autre_envoi=$("#recher_code_colis_autre_envoi").val();
	var recher_destinataire=$("#recher_destinataire").val();
	var recher_destination=$("#recher_destination").val();
 
	var page_id=0;

    var dataString = 'page_id='+page_id+'&recher_date_debut='+recher_date_debut+'&recher_date_fin='+recher_date_fin+'&recher_expediteur='+recher_expediteur+'&recher_num_cni_='+recher_num_cni+'&recher_code_colis_autre_envoi='+recher_code_colis_autre_envoi+'&recher_destinataire='+recher_destinataire+'&recher_destination='+recher_destination;
	$.ajax({
			type: "POST",
			url: "autre_envoi/charge_autre_envoi.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').show();
				$(".aff_autre_envoi").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_autre_envoi").html(result).show();
			}
	 });
});
$('#recher_date_fin').on('change',function(){
   
	var recher_date_debut=$("#recher_date_debut").val();
	var recher_date_fin=$("#recher_date_fin").val();
	var recher_expediteur=$("#recher_expediteur").val();
	var recher_num_cni=$("#recher_num_cni").val();
	var recher_code_colis_autre_envoi=$("#recher_code_colis_autre_envoi").val();
	var recher_destinataire=$("#recher_destinataire").val();
	var recher_destination=$("#recher_destination").val();
 
	var page_id=0;

    var dataString = 'page_id='+page_id+'&recher_date_debut='+recher_date_debut+'&recher_date_fin='+recher_date_fin+'&recher_expediteur='+recher_expediteur+'&recher_num_cni_='+recher_num_cni+'&recher_code_colis_autre_envoi='+recher_code_colis_autre_envoi+'&recher_destinataire='+recher_destinataire+'&recher_destination='+recher_destination;
	$.ajax({
			type: "POST",
			url: "autre_envoi/charge_autre_envoi.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').show();
				$(".aff_autre_envoi").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_autre_envoi").html(result).show();
			}
	 });
});
$('#recher_expediteur').on('keyup',function(){
   
	var recher_date_debut=$("#recher_date_debut").val();
	var recher_date_fin=$("#recher_date_fin").val();
	var recher_expediteur=$("#recher_expediteur").val();
	var recher_num_cni=$("#recher_num_cni").val();
	var recher_code_colis_autre_envoi=$("#recher_code_colis_autre_envoi").val();
	var recher_destinataire=$("#recher_destinataire").val();
	var recher_destination=$("#recher_destination").val();
 
	var page_id=0;

    var dataString = 'page_id='+page_id+'&recher_date_debut='+recher_date_debut+'&recher_date_fin='+recher_date_fin+'&recher_expediteur='+recher_expediteur+'&recher_num_cni_='+recher_num_cni+'&recher_code_colis_autre_envoi='+recher_code_colis_autre_envoi+'&recher_destinataire='+recher_destinataire+'&recher_destination='+recher_destination;
	$.ajax({
			type: "POST",
			url: "autre_envoi/charge_autre_envoi.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').show();
				$(".aff_autre_envoi").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_autre_envoi").html(result).show();
			}
	 });
});
$('#recher_num_cni').on('keyup',function(){
   
	var recher_date_debut=$("#recher_date_debut").val();
	var recher_date_fin=$("#recher_date_fin").val();
	var recher_expediteur=$("#recher_expediteur").val();
	var recher_num_cni=$("#recher_num_cni").val();
	var recher_code_colis_autre_envoi=$("#recher_code_colis_autre_envoi").val();
	var recher_destinataire=$("#recher_destinataire").val();
	var recher_destination=$("#recher_destination").val();
 
	var page_id=0;

    var dataString = 'page_id='+page_id+'&recher_date_debut='+recher_date_debut+'&recher_date_fin='+recher_date_fin+'&recher_expediteur='+recher_expediteur+'&recher_num_cni_='+recher_num_cni+'&recher_code_colis_autre_envoi='+recher_code_colis_autre_envoi+'&recher_destinataire='+recher_destinataire+'&recher_destination='+recher_destination;
	$.ajax({
			type: "POST",
			url: "autre_envoi/charge_autre_envoi.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').show();
				$(".aff_autre_envoi").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_autre_envoi").html(result).show();
			}
	 });
});
$('#recher_code_colis_autre_envoi').on('keyup',function(){
   
	var recher_date_debut=$("#recher_date_debut").val();
	var recher_date_fin=$("#recher_date_fin").val();
	var recher_expediteur=$("#recher_expediteur").val();
	var recher_num_cni=$("#recher_num_cni").val();
	var recher_code_colis_autre_envoi=$("#recher_code_colis_autre_envoi").val();
	var recher_destinataire=$("#recher_destinataire").val();
	var recher_destination=$("#recher_destination").val();
 
	var page_id=0;

    var dataString = 'page_id='+page_id+'&recher_date_debut='+recher_date_debut+'&recher_date_fin='+recher_date_fin+'&recher_expediteur='+recher_expediteur+'&recher_num_cni_='+recher_num_cni+'&recher_code_colis_autre_envoi='+recher_code_colis_autre_envoi+'&recher_destinataire='+recher_destinataire+'&recher_destination='+recher_destination;
	$.ajax({
			type: "POST",
			url: "autre_envoi/charge_autre_envoi.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').show();
				$(".aff_autre_envoi").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_autre_envoi").html(result).show();
			}
	 });
});
$('#recher_destinataire').on('keyup',function(){
   
	var recher_date_debut=$("#recher_date_debut").val();
	var recher_date_fin=$("#recher_date_fin").val();
	var recher_expediteur=$("#recher_expediteur").val();
	var recher_num_cni=$("#recher_num_cni").val();
	var recher_code_colis_autre_envoi=$("#recher_code_colis_autre_envoi").val();
	var recher_destinataire=$("#recher_destinataire").val();
	var recher_destination=$("#recher_destination").val();
 
	var page_id=0;

    var dataString = 'page_id='+page_id+'&recher_date_debut='+recher_date_debut+'&recher_date_fin='+recher_date_fin+'&recher_expediteur='+recher_expediteur+'&recher_num_cni_='+recher_num_cni+'&recher_code_colis_autre_envoi='+recher_code_colis_autre_envoi+'&recher_destinataire='+recher_destinataire+'&recher_destination='+recher_destination;
	$.ajax({
			type: "POST",
			url: "autre_envoi/charge_autre_envoi.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').show();
				$(".aff_autre_envoi").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_autre_envoi").html(result).show();
			}
	 });
});
$('#recher_destination').on('keyup',function(){
   
	var recher_date_debut=$("#recher_date_debut").val();
	var recher_date_fin=$("#recher_date_fin").val();
	var recher_expediteur=$("#recher_expediteur").val();
	var recher_num_cni=$("#recher_num_cni").val();
	var recher_code_colis_autre_envoi=$("#recher_code_colis_autre_envoi").val();
	var recher_destinataire=$("#recher_destinataire").val();
	var recher_destination=$("#recher_destination").val();
 
	var page_id=0;

    var dataString = 'page_id='+page_id+'&recher_date_debut='+recher_date_debut+'&recher_date_fin='+recher_date_fin+'&recher_expediteur='+recher_expediteur+'&recher_num_cni_='+recher_num_cni+'&recher_code_colis_autre_envoi='+recher_code_colis_autre_envoi+'&recher_destinataire='+recher_destinataire+'&recher_destination='+recher_destination;
	$.ajax({
			type: "POST",
			url: "autre_envoi/charge_autre_envoi.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').show();
				$(".aff_autre_envoi").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_autre_envoi").html(result).show();
			}
	 });
});


change_page_autre_envoi('0');
change_page_colis_autre_envoi('0');
});


function change_page_autre_envoi(page_id){
	
	var recher_date_debut=$("#recher_date_debut").val();
	var recher_date_fin=$("#recher_date_fin").val();
	var recher_expediteur=$("#recher_expediteur").val();
	var recher_num_cni=$("#recher_num_cni").val();
	var recher_code_colis_autre_envoi=$("#recher_code_colis_autre_envoi").val();
	var recher_destinataire=$("#recher_destinataire").val();
	var recher_destination=$("#recher_destination").val();
 
	var page_id=0;

    var dataString = 'page_id='+page_id+'&recher_date_debut='+recher_date_debut+'&recher_date_fin='+recher_date_fin+'&recher_expediteur='+recher_expediteur+'&recher_num_cni_='+recher_num_cni+'&recher_code_colis_autre_envoi='+recher_code_colis_autre_envoi+'&recher_destinataire='+recher_destinataire+'&recher_destination='+recher_destination;
	$.ajax({
			type: "POST",
			url: "autre_envoi/charge_autre_envoi.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').show();
				$(".aff_autre_envoi").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_autre_envoi").html(result).show();
			}
	 });

}

function change_page_colis_autre_envoi(page_id_cons){
	
	var page_id_cons=0;

	var dataString = 'page_id_cons='+ page_id_cons;
	$.ajax({
			type: "POST",
			url: "autre_envoi/charge_colis_autre_envoi.php",
			data: dataString,
			cache: false,
			
			beforeSend: function(result){

				setTimeout(function() {
					$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').show();
					$(".aff_colis_autre_envoi").show();
				}, 1000);

			},
			
			success: function(result){
				
				setTimeout(function() {
					$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').hide();
					$(".aff_colis_autre_envoi").html(result).show();
				}, 1000);
			}
	 });

}

