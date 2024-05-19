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
	$(location).attr('href', 'colis_fret.php');
	//alert('Boutton d\'annulation enfonce');
});

$("#fermer").live('click', function(){
	$(location).attr('href', 'colis_fret.php');
	//alert('Boutton d\'annulation enfonce');
});

$("#select_single").hide();

var glob_val_col;

$("#frais_compagnie").on('keyup', function(){
    
    var frais_compagnie=$("#frais_compagnie").val();
    
    if(frais_compagnie!=='' && frais_compagnie!==0){
    	$.ajax({
			type: "POST",
			url: "colis_fret/update_frais_compagnie.php",
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
	    var pu = $('#pu_colis_colis_fret').val();
        var qte = $('#poids_colis_colis_fret').val();
        var emballage_colis_colis_fret = $('#emballage_colis_colis_fret').val();
        var valeur_colis_colis_fret=parseInt(pu*qte)+parseInt(emballage_colis_colis_fret);

	    $('.bloc_assurance').show();
	    $("#montant_assurance").val(0.35*valeur_colis_colis_fret);
	    
	    $('#montant_total_a_payer').html(parseInt($("#montant_assurance").val())+parseInt(valeur_colis_colis_fret)+' FCFA').show();
	}
	else
	{
	    var pu = $('#pu_colis_colis_fret').val();
        var qte = $('#poids_colis_colis_fret').val();
        var emballage_colis_colis_fret = $('#emballage_colis_colis_fret').val();
        var valeur_colis_colis_fret=parseInt(pu*qte)+parseInt(emballage_colis_colis_fret);
	    
	    $('.bloc_assurance').hide();
	    $("#montant_assurance").val(0);
	    
	    $('#montant_total_a_payer').html(parseInt($("#montant_assurance").val())+parseInt(valeur_colis_colis_fret)+' FCFA').show();
	}
	
	alert($("#montant_assurance").val());
});
*/

/**colis_colis_fret**/
$("#poids_colis_colis_fret").on('keyup', function(){
	$('#prix_total_colis_colis_fret').hide();
	var pu = $('#pu_colis_colis_fret').val();
	var qte = $('#poids_colis_colis_fret').val();
	var emballage_colis_colis_fret = $('#emballage_colis_colis_fret').val();
	$('#prix_total_colis_colis_fret').html(parseInt(pu*qte)+parseInt(emballage_colis_colis_fret)+' FCFA').show();
	
	var valeur_colis_colis_fret=parseInt(pu*qte)+parseInt(emballage_colis_colis_fret);

	$('#prix_total_colis_colis_fret').html(parseInt(valeur_colis_colis_fret)+' FCFA').show();
	
});

$("#pu_colis_colis_fret").on('keyup', function(){
	$('#prix_total_colis_colis_fret').hide();
	var pu = $('#pu_colis_colis_fret').val();
	var qte = $('#poids_colis_colis_fret').val();
	var emballage_colis_colis_fret = $('#emballage_colis_colis_fret').val();
	$('#prix_total_colis_colis_fret').html(parseInt(pu*qte)+parseInt(emballage_colis_colis_fret)+' FCFA').show();
	
	var valeur_colis_colis_fret=parseInt(pu*qte)+parseInt(emballage_colis_colis_fret);
	/*
	if( $('input[name=payer_assurance]').is(':checked') )
	{
	    $("#montant_assurance").val(0.35*valeur_colis_colis_fret);
	}
	else
	{
	    $("#montant_assurance").val(0);
	}
	*/
	
	$('#prix_total_colis_colis_fret').html(parseInt(valeur_colis_colis_fret)+' FCFA').show();
	
});

$("#emballage_colis_colis_fret").on('keyup', function(){
	$('#prix_total_colis_colis_fret').hide();
	var pu = $('#pu_colis_colis_fret').val();
	var qte = $('#poids_colis_colis_fret').val();
	var emballage_colis_colis_fret = $('#emballage_colis_colis_fret').val();
	$('#prix_total_colis_colis_fret').html(parseInt(pu*qte)+parseInt(emballage_colis_colis_fret)+' FCFA').show();
	
	var valeur_colis_colis_fret=parseInt(pu*qte)+parseInt(emballage_colis_colis_fret);
	
	
	/*
	if( $('input[name=payer_assurance]').is(':checked') )
	{
	    $("#montant_assurance").val(0.35*valeur_colis_colis_fret);
	}
	else
	{
	    $("#montant_assurance").val(0);
	}
	*/
	
	$('#prix_total_colis_colis_fret').html(parseInt(valeur_colis_colis_fret)+' FCFA').show();
	
});




$('#ajout_colis_colis_fret').live('click', function(){
	$('#myModal_colis_colis_fret').modal('show');
});
$('#envoie_colis_colis_fret').live('click',function(){	

	var nbre_colis_colis_fret=$("#nbre_colis_colis_fret").val();
	var nbre_article=$("#nbre_article").val();
	var nature_colis_colis_fret=$("#nature_colis_colis_fret").val();
	var poids_colis_colis_fret=$("#poids_colis_colis_fret").val();
	var pu_colis_colis_fret=$("#pu_colis_colis_fret").val();
	var emballage_colis_colis_fret=$("#emballage_colis_colis_fret").val();
	var time_colis_fret=$("#time_colis_fret").val();
	//var montant_assurance=$("#montant_assurance").val();


	var dataString=
	"nbre_colis_colis_fret="+nbre_colis_colis_fret
	+"&nature_colis_colis_fret="+nature_colis_colis_fret
	+"&poids_colis_colis_fret="+poids_colis_colis_fret
	+"&pu_colis_colis_fret="+pu_colis_colis_fret
	+"&emballage_colis_colis_fret="+emballage_colis_colis_fret
	+"&time_colis_fret="+time_colis_fret
	;
	
	    if(nbre_colis_colis_fret=='' || nbre_article=='' || nature_colis_colis_fret=='' || poids_colis_colis_fret=='' || pu_colis_colis_fret=='' || emballage_colis_colis_fret=='')
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
	url: "colis_fret/ajout_colis_colis_fret.php",
	data: "nbre_colis_colis_fret="+nbre_colis_colis_fret+"&nbre_article="+nbre_article+"&nature_colis_colis_fret="+nature_colis_colis_fret+"&poids_colis_colis_fret="+poids_colis_colis_fret+"&pu_colis_colis_fret="+pu_colis_colis_fret+"&emballage_colis_colis_fret="+emballage_colis_colis_fret+"&time_colis_fret="+time_colis_fret,//+"&montant_assurance="+montant_assurance,
	success: function(msg){
		
		if(msg==1)
		{
			$("div.msg_erreur").addClass("red"); 
			$("div.msg_erreur").removeClass("green");
			$("div.msg_erreur").html("Cette fiche d'expression de colis_frets existe d&eacute;j&agrave; !").show();
		}
		else
		{
			 $('#myModal_colis_fret').modal('toggle');
			 $("div.msg_erreur").hide(); 
			 $("#nbre_colis_colis_fret").val('');
			 $("#nbre_article").val('');
			 $("#nature_colis_colis_fret").val('');
			 $("#poids_colis_colis_fret").val('');
			 $("#pu_colis_colis_fret").val('');
			 $("#emballage_colis_colis_fret").val('');
			 $("#time_colis_fret").val('');
			 //$("#montant_assurance").val('');
			 //change_page_colis_fret('0');
			 location.reload();
		}
	}
     });
       }
	
 return false;
}); 
/*Fin colis_colis_frets */



$("#valeur_colis_colis_fret").on('keyup', function(){
//	$('#prix_total_colis_colis_fret').hide();
	var vc = $('#valeur_colis_colis_fret').val();
	var prc = 0.35;
	var ma = vc*prc;
	
	$('#montant_assurance').val(parseInt(ma));
	
	$('#montant_aff_assurance').html(parseInt(ma));
	
	
	$.ajax({
	type: "GET",
	url: "colis_fret/calcul_total.php",
	//data: "valeur_colis_colis_fret="+valeur_colis_colis_fret+"&montant_assurance="+montant_assurance,//+"&time_colis_fret="+time_colis_fret,//+"&montant_assurance="+montant_assurance,
    	success: function(valeur){
    		
    		$('#prix_final_colis_colis_fret').html(valeur+' FCFA').show();
    		
    		$('#montant_total_a_payer').html(parseInt(valeur)+parseInt(ma)+' FCFA').show();
    		
    		//alert(valeur);
    	}
    });
    
});
    
    
$('#ajout_assurance').live('click', function(){
	$('#myModal_assurance').modal('show');
});
$('#envoie_assurance').live('click',function(){	

	var valeur_colis_colis_fret=$("#valeur_colis_colis_fret").val();
	var montant_assurance=$("#montant_assurance").val();
//	var time_colis_fret=$("#time_colis_fret").val();


	var dataString=
	"valeur_colis_colis_fret="+valeur_colis_colis_fret
	+"&montant_assurance="+montant_assurance
//	+"&time_colis_fret="+time_colis_fret
	;
   	
	//alert(dataString);

	$.ajax({
	type: "POST",
	url: "colis_fret/ajout_assurance.php",
	data: "valeur_colis_colis_fret="+valeur_colis_colis_fret+"&montant_assurance="+montant_assurance,//+"&time_colis_fret="+time_colis_fret,//+"&montant_assurance="+montant_assurance,
	success: function(msg){
		
		if(msg==1)
		{
			$("div.msg_erreur").addClass("red"); 
			$("div.msg_erreur").removeClass("green");
			$("div.msg_erreur").html("Cette assurance existe d&eacute;j&agrave; !").show();
		}
		else
		{
			 $('#myModal_colis_fret').modal('toggle');
			 $("div.msg_erreur").hide(); 
			 $("#valeur_colis_colis_fret").val('');
			 $("#montant_assurance").val('');
			// $("#time_colis_fret").val('');
			 //change_page_colis_fret('0');
			 location.reload();
		}
	}
 });
	
 return false;
}); 
/*Fin assurance */

/**colis_fret**/

$(".div_dern_delai").hide();

$('input[name=immediat]').live('change', function(){
	if( $('input[name=immediat]').is(':checked') ){
		$(".div_dern_delai").show();
	} else {
		$(".div_dern_delai").hide();
	}
});

//Création
$('#ajout_colis_fret').live('click', function(){
	$('#myModal_colis_fret').modal('show');
});
$('#envoie_colis_fret').live('click',function(){	

	var date_colis_fret=$("#date_colis_fret").val();
	//var code_colis_colis_fret_colis_fret=$("#code_colis_colis_fret_colis_fret").val();
	var expediteur_colis_fret=$("#expediteur_colis_fret").val();
	var num_cni_expediteur_colis_fret=$("#num_cni_expediteur_colis_fret").val();
	var tel_expediteur_colis_fret=$("#tel_expediteur_colis_fret").val();
	var destinataire_colis_fret=$("#destinataire_colis_fret").val();
	var destination_colis_fret=$("#destination_colis_fret").val();
	var tel_destinataire_colis_fret=$("#tel_destinataire_colis_fret").val();
	var adresse_recuperation_colis_fret=$("#adresse_recuperation_colis_fret").val();
	var nom_recuperateur=$("#nom_recuperateur").val();
	var tel_recuperateur=$("#tel_recuperateur").val();
	var mode_envoi=$("#mode_envoi").val();

	var dataString=
	"date_colis_fret="+date_colis_fret
	//+"&code_colis_colis_fret_colis_fret="+code_colis_colis_fret_colis_fret
	+"&expediteur_colis_fret="+expediteur_colis_fret
	+"&num_cni_expediteur_colis_fret="+num_cni_expediteur_colis_fret
	+"&tel_expediteur_colis_fret="+tel_expediteur_colis_fret
	+"&destinataire_colis_fret="+destinataire_colis_fret
	+"&destination_colis_fret="+destination_colis_fret
	+"&tel_destinataire_colis_fret="+tel_destinataire_colis_fret
	+"&adresse_recuperation_colis_fret="+adresse_recuperation_colis_fret
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
	   else if(num_cni_expediteur_colis_fret=='')
	   {
	       $("div.msg_erreur").show();
		    $("div.msg_erreur").html("Le num&eacute;ro de pi&egrave;ce est obligatoire !").show();
	   }
	   else if(adresse_recuperation_colis_fret=='')
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
	url: "colis_fret/ajout_colis_fret.php",
	data: "date_colis_fret="+date_colis_fret/*+"&code_colis_colis_fret_colis_fret="+code_colis_colis_fret_colis_fret*/+"&expediteur_colis_fret="+expediteur_colis_fret+"&num_cni_expediteur_colis_fret="+num_cni_expediteur_colis_fret+"&tel_expediteur_colis_fret="+tel_expediteur_colis_fret+"&destinataire_colis_fret="+destinataire_colis_fret+"&destination_colis_fret="+destination_colis_fret+"&tel_destinataire_colis_fret="+tel_destinataire_colis_fret+"&adresse_recuperation_colis_fret="+adresse_recuperation_colis_fret+"&nom_recuperateur="+nom_recuperateur+"&tel_recuperateur="+tel_recuperateur+"&mode_envoi="+mode_envoi,
	success: function(msg){
		
		if(msg==1)
		{
	 $("div.msg_erreur").addClass("red"); 
	 $("div.msg_erreur").removeClass("green");
	$("div.msg_erreur").html("Cette fiche d'expression de colis_frets existe d&eacute;j&agrave; !").show();
		}
		else
		{
			 $('#myModal_colis_fret').modal('toggle');
			 $("div.msg_erreur").hide(); 
			 $("#date_colis_fret").val('');
			// $("#code_colis_colis_fret_colis_fret").val('');
			 $("#expediteur_colis_fret").val('');
			 $("#num_cni_expediteur_colis_fret").val('');
			 $("#tel_expediteur_colis_fret").val('');
			 $("#code_colis_colis_fret_colis_fret").val('');
			 $("#destinataire_colis_fret").val('');
			 $("#destination_colis_fret").val('');
			 $("#tel_destinataire_colis_fret").val('');
			 $("#adresse_recuperation_colis_fret").val('');
			 $("#nom_recuperateur").val('');
			 $("#tel_recuperateur").val('');
			 $("#mode_envoi").val('');
			 //change_page_colis_fret('0');
			 $(location).attr('href','colis_fret.php');
		}
	}
 });
	   }
	
 return false;
}); 

//Modification
$(".edit_colis_colis_fret").live('click', function() {
var id_ref = $(this).attr('data-id');

	$.ajax({
		type: "GET",
		url: "colis_fret/form_modifier_colis_colis_fret.php",
		data: "ref="+id_ref,
		success: function(msg){
			$("#affiche_colis_colis_fret_mod").html(msg);
			$("#myModal_colis_colis_fret_mod").modal('show');	
		}
	});

});
$('#form_colis_colis_fret_mod').live('submit',function(){	

	$.ajax({
		type: "POST",
		url: "modif_colis_colis_fret.php",
		data: "qte_colis_colis_fret_mod="+$("#qte_colis_colis_fret_mod").val()+"&designation_colis_colis_fret_mod="+$("#designation_colis_colis_fret_mod").val()+"&prix_colis_colis_fret_mod="+$("#prix_colis_colis_fret_mod").val(),
		success: function(msg){
			$(location).attr('href','detail_colis_fret.php');
		}
	});
	return false;
});


$('.detail_colis_fret').live('click', function(){

	var id_ref = $(this).attr('data-id');
		$.ajax({
		type: "GET",
		url: "colis_fret/recup_colis_fret.php",
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
			url: "colis_fret/terminer_colis_fret.php",
			success: function(msg){
				location.reload();
			}
		});
});

//Validation

/**colis_fret**/

/*Sup colis_colis_fret */
$(".button_annul").live('click', function(){
	$('#myModal_colis_colis_fret_sup').modal('toggle');
});
$(".delete_colis_colis_fret").live('click', function() {
	var id_ref = $(this).attr('data-id');
		$.ajax({
		type: "GET",
		url: "colis_fret/form_supprimer_colis_colis_fret.php",
		data: "ref="+id_ref,
			success: function(msg){
				$("#affiche_colis_colis_fret_sup").html(msg);
				$("#myModal_colis_colis_fret_sup").modal('show');	
			}
		});
	});
	
	$('#submit_colis_colis_fret_sup').live('click',function(){
		$(".aff_colis_colis_fret").hide();				  
	$.ajax({
		type: "POST",
		url: "colis_fret/sup_colis_colis_fret.php",
		success: function(msg){
			
			$('#myModal_colis_colis_fret_sup').modal('toggle');
			$("div.msg_erreur").hide(); 
			$(".clo_er").hide(); 
			//change_page_colis_colis_fret('0');
			$(location).attr('href','colis_fret.php');
			//$(".aff_colis_colis_fret").html('Suppression effectu&eacute;e avec succ&egrave;s veuillez actualiser la page SVP !').show();
		}
	 });
	 return false;
	}); 


$('#recher_date_debut').on('keyup',function(){
   
	var recher_date_debut=$("#recher_date_debut").val();
	var recher_date_fin=$("#recher_date_fin").val();
	var recher_expediteur=$("#recher_expediteur").val();
	var recher_num_cni=$("#recher_num_cni").val();
	var recher_code_colis_colis_fret=$("#recher_code_colis_colis_fret").val();
	var recher_destinataire=$("#recher_destinataire").val();
	var recher_destination=$("#recher_destination").val();
 
	var page_id=0;

    var dataString = 'page_id='+page_id+'&recher_date_debut='+recher_date_debut+'&recher_date_fin='+recher_date_fin+'&recher_expediteur='+recher_expediteur+'&recher_num_cni_='+recher_num_cni+'&recher_code_colis_colis_fret='+recher_code_colis_colis_fret+'&recher_destinataire='+recher_destinataire+'&recher_destination='+recher_destination;
	$.ajax({
			type: "POST",
			url: "colis_fret/charge_colis_fret.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').show();
				$(".aff_colis_fret").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_colis_fret").html(result).show();
			}
	 });
});
$('#recher_date_fin').on('keyup',function(){
   
	var recher_date_debut=$("#recher_date_debut").val();
	var recher_date_fin=$("#recher_date_fin").val();
	var recher_expediteur=$("#recher_expediteur").val();
	var recher_num_cni=$("#recher_num_cni").val();
	var recher_code_colis_colis_fret=$("#recher_code_colis_colis_fret").val();
	var recher_destinataire=$("#recher_destinataire").val();
	var recher_destination=$("#recher_destination").val();
 
	var page_id=0;

    var dataString = 'page_id='+page_id+'&recher_date_debut='+recher_date_debut+'&recher_date_fin='+recher_date_fin+'&recher_expediteur='+recher_expediteur+'&recher_num_cni_='+recher_num_cni+'&recher_code_colis_colis_fret='+recher_code_colis_colis_fret+'&recher_destinataire='+recher_destinataire+'&recher_destination='+recher_destination;
	$.ajax({
			type: "POST",
			url: "colis_fret/charge_colis_fret.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').show();
				$(".aff_colis_fret").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_colis_fret").html(result).show();
			}
	 });
});
$('#recher_date_debut').on('change',function(){
   
	var recher_date_debut=$("#recher_date_debut").val();
	var recher_date_fin=$("#recher_date_fin").val();
	var recher_expediteur=$("#recher_expediteur").val();
	var recher_num_cni=$("#recher_num_cni").val();
	var recher_code_colis_colis_fret=$("#recher_code_colis_colis_fret").val();
	var recher_destinataire=$("#recher_destinataire").val();
	var recher_destination=$("#recher_destination").val();
 
	var page_id=0;

    var dataString = 'page_id='+page_id+'&recher_date_debut='+recher_date_debut+'&recher_date_fin='+recher_date_fin+'&recher_expediteur='+recher_expediteur+'&recher_num_cni_='+recher_num_cni+'&recher_code_colis_colis_fret='+recher_code_colis_colis_fret+'&recher_destinataire='+recher_destinataire+'&recher_destination='+recher_destination;
	$.ajax({
			type: "POST",
			url: "colis_fret/charge_colis_fret.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').show();
				$(".aff_colis_fret").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_colis_fret").html(result).show();
			}
	 });
});
$('#recher_date_fin').on('change',function(){
   
	var recher_date_debut=$("#recher_date_debut").val();
	var recher_date_fin=$("#recher_date_fin").val();
	var recher_expediteur=$("#recher_expediteur").val();
	var recher_num_cni=$("#recher_num_cni").val();
	var recher_code_colis_colis_fret=$("#recher_code_colis_colis_fret").val();
	var recher_destinataire=$("#recher_destinataire").val();
	var recher_destination=$("#recher_destination").val();
 
	var page_id=0;

    var dataString = 'page_id='+page_id+'&recher_date_debut='+recher_date_debut+'&recher_date_fin='+recher_date_fin+'&recher_expediteur='+recher_expediteur+'&recher_num_cni_='+recher_num_cni+'&recher_code_colis_colis_fret='+recher_code_colis_colis_fret+'&recher_destinataire='+recher_destinataire+'&recher_destination='+recher_destination;
	$.ajax({
			type: "POST",
			url: "colis_fret/charge_colis_fret.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').show();
				$(".aff_colis_fret").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_colis_fret").html(result).show();
			}
	 });
});
$('#recher_expediteur').on('keyup',function(){
   
	var recher_date_debut=$("#recher_date_debut").val();
	var recher_date_fin=$("#recher_date_fin").val();
	var recher_expediteur=$("#recher_expediteur").val();
	var recher_num_cni=$("#recher_num_cni").val();
	var recher_code_colis_colis_fret=$("#recher_code_colis_colis_fret").val();
	var recher_destinataire=$("#recher_destinataire").val();
	var recher_destination=$("#recher_destination").val();
 
	var page_id=0;

    var dataString = 'page_id='+page_id+'&recher_date_debut='+recher_date_debut+'&recher_date_fin='+recher_date_fin+'&recher_expediteur='+recher_expediteur+'&recher_num_cni_='+recher_num_cni+'&recher_code_colis_colis_fret='+recher_code_colis_colis_fret+'&recher_destinataire='+recher_destinataire+'&recher_destination='+recher_destination;
	$.ajax({
			type: "POST",
			url: "colis_fret/charge_colis_fret.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').show();
				$(".aff_colis_fret").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_colis_fret").html(result).show();
			}
	 });
});
$('#recher_num_cni').on('keyup',function(){
   
	var recher_date_debut=$("#recher_date_debut").val();
	var recher_date_fin=$("#recher_date_fin").val();
	var recher_expediteur=$("#recher_expediteur").val();
	var recher_num_cni=$("#recher_num_cni").val();
	var recher_code_colis_colis_fret=$("#recher_code_colis_colis_fret").val();
	var recher_destinataire=$("#recher_destinataire").val();
	var recher_destination=$("#recher_destination").val();
 
	var page_id=0;

    var dataString = 'page_id='+page_id+'&recher_date_debut='+recher_date_debut+'&recher_date_fin='+recher_date_fin+'&recher_expediteur='+recher_expediteur+'&recher_num_cni_='+recher_num_cni+'&recher_code_colis_colis_fret='+recher_code_colis_colis_fret+'&recher_destinataire='+recher_destinataire+'&recher_destination='+recher_destination;
	$.ajax({
			type: "POST",
			url: "colis_fret/charge_colis_fret.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').show();
				$(".aff_colis_fret").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_colis_fret").html(result).show();
			}
	 });
});
$('#recher_code_colis_colis_fret').on('keyup',function(){
   
	var recher_date_debut=$("#recher_date_debut").val();
	var recher_date_fin=$("#recher_date_fin").val();
	var recher_expediteur=$("#recher_expediteur").val();
	var recher_num_cni=$("#recher_num_cni").val();
	var recher_code_colis_colis_fret=$("#recher_code_colis_colis_fret").val();
	var recher_destinataire=$("#recher_destinataire").val();
	var recher_destination=$("#recher_destination").val();
 
	var page_id=0;

    var dataString = 'page_id='+page_id+'&recher_date_debut='+recher_date_debut+'&recher_date_fin='+recher_date_fin+'&recher_expediteur='+recher_expediteur+'&recher_num_cni_='+recher_num_cni+'&recher_code_colis_colis_fret='+recher_code_colis_colis_fret+'&recher_destinataire='+recher_destinataire+'&recher_destination='+recher_destination;
	$.ajax({
			type: "POST",
			url: "colis_fret/charge_colis_fret.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').show();
				$(".aff_colis_fret").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_colis_fret").html(result).show();
			}
	 });
});
$('#recher_destinataire').on('keyup',function(){
   
	var recher_date_debut=$("#recher_date_debut").val();
	var recher_date_fin=$("#recher_date_fin").val();
	var recher_expediteur=$("#recher_expediteur").val();
	var recher_num_cni=$("#recher_num_cni").val();
	var recher_code_colis_colis_fret=$("#recher_code_colis_colis_fret").val();
	var recher_destinataire=$("#recher_destinataire").val();
	var recher_destination=$("#recher_destination").val();
 
	var page_id=0;

    var dataString = 'page_id='+page_id+'&recher_date_debut='+recher_date_debut+'&recher_date_fin='+recher_date_fin+'&recher_expediteur='+recher_expediteur+'&recher_num_cni_='+recher_num_cni+'&recher_code_colis_colis_fret='+recher_code_colis_colis_fret+'&recher_destinataire='+recher_destinataire+'&recher_destination='+recher_destination;
	$.ajax({
			type: "POST",
			url: "colis_fret/charge_colis_fret.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').show();
				$(".aff_colis_fret").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_colis_fret").html(result).show();
			}
	 });
});
$('#recher_destination').on('keyup',function(){
   
	var recher_date_debut=$("#recher_date_debut").val();
	var recher_date_fin=$("#recher_date_fin").val();
	var recher_expediteur=$("#recher_expediteur").val();
	var recher_num_cni=$("#recher_num_cni").val();
	var recher_code_colis_colis_fret=$("#recher_code_colis_colis_fret").val();
	var recher_destinataire=$("#recher_destinataire").val();
	var recher_destination=$("#recher_destination").val();
 
	var page_id=0;

    var dataString = 'page_id='+page_id+'&recher_date_debut='+recher_date_debut+'&recher_date_fin='+recher_date_fin+'&recher_expediteur='+recher_expediteur+'&recher_num_cni_='+recher_num_cni+'&recher_code_colis_colis_fret='+recher_code_colis_colis_fret+'&recher_destinataire='+recher_destinataire+'&recher_destination='+recher_destination;
	$.ajax({
			type: "POST",
			url: "colis_fret/charge_colis_fret.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').show();
				$(".aff_colis_fret").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_colis_fret").html(result).show();
			}
	 });
});


change_page_colis_fret('0');
change_page_colis_colis_fret('0');
});


function change_page_colis_fret(page_id){
	
	var recher_date_debut=$("#recher_date_debut").val();
	var recher_date_fin=$("#recher_date_fin").val();
	var recher_expediteur=$("#recher_expediteur").val();
	var recher_num_cni=$("#recher_num_cni").val();
	var recher_code_colis_colis_fret=$("#recher_code_colis_colis_fret").val();
	var recher_destinataire=$("#recher_destinataire").val();
	var recher_destination=$("#recher_destination").val();
 
	var page_id=0;

    var dataString = 'page_id='+page_id+'&recher_date_debut='+recher_date_debut+'&recher_date_fin='+recher_date_fin+'&recher_expediteur='+recher_expediteur+'&recher_num_cni_='+recher_num_cni+'&recher_code_colis_colis_fret='+recher_code_colis_colis_fret+'&recher_destinataire='+recher_destinataire+'&recher_destination='+recher_destination;
	$.ajax({
			type: "POST",
			url: "colis_fret/charge_colis_fret.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').show();
				$(".aff_colis_fret").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_colis_fret").html(result).show();
			}
	 });

}

function change_page_colis_colis_fret(page_id_cons){
	
	var page_id_cons=0;

	var dataString = 'page_id_cons='+ page_id_cons;
	$.ajax({
			type: "POST",
			url: "colis_fret/charge_colis_colis_fret.php",
			data: dataString,
			cache: false,
			
			beforeSend: function(result){

				setTimeout(function() {
					$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').show();
					$(".aff_colis_colis_fret").show();
				}, 1000);

			},
			
			success: function(result){
				
				setTimeout(function() {
					$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').hide();
					$(".aff_colis_colis_fret").html(result).show();
				}, 1000);
			}
	 });

}

