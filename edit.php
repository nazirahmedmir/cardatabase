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
        <?php if (isset ($_POST['ID'])):?>
		
		<?php
		//if there is form submitted
		
		$Data=array();			
		isset ($_POST['make']) ? $Data['Make']=$_POST['make'] : $Data['Make']='';
		isset ($_POST['name']) ? $Data['Name']=$_POST['name'] : $Data['Name']='';
		isset ($_POST['trim']) ? $Data['Trim']=$_POST['trim'] : $Data['Trim']='';
		isset ($_POST['year']) ? $Data['Year']=$_POST['year'] : $Data['Year']='';
		isset ($_POST['body']) ? $Data['Body']=$_POST['body'] : $Data['Body']='';
		isset ($_POST['engineposition']) ? $Data['EnginePosition']=$_POST['engineposition'] : $Data['EnginePosition']='';
		isset ($_POST['enginetype']) ? $Data['EngineType']=$_POST['enginetype'] : $Data['EngineType']='';
		isset ($_POST['enginecompression']) ? $Data['EngineCompression']=$_POST['enginecompression'] : $Data['EngineCompression']=null;
		isset ($_POST['enginefuel']) ? $Data['EngineFuel']=$_POST['enginefuel'] : $Data['EngineFuel']='';
		isset ($_POST['country']) ? $Data['Country']=$_POST['country'] : $Data['Country']='';
		isset ($_POST['weight']) ? $Data['WeightKG']=$_POST['weight'] : $Data['WeightKG']=null;
		isset ($_POST['transmissiontype']) ? $Data['TransmissionType']=$_POST['transmissiontype'] : $Data['TransmissionType']='';
		isset ($_POST['tags']) ? $Data['Tags']=$_POST['tags'] : $Data['Tags']='';
		
		isset ($_POST['price']) ? $Data['Price']=$_POST['price'] : $Data['Price']=rand(5000, 15000);
		
		$Data['ID']=$_POST['ID'];
		
		$Entry=new Entries();
		
		$result=$Entry->UpdateEntry($Data);
		
		unset ($Data);			
		
		if ($result)
		{
			echo '<br /><br /><p>Record updated <br /><a href="index.php">Click here to go back to list</a></p>';
		}
		else
		{
			echo '<p><br /><br />There was some errors updating the record</p>';
		}
		?>
		
		<?php else:?>
		        
        <?php
			$Entry=new Entries();
			$ID=$_GET['id'];
			$ID=filter_var($ID, FILTER_VALIDATE_INT);
			
			$row=$Entry->GetEntry($ID);
			
		?>
		
		<?php if (count ($row)):?>
		<div class="card">
		<div class="card-header">Edit Car Record</div>
		<div class="card-body">
		<form id="newentry" action="edit.php" method="post" enctype="multipart/form-data" class="needs-validation">
			
			<input type="hidden" name="ID" value="<?php echo $ID?>" />
			
			<div class="form-group row">
				<label class="control-label col-2" for="make">Make</label>
				<div class="col-6">
					<input  class="form-control type="text" id="make" name="make" value="<?php echo $row['Make']?>" required />
					
				</div>
			</div>
			
			<div class="form-group row">
				<label class="control-label col-2" for="name">Name</label>
				<div class="col-6">
					<input  class="form-control type="text" id="name" name="name" value="<?php echo $row['Name']?>" required />
					
				</div>
			</div>
			
			<div class="form-group row">
				<label class="control-label col-2" for="year">Year</label>
				<div class="col-6">
					<input  class="form-control type="text" id="year" name="year" value="<?php echo $row['Year']?>" />					
				</div>
			</div>
			
			<div class="form-group row">
				<label class="control-label col-2" for="body">Body</label>
				<div class="col-6">
					<input  class="form-control type="text" id="body" name="body" value="<?php echo $row['Body']?>" />
					
				</div>
			</div>
			
			<div class="form-group row">
				<label class="control-label col-2" for="trim">Trim</label>
				<div class="col-6">
					<input  class="form-control type="text" id="trim" name="trim" value="<?php echo $row['Trim']?>" />
					
				</div>
			</div>
			
			
			<div class="form-group row">
				<label class="control-label col-2" for="engineposition">Engine Position</label>
				<div class="col-6">
					<input  class="form-control type="text" id="engineposition" name="engineposition" value="<?php echo $row['EnginePosition']?>" />
					
				</div>
			</div>
			
			<div class="form-group row">
				<label class="control-label col-2" for="enginetype">Engine Type</label>
				<div class="col-6">
					<input  class="form-control type="text" id="enginetype" name="enginetype" value="<?php echo $row['EngineType']?>" />
					
				</div>
			</div>
			
			
			<div class="form-group row">
				<label class="control-label col-2" for="enginecompression">Engine Compression</label>
				<div class="col-6">
					<input  class="form-control type="text" id="enginecompression" name="enginecompression" value="<?php echo $row['EngineCompression']?>" />
					
				</div>
			</div>
			
			
			<div class="form-group row">
				<label class="control-label col-2" for="enginefuel">Engine Fuel</label>
				<div class="col-6">
					<input  class="form-control type="text" id="enginefuel" name="enginefuel" value="<?php echo $row['EngineFuel']?>" />
					
				</div>
			</div>
			
			
			
			<div class="form-group row">
				<label class="control-label col-2" for="country">Country</label>
				<div class="col-6">
					<input  class="form-control type="text" id="country" name="country" value="<?php echo $row['Country']?>" />
					
				</div>
			</div>
			
			
			
			<div class="form-group row">
				<label class="control-label col-2" for="weight">Weight(kg)</label>
				<div class="col-6">
					<input  class="form-control type="text" id="weight" name="weight" value="<?php echo $row['WeightKG']?>" />
					
				</div>
			</div>
			
						
			<div class="form-group row">
				<label class="control-label col-2" for="transmissiontype">Transmission Type</label>
				<div class="col-6">
					<input  class="form-control type="text" id="transmissiontype" name="transmissiontype" value="<?php echo $row['TransmissionType']?>" />
					
				</div>
			</div>
			
						
			<div class="form-group row">
				<label class="control-label col-2" for="price">Price</label>
				<div class="col-6">
					<input  class="form-control type="text" id="price" name="price" value="<?php echo $row['Price']?>" />
					
				</div>
			</div>
			
			<div class="form-group row">
				<label class="control-label col-2" for="tags">Tags</label>
				<div class="col-6">
					<input  class="form-control type="text" id="tags" name="tags" value="<?php echo $row['Tags']?>" />
					
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
		<?php else:?>
		<p>Could not find the record</p>
		<?php endif;?>
		
		<?php endif;?>
		
      </div>
    </div>
  </div>

<?php
$custom_scripts=<<<SCRIPTS
$( document ).ready(function() 
{
	$(document).delegate(".entry_insert_btn",'click',function (event)
	{
			// event.preventDefault();					
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
			
			if (name=='')
			{
				alert ('Name is required');
				$('#name').focus();
				return;
			}
			
			if (make=='')
			{
				alert ('Make is required');
				$('#make').focus();
				return false;
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
			
			return true
			
	});		
			
	
	
	

});
SCRIPTS;
?>
<?php require_once ("footer.php");?>