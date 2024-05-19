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
	$(location).attr('href', 'autre_envoi_france.php');
	//alert('Boutton d\'annulation enfonce');
});

$("#fermer").live('click', function(){
	$(location).attr('href', 'autre_envoi_france.php');
	//alert('Boutton d\'annulation enfonce');
});

$("#select_single").hide();

var glob_val_col;

$("#frais_compagnie").on('keyup', function(){
    
    var frais_compagnie=$("#frais_compagnie").val();
    
    if(frais_compagnie!=='' && frais_compagnie!==0){
    	$.ajax({
			type: "POST",
			url: "autre_envoi_france/update_frais_compagnie.php",
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
	    var pu = $('#pu_colis_autre_envoi_france').val();
        var qte = $('#poids_colis_autre_envoi_france').val();
        var emballage_colis_autre_envoi_france = $('#emballage_colis_autre_envoi_france').val();
        var valeur_colis_autre_envoi_france=parseInt(pu*qte)+parseInt(emballage_colis_autre_envoi_france);

	    $('.bloc_assurance').show();
	    $("#montant_assurance").val(0.35*valeur_colis_autre_envoi_france);
	    
	    $('#montant_total_a_payer').html(parseInt($("#montant_assurance").val())+parseInt(valeur_colis_autre_envoi_france)+' FCFA').show();
	}
	else
	{
	    var pu = $('#pu_colis_autre_envoi_france').val();
        var qte = $('#poids_colis_autre_envoi_france').val();
        var emballage_colis_autre_envoi_france = $('#emballage_colis_autre_envoi_france').val();
        var valeur_colis_autre_envoi_france=parseInt(pu*qte)+parseInt(emballage_colis_autre_envoi_france);
	    
	    $('.bloc_assurance').hide();
	    $("#montant_assurance").val(0);
	    
	    $('#montant_total_a_payer').html(parseInt($("#montant_assurance").val())+parseInt(valeur_colis_autre_envoi_france)+' FCFA').show();
	}
	
	alert($("#montant_assurance").val());
});
*/

/**colis_autre_envoi_france**/
$("#poids_colis_autre_envoi_france").on('keyup', function(){
	$('#prix_total_colis_autre_envoi_france').hide();
	var pu = $('#pu_colis_autre_envoi_france').val();
	var qte = $('#poids_colis_autre_envoi_france').val();
	var emballage_colis_autre_envoi_france = $('#emballage_colis_autre_envoi_france').val();
	$('#prix_total_colis_autre_envoi_france').html(parseInt(pu*qte)+parseInt(emballage_colis_autre_envoi_france)+' FCFA').show();
	
	var valeur_colis_autre_envoi_france=parseInt(pu*qte)+parseInt(emballage_colis_autre_envoi_france);

	$('#prix_total_colis_autre_envoi_france').html(parseInt(valeur_colis_autre_envoi_france)+' FCFA').show();
	
});

$("#pu_colis_autre_envoi_france").on('keyup', function(){
	$('#prix_total_colis_autre_envoi_france').hide();
	var pu = $('#pu_colis_autre_envoi_france').val();
	var qte = $('#poids_colis_autre_envoi_france').val();
	var emballage_colis_autre_envoi_france = $('#emballage_colis_autre_envoi_france').val();
	$('#prix_total_colis_autre_envoi_france').html(parseInt(pu*qte)+parseInt(emballage_colis_autre_envoi_france)+' FCFA').show();
	
	var valeur_colis_autre_envoi_france=parseInt(pu*qte)+parseInt(emballage_colis_autre_envoi_france);
	/*
	if( $('input[name=payer_assurance]').is(':checked') )
	{
	    $("#montant_assurance").val(0.35*valeur_colis_autre_envoi_france);
	}
	else
	{
	    $("#montant_assurance").val(0);
	}
	*/
	
	$('#prix_total_colis_autre_envoi_france').html(parseInt(valeur_colis_autre_envoi_france)+' FCFA').show();
	
});

$("#emballage_colis_autre_envoi_france").on('keyup', function(){
	$('#prix_total_colis_autre_envoi_france').hide();
	var pu = $('#pu_colis_autre_envoi_france').val();
	var qte = $('#poids_colis_autre_envoi_france').val();
	var emballage_colis_autre_envoi_france = $('#emballage_colis_autre_envoi_france').val();
	$('#prix_total_colis_autre_envoi_france').html(parseInt(pu*qte)+parseInt(emballage_colis_autre_envoi_france)+' FCFA').show();
	
	var valeur_colis_autre_envoi_france=parseInt(pu*qte)+parseInt(emballage_colis_autre_envoi_france);
	
	
	/*
	if( $('input[name=payer_assurance]').is(':checked') )
	{
	    $("#montant_assurance").val(0.35*valeur_colis_autre_envoi_france);
	}
	else
	{
	    $("#montant_assurance").val(0);
	}
	*/
	
	$('#prix_total_colis_autre_envoi_france').html(parseInt(valeur_colis_autre_envoi_france)+' FCFA').show();
	
});




$('#ajout_colis_autre_envoi_france').live('click', function(){
	$('#myModal_colis_autre_envoi_france').modal('show');
});
$('#envoie_colis_autre_envoi_france').live('click',function(){	

	var nbre_colis_autre_envoi_france=$("#nbre_colis_autre_envoi_france").val();
	var nbre_article=$("#nbre_article").val();
	var nature_colis_autre_envoi_france=$("#nature_colis_autre_envoi_france").val();
	var poids_colis_autre_envoi_france=$("#poids_colis_autre_envoi_france").val();
	var pu_colis_autre_envoi_france=$("#pu_colis_autre_envoi_france").val();
	var emballage_colis_autre_envoi_france=$("#emballage_colis_autre_envoi_france").val();
	var time_autre_envoi_france=$("#time_autre_envoi_france").val();
	//var montant_assurance=$("#montant_assurance").val();


	var dataString=
	"nbre_colis_autre_envoi_france="+nbre_colis_autre_envoi_france
	+"&nature_colis_autre_envoi_france="+nature_colis_autre_envoi_france
	+"&poids_colis_autre_envoi_france="+poids_colis_autre_envoi_france
	+"&pu_colis_autre_envoi_france="+pu_colis_autre_envoi_france
	+"&emballage_colis_autre_envoi_france="+emballage_colis_autre_envoi_france
	+"&time_autre_envoi_france="+time_autre_envoi_france
	;
	
	    if(nbre_colis_autre_envoi_france=='' || nbre_article=='' || nature_colis_autre_envoi_france=='' || poids_colis_autre_envoi_france=='' || pu_colis_autre_envoi_france=='' || emballage_colis_autre_envoi_france=='')
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
	url: "autre_envoi_france/ajout_colis_autre_envoi_france.php",
	data: "nbre_colis_autre_envoi_france="+nbre_colis_autre_envoi_france+"&nbre_article="+nbre_article+"&nature_colis_autre_envoi_france="+nature_colis_autre_envoi_france+"&poids_colis_autre_envoi_france="+poids_colis_autre_envoi_france+"&pu_colis_autre_envoi_france="+pu_colis_autre_envoi_france+"&emballage_colis_autre_envoi_france="+emballage_colis_autre_envoi_france+"&time_autre_envoi_france="+time_autre_envoi_france,//+"&montant_assurance="+montant_assurance,
	success: function(msg){
		
		if(msg==1)
		{
			$("div.msg_erreur").addClass("red"); 
			$("div.msg_erreur").removeClass("green");
			$("div.msg_erreur").html("Cette fiche d'expression de autre_envoi_frances existe d&eacute;j&agrave; !").show();
		}
		else
		{
			 $('#myModal_autre_envoi_france').modal('toggle');
			 $("div.msg_erreur").hide(); 
			 $("#nbre_colis_autre_envoi_france").val('');
			 $("#nbre_article").val('');
			 $("#nature_colis_autre_envoi_france").val('');
			 $("#poids_colis_autre_envoi_france").val('');
			 $("#pu_colis_autre_envoi_france").val('');
			 $("#emballage_colis_autre_envoi_france").val('');
			 $("#time_autre_envoi_france").val('');
			 //$("#montant_assurance").val('');
			 //change_page_autre_envoi_france('0');
			 location.reload();
		}
	}
     });
       }
	
 return false;
}); 
/*Fin colis_autre_envoi_frances */



$("#valeur_colis_autre_envoi_france").on('keyup', function(){
//	$('#prix_total_colis_autre_envoi_france').hide();
	var vc = $('#valeur_colis_autre_envoi_france').val();
	var prc = 0.35;
	var ma = vc*prc;
	
	$('#montant_assurance').val(parseInt(ma));
	
	$('#montant_aff_assurance').html(parseInt(ma));
	
	
	$.ajax({
	type: "GET",
	url: "autre_envoi_france/calcul_total.php",
	//data: "valeur_colis_autre_envoi_france="+valeur_colis_autre_envoi_france+"&montant_assurance="+montant_assurance,//+"&time_autre_envoi_france="+time_autre_envoi_france,//+"&montant_assurance="+montant_assurance,
    	success: function(valeur){
    		
    		$('#prix_final_colis_autre_envoi_france').html(valeur+' FCFA').show();
    		
    		$('#montant_total_a_payer').html(parseInt(valeur)+parseInt(ma)+' FCFA').show();
    		
    		//alert(valeur);
    	}
    });
    
});
    
    
$('#ajout_assurance').live('click', function(){
	$('#myModal_assurance').modal('show');
});
$('#envoie_assurance').live('click',function(){	

	var valeur_colis_autre_envoi_france=$("#valeur_colis_autre_envoi_france").val();
	var montant_assurance=$("#montant_assurance").val();
//	var time_autre_envoi_france=$("#time_autre_envoi_france").val();


	var dataString=
	"valeur_colis_autre_envoi_france="+valeur_colis_autre_envoi_france
	+"&montant_assurance="+montant_assurance
//	+"&time_autre_envoi_france="+time_autre_envoi_france
	;
   	
	//alert(dataString);

	$.ajax({
	type: "POST",
	url: "autre_envoi_france/ajout_assurance.php",
	data: "valeur_colis_autre_envoi_france="+valeur_colis_autre_envoi_france+"&montant_assurance="+montant_assurance,//+"&time_autre_envoi_france="+time_autre_envoi_france,//+"&montant_assurance="+montant_assurance,
	success: function(msg){
		
		if(msg==1)
		{
			$("div.msg_erreur").addClass("red"); 
			$("div.msg_erreur").removeClass("green");
			$("div.msg_erreur").html("Cette assurance existe d&eacute;j&agrave; !").show();
		}
		else
		{
			 $('#myModal_autre_envoi_france').modal('toggle');
			 $("div.msg_erreur").hide(); 
			 $("#valeur_colis_autre_envoi_france").val('');
			 $("#montant_assurance").val('');
			// $("#time_autre_envoi_france").val('');
			 //change_page_autre_envoi_france('0');
			 location.reload();
		}
	}
 });
	
 return false;
}); 
/*Fin assurance */

/**autre_envoi_france**/

$(".div_dern_delai").hide();

$('input[name=immediat]').live('change', function(){
	if( $('input[name=immediat]').is(':checked') ){
		$(".div_dern_delai").show();
	} else {
		$(".div_dern_delai").hide();
	}
});

//Création
$('#ajout_autre_envoi_france').live('click', function(){
	$('#myModal_autre_envoi_france').modal('show');
});
$('#envoie_autre_envoi_france').live('click',function(){	

	var date_autre_envoi_france=$("#date_autre_envoi_france").val();
	//var code_colis_autre_envoi_france_autre_envoi_france=$("#code_colis_autre_envoi_france_autre_envoi_france").val();
	var expediteur_autre_envoi_france=$("#expediteur_autre_envoi_france").val();
	var num_cni_expediteur_autre_envoi_france=$("#num_cni_expediteur_autre_envoi_france").val();
	var tel_expediteur_autre_envoi_france=$("#tel_expediteur_autre_envoi_france").val();
	var destinataire_autre_envoi_france=$("#destinataire_autre_envoi_france").val();
	var destination_autre_envoi_france=$("#destination_autre_envoi_france").val();
	var tel_destinataire_autre_envoi_france=$("#tel_destinataire_autre_envoi_france").val();
	var adresse_recuperation_autre_envoi_france=$("#adresse_recuperation_autre_envoi_france").val();
	var nom_recuperateur=$("#nom_recuperateur").val();
	var tel_recuperateur=$("#tel_recuperateur").val();
	var mode_envoi=$("#mode_envoi").val();

	var dataString=
	"date_autre_envoi_france="+date_autre_envoi_france
	//+"&code_colis_autre_envoi_france_autre_envoi_france="+code_colis_autre_envoi_france_autre_envoi_france
	+"&expediteur_autre_envoi_france="+expediteur_autre_envoi_france
	+"&num_cni_expediteur_autre_envoi_france="+num_cni_expediteur_autre_envoi_france
	+"&tel_expediteur_autre_envoi_france="+tel_expediteur_autre_envoi_france
	+"&destinataire_autre_envoi_france="+destinataire_autre_envoi_france
	+"&destination_autre_envoi_france="+destination_autre_envoi_france
	+"&tel_destinataire_autre_envoi_france="+tel_destinataire_autre_envoi_france
	+"&adresse_recuperation_autre_envoi_france="+adresse_recuperation_autre_envoi_france
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
	   else if(num_cni_expediteur_autre_envoi_france=='')
	   {
	       $("div.msg_erreur").show();
		    $("div.msg_erreur").html("Le num&eacute;ro de pi&egrave;ce est obligatoire !").show();
	   }
	   else if(adresse_recuperation_autre_envoi_france=='')
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
	url: "autre_envoi_france/ajout_autre_envoi_france.php",
	data: "date_autre_envoi_france="+date_autre_envoi_france/*+"&code_colis_autre_envoi_france_autre_envoi_france="+code_colis_autre_envoi_france_autre_envoi_france*/+"&expediteur_autre_envoi_france="+expediteur_autre_envoi_france+"&num_cni_expediteur_autre_envoi_france="+num_cni_expediteur_autre_envoi_france+"&tel_expediteur_autre_envoi_france="+tel_expediteur_autre_envoi_france+"&destinataire_autre_envoi_france="+destinataire_autre_envoi_france+"&destination_autre_envoi_france="+destination_autre_envoi_france+"&tel_destinataire_autre_envoi_france="+tel_destinataire_autre_envoi_france+"&adresse_recuperation_autre_envoi_france="+adresse_recuperation_autre_envoi_france+"&nom_recuperateur="+nom_recuperateur+"&tel_recuperateur="+tel_recuperateur+"&mode_envoi="+mode_envoi,
	success: function(msg){
		
		if(msg==1)
		{
	 $("div.msg_erreur").addClass("red"); 
	 $("div.msg_erreur").removeClass("green");
	$("div.msg_erreur").html("Cette fiche d'expression de autre_envoi_frances existe d&eacute;j&agrave; !").show();
		}
		else
		{
			 $('#myModal_autre_envoi_france').modal('toggle');
			 $("div.msg_erreur").hide(); 
			 $("#date_autre_envoi_france").val('');
			// $("#code_colis_autre_envoi_france_autre_envoi_france").val('');
			 $("#expediteur_autre_envoi_france").val('');
			 $("#num_cni_expediteur_autre_envoi_france").val('');
			 $("#tel_expediteur_autre_envoi_france").val('');
			 $("#code_colis_autre_envoi_france_autre_envoi_france").val('');
			 $("#destinataire_autre_envoi_france").val('');
			 $("#destination_autre_envoi_france").val('');
			 $("#tel_destinataire_autre_envoi_france").val('');
			 $("#adresse_recuperation_autre_envoi_france").val('');
			 $("#nom_recuperateur").val('');
			 $("#tel_recuperateur").val('');
			 $("#mode_envoi").val('');
			 //change_page_autre_envoi_france('0');
			 $(location).attr('href','autre_envoi_france.php');
		}
	}
 });
	   }
	
 return false;
}); 

//Modification
$(".edit_colis_autre_envoi_france").live('click', function() {
var id_ref = $(this).attr('data-id');

	$.ajax({
		type: "GET",
		url: "autre_envoi_france/form_modifier_colis_autre_envoi_france.php",
		data: "ref="+id_ref,
		success: function(msg){
			$("#affiche_colis_autre_envoi_france_mod").html(msg);
			$("#myModal_colis_autre_envoi_france_mod").modal('show');	
		}
	});

});
$('#form_colis_autre_envoi_france_mod').live('submit',function(){	

	$.ajax({
		type: "POST",
		url: "modif_colis_autre_envoi_france.php",
		data: "qte_colis_autre_envoi_france_mod="+$("#qte_colis_autre_envoi_france_mod").val()+"&designation_colis_autre_envoi_france_mod="+$("#designation_colis_autre_envoi_france_mod").val()+"&prix_colis_autre_envoi_france_mod="+$("#prix_colis_autre_envoi_france_mod").val(),
		success: function(msg){
			$(location).attr('href','detail_autre_envoi_france.php');
		}
	});
	return false;
});


$('.detail_autre_envoi_france').live('click', function(){

	var id_ref = $(this).attr('data-id');
		$.ajax({
		type: "GET",
		url: "autre_envoi_france/recup_autre_envoi_france.php",
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
			url: "autre_envoi_france/terminer_autre_envoi_france.php",
			success: function(msg){
				location.reload();
			}
		});
});

//Validation

/**autre_envoi_france**/

/*Sup colis_autre_envoi_france */
$(".button_annul").live('click', function(){
	$('#myModal_colis_autre_envoi_france_sup').modal('toggle');
});
$(".delete_colis_autre_envoi_france").live('click', function() {
	var id_ref = $(this).attr('data-id');
		$.ajax({
		type: "GET",
		url: "autre_envoi_france/form_supprimer_colis_autre_envoi_france.php",
		data: "ref="+id_ref,
			success: function(msg){
				$("#affiche_colis_autre_envoi_france_sup").html(msg);
				$("#myModal_colis_autre_envoi_france_sup").modal('show');	
			}
		});
	});
	
	$('#submit_colis_autre_envoi_france_sup').live('click',function(){
		$(".aff_colis_autre_envoi_france").hide();				  
	$.ajax({
		type: "POST",
		url: "autre_envoi_france/sup_colis_autre_envoi_france.php",
		success: function(msg){
			
			$('#myModal_colis_autre_envoi_france_sup').modal('toggle');
			$("div.msg_erreur").hide(); 
			$(".clo_er").hide(); 
			//change_page_colis_autre_envoi_france('0');
			$(location).attr('href','autre_envoi_france.php');
			//$(".aff_colis_autre_envoi_france").html('Suppression effectu&eacute;e avec succ&egrave;s veuillez actualiser la page SVP !').show();
		}
	 });
	 return false;
	}); 


$('#recher_date_debut').on('keyup',function(){
   
	var recher_date_debut=$("#recher_date_debut").val();
	var recher_date_fin=$("#recher_date_fin").val();
	var recher_expediteur=$("#recher_expediteur").val();
	var recher_num_cni=$("#recher_num_cni").val();
	var recher_code_colis_autre_envoi_france=$("#recher_code_colis_autre_envoi_france").val();
	var recher_destinataire=$("#recher_destinataire").val();
	var recher_destination=$("#recher_destination").val();
 
	var page_id=0;

    var dataString = 'page_id='+page_id+'&recher_date_debut='+recher_date_debut+'&recher_date_fin='+recher_date_fin+'&recher_expediteur='+recher_expediteur+'&recher_num_cni_='+recher_num_cni+'&recher_code_colis_autre_envoi_france='+recher_code_colis_autre_envoi_france+'&recher_destinataire='+recher_destinataire+'&recher_destination='+recher_destination;
	$.ajax({
			type: "POST",
			url: "autre_envoi_france/charge_autre_envoi_france.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').show();
				$(".aff_autre_envoi_france").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_autre_envoi_france").html(result).show();
			}
	 });
});
$('#recher_date_fin').on('keyup',function(){
   
	var recher_date_debut=$("#recher_date_debut").val();
	var recher_date_fin=$("#recher_date_fin").val();
	var recher_expediteur=$("#recher_expediteur").val();
	var recher_num_cni=$("#recher_num_cni").val();
	var recher_code_colis_autre_envoi_france=$("#recher_code_colis_autre_envoi_france").val();
	var recher_destinataire=$("#recher_destinataire").val();
	var recher_destination=$("#recher_destination").val();
 
	var page_id=0;

    var dataString = 'page_id='+page_id+'&recher_date_debut='+recher_date_debut+'&recher_date_fin='+recher_date_fin+'&recher_expediteur='+recher_expediteur+'&recher_num_cni_='+recher_num_cni+'&recher_code_colis_autre_envoi_france='+recher_code_colis_autre_envoi_france+'&recher_destinataire='+recher_destinataire+'&recher_destination='+recher_destination;
	$.ajax({
			type: "POST",
			url: "autre_envoi_france/charge_autre_envoi_france.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').show();
				$(".aff_autre_envoi_france").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_autre_envoi_france").html(result).show();
			}
	 });
});
$('#recher_date_debut').on('change',function(){
   
	var recher_date_debut=$("#recher_date_debut").val();
	var recher_date_fin=$("#recher_date_fin").val();
	var recher_expediteur=$("#recher_expediteur").val();
	var recher_num_cni=$("#recher_num_cni").val();
	var recher_code_colis_autre_envoi_france=$("#recher_code_colis_autre_envoi_france").val();
	var recher_destinataire=$("#recher_destinataire").val();
	var recher_destination=$("#recher_destination").val();
 
	var page_id=0;

    var dataString = 'page_id='+page_id+'&recher_date_debut='+recher_date_debut+'&recher_date_fin='+recher_date_fin+'&recher_expediteur='+recher_expediteur+'&recher_num_cni_='+recher_num_cni+'&recher_code_colis_autre_envoi_france='+recher_code_colis_autre_envoi_france+'&recher_destinataire='+recher_destinataire+'&recher_destination='+recher_destination;
	$.ajax({
			type: "POST",
			url: "autre_envoi_france/charge_autre_envoi_france.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').show();
				$(".aff_autre_envoi_france").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_autre_envoi_france").html(result).show();
			}
	 });
});
$('#recher_date_fin').on('change',function(){
   
	var recher_date_debut=$("#recher_date_debut").val();
	var recher_date_fin=$("#recher_date_fin").val();
	var recher_expediteur=$("#recher_expediteur").val();
	var recher_num_cni=$("#recher_num_cni").val();
	var recher_code_colis_autre_envoi_france=$("#recher_code_colis_autre_envoi_france").val();
	var recher_destinataire=$("#recher_destinataire").val();
	var recher_destination=$("#recher_destination").val();
 
	var page_id=0;

    var dataString = 'page_id='+page_id+'&recher_date_debut='+recher_date_debut+'&recher_date_fin='+recher_date_fin+'&recher_expediteur='+recher_expediteur+'&recher_num_cni_='+recher_num_cni+'&recher_code_colis_autre_envoi_france='+recher_code_colis_autre_envoi_france+'&recher_destinataire='+recher_destinataire+'&recher_destination='+recher_destination;
	$.ajax({
			type: "POST",
			url: "autre_envoi_france/charge_autre_envoi_france.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').show();
				$(".aff_autre_envoi_france").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_autre_envoi_france").html(result).show();
			}
	 });
});
$('#recher_expediteur').on('keyup',function(){
   
	var recher_date_debut=$("#recher_date_debut").val();
	var recher_date_fin=$("#recher_date_fin").val();
	var recher_expediteur=$("#recher_expediteur").val();
	var recher_num_cni=$("#recher_num_cni").val();
	var recher_code_colis_autre_envoi_france=$("#recher_code_colis_autre_envoi_france").val();
	var recher_destinataire=$("#recher_destinataire").val();
	var recher_destination=$("#recher_destination").val();
 
	var page_id=0;

    var dataString = 'page_id='+page_id+'&recher_date_debut='+recher_date_debut+'&recher_date_fin='+recher_date_fin+'&recher_expediteur='+recher_expediteur+'&recher_num_cni_='+recher_num_cni+'&recher_code_colis_autre_envoi_france='+recher_code_colis_autre_envoi_france+'&recher_destinataire='+recher_destinataire+'&recher_destination='+recher_destination;
	$.ajax({
			type: "POST",
			url: "autre_envoi_france/charge_autre_envoi_france.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').show();
				$(".aff_autre_envoi_france").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_autre_envoi_france").html(result).show();
			}
	 });
});
$('#recher_num_cni').on('keyup',function(){
   
	var recher_date_debut=$("#recher_date_debut").val();
	var recher_date_fin=$("#recher_date_fin").val();
	var recher_expediteur=$("#recher_expediteur").val();
	var recher_num_cni=$("#recher_num_cni").val();
	var recher_code_colis_autre_envoi_france=$("#recher_code_colis_autre_envoi_france").val();
	var recher_destinataire=$("#recher_destinataire").val();
	var recher_destination=$("#recher_destination").val();
 
	var page_id=0;

    var dataString = 'page_id='+page_id+'&recher_date_debut='+recher_date_debut+'&recher_date_fin='+recher_date_fin+'&recher_expediteur='+recher_expediteur+'&recher_num_cni_='+recher_num_cni+'&recher_code_colis_autre_envoi_france='+recher_code_colis_autre_envoi_france+'&recher_destinataire='+recher_destinataire+'&recher_destination='+recher_destination;
	$.ajax({
			type: "POST",
			url: "autre_envoi_france/charge_autre_envoi_france.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').show();
				$(".aff_autre_envoi_france").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_autre_envoi_france").html(result).show();
			}
	 });
});
$('#recher_code_colis_autre_envoi_france').on('keyup',function(){
   
	var recher_date_debut=$("#recher_date_debut").val();
	var recher_date_fin=$("#recher_date_fin").val();
	var recher_expediteur=$("#recher_expediteur").val();
	var recher_num_cni=$("#recher_num_cni").val();
	var recher_code_colis_autre_envoi_france=$("#recher_code_colis_autre_envoi_france").val();
	var recher_destinataire=$("#recher_destinataire").val();
	var recher_destination=$("#recher_destination").val();
 
	var page_id=0;

    var dataString = 'page_id='+page_id+'&recher_date_debut='+recher_date_debut+'&recher_date_fin='+recher_date_fin+'&recher_expediteur='+recher_expediteur+'&recher_num_cni_='+recher_num_cni+'&recher_code_colis_autre_envoi_france='+recher_code_colis_autre_envoi_france+'&recher_destinataire='+recher_destinataire+'&recher_destination='+recher_destination;
	$.ajax({
			type: "POST",
			url: "autre_envoi_france/charge_autre_envoi_france.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').show();
				$(".aff_autre_envoi_france").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_autre_envoi_france").html(result).show();
			}
	 });
});
$('#recher_destinataire').on('keyup',function(){
   
	var recher_date_debut=$("#recher_date_debut").val();
	var recher_date_fin=$("#recher_date_fin").val();
	var recher_expediteur=$("#recher_expediteur").val();
	var recher_num_cni=$("#recher_num_cni").val();
	var recher_code_colis_autre_envoi_france=$("#recher_code_colis_autre_envoi_france").val();
	var recher_destinataire=$("#recher_destinataire").val();
	var recher_destination=$("#recher_destination").val();
 
	var page_id=0;

    var dataString = 'page_id='+page_id+'&recher_date_debut='+recher_date_debut+'&recher_date_fin='+recher_date_fin+'&recher_expediteur='+recher_expediteur+'&recher_num_cni_='+recher_num_cni+'&recher_code_colis_autre_envoi_france='+recher_code_colis_autre_envoi_france+'&recher_destinataire='+recher_destinataire+'&recher_destination='+recher_destination;
	$.ajax({
			type: "POST",
			url: "autre_envoi_france/charge_autre_envoi_france.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').show();
				$(".aff_autre_envoi_france").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_autre_envoi_france").html(result).show();
			}
	 });
});
$('#recher_destination').on('keyup',function(){
   
	var recher_date_debut=$("#recher_date_debut").val();
	var recher_date_fin=$("#recher_date_fin").val();
	var recher_expediteur=$("#recher_expediteur").val();
	var recher_num_cni=$("#recher_num_cni").val();
	var recher_code_colis_autre_envoi_france=$("#recher_code_colis_autre_envoi_france").val();
	var recher_destinataire=$("#recher_destinataire").val();
	var recher_destination=$("#recher_destination").val();
 
	var page_id=0;

    var dataString = 'page_id='+page_id+'&recher_date_debut='+recher_date_debut+'&recher_date_fin='+recher_date_fin+'&recher_expediteur='+recher_expediteur+'&recher_num_cni_='+recher_num_cni+'&recher_code_colis_autre_envoi_france='+recher_code_colis_autre_envoi_france+'&recher_destinataire='+recher_destinataire+'&recher_destination='+recher_destination;
	$.ajax({
			type: "POST",
			url: "autre_envoi_france/charge_autre_envoi_france.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').show();
				$(".aff_autre_envoi_france").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_autre_envoi_france").html(result).show();
			}
	 });
});


change_page_autre_envoi_france('0');
change_page_colis_autre_envoi_france('0');
});


function change_page_autre_envoi_france(page_id){
	
	var recher_date_debut=$("#recher_date_debut").val();
	var recher_date_fin=$("#recher_date_fin").val();
	var recher_expediteur=$("#recher_expediteur").val();
	var recher_num_cni=$("#recher_num_cni").val();
	var recher_code_colis_autre_envoi_france=$("#recher_code_colis_autre_envoi_france").val();
	var recher_destinataire=$("#recher_destinataire").val();
	var recher_destination=$("#recher_destination").val();
 
	var page_id=0;

    var dataString = 'page_id='+page_id+'&recher_date_debut='+recher_date_debut+'&recher_date_fin='+recher_date_fin+'&recher_expediteur='+recher_expediteur+'&recher_num_cni_='+recher_num_cni+'&recher_code_colis_autre_envoi_france='+recher_code_colis_autre_envoi_france+'&recher_destinataire='+recher_destinataire+'&recher_destination='+recher_destination;
	$.ajax({
			type: "POST",
			url: "autre_envoi_france/charge_autre_envoi_france.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').show();
				$(".aff_autre_envoi_france").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_autre_envoi_france").html(result).show();
			}
	 });

}

function change_page_colis_autre_envoi_france(page_id_cons){
	
	var page_id_cons=0;

	var dataString = 'page_id_cons='+ page_id_cons;
	$.ajax({
			type: "POST",
			url: "autre_envoi_france/charge_colis_autre_envoi_france.php",
			data: dataString,
			cache: false,
			
			beforeSend: function(result){

				setTimeout(function() {
					$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').show();
					$(".aff_colis_autre_envoi_france").show();
				}, 1000);

			},
			
			success: function(result){
				
				setTimeout(function() {
					$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').hide();
					$(".aff_colis_autre_envoi_france").html(result).show();
				}, 1000);
			}
	 });

}

