<!DOCTYPE HTML>

<html>
	<head>
	<?php session_start();?>
		<link rel="stylesheet" type="text/css" href="res/styles/BaseStyles.css"/>
		<link rel="stylesheet" type="text/css" href="res/styles/HomePageStyles.css"/>
		<link rel="stylesheet" type="text/css" href="res/styles/ResultStyles.css"/>
	</head>
	
	<body>
		<header id="page_header">
			<div class="container" id="header_content">
				<div class="lfloat" id="logo_container">
					<a href="home.php"><img style="margin-top:10px;"height=70px title="Book Exchange" alt="Book Exchange" src="res/images/title.png"/></a>
				</div>
				
				<form class="lfloat" id="search_bar" method="get" action="result.php" onsubmit="return validiateSearch()">
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
		<br/>
		<main id="page_main">
			<div class="container">
					<a href="result.php">
					<div class="lfloat box" id="buy_box">
						<div align="center"><h2> Buy a Book! </h2></div>
						<h4>Choose from a large collection of books from various categories.</h4>
					
					</div>
					</a>
					<a href="sellbook.php">
					<div class="rfloat box" id="sell_box">
						<div align="center"><h2> Sell a Book! </h2></div>
						<h4>Put a book up for sale and earn money.</h4>
					</div>
					</a>
					<div class="container content_container rfloat" id="recent_list">
					<h3>Recent Listings:</h3>
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
						
						
						
						$sql = "SELECT ID,Title, Author,ImageLink, Category,Price FROM onsale ORDER BY Date DESC";
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
							$i=0;
							while($row = mysql_fetch_array($retval, MYSQL_ASSOC) and $i<5)
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
								$i++;
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