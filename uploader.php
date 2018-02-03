<!DOCTYPE html>
<html>
  <body>
	<form action = "uploader.php" method = "post" enctype = "multipart/form-data">
		Select image to upload:<br />
		<input type = "file" name = "fileToUpload" id = "fileToUpload"><br />
		Enter a caption for the picture:<br />
		<input type = "text" name = "caption"><br />
		Enter as many keywords as you like for the picture, separated by spaces, ie, beach fire fun friends.<br />
		<input type = "text" name = "keywords"><br />
        Enter the 'alt' tag description:<br />
        <input type = "text" name = "alt"><br />
        Enter the picture's price: (no $ sign: ie 10.00)<br />
        <input type = "text" name = "price"><br />
		<input type = "submit" value= "Upload Image" name = "submit"><br />
	</form>	
  
  </body>
  
  <?php
    $uploadOK = true;
	
	
	//check if it's a real picture
	if (isset($_POST["submit"])){
		$target_dir = "./Uploads/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	
		$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
		
		if ($target_file != "./Uploads/")
		{
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			
			if ($check === false){
			echo "File is too large! Must be less than 2MB.<br />";
			$uploadOK = false;
			}
		
		
			if (($imageFileType != "jpg")&&($imageFileType != "png")&&($imageFileType != "jpeg")){
				echo "Only jpg, jpeg, and png files are accepted.";
				$uploadOK = false;
			}
			
			if ($uploadOK === false){
				echo "Your file was not uploaded.";
			}
			else
			{
				///Upload to mySQL database here.
				$servername = "127.0.0.1";
				$username = "root";
				$password = "sea";
				$dbname = "OldWindowPhotography";
				
				// Create connection
				$conn = new mysqli($servername, $username, $password, $dbname);

				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}
				echo "Connected successfully.<br /><br />";

				// This is being inserted
				$caption = $_POST['caption'];
				$image = '<img src = "' . $target_file . '" alt = "' . $_POST['alt'] . '">'; //I'm saving the file path, not the actual image!
				$keywords = 'all ' . $_POST['keywords'];
                $price = $_POST['price'];

				//insert the caption, image, and keywords
				$sql = "insert into Pictures (caption, image, keywords, price)
				values ('$caption', '$image', '$keywords', '$price')";

				if ($conn->query($sql) === true){
					echo "got " . $caption . " entered.";
				}
				
				else{echo "Entry failed: " . $conn->error;}

				$conn->close();
				
				if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)){
				 echo basename($_FILES["fileToUpload"]['name']) . " has been uploaded.";
				}
				else
				{
					echo "There was an error uploading your file.";
				}
			}
		}
		else
		{
				echo "No file was selected.<br />";
		}
	}
  ?>
	
</html>