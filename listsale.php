<!DOCTYPE html>
<html>
	<body>

	<?php
	session_start();
	define("USERDB","userDB");
		$dbhost = 'localhost';
		$dbuser = 'sood';
		$dbpass = '1234';
		$conn = mysql_connect($dbhost,$dbuser,$dbpass);
		
		if(! $conn )
		{
			die('Could not connect: ' . mysql_error());
		}
	   
		echo 'Connected Server successfully';
		
		$db = mysql_select_db( USERDB );
		if(!$db)
		{
			die('Could not connect: ' . mysql_error());
		}
		
		echo 'Connected to DB successfully';
		
		$target_dir = "res/images/";
		$target_file = $target_dir . basename($_FILES["book_img"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["book_img"]["tmp_name"]);
			if($check !== false) {
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
		}
		
		$sql = 'INSERT INTO onsale (seller,title,author,category,imageLink, description,price ) VALUES'.
			'("'.$_SESSION["ID"].'","'.$_POST["book_name"].'","'.$_POST["book_author"].'","'.$_POST["book_category"].'","'.$target_file.'","'.$_POST["book_description"].'","'.$_POST["book_price"].'")';
		
		$retval = mysql_query( $sql, $conn );
		if(! $retval )
		{
			die('Could not enter data: ' . mysql_error());
		}		
		header('Location: myexchange.php');
		mysql_close($conn);
	?>

	</body>
</html>