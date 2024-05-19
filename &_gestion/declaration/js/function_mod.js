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

$("#retour_dec").live('click', function(){
	$(location).attr('href', 'declaration.php');
	//alert('Boutton d\'annulation enfonce');
});

$("#fermer").live('click', function(){
	$(location).attr('href', 'caisse.php');
	//alert('Boutton d\'annulation enfonce');
});

/**declaration**/
$('#dt_declaration').on('keyup', function(){
    var val_dt=$("#dt_declaration").val();
    var val_agio=0;
    
    val_agio=0.006*parseFloat(val_dt);
    
    $("#agio_declaration").val(val_agio);
    
    var montant_total=0;
    
    montant_total=parseFloat($("#dt_declaration").val())+parseFloat($("#agio_declaration").val())+parseFloat($("#tirage_declaration").val())+parseFloat($("#ouverture_declaration").val())+parseFloat($("#fdi_declaration").val())+parseFloat($("#assurance_declaration").val())+parseFloat($("#bsc_declaration").val());
    $("#aff_total_declaration").html(''+montant_total+'');
});

$('#agio_declaration').on('keyup', function(){
    montant_total=parseFloat($("#dt_declaration").val())+parseFloat($("#agio_declaration").val())+parseFloat($("#tirage_declaration").val())+parseFloat($("#ouverture_declaration").val())+parseFloat($("#fdi_declaration").val())+parseFloat($("#assurance_declaration").val())+parseFloat($("#bsc_declaration").val());
    $("#aff_total_declaration").html(''+montant_total+'');
});

$('#tirage_declaration').on('keyup', function(){
    montant_total=parseFloat($("#dt_declaration").val())+parseFloat($("#agio_declaration").val())+parseFloat($("#tirage_declaration").val())+parseFloat($("#ouverture_declaration").val())+parseFloat($("#fdi_declaration").val())+parseFloat($("#assurance_declaration").val())+parseFloat($("#bsc_declaration").val());
    $("#aff_total_declaration").html(''+montant_total+'');
});

$('#ouverture_declaration').on('keyup', function(){
    montant_total=parseFloat($("#dt_declaration").val())+parseFloat($("#agio_declaration").val())+parseFloat($("#tirage_declaration").val())+parseFloat($("#ouverture_declaration").val())+parseFloat($("#fdi_declaration").val())+parseFloat($("#assurance_declaration").val())+parseFloat($("#bsc_declaration").val());
    $("#aff_total_declaration").html(''+montant_total+'');
});

$('#fdi_declaration').on('keyup', function(){
    montant_total=parseFloat($("#dt_declaration").val())+parseFloat($("#agio_declaration").val())+parseFloat($("#tirage_declaration").val())+parseFloat($("#ouverture_declaration").val())+parseFloat($("#fdi_declaration").val())+parseFloat($("#assurance_declaration").val())+parseFloat($("#bsc_declaration").val());
    $("#aff_total_declaration").html(''+montant_total+'');
});

$('#assurance_declaration').on('keyup', function(){
    montant_total=parseFloat($("#dt_declaration").val())+parseFloat($("#agio_declaration").val())+parseFloat($("#tirage_declaration").val())+parseFloat($("#ouverture_declaration").val())+parseFloat($("#fdi_declaration").val())+parseFloat($("#assurance_declaration").val())+parseFloat($("#bsc_declaration").val());
    $("#aff_total_declaration").html(''+montant_total+'');
});

$('#bsc_declaration').on('keyup', function(){
    montant_total=parseFloat($("#dt_declaration").val())+parseFloat($("#agio_declaration").val())+parseFloat($("#tirage_declaration").val())+parseFloat($("#ouverture_declaration").val())+parseFloat($("#fdi_declaration").val())+parseFloat($("#assurance_declaration").val())+parseFloat($("#bsc_declaration").val());
    $("#aff_total_declaration").html(''+montant_total+'');
});



$('#ajout_declaration').live('click', function(){
	$('#myModal_declaration').modal('show');
});
$('#form_declaration').live('submit',function(){
    
    var date_declaration=$("#date_declaration").val();
    var reference_declaration=$("#reference_declaration").val();
    var client_declaration=$("#client_declaration").val();
    var regime_declaration=$("#regime_declaration").val();
    var bureau_declaration=$("#bureau_declaration").val();
    var num_declaration=$("#num_declaration").val();
    var num_liquidation_declaration=$("#num_liquidation_declaration").val();
    var paiement_declaration=$("#paiement_declaration").val();
    var dt_declaration=$("#dt_declaration").val();
    var agio_declaration=$("#agio_declaration").val();
    var tirage_declaration=$("#tirage_declaration").val();
    var ouverture_declaration=$("#ouverture_declaration").val();
    var fdi_declaration=$("#fdi_declaration").val();
    var assurance_declaration=$("#assurance_declaration").val();
    var num_quittance_declaration=$("#num_quittance_declaration").val();
    var conteneur_declaration=$("#conteneur_declaration").val();
    var bsc_declaration=$("#bsc_declaration").val();
    var lta_declaration=$("#lta_declaration").val();
    var poids_declaration=$("#poids_declaration").val();
    
   
   	
	$.ajax({
	type: "POST",
	url: "declaration/modif_declaration.php",
	data: 
    "date_declaration="+date_declaration
    +"&reference_declaration="+reference_declaration
    +"&client_declaration="+client_declaration
    +"&regime_declaration="+regime_declaration
    +"&bureau_declaration="+bureau_declaration
    +"&num_declaration="+num_declaration
    +"&num_liquidation_declaration="+num_liquidation_declaration
    +"&paiement_declaration="+paiement_declaration
    +"&dt_declaration="+dt_declaration
    +"&agio_declaration="+agio_declaration
    +"&tirage_declaration="+tirage_declaration
    +"&ouverture_declaration="+ouverture_declaration
    +"&fdi_declaration="+fdi_declaration
    +"&assurance_declaration="+assurance_declaration
    +"&num_quittance_declaration="+num_quittance_declaration
    +"&conteneur_declaration="+conteneur_declaration
    +"&bsc_declaration="+bsc_declaration
    +"&lta_declaration="+lta_declaration
    +"&poids_declaration="+poids_declaration
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
			 $('#myModal_declaration').modal('toggle');
			 $("div.msg_erreur").hide(); 
			 $("#client_num").val('');
			 $("#date_depot_declaration").val('');
			 $("#date_retrait_declaration").val('');
			 $("#secur_traite_declaration").val('');
			 //change_page_declaration('0');
			 */
			 $(location).attr('href','declaration.php');
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
