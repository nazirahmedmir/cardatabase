 <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="http://www.carqueryapi.com/js/carquery.0.3.4.js"></script>
	
<script>
$( document ).ready(function() 
{
		
	$("#update-btn").on("click", function(e) 
	{
		e.preventDefault();
		$("#loadMe").modal(
		{
			backdrop: "static", //remove ability to close modal with click
			keyboard: false, //remove option to close with keyboard
			show: true //Display loader!
		});
		
		var Url = "http://www.carqueryapi.com/api/0.3/?callback=&cmd=getModel&model=74847&";
		$.get
		(
			Url,
			function(response) 
			{
				if (response.data) 
				{					
					alert (data);
					$("#loadMe").modal("hide");
				} 
				else 
				{
					$("#output").html
					(
						'<div class="alert alert-warning"><h4>Uh oh!</h4></div>'
					);
				}
			},
			"json"
		);
	});
  
		
	
	$(document).delegate(".account_insert_btn",'click',function (event)
		{
			event.preventDefault();		
			var accountname=$('#accountname').val();
			var accountpassword=$('#accountpassword').val();
			if (accountname!="" && accountpassword!='')
			{							
				$.post({
				url:"ajax_insert_entry.php",
				data:{'accountname':accountname,'accountpassword':accountpassword},
				success: function(data,status)
				{				
					$('#accountname').val('');
					$('#accountpassword').val('');
					window.location='index.php';
				}
				});	
			}
			else				
			{
				alert ('Please Insert new account name and password');
				return false;
			}
		});
	});
	
	
	</script>
</body>

</html>