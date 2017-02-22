<!DOCTYPE HTML>

<html>
	<head>
	<?php session_start();?>
		<link rel="stylesheet" type="text/css" href="res/styles/BaseStyles.css"/>
		<link rel="stylesheet" type="text/css" href="res/styles/BuyPageStyles.css"/>
	</head>
	
	<body>
		<header id="page_header">
			<div class="container" id="header_content">
				<div class="lfloat" id="logo_container">
					<a href="home.php"><img style="margin-top:10px;"height=70px title="Book Exchange" alt="Book Exchange" src="res/images/title.png"/></a>
				</div>
				
				<form class="lfloat" id="search_bar" method="get" action="result.php" onsubmit="return validiateSearch()">
					<input type="Search" name="key" id="search" placeholder="Enter Search"/>
					<input class="btn"type="submit" id="search_btn" value="Go!"/>
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
					$sql ="SELECT * from onsale WHERE ID =".$_GET["id"];
					
					$retval = mysql_query($sql, $conn );
					if(! $retval or mysql_num_rows($retval) == 0)
					{
						echo "<h3 align='center'>No results found :(</h3>";
						die();
					}
					$row = mysql_fetch_array($retval, MYSQL_ASSOC)
				
			?>
			<div class="container">
				<div class="lfloat content_container" id="img_prev_div">
					<img id="img_prev"alt="Image Preview" title="Image Preview" src="<?php echo $row["ImageLink"] ?>"/>
				</div>
				
				<div class="rfloat content_container" id="book_details" >
				<table>
					<tr>
						<td><h4>Title:</h4></td><td><?php echo($row["Title"]) ?></td>
					</tr>
					<tr>
						<td><h4>Author:</h4></td><td><?php echo($row["Author"]) ?></td>
					</tr>
					<tr>
						<td><h4>Category:</h4></td>
						<td>
							<?php echo($row["Category"]) ?>
						</td>
					</tr>
					
					<tr>
						<td><h4>Price:</h4></td><td> &#x20b9;<?php echo($row["Price"]) ?></td>
					</tr>
						<td><h4>Seller:</h4></td><td><?php $R=mysql_query("SELECT Name from users where ID = '".$_SESSION["ID"]."'") ;
															$r = mysql_fetch_array($R, MYSQL_ASSOC);
															echo $r["Name"];?></td>
					</tr>
					<tr>
						<td valign="top">
							<h4>Description:</h4></td><td><?php echo($row["Description"]) ?></textarea>
						</td>
					</tr>
					
					<tr>
						<form action="purchase.php" method="get">
							<input type="hidden" name="id" value="<?php echo $_GET["id"]?>"/>
							<td><input class="btn"  type="submit" name="buy" value="BUY NOW" onclick="buy()"/></td>
						</form>
						
					</tr>
				</table>
				
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