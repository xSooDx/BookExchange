<!DOCTYPE HTML>

<html>
	<head>
	<?php session_start();?>
		<link rel="stylesheet" type="text/css" href="res/styles/BaseStyles.css"/>
		<link rel="stylesheet" type="text/css" href="res/styles/ProfilePageStyles.css"/>
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
				
				
			?>
		
			<div class="container">
				<div class="content_container details" id="account_details">
				
					
					<?php
						$sql = "SELECT * FROM users WHERE ID=".$_SESSION["ID"];
						$retval = mysql_query($sql,$conn);
						if(! $retval  or mysql_num_rows($retval) == 0)
						{
							die('Could not read data: ' . mysql_error());
						}		
						$row = mysql_fetch_array($retval, MYSQL_ASSOC);
					?>
					
					<h2>Name: <?php echo $row["Name"]?></h2>
					<hr/>
					<h5>Email ID: <?php echo $row["Email"]?></h5>
					<h5>Account ID: <?php echo $row["ID"]?></h5>
					<?php 
						$sql="SELECT COUNT(*) FROM sold WHERE Buyer = ".$_SESSION["ID"];
						$retval = mysql_query($sql,$conn);
						if(! $retval  or mysql_num_rows($retval) == 0)
						{
							die('Could not read data: ' . mysql_error());
						}		
						$result = mysql_result($retval,0);
					?>
					<table>
					<tr>
					<td>
					<h5>Books Bought: <?php echo $result ?></h5>
					<?php 
						$sql="SELECT COUNT(*) FROM sold WHERE Seller = ".$_SESSION["ID"];
						$retval = mysql_query($sql,$conn);
						if(! $retval  or mysql_num_rows($retval) == 0)
						{
							die('Could not read data: ' . mysql_error());
						}		
						$result = mysql_result($retval,0);
					?>
					</td>
					<td>
					<h5>Books Sold: <?php echo $result ?></h5>
					<?php 
						$sql="SELECT COUNT(*) FROM onsale WHERE Seller = ".$_SESSION["ID"];
						$retval = mysql_query($sql,$conn);
						if(! $retval  or mysql_num_rows($retval) == 0)
						{
							die('Could not read data: ' . mysql_error());
						}		
						$result = mysql_result($retval,0);
					?>
					</td>
					<td>
					<h5>Books on Sale: <?php echo $result ?></h5>
					</td>
					</tr>
					</table>
				</div>
				<div class="content_container details" id="purchase_hist">
					<h3> Purchased Books: </h3>
					<?php
						$sql = "SELECT * FROM sold WHERE Buyer=".$_SESSION["ID"];
						$retval = mysql_query($sql,$conn);
						if(! $retval  or mysql_num_rows($retval) == 0)
						{
							echo ("<h5> No Books Purchased </h5	>");
						}
						else{
							while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
							{
								echo('
									
									<div class="prev">
									<table>
										<tr >
											<td width=100px rowspan=3>
											<img src="'.$row["ImageLink"].'"/>
											</td>
											<td>
											<h4>'. $row["Title"].'</h4>
											</td>
										</tr>
										<tr><td>
										<h5>'. $row["Author"].'</h5>
										</td></tr>
										<tr><td>
										<h5>&#8360; '.$row["Price"].'</h5>
										</td></tr>
									</table>
									</div>		
																	
								');
								
							}
						}
					?>
				</div>
				<div class="content_container details" id="sold_list">
					<h3> Sold Books:</h3>
					<?php
						$sql = "SELECT * FROM sold WHERE Seller=".$_SESSION["ID"];
						$retval = mysql_query($sql,$conn);
						if(! $retval  or mysql_num_rows($retval) == 0)
						{
								echo ("<h5> No Books Sold </h5	>");
						}
						while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
						{
							echo('
								<div class="prev">
								<table>
									<tr >
										<td width=100px rowspan=3>
										<img src="'.$row["ImageLink"].'"/>
										</td>
										<td>
										<h4>'. $row["Title"].'</h4>
										</td>
									</tr>
									<tr><td>
									<h5>'. $row["Author"].'</h5>
									</td></tr>
									<tr><td>
									<h5>&#8360; '.$row["Price"].'</h5>
									</td></tr>
								</table>
								</div>							
							');
							
						}
					?>
					
					
					
				</div>
				
				<div class="content_container details" id="sale_list">
					<h3> Books On Sale:</h3>
					<?php
						$sql = "SELECT * FROM onsale WHERE Seller=".$_SESSION["ID"];
						$retval = mysql_query($sql,$conn);
						if(! $retval  or mysql_num_rows($retval) == 0)
						{
								echo ("<h5> No Books On Sale</h5	>");
						}
						while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
						{
							echo('
								<a href="buybook.php?id='.$row["ID"].'">
								<div class="prev">
								<table>
									<tr >
										<td width=100px rowspan=3>
										<img src="'.$row["ImageLink"].'"/>
										</td>
										<td>
										<h4>'. $row["Title"].'</h4>
										</td>
									</tr>
									<tr><td>
									<h5>'. $row["Author"].'</h5>
									</td></tr>
									<tr><td>
									<h5>&#8360; '.$row["Price"].'</h5>
									</td></tr>
								</table>
								</div>	
								</a>									
							');
							
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