	fn = ln = gen = age = eml = pw1 = pw2 = "";
	fnFlag = lnFlag = genFlag = ageFlag = emlFlag = pw1Flag = pw2Flag = false;
	fnErr = lnErr = genErr = ageErr = emlErr = pw1Err = pw2Err = "";

	function fnValidate(){
		fn = document.getElementById("regForm").fn.value;
		var fnPreg=RegExp("^[A-Za-z\s]+$");
		var fnErr = document.getElementById("fnErr");

		if(fn == ""){
			fnErr.innerHTML="First Name Can Not be empty";
			fnErr.setAttribute("style", "color: red");
		}else if(fnPreg.test(fn)){
			fnErr.innerHTML= "valid";
			fnErr.setAttribute("style", "color:green");
			fnFlag=true;
		}else{
			fnErr.innerHTML="name should not contain any space or any other characters than a-z/A-Z";
			fnErr.setAttribute("style", "color: red");
		}
	}
	
	function lnValidate(){
		ln = document.getElementById("regForm").ln.value;
		var lnPreg=RegExp("^[A-Za-z\s]+$");
		var lnErr = document.getElementById("lnErr");

		if(ln == ""){
			lnErr.innerHTML="last Name Can Not be empty";
			lnErr.setAttribute("style", "color: red");
		}else if(lnPreg.test(ln)){
			lnErr.innerHTML= "valid";
			lnErr.setAttribute("style", "color:green");
			lnFlag=true;
		}else{
			lnErr.innerHTML="name should not contain any space or any other characters than a-z/A-Z";
			lnErr.setAttribute("style", "color: red");
		}
	}

	function genValidate(){
		gends = document.getElementsByName("gender");
		genErr = document.getElementById("genErr"); 

		for(i=0;i<3;i++){
			if (gends[i].checked) genFlag=true;
		}

		if(genFlag){
			genErr.innerHTML="valid";
			genErr.setAttribute("style","color: green");
		}else{
			genErr.innerHTML="Please Select Your Gender";
			genErr.setAttribute("style","color: red");
		}
	}
	function ageValidate(){
		age = document.getElementById("regForm").age.value;
		ageErr = document.getElementById("ageErr"); 

		if(age== ""){
			ageErr.innerHTML="Age can not be empty";
			ageErr.setAttribute("style", "color: red");
		}else if(age > 9 && age < 114){
			ageErr.innerHTML="Valid";
			ageErr.setAttribute("style", "color: green");
			ageFlag=true;
		}else{
			ageErr.innerHTML="You Must be 10 years or older";
			ageErr.setAttribute("style", "color: red");
		}
	}

	function emlValidate(){
		eml=document.getElementById("regForm").eml.value;
		emlErr = document.getElementById("emlErr");
		var emlPreg = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

		if(emlPreg.test(eml)){
			emlErr.innerHTML = "Valid";
			emlErr.setAttribute("style","color: green");
			emlFlag=true;
		}else{
			emlErr.innerHTML="email is not Valid";
			emlErr.setAttribute("style","color: Red");
		} 
	}
	function pwValidate(){
		pw1 = document.getElementById("regForm").pw1.value;
		pw1Err = document.getElementById("pw1Err");
		var pwPreg = /(?=(.*[0-9])+|(.*[ !\"#$%&'()*+,\-.\/:;<=>?@\[\\\]^_`{|}~])+)(?=(.*[a-z])+)(?=(.*[A-Z])+)[0-9a-zA-Z !\"#$%&'()*+,\-.\/:;<=>?@\[\\\]^_`{|}~]{8,}/;
		
		if(pw1 == ""){
			pw1Err.innerHTML="Password can not be empty";
			pw1Err.setAttribute("style","color: red");

		}else if(pw1.length > 7){
			if(pwPreg.test(pw1)){
				pw1Err.innerHTML = "Valid";
				pw1Err.setAttribute("style","color: green");
				pw1Flag = true;
			}
			else{
				pw1Err.innerHTML = "Password must contain a digit and a Capital and a small letter";
				pw1Err.setAttribute("style","color: red");
			}

		}else{
			pw1Err.innerHTML = "Password Must Be 8 character in length";
			pw1Err.setAttribute("style","color: red");
		}


	}
	function pwMatchValidate(){
		pw1 = document.getElementById("regForm").pw1.value;
		pw2 = document.getElementById("regForm").pw2.value;
		pw2Err = document.getElementById("pw2Err");
		
		if(pw2.length == 0){
			pw2Err.innerHTML = "Password Cannot be empty ";
			pw2Err.setAttribute("style","color: red");

		}else if(pw1Flag){
			if(pw1 == pw2){
				pw2Err.innerHTML="Password Matched";
				pw2Err.setAttribute("style","color: green");
				pw2Flag=true;
			}else{
				pw2Err.innerHTML = "Password didnt match";
				pw2Err.setAttribute("style","color: red");
			}
		}else{
			pw2Err.innerHTML = "Enter Your First Password First";
			pw2Err.setAttribute("style","color: grey");
		}
	}
	function submitReady(){
		if(fnFlag && lnFlag && genFlag && ageFlag && emlFlag && pw1Flag && pw2Flag){
			return true;
		}
		else{
			return false
		}
	}