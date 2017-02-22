var nav_category = document.getElementById("categories")

var categories = ["Fiction","Non-Fiction","Romantic",
"Art","Biography", "Sports", "Kids","Science",
"Reference","Business"]

function createCatMenu(){
	
	var menuDiv= document.createElement("div");
	menuDiv.setAttribute("class","container");
	menuDiv.setAttribute("id","cat_menu");
	menuDiv.onmouseover=function(e){ this.style.display="block"} 	
	menuDiv.onmouseout=function(e){ this.style.display="none"} 	
	var list = document.createElement("ul");
	list.setAttribute("id","cat_list")
	
	for (var i = 0; i<categories.length;i++){
		var c = document.createElement("li")
		var a = document.createElement("a")
		a.setAttribute("href","result.php?cat="+categories[i])
		a.innerHTML=categories[i];
		c.appendChild(a)
		list.appendChild(c)
		
	}
	menuDiv.appendChild(list)
	
	
	document.body.insertBefore(menuDiv,document.getElementById("page_main"))
	return menuDiv
}

function footer(){
	
	var foot = document.getElementById("footer_container");
	foot.innerHTML="&copy Saurabh Sood, Rohan Kanuri, Shreyaa Giridhar";
	
}

function validiateSearch(){
	var s = document.getElementById("search")
	if(s.value=="")
	{
		alert("Enter Search Parameter")
		return false
		
	}
	return true
}

var a = createCatMenu();

footer();

nav_category.onmouseover = function() {a.style.display="block"}