<?php
require_once ("config.php");
global $db,$user;

if (!$user->is_logged())
{	
	//if the user is not logged in, redirect to login page
	header ('Location: login.php');
	exit;
}

$page_title="Home";
?>
<?php require_once ("header_script.php")?>
<?php require_once ("header_navigation.php")?>
<?php require_once ("header.php")?>
  

  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="mt-5">Car Database Manager</h1>
        
        <?php
			$Entry=new Entries();
			$entries=$Entry->GetList();
			if (count ($entries))
			{
				echo '<table class="table table-sm"><thead class="thead-light">';
				echo '<tr><th>Image</th><th>Make</th><th>Name</th><th>Year</th><th>Body</th><th>Engine Position</th><th>Engine Type</th><th>Engine Compression</th><th>Engine Fuel</th><th>Country</th><th>Weight</th><th>Transmission Type</th><th>Price</th><th></th></tr>';
				echo '</thead><tbody>';
				foreach ($entries as $entry)
				{
					if (!empty ($entry['image']) && file_exists ('uploads/' . $entry['image']))
					{
						$ext =pathinfo($entry['image'], PATHINFO_EXTENSION);
						$filename =pathinfo($entry['image'], PATHINFO_FILENAME);
												
						$image=$filename . '_thumb' . $ext;
					}
					else
					{
						$image='https://via.placeholder.com/100x70';
					}
					
					echo '<tr id="row_' . $entry['ID'] . '">';
					echo '<td><img width=150 height=70 src="' . $image . '" /> </td>';
					echo '<td>' . $entry['Make'] . '</td>';
					echo '<td>' . $entry['Name'] . '</td>';
					echo '<td>' . $entry['Year'] . '</td>';
					echo '<td>' . $entry['Body'] . '</td>';
					echo '<td>' . $entry['EnginePosition'] . '</td>';
					echo '<td>' . $entry['EngineType'] . '</td>';
					echo '<td>' . $entry['EngineCompression'] . '</td>';
					echo '<td>' . $entry['EngineFuel'] . '</td>';					
					echo '<td>' . $entry['Country'] . '</td>';
					echo '<td>' . $entry['WeightKG'] . '</td>';
					echo '<td>' . $entry['TransmissionType'] . '</td>';
					echo '<td>' . $entry['Price'] . '</td>';					
					echo '<td>' . '<a  href="edit.php?id=' . $entry['ID'] . '" id="edit_' . $entry['ID'] . '">Edit</a> | '  . '<a href=""  id="delete_' . $entry['ID'] . '">Delete</a>' .  '</td>';					
					echo '</tr>';
					
				}
				echo '</tbody></table>';
			}
		?>
						
		<br /><br />
		<div class="card">
		<div class="card-header">Insert new Car Model</div>
		<div class="card-body">
		<form id="newentry" method="post" enctype="multipart/form-data" class="needs-validation">
			
			<div class="form-group row">
				<label class="control-label col-2" for="make">Make</label>
				<div class="col-6">
					<input  class="form-control type="text" id="make" name="make" value="" required />
					
				</div>
			</div>
			
			<div class="form-group row">
				<label class="control-label col-2" for="name">Name</label>
				<div class="col-6">
					<input  class="form-control type="text" id="name" name="name" value="" required />
					
				</div>
			</div>
			
			<div class="form-group row">
				<label class="control-label col-2" for="year">Year</label>
				<div class="col-6">
					<input  class="form-control type="text" id="year" name="year" value="" />					
				</div>
			</div>
			
			<div class="form-group row">
				<label class="control-label col-2" for="body">Body</label>
				<div class="col-6">
					<input  class="form-control type="text" id="body" name="body" value="" />
					
				</div>
			</div>
			
			<div class="form-group row">
				<label class="control-label col-2" for="trim">Trim</label>
				<div class="col-6">
					<input  class="form-control type="text" id="trim" name="trim" value="" />
					
				</div>
			</div>
			
			
			<div class="form-group row">
				<label class="control-label col-2" for="engineposition">Engine Position</label>
				<div class="col-6">
					<input  class="form-control type="text" id="engineposition" name="engineposition" value="" />
					
				</div>
			</div>
			
			<div class="form-group row">
				<label class="control-label col-2" for="enginetype">Engine Type</label>
				<div class="col-6">
					<input  class="form-control type="text" id="enginetype" name="enginetype" value="" />
					
				</div>
			</div>
			
			
			<div class="form-group row">
				<label class="control-label col-2" for="enginecompression">Engine Compression</label>
				<div class="col-6">
					<input  class="form-control type="text" id="enginecompression" name="enginecompression" value="" />
					
				</div>
			</div>
			
			
			<div class="form-group row">
				<label class="control-label col-2" for="enginefuel">Engine Fuel</label>
				<div class="col-6">
					<input  class="form-control type="text" id="enginefuel" name="enginefuel" value="" />
					
				</div>
			</div>
			
			
			
			<div class="form-group row">
				<label class="control-label col-2" for="country">Country</label>
				<div class="col-6">
					<input  class="form-control type="text" id="country" name="country" value="" />
					
				</div>
			</div>
			
			
			
			<div class="form-group row">
				<label class="control-label col-2" for="weight">Weight(kg)</label>
				<div class="col-6">
					<input  class="form-control type="text" id="weight" name="weight" value="" />
					
				</div>
			</div>
			
						
			<div class="form-group row">
				<label class="control-label col-2" for="transmissiontype">Transmission Type</label>
				<div class="col-6">
					<input  class="form-control type="text" id="transmissiontype" name="transmissiontype" value="" />
					
				</div>
			</div>
			
						
			<div class="form-group row">
				<label class="control-label col-2" for="price">Price</label>
				<div class="col-6">
					<input  class="form-control type="text" id="price" name="price" value="" />
					
				</div>
			</div>
			
			<div class="form-group row">
				<label class="control-label col-2" for="tags">Tags</label>
				<div class="col-6">
					<input  class="form-control type="text" id="tags" name="tags" value="" />
					
				</div>
			</div>
			
			
			<div class="form-group row">
			<label class="control-label col-1" for="image">File</label>
			<div class="col-3">
			<input  class="form-control" type="file" id="image" name="image" value="" />
			</div>
			
			</div>
						
			<div class="form-group row">
			<div class="col-2">
			</div>
			
			
			<div class="col-1">
			<button class="entry_insert_btn btn btn-primary">Save</button>
			</div>	
			</div>	
			
		</form>
		</div>
		</div>
		
      </div>
    </div>
  </div>

<?php
$custom_scripts=<<<SCRIPTS
$( document ).ready(function() 
{
	$(document).delegate(".entry_insert_btn",'click',function (event)
	{
			event.preventDefault();					
			var year=$('#year').val();		
			var make=$('#make').val();		
			var name=$('#name').val();		
			var body=$('#body').val();		
			var engineposition=$('#engineposition').val();		
			var enginetype=$('#enginetype').val();							
			var enginecompression=$('#enginecompression').val();							
			var enginefuel=$('#enginefuel').val();							
			var country=$('#country').val();							
			var weight=$('#weight').val();							
			var transmissiontype=$('#transmissiontype').val();							
			var price=$('#price').val();							
			var tags=$('#tags').val();							
			var trim=$('#trim').val();							
			
			
			
			if (make=='')
			{
				alert ('Make is required');
				$('#make').focus();
				return false;
			}
			
			if (name=='')
			{
				alert ('Name is required');
				$('#name').focus();
				return;
			}
						
			if (year!='')
			{				
				var allowed_chracters = /^[0-9]+$/;
				if (year.length!=4 || (!allowed_chracters.test(year)))
				{
					alert ('Please input valid four digit year');
					$('#year').focus();
					return false;
				}
				 var current_year=new Date().getFullYear();
				if((year < 1920) || (year > current_year))
				{
					alert("Year should be in range 1920 to current year");
					$('#year').focus();
					return false;
				}
			}
			
			if (enginecompression!='')
			{				
				var allowed_chracters = /^[0-9]{1,2}(\.)?([0-9])?$/;
				
				if (!allowed_chracters.test(enginecompression))
				{
					alert ('Please input valid value (one or two digit numbers upto one decimal point)');
					$('#enginecompression').focus();
					return false;
				}
			}
			
			
			if (weight!='')
			{				
				var allowed_chracters = /^[0-9]{3,9}(\.)?([0-9])?$/;
				
				if (!allowed_chracters.test(weight))
				{
					alert ('Please input valid value for weight in KG');
					$('#weight').focus();
					return false;
				}
			}
			
			if (price!='')
			{				
				var allowed_chracters = /^[0-9]{3,9}$/;
				
				if (!allowed_chracters.test(price))
				{
					alert ('Please input valid value for price');
					$('#price').focus();
					return false;
				}
			}
			
			
			
			
			/*Get the form element*/		
			var form = document.getElementById('newentry');
			var formData = new FormData(form);				
			
			$.post({
			url:"ajax_insert_car.php",
			
			data:formData,
			success: function(data,status)
			{	
				data=jQuery.parseJSON(data);
				if (data.status=='success')
				{
					$('#newentry')[0].reset();						
					alert ('Entry Saved');
				}
				else
				{
					alert (data.error);
				}
			},
			error: function (data, status)
			{
				alert ("There was some errors");
			},
			cache: false,
			contentType: false,
			processData: false
			});	
		
			
	});		
	
	
	$(document).delegate("[id^='delete_']",'click',function (event)
	{
			event.preventDefault();		
			if (!confirm("Do you want delete"))
			{
				return false;
			}
			
			id=$(this).attr("id");
			id=id.split("_");
			id=id[1];
			
			
			$.get(
			{
				url:"ajax_delete_car.php",			
				data:{ID:id},
				success: function(data,status)
				{	
					data=jQuery.parseJSON(data);
					if (data.status=='success')
					{										
						$('#row_'+id).remove();
						alert ('Entry Deleted ');
					}
					else
					{
						alert (data.error);
					}
				},
				error: function (data, status)
				{
					alert ("There was some errors");
				}
			});	
			
	});
	
	

});
SCRIPTS;
?>
<?php require_once ("footer.php");?>