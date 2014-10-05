$(document).ready(function(){


$("#submit_addr").click(function(){
	     $("#response").html("Requesting Invite...");
	email = $("#email_addr").val();
	if(email.match(/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/))
	{
      

       $.ajax({
          type: "POST",
          url: "invite/create_invite.php",
          data: { email: email }
          }).done(function( data ) {
          	$("#email_addr").val("");
         $("#response").html(data);
          });

    


	}
	else{
     $("#response").html("Please Enter a Valid Email ID");
	}

}); 


});