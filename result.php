<!DOCTYPE HTML>

<html>
	<head>
	<?php session_start();?>
		<link rel="stylesheet" type="text/css" href="res/styles/BaseStyles.css"/>
		<link rel="stylesheet" type="text/css" href="res/styles/ResultStyles.css"/>
	</head>
	
	<body>
		<header id="page_header">
			<div class="container" id="header_content">
				<div class="lfloat" id="logo_container">
					<a href="home.php"><img style="margin-top:10px;"height=70px title="Book Exchange" alt="Book Exchange" src="res/images/title.png"/></a>
				</div>
				<form class="lfloat" id="search_bar" method="get" action="result.php" onsubmit="return validateSearch()">
					<input type="Search" name="key" id="search" placeholder="Enter Search"/>
					<input class="btn" type="submit" id="search_btn" value="Go!"/>
				</form>
				
				<div class="rfloat" id="user_box">
					<h5><?php echo $_SESSION["name"] ?></h5>
					
					
					<a href="signout.php"><h6>Sign Out</h6></a>
									 
				</div>
			 
			</div>
		</header>
		<nav id="nav_bar">
			<div class="container" >
				<ul id ="nav_list">
					<li>
						<a href="" id="categories" >Categories</a>
					</li>
					<li>
						<a href="myexchange.php" id="myExchange" >My Exchange</a>
					</li>
					<li>
						<a href="help.php" id="help" >Help</a>
					</li>	
					<li>
						<a href="aboutus.php" id="aboutUs" >About Us</a>
					</li>
				</ul>
			</div>
		</nav>
		
		<main id="page_main">
		<br/>
			<div class="container">
				<div id="result_container" class="content_container">
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
				   
					
					
					$db = mysql_select_db( USERDB );
					if(!$db)
					{
						die('Could not connect: ' . mysql_error());
					}
					
					
					
					$sql = "SELECT ID,Title, Author,ImageLink, Category,Price FROM onsale";
					$para ="";
					if(isset($_GET['cat']))
					{
						$para = $para."category = '".$_GET["cat"]."'";
					}
					if(isset($_GET['key']))	
					{
						$para = $para."title LIKE '%".$_GET['key']."%' OR author LIKE '%".$_GET['key']."%' OR description LIKE '%".$_GET['key']."%'";
					}
					
					$q =$sql.($para==""? " " : " Where $para");
					
					$retval = mysql_query($q, $conn );
					if(! $retval or mysql_num_rows($retval) == 0)
					{
						echo "<h3 align='center'>No results found :(</h3>";
						
					}
					else
					{
						while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
						{
							echo ('
							<a href="buybook.php?id='.$row["ID"].'">
								<div class="content_container result_prev" align="center">
									<img src="'.$row["ImageLink"].'"/>
									
									<h4>'. $row["Title"].'</h4>
									<h5>'. $row["Author"].'</h5>
									<h6>'.$row["Category"].'</h6>
									&#8360; '.$row["Price"].'
								
								</div>
							</a>
							');
						}
					}

				?>
				</div>
			</div>
		</main>
		
		<footer id="page_footer">
			<div id="footer_container"class="container">
				Footer Stuff
			</div>
		</footer>
		<script src="res/scripts/basescripts.js"></script>
	</body>

</html>