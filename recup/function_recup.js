
   $(document).ready(function(){

	$("#mail").val('');
	$("#new_pass").val('');
	$("#c_new_pass").val('');
	$("div.error1").hide();
	$("div.load").hide();
	
    $('#form_recup').live('submit',function(){
			
	   if($("#adres_recup").val()=='')
	   {
		    $("div.error1").html('<img src="../images/error.png" style="width:22px; height:22px; " />&nbsp; <i style="color:white; font-size:14px;">Veuillez saisir l&rsquo;email !</i> ').show();
				 $("div.error").hide();
				 setTimeout(function() {
 $("div.error1").html('<img src="../images/error.png" style="width:22px; height:22px; " />&nbsp; <i style="color:white; font-size:14px;">Veuillez saisir l&rsquo;email !</i> ').hide();
				 $("div.error").show();
		}, 3000);
	   }
	   else
	   {
       $.ajax({
		   type: "POST",
		   url: "ajout_recup.php",
		   data: "mail="+$("#adres_recup").val(),
		   success: function(msg){
			    
				if(msg==1)
				{
					$("div.error1").html('<img src="../images/error.png" style="width:22px; height:22px; " />&nbsp; <i style="color:white;">Cet email n&rsquo;est pas valide !</i> ').show();
					$("div.error").hide();
				setTimeout(function() {
 					$("div.error1").html('<img src="../images/error.png" style="width:22px; height:22px; " />&nbsp; <i style="color:white;">Cet email n&rsquo;est pas valide !</i>').hide();
				 	$("div.error").show();
				}, 3000);
				}
				else
				{   		
				 $("div.load").show();
                setTimeout(' window.location.href = "af_recup.php"; ',4000);
					$("div.error1").hide();
					$("div.recup_ok").html('<img src="../images/ok.png" style="width:22px; height:22px; " />&nbsp; <i style="color:white;">Lien de r&eacute;initialisation envoy&eacute; !</i> ').show();
				}
		   }
		});
	     
	   }
	   
        return false;
		
    });
	
	 $('#mod_pass').live('submit',function(){
	  
	    if($("#new_pass").val()=="" || $("#c_new_pass").val()==""){
		 
		$("div.error1").html('<img src="../images/error.png" style="width:25px; height:25px; " /> Veuillez saisir les deux mots de passes !').show();
			$("div.error").hide();
			setTimeout(function() {
        $("div.error1").html('<img src="../images/error.png" style="width:25px; height:25px; " /> Veuillez saisir les deux mots de passes  !').hide();
			$("div.error").show();
		}, 3000);
				 
	   }
	   else if($("#new_pass").val()!=$("#c_new_pass").val()){
		 
		  $("div.error1").html('<img src="../images/error.png" style="width:25px; height:25px; " /> Les mots de passes ne sont pas identiques  !').show();
				 $("div.error").hide();
				 setTimeout(function() {
        $("div.error1").html('<img src="../images/error.png" style="width:25px; height:25px; " /> Les mots de passes ne sont pas identiques  !').hide();
				 $("div.error").show();
		}, 3000);
				 
	  }
	  else
	  {
       $.ajax({
		   type: "POST",
		   url: "modif_passe.php",
		   data: "c_new="+$("#c_new_pass").val(),
		   success: function(msg){ 	

				if(msg==1)
				{
				 $("div.error1").html('<img src="../images/error.png" style="width:22px; height:22px; " />&nbsp; Veuillez contacter l&rsquo;administrateur !').show();
				 $("div.error").hide();
				 setTimeout(function() {
 $("div.error1").html('<img src="../images/error.png" style="width:22px; height:22px; " />&nbsp; Veuillez contacter l&rsquo;administrateur !').hide();
				 $("div.error").show();
		}, 3000);
				}
				else
				{   		
				 $("div.load").show();
                 setTimeout(' window.location.href = "../_logger.html"; ',4000);
				 $("div.error1").hide();
				}
				
		   }
		});
	     
	  }
        return false;
		
    });
	
	
 });