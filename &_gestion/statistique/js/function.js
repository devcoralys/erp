$(document).ready(function(){ 

$("div.msg_erreur").hide(); 

$("div.chargement").html('<img src="../../img/giphy.gif" style="width:55px; height:55px;" />').show();
$("div.voir").hide();
setTimeout(function() {
$("div.chargement").html('<img src="../../img/giphy.gif" style="width:55px; height:55px;" />').hide();
$("div.voir").show();
}, 1500);


$('#recher_date_debut').on('change',function(){
   
	var page_id_cons=0;
	var recher_date_debut = $('#recher_date_debut').val();
	var recher_date_fin = $('#recher_date_fin').val();

	var dataString = 'page_id_cons='+ page_id_cons+'&recher_date_debut='+recher_date_debut+'&recher_date_fin='+recher_date_fin;
	$.ajax({
			type: "POST",
			url: "statistique/charge_statistique.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/giphy.gif" style="width:55px; height:55px;" />').show();
				$(".aff_statistique").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/giphy.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_statistique").html(result).show();
			}
	 });
});

$('#recher_date_fin').on('change',function(){
   
	var page_id_cons=0;
	var recher_date_debut = $('#recher_date_debut').val();
	var recher_date_fin = $('#recher_date_fin').val();

	var dataString = 'page_id_cons='+ page_id_cons+'&recher_date_debut='+recher_date_debut+'&recher_date_fin='+recher_date_fin;
	$.ajax({
			type: "POST",
			url: "statistique/charge_statistique.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/giphy.gif" style="width:55px; height:55px;" />').show();
				$(".aff_statistique").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/giphy.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_statistique").html(result).show();
			}
	 });
});

change_page_statistique('0');
});


function change_page_statistique(page_id_cons){
	
	var page_id_cons=0;
	var recher_date_debut = $('#recher_date_debut').val();
	var recher_date_fin = $('#recher_date_fin').val();

	var dataString = 'page_id_cons='+ page_id_cons+'&recher_date_debut='+recher_date_debut+'&recher_date_fin='+recher_date_fin;
	$.ajax({
			type: "POST",
			url: "statistique/charge_statistique.php",
			data: dataString,
			cache: false,
			beforeSend: function(result){
				$("div.chargement").html('<img src="../../img/giphy.gif" style="width:55px; height:55px;" />').show();
				$(".aff_statistique").hide();
			},
			success: function(result){
				$("div.chargement").html('<img src="../../img/giphy.gif" style="width:55px; height:55px;" />').hide();
				$(".aff_statistique").html(result).show();
			}
	 });

}

