<!-- Bootstrap Core CSS -->

<?php
include('templates/header.php');
include("../classes/playersClass.php");

if(isset($_GET['ERASE']))
{
	playersClass::RemovePlayer($_GET['ERASE']);
	unset($_GET);
}

if(isset($_POST['Fname']))
{
	playersClass::insertNewPlayer($_POST['DOB'],$_POST['Position'],$_POST['Fname'],$_POST['Lname'],$_POST['Country'],$_POST['Weight'],$_POST['Height'],$_FILES["fileToUpload"]["name"]);
	
	unset($_POST);	
}

	$user=1;

?>
</div>
	<form class="form-inline center-form" enctype="multipart/form-data" action="#" method="POST" role="form">
		<div class="form-group">
		    <label for="DOB">Date of birth:</label>
		    <input name="DOB" type="date" class="form-control" id="DOB">
	 	</div>

	 	<div class="form-group center-form" >
		    <label for="Fname">First name:</label>
		    <input name="Fname" type="Fname" class="form-control" id="Fname">
	 	</div>

	 	<div class="form-group center-form">
		    <label for="Lname">Last name:</label>
		    <input name="Lname" type="Lname" class="form-control" id="Lname">
	 	</div>

	 	<div class="form-group center-form">
			<label for="Position">Position:</label>
			<select name="Position" class="form-control" id="Position">
			<?php
				$positions=playersClass::GetPositions();
				foreach ($positions as $p) 
				{
					echo "
					<option value=".$p.">".$p."</option>
					";
				}
			?>	
			</select>
		</div>
		<div class="form-group center-form">
			<label for="Country">Country:</label>
			<select name="Country" class="form-control" id="Country">
			<?php
				$positions=playersClass::GetCountries();
				foreach ($positions as $p) 
				{
					$country_code= strtolower($p->country_code);
					echo "
					<option value=".$country_code.">".$p->country_name."</option>
					";
				}
			?>	
			</select>
			</div>
		</div>
		<div class="form-group center-form">
			<label for="Height">Height:</label>
			<select name="Height" class="form-control" id="Height">
			<?php
				$p=200;
				while($p != 0)
				{
					echo "
					<option value=".$p.">".$p."Cm</option>
					";
					$p--;
				}
			?>	
			</select>
			</div>
		</div>
		<div class="form-group center-form">
			<label for="Weight">Weight:</label>
			<select name="Weight" class="form-control" id="Weight">
			<?php
				$p=100;
				while($p != 0)
				{
					echo "
					<option value=".$p.">".$p."kg</option>
					";
					$p--;
				}
			?>	
			</select>
			</div>
		</div>
    	<span class="btn btn-default btn-file center-form">
		 Select image to upload: <input type="file" name="fileToUpload" id="fileToUpload">
		</span>
    	<button id="submit" name="submit" type="submit" class="btn btn-default ">Submit</button>
	</form>
</div>
<div id="GetLatestPlayerAdditionsContainer"  class="container">
<?php playersClass::GetLatestPlayerAdditions($user); ?>
<?php
//UPLOAD SCRIPT

$target_dir = "../img/uploads/player_avatar/";
if(isset($_FILES["fileToUpload"]))
{
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
	    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	    if($check !== false) {
	        $uploadOk = 1;
	    } else {
	        $uploadOk = 0;
	    }
	}
	// Check if file already exists
	if (file_exists($target_file)) {
	    $uploadOk = 0;
	    die;
	}
	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 1000000) {
	    $uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {   
	    $uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	    $warning="Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
	    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	        $warning="The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
	    } else {
	        $warning="Sorry, there was an error uploading your file.";
	    }
	}
}
include('templates/footer.php');
?>
