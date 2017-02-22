<!DOCTYPE html>
<html>
	<body>

	<?php
	
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
		$n=$_POST["signup_name"];
		$e=$_POST["signup_email"];
		$p=$_POST["signup_password"];
		
		$sql = 'INSERT INTO users (name,email,password) VALUES ("'.$n.'","'.$e.'","'.$p.'")';	
		 
		$retval = mysql_query( $sql, $conn );
		if(! $retval )
		{
			die('Could not enter data: ' . mysql_error());
		}		
		else
		{
			
			$sql = 'SELECT * FROM users WHERE email="'.$e.'" AND password="'.$p.'"';
			$retval = mysql_query( $sql, $conn );
			if(! $retval or mysql_num_rows($retval)==0  )
			{
				die('Could not login: ' . mysql_error());
			}	
			else{
				session_start();
				while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
				{
					$_SESSION["ID"]=$row["ID"];
					$_SESSION["name"]=$row["Name"];
				}
				
				echo 'Login successfull';
				
				header('Location: home.php');
			}
		}
		
		mysql_close($conn);
		
		
	?>

	</body>
</html>