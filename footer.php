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
		
		$.ajax({
        url: 'getdata.php',
        type: 'GET',
        async: true,
        cache: false,
        timeout: 30000,
        error: function()
		{
            return true;
        },
        success: function(data)
		{ 
            alert (data);							
			$("#loadMe").modal("hide");	
        }
		});
	
		
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