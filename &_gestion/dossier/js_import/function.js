$(document).ready(function(){ 

$("div.msg_erreur").hide(); 

$("div.chargement").html('<img src="../../img/giphy.gif" style="width:55px; height:55px;" />').show();
$("div.aff_dossier_maritime").hide();
setTimeout(function() {
$("div.chargement").html('<img src="../../img/giphy.gif" style="width:55px; height:55px;" />').hide();
$("div.aff_dossier_maritime").show();
}, 1500);


$("div.chargement").html('<img src="../../img/giphy.gif" style="width:55px; height:55px;" />').show();
$("div.aff_dossier_aerien").hide();
setTimeout(function() {
$("div.chargement").html('<img src="../../img/giphy.gif" style="width:55px; height:55px;" />').hide();
$("div.aff_dossier_aerien").show();
}, 1500);


$("div.chargement").html('<img src="../../img/giphy.gif" style="width:55px; height:55px;" />').show();
$("div.aff_dossier_actif").hide();
setTimeout(function() {
$("div.chargement").html('<img src="../../img/giphy.gif" style="width:55px; height:55px;" />').hide();
$("div.aff_dossier_actif").show();
}, 1500);

$("div.chargement").html('<img src="../../img/giphy.gif" style="width:55px; height:55px;" />').show();
$("div.aff_dossier_termine").hide();
setTimeout(function() {
$("div.chargement").html('<img src="../../img/giphy.gif" style="width:55px; height:55px;" />').hide();
$("div.aff_dossier_termine").show();
}, 1500);


change_page_dossier_maritime('0');
change_page_dossier_aerien('0');
change_page_dossier_actif('0');
change_page_article('0');
change_page_container('0');

$('.button_annul').live('click',function(){
	$("div.msg_erreur").hide(); 
    $(".clo_er").hide(); 
	location.reload();
});

$(".button_annul").live('click', function(){
	$(location).attr('href', 'besoin.php');
	//alert('Boutton d\'annulation enfonce');
});

$("#fermer").live('click', function(){
	$(location).attr('href', 'besoin.php');
	//alert('Boutton d\'annulation enfonce');
});


$(".recalcul").live('click', function(){
	change_page_article('0');
});

//Calculs cotation
$("#fob_cfa").val(parseFloat($("#fob_euro").val())*659.91);
$("#caf").val(parseFloat($("#fob_cfa").val())+parseFloat($("#fret").val())+parseFloat($("#ass").val()));

if($('#fob_cfa').val()<500000)
{
	$('#rpi').val(0);
}

if($('#fob_cfa').val()<1000000 && $('#fob_cfa').val()>=500000 )
{
	$('#rpi').val(70000);
}

if($('#fob_cfa').val()<13350000 && $('#fob_cfa').val()>=1000000 )
{
	$('#rpi').val(100000);
}

if($('#fob_cfa').val()>13350000)
{
	$('#rpi').val(parseFloat($('#fob_cfa').val())*0.0075);
}

$("#fob_euro").on('keyup', function(){
	$("#fob_cfa").val(parseFloat($("#fob_euro").val())*659.91);
	$("#caf").val(parseFloat($("#fob_cfa").val())+parseFloat($("#fret").val())+parseFloat($("#ass").val()));

	if($('#fob_cfa').val()<500000)
	{
		$('#rpi').val(0);
	}

	if($('#fob_cfa').val()<1000000 && $('#fob_cfa').val()>=500000 )
	{
		$('#rpi').val(70000);
	}

	if($('#fob_cfa').val()<13350000 && $('#fob_cfa').val()>=1000000 )
	{
		$('#rpi').val(100000);
	}

	if($('#fob_cfa').val()>13350000)
	{
		$('#rpi').val($('#fob_cfa').val()*0.0075);
	}

});

$("#fret").on('keyup', function(){
	$("#fob_cfa").val(parseFloat($("#fob_euro").val())*659.91);
	$("#caf").val(parseFloat($("#fob_cfa").val())+parseFloat($("#fret").val())+parseFloat($("#ass").val()));

	if($('#fob_cfa').val()<500000)
	{
		$('#rpi').val(0);
	}

	if($('#fob_cfa').val()<1000000 && $('#fob_cfa').val()>=500000 )
	{
		$('#rpi').val(70000);
	}

	if($('#fob_cfa').val()<13350000 && $('#fob_cfa').val()>=1000000 )
	{
		$('#rpi').val(100000);
	}

	if($('#fob_cfa').val()>13350000)
	{
		$('#rpi').val($('#fob_cfa').val()*0.0075);
	}

});

$("#ass").on('keyup', function(){
	$("#fob_cfa").val(parseFloat($("#fob_euro").val())*659.91);
	$("#caf").val(parseFloat($("#fob_cfa").val())+parseFloat($("#fret").val())+parseFloat($("#ass").val()));

	if($('#fob_cfa').val()<500000)
	{
		$('#rpi').val(0);
	}

	if($('#fob_cfa').val()<1000000 && $('#fob_cfa').val()>=500000 )
	{
		$('#rpi').val(70000);
	}

	if($('#fob_cfa').val()<13350000 && $('#fob_cfa').val()>=1000000 )
	{
		$('#rpi').val(100000);
	}

	if($('#fob_cfa').val()>13350000)
	{
		$('#rpi').val($('#fob_cfa').val()*0.0075);
	}

});

$("#dt_total").live('change', function(){
	$("#agio").val(parseFloat($("#dt_total").val())*0.006);
});
$("#agio").val(parseFloat($("#dt_total").val())*0.006);

//Calcul Frais Transit
var total_frais_transit=parseFloat($("#tirage_declaration").val())+parseFloat($("#sydam").val())+parseFloat($("#fiche_assurance").val())+parseFloat($("#agio").val());
$("#total_frais_transit").html(parseFloat($("#tirage_declaration").val())+parseFloat($("#sydam").val())+parseFloat($("#fiche_assurance").val())+parseFloat($("#agio").val())+' XOF');




$("#tirage_declaration").on('keyup', function(){
	$("#total_frais_transit").html(parseFloat($("#tirage_declaration").val())+parseFloat($("#sydam").val())+parseFloat($("#fiche_assurance").val())+parseFloat($("#agio").val())+' XOF');
});

$("#sydam").on('keyup', function(){
	$("#total_frais_transit").html(parseFloat($("#tirage_declaration").val())+parseFloat($("#sydam").val())+parseFloat($("#fiche_assurance").val())+parseFloat($("#agio").val())+' XOF');
	
});

$("#fiche_assurance").on('keyup', function(){
	$("#total_frais_transit").html(parseFloat($("#tirage_declaration").val())+parseFloat($("#sydam").val())+parseFloat($("#fiche_assurance").val())+parseFloat($("#agio").val())+' XOF');
		
});
//alert (parseFloat($("#agio").val()));

//Calcul Débours Divers
var total_debours_divers=parseFloat($("#ouverture_dossier").val())+parseFloat($("#acconage").val())+parseFloat($("#surestarie").val())+parseFloat($("#echange_bl").val())+parseFloat($("#caution").val())+parseFloat($("#livraison").val())+parseFloat($("#ts_douane").val())+parseFloat($("#retrait_documentaire").val())+parseFloat($("#debours_divers").val())+parseFloat($("#documentation_weeb").val())+parseFloat($("#bsc").val())+parseFloat($("#certificat_phyto").val())+parseFloat($("#api").val())+parseFloat($("#aiae").val())+parseFloat($("#certificat_veterinaire").val())+parseFloat($("#appurement_magasin").val())+parseFloat($("#magasinage").val())+parseFloat($("#sortie_pc").val())+parseFloat($("#commission").val())+parseFloat($("#escorte").val())+parseFloat($("#manutention").val());

$("#total_debours_divers").html(parseFloat($("#ouverture_dossier").val())+parseFloat($("#acconage").val())+parseFloat($("#surestarie").val())+parseFloat($("#echange_bl").val())+parseFloat($("#caution").val())+parseFloat($("#livraison").val())+parseFloat($("#ts_douane").val())+parseFloat($("#retrait_documentaire").val())+parseFloat($("#debours_divers").val())+parseFloat($("#documentation_weeb").val())+parseFloat($("#bsc").val())+parseFloat($("#certificat_phyto").val())+parseFloat($("#api").val())+parseFloat($("#aiae").val())+parseFloat($("#certificat_veterinaire").val())+parseFloat($("#appurement_magasin").val())+parseFloat($("#magasinage").val())+parseFloat($("#sortie_pc").val())+parseFloat($("#commission").val())+parseFloat($("#escorte").val())+parseFloat($("#manutention").val())+' XOF');
//Calcul Net A Payer


$("#ouverture_dossier").on('keyup', function(){
	$("#total_debours_divers").html(parseFloat($("#ouverture_dossier").val())+parseFloat($("#acconage").val())+parseFloat($("#surestarie").val())+parseFloat($("#echange_bl").val())+parseFloat($("#caution").val())+parseFloat($("#livraison").val())+parseFloat($("#ts_douane").val())+parseFloat($("#retrait_documentaire").val())+parseFloat($("#debours_divers").val())+parseFloat($("#documentation_weeb").val())+parseFloat($("#bsc").val())+parseFloat($("#certificat_phyto").val())+parseFloat($("#api").val())+parseFloat($("#aiae").val())+parseFloat($("#certificat_veterinaire").val())+parseFloat($("#appurement_magasin").val())+parseFloat($("#magasinage").val())+parseFloat($("#sortie_pc").val())+parseFloat($("#commission").val())+parseFloat($("#escorte").val())+parseFloat($("#manutention").val())+' XOF');
//Calcul Net A Payer

});

$("#acconage").on('keyup', function(){
	$("#total_debours_divers").html(parseFloat($("#ouverture_dossier").val())+parseFloat($("#acconage").val())+parseFloat($("#surestarie").val())+parseFloat($("#echange_bl").val())+parseFloat($("#caution").val())+parseFloat($("#livraison").val())+parseFloat($("#ts_douane").val())+parseFloat($("#retrait_documentaire").val())+parseFloat($("#debours_divers").val())+parseFloat($("#documentation_weeb").val())+parseFloat($("#bsc").val())+parseFloat($("#certificat_phyto").val())+parseFloat($("#api").val())+parseFloat($("#aiae").val())+parseFloat($("#certificat_veterinaire").val())+parseFloat($("#appurement_magasin").val())+parseFloat($("#magasinage").val())+parseFloat($("#sortie_pc").val())+parseFloat($("#commission").val())+parseFloat($("#escorte").val())+parseFloat($("#manutention").val())+' XOF');

});

$("#surestarie").on('keyup', function(){
	$("#total_debours_divers").html(parseFloat($("#ouverture_dossier").val())+parseFloat($("#acconage").val())+parseFloat($("#surestarie").val())+parseFloat($("#echange_bl").val())+parseFloat($("#caution").val())+parseFloat($("#livraison").val())+parseFloat($("#ts_douane").val())+parseFloat($("#retrait_documentaire").val())+parseFloat($("#debours_divers").val())+parseFloat($("#documentation_weeb").val())+parseFloat($("#bsc").val())+parseFloat($("#certificat_phyto").val())+parseFloat($("#api").val())+parseFloat($("#aiae").val())+parseFloat($("#certificat_veterinaire").val())+parseFloat($("#appurement_magasin").val())+parseFloat($("#magasinage").val())+parseFloat($("#sortie_pc").val())+parseFloat($("#commission").val())+parseFloat($("#escorte").val())+parseFloat($("#manutention").val())+' XOF');
//Calcul Net A Payer

});

$("#echange_bl").on('keyup', function(){
	$("#total_debours_divers").html(parseFloat($("#ouverture_dossier").val())+parseFloat($("#acconage").val())+parseFloat($("#surestarie").val())+parseFloat($("#echange_bl").val())+parseFloat($("#caution").val())+parseFloat($("#livraison").val())+parseFloat($("#ts_douane").val())+parseFloat($("#retrait_documentaire").val())+parseFloat($("#debours_divers").val())+parseFloat($("#documentation_weeb").val())+parseFloat($("#bsc").val())+parseFloat($("#certificat_phyto").val())+parseFloat($("#api").val())+parseFloat($("#aiae").val())+parseFloat($("#certificat_veterinaire").val())+parseFloat($("#appurement_magasin").val())+parseFloat($("#magasinage").val())+parseFloat($("#sortie_pc").val())+parseFloat($("#commission").val())+parseFloat($("#escorte").val())+parseFloat($("#manutention").val())+' XOF');
//Calcul Net A Payer

});

$("#caution").on('keyup', function(){
	$("#total_debours_divers").html(parseFloat($("#ouverture_dossier").val())+parseFloat($("#acconage").val())+parseFloat($("#surestarie").val())+parseFloat($("#echange_bl").val())+parseFloat($("#caution").val())+parseFloat($("#livraison").val())+parseFloat($("#ts_douane").val())+parseFloat($("#retrait_documentaire").val())+parseFloat($("#debours_divers").val())+parseFloat($("#documentation_weeb").val())+parseFloat($("#bsc").val())+parseFloat($("#certificat_phyto").val())+parseFloat($("#api").val())+parseFloat($("#aiae").val())+parseFloat($("#certificat_veterinaire").val())+parseFloat($("#appurement_magasin").val())+parseFloat($("#magasinage").val())+parseFloat($("#sortie_pc").val())+parseFloat($("#commission").val())+parseFloat($("#escorte").val())+parseFloat($("#manutention").val())+' XOF');
});

$("#livraison").on('keyup', function(){
	$("#total_debours_divers").html(parseFloat($("#ouverture_dossier").val())+parseFloat($("#acconage").val())+parseFloat($("#surestarie").val())+parseFloat($("#echange_bl").val())+parseFloat($("#caution").val())+parseFloat($("#livraison").val())+parseFloat($("#ts_douane").val())+parseFloat($("#retrait_documentaire").val())+parseFloat($("#debours_divers").val())+parseFloat($("#documentation_weeb").val())+parseFloat($("#bsc").val())+parseFloat($("#certificat_phyto").val())+parseFloat($("#api").val())+parseFloat($("#aiae").val())+parseFloat($("#certificat_veterinaire").val())+parseFloat($("#appurement_magasin").val())+parseFloat($("#magasinage").val())+parseFloat($("#sortie_pc").val())+parseFloat($("#commission").val())+parseFloat($("#escorte").val())+parseFloat($("#manutention").val())+' XOF');
//Calcul Net A Payer

});

$("#ts_douane").on('keyup', function(){
	$("#total_debours_divers").html(parseFloat($("#ouverture_dossier").val())+parseFloat($("#acconage").val())+parseFloat($("#surestarie").val())+parseFloat($("#echange_bl").val())+parseFloat($("#caution").val())+parseFloat($("#livraison").val())+parseFloat($("#ts_douane").val())+parseFloat($("#retrait_documentaire").val())+parseFloat($("#debours_divers").val())+parseFloat($("#documentation_weeb").val())+parseFloat($("#bsc").val())+parseFloat($("#certificat_phyto").val())+parseFloat($("#api").val())+parseFloat($("#aiae").val())+parseFloat($("#certificat_veterinaire").val())+parseFloat($("#appurement_magasin").val())+parseFloat($("#magasinage").val())+parseFloat($("#sortie_pc").val())+parseFloat($("#commission").val())+parseFloat($("#escorte").val())+parseFloat($("#manutention").val())+' XOF');
//Calcul Net A Payer

});

$("#retrait_documentaire").on('keyup', function(){
	$("#total_debours_divers").html(parseFloat($("#ouverture_dossier").val())+parseFloat($("#acconage").val())+parseFloat($("#surestarie").val())+parseFloat($("#echange_bl").val())+parseFloat($("#caution").val())+parseFloat($("#livraison").val())+parseFloat($("#ts_douane").val())+parseFloat($("#retrait_documentaire").val())+parseFloat($("#debours_divers").val())+parseFloat($("#documentation_weeb").val())+parseFloat($("#bsc").val())+parseFloat($("#certificat_phyto").val())+parseFloat($("#api").val())+parseFloat($("#aiae").val())+parseFloat($("#certificat_veterinaire").val())+parseFloat($("#appurement_magasin").val())+parseFloat($("#magasinage").val())+parseFloat($("#sortie_pc").val())+parseFloat($("#commission").val())+parseFloat($("#escorte").val())+parseFloat($("#manutention").val())+' XOF');
//Calcul Net A Payer

});

$("#debours_divers").on('keyup', function(){
	$("#total_debours_divers").html(parseFloat($("#ouverture_dossier").val())+parseFloat($("#acconage").val())+parseFloat($("#surestarie").val())+parseFloat($("#echange_bl").val())+parseFloat($("#caution").val())+parseFloat($("#livraison").val())+parseFloat($("#ts_douane").val())+parseFloat($("#retrait_documentaire").val())+parseFloat($("#debours_divers").val())+parseFloat($("#documentation_weeb").val())+parseFloat($("#bsc").val())+parseFloat($("#certificat_phyto").val())+parseFloat($("#api").val())+parseFloat($("#aiae").val())+parseFloat($("#certificat_veterinaire").val())+parseFloat($("#appurement_magasin").val())+parseFloat($("#magasinage").val())+parseFloat($("#sortie_pc").val())+parseFloat($("#commission").val())+parseFloat($("#escorte").val())+parseFloat($("#manutention").val())+' XOF');
//Calcul Net A Payer

});

$("#documentation_weeb").on('keyup', function(){
	$("#total_debours_divers").html(parseFloat($("#ouverture_dossier").val())+parseFloat($("#acconage").val())+parseFloat($("#surestarie").val())+parseFloat($("#echange_bl").val())+parseFloat($("#caution").val())+parseFloat($("#livraison").val())+parseFloat($("#ts_douane").val())+parseFloat($("#retrait_documentaire").val())+parseFloat($("#debours_divers").val())+parseFloat($("#documentation_weeb").val())+parseFloat($("#bsc").val())+parseFloat($("#certificat_phyto").val())+parseFloat($("#api").val())+parseFloat($("#aiae").val())+parseFloat($("#certificat_veterinaire").val())+parseFloat($("#appurement_magasin").val())+parseFloat($("#magasinage").val())+parseFloat($("#sortie_pc").val())+parseFloat($("#commission").val())+parseFloat($("#escorte").val())+parseFloat($("#manutention").val())+' XOF');
//Calcul Net A Payer

});

$("#bsc").on('keyup', function(){
	$("#total_debours_divers").html(parseFloat($("#ouverture_dossier").val())+parseFloat($("#acconage").val())+parseFloat($("#surestarie").val())+parseFloat($("#echange_bl").val())+parseFloat($("#caution").val())+parseFloat($("#livraison").val())+parseFloat($("#ts_douane").val())+parseFloat($("#retrait_documentaire").val())+parseFloat($("#debours_divers").val())+parseFloat($("#documentation_weeb").val())+parseFloat($("#bsc").val())+parseFloat($("#certificat_phyto").val())+parseFloat($("#api").val())+parseFloat($("#aiae").val())+parseFloat($("#certificat_veterinaire").val())+parseFloat($("#appurement_magasin").val())+parseFloat($("#magasinage").val())+parseFloat($("#sortie_pc").val())+parseFloat($("#commission").val())+parseFloat($("#escorte").val())+parseFloat($("#manutention").val())+' XOF');
//Calcul Net A Payer

});

$("#certificat_phyto").on('keyup', function(){
	$("#total_debours_divers").html(parseFloat($("#ouverture_dossier").val())+parseFloat($("#acconage").val())+parseFloat($("#surestarie").val())+parseFloat($("#echange_bl").val())+parseFloat($("#caution").val())+parseFloat($("#livraison").val())+parseFloat($("#ts_douane").val())+parseFloat($("#retrait_documentaire").val())+parseFloat($("#debours_divers").val())+parseFloat($("#documentation_weeb").val())+parseFloat($("#bsc").val())+parseFloat($("#certificat_phyto").val())+parseFloat($("#api").val())+parseFloat($("#aiae").val())+parseFloat($("#certificat_veterinaire").val())+parseFloat($("#appurement_magasin").val())+parseFloat($("#magasinage").val())+parseFloat($("#sortie_pc").val())+parseFloat($("#commission").val())+parseFloat($("#escorte").val())+parseFloat($("#manutention").val())+' XOF');
//Calcul Net A Payer

});

$("#api").on('keyup', function(){
	$("#total_debours_divers").html(parseFloat($("#ouverture_dossier").val())+parseFloat($("#acconage").val())+parseFloat($("#surestarie").val())+parseFloat($("#echange_bl").val())+parseFloat($("#caution").val())+parseFloat($("#livraison").val())+parseFloat($("#ts_douane").val())+parseFloat($("#retrait_documentaire").val())+parseFloat($("#debours_divers").val())+parseFloat($("#documentation_weeb").val())+parseFloat($("#bsc").val())+parseFloat($("#certificat_phyto").val())+parseFloat($("#api").val())+parseFloat($("#aiae").val())+parseFloat($("#certificat_veterinaire").val())+parseFloat($("#appurement_magasin").val())+parseFloat($("#magasinage").val())+parseFloat($("#sortie_pc").val())+parseFloat($("#commission").val())+parseFloat($("#escorte").val())+parseFloat($("#manutention").val())+' XOF');
	
});

$("#aiae").on('keyup', function(){
	$("#total_debours_divers").html(parseFloat($("#ouverture_dossier").val())+parseFloat($("#acconage").val())+parseFloat($("#surestarie").val())+parseFloat($("#echange_bl").val())+parseFloat($("#caution").val())+parseFloat($("#livraison").val())+parseFloat($("#ts_douane").val())+parseFloat($("#retrait_documentaire").val())+parseFloat($("#debours_divers").val())+parseFloat($("#documentation_weeb").val())+parseFloat($("#bsc").val())+parseFloat($("#certificat_phyto").val())+parseFloat($("#api").val())+parseFloat($("#aiae").val())+parseFloat($("#certificat_veterinaire").val())+parseFloat($("#appurement_magasin").val())+parseFloat($("#magasinage").val())+parseFloat($("#sortie_pc").val())+parseFloat($("#commission").val())+parseFloat($("#escorte").val())+parseFloat($("#manutention").val())+' XOF');
	
});

$("#certificat_veterinaire").on('keyup', function(){
	$("#total_debours_divers").html(parseFloat($("#ouverture_dossier").val())+parseFloat($("#acconage").val())+parseFloat($("#surestarie").val())+parseFloat($("#echange_bl").val())+parseFloat($("#caution").val())+parseFloat($("#livraison").val())+parseFloat($("#ts_douane").val())+parseFloat($("#retrait_documentaire").val())+parseFloat($("#debours_divers").val())+parseFloat($("#documentation_weeb").val())+parseFloat($("#bsc").val())+parseFloat($("#certificat_phyto").val())+parseFloat($("#api").val())+parseFloat($("#aiae").val())+parseFloat($("#certificat_veterinaire").val())+parseFloat($("#appurement_magasin").val())+parseFloat($("#magasinage").val())+parseFloat($("#sortie_pc").val())+parseFloat($("#commission").val())+parseFloat($("#escorte").val())+parseFloat($("#manutention").val())+' XOF');
	
});

$("#appurement_magasin").on('keyup', function(){
	$("#total_debours_divers").html(parseFloat($("#ouverture_dossier").val())+parseFloat($("#acconage").val())+parseFloat($("#surestarie").val())+parseFloat($("#echange_bl").val())+parseFloat($("#caution").val())+parseFloat($("#livraison").val())+parseFloat($("#ts_douane").val())+parseFloat($("#retrait_documentaire").val())+parseFloat($("#debours_divers").val())+parseFloat($("#documentation_weeb").val())+parseFloat($("#bsc").val())+parseFloat($("#certificat_phyto").val())+parseFloat($("#api").val())+parseFloat($("#aiae").val())+parseFloat($("#certificat_veterinaire").val())+parseFloat($("#appurement_magasin").val())+parseFloat($("#magasinage").val())+parseFloat($("#sortie_pc").val())+parseFloat($("#commission").val())+parseFloat($("#escorte").val())+parseFloat($("#manutention").val())+' XOF');
	
});

$("#magasinage").on('keyup', function(){
	$("#total_debours_divers").html(parseFloat($("#ouverture_dossier").val())+parseFloat($("#acconage").val())+parseFloat($("#surestarie").val())+parseFloat($("#echange_bl").val())+parseFloat($("#caution").val())+parseFloat($("#livraison").val())+parseFloat($("#ts_douane").val())+parseFloat($("#retrait_documentaire").val())+parseFloat($("#debours_divers").val())+parseFloat($("#documentation_weeb").val())+parseFloat($("#bsc").val())+parseFloat($("#certificat_phyto").val())+parseFloat($("#api").val())+parseFloat($("#aiae").val())+parseFloat($("#certificat_veterinaire").val())+parseFloat($("#appurement_magasin").val())+parseFloat($("#magasinage").val())+parseFloat($("#sortie_pc").val())+parseFloat($("#commission").val())+parseFloat($("#escorte").val())+parseFloat($("#manutention").val())+' XOF');
	
});

$("#sortie_pc").on('keyup', function(){
	$("#total_debours_divers").html(parseFloat($("#ouverture_dossier").val())+parseFloat($("#acconage").val())+parseFloat($("#surestarie").val())+parseFloat($("#echange_bl").val())+parseFloat($("#caution").val())+parseFloat($("#livraison").val())+parseFloat($("#ts_douane").val())+parseFloat($("#retrait_documentaire").val())+parseFloat($("#debours_divers").val())+parseFloat($("#documentation_weeb").val())+parseFloat($("#bsc").val())+parseFloat($("#certificat_phyto").val())+parseFloat($("#api").val())+parseFloat($("#aiae").val())+parseFloat($("#certificat_veterinaire").val())+parseFloat($("#appurement_magasin").val())+parseFloat($("#magasinage").val())+parseFloat($("#sortie_pc").val())+parseFloat($("#commission").val())+parseFloat($("#escorte").val())+parseFloat($("#manutention").val())+' XOF');
	
});

$("#commission").on('keyup', function(){
	$("#total_debours_divers").html(parseFloat($("#ouverture_dossier").val())+parseFloat($("#acconage").val())+parseFloat($("#surestarie").val())+parseFloat($("#echange_bl").val())+parseFloat($("#caution").val())+parseFloat($("#livraison").val())+parseFloat($("#ts_douane").val())+parseFloat($("#retrait_documentaire").val())+parseFloat($("#debours_divers").val())+parseFloat($("#documentation_weeb").val())+parseFloat($("#bsc").val())+parseFloat($("#certificat_phyto").val())+parseFloat($("#api").val())+parseFloat($("#aiae").val())+parseFloat($("#certificat_veterinaire").val())+parseFloat($("#appurement_magasin").val())+parseFloat($("#magasinage").val())+parseFloat($("#sortie_pc").val())+parseFloat($("#commission").val())+parseFloat($("#escorte").val())+parseFloat($("#manutention").val())+' XOF');
	
});

$("#escorte").on('keyup', function(){
	$("#total_debours_divers").html(parseFloat($("#ouverture_dossier").val())+parseFloat($("#acconage").val())+parseFloat($("#surestarie").val())+parseFloat($("#echange_bl").val())+parseFloat($("#caution").val())+parseFloat($("#livraison").val())+parseFloat($("#ts_douane").val())+parseFloat($("#retrait_documentaire").val())+parseFloat($("#debours_divers").val())+parseFloat($("#documentation_weeb").val())+parseFloat($("#bsc").val())+parseFloat($("#certificat_phyto").val())+parseFloat($("#api").val())+parseFloat($("#aiae").val())+parseFloat($("#certificat_veterinaire").val())+parseFloat($("#appurement_magasin").val())+parseFloat($("#magasinage").val())+parseFloat($("#sortie_pc").val())+parseFloat($("#commission").val())+parseFloat($("#escorte").val())+parseFloat($("#manutention").val())+' XOF');
	
});

$("#manutention").on('keyup', function(){
	$("#total_debours_divers").html(parseFloat($("#ouverture_dossier").val())+parseFloat($("#acconage").val())+parseFloat($("#surestarie").val())+parseFloat($("#echange_bl").val())+parseFloat($("#caution").val())+parseFloat($("#livraison").val())+parseFloat($("#ts_douane").val())+parseFloat($("#retrait_documentaire").val())+parseFloat($("#debours_divers").val())+parseFloat($("#documentation_weeb").val())+parseFloat($("#bsc").val())+parseFloat($("#certificat_phyto").val())+parseFloat($("#api").val())+parseFloat($("#aiae").val())+parseFloat($("#certificat_veterinaire").val())+parseFloat($("#appurement_magasin").val())+parseFloat($("#magasinage").val())+parseFloat($("#sortie_pc").val())+parseFloat($("#commission").val())+parseFloat($("#escorte").val())+parseFloat($("#manutention").val())+' XOF');
	
});

//Calcul Intervention HT
var total_intervention_transit=parseFloat($("#had").val());

$("#total_intervention_transit").html(parseFloat($("#had").val())+' XOF');
$("#had").on('keyup', function(){
	$("#total_intervention_transit").html(parseFloat($("#had").val())+' XOF');
	$("#tva").val(0.18*parseFloat($("#had").val()));
	$("#bc").val(0.35*parseFloat($("#had").val()));
});



$(".grp_choice").hide();

$(".montant_transport").hide();


$('#switch1').live('change', function(){

	if($('#switch1').val()==1)
	{
		$(".montant_transport").show();
	}

	if($('#switch1').val()==1)
	{
		$(".montant_transport").hide();
	}

});

//Controle code tarifaire
$("#code_tarifaire").on('keyup', function(){
	//alert('saisie dans code tarifaire');
	var code_tarifaire = parseFloat($("#code_tarifaire").val());
	if(code_tarifaire<1000000000 || code_tarifaire>9999999990 )
	{
		$("#envoie_article").hide();
		$("div.msg_erreur").html('Code tarifaire incorrect !').show();
	}
	else
	{
		$("#envoie_article").show();
		$("div.msg_erreur").hide();
	}
});


//Ajout article
$('#ajout_article').live('click', function(){
	$('#myModal_article').modal('show');
});
$('#form_article').live('submit',function(){		 
   	

	var code_tarifaire=$("#code_tarifaire").val();
	var fob_euro=$("#fob_euro").val();
	var fob_cfa=$("#fob_cfa").val();
	var fret=$("#fret").val();
	var ass=$("#ass").val();
	var caf=$("#caf").val();
	var taux=$("#taux").val();

	$.ajax({
	type: "POST",
	url: "dossier_import/ajout_article.php",
	data: "code_tarifaire="+code_tarifaire+"&fob_euro="+fob_euro+"&fob_cfa="+fob_cfa+"&fret="+fret+"&ass="+ass+"&caf="+caf+"&taux="+taux,
	success: function(msg){
		$("#code_tarifaire").val('');
		$("#fob_euro").val('');
		$("#fob_cfa").val('');
		$("#fret").val('');
		$("#ass").val('');
		$("#caf").val('');
		$("#taux").val('');
		$('#myModal_article').modal('toggle');
		change_page_article('0');

		if(parseFloat($('#total_fob_cfa').val())<500000)
		{
			$('#rpi').val(0);
			var rpi=0;
		}

		if(parseFloat($('#total_fob_cfa').val())<1000000 && parseFloat($('#total_fob_cfa').val())>=500000 )
		{
			$('#rpi').val(70000);
			var rpi=70000;
		}

		if(parseFloat($('#total_fob_cfa').val())<13350000 && parseFloat($('#total_fob_cfa').val())>=1000000 )
		{
			$('#rpi').val(100000);
			var rpi=100000;
		}

		if(parseFloat($('#total_fob_cfa').val())>13350000)
		{
			$('#rpi').val(parseFloat($('#total_fob_cfa').val())*0.0075);
			var rpi=parseFloat($('#total_fob_cfa').val())*0.0075;
		}
		//alert (rpi);

		

	}
	});
	
 return false;
}); 


if(parseFloat($('#total_fob_cfa').val())<500000)
{
	$('#rpi').val(0);
	var rpi=0;
}

if(parseFloat($('#total_fob_cfa').val())<1000000 && parseFloat($('#total_fob_cfa').val())>=500000 )
{
	$('#rpi').val(70000);
	var rpi=70000;
}

if(parseFloat($('#total_fob_cfa').val())<13350000 && parseFloat($('#total_fob_cfa').val())>=1000000 )
{
	$('#rpi').val(100000);
	var rpi=100000;
}

if(parseFloat($('#total_fob_cfa').val())>13350000)
{
	$('#rpi').val(parseFloat($('#total_fob_cfa').val())*0.0075);
	var rpi=parseFloat($('#total_fob_cfa').val())*0.0075;
}
//alert (rpi);


//Ajout container
$('#ajout_container').live('click', function(){
	$('#myModal_container').modal('show');
});
$('#form_container').live('submit',function(){		 
   	

	var num_container=$("#num_container").val();
	var type_container=$("#type_container").val();
	var taille_container=$("#taille_container").val();
	var num_scelle_container=$("#num_scelle_container").val();

	$.ajax({
	type: "POST",
	url: "dossier_import/ajout_container.php",
	data: "num_container="+num_container+"&type_container="+type_container+"&taille_container="+taille_container+"&num_scelle_container="+num_scelle_container,
	success: function(msg){
		$("#num_container").val('');
		$("#type_container").val('');
		$("#taille_container").val('');
		$("#num_scelle_container").val('');
		$('#myModal_container').modal('toggle');
		change_page_container('0');
	}
	});
	
 return false;
}); 


//Générer cotation
$('#ajout_cotation').live('click', function(){
	$('#myModal_cotation').modal('show');
});
$('#form_depense').live('submit',function(){		 
   	
	$.ajax({
	type: "POST",
	url: "caisse/ajout_depense.php",
	data: "select_besoin_id="+$("#select_besoin_id").val()+"&montant_depense="+$("#montant_depense").val(),
	success: function(msg){
		$(location).attr('href','depense.php');
	}
 });
	
 return false;
}); 



//Création dossier
$('#submit_form').live('click', function(){

	var nom_dossier=$("#nom_dossier").val();
	var description_dossier=$("#description_dossier").val();
	var date_int_dossier=$(".date_int_dossier").val();
	var service_dossier_id=$("#service_dossier_id").val();
	var membre_dossier = $("#choices-multiple-remove-button").val();
	var client_id=$("#client_id").val();
	var type_transit_id=$("#type_transit_id").val();
	$.ajax({
		type: "POST",
		url: "dossier_import/ajout_dossier.php",
		data: "nom_dossier="+nom_dossier+"&description_dossier="+description_dossier+"&date_int_dossier="+date_int_dossier+"&service_dossier_id="+service_dossier_id+"&membre_dossier="+membre_dossier+"&client_id="+client_id+"&type_transit_id="+type_transit_id,
		//data: "utilisateur="+utilisateur+"&email="+email,
		success: function(msg){
			
			 if(msg==1)
			 { 
			  $("div.msg_erreur").show();
			  $("div.msg_erreur").html("Veuillez remplir correctement le formulaire !").show();
			 }
			 else
			 {
			  $(location).attr('href', 'dossier_import.php');
			 }
		}
	 });
 return false;

});


//Etape 1 || Transport payé ou pas
$('input[name=transport_deja_paye]').live('change', function(){

	if( $('input[name=transport_deja_paye]').is(':checked') ){
		var transport_deja_paye=1;
		var montant_transport=$("#montant_transport").val();
		$.ajax({
			type: "POST",
			data: "transport_deja_paye="+transport_deja_paye+"&montant_transport="+montant_transport,
			url: "dossier_import/update_transport.php",
			cache: false,
			success: function(result){

			}
	 	});
	} else {
		var transport_deja_paye=0;
		var montant_transport=$("#montant_transport").val();
		$.ajax({
			type: "POST",
			data: "transport_deja_paye="+transport_deja_paye+"&montant_transport="+montant_transport,
			url: "dossier_import/update_transport.php",
			cache: false,
			success: function(result){
				
			}
	 	});
	}

});
$('#montant_transport').on('keyup', function(){

	if( $('input[name=transport_deja_paye]').is(':checked') ){
		var transport_deja_paye=1;
		var montant_transport=$("#montant_transport").val();
		$.ajax({
			type: "POST",
			data: "transport_deja_paye="+transport_deja_paye+"&montant_transport="+montant_transport,
			url: "dossier_import/update_transport.php",
			cache: false,
			success: function(result){
				
			}
	 	});
	} else {
		var transport_deja_paye=0;
		var montant_transport=$("#montant_transport").val();
		$.ajax({
			type: "POST",
			data: "transport_deja_paye="+transport_deja_paye+"&montant_transport="+montant_transport,
			url: "dossier_import/update_transport.php",
			cache: false,
			success: function(result){
				
			}
	 	});
	}

});
//Etape 1 || Date de départ expédition
$('#date_depart_expedition').on('keyup', function(){

		var date_depart_expedition=$("#date_depart_expedition").val();

		$.ajax({
			type: "POST",
			data: "date_depart_expedition="+date_depart_expedition,
			url: "dossier_import/update_date_depart_expedition.php",
			cache: false,
			success: function(result){
				
			}
	 	});
});
$('#date_depart_expedition').live('Change', function(){
	alert(date_depart_expedition);
	var date_depart_expedition=$("#date_depart_expedition").val();
		$.ajax({
			type: "POST",
			data: "date_depart_expedition="+date_depart_expedition,
			url: "dossier_import/update_date_depart_expedition.php",
			cache: false,
			success: function(result){
				
			}
	 	});
});
//Etape 1 || Date arrivée
$('#date_arrivee').on('keyup', function(){

		var date_arrivee=$("#date_arrivee").val();
		$("#aff_date_arrivee").hide();

		$.ajax({
			type: "POST",
			data: "date_arrivee="+date_arrivee,
			url: "dossier_import/update_date_arrivee.php",
			cache: false,
			success: function(result){
				
				$("#aff_date_arrivee").html(date_arrivee).show();
			}
	 	});
});
$('#date_arrivee').live('Change', function(){
	alert(date_arrivee);
	var date_arrivee=$("#date_arrivee").val();
		$.ajax({
			type: "POST",
			data: "date_arrivee="+date_arrivee,
			url: "dossier_import/update_date_arrivee.php",
			cache: false,
			success: function(result){
				
			}
	 	});
});
//Etape 1 || Pays de provenance
$('#pays_provenance').on('keyup', function(){

	var pays_provenance=$("#pays_provenance").val();

	$.ajax({
		type: "POST",
		data: "pays_provenance="+pays_provenance,
		url: "dossier_import/update_pays_provenance.php",
		cache: false,
		success: function(result){
			
		}
	 });
});
//Etape 1 || Transporteur
$('#transporteur').on('keyup', function(){

	var transporteur=$("#transporteur").val();

	$.ajax({
		type: "POST",
		data: "transporteur="+transporteur,
		url: "dossier_import/update_transporteur.php",
		cache: false,
		success: function(result){
			
		}
	 });
});
//Etape 1 || num_connaissementr
$('#num_connaissement').on('keyup', function(){

	var num_connaissement=$("#num_connaissement").val();

	$.ajax({
		type: "POST",
		data: "num_connaissement="+num_connaissement,
		url: "dossier_import/update_num_connaissement.php",
		cache: false,
		success: function(result){
			
		}
	 });
});
//Etape 1 || num_voyage
$('#num_voyage').on('keyup', function(){

	var num_voyage=$("#num_voyage").val();

	$.ajax({
		type: "POST",
		data: "num_voyage="+num_voyage,
		url: "dossier_import/update_num_voyage.php",
		cache: false,
		success: function(result){
			
		}
	 });
});
//Etape 1 || Code bateau
$('#code_bateau').on('keyup', function(){

	var code_bateau=$("#code_bateau").val();

	$.ajax({
		type: "POST",
		data: "code_bateau="+code_bateau,
		url: "dossier_import/update_code_bateau.php",
		cache: false,
		success: function(result){
			
		}
	 });
});
//Etape 1 || Code bateau
$('#masse_net').on('keyup', function(){

	var masse_net=$("#masse_net").val();

	$.ajax({
		type: "POST",
		data: "masse_net="+masse_net,
		url: "dossier_import/update_masse_net.php",
		cache: false,
		success: function(result){
			
		}
	 });
});
//Etape 1 || Code bateau
$('#masse_brute').on('keyup', function(){

	var masse_brute=$("#masse_brute").val();

	$.ajax({
		type: "POST",
		data: "masse_brute="+masse_brute,
		url: "dossier_import/update_masse_brute.php",
		cache: false,
		success: function(result){
			
		}
	 });
});
//Etape 1 || Code bateau
$('#total_colis').on('keyup', function(){

	var total_colis=$("#total_colis").val();

	$.ajax({
		type: "POST",
		data: "total_colis="+total_colis,
		url: "dossier_import/update_total_colis.php",
		cache: false,
		success: function(result){
			
		}
	 });
});

//Etape 1 || Manifeste
$('#manifeste').on('keyup', function(){

	var manifeste=$("#manifeste").val();

	$("#aff_manifeste").hide();

	$.ajax({
		type: "POST",
		data: "manifeste="+manifeste,
		url: "dossier_import/update_manifeste.php",
		cache: false,
		success: function(result){
			$("#aff_manifeste").html(manifeste).show();
		}
	 });
});

//Etape 2 || Tirage declaration
$('#tirage_declaration').on('keyup', function(){

	var tirage_declaration=$("#tirage_declaration").val();

	$.ajax({
		type: "POST",
		data: "tirage_declaration="+tirage_declaration,
		url: "dossier_import/update_tirage_declaration.php",
		cache: false,
		success: function(result){
			
		}
	 });
});
//Etape 2 || Sydam
$('#sydam').on('keyup', function(){

	var sydam=$("#sydam").val();

	$.ajax({
		type: "POST",
		data: "sydam="+sydam,
		url: "dossier_import/update_sydam.php",
		cache: false,
		success: function(result){
			
		}
	 });
});
//Etape 2 || Fiche Assurance
$('#fiche_assurance').on('keyup', function(){

	var fiche_assurance=$("#fiche_assurance").val();

	$.ajax({
		type: "POST",
		data: "fiche_assurance="+fiche_assurance,
		url: "dossier_import/update_fiche_assurance.php",
		cache: false,
		success: function(result){
			
		}
	 });
});
//Etape 2 || Agio
$('#agio').on('change', function(){

	var agio=$("#agio").val();

	$.ajax({
		type: "POST",
		data: "agio="+agio,
		url: "dossier_import/update_agio.php",
		cache: false,
		success: function(result){
			
		}
	 });
});
//Etape 2 || Ouverture dossier
$('#ouverture_dossier').on('keyup', function(){

	var ouverture_dossier=$("#ouverture_dossier").val();

	$.ajax({
		type: "POST",
		data: "ouverture_dossier="+ouverture_dossier,
		url: "dossier_import/update_ouverture_dossier.php",
		cache: false,
		success: function(result){
			
		}
	 });
});
//Etape 2 || Ouverture dossier
$('#acconage').on('keyup', function(){

	var acconage=$("#acconage").val();

	$.ajax({
		type: "POST",
		data: "acconage="+acconage,
		url: "dossier_import/update_acconage.php",
		cache: false,
		success: function(result){
			
		}
	 });
});
//Etape 2 || Ouverture dossier
$('#surestarie').on('keyup', function(){

	var surestarie=$("#surestarie").val();

	$.ajax({
		type: "POST",
		data: "surestarie="+surestarie,
		url: "dossier_import/update_surestarie.php",
		cache: false,
		success: function(result){
			
		}
	 });
});
//Etape 2 || Ouverture dossier
$('#echange_bl').on('keyup', function(){

	var echange_bl=$("#echange_bl").val();

	$.ajax({
		type: "POST",
		data: "echange_bl="+echange_bl,
		url: "dossier_import/update_echange_bl.php",
		cache: false,
		success: function(result){
			
		}
	 });
});
//Etape 2 || Ouverture dossier
$('#caution').on('keyup', function(){

	var caution=$("#caution").val();

	$.ajax({
		type: "POST",
		data: "caution="+caution,
		url: "dossier_import/update_caution.php",
		cache: false,
		success: function(result){
			
		}
	 });
});
//Etape 2 || Livraison
$('#livraison').on('keyup', function(){

	var livraison=$("#livraison").val();

	$.ajax({
		type: "POST",
		data: "livraison="+livraison,
		url: "dossier_import/update_livraison.php",
		cache: false,
		success: function(result){
			
		}
	 });
});
//Etape 2 || Livraison
$('#ts_douane').on('keyup', function(){

	var ts_douane=$("#ts_douane").val();

	$.ajax({
		type: "POST",
		data: "ts_douane="+ts_douane,
		url: "dossier_import/update_ts_douane.php",
		cache: false,
		success: function(result){
			
		}
	 });
});
//Etape 2 || Livraison
$('#retrait_documentaire').on('keyup', function(){

	var retrait_documentaire=$("#retrait_documentaire").val();

	$.ajax({
		type: "POST",
		data: "retrait_documentaire="+retrait_documentaire,
		url: "dossier_import/update_retrait_documentaire.php",
		cache: false,
		success: function(result){
			
		}
	 });
});
//Etape 2 || Livraison
$('#debours_divers').on('keyup', function(){

	var debours_divers=$("#debours_divers").val();

	$.ajax({
		type: "POST",
		data: "debours_divers="+debours_divers,
		url: "dossier_import/update_debours_divers.php",
		cache: false,
		success: function(result){
			
		}
	 });
});
//Etape 2 || Livraison
$('#documentation_weeb').on('keyup', function(){

	var documentation_weeb=$("#documentation_weeb").val();

	$.ajax({
		type: "POST",
		data: "documentation_weeb="+documentation_weeb,
		url: "dossier_import/update_documentation_weeb.php",
		cache: false,
		success: function(result){
			
		}
	 });
});
//Etape 2 || Livraison
$('#bsc').on('keyup', function(){

	var bsc=$("#bsc").val();

	$.ajax({
		type: "POST",
		data: "bsc="+bsc,
		url: "dossier_import/update_bsc.php",
		cache: false,
		success: function(result){
			
		}
	 });
});
//Etape 2 || Livraison
$('#certificat_phyto').on('keyup', function(){

	var certificat_phyto=$("#certificat_phyto").val();

	$.ajax({
		type: "POST",
		data: "certificat_phyto="+certificat_phyto,
		url: "dossier_import/update_certificat_phyto.php",
		cache: false,
		success: function(result){
			
		}
	 });
});
//Etape 2 || Livraison
$('#api').on('keyup', function(){

	var api=$("#api").val();

	$.ajax({
		type: "POST",
		data: "api="+api,
		url: "dossier_import/update_api.php",
		cache: false,
		success: function(result){
			
		}
	 });
});
//Etape 2 || Livraison
$('#aiae').on('keyup', function(){

	var aiae=$("#aiae").val();

	$.ajax({
		type: "POST",
		data: "aiae="+aiae,
		url: "dossier_import/update_aiae.php",
		cache: false,
		success: function(result){
			
		}
	 });
});
//Etape 2 || Livraison
$('#certificat_veterinaire').on('keyup', function(){

	var certificat_veterinaire=$("#certificat_veterinaire").val();

	$.ajax({
		type: "POST",
		data: "certificat_veterinaire="+certificat_veterinaire,
		url: "dossier_import/update_certificat_veterinaire.php",
		cache: false,
		success: function(result){
			
		}
	 });
});
//Etape 2 || Livraison
$('#appurement_magasin').on('keyup', function(){

	var appurement_magasin=$("#appurement_magasin").val();

	$.ajax({
		type: "POST",
		data: "appurement_magasin="+appurement_magasin,
		url: "dossier_import/update_appurement_magasin.php",
		cache: false,
		success: function(result){
			
		}
	 });
});
//Etape 2 || Livraison
$('#magasinage').on('keyup', function(){

	var magasinage=$("#magasinage").val();

	$.ajax({
		type: "POST",
		data: "magasinage="+magasinage,
		url: "dossier_import/update_magasinage.php",
		cache: false,
		success: function(result){
			
		}
	 });
});
//Etape 2 || Livraison
$('#sortie_pc').on('keyup', function(){

	var sortie_pc=$("#sortie_pc").val();

	$.ajax({
		type: "POST",
		data: "sortie_pc="+sortie_pc,
		url: "dossier_import/update_sortie_pc.php",
		cache: false,
		success: function(result){
			
		}
	 });
});
//Etape 2 || Livraison
$('#commission').on('keyup', function(){

	var commission=$("#commission").val();

	$.ajax({
		type: "POST",
		data: "commission="+commission,
		url: "dossier_import/update_commission.php",
		cache: false,
		success: function(result){
			
		}
	 });
});
//Etape 2 || Livraison
$('#escorte').on('keyup', function(){

	var escorte=$("#escorte").val();

	$.ajax({
		type: "POST",
		data: "escorte="+escorte,
		url: "dossier_import/update_escorte.php",
		cache: false,
		success: function(result){
			
		}
	 });
});
//Etape 2 || Livraison
$('#manutention').on('keyup', function(){

	var manutention=$("#manutention").val();

	$.ajax({
		type: "POST",
		data: "manutention="+manutention,
		url: "dossier_import/update_manutention.php",
		cache: false,
		success: function(result){
			
		}
	 });
});
//Etape 2 || Livraison
$('#had').on('keyup', function(){

	var had=$("#had").val();

	$.ajax({
		type: "POST",
		data: "had="+had,
		url: "dossier_import/update_had.php",
		cache: false,
		success: function(result){
			
		}
	 });
});

//Etape 2 || Livraison
$('#nature').on('keyup', function(){

	var nature=$("#nature").val();

	$.ajax({
		type: "POST",
		data: "nature="+nature,
		url: "dossier_import/update_nature.php",
		cache: false,
		success: function(result){
			
		}
	 });
});


var total_formalite=0;
if($("#r_dt").val()!='')
{
	var r_dt = $("#r_dt").val();
}
else
{
	var r_dt=0;
}

if($("#r_sydam ").val()!='')
{
var r_sydam = $("#r_sydam").val();
}
else
{
var r_sydam = 0;
}

if($("#r_agio").val()!='')
{
var r_agio = $("#r_agio").val();
}
else
{
var r_agio = 0;
}

if($("#r_ts_douane").val()!='')
{
var r_ts_douane = $("#r_ts_douane").val();
}
else
{
var r_ts_douane = 0;
}

if($("#r_bsc").val()!='')
{
var r_bsc = $("#r_bsc").val();
}
else
{
var r_bsc = 0;
}

if($("#r_api").val()!='')
{
var r_api = $("#r_api").val();
}
else
{
var r_api = 0;
}

if($("#r_assurance").val()!='')
{
var r_assurance = $("#r_assurance").val();
}
else
{
var r_assurance = 0;
}

if($("#r_certificat_phyto").val()!='')
{
var r_certificat_phyto = $("#r_certificat_phyto").val();
}
else
{
var r_certificat_phyto = 0;
}

if($("#r_magasinage").val()!='')
{
var r_magasinage = $("#r_magasinage").val();
}
else
{
var r_magasinage = 0;
}

if($("#r_manutention").val()!='')
{
var r_manutention = $("#r_manutention").val();
}
else
{
var r_manutention = 0;
}

if($("#r_echange_bl").val()!='')
{
var r_echange_bl = $("#r_echange_bl").val();
}
else
{
var r_echange_bl = 0;
}

if($("#r_acconage").val()!='')
{
var r_acconage = $("#r_acconage").val();
}
else
{
var r_acconage = 0;
}

if($("#r_surestarie").val()!='')
{
var r_surestarie = $("#r_surestarie").val();
}
else
{
var r_surestarie = 0;
}

if($("#r_caution").val()!='')
{
var r_caution = $("#r_caution").val();
}
else
{
var r_caution = 0;
}

if($("#r_livraison").val()!='')
{
var r_livraison = $("#r_livraison").val();
}
else
{
var r_livraison = 0;
}

if($("#r_transport_agent").val()!='')
{
var r_transport_agent = $("#r_transport_agent").val();
}
else
{
var r_transport_agent = 0;
}

if($("#r_commission").val()!='')
{
var r_commission = $("#r_commission").val();
}
else
{
var r_commission = 0;
}

if($("#r_retrait_documentaire").val()!='')
{
var r_retrait_documentaire = $("#r_retrait_documentaire").val();
}
else
{
var r_retrait_documentaire = 0;
}

if($("#r_manifeste").val()!='')
{
var r_manifeste = $("#r_manifeste").val();
}
else
{
var r_manifeste = 0;
}

//alert(parseFloat(r_dt)+parseFloat(r_sydam)+parseFloat(r_agio)+parseFloat(r_ts_douane)+parseFloat(r_bsc)+parseFloat(r_api)+parseFloat(r_assurance)+parseFloat(r_certificat_phyto)+parseFloat(r_magasinage)+parseFloat(r_manutention)+parseFloat(r_echange_bl)+parseFloat(r_acconage)+parseFloat(r_surestarie)+parseFloat(r_caution)+parseFloat(r_livraison)+parseFloat(r_transport_agent)+parseFloat(r_commission)+parseFloat(r_retrait_documentaire)+parseFloat(r_manifeste));

	//Calcul Agio
	if($('#r_mode_paiement').val()==1) //Si payé au comptant
	{
		$("#r_agio").val(parseFloat($("#r_dt").val())*0.006);

		var r_agio = $("#r_agio").val();

		$.ajax({
			type: "POST",
			data: "r_agio="+r_agio,
			url: "dossier_import/update_r_agio.php",
			cache: false,
			success: function(result){
			}
		 });
	}
	else
	{
		$("#r_agio").val('0');

		var r_agio = $("#r_agio").val();

		$.ajax({
			type: "POST",
			data: "r_agio="+r_agio,
			url: "dossier_import/update_r_agio.php",
			cache: false,
			success: function(result){
			}
		 });
	}


$("#montant_reel").hide();
var total_formalite=parseFloat(r_dt)+parseFloat(r_sydam)+parseFloat(r_agio)+parseFloat(r_ts_douane)+parseFloat(r_bsc)+parseFloat(r_api)+parseFloat(r_assurance)+parseFloat(r_certificat_phyto)+parseFloat(r_magasinage)+parseFloat(r_manutention)+parseFloat(r_echange_bl)+parseFloat(r_acconage)+parseFloat(r_surestarie)+parseFloat(r_caution)+parseFloat(r_livraison)+parseFloat(r_transport_agent)+parseFloat(r_commission)+parseFloat(r_retrait_documentaire)+parseFloat(r_manifeste);

$("#montant_reel").html(
	
	new Intl.NumberFormat('fr', {
		style: 'currency',
		currency: 'XOF',
		currencySign: 'accounting'
	}).format(total_formalite)

).show();


$.ajax({
	type: "POST",
	url: "dossier_import/stock_montant_reel.php",
	data: 'total_formalite='+total_formalite,
	cache: false,
	success: function(result){
		//
	}
 });

//Formatage



//Etape 2 || Livraison
$('#r_num_declaration').on('keyup', function(){

	//$("#r_num_declaration").hide();
	var r_num_declaration=$("#r_num_declaration").val();

	$.ajax({
		type: "POST",
		data: "r_num_declaration="+r_num_declaration,
		url: "dossier_import/update_r_num_declaration.php",
		cache: false,
		success: function(result){

			$("#aff_num_declaration").html(r_num_declaration).show();
			
			$("#montant_reel").hide();
		var total_formalite=parseFloat(r_dt)+parseFloat(r_sydam)+parseFloat(r_agio)+parseFloat(r_ts_douane)+parseFloat(r_bsc)+parseFloat(r_api)+parseFloat(r_assurance)+parseFloat(r_certificat_phyto)+parseFloat(r_magasinage)+parseFloat(r_manutention)+parseFloat(r_echange_bl)+parseFloat(r_acconage)+parseFloat(r_surestarie)+parseFloat(r_caution)+parseFloat(r_livraison)+parseFloat(r_transport_agent)+parseFloat(r_commission)+parseFloat(r_retrait_documentaire)+parseFloat(r_manifeste);
		$("#montant_reel").html(
	
			new Intl.NumberFormat('fr', {
				style: 'currency',
				currency: 'XOF',
				currencySign: 'accounting'
			}).format(total_formalite)
			
		).show();
		}
	 });

	 
$.ajax({
	type: "POST",
	url: "dossier_import/stock_montant_reel.php",
	data: 'total_formalite='+total_formalite,
	cache: false,
	success: function(result){
		//
	}
 });


});
//Etape 2 || Livraison
$('#r_mode_paiement').live('change', function(){

	var r_mode_paiement=$("#r_mode_paiement").val();

	$.ajax({
		type: "POST",
		data: "r_mode_paiement="+r_mode_paiement,
		url: "dossier_import/update_r_mode_paiement.php",
		cache: false,
		success: function(result){
			

					//Calcul Agio
					if($('#r_mode_paiement').val()==1) //Si payé au comptant
					{
						$("#r_agio").val(parseFloat($("#r_dt").val())*0.006);
					}
					else
					{
						$("#r_agio").val('0');
					}

					r_agio = $("#r_agio").val();

			$("#montant_reel").hide();
		var total_formalite=parseFloat(r_dt)+parseFloat(r_sydam)+parseFloat(r_agio)+parseFloat(r_ts_douane)+parseFloat(r_bsc)+parseFloat(r_api)+parseFloat(r_assurance)+parseFloat(r_certificat_phyto)+parseFloat(r_magasinage)+parseFloat(r_manutention)+parseFloat(r_echange_bl)+parseFloat(r_acconage)+parseFloat(r_surestarie)+parseFloat(r_caution)+parseFloat(r_livraison)+parseFloat(r_transport_agent)+parseFloat(r_commission)+parseFloat(r_retrait_documentaire)+parseFloat(r_manifeste);
		$("#montant_reel").html(
	
			new Intl.NumberFormat('fr', {
				style: 'currency',
				currency: 'XOF',
				currencySign: 'accounting'
			}).format(total_formalite)
			
		).show();

		
		}
	 });


	 
$.ajax({
	type: "POST",
	url: "dossier_import/stock_montant_reel.php",
	data: 'total_formalite='+total_formalite,
	cache: false,
	success: function(result){
		//
	}
 });


});


//Etape 2 || Livraison
$('#r_liquidation').on('keyup', function(){


	//$("#r_liquidation").hide();

	var r_liquidation=$("#r_liquidation").val();

	$.ajax({
		type: "POST",
		data: "r_liquidation="+r_liquidation,
		url: "dossier_import/update_r_liquidation.php",
		cache: false,
		success: function(result){

			$("#aff_liquidation").html(r_liquidation).show();
			
			$("#montant_reel").hide();
		var total_formalite=parseFloat(r_dt)+parseFloat(r_sydam)+parseFloat(r_agio)+parseFloat(r_ts_douane)+parseFloat(r_bsc)+parseFloat(r_api)+parseFloat(r_assurance)+parseFloat(r_certificat_phyto)+parseFloat(r_magasinage)+parseFloat(r_manutention)+parseFloat(r_echange_bl)+parseFloat(r_acconage)+parseFloat(r_surestarie)+parseFloat(r_caution)+parseFloat(r_livraison)+parseFloat(r_transport_agent)+parseFloat(r_commission)+parseFloat(r_retrait_documentaire)+parseFloat(r_manifeste);
		$("#montant_reel").html(
	
			new Intl.NumberFormat('fr', {
				style: 'currency',
				currency: 'XOF',
				currencySign: 'accounting'
			}).format(total_formalite)
			
		).show();
		}
	 });

	 
$.ajax({
	type: "POST",
	url: "dossier_import/stock_montant_reel.php",
	data: 'total_formalite='+total_formalite,
	cache: false,
	success: function(result){
		//
	}
 });

});
//Etape 2 || Livraison
$('#r_num_quittance').on('keyup', function(){

	var r_num_quittance=$("#r_num_quittance").val();

	$.ajax({
		type: "POST",
		data: "r_num_quittance="+r_num_quittance,
		url: "dossier_import/update_r_num_quittance.php",
		cache: false,
		success: function(result){
			$("#montant_reel").hide();
		var total_formalite=parseFloat(r_dt)+parseFloat(r_sydam)+parseFloat(r_agio)+parseFloat(r_ts_douane)+parseFloat(r_bsc)+parseFloat(r_api)+parseFloat(r_assurance)+parseFloat(r_certificat_phyto)+parseFloat(r_magasinage)+parseFloat(r_manutention)+parseFloat(r_echange_bl)+parseFloat(r_acconage)+parseFloat(r_surestarie)+parseFloat(r_caution)+parseFloat(r_livraison)+parseFloat(r_transport_agent)+parseFloat(r_commission)+parseFloat(r_retrait_documentaire)+parseFloat(r_manifeste);
		$("#montant_reel").html(
	
			new Intl.NumberFormat('fr', {
				style: 'currency',
				currency: 'XOF',
				currencySign: 'accounting'
			}).format(total_formalite)
			
		).show();
		}
	 });


	 $.ajax({
		type: "POST",
		url: "dossier_import/stock_montant_reel.php",
		data: 'total_formalite='+total_formalite,
		cache: false,
		success: function(result){
			//
		}
	 });

});
//Etape 2 || Livraison
$('#r_dt').on('keyup', function(){

	var r_dt=$("#r_dt").val();

	$.ajax({
		type: "POST",
		data: "r_dt="+r_dt,
		url: "dossier_import/update_r_dt.php",
		cache: false,
		success: function(result){
			

					//Calcul Agio
					if($('#r_mode_paiement').val()==1) //Si payé au comptant
					{
						$("#r_agio").val(parseFloat($("#r_dt").val())*0.006);
					}
					else
					{
						$("#r_agio").val('0');
					}

			$("#montant_reel").hide();
		var total_formalite=parseFloat(r_dt)+parseFloat(r_sydam)+parseFloat(r_agio)+parseFloat(r_ts_douane)+parseFloat(r_bsc)+parseFloat(r_api)+parseFloat(r_assurance)+parseFloat(r_certificat_phyto)+parseFloat(r_magasinage)+parseFloat(r_manutention)+parseFloat(r_echange_bl)+parseFloat(r_acconage)+parseFloat(r_surestarie)+parseFloat(r_caution)+parseFloat(r_livraison)+parseFloat(r_transport_agent)+parseFloat(r_commission)+parseFloat(r_retrait_documentaire)+parseFloat(r_manifeste);
		$("#montant_reel").html(
	
			new Intl.NumberFormat('fr', {
				style: 'currency',
				currency: 'XOF',
				currencySign: 'accounting'
			}).format(total_formalite)
			
		).show();

		
		}
	 });

	 $.ajax({
		type: "POST",
		url: "dossier_import/stock_montant_reel.php",
		data: 'total_formalite='+total_formalite,
		cache: false,
		success: function(result){
			//
		}
	 });

});
//Etape 2 || Livraison
$('#r_sydam').on('keyup', function(){

	var r_sydam=$("#r_sydam").val();

	$.ajax({
		type: "POST",
		data: "r_sydam="+r_sydam,
		url: "dossier_import/update_r_sydam.php",
		cache: false,
		success: function(result){
			
			$("#montant_reel").hide();
		var total_formalite=parseFloat(r_dt)+parseFloat(r_sydam)+parseFloat(r_agio)+parseFloat(r_ts_douane)+parseFloat(r_bsc)+parseFloat(r_api)+parseFloat(r_assurance)+parseFloat(r_certificat_phyto)+parseFloat(r_magasinage)+parseFloat(r_manutention)+parseFloat(r_echange_bl)+parseFloat(r_acconage)+parseFloat(r_surestarie)+parseFloat(r_caution)+parseFloat(r_livraison)+parseFloat(r_transport_agent)+parseFloat(r_commission)+parseFloat(r_retrait_documentaire)+parseFloat(r_manifeste);
		$("#montant_reel").html(
	
			new Intl.NumberFormat('fr', {
				style: 'currency',
				currency: 'XOF',
				currencySign: 'accounting'
			}).format(total_formalite)
			
		).show();
		}
	 });

$.ajax({
	type: "POST",
	url: "dossier_import/stock_montant_reel.php",
	data: 'total_formalite='+total_formalite,
	cache: false,
	success: function(result){
		//
	}
 });

});
//Etape 2 || Livraison
$('#r_agio').on('keyup', function(){

	var r_agio=$("#r_agio").val();

	$.ajax({
		type: "POST",
		data: "r_agio="+r_agio,
		url: "dossier_import/update_r_agio.php",
		cache: false,
		success: function(result){
			
			$("#montant_reel").hide();
		var total_formalite=parseFloat(r_dt)+parseFloat(r_sydam)+parseFloat(r_agio)+parseFloat(r_ts_douane)+parseFloat(r_bsc)+parseFloat(r_api)+parseFloat(r_assurance)+parseFloat(r_certificat_phyto)+parseFloat(r_magasinage)+parseFloat(r_manutention)+parseFloat(r_echange_bl)+parseFloat(r_acconage)+parseFloat(r_surestarie)+parseFloat(r_caution)+parseFloat(r_livraison)+parseFloat(r_transport_agent)+parseFloat(r_commission)+parseFloat(r_retrait_documentaire)+parseFloat(r_manifeste);
		$("#montant_reel").html(
	
			new Intl.NumberFormat('fr', {
				style: 'currency',
				currency: 'XOF',
				currencySign: 'accounting'
			}).format(total_formalite)
			
		).show();
		}
	 });

	 
$.ajax({
	type: "POST",
	url: "dossier_import/stock_montant_reel.php",
	data: 'total_formalite='+total_formalite,
	cache: false,
	success: function(result){
		//
	}
 });

});
//Etape 2 || Livraison
$('#r_ts_douane').on('keyup', function(){

	var r_ts_douane=$("#r_ts_douane").val();

	$.ajax({
		type: "POST",
		data: "r_ts_douane="+r_ts_douane,
		url: "dossier_import/update_r_ts_douane.php",
		cache: false,
		success: function(result){
			
			$("#montant_reel").hide();
		var total_formalite=parseFloat(r_dt)+parseFloat(r_sydam)+parseFloat(r_agio)+parseFloat(r_ts_douane)+parseFloat(r_bsc)+parseFloat(r_api)+parseFloat(r_assurance)+parseFloat(r_certificat_phyto)+parseFloat(r_magasinage)+parseFloat(r_manutention)+parseFloat(r_echange_bl)+parseFloat(r_acconage)+parseFloat(r_surestarie)+parseFloat(r_caution)+parseFloat(r_livraison)+parseFloat(r_transport_agent)+parseFloat(r_commission)+parseFloat(r_retrait_documentaire)+parseFloat(r_manifeste);
		$("#montant_reel").html(
	
			new Intl.NumberFormat('fr', {
				style: 'currency',
				currency: 'XOF',
				currencySign: 'accounting'
			}).format(total_formalite)
			
		).show();
		}
	 });

	 
$.ajax({
	type: "POST",
	url: "dossier_import/stock_montant_reel.php",
	data: 'total_formalite='+total_formalite,
	cache: false,
	success: function(result){
		//
	}
 });

});
//Etape 2 || Livraison
$('#r_bsc').on('keyup', function(){

	var r_bsc=$("#r_bsc").val();

	$.ajax({
		type: "POST",
		data: "r_bsc="+r_bsc,
		url: "dossier_import/update_r_bsc.php",
		cache: false,
		success: function(result){
			
			$("#montant_reel").hide();
		var total_formalite=parseFloat(r_dt)+parseFloat(r_sydam)+parseFloat(r_agio)+parseFloat(r_ts_douane)+parseFloat(r_bsc)+parseFloat(r_api)+parseFloat(r_assurance)+parseFloat(r_certificat_phyto)+parseFloat(r_magasinage)+parseFloat(r_manutention)+parseFloat(r_echange_bl)+parseFloat(r_acconage)+parseFloat(r_surestarie)+parseFloat(r_caution)+parseFloat(r_livraison)+parseFloat(r_transport_agent)+parseFloat(r_commission)+parseFloat(r_retrait_documentaire)+parseFloat(r_manifeste);
		$("#montant_reel").html(
	
			new Intl.NumberFormat('fr', {
				style: 'currency',
				currency: 'XOF',
				currencySign: 'accounting'
			}).format(total_formalite)
			
		).show();
		}
	 });


	 
$.ajax({
	type: "POST",
	url: "dossier_import/stock_montant_reel.php",
	data: 'total_formalite='+total_formalite,
	cache: false,
	success: function(result){
		//
	}
 });

});
//Etape 2 || Livraison
$('#r_api').on('keyup', function(){

	var r_api=$("#r_api").val();

	$.ajax({
		type: "POST",
		data: "r_api="+r_api,
		url: "dossier_import/update_r_api.php",
		cache: false,
		success: function(result){
			
			$("#montant_reel").hide();
		var total_formalite=parseFloat(r_dt)+parseFloat(r_sydam)+parseFloat(r_agio)+parseFloat(r_ts_douane)+parseFloat(r_bsc)+parseFloat(r_api)+parseFloat(r_assurance)+parseFloat(r_certificat_phyto)+parseFloat(r_magasinage)+parseFloat(r_manutention)+parseFloat(r_echange_bl)+parseFloat(r_acconage)+parseFloat(r_surestarie)+parseFloat(r_caution)+parseFloat(r_livraison)+parseFloat(r_transport_agent)+parseFloat(r_commission)+parseFloat(r_retrait_documentaire)+parseFloat(r_manifeste);
		$("#montant_reel").html(
	
			new Intl.NumberFormat('fr', {
				style: 'currency',
				currency: 'XOF',
				currencySign: 'accounting'
			}).format(total_formalite)
			
		).show();
		}
	 });

	 $.ajax({
		type: "POST",
		url: "dossier_import/stock_montant_reel.php",
		data: 'total_formalite='+total_formalite,
		cache: false,
		success: function(result){
			//
		}
	 });


});

//Etape 2 || Livraison
$('#r_assurance').on('keyup', function(){

	var r_assurance=$("#r_assurance").val();

	$.ajax({
		type: "POST",
		data: "r_assurance="+r_assurance,
		url: "dossier_import/update_r_assurance.php",
		cache: false,
		success: function(result){
			
			$("#montant_reel").hide();
		var total_formalite=parseFloat(r_dt)+parseFloat(r_sydam)+parseFloat(r_agio)+parseFloat(r_ts_douane)+parseFloat(r_bsc)+parseFloat(r_api)+parseFloat(r_assurance)+parseFloat(r_certificat_phyto)+parseFloat(r_magasinage)+parseFloat(r_manutention)+parseFloat(r_echange_bl)+parseFloat(r_acconage)+parseFloat(r_surestarie)+parseFloat(r_caution)+parseFloat(r_livraison)+parseFloat(r_transport_agent)+parseFloat(r_commission)+parseFloat(r_retrait_documentaire)+parseFloat(r_manifeste);
		$("#montant_reel").html(
	
			new Intl.NumberFormat('fr', {
				style: 'currency',
				currency: 'XOF',
				currencySign: 'accounting'
			}).format(total_formalite)
			
		).show();
		}
	 });


	 $.ajax({
		type: "POST",
		url: "dossier_import/stock_montant_reel.php",
		data: 'total_formalite='+total_formalite,
		cache: false,
		success: function(result){
			//
		}
	 });

});

//Etape 2 || Livraison
$('#r_certificat_phyto').on('keyup', function(){

	var r_certificat_phyto=$("#r_certificat_phyto").val();

	$.ajax({
		type: "POST",
		data: "r_certificat_phyto="+r_certificat_phyto,
		url: "dossier_import/update_r_certificat_phyto.php",
		cache: false,
		success: function(result){
			
			$("#montant_reel").hide();
		var total_formalite=parseFloat(r_dt)+parseFloat(r_sydam)+parseFloat(r_agio)+parseFloat(r_ts_douane)+parseFloat(r_bsc)+parseFloat(r_api)+parseFloat(r_assurance)+parseFloat(r_certificat_phyto)+parseFloat(r_magasinage)+parseFloat(r_manutention)+parseFloat(r_echange_bl)+parseFloat(r_acconage)+parseFloat(r_surestarie)+parseFloat(r_caution)+parseFloat(r_livraison)+parseFloat(r_transport_agent)+parseFloat(r_commission)+parseFloat(r_retrait_documentaire)+parseFloat(r_manifeste);
		$("#montant_reel").html(
	
			new Intl.NumberFormat('fr', {
				style: 'currency',
				currency: 'XOF',
				currencySign: 'accounting'
			}).format(total_formalite)
			
		).show();
		}
	 });

	 $.ajax({
		type: "POST",
		url: "dossier_import/stock_montant_reel.php",
		data: 'total_formalite='+total_formalite,
		cache: false,
		success: function(result){
			//
		}
	 });

});

//Etape 2 || Livraison
$('#r_magasinage').on('keyup', function(){

	var r_magasinage=$("#r_magasinage").val();

	$.ajax({
		type: "POST",
		data: "r_magasinage="+r_magasinage,
		url: "dossier_import/update_r_magasinage.php",
		cache: false,
		success: function(result){
			
			$("#montant_reel").hide();
		var total_formalite=parseFloat(r_dt)+parseFloat(r_sydam)+parseFloat(r_agio)+parseFloat(r_ts_douane)+parseFloat(r_bsc)+parseFloat(r_api)+parseFloat(r_assurance)+parseFloat(r_certificat_phyto)+parseFloat(r_magasinage)+parseFloat(r_manutention)+parseFloat(r_echange_bl)+parseFloat(r_acconage)+parseFloat(r_surestarie)+parseFloat(r_caution)+parseFloat(r_livraison)+parseFloat(r_transport_agent)+parseFloat(r_commission)+parseFloat(r_retrait_documentaire)+parseFloat(r_manifeste);
		$("#montant_reel").html(
	
			new Intl.NumberFormat('fr', {
				style: 'currency',
				currency: 'XOF',
				currencySign: 'accounting'
			}).format(total_formalite)
			
		).show();
		}
	 });

	 $.ajax({
		type: "POST",
		url: "dossier_import/stock_montant_reel.php",
		data: 'total_formalite='+total_formalite,
		cache: false,
		success: function(result){
			//
		}
	 });
});

//Etape 2 || Livraison
$('#r_manutention').on('keyup', function(){

	var r_manutention=$("#r_manutention").val();

	$.ajax({
		type: "POST",
		data: "r_manutention="+r_manutention,
		url: "dossier_import/update_r_manutention.php",
		cache: false,
		success: function(result){
			
			$("#montant_reel").hide();
		var total_formalite=parseFloat(r_dt)+parseFloat(r_sydam)+parseFloat(r_agio)+parseFloat(r_ts_douane)+parseFloat(r_bsc)+parseFloat(r_api)+parseFloat(r_assurance)+parseFloat(r_certificat_phyto)+parseFloat(r_magasinage)+parseFloat(r_manutention)+parseFloat(r_echange_bl)+parseFloat(r_acconage)+parseFloat(r_surestarie)+parseFloat(r_caution)+parseFloat(r_livraison)+parseFloat(r_transport_agent)+parseFloat(r_commission)+parseFloat(r_retrait_documentaire)+parseFloat(r_manifeste);
		$("#montant_reel").html(
	
			new Intl.NumberFormat('fr', {
				style: 'currency',
				currency: 'XOF',
				currencySign: 'accounting'
			}).format(total_formalite)
			
		).show();
		}
	 });

	 $.ajax({
		type: "POST",
		url: "dossier_import/stock_montant_reel.php",
		data: 'total_formalite='+total_formalite,
		cache: false,
		success: function(result){
			//
		}
	 });
});

//Etape 2 || Livraison
$('#r_echange_bl').on('keyup', function(){

	var r_echange_bl=$("#r_echange_bl").val();

	$.ajax({
		type: "POST",
		data: "r_echange_bl="+r_echange_bl,
		url: "dossier_import/update_r_echange_bl.php",
		cache: false,
		success: function(result){
			
			$("#montant_reel").hide();
		var total_formalite=parseFloat(r_dt)+parseFloat(r_sydam)+parseFloat(r_agio)+parseFloat(r_ts_douane)+parseFloat(r_bsc)+parseFloat(r_api)+parseFloat(r_assurance)+parseFloat(r_certificat_phyto)+parseFloat(r_magasinage)+parseFloat(r_manutention)+parseFloat(r_echange_bl)+parseFloat(r_acconage)+parseFloat(r_surestarie)+parseFloat(r_caution)+parseFloat(r_livraison)+parseFloat(r_transport_agent)+parseFloat(r_commission)+parseFloat(r_retrait_documentaire)+parseFloat(r_manifeste);
		$("#montant_reel").html(
	
			new Intl.NumberFormat('fr', {
				style: 'currency',
				currency: 'XOF',
				currencySign: 'accounting'
			}).format(total_formalite)
			
		).show();
		}
	 });

	 $.ajax({
		type: "POST",
		url: "dossier_import/stock_montant_reel.php",
		data: 'total_formalite='+total_formalite,
		cache: false,
		success: function(result){
			//
		}
	 });
});

//Etape 2 || Livraison
$('#r_surestarie').on('keyup', function(){

	var r_surestarie=$("#r_surestarie").val();

	$.ajax({
		type: "POST",
		data: "r_surestarie="+r_surestarie,
		url: "dossier_import/update_r_surestarie.php",
		cache: false,
		success: function(result){
			
			$("#montant_reel").hide();
		var total_formalite=parseFloat(r_dt)+parseFloat(r_sydam)+parseFloat(r_agio)+parseFloat(r_ts_douane)+parseFloat(r_bsc)+parseFloat(r_api)+parseFloat(r_assurance)+parseFloat(r_certificat_phyto)+parseFloat(r_magasinage)+parseFloat(r_manutention)+parseFloat(r_echange_bl)+parseFloat(r_acconage)+parseFloat(r_surestarie)+parseFloat(r_caution)+parseFloat(r_livraison)+parseFloat(r_transport_agent)+parseFloat(r_commission)+parseFloat(r_retrait_documentaire)+parseFloat(r_manifeste);
		$("#montant_reel").html(
	
			new Intl.NumberFormat('fr', {
				style: 'currency',
				currency: 'XOF',
				currencySign: 'accounting'
			}).format(total_formalite)
			
		).show();
		}
	 });

	 $.ajax({
		type: "POST",
		url: "dossier_import/stock_montant_reel.php",
		data: 'total_formalite='+total_formalite,
		cache: false,
		success: function(result){
			//
		}
	 });
});

//Etape 2 || Livraison
$('#r_caution').on('keyup', function(){

	var r_caution=$("#r_caution").val();

	$.ajax({
		type: "POST",
		data: "r_caution="+r_caution,
		url: "dossier_import/update_r_caution.php",
		cache: false,
		success: function(result){
			
			$("#montant_reel").hide();
		var total_formalite=parseFloat(r_dt)+parseFloat(r_sydam)+parseFloat(r_agio)+parseFloat(r_ts_douane)+parseFloat(r_bsc)+parseFloat(r_api)+parseFloat(r_assurance)+parseFloat(r_certificat_phyto)+parseFloat(r_magasinage)+parseFloat(r_manutention)+parseFloat(r_echange_bl)+parseFloat(r_acconage)+parseFloat(r_surestarie)+parseFloat(r_caution)+parseFloat(r_livraison)+parseFloat(r_transport_agent)+parseFloat(r_commission)+parseFloat(r_retrait_documentaire)+parseFloat(r_manifeste);
		$("#montant_reel").html(
	
			new Intl.NumberFormat('fr', {
				style: 'currency',
				currency: 'XOF',
				currencySign: 'accounting'
			}).format(total_formalite)
			
		).show();
		}
	 });

	 $.ajax({
		type: "POST",
		url: "dossier_import/stock_montant_reel.php",
		data: 'total_formalite='+total_formalite,
		cache: false,
		success: function(result){
			//
		}
	 });
});

//Etape 2 || Livraison
$('#r_livraison').on('keyup', function(){

	var r_livraison=$("#r_livraison").val();

	$.ajax({
		type: "POST",
		data: "r_livraison="+r_livraison,
		url: "dossier_import/update_r_livraison.php",
		cache: false,
		success: function(result){
			
			$("#montant_reel").hide();
		var total_formalite=parseFloat(r_dt)+parseFloat(r_sydam)+parseFloat(r_agio)+parseFloat(r_ts_douane)+parseFloat(r_bsc)+parseFloat(r_api)+parseFloat(r_assurance)+parseFloat(r_certificat_phyto)+parseFloat(r_magasinage)+parseFloat(r_manutention)+parseFloat(r_echange_bl)+parseFloat(r_acconage)+parseFloat(r_surestarie)+parseFloat(r_caution)+parseFloat(r_livraison)+parseFloat(r_transport_agent)+parseFloat(r_commission)+parseFloat(r_retrait_documentaire)+parseFloat(r_manifeste);
		$("#montant_reel").html(
	
			new Intl.NumberFormat('fr', {
				style: 'currency',
				currency: 'XOF',
				currencySign: 'accounting'
			}).format(total_formalite)
			
		).show();
		}
	 });

	 $.ajax({
		type: "POST",
		url: "dossier_import/stock_montant_reel.php",
		data: 'total_formalite='+total_formalite,
		cache: false,
		success: function(result){
			//
		}
	 });
});

//Etape 2 || Livraison
$('#r_transport_agent').on('keyup', function(){

	var r_transport_agent=$("#r_transport_agent").val();

	$.ajax({
		type: "POST",
		data: "r_transport_agent="+r_transport_agent,
		url: "dossier_import/update_r_transport_agent.php",
		cache: false,
		success: function(result){
			
			$("#montant_reel").hide();
		var total_formalite=parseFloat(r_dt)+parseFloat(r_sydam)+parseFloat(r_agio)+parseFloat(r_ts_douane)+parseFloat(r_bsc)+parseFloat(r_api)+parseFloat(r_assurance)+parseFloat(r_certificat_phyto)+parseFloat(r_magasinage)+parseFloat(r_manutention)+parseFloat(r_echange_bl)+parseFloat(r_acconage)+parseFloat(r_surestarie)+parseFloat(r_caution)+parseFloat(r_livraison)+parseFloat(r_transport_agent)+parseFloat(r_commission)+parseFloat(r_retrait_documentaire)+parseFloat(r_manifeste);
		$("#montant_reel").html(
	
			new Intl.NumberFormat('fr', {
				style: 'currency',
				currency: 'XOF',
				currencySign: 'accounting'
			}).format(total_formalite)
			
		).show();
		}
	 });

	 $.ajax({
		type: "POST",
		url: "dossier_import/stock_montant_reel.php",
		data: 'total_formalite='+total_formalite,
		cache: false,
		success: function(result){
			//
		}
	 });
});

//Etape 2 || Livraison
$('#r_commission').on('keyup', function(){

	var r_commission=$("#r_commission").val();

	$.ajax({
		type: "POST",
		data: "r_commission="+r_commission,
		url: "dossier_import/update_r_commission.php",
		cache: false,
		success: function(result){
			
			$("#montant_reel").hide();
		var total_formalite=parseFloat(r_dt)+parseFloat(r_sydam)+parseFloat(r_agio)+parseFloat(r_ts_douane)+parseFloat(r_bsc)+parseFloat(r_api)+parseFloat(r_assurance)+parseFloat(r_certificat_phyto)+parseFloat(r_magasinage)+parseFloat(r_manutention)+parseFloat(r_echange_bl)+parseFloat(r_acconage)+parseFloat(r_surestarie)+parseFloat(r_caution)+parseFloat(r_livraison)+parseFloat(r_transport_agent)+parseFloat(r_commission)+parseFloat(r_retrait_documentaire)+parseFloat(r_manifeste);
		$("#montant_reel").html(
	
			new Intl.NumberFormat('fr', {
				style: 'currency',
				currency: 'XOF',
				currencySign: 'accounting'
			}).format(total_formalite)
			
		).show();
		}
	 });

	 $.ajax({
		type: "POST",
		url: "dossier_import/stock_montant_reel.php",
		data: 'total_formalite='+total_formalite,
		cache: false,
		success: function(result){
			//
		}
	 });
});

//Etape 2 || Livraison
$('#r_retrait_documentaire').on('keyup', function(){

	var r_retrait_documentaire=$("#r_retrait_documentaire").val();

	$.ajax({
		type: "POST",
		data: "r_retrait_documentaire="+r_retrait_documentaire,
		url: "dossier_import/update_r_retrait_documentaire.php",
		cache: false,
		success: function(result){
			
			$("#montant_reel").hide();
		var total_formalite=parseFloat(r_dt)+parseFloat(r_sydam)+parseFloat(r_agio)+parseFloat(r_ts_douane)+parseFloat(r_bsc)+parseFloat(r_api)+parseFloat(r_assurance)+parseFloat(r_certificat_phyto)+parseFloat(r_magasinage)+parseFloat(r_manutention)+parseFloat(r_echange_bl)+parseFloat(r_acconage)+parseFloat(r_surestarie)+parseFloat(r_caution)+parseFloat(r_livraison)+parseFloat(r_transport_agent)+parseFloat(r_commission)+parseFloat(r_retrait_documentaire)+parseFloat(r_manifeste);
		$("#montant_reel").html(
	
			new Intl.NumberFormat('fr', {
				style: 'currency',
				currency: 'XOF',
				currencySign: 'accounting'
			}).format(total_formalite)
			
		).show();
		}
	 });

	 $.ajax({
		type: "POST",
		url: "dossier_import/stock_montant_reel.php",
		data: 'total_formalite='+total_formalite,
		cache: false,
		success: function(result){
			//
		}
	 });
});

//Etape 2 || Livraison
$('#r_manifeste').on('keyup', function(){

	var r_manifeste=$("#r_manifeste").val();

	$.ajax({
		type: "POST",
		data: "r_manifeste="+r_manifeste,
		url: "dossier_import/update_r_manifeste.php",
		cache: false,
		success: function(result){
			
			$("#montant_reel").hide();
		var total_formalite=parseFloat(r_dt)+parseFloat(r_sydam)+parseFloat(r_agio)+parseFloat(r_ts_douane)+parseFloat(r_bsc)+parseFloat(r_api)+parseFloat(r_assurance)+parseFloat(r_certificat_phyto)+parseFloat(r_magasinage)+parseFloat(r_manutention)+parseFloat(r_echange_bl)+parseFloat(r_acconage)+parseFloat(r_surestarie)+parseFloat(r_caution)+parseFloat(r_livraison)+parseFloat(r_transport_agent)+parseFloat(r_commission)+parseFloat(r_retrait_documentaire)+parseFloat(r_manifeste);
		$("#montant_reel").html(
	
			new Intl.NumberFormat('fr', {
				style: 'currency',
				currency: 'XOF',
				currencySign: 'accounting'
			}).format(total_formalite)
			
		).show();
		}
	 });

	 $.ajax({
		type: "POST",
		url: "dossier_import/stock_montant_reel.php",
		data: 'total_formalite='+total_formalite,
		cache: false,
		success: function(result){
			//
		}
	 });
});

//Etape 2 || Livraison
$('#r_acconage').on('keyup', function(){

	var r_acconage=$("#r_acconage").val();

	$.ajax({
		type: "POST",
		data: "r_acconage="+r_acconage,
		url: "dossier_import/update_r_acconage.php",
		cache: false,
		success: function(result){
		
			$("#montant_reel").hide();
			var total_formalite=parseFloat(r_dt)+parseFloat(r_sydam)+parseFloat(r_agio)+parseFloat(r_ts_douane)+parseFloat(r_bsc)+parseFloat(r_api)+parseFloat(r_assurance)+parseFloat(r_certificat_phyto)+parseFloat(r_magasinage)+parseFloat(r_manutention)+parseFloat(r_echange_bl)+parseFloat(r_acconage)+parseFloat(r_surestarie)+parseFloat(r_caution)+parseFloat(r_livraison)+parseFloat(r_transport_agent)+parseFloat(r_commission)+parseFloat(r_retrait_documentaire)+parseFloat(r_manifeste);
			$("#montant_reel").html(
	
				new Intl.NumberFormat('fr', {
					style: 'currency',
					currency: 'XOF',
					currencySign: 'accounting'
				}).format(total_formalite)
				
			).show();
		}
	 });
});


/*Edition bon de livraison*/

//Etape 2 || Livraison
$('#nom_fournisseur').on('keyup', function(){

	var nom_fournisseur=$("#nom_fournisseur").val();

	$.ajax({
		type: "POST",
		data: "nom_fournisseur="+nom_fournisseur,
		url: "dossier_import/update_nom_fournisseur.php",
		cache: false,
		success: function(result){
			//$("#nom_fournisseur").html(nom_fournisseur).show();
		}
	 });
});
//Etape 2 || Livraison
$('#date_declaration_bl').on('keyup', function(){

	var date_declaration_bl=$("#date_declaration_bl").val();

	$.ajax({
		type: "POST",
		data: "date_declaration_bl="+date_declaration_bl,
		url: "dossier_import/update_date_declaration_bl.php",
		cache: false,
		success: function(result){
			//$("#nom_fournisseur").html(nom_fournisseur).show();
		}
	 });
});
//Etape 2 || Livraison
$('#date_lta_bl').on('keyup', function(){

	var date_lta_bl=$("#date_lta_bl").val();

	$.ajax({
		type: "POST",
		data: "date_lta_bl="+date_lta_bl,
		url: "dossier_import/update_date_lta_bl.php",
		cache: false,
		success: function(result){
			//$("#nom_fournisseur").html(nom_fournisseur).show();
		}
	 });
});
//Etape 2 || Livraison
$('#waybill_bl').on('keyup', function(){

	var waybill_bl=$("#waybill_bl").val();

	$.ajax({
		type: "POST",
		data: "waybill_bl="+waybill_bl,
		url: "dossier_import/update_waybill_bl.php",
		cache: false,
		success: function(result){
			//$("#nom_fournisseur").html(nom_fournisseur).show();
		}
	 });
});

$('input[name=facture_fournisseur]').live('change', function(){

	if( $('input[name=facture_fournisseur]').is(':checked') ){
		var facture_fournisseur=1;
		$.ajax({
			type: "POST",
			data: "facture_fournisseur="+facture_fournisseur,
			url: "dossier_import/update_facture_fournisseur.php",
			cache: false,
			success: function(result){

			}
	 	});
	} else {
		var facture_fournisseur=0;
		$.ajax({
			type: "POST",
			data: "facture_fournisseur="+facture_fournisseur,
			url: "dossier_import/update_facture_fournisseur.php",
			cache: false,
			success: function(result){
				
			}
	 	});
	}

});


$('input[name=bon_a_enlever]').live('change', function(){

	if( $('input[name=bon_a_enlever]').is(':checked') ){
		var bon_a_enlever=1;
		$.ajax({
			type: "POST",
			data: "bon_a_enlever="+bon_a_enlever,
			url: "dossier_import/update_bon_a_enlever.php",
			cache: false,
			success: function(result){

			}
	 	});
	} else {
		var bon_a_enlever=0;
		$.ajax({
			type: "POST",
			data: "bon_a_enlever="+bon_a_enlever,
			url: "dossier_import/update_bon_a_enlever.php",
			cache: false,
			success: function(result){
				
			}
	 	});
	}

});

$('input[name=copie_lta]').live('change', function(){

	if( $('input[name=copie_lta]').is(':checked') ){
		var copie_lta=1;
		$.ajax({
			type: "POST",
			data: "copie_lta="+copie_lta,
			url: "dossier_import/update_copie_lta.php",
			cache: false,
			success: function(result){

			}
	 	});
	} else {
		var copie_lta=0;
		$.ajax({
			type: "POST",
			data: "copie_lta="+copie_lta,
			url: "dossier_import/update_copie_lta.php",
			cache: false,
			success: function(result){
				
			}
	 	});
	}

});

$('input[name=liste_colisage]').live('change', function(){

	if( $('input[name=liste_colisage]').is(':checked') ){
		var liste_colisage=1;
		$.ajax({
			type: "POST",
			data: "liste_colisage="+liste_colisage,
			url: "dossier_import/update_liste_colisage.php",
			cache: false,
			success: function(result){

			}
	 	});
	} else {
		var liste_colisage=0;
		$.ajax({
			type: "POST",
			data: "liste_colisage="+liste_colisage,
			url: "dossier_import/update_liste_colisage.php",
			cache: false,
			success: function(result){
				
			}
	 	});
	}

});

$('input[name=autre_document]').live('change', function(){

	if( $('input[name=autre_document]').is(':checked') ){
		var autre_document=1;

		$('#type_autre_doc').show();

		$.ajax({
			type: "POST",
			data: "autre_document="+autre_document,
			url: "dossier_import/update_autre_document.php",
			cache: false,
			success: function(result){

			}
	 	});
	} else {
		var autre_document=0;

		$('#type_autre_doc').hide();

		$.ajax({
			type: "POST",
			data: "autre_document="+autre_document,
			url: "dossier_import/update_autre_document.php",
			cache: false,
			success: function(result){
				
			}
	 	});
	}


});
/* Fin Edition bon de livraison */

//Modification article
$(".edit_article").live('click', function() {
	var id_ref = $(this).attr('data-id');
	//alert('TEST CLICK MOD');
	$.ajax({
	 type: "GET",
     url: "dossier_import/form_modifier_article.php",
     data: "ref="+id_ref,
	 success: function(msg){
	   $("#affiche_mod").html(msg);
	   $("#myModal_article_mod").modal('show');	
	 }
   });
	
 });
 $('#form_article_mod').live('submit',function(){
										 
	
		   $.ajax({
		   type: "POST",
		   url: "personnel/modif_personnel.php",
		   dataType: 'text', 
		   cache: false,
           contentType: false,
           processData: false, 
		   data: new FormData(this),
		   success: function(msg){	  
		   
		    if(msg==1)
	       {
			$("div.msg_erreur").html("Ce matricule existe d&eacute;j&agrave; !").show();
		   }
		   else
		   {
		   location.reload(true); 
		   //$("div.msg_erreur").html(msg).show();
		   }
		   }
		   });
		  
		 return false;
      });
 

	  //Suppression article
	  $(".delete_article").live('click', function() {
		var id_ref = $(this).attr('data-id');
		$.ajax({
		 type: "GET",
		 url: "dossier_import/form_supprimer_article.php",
		 data: "ref="+id_ref,
		 success: function(msg){
		   $("#affiche_sup").html(msg);
		   $("#modal_sup_article").modal('show');	
		 }
	   });
	 });
	 $('#submit_sup_article').live('click',function(){						 
		   $.ajax({
			   type: "POST",
			   url: "dossier_import/sup_article.php",
			   success: function(msg){  
				change_page_article('0');

				if(parseFloat($('#total_fob_cfa').val())<500000)
				{
					$('#rpi').val(0);
					var rpi=0;
				}
		
				if(parseFloat($('#total_fob_cfa').val())<1000000 && parseFloat($('#total_fob_cfa').val())>=500000 )
				{
					$('#rpi').val(70000);
					var rpi=70000;
				}
		
				if(parseFloat($('#total_fob_cfa').val())<13350000 && parseFloat($('#total_fob_cfa').val())>=1000000 )
				{
					$('#rpi').val(100000);
					var rpi=100000;
				}
		
				if(parseFloat($('#total_fob_cfa').val())>13350000)
				{
					$('#rpi').val(parseFloat($('#total_fob_cfa').val())*0.0075);
					var rpi=parseFloat($('#total_fob_cfa').val())*0.0075;
				}
				//alert (rpi);


			   }
			});
		return false;
	});


	//Net  à payer dynamique
	$("#tirage_declaration").on('keyup', function(){
		$("#net_a_payer").hide();

		if($("#tirage_declaration").val()==0){ $("#tirage_declaration").val(''); }

				
		var net_a_payer=
		parseFloat($("#dt_total").val())
		+parseFloat($("#tirage_declaration").val())
		+parseFloat($("#sydam").val())
		+parseFloat($("#fiche_assurance").val())
		+parseFloat($("#agio").val())
		+parseFloat($("#ouverture_dossier").val())
		+parseFloat($("#acconage").val())
		+parseFloat($("#surestarie").val())
		+parseFloat($("#echange_bl").val())
		+parseFloat($("#caution").val())
		+parseFloat($("#livraison").val())
		+parseFloat($("#ts_douane").val())
		+parseFloat($("#retrait_documentaire").val())
		+parseFloat($("#debours_divers").val())
		+parseFloat($("#documentation_weeb").val())
		+parseFloat($("#bsc").val())
		+parseFloat($("#certificat_phyto").val())
		+parseFloat($("#api").val())
		+parseFloat($("#aiae").val())
		+parseFloat($("#certificat_veterinaire").val())
		+parseFloat($("#appurement_magasin").val())
		+parseFloat($("#magasinage").val())
		+parseFloat($("#sortie_pc").val())
		+parseFloat($("#commission").val())
		+parseFloat($("#escorte").val())
		+parseFloat($("#manutention").val())
		+parseFloat($("#had").val())
		;
		
		$("#net_a_payer").html(parseFloat(net_a_payer)+' XOF').show();


		$.ajax({
			type: "POST",
			url: "dossier_import/stock_nap.php",
			data: 'net_a_payer='+net_a_payer,
			cache: false,
			success: function(result){
				//
			}
	 	});

		
	});
	$("#dt_total").on('keyup', function(){
		$("#net_a_payer").hide();

		var net_a_payer=
		parseFloat($("#dt_total").val())
		+parseFloat($("#tirage_declaration").val())
		+parseFloat($("#sydam").val())
		+parseFloat($("#fiche_assurance").val())
		+parseFloat($("#agio").val())
		+parseFloat($("#ouverture_dossier").val())
		+parseFloat($("#acconage").val())
		+parseFloat($("#surestarie").val())
		+parseFloat($("#echange_bl").val())
		+parseFloat($("#caution").val())
		+parseFloat($("#livraison").val())
		+parseFloat($("#ts_douane").val())
		+parseFloat($("#retrait_documentaire").val())
		+parseFloat($("#debours_divers").val())
		+parseFloat($("#documentation_weeb").val())
		+parseFloat($("#bsc").val())
		+parseFloat($("#certificat_phyto").val())
		+parseFloat($("#api").val())
		+parseFloat($("#aiae").val())
		+parseFloat($("#certificat_veterinaire").val())
		+parseFloat($("#appurement_magasin").val())
		+parseFloat($("#magasinage").val())
		+parseFloat($("#sortie_pc").val())
		+parseFloat($("#commission").val())
		+parseFloat($("#escorte").val())
		+parseFloat($("#manutention").val())
		+parseFloat($("#had").val())
		;
		
		$("#net_a_payer").html(parseFloat(net_a_payer)+' XOF').show();

		$.ajax({
			type: "POST",
			url: "dossier_import/stock_nap.php",
			data: 'net_a_payer='+net_a_payer,
			cache: false,
			success: function(result){
				//
			}
	 	});

	});
	$("#sydam").on('keyup', function(){
		$("#net_a_payer").hide();

		var net_a_payer=
		parseFloat($("#dt_total").val())
		+parseFloat($("#tirage_declaration").val())
		+parseFloat($("#sydam").val())
		+parseFloat($("#fiche_assurance").val())
		+parseFloat($("#agio").val())
		+parseFloat($("#ouverture_dossier").val())
		+parseFloat($("#acconage").val())
		+parseFloat($("#surestarie").val())
		+parseFloat($("#echange_bl").val())
		+parseFloat($("#caution").val())
		+parseFloat($("#livraison").val())
		+parseFloat($("#ts_douane").val())
		+parseFloat($("#retrait_documentaire").val())
		+parseFloat($("#debours_divers").val())
		+parseFloat($("#documentation_weeb").val())
		+parseFloat($("#bsc").val())
		+parseFloat($("#certificat_phyto").val())
		+parseFloat($("#api").val())
		+parseFloat($("#aiae").val())
		+parseFloat($("#certificat_veterinaire").val())
		+parseFloat($("#appurement_magasin").val())
		+parseFloat($("#magasinage").val())
		+parseFloat($("#sortie_pc").val())
		+parseFloat($("#commission").val())
		+parseFloat($("#escorte").val())
		+parseFloat($("#manutention").val())
		+parseFloat($("#had").val())
		;
		
		$("#net_a_payer").html(parseFloat(net_a_payer)+' XOF').show();

		$.ajax({
			type: "POST",
			url: "dossier_import/stock_nap.php",
			data: 'net_a_payer='+net_a_payer,
			cache: false,
			success: function(result){
				//
			}
	 	});
	});
	$("#fiche_assurance").on('keyup', function(){
		$("#net_a_payer").hide();

		var net_a_payer=
		parseFloat($("#dt_total").val())
		+parseFloat($("#tirage_declaration").val())
		+parseFloat($("#sydam").val())
		+parseFloat($("#fiche_assurance").val())
		+parseFloat($("#agio").val())
		+parseFloat($("#ouverture_dossier").val())
		+parseFloat($("#acconage").val())
		+parseFloat($("#surestarie").val())
		+parseFloat($("#echange_bl").val())
		+parseFloat($("#caution").val())
		+parseFloat($("#livraison").val())
		+parseFloat($("#ts_douane").val())
		+parseFloat($("#retrait_documentaire").val())
		+parseFloat($("#debours_divers").val())
		+parseFloat($("#documentation_weeb").val())
		+parseFloat($("#bsc").val())
		+parseFloat($("#certificat_phyto").val())
		+parseFloat($("#api").val())
		+parseFloat($("#aiae").val())
		+parseFloat($("#certificat_veterinaire").val())
		+parseFloat($("#appurement_magasin").val())
		+parseFloat($("#magasinage").val())
		+parseFloat($("#sortie_pc").val())
		+parseFloat($("#commission").val())
		+parseFloat($("#escorte").val())
		+parseFloat($("#manutention").val())
		+parseFloat($("#had").val())
		;
		
		$("#net_a_payer").html(parseFloat(net_a_payer)+' XOF').show();

		$.ajax({
			type: "POST",
			url: "dossier_import/stock_nap.php",
			data: 'net_a_payer='+net_a_payer,
			cache: false,
			success: function(result){
				//
			}
	 	});
	});
	$("#agio").on('keyup', function(){
		$("#net_a_payer").hide();

		var net_a_payer=
		parseFloat($("#dt_total").val())
		+parseFloat($("#tirage_declaration").val())
		+parseFloat($("#sydam").val())
		+parseFloat($("#fiche_assurance").val())
		+parseFloat($("#agio").val())
		+parseFloat($("#ouverture_dossier").val())
		+parseFloat($("#acconage").val())
		+parseFloat($("#surestarie").val())
		+parseFloat($("#echange_bl").val())
		+parseFloat($("#caution").val())
		+parseFloat($("#livraison").val())
		+parseFloat($("#ts_douane").val())
		+parseFloat($("#retrait_documentaire").val())
		+parseFloat($("#debours_divers").val())
		+parseFloat($("#documentation_weeb").val())
		+parseFloat($("#bsc").val())
		+parseFloat($("#certificat_phyto").val())
		+parseFloat($("#api").val())
		+parseFloat($("#aiae").val())
		+parseFloat($("#certificat_veterinaire").val())
		+parseFloat($("#appurement_magasin").val())
		+parseFloat($("#magasinage").val())
		+parseFloat($("#sortie_pc").val())
		+parseFloat($("#commission").val())
		+parseFloat($("#escorte").val())
		+parseFloat($("#manutention").val())
		+parseFloat($("#had").val())
		;
		
		$("#net_a_payer").html(parseFloat(net_a_payer)+' XOF').show();

		$.ajax({
			type: "POST",
			url: "dossier_import/stock_nap.php",
			data: 'net_a_payer='+net_a_payer,
			cache: false,
			success: function(result){
				//
			}
	 	});
	});
	$("#ouverture_dossier").on('keyup', function(){
		$("#net_a_payer").hide();

		var net_a_payer=
		parseFloat($("#dt_total").val())
		+parseFloat($("#tirage_declaration").val())
		+parseFloat($("#sydam").val())
		+parseFloat($("#fiche_assurance").val())
		+parseFloat($("#agio").val())
		+parseFloat($("#ouverture_dossier").val())
		+parseFloat($("#acconage").val())
		+parseFloat($("#surestarie").val())
		+parseFloat($("#echange_bl").val())
		+parseFloat($("#caution").val())
		+parseFloat($("#livraison").val())
		+parseFloat($("#ts_douane").val())
		+parseFloat($("#retrait_documentaire").val())
		+parseFloat($("#debours_divers").val())
		+parseFloat($("#documentation_weeb").val())
		+parseFloat($("#bsc").val())
		+parseFloat($("#certificat_phyto").val())
		+parseFloat($("#api").val())
		+parseFloat($("#aiae").val())
		+parseFloat($("#certificat_veterinaire").val())
		+parseFloat($("#appurement_magasin").val())
		+parseFloat($("#magasinage").val())
		+parseFloat($("#sortie_pc").val())
		+parseFloat($("#commission").val())
		+parseFloat($("#escorte").val())
		+parseFloat($("#manutention").val())
		+parseFloat($("#had").val())
		;
		
		$("#net_a_payer").html(parseFloat(net_a_payer)+' XOF').show();

		$.ajax({
			type: "POST",
			url: "dossier_import/stock_nap.php",
			data: 'net_a_payer='+net_a_payer,
			cache: false,
			success: function(result){
				//
			}
	 	});
	});
	$("#acconage").on('keyup', function(){
		$("#net_a_payer").hide();

		var net_a_payer=
		parseFloat($("#dt_total").val())
		+parseFloat($("#tirage_declaration").val())
		+parseFloat($("#sydam").val())
		+parseFloat($("#fiche_assurance").val())
		+parseFloat($("#agio").val())
		+parseFloat($("#ouverture_dossier").val())
		+parseFloat($("#acconage").val())
		+parseFloat($("#surestarie").val())
		+parseFloat($("#echange_bl").val())
		+parseFloat($("#caution").val())
		+parseFloat($("#livraison").val())
		+parseFloat($("#ts_douane").val())
		+parseFloat($("#retrait_documentaire").val())
		+parseFloat($("#debours_divers").val())
		+parseFloat($("#documentation_weeb").val())
		+parseFloat($("#bsc").val())
		+parseFloat($("#certificat_phyto").val())
		+parseFloat($("#api").val())
		+parseFloat($("#aiae").val())
		+parseFloat($("#certificat_veterinaire").val())
		+parseFloat($("#appurement_magasin").val())
		+parseFloat($("#magasinage").val())
		+parseFloat($("#sortie_pc").val())
		+parseFloat($("#commission").val())
		+parseFloat($("#escorte").val())
		+parseFloat($("#manutention").val())
		+parseFloat($("#had").val())
		;
		
		$("#net_a_payer").html(parseFloat(net_a_payer)+' XOF').show();

		$.ajax({
			type: "POST",
			url: "dossier_import/stock_nap.php",
			data: 'net_a_payer='+net_a_payer,
			cache: false,
			success: function(result){
				//
			}
	 	});
	});
	$("#surestarie").on('keyup', function(){
		$("#net_a_payer").hide();

		var net_a_payer=
		parseFloat($("#dt_total").val())
		+parseFloat($("#tirage_declaration").val())
		+parseFloat($("#sydam").val())
		+parseFloat($("#fiche_assurance").val())
		+parseFloat($("#agio").val())
		+parseFloat($("#ouverture_dossier").val())
		+parseFloat($("#acconage").val())
		+parseFloat($("#surestarie").val())
		+parseFloat($("#echange_bl").val())
		+parseFloat($("#caution").val())
		+parseFloat($("#livraison").val())
		+parseFloat($("#ts_douane").val())
		+parseFloat($("#retrait_documentaire").val())
		+parseFloat($("#debours_divers").val())
		+parseFloat($("#documentation_weeb").val())
		+parseFloat($("#bsc").val())
		+parseFloat($("#certificat_phyto").val())
		+parseFloat($("#api").val())
		+parseFloat($("#aiae").val())
		+parseFloat($("#certificat_veterinaire").val())
		+parseFloat($("#appurement_magasin").val())
		+parseFloat($("#magasinage").val())
		+parseFloat($("#sortie_pc").val())
		+parseFloat($("#commission").val())
		+parseFloat($("#escorte").val())
		+parseFloat($("#manutention").val())
		+parseFloat($("#had").val())
		;
		
		$("#net_a_payer").html(parseFloat(net_a_payer)+' XOF').show();

		$.ajax({
			type: "POST",
			url: "dossier_import/stock_nap.php",
			data: 'net_a_payer='+net_a_payer,
			cache: false,
			success: function(result){
				//
			}
	 	});
	});
	$("#echange_bl").on('keyup', function(){
		$("#net_a_payer").hide();

		var net_a_payer=
		parseFloat($("#dt_total").val())
		+parseFloat($("#tirage_declaration").val())
		+parseFloat($("#sydam").val())
		+parseFloat($("#fiche_assurance").val())
		+parseFloat($("#agio").val())
		+parseFloat($("#ouverture_dossier").val())
		+parseFloat($("#acconage").val())
		+parseFloat($("#surestarie").val())
		+parseFloat($("#echange_bl").val())
		+parseFloat($("#caution").val())
		+parseFloat($("#livraison").val())
		+parseFloat($("#ts_douane").val())
		+parseFloat($("#retrait_documentaire").val())
		+parseFloat($("#debours_divers").val())
		+parseFloat($("#documentation_weeb").val())
		+parseFloat($("#bsc").val())
		+parseFloat($("#certificat_phyto").val())
		+parseFloat($("#api").val())
		+parseFloat($("#aiae").val())
		+parseFloat($("#certificat_veterinaire").val())
		+parseFloat($("#appurement_magasin").val())
		+parseFloat($("#magasinage").val())
		+parseFloat($("#sortie_pc").val())
		+parseFloat($("#commission").val())
		+parseFloat($("#escorte").val())
		+parseFloat($("#manutention").val())
		+parseFloat($("#had").val())
		;
		
		$("#net_a_payer").html(parseFloat(net_a_payer)+' XOF').show();

		$.ajax({
			type: "POST",
			url: "dossier_import/stock_nap.php",
			data: 'net_a_payer='+net_a_payer,
			cache: false,
			success: function(result){
				//
			}
	 	});
	});
	$("#caution").on('keyup', function(){
		$("#net_a_payer").hide();

		var net_a_payer=
		parseFloat($("#dt_total").val())
		+parseFloat($("#tirage_declaration").val())
		+parseFloat($("#sydam").val())
		+parseFloat($("#fiche_assurance").val())
		+parseFloat($("#agio").val())
		+parseFloat($("#ouverture_dossier").val())
		+parseFloat($("#acconage").val())
		+parseFloat($("#surestarie").val())
		+parseFloat($("#echange_bl").val())
		+parseFloat($("#caution").val())
		+parseFloat($("#livraison").val())
		+parseFloat($("#ts_douane").val())
		+parseFloat($("#retrait_documentaire").val())
		+parseFloat($("#debours_divers").val())
		+parseFloat($("#documentation_weeb").val())
		+parseFloat($("#bsc").val())
		+parseFloat($("#certificat_phyto").val())
		+parseFloat($("#api").val())
		+parseFloat($("#aiae").val())
		+parseFloat($("#certificat_veterinaire").val())
		+parseFloat($("#appurement_magasin").val())
		+parseFloat($("#magasinage").val())
		+parseFloat($("#sortie_pc").val())
		+parseFloat($("#commission").val())
		+parseFloat($("#escorte").val())
		+parseFloat($("#manutention").val())
		+parseFloat($("#had").val())
		;
		
		$("#net_a_payer").html(parseFloat(net_a_payer)+' XOF').show();

		$.ajax({
			type: "POST",
			url: "dossier_import/stock_nap.php",
			data: 'net_a_payer='+net_a_payer,
			cache: false,
			success: function(result){
				//
			}
	 	});
	});
	$("#livraison").on('keyup', function(){
		$("#net_a_payer").hide();

		var net_a_payer=
		parseFloat($("#dt_total").val())
		+parseFloat($("#tirage_declaration").val())
		+parseFloat($("#sydam").val())
		+parseFloat($("#fiche_assurance").val())
		+parseFloat($("#agio").val())
		+parseFloat($("#ouverture_dossier").val())
		+parseFloat($("#acconage").val())
		+parseFloat($("#surestarie").val())
		+parseFloat($("#echange_bl").val())
		+parseFloat($("#caution").val())
		+parseFloat($("#livraison").val())
		+parseFloat($("#ts_douane").val())
		+parseFloat($("#retrait_documentaire").val())
		+parseFloat($("#debours_divers").val())
		+parseFloat($("#documentation_weeb").val())
		+parseFloat($("#bsc").val())
		+parseFloat($("#certificat_phyto").val())
		+parseFloat($("#api").val())
		+parseFloat($("#aiae").val())
		+parseFloat($("#certificat_veterinaire").val())
		+parseFloat($("#appurement_magasin").val())
		+parseFloat($("#magasinage").val())
		+parseFloat($("#sortie_pc").val())
		+parseFloat($("#commission").val())
		+parseFloat($("#escorte").val())
		+parseFloat($("#manutention").val())
		+parseFloat($("#had").val())
		;
		
		$("#net_a_payer").html(parseFloat(net_a_payer)+' XOF').show();

		$.ajax({
			type: "POST",
			url: "dossier_import/stock_nap.php",
			data: 'net_a_payer='+net_a_payer,
			cache: false,
			success: function(result){
				//
			}
	 	});
	});
	$("#ts_douane").on('keyup', function(){
		$("#net_a_payer").hide();

		var net_a_payer=
		parseFloat($("#dt_total").val())
		+parseFloat($("#tirage_declaration").val())
		+parseFloat($("#sydam").val())
		+parseFloat($("#fiche_assurance").val())
		+parseFloat($("#agio").val())
		+parseFloat($("#ouverture_dossier").val())
		+parseFloat($("#acconage").val())
		+parseFloat($("#surestarie").val())
		+parseFloat($("#echange_bl").val())
		+parseFloat($("#caution").val())
		+parseFloat($("#livraison").val())
		+parseFloat($("#ts_douane").val())
		+parseFloat($("#retrait_documentaire").val())
		+parseFloat($("#debours_divers").val())
		+parseFloat($("#documentation_weeb").val())
		+parseFloat($("#bsc").val())
		+parseFloat($("#certificat_phyto").val())
		+parseFloat($("#api").val())
		+parseFloat($("#aiae").val())
		+parseFloat($("#certificat_veterinaire").val())
		+parseFloat($("#appurement_magasin").val())
		+parseFloat($("#magasinage").val())
		+parseFloat($("#sortie_pc").val())
		+parseFloat($("#commission").val())
		+parseFloat($("#escorte").val())
		+parseFloat($("#manutention").val())
		+parseFloat($("#had").val())
		;
		
		$("#net_a_payer").html(parseFloat(net_a_payer)+' XOF').show();

		$.ajax({
			type: "POST",
			url: "dossier_import/stock_nap.php",
			data: 'net_a_payer='+net_a_payer,
			cache: false,
			success: function(result){
				//
			}
	 	});
	});

	$("#retrait_documentaire").on('keyup', function(){
		$("#net_a_payer").hide();

		var net_a_payer=
		parseFloat($("#dt_total").val())
		+parseFloat($("#tirage_declaration").val())
		+parseFloat($("#sydam").val())
		+parseFloat($("#fiche_assurance").val())
		+parseFloat($("#agio").val())
		+parseFloat($("#ouverture_dossier").val())
		+parseFloat($("#acconage").val())
		+parseFloat($("#surestarie").val())
		+parseFloat($("#echange_bl").val())
		+parseFloat($("#caution").val())
		+parseFloat($("#livraison").val())
		+parseFloat($("#ts_douane").val())
		+parseFloat($("#retrait_documentaire").val())
		+parseFloat($("#debours_divers").val())
		+parseFloat($("#documentation_weeb").val())
		+parseFloat($("#bsc").val())
		+parseFloat($("#certificat_phyto").val())
		+parseFloat($("#api").val())
		+parseFloat($("#aiae").val())
		+parseFloat($("#certificat_veterinaire").val())
		+parseFloat($("#appurement_magasin").val())
		+parseFloat($("#magasinage").val())
		+parseFloat($("#sortie_pc").val())
		+parseFloat($("#commission").val())
		+parseFloat($("#escorte").val())
		+parseFloat($("#manutention").val())
		+parseFloat($("#had").val())
		;
		
		$("#net_a_payer").html(parseFloat(net_a_payer)+' XOF').show();

		$.ajax({
			type: "POST",
			url: "dossier_import/stock_nap.php",
			data: 'net_a_payer='+net_a_payer,
			cache: false,
			success: function(result){
				//
			}
	 	});
	});
	$("#debours_divers").on('keyup', function(){
		$("#net_a_payer").hide();

		var net_a_payer=
		parseFloat($("#dt_total").val())
		+parseFloat($("#tirage_declaration").val())
		+parseFloat($("#sydam").val())
		+parseFloat($("#fiche_assurance").val())
		+parseFloat($("#agio").val())
		+parseFloat($("#ouverture_dossier").val())
		+parseFloat($("#acconage").val())
		+parseFloat($("#surestarie").val())
		+parseFloat($("#echange_bl").val())
		+parseFloat($("#caution").val())
		+parseFloat($("#livraison").val())
		+parseFloat($("#ts_douane").val())
		+parseFloat($("#retrait_documentaire").val())
		+parseFloat($("#debours_divers").val())
		+parseFloat($("#documentation_weeb").val())
		+parseFloat($("#bsc").val())
		+parseFloat($("#certificat_phyto").val())
		+parseFloat($("#api").val())
		+parseFloat($("#aiae").val())
		+parseFloat($("#certificat_veterinaire").val())
		+parseFloat($("#appurement_magasin").val())
		+parseFloat($("#magasinage").val())
		+parseFloat($("#sortie_pc").val())
		+parseFloat($("#commission").val())
		+parseFloat($("#escorte").val())
		+parseFloat($("#manutention").val())
		+parseFloat($("#had").val())
		;
		
		$("#net_a_payer").html(parseFloat(net_a_payer)+' XOF').show();

		$.ajax({
			type: "POST",
			url: "dossier_import/stock_nap.php",
			data: 'net_a_payer='+net_a_payer,
			cache: false,
			success: function(result){
				//
			}
	 	});
	});
	$("#documentation_weeb").on('keyup', function(){
		$("#net_a_payer").hide();

		var net_a_payer=
		parseFloat($("#dt_total").val())
		+parseFloat($("#tirage_declaration").val())
		+parseFloat($("#sydam").val())
		+parseFloat($("#fiche_assurance").val())
		+parseFloat($("#agio").val())
		+parseFloat($("#ouverture_dossier").val())
		+parseFloat($("#acconage").val())
		+parseFloat($("#surestarie").val())
		+parseFloat($("#echange_bl").val())
		+parseFloat($("#caution").val())
		+parseFloat($("#livraison").val())
		+parseFloat($("#ts_douane").val())
		+parseFloat($("#retrait_documentaire").val())
		+parseFloat($("#debours_divers").val())
		+parseFloat($("#documentation_weeb").val())
		+parseFloat($("#bsc").val())
		+parseFloat($("#certificat_phyto").val())
		+parseFloat($("#api").val())
		+parseFloat($("#aiae").val())
		+parseFloat($("#certificat_veterinaire").val())
		+parseFloat($("#appurement_magasin").val())
		+parseFloat($("#magasinage").val())
		+parseFloat($("#sortie_pc").val())
		+parseFloat($("#commission").val())
		+parseFloat($("#escorte").val())
		+parseFloat($("#manutention").val())
		+parseFloat($("#had").val())
		;
		
		$("#net_a_payer").html(parseFloat(net_a_payer)+' XOF').show();

		$.ajax({
			type: "POST",
			url: "dossier_import/stock_nap.php",
			data: 'net_a_payer='+net_a_payer,
			cache: false,
			success: function(result){
				//
			}
	 	});
	});
	$("#bsc").on('keyup', function(){
		$("#net_a_payer").hide();

		var net_a_payer=
		parseFloat($("#dt_total").val())
		+parseFloat($("#tirage_declaration").val())
		+parseFloat($("#sydam").val())
		+parseFloat($("#fiche_assurance").val())
		+parseFloat($("#agio").val())
		+parseFloat($("#ouverture_dossier").val())
		+parseFloat($("#acconage").val())
		+parseFloat($("#surestarie").val())
		+parseFloat($("#echange_bl").val())
		+parseFloat($("#caution").val())
		+parseFloat($("#livraison").val())
		+parseFloat($("#ts_douane").val())
		+parseFloat($("#retrait_documentaire").val())
		+parseFloat($("#debours_divers").val())
		+parseFloat($("#documentation_weeb").val())
		+parseFloat($("#bsc").val())
		+parseFloat($("#certificat_phyto").val())
		+parseFloat($("#api").val())
		+parseFloat($("#aiae").val())
		+parseFloat($("#certificat_veterinaire").val())
		+parseFloat($("#appurement_magasin").val())
		+parseFloat($("#magasinage").val())
		+parseFloat($("#sortie_pc").val())
		+parseFloat($("#commission").val())
		+parseFloat($("#escorte").val())
		+parseFloat($("#manutention").val())
		+parseFloat($("#had").val())
		;
		
		$("#net_a_payer").html(parseFloat(net_a_payer)+' XOF').show();

		$.ajax({
			type: "POST",
			url: "dossier_import/stock_nap.php",
			data: 'net_a_payer='+net_a_payer,
			cache: false,
			success: function(result){
				//
			}
	 	});
	});
	$("#certificat_phyto").on('keyup', function(){
		$("#net_a_payer").hide();

		var net_a_payer=
		parseFloat($("#dt_total").val())
		+parseFloat($("#tirage_declaration").val())
		+parseFloat($("#sydam").val())
		+parseFloat($("#fiche_assurance").val())
		+parseFloat($("#agio").val())
		+parseFloat($("#ouverture_dossier").val())
		+parseFloat($("#acconage").val())
		+parseFloat($("#surestarie").val())
		+parseFloat($("#echange_bl").val())
		+parseFloat($("#caution").val())
		+parseFloat($("#livraison").val())
		+parseFloat($("#ts_douane").val())
		+parseFloat($("#retrait_documentaire").val())
		+parseFloat($("#debours_divers").val())
		+parseFloat($("#documentation_weeb").val())
		+parseFloat($("#bsc").val())
		+parseFloat($("#certificat_phyto").val())
		+parseFloat($("#api").val())
		+parseFloat($("#aiae").val())
		+parseFloat($("#certificat_veterinaire").val())
		+parseFloat($("#appurement_magasin").val())
		+parseFloat($("#magasinage").val())
		+parseFloat($("#sortie_pc").val())
		+parseFloat($("#commission").val())
		+parseFloat($("#escorte").val())
		+parseFloat($("#manutention").val())
		+parseFloat($("#had").val())
		;
		
		$("#net_a_payer").html(parseFloat(net_a_payer)+' XOF').show();

		$.ajax({
			type: "POST",
			url: "dossier_import/stock_nap.php",
			data: 'net_a_payer='+net_a_payer,
			cache: false,
			success: function(result){
				//
			}
	 	});
	});
	$("#api").on('keyup', function(){
		$("#net_a_payer").hide();

		var net_a_payer=
		parseFloat($("#dt_total").val())
		+parseFloat($("#tirage_declaration").val())
		+parseFloat($("#sydam").val())
		+parseFloat($("#fiche_assurance").val())
		+parseFloat($("#agio").val())
		+parseFloat($("#ouverture_dossier").val())
		+parseFloat($("#acconage").val())
		+parseFloat($("#surestarie").val())
		+parseFloat($("#echange_bl").val())
		+parseFloat($("#caution").val())
		+parseFloat($("#livraison").val())
		+parseFloat($("#ts_douane").val())
		+parseFloat($("#retrait_documentaire").val())
		+parseFloat($("#debours_divers").val())
		+parseFloat($("#documentation_weeb").val())
		+parseFloat($("#bsc").val())
		+parseFloat($("#certificat_phyto").val())
		+parseFloat($("#api").val())
		+parseFloat($("#aiae").val())
		+parseFloat($("#certificat_veterinaire").val())
		+parseFloat($("#appurement_magasin").val())
		+parseFloat($("#magasinage").val())
		+parseFloat($("#sortie_pc").val())
		+parseFloat($("#commission").val())
		+parseFloat($("#escorte").val())
		+parseFloat($("#manutention").val())
		+parseFloat($("#had").val())
		;
		
		$("#net_a_payer").html(parseFloat(net_a_payer)+' XOF').show();

		$.ajax({
			type: "POST",
			url: "dossier_import/stock_nap.php",
			data: 'net_a_payer='+net_a_payer,
			cache: false,
			success: function(result){
				//
			}
	 	});
	});
	$("#aiae").on('keyup', function(){
		$("#net_a_payer").hide();

		var net_a_payer=
		parseFloat($("#dt_total").val())
		+parseFloat($("#tirage_declaration").val())
		+parseFloat($("#sydam").val())
		+parseFloat($("#fiche_assurance").val())
		+parseFloat($("#agio").val())
		+parseFloat($("#ouverture_dossier").val())
		+parseFloat($("#acconage").val())
		+parseFloat($("#surestarie").val())
		+parseFloat($("#echange_bl").val())
		+parseFloat($("#caution").val())
		+parseFloat($("#livraison").val())
		+parseFloat($("#ts_douane").val())
		+parseFloat($("#retrait_documentaire").val())
		+parseFloat($("#debours_divers").val())
		+parseFloat($("#documentation_weeb").val())
		+parseFloat($("#bsc").val())
		+parseFloat($("#certificat_phyto").val())
		+parseFloat($("#api").val())
		+parseFloat($("#aiae").val())
		+parseFloat($("#certificat_veterinaire").val())
		+parseFloat($("#appurement_magasin").val())
		+parseFloat($("#magasinage").val())
		+parseFloat($("#sortie_pc").val())
		+parseFloat($("#commission").val())
		+parseFloat($("#escorte").val())
		+parseFloat($("#manutention").val())
		+parseFloat($("#had").val())
		;
		
		$("#net_a_payer").html(parseFloat(net_a_payer)+' XOF').show();

		$.ajax({
			type: "POST",
			url: "dossier_import/stock_nap.php",
			data: 'net_a_payer='+net_a_payer,
			cache: false,
			success: function(result){
				//
			}
	 	});
	});
	$("#certificat_veterinaire").on('keyup', function(){
		$("#net_a_payer").hide();

		var net_a_payer=
		parseFloat($("#dt_total").val())
		+parseFloat($("#tirage_declaration").val())
		+parseFloat($("#sydam").val())
		+parseFloat($("#fiche_assurance").val())
		+parseFloat($("#agio").val())
		+parseFloat($("#ouverture_dossier").val())
		+parseFloat($("#acconage").val())
		+parseFloat($("#surestarie").val())
		+parseFloat($("#echange_bl").val())
		+parseFloat($("#caution").val())
		+parseFloat($("#livraison").val())
		+parseFloat($("#ts_douane").val())
		+parseFloat($("#retrait_documentaire").val())
		+parseFloat($("#debours_divers").val())
		+parseFloat($("#documentation_weeb").val())
		+parseFloat($("#bsc").val())
		+parseFloat($("#certificat_phyto").val())
		+parseFloat($("#api").val())
		+parseFloat($("#aiae").val())
		+parseFloat($("#certificat_veterinaire").val())
		+parseFloat($("#appurement_magasin").val())
		+parseFloat($("#magasinage").val())
		+parseFloat($("#sortie_pc").val())
		+parseFloat($("#commission").val())
		+parseFloat($("#escorte").val())
		+parseFloat($("#manutention").val())
		+parseFloat($("#had").val())
		;
		
		$("#net_a_payer").html(parseFloat(net_a_payer)+' XOF').show();

		$.ajax({
			type: "POST",
			url: "dossier_import/stock_nap.php",
			data: 'net_a_payer='+net_a_payer,
			cache: false,
			success: function(result){
				//
			}
	 	});
	});
	$("#appurement_magasin").on('keyup', function(){
		$("#net_a_payer").hide();

		var net_a_payer=
		parseFloat($("#dt_total").val())
		+parseFloat($("#tirage_declaration").val())
		+parseFloat($("#sydam").val())
		+parseFloat($("#fiche_assurance").val())
		+parseFloat($("#agio").val())
		+parseFloat($("#ouverture_dossier").val())
		+parseFloat($("#acconage").val())
		+parseFloat($("#surestarie").val())
		+parseFloat($("#echange_bl").val())
		+parseFloat($("#caution").val())
		+parseFloat($("#livraison").val())
		+parseFloat($("#ts_douane").val())
		+parseFloat($("#retrait_documentaire").val())
		+parseFloat($("#debours_divers").val())
		+parseFloat($("#documentation_weeb").val())
		+parseFloat($("#bsc").val())
		+parseFloat($("#certificat_phyto").val())
		+parseFloat($("#api").val())
		+parseFloat($("#aiae").val())
		+parseFloat($("#certificat_veterinaire").val())
		+parseFloat($("#appurement_magasin").val())
		+parseFloat($("#magasinage").val())
		+parseFloat($("#sortie_pc").val())
		+parseFloat($("#commission").val())
		+parseFloat($("#escorte").val())
		+parseFloat($("#manutention").val())
		+parseFloat($("#had").val())
		;
		
		$("#net_a_payer").html(parseFloat(net_a_payer)+' XOF').show();

		$.ajax({
			type: "POST",
			url: "dossier_import/stock_nap.php",
			data: 'net_a_payer='+net_a_payer,
			cache: false,
			success: function(result){
				//
			}
	 	});
	});
	$("#magasinage").on('keyup', function(){
		$("#net_a_payer").hide();

		var net_a_payer=
		parseFloat($("#dt_total").val())
		+parseFloat($("#tirage_declaration").val())
		+parseFloat($("#sydam").val())
		+parseFloat($("#fiche_assurance").val())
		+parseFloat($("#agio").val())
		+parseFloat($("#ouverture_dossier").val())
		+parseFloat($("#acconage").val())
		+parseFloat($("#surestarie").val())
		+parseFloat($("#echange_bl").val())
		+parseFloat($("#caution").val())
		+parseFloat($("#livraison").val())
		+parseFloat($("#ts_douane").val())
		+parseFloat($("#retrait_documentaire").val())
		+parseFloat($("#debours_divers").val())
		+parseFloat($("#documentation_weeb").val())
		+parseFloat($("#bsc").val())
		+parseFloat($("#certificat_phyto").val())
		+parseFloat($("#api").val())
		+parseFloat($("#aiae").val())
		+parseFloat($("#certificat_veterinaire").val())
		+parseFloat($("#appurement_magasin").val())
		+parseFloat($("#magasinage").val())
		+parseFloat($("#sortie_pc").val())
		+parseFloat($("#commission").val())
		+parseFloat($("#escorte").val())
		+parseFloat($("#manutention").val())
		+parseFloat($("#had").val())
		;
		
		$("#net_a_payer").html(parseFloat(net_a_payer)+' XOF').show();

		$.ajax({
			type: "POST",
			url: "dossier_import/stock_nap.php",
			data: 'net_a_payer='+net_a_payer,
			cache: false,
			success: function(result){
				//
			}
	 	});
	});
	$("#sortie_pc").on('keyup', function(){
		$("#net_a_payer").hide();

		var net_a_payer=
		parseFloat($("#dt_total").val())
		+parseFloat($("#tirage_declaration").val())
		+parseFloat($("#sydam").val())
		+parseFloat($("#fiche_assurance").val())
		+parseFloat($("#agio").val())
		+parseFloat($("#ouverture_dossier").val())
		+parseFloat($("#acconage").val())
		+parseFloat($("#surestarie").val())
		+parseFloat($("#echange_bl").val())
		+parseFloat($("#caution").val())
		+parseFloat($("#livraison").val())
		+parseFloat($("#ts_douane").val())
		+parseFloat($("#retrait_documentaire").val())
		+parseFloat($("#debours_divers").val())
		+parseFloat($("#documentation_weeb").val())
		+parseFloat($("#bsc").val())
		+parseFloat($("#certificat_phyto").val())
		+parseFloat($("#api").val())
		+parseFloat($("#aiae").val())
		+parseFloat($("#certificat_veterinaire").val())
		+parseFloat($("#appurement_magasin").val())
		+parseFloat($("#magasinage").val())
		+parseFloat($("#sortie_pc").val())
		+parseFloat($("#commission").val())
		+parseFloat($("#escorte").val())
		+parseFloat($("#manutention").val())
		+parseFloat($("#had").val())
		;
		
		$("#net_a_payer").html(parseFloat(net_a_payer)+' XOF').show();

		$.ajax({
			type: "POST",
			url: "dossier_import/stock_nap.php",
			data: 'net_a_payer='+net_a_payer,
			cache: false,
			success: function(result){
				//
			}
	 	});
	});
	$("#commission").on('keyup', function(){
		$("#net_a_payer").hide();

		var net_a_payer=
		parseFloat($("#dt_total").val())
		+parseFloat($("#tirage_declaration").val())
		+parseFloat($("#sydam").val())
		+parseFloat($("#fiche_assurance").val())
		+parseFloat($("#agio").val())
		+parseFloat($("#ouverture_dossier").val())
		+parseFloat($("#acconage").val())
		+parseFloat($("#surestarie").val())
		+parseFloat($("#echange_bl").val())
		+parseFloat($("#caution").val())
		+parseFloat($("#livraison").val())
		+parseFloat($("#ts_douane").val())
		+parseFloat($("#retrait_documentaire").val())
		+parseFloat($("#debours_divers").val())
		+parseFloat($("#documentation_weeb").val())
		+parseFloat($("#bsc").val())
		+parseFloat($("#certificat_phyto").val())
		+parseFloat($("#api").val())
		+parseFloat($("#aiae").val())
		+parseFloat($("#certificat_veterinaire").val())
		+parseFloat($("#appurement_magasin").val())
		+parseFloat($("#magasinage").val())
		+parseFloat($("#sortie_pc").val())
		+parseFloat($("#commission").val())
		+parseFloat($("#escorte").val())
		+parseFloat($("#manutention").val())
		+parseFloat($("#had").val())
		;
		
		$("#net_a_payer").html(parseFloat(net_a_payer)+' XOF').show();

		$.ajax({
			type: "POST",
			url: "dossier_import/stock_nap.php",
			data: 'net_a_payer='+net_a_payer,
			cache: false,
			success: function(result){
				//
			}
	 	});
	});
	$("#escorte").on('keyup', function(){
		$("#net_a_payer").hide();

		var net_a_payer=
		parseFloat($("#dt_total").val())
		+parseFloat($("#tirage_declaration").val())
		+parseFloat($("#sydam").val())
		+parseFloat($("#fiche_assurance").val())
		+parseFloat($("#agio").val())
		+parseFloat($("#ouverture_dossier").val())
		+parseFloat($("#acconage").val())
		+parseFloat($("#surestarie").val())
		+parseFloat($("#echange_bl").val())
		+parseFloat($("#caution").val())
		+parseFloat($("#livraison").val())
		+parseFloat($("#ts_douane").val())
		+parseFloat($("#retrait_documentaire").val())
		+parseFloat($("#debours_divers").val())
		+parseFloat($("#documentation_weeb").val())
		+parseFloat($("#bsc").val())
		+parseFloat($("#certificat_phyto").val())
		+parseFloat($("#api").val())
		+parseFloat($("#aiae").val())
		+parseFloat($("#certificat_veterinaire").val())
		+parseFloat($("#appurement_magasin").val())
		+parseFloat($("#magasinage").val())
		+parseFloat($("#sortie_pc").val())
		+parseFloat($("#commission").val())
		+parseFloat($("#escorte").val())
		+parseFloat($("#manutention").val())
		+parseFloat($("#had").val())
		;
		
		$("#net_a_payer").html(parseFloat(net_a_payer)+' XOF').show();

		$.ajax({
			type: "POST",
			url: "dossier_import/stock_nap.php",
			data: 'net_a_payer='+net_a_payer,
			cache: false,
			success: function(result){
				//
			}
	 	});
	});
	$("#manutention").on('keyup', function(){
		$("#net_a_payer").hide();

		var net_a_payer=
		parseFloat($("#dt_total").val())
		+parseFloat($("#tirage_declaration").val())
		+parseFloat($("#sydam").val())
		+parseFloat($("#fiche_assurance").val())
		+parseFloat($("#agio").val())
		+parseFloat($("#ouverture_dossier").val())
		+parseFloat($("#acconage").val())
		+parseFloat($("#surestarie").val())
		+parseFloat($("#echange_bl").val())
		+parseFloat($("#caution").val())
		+parseFloat($("#livraison").val())
		+parseFloat($("#ts_douane").val())
		+parseFloat($("#retrait_documentaire").val())
		+parseFloat($("#debours_divers").val())
		+parseFloat($("#documentation_weeb").val())
		+parseFloat($("#bsc").val())
		+parseFloat($("#certificat_phyto").val())
		+parseFloat($("#api").val())
		+parseFloat($("#aiae").val())
		+parseFloat($("#certificat_veterinaire").val())
		+parseFloat($("#appurement_magasin").val())
		+parseFloat($("#magasinage").val())
		+parseFloat($("#sortie_pc").val())
		+parseFloat($("#commission").val())
		+parseFloat($("#escorte").val())
		+parseFloat($("#manutention").val())
		+parseFloat($("#had").val())
		;
		
		$("#net_a_payer").html(parseFloat(net_a_payer)+' XOF').show();

		$.ajax({
			type: "POST",
			url: "dossier_import/stock_nap.php",
			data: 'net_a_payer='+net_a_payer,
			cache: false,
			success: function(result){
				//
			}
	 	});
	});
	$("#had").on('keyup', function(){
		$("#net_a_payer").hide();
		
			$("#tva").val(0.18*parseFloat($("#had").val()));
	$("#bc").val(0.35*parseFloat($("#had").val()));

		var net_a_payer=
		parseFloat($("#dt_total").val())
		+parseFloat($("#tirage_declaration").val())
		+parseFloat($("#sydam").val())
		+parseFloat($("#fiche_assurance").val())
		+parseFloat($("#agio").val())
		+parseFloat($("#ouverture_dossier").val())
		+parseFloat($("#acconage").val())
		+parseFloat($("#surestarie").val())
		+parseFloat($("#echange_bl").val())
		+parseFloat($("#caution").val())
		+parseFloat($("#livraison").val())
		+parseFloat($("#ts_douane").val())
		+parseFloat($("#retrait_documentaire").val())
		+parseFloat($("#debours_divers").val())
		+parseFloat($("#documentation_weeb").val())
		+parseFloat($("#bsc").val())
		+parseFloat($("#certificat_phyto").val())
		+parseFloat($("#api").val())
		+parseFloat($("#aiae").val())
		+parseFloat($("#certificat_veterinaire").val())
		+parseFloat($("#appurement_magasin").val())
		+parseFloat($("#magasinage").val())
		+parseFloat($("#sortie_pc").val())
		+parseFloat($("#commission").val())
		+parseFloat($("#escorte").val())
		+parseFloat($("#manutention").val())
		+parseFloat($("#had").val())
		;
		
		$("#net_a_payer").html(parseFloat(net_a_payer)+' XOF').show();

		$.ajax({
			type: "POST",
			url: "dossier_import/stock_nap.php",
			data: 'net_a_payer='+net_a_payer,
			cache: false,
			success: function(result){
				//
			}
	 	});
	});

	$("#net_a_payer").hide();

		var net_a_payer=
		parseFloat($("#dt_total").val())
		+parseFloat($("#tirage_declaration").val())
		+parseFloat($("#sydam").val())
		+parseFloat($("#fiche_assurance").val())
		+parseFloat($("#agio").val())
		+parseFloat($("#ouverture_dossier").val())
		+parseFloat($("#acconage").val())
		+parseFloat($("#surestarie").val())
		+parseFloat($("#echange_bl").val())
		+parseFloat($("#caution").val())
		+parseFloat($("#livraison").val())
		+parseFloat($("#ts_douane").val())
		+parseFloat($("#retrait_documentaire").val())
		+parseFloat($("#debours_divers").val())
		+parseFloat($("#documentation_weeb").val())
		+parseFloat($("#bsc").val())
		+parseFloat($("#certificat_phyto").val())
		+parseFloat($("#api").val())
		+parseFloat($("#aiae").val())
		+parseFloat($("#certificat_veterinaire").val())
		+parseFloat($("#appurement_magasin").val())
		+parseFloat($("#magasinage").val())
		+parseFloat($("#sortie_pc").val())
		+parseFloat($("#commission").val())
		+parseFloat($("#escorte").val())
		+parseFloat($("#manutention").val())
		+parseFloat($("#had").val())
		;
		
		$("#net_a_payer").html(parseFloat(net_a_payer)+' XOF').show();

		$.ajax({
			type: "POST",
			url: "dossier_import/stock_nap.php",
			data: 'net_a_payer='+net_a_payer,
			cache: false,
			success: function(result){
				//
			}
	 	});


		//Gestion des documents
		$('#upload_doc').live('submit',function(){
									   
			$.ajax({
			type: "POST",
			url: "dossier_import/upload_doc.php",
			dataType: 'text', 
			cache: false,
			contentType: false,
			processData: false, 
			data: new FormData(this),
			success: function(msg){	  
			//alert($('input[name="photo"]').val());
			location.reload(true); 
			}
		   });
		
		  return false;
		});

		//Export DOCX etat codage import
		$('#export_etat_codage_import').live('click', function(){

			alert($("#etat_codage_import").html());

			var etat_codage_import=$("#etat_codage_import").html();
		
			$.ajax({
				type: "POST",
				data: "etat_codage_import="+etat_codage_import,
				url: "exportation/word/export_etat_codage_import.php",
				cache: false,
				success: function(result){
					
				}
			 });
		});

change_page_dossier_maritime('0');
change_page_dossier_aerien('0');
change_page_dossier_actif('0');
change_page_article('0');
change_page_container('0');
});


function change_page_dossier_maritime(page_id_cons){
	
	var page_id_cons=0;

	var dataString = 'page_id_cons='+ page_id_cons;
	$.ajax({
			type: "POST",
			url: "dossier_import/charge_dossier_maritime.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/giphy.gif" style="width:55px; height:55px;" />').show();
				$(".aff_dossier_maritime").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/giphy.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_dossier_maritime").html(result).show();
			}
	 });

}

function change_page_dossier_aerien(page_id_cons){
	
	var page_id_cons=0;

	var dataString = 'page_id_cons='+ page_id_cons;
	$.ajax({
			type: "POST",
			url: "dossier_import/charge_dossier_aerien.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/giphy.gif" style="width:55px; height:55px;" />').show();
				$(".aff_dossier_aerien").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/giphy.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_dossier_aerien").html(result).show();
			}
	 });

}

function change_page_dossier_actif(page_id_cons){
	
	var page_id_cons=0;

	var dataString = 'page_id_cons='+ page_id_cons;
	$.ajax({
			type: "POST",
			url: "dossier_import/charge_dossier_actif.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/giphy.gif" style="width:55px; height:55px;" />').show();
				$(".aff_dossier_actif").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/giphy.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_dossier_actif").html(result).show();
			}
	 });

}

function change_page_article(page_id_cons){
	
	var page_id_cons=0;

	var dataString = 'page_id_cons='+ page_id_cons;
	$.ajax({
			type: "POST",
			url: "dossier_import/charge_article.php",
			data: dataString,
			cache: false,
			success: function(result){
				$("div.chargement").html('<img src="../../img/giphy.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_article").html('');
				$(".aff_article").html(result).show();
			}
	 });

}

function change_page_container(page_id_cons){
	
	var page_id_cons=0;

	var dataString = 'page_id_cons='+ page_id_cons;
	$.ajax({
			type: "POST",
			url: "dossier_import/charge_container.php",
			data: dataString,
			cache: false,
			success: function(result){
				//$("div.chargement").html('<img src="../../img/giphy.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_container").html('');
				$(".aff_container").html(result).show();
			}
	 });

}
