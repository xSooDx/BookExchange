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
		
		$sql = "SELECT * FROM onsale WHERE ID = ".$_GET["id"];		
		$retval = mysql_query( $sql, $conn );
		if(! $retval  or mysql_num_rows($retval) == 0)
		{
			die('Could not read data: ' . mysql_error());
		}		
		$row = mysql_fetch_array($retval, MYSQL_ASSOC);
		
		$sql = ("INSERT INTO sold (Seller, Buyer, Title, Author, ImageLink, Price)
					VALUES ('".$row['Seller']."','".$_SESSION['ID']."','".$row['Title']."','".$row['Author']."','".$row['ImageLink']."','".$row['Price']."')");
		$retval = mysql_query( $sql, $conn );
		
		if(! $retval )
		{
			die('Could not enter data: ' . mysql_error());
		}		
		$sql="DELETE FROM onsale WHERE ID = ".$_GET["id"];
		$retval = mysql_query( $sql, $conn );
		
		header('Location: myexchange.php');
		mysql_close($conn);
	?>

	</body>
</html>