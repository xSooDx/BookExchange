<!DOCTYPE HTML>

<html>
	<head>
	<?php session_start();?>
		<link rel="stylesheet" type="text/css" href="res/styles/BaseStyles.css"/>
		<link rel="stylesheet" type="text/css" href="res/styles/HomePageStyles.css"/>
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
		
		<main id="page_main">
			<div class="container">
				<div class="content_container">
					<h1> About Us</h1>
					<p> Founded on Tuesday 15<sup>th</sup> September 2015 for a Web Tech Project in PES University, Book Exchange is a Service that allow people sell books to others who want them.</p>
					<p> People can put Novels, Comics, Text Books, Magazine and other forms of written material up for sale, while people looking to for such material can eaisly find and buy it.</p>
					<hr>
					<h2>Developers</h2>
					<ul>					
						<li><h3>Saurabh Sood</h3></li>
						<li><h3>Rohan Kanuri</h3></li>
						<li><h3>Shreyaa Giridhar</h3></li>
							<p></p>
					</ul>				
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