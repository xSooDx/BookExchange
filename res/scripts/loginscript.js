function validateLogin(){
	
	var e = document.getElementById("login_email");
	var p = document.getElementById("login_password");

	if(e.value==""){
		
		alert("No Email Entered")
		return false;
	}
	
	if(p.value==""){
		alert("No Password Entered")
		return false;
	}
	
	return true;
	
}

function validateSignup(){
	var n = document.getElementById("signup_name");
	var e = document.getElementById("signup_email");
	var p = document.getElementById("signup_password");
	
	if(n.value==""){
		
		alert("No Name Entered")
		return false;
	}

	if(e.value==""){
		
		alert("No Email Entered")
		return false;
	}
	
	if(p.value==""){
		alert("No Password Entered")
		return false;
	}
	
	return true;
	
}