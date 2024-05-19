$(document).ready(function(){ 

$("div.chargement").html('<img src="../../img/giphy.gif" style="width:55px; height:55px;" />').show();
$("div.affiche_pers").hide();

setTimeout(function() {
$("div.chargement").html('<img src="../../img/giphy.gif" style="width:55px; height:55px;" />').hide();
$("div.affiche_pers").show();
change_page_pers('0');
}, 1500);

$('.import_pers').live('click', function(){
	$(location).attr('href', 'importer_personnel.php');
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
     url: "personnel/form_supprimer_personnel.php",
     data: "ref="+id_ref,
	 success: function(msg){
	   $("#modal_pers").modal('show');	
	 }
   });
	
 });

$("div.msg_erreur").hide(); 

$("#photo").hide();
$("#photo_mod").hide();

 $(function () {
    // A chaque s�lection de fichier
    $('#form_pers').find('input[name="photo"]').on('change', function (e) {
        var files = $(this)[0].files;
 
        if (files.length > 0) {
            // On part du principe qu'il n'y qu'un seul fichier
            // �tant donn� que l'on a pas renseign� l'attribut "multiple"
            var file = files[0],
                $image_preview = $('#image_preview');
 
            // Ici on injecte les informations recolt�es sur le fichier pour l'utilisateur
            $image_preview.find('.thumbnail').removeClass('hidden');
            $image_preview.find('img').attr('src', window.URL.createObjectURL(file));
        }
    });
});


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
		   url: "personnel/ajout_personnel.php",
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
     url: "personnel/form_modifier_personnel.php",
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
		  }
		 return false;
      });
 
 
$(".actif").live('click', function() {
	var id_ref = $(this).attr('data-id');
	$.ajax({
	 type: "GET",
     url: "personnel/recup_actif_personnel.php",
     data: "ref="+id_ref,
	 success: function(msg){
	   $("#modal_actif").modal('show');	
	 }
   });
	
 });


$('#form_actif').live('submit',function(){	

var actif=$("#actif").val();
var date_sortie=$("#date_sortie").val();

if(actif=='' || date_sortie=='')
{
$("div.msg_erreur").html("Les champs avec ast&eacute;risques sont obligatoires !").show();
//$("#actif").focus();
}
else
{   	
		   $.ajax({
		   type: "POST",
		   url: "personnel/actif_personnel.php",
		   data: "actif="+actif+"&date_sortie="+date_sortie,
		   success: function(msg){
		      if(msg==1)
			   {
		        $("div.msg_erreur").html("Les champs avec ast&eacute;risques sont obligatoires !").show();
			   }
			   else
			   {
		        location.reload(); 
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
     url: "personnel/form_supprimer_personnel.php",
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
		   url: "personnel/sup_personnel.php",
		   success: function(msg){
			   if(msg==1)
			   {
		        $("div.msg_erreur").html("Impossible de supprimer cette personne car des enregistrements lui sont rattach&eacute;s !").show();
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
     url: "personnel/form_detail_personnel.php",
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
	var recher_service=$("#recher_service").val();
	var recher_fonction=$("#recher_fonction").val();
	var recher_statut=$("#recher_statut").val();
	var recher_sexe=$("#recher_sexe").val();
	var page_id='0';
    var dataString = 'page_id='+page_id+'&recher_pers='+recher_pers+'&recher_service='+recher_service+'&recher_fonction='+recher_fonction+'&recher_statut='+recher_statut+'&recher_sexe='+recher_sexe;
     $.ajax({
           type: "POST",
           url: "personnel/charge_personnel.php",
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
	var recher_service=$("#recher_service").val();
	var recher_fonction=$("#recher_fonction").val();
	var recher_statut=$("#recher_statut").val();
	var recher_sexe=$("#recher_sexe").val();
	var page_id='0';
    var dataString = 'page_id='+page_id+'&recher_pers='+recher_pers+'&recher_service='+recher_service+'&recher_fonction='+recher_fonction+'&recher_statut='+recher_statut+'&recher_sexe='+recher_sexe;
     $.ajax({
           type: "POST",
           url: "personnel/charge_personnel.php",
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

$('#recher_service').on('change',function(){
   
    var recher_pers=$("#recher_pers").val();
	var recher_service=$("#recher_service").val();
	var recher_fonction=$("#recher_fonction").val();
	var recher_statut=$("#recher_statut").val();
	var recher_sexe=$("#recher_sexe").val();
	var page_id='0';
    var dataString = 'page_id='+page_id+'&recher_pers='+recher_pers+'&recher_service='+recher_service+'&recher_fonction='+recher_fonction+'&recher_statut='+recher_statut+'&recher_sexe='+recher_sexe;
     $.ajax({
           type: "POST",
           url: "personnel/charge_personnel.php",
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

$('#recher_fonction').on('change',function(){
   
    var recher_pers=$("#recher_pers").val();
	var recher_service=$("#recher_service").val();
	var recher_fonction=$("#recher_fonction").val();
	var recher_statut=$("#recher_statut").val();
	var recher_sexe=$("#recher_sexe").val();
	var page_id='0';
    var dataString = 'page_id='+page_id+'&recher_pers='+recher_pers+'&recher_service='+recher_service+'&recher_fonction='+recher_fonction+'&recher_statut='+recher_statut+'&recher_sexe='+recher_sexe;
     $.ajax({
           type: "POST",
           url: "personnel/charge_personnel.php",
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

$('#recher_statut').on('change',function(){
   
    var recher_pers=$("#recher_pers").val();
	var recher_service=$("#recher_service").val();
	var recher_fonction=$("#recher_fonction").val();
	var recher_statut=$("#recher_statut").val();
	var recher_sexe=$("#recher_sexe").val();
	var page_id='0';
    var dataString = 'page_id='+page_id+'&recher_pers='+recher_pers+'&recher_service='+recher_service+'&recher_fonction='+recher_fonction+'&recher_statut='+recher_statut+'&recher_sexe='+recher_sexe;
     $.ajax({
           type: "POST",
           url: "personnel/charge_personnel.php",
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

$('#recher_sexe').on('change',function(){
   
    var recher_pers=$("#recher_pers").val();
	var recher_service=$("#recher_service").val();
	var recher_fonction=$("#recher_fonction").val();
	var recher_statut=$("#recher_statut").val();
	var recher_sexe=$("#recher_sexe").val();
	var page_id='0';
    var dataString = 'page_id='+page_id+'&recher_pers='+recher_pers+'&recher_service='+recher_service+'&recher_fonction='+recher_fonction+'&recher_statut='+recher_statut+'&recher_sexe='+recher_sexe;
     $.ajax({
           type: "POST",
           url: "personnel/charge_personnel.php",
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
	var recher_service='';
	var recher_fonction='';
	var recher_statut='';
	var recher_sexe='';
    var dataString = 'page_id='+page_id+'&recher_pers='+recher_pers+'&recher_service='+recher_service+'&recher_fonction='+recher_fonction+'&recher_statut='+recher_statut+'&recher_sexe='+recher_sexe;
     $.ajax({
           type: "POST",
           url: "personnel/charge_personnel.php",
           data: dataString,
           cache: false,
           success: function(result){
		  $(".affiche_pers").html(result);
		   }
      });
}
