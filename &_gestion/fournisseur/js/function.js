$(document).ready(function(){ 

$("div.chargement").html('<img src="../../img/giphy.gif" style="width:55px; height:55px;" />').show();
$("div.affiche_pers").hide();

setTimeout(function() {
$("div.chargement").html('<img src="../../img/giphy.gif" style="width:55px; height:55px;" />').hide();
$("div.affiche_pers").show();
change_page_pers('0');
}, 1500);

$('.import_pers').live('click', function(){
	$(location).attr('href', 'importer_fournisseur.php');
});

$('.button_annul').live('click',function(){
	$("div.msg_erreur").hide(); 
    $(".clo_er").hide(); 
	location.reload();
});
$('.close').live('click',function(){
	$("div.msg_erreur").hide(); 
    $(".clo_er").hide(); 
	location.reload();
});

$(".add_pers").live('click', function() {
	var id_ref = $(this).attr('data-id');
	$.ajax({
	 type: "GET",
     url: "fournisseur/form_supprimer_fournisseur.php",
     data: "ref="+id_ref,
	 success: function(msg){
	   $("#modal_pers").modal('show');	
	 }
   });
	
 });

$("div.msg_erreur").hide(); 


 $('#form_pers').live('submit',function(){
										 
		   if( $('input[name=sexe]').is(':checked') ){ var sexe=1; }else{ var sexe=2;	}
			/*
		   if($("#mat").val()=='' || $("#nom").val()=='' || sexe==0 || $("#date_nais").val()=='' || $("#tel").val()=='' || $("#email").val()=='' || $("#service").val()=='' || $("#fonctio").val()=='' || $("#statut").val()=='' || $("#date_entre").val()=='' )
	       {
			$("div.msg_erreur").html("<i style='color:#fff;' class='fa fa-ban'></i> Les champs avec ast&eacute;ristiques sont obligatoires !").show();
		   }
		   else
		   {
			   */
		   $.ajax({
		   type: "POST",
		   url: "fournisseur/ajout_fournisseur.php",
		   dataType: 'text', 
		   cache: false,
           contentType: false,
           processData: false, 
		   data: new FormData(this),
		   success: function(msg){	
		   
		    if(msg==1)
	       {
			$("div.msg_erreur").html("Ce fournisseur existe d&eacute;j&agrave; !").show();
		   }
		   else
		   {
		   location.reload(true); 
		   }
		   }
		   });
		   /*
		  }*/
		 return false;
      });
 
 
$(".edit_mod").live('click', function() {
	var id_ref = $(this).attr('data-id');
	//alert('TEST CLICK MOD');
	$.ajax({
	 type: "GET",
     url: "fournisseur/form_modifier_fournisseur.php",
     data: "ref="+id_ref,
	 success: function(msg){
	   $("#affiche_mod").html(msg);
	   $("#modal_mod").modal('show');	
	 }
   });
	
 });
 $('#form_pers_mod').live('submit',function(){
										 
		   if( $('input[name=sexe_mod]').is(':checked') ){ var sexe_mod=1; }else{ var sexe_mod=0; }
			
		   if($("#mat_mod").val()=='' || $("#nom_mod").val()=='' || sexe_mod==0 || $(".date_nais_mod").val()=='' || $("#tel_mod").val()=='' || $("#email_mod").val()=='' || $(".service_mod").val()=='' || $(".fonctio_mod").val()=='' || $(".statut_mod").val()=='' || $("#date_entre_mod").val()=='')
	       {
			$("div.msg_erreur").html("Les champs avec ast&eacute;ristiques sont obligatoires !").show();
		   }
		   else
		   {
		   $.ajax({
		   type: "POST",
		   url: "fournisseur/modif_fournisseur.php",
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
		  }
		 return false;
      });
 
 

 $(".supr").live('click', function() {
	var id_ref = $(this).attr('data-id');
	$.ajax({
	 type: "GET",
     url: "fournisseur/form_supprimer_fournisseur.php",
     data: "ref="+id_ref,
	 success: function(msg){
	   $("#affiche_sup").html(msg);
	   $("#modal_sup").modal('show');	
	 }
   });
	
 });
	
 $('#submit_sup').live('click',function(){
									 
       $.ajax({
		   type: "POST",
		   url: "fournisseur/sup_fournisseur.php",
		   success: function(msg){
			   if(msg==1)
			   {
		        $("div.msg_erreur").html("Impossible de supprimer cet fournisseur car des enregistrements lui sont rattach&eacute;s !").show();
			   }
			   else
			   {
		        location.reload(); 
			   }
		   }
		});
        return false;
    });
 
  $(".detail").live('click', function() {
	var id_ref = $(this).attr('data-id');
	$.ajax({
	 type: "GET",
     url: "fournisseur/form_detail_fournisseur.php",
     data: "ref="+id_ref,
	 success: function(msg){
	   $("#affiche_detail").html(msg);
	   $("#modal_detail").modal('show');	
	 }
   });
	
 });

/*
$('.envoie_recher_pers').live('click',function(){
   
    var recher_pers=$("#recher_pers").val();

	var page_id='0';
    var dataString = 'page_id='+page_id+'&recher_pers='+recher_pers;
     $.ajax({
           type: "POST",
           url: "fournisseur/charge_fournisseur.php",
           data: dataString,
           cache: false,
		    beforeSend: function(){
			$("div.chargement").html('<img src="../../img/giphy.gif" style="width:55px; height:55px;" />').show();
			$(".affiche_pers").hide();
            },
           success: function(result){
		  $("div.chargement").html('<img src="../../img/giphy.gif" style="width:55px; height:55px;" />').hide();
		  $(".affiche_pers").html(result).show(); 
		   }
      });
});
*/

$('#recher_pers').on('change',function(){
   
    var recher_pers=$("#recher_pers").val();

	var page_id='0';
    var dataString = 'page_id='+page_id+'&recher_pers='+recher_pers;
     $.ajax({
           type: "POST",
           url: "fournisseur/charge_fournisseur.php",
           data: dataString,
           cache: false,
		    beforeSend: function(){
			$("div.chargement").html('<img src="../../img/giphy.gif" style="width:55px; height:55px;" />').show();
			$(".affiche_pers").hide();
            },
           success: function(result){
		  $("div.chargement").html('<img src="../../img/giphy.gif" style="width:55px; height:55px;" />').hide();
		  $(".affiche_pers").html(result).show(); 
		   }
      });
});

 
});


function change_page_pers(page_id){
	var recher_pers='';
    var dataString = 'page_id='+page_id+'&recher_pers='+recher_pers;
     $.ajax({
           type: "POST",
           url: "fournisseur/charge_fournisseur.php",
           data: dataString,
           cache: false,
           success: function(result){
		  $(".affiche_pers").html(result);
		   }
      });
}
