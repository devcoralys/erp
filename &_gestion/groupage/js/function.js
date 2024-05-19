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
	$(location).attr('href', 'groupage.php');
	//alert('Boutton d\'annulation enfonce');
});

$("#fermer").live('click', function(){
	$(location).attr('href', 'groupage.php');
	//alert('Boutton d\'annulation enfonce');
});

$("#select_single").hide();

var glob_val_col;

//$('.bloc_assurance').hide();


/*	
$("#payer_assurance").live('click', function(){
	if( $('input[name=payer_assurance]').is(':checked') )
	{
	    var pu = $('#pu_colis').val();
        var qte = $('#poids_colis').val();
        var emballage_colis = $('#emballage_colis').val();
        var valeur_colis=parseInt(pu*qte)+parseInt(emballage_colis);

	    $('.bloc_assurance').show();
	    $("#montant_assurance").val(0.35*valeur_colis);
	    
	    $('#montant_total_a_payer').html(parseInt($("#montant_assurance").val())+parseInt(valeur_colis)+' FCFA').show();
	}
	else
	{
	    var pu = $('#pu_colis').val();
        var qte = $('#poids_colis').val();
        var emballage_colis = $('#emballage_colis').val();
        var valeur_colis=parseInt(pu*qte)+parseInt(emballage_colis);
	    
	    $('.bloc_assurance').hide();
	    $("#montant_assurance").val(0);
	    
	    $('#montant_total_a_payer').html(parseInt($("#montant_assurance").val())+parseInt(valeur_colis)+' FCFA').show();
	}
	
	alert($("#montant_assurance").val());
});
*/

/**colis**/
$("#poids_colis").on('keyup', function(){
	$('#prix_total_colis').hide();
	var pu = $('#pu_colis').val();
	var qte = $('#poids_colis').val();
	var emballage_colis = $('#emballage_colis').val();
	$('#prix_total_colis').html(parseInt(pu*qte)+parseInt(emballage_colis)+' FCFA').show();
	
	var valeur_colis=parseInt(pu*qte)+parseInt(emballage_colis);

	$('#prix_total_colis').html(parseInt(valeur_colis)+' FCFA').show();
	
});

$("#pu_colis").on('keyup', function(){
	$('#prix_total_colis').hide();
	var pu = $('#pu_colis').val();
	var qte = $('#poids_colis').val();
	var emballage_colis = $('#emballage_colis').val();
	$('#prix_total_colis').html(parseInt(pu*qte)+parseInt(emballage_colis)+' FCFA').show();
	
	var valeur_colis=parseInt(pu*qte)+parseInt(emballage_colis);
	/*
	if( $('input[name=payer_assurance]').is(':checked') )
	{
	    $("#montant_assurance").val(0.35*valeur_colis);
	}
	else
	{
	    $("#montant_assurance").val(0);
	}
	*/
	
	$('#prix_total_colis').html(parseInt(valeur_colis)+' FCFA').show();
	
});

$("#emballage_colis").on('keyup', function(){
	$('#prix_total_colis').hide();
	var pu = $('#pu_colis').val();
	var qte = $('#poids_colis').val();
	var emballage_colis = $('#emballage_colis').val();
	$('#prix_total_colis').html(parseInt(pu*qte)+parseInt(emballage_colis)+' FCFA').show();
	
	var valeur_colis=parseInt(pu*qte)+parseInt(emballage_colis);
	
	
	/*
	if( $('input[name=payer_assurance]').is(':checked') )
	{
	    $("#montant_assurance").val(0.35*valeur_colis);
	}
	else
	{
	    $("#montant_assurance").val(0);
	}
	*/
	
	$('#prix_total_colis').html(parseInt(valeur_colis)+' FCFA').show();
	
});




$('#ajout_colis').live('click', function(){
	$('#myModal_colis').modal('show');
});
$('#envoie_colis').live('click',function(){	

	var nbre_colis=$("#nbre_colis").val();
	var nbre_article=$("#nbre_article").val();
	var nature_colis=$("#nature_colis").val();
	var poids_colis=$("#poids_colis").val();
	var pu_colis=$("#pu_colis").val();
	var emballage_colis=$("#emballage_colis").val();
	var time_groupage=$("#time_groupage").val();
	//var montant_assurance=$("#montant_assurance").val();


	var dataString=
	"nbre_colis="+nbre_colis
	+"&nature_colis="+nature_colis
	+"&poids_colis="+poids_colis
	+"&pu_colis="+pu_colis
	+"&emballage_colis="+emballage_colis
	+"&time_groupage="+time_groupage
	;
   	
	//alert(dataString);
	
	if(nbre_colis=='' || nbre_article=='' || nature_colis=='' || poids_colis=='' || emballage_colis=='')
	{
	  	$("div.msg_erreur").addClass("red"); 
		$("div.msg_erreur").removeClass("green");
		$("div.msg_erreur").html("Tous les champs sont obligatoires !").show();  
	}
    else
    {
	$.ajax({
	type: "POST",
	url: "groupage/ajout_colis.php",
	data: "nbre_colis="+nbre_colis+"&nbre_article="+nbre_article+"&nature_colis="+nature_colis+"&poids_colis="+poids_colis+"&pu_colis="+pu_colis+"&emballage_colis="+emballage_colis+"&time_groupage="+time_groupage,//+"&montant_assurance="+montant_assurance,
	success: function(msg){
		
		if(msg==1)
		{
			$("div.msg_erreur").addClass("red"); 
			$("div.msg_erreur").removeClass("green");
			$("div.msg_erreur").html("Cet colis existe d&eacute;j&agrave; !").show();
		}
		else
		{
			 $('#myModal_groupage').modal('toggle');
			 $("div.msg_erreur").hide(); 
			 $("#nbre_colis").val('');
			 $("#nbre_article").val('');
			 $("#nature_colis").val('');
			 $("#poids_colis").val('');
			 $("#pu_colis").val('');
			 $("#emballage_colis").val('');
			 $("#time_groupage").val('');
			 //$("#montant_assurance").val('');
			 //change_page_groupage('0');
			 location.reload();
		}
	}
 });
	
 return false;
    }
}); 
/*Fin coliss */



$("#valeur_colis").on('keyup', function(){
//	$('#prix_total_colis').hide();
	var vc = $('#valeur_colis').val();
	var prc = 0.35;
	var ma = vc*prc;
	
	$('#montant_assurance').val(parseInt(ma));
	
	$('#montant_aff_assurance').html(parseInt(ma));
	
	
	$.ajax({
	type: "GET",
	url: "groupage/calcul_total.php",
	//data: "valeur_colis="+valeur_colis+"&montant_assurance="+montant_assurance,//+"&time_groupage="+time_groupage,//+"&montant_assurance="+montant_assurance,
    	success: function(valeur){
    		
    		$('#prix_final_colis').html(valeur+' FCFA').show();
    		
    		$('#montant_total_a_payer').html(parseInt(valeur)+parseInt(ma)+' FCFA').show();
    		
    		//alert(valeur);
    	}
    });
    
});
    
    
$('#ajout_assurance').live('click', function(){
	$('#myModal_assurance').modal('show');
});
$('#envoie_assurance').live('click',function(){	

	var valeur_colis=$("#valeur_colis").val();
	var montant_assurance=$("#montant_assurance").val();
//	var time_groupage=$("#time_groupage").val();


	var dataString=
	"valeur_colis="+valeur_colis
	+"&montant_assurance="+montant_assurance
//	+"&time_groupage="+time_groupage
	;
   	
	//alert(dataString);
	
	if(valeur_colis=='' || valeur_colis==0)
	{
	    
	    	$("div.msg_erreur").addClass("red"); 
			$("div.msg_erreur").removeClass("green");
			$("div.msg_erreur").html("La valeur estimative du colis est obligatoire !").show();
	    	$("#valeur_colis").focus();
	}
	else
	{

	$.ajax({
	type: "POST",
	url: "groupage/ajout_assurance.php",
	data: "valeur_colis="+valeur_colis+"&montant_assurance="+montant_assurance,//+"&time_groupage="+time_groupage,//+"&montant_assurance="+montant_assurance,
	success: function(msg){
		
		if(msg==1)
		{
			$("div.msg_erreur").addClass("red"); 
			$("div.msg_erreur").removeClass("green");
			$("div.msg_erreur").html("Cette assurance existe d&eacute;j&agrave; !").show();
		}
		else
		{
			 $('#myModal_groupage').modal('toggle');
			 $("div.msg_erreur").hide(); 
			 $("#valeur_colis").val('');
			 $("#montant_assurance").val('');
			// $("#time_groupage").val('');
			 //change_page_groupage('0');
			 location.reload();
        		}
        	}
         });
          return false;
	}
	

}); 
/*Fin assurance */

/**groupage**/

$(".div_dern_delai").hide();

$('input[name=immediat]').live('change', function(){
	if( $('input[name=immediat]').is(':checked') ){
		$(".div_dern_delai").show();
	} else {
		$(".div_dern_delai").hide();
	}
});

//Création
$('#ajout_groupage').live('click', function(){
	$('#myModal_groupage').modal('show');
});
$('#envoie_groupage').live('click',function(){	

	var date_groupage=$("#date_groupage").val();
	//var code_colis_groupage=$("#code_colis_groupage").val();
	var expediteur_groupage=$("#expediteur_groupage").val();
	var num_cni_expediteur_groupage=$("#num_cni_expediteur_groupage").val();
	var tel_expediteur_groupage=$("#tel_expediteur_groupage").val();
	var destinataire_groupage=$("#destinataire_groupage").val();
	var destination_groupage=$("#destination_groupage").val();
	var tel_destinataire_groupage=$("#tel_destinataire_groupage").val();
	var adresse_recuperation_groupage=$("#adresse_recuperation_groupage").val();
	var nom_recuperateur=$("#nom_recuperateur").val();
	var tel_recuperateur=$("#tel_recuperateur").val();
	var agence_id=$("#agence_id").val();

	var type_piece_id=$("#type_piece_id").val();


	var dataString=
	"date_groupage="+date_groupage
	//+"&code_colis_groupage="+code_colis_groupage
	+"&expediteur_groupage="+expediteur_groupage
	+"&num_cni_expediteur_groupage="+num_cni_expediteur_groupage
	+"&tel_expediteur_groupage="+tel_expediteur_groupage
	+"&destinataire_groupage="+destinataire_groupage
	+"&destination_groupage="+destination_groupage
	+"&tel_destinataire_groupage="+tel_destinataire_groupage
	+"&adresse_recuperation_groupage="+adresse_recuperation_groupage
	+"&nom_recuperateur="+nom_recuperateur
	+"&tel_recuperateur="+tel_recuperateur
	+"&agence_id="+agence_id
	+"&type_piece_id="+type_piece_id
	;
   	
	// alert(dataString);
	
		if(date_groupage=='' || expediteur_groupage=='' || num_cni_expediteur_groupage=='' || tel_expediteur_groupage=='' || adresse_recuperation_groupage=='' || nom_recuperateur=='' || tel_recuperateur=='' || agence_id =='' || type_piece_id == '')
		{
	 $("div.msg_erreur").addClass("red"); 
	 $("div.msg_erreur").removeClass("green");
	$("div.msg_erreur").html("Tous les champs sont obligatoires !").show();
		}
		else
		{
	
	

	$.ajax({
	type: "POST",
	url: "groupage/ajout_groupage.php",
	data: "date_groupage="+date_groupage/*+"&code_colis_groupage="+code_colis_groupage*/+"&expediteur_groupage="+expediteur_groupage+"&num_cni_expediteur_groupage="+num_cni_expediteur_groupage+"&tel_expediteur_groupage="+tel_expediteur_groupage+"&destinataire_groupage="+destinataire_groupage+"&destination_groupage="+destination_groupage+"&tel_destinataire_groupage="+tel_destinataire_groupage+"&adresse_recuperation_groupage="+adresse_recuperation_groupage+"&nom_recuperateur="+nom_recuperateur+"&tel_recuperateur="+tel_recuperateur+"&agence_id="+agence_id+"&type_piece_id="+type_piece_id,
	success: function(msg){
		
		if(msg==1)
		{
	 $("div.msg_erreur").addClass("red"); 
	 $("div.msg_erreur").removeClass("green");
	$("div.msg_erreur").html("Cet groupages existe d&eacute;j&agrave; !").show();
		}
		else
		{
			 $('#myModal_groupage').modal('toggle');
			 $("div.msg_erreur").hide(); 
			 $("#date_groupage").val('');
			// $("#code_colis_groupage").val('');
			 $("#expediteur_groupage").val('');
			 $("#num_cni_expediteur_groupage").val('');
			 $("#tel_expediteur_groupage").val('');
			 $("#code_colis_groupage").val('');
			 $("#destinataire_groupage").val('');
			 $("#destination_groupage").val('');
			 $("#tel_destinataire_groupage").val('');
			 $("#adresse_recuperation_groupage").val('');
			 $("#nom_recuperateur").val('');
			 $("#tel_recuperateur").val('');
			 $("#agence_id").val('');
			 $("#type_piece_id").val('');

			 //change_page_groupage('0');
			 $(location).attr('href','groupage.php');
		}
	}
 });
	
 return false;
 
		}
}); 

//Modification
$(".edit_colis").live('click', function() {
var id_ref = $(this).attr('data-id');

	$.ajax({
		type: "GET",
		url: "groupage/form_modifier_colis.php",
		data: "ref="+id_ref,
		success: function(msg){
			$("#affiche_colis_mod").html(msg);
			$("#myModal_colis_mod").modal('show');	
		}
	});

});
$('#form_colis_mod').live('submit',function(){	

	$.ajax({
		type: "POST",
		url: "modif_colis.php",
		data: "qte_colis_mod="+$("#qte_colis_mod").val()+"&designation_colis_mod="+$("#designation_colis_mod").val()+"&prix_colis_mod="+$("#prix_colis_mod").val(),
		success: function(msg){
			$(location).attr('href','detail_groupage.php');
		}
	});
	return false;
});


$('.detail_groupage').live('click', function(){

	var id_ref = $(this).attr('data-id');
		$.ajax({
		type: "GET",
		url: "groupage/recup_groupage.php",
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
			url: "groupage/terminer_groupage.php",
			success: function(msg){
				location.reload();
			}
		});
});

//Validation

/**groupage**/

/*Sup colis */
$(".button_annul").live('click', function(){
	$('#myModal_colis_sup').modal('toggle');
});
$(".delete_colis").live('click', function() {
	var id_ref = $(this).attr('data-id');
		$.ajax({
		type: "GET",
		url: "groupage/form_supprimer_colis.php",
		data: "ref="+id_ref,
			success: function(msg){
				$("#affiche_colis_sup").html(msg);
				$("#myModal_colis_sup").modal('show');	
			}
		});
	});
	
	$('#submit_colis_sup').live('click',function(){
		$(".aff_colis").hide();				  
	$.ajax({
		type: "POST",
		url: "groupage/sup_colis.php",
		success: function(msg){
			
			$('#myModal_colis_sup').modal('toggle');
			$("div.msg_erreur").hide(); 
			$(".clo_er").hide(); 
			//change_page_colis('0');
			$(location).attr('href','groupage.php');
			//$(".aff_colis").html('Suppression effectu&eacute;e avec succ&egrave;s veuillez actualiser la page SVP !').show();
		}
	 });
	 return false;
	}); 


$('#recher_date_debut').on('keyup',function(){
   
	var recher_date_debut=$("#recher_date_debut").val();
	var recher_date_fin=$("#recher_date_fin").val();
	var recher_expediteur=$("#recher_expediteur").val();
	var recher_num_cni=$("#recher_num_cni").val();
	var recher_code_colis=$("#recher_code_colis").val();
	var recher_destinataire=$("#recher_destinataire").val();
	var recher_destination=$("#recher_destination").val();
 
	var page_id=0;

    var dataString = 'page_id='+page_id+'&recher_date_debut='+recher_date_debut+'&recher_date_fin='+recher_date_fin+'&recher_expediteur='+recher_expediteur+'&recher_num_cni_='+recher_num_cni+'&recher_code_colis='+recher_code_colis+'&recher_destinataire='+recher_destinataire+'&recher_destination='+recher_destination;
	$.ajax({
			type: "POST",
			url: "groupage/charge_groupage.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').show();
				$(".aff_groupage").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_groupage").html(result).show();
			}
	 });
});
$('#recher_date_fin').on('keyup',function(){
   
	var recher_date_debut=$("#recher_date_debut").val();
	var recher_date_fin=$("#recher_date_fin").val();
	var recher_expediteur=$("#recher_expediteur").val();
	var recher_num_cni=$("#recher_num_cni").val();
	var recher_code_colis=$("#recher_code_colis").val();
	var recher_destinataire=$("#recher_destinataire").val();
	var recher_destination=$("#recher_destination").val();
 
	var page_id=0;

    var dataString = 'page_id='+page_id+'&recher_date_debut='+recher_date_debut+'&recher_date_fin='+recher_date_fin+'&recher_expediteur='+recher_expediteur+'&recher_num_cni_='+recher_num_cni+'&recher_code_colis='+recher_code_colis+'&recher_destinataire='+recher_destinataire+'&recher_destination='+recher_destination;
	$.ajax({
			type: "POST",
			url: "groupage/charge_groupage.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').show();
				$(".aff_groupage").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_groupage").html(result).show();
			}
	 });
});
$('#recher_date_debut').on('change',function(){
   
	var recher_date_debut=$("#recher_date_debut").val();
	var recher_date_fin=$("#recher_date_fin").val();
	var recher_expediteur=$("#recher_expediteur").val();
	var recher_num_cni=$("#recher_num_cni").val();
	var recher_code_colis=$("#recher_code_colis").val();
	var recher_destinataire=$("#recher_destinataire").val();
	var recher_destination=$("#recher_destination").val();
 
	var page_id=0;

    var dataString = 'page_id='+page_id+'&recher_date_debut='+recher_date_debut+'&recher_date_fin='+recher_date_fin+'&recher_expediteur='+recher_expediteur+'&recher_num_cni_='+recher_num_cni+'&recher_code_colis='+recher_code_colis+'&recher_destinataire='+recher_destinataire+'&recher_destination='+recher_destination;
	$.ajax({
			type: "POST",
			url: "groupage/charge_groupage.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').show();
				$(".aff_groupage").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_groupage").html(result).show();
			}
	 });
});
$('#recher_date_fin').on('change',function(){
   
	var recher_date_debut=$("#recher_date_debut").val();
	var recher_date_fin=$("#recher_date_fin").val();
	var recher_expediteur=$("#recher_expediteur").val();
	var recher_num_cni=$("#recher_num_cni").val();
	var recher_code_colis=$("#recher_code_colis").val();
	var recher_destinataire=$("#recher_destinataire").val();
	var recher_destination=$("#recher_destination").val();
 
	var page_id=0;

    var dataString = 'page_id='+page_id+'&recher_date_debut='+recher_date_debut+'&recher_date_fin='+recher_date_fin+'&recher_expediteur='+recher_expediteur+'&recher_num_cni_='+recher_num_cni+'&recher_code_colis='+recher_code_colis+'&recher_destinataire='+recher_destinataire+'&recher_destination='+recher_destination;
	$.ajax({
			type: "POST",
			url: "groupage/charge_groupage.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').show();
				$(".aff_groupage").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_groupage").html(result).show();
			}
	 });
});
$('#recher_expediteur').on('keyup',function(){
   
	var recher_date_debut=$("#recher_date_debut").val();
	var recher_date_fin=$("#recher_date_fin").val();
	var recher_expediteur=$("#recher_expediteur").val();
	var recher_num_cni=$("#recher_num_cni").val();
	var recher_code_colis=$("#recher_code_colis").val();
	var recher_destinataire=$("#recher_destinataire").val();
	var recher_destination=$("#recher_destination").val();
 
	var page_id=0;

    var dataString = 'page_id='+page_id+'&recher_date_debut='+recher_date_debut+'&recher_date_fin='+recher_date_fin+'&recher_expediteur='+recher_expediteur+'&recher_num_cni_='+recher_num_cni+'&recher_code_colis='+recher_code_colis+'&recher_destinataire='+recher_destinataire+'&recher_destination='+recher_destination;
	$.ajax({
			type: "POST",
			url: "groupage/charge_groupage.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').show();
				$(".aff_groupage").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_groupage").html(result).show();
			}
	 });
});
$('#recher_num_cni').on('keyup',function(){
   
	var recher_date_debut=$("#recher_date_debut").val();
	var recher_date_fin=$("#recher_date_fin").val();
	var recher_expediteur=$("#recher_expediteur").val();
	var recher_num_cni=$("#recher_num_cni").val();
	var recher_code_colis=$("#recher_code_colis").val();
	var recher_destinataire=$("#recher_destinataire").val();
	var recher_destination=$("#recher_destination").val();
 
	var page_id=0;

    var dataString = 'page_id='+page_id+'&recher_date_debut='+recher_date_debut+'&recher_date_fin='+recher_date_fin+'&recher_expediteur='+recher_expediteur+'&recher_num_cni_='+recher_num_cni+'&recher_code_colis='+recher_code_colis+'&recher_destinataire='+recher_destinataire+'&recher_destination='+recher_destination;
	$.ajax({
			type: "POST",
			url: "groupage/charge_groupage.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').show();
				$(".aff_groupage").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_groupage").html(result).show();
			}
	 });
});
$('#recher_code_colis').on('keyup',function(){
   
	var recher_date_debut=$("#recher_date_debut").val();
	var recher_date_fin=$("#recher_date_fin").val();
	var recher_expediteur=$("#recher_expediteur").val();
	var recher_num_cni=$("#recher_num_cni").val();
	var recher_code_colis=$("#recher_code_colis").val();
	var recher_destinataire=$("#recher_destinataire").val();
	var recher_destination=$("#recher_destination").val();
 
	var page_id=0;

    var dataString = 'page_id='+page_id+'&recher_date_debut='+recher_date_debut+'&recher_date_fin='+recher_date_fin+'&recher_expediteur='+recher_expediteur+'&recher_num_cni_='+recher_num_cni+'&recher_code_colis='+recher_code_colis+'&recher_destinataire='+recher_destinataire+'&recher_destination='+recher_destination;
	$.ajax({
			type: "POST",
			url: "groupage/charge_groupage.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').show();
				$(".aff_groupage").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_groupage").html(result).show();
			}
	 });
});
$('#recher_destinataire').on('keyup',function(){
   
	var recher_date_debut=$("#recher_date_debut").val();
	var recher_date_fin=$("#recher_date_fin").val();
	var recher_expediteur=$("#recher_expediteur").val();
	var recher_num_cni=$("#recher_num_cni").val();
	var recher_code_colis=$("#recher_code_colis").val();
	var recher_destinataire=$("#recher_destinataire").val();
	var recher_destination=$("#recher_destination").val();
 
	var page_id=0;

    var dataString = 'page_id='+page_id+'&recher_date_debut='+recher_date_debut+'&recher_date_fin='+recher_date_fin+'&recher_expediteur='+recher_expediteur+'&recher_num_cni_='+recher_num_cni+'&recher_code_colis='+recher_code_colis+'&recher_destinataire='+recher_destinataire+'&recher_destination='+recher_destination;
	$.ajax({
			type: "POST",
			url: "groupage/charge_groupage.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').show();
				$(".aff_groupage").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_groupage").html(result).show();
			}
	 });
});
$('#recher_destination').on('keyup',function(){
   
	var recher_date_debut=$("#recher_date_debut").val();
	var recher_date_fin=$("#recher_date_fin").val();
	var recher_expediteur=$("#recher_expediteur").val();
	var recher_num_cni=$("#recher_num_cni").val();
	var recher_code_colis=$("#recher_code_colis").val();
	var recher_destinataire=$("#recher_destinataire").val();
	var recher_destination=$("#recher_destination").val();
 
	var page_id=0;

    var dataString = 'page_id='+page_id+'&recher_date_debut='+recher_date_debut+'&recher_date_fin='+recher_date_fin+'&recher_expediteur='+recher_expediteur+'&recher_num_cni_='+recher_num_cni+'&recher_code_colis='+recher_code_colis+'&recher_destinataire='+recher_destinataire+'&recher_destination='+recher_destination;
	$.ajax({
			type: "POST",
			url: "groupage/charge_groupage.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').show();
				$(".aff_groupage").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_groupage").html(result).show();
			}
	 });
});


change_page_groupage('0');
change_page_colis('0');
});


function change_page_groupage(page_id){
	
	var recher_date_debut=$("#recher_date_debut").val();
	var recher_date_fin=$("#recher_date_fin").val();
	var recher_expediteur=$("#recher_expediteur").val();
	var recher_num_cni=$("#recher_num_cni").val();
	var recher_code_colis=$("#recher_code_colis").val();
	var recher_destinataire=$("#recher_destinataire").val();
	var recher_destination=$("#recher_destination").val();
 
	var page_id=0;

    var dataString = 'page_id='+page_id+'&recher_date_debut='+recher_date_debut+'&recher_date_fin='+recher_date_fin+'&recher_expediteur='+recher_expediteur+'&recher_num_cni_='+recher_num_cni+'&recher_code_colis='+recher_code_colis+'&recher_destinataire='+recher_destinataire+'&recher_destination='+recher_destination;
	$.ajax({
			type: "POST",
			url: "groupage/charge_groupage.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').show();
				$(".aff_groupage").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_groupage").html(result).show();
			}
	 });

}

function change_page_colis(page_id_cons){
	
	var page_id_cons=0;

	var dataString = 'page_id_cons='+ page_id_cons;
	$.ajax({
			type: "POST",
			url: "groupage/charge_colis.php",
			data: dataString,
			cache: false,
			
			beforeSend: function(result){

				setTimeout(function() {
					$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').show();
					$(".aff_colis").show();
				}, 1000);

			},
			
			success: function(result){
				
				setTimeout(function() {
					$("div.chargement").html('<img src="../../img/loading.gif" style="width:55px; height:55px;" />').hide();
					$(".aff_colis").html(result).show();
				}, 1000);
			}
	 });

}

