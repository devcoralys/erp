$(document).ready(function(){ 
						   
$("div.msg_error").hide();
$("div.msg_ok").hide(); 

$("#ident").val('');
$("#mot_pass").val('');

$(".bl_mot").live('click', function(){
	$(location).attr('href',"recup/recup.php");
});
 
	   
$('#form_log').live('submit',function(){
												
		if($("#ident").val()=='' || $("#mot_pass").val()=='')
	   {   
	           $("div.msg_error").html('<span><img src="images/atten.png" style="width:20px; height:20px;" />&nbsp;&nbsp;Donn&eacute;es absentes.</span>').show();
				 setTimeout(function() {
				 $("div.msg_error").hide();
		         }, 4000);
	   }
	  else
	   {
       $.ajax({
		   type: "POST",
		   url: "control.php",
		   data: "ident="+$("#ident").val()+"&mot_pas="+$("#mot_pass").val(),
		   success: function(msg){
			   //alert ('reponse = '+msg);
			    if(msg==2)
				{
				 $("div.msg_ok").hide();
	           $("div.msg_error").html('<span><img src="images/erreur.png" style="width:20px; height:20px;" />&nbsp;&nbsp;Donn&eacute;es invalide.</span>').show();
				 setTimeout(function() {
				 $("div.msg_error").hide();
		         }, 4000);
				 
				}
				else
				{ 
				$("div.msg_error").hide();
 $("div.msg_ok").html('<span><img src="images/loading.gif" style="width:20px; height:20px;" />&nbsp; Connexion en cours.</span>').show();
                 setTimeout(function() {
				 $("div.msg_ok").hide();
				 $("div.msg_error").hide();
				 $(location).attr('href',"&_gestion/accueil.php");
		         }, 4000);
				 
				}
		   }
		});
	     
	   } 
	   
        return false;
		
    });	

});	

	   
 
	 