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
			<div class="container">
				<div class="lfloat content_container" id="img_prev_div">
					<img id="img_prev"alt="Image Preview" title="Image Preview" src="res/images/imgprev.jpg"/>
				</div>
				
				<form action="listsale.php" class="rfloat content_container" id="book_details" method="post" enctype="multipart/form-data">
				<table>
					<tr>
						<td><label>Name</label></td><td><input type="name" name="book_name"/></td>
					</tr>
					<tr>
						<td><label>Author</label></td><td><input type="name" name="book_author"/></td>
					</tr>
					<tr>
						<td><label>Category</label></td>
						<td>
							<select name="book_category">
								<option>Fiction</option>
								<option>Non-Fiction</option>
								<option>Romantic</option>
								<option>Art</option>
								<option>Biography</option>
								<option>Sports</option>
								<option>Kids</option>
								<option>Science</option>
								<option>Reference</option>
								<option>Buisness</option>
							</select>
						</td>
					</tr>
					
					<tr>
						<td><label>Price</label></td><td><input type="number" name="book_price"/></td>
					</tr>
					<tr>
						<td><label>Image</label></td><td><input accept="image/*" type="file" id="book_img" name="book_img"/></td>
					</tr>
					<tr>
						<td colspan=2 >
							<label>Description</label><br><textarea name="book_description"></textarea>
						</td>
					</tr>
					
					<tr>
						<td><input class="btn"  type="submit" name="submit"/></td>
	
						<td><input class="btn" type="reset"/></td>
					</tr>
				</table>
				</form>

				
			</div>
			<script>
				var img_prev = document.getElementById("img_prev");
				console.log("abc")
				var i=document.getElementById("book_img");
				
				i.onclick = function () {
					console.log("pqr")
					this.value = null;
				};

				i.onchange=function(){
					var a = i.value;
					var b =a.split(/(\\|\/)/g).pop()
					img_prev.setAttribute("src","res/images/"+b)
				}
			</script>
		</main>
		
		<footer id="page_footer">
			<div id="footer_container"class="container">
				Footer Stuff
			</div>
		</footer>
		<script src="res/scripts/basescripts.js"></script>
	</body>

</html>