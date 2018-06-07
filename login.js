	//javascript login validation
		un=pass=unErr=passErr="";
		unFlag=passFlag=false;

		//username validation
		function nameValidate(){
		un = document.getElementById("loginForm").un.value;
		var unPreg=RegExp("^[A-Za-z\s]+$");
		var unErr = document.getElementById("unErr");

			if(un == ""){
				unErr.innerHTML="First Name Can Not be empty";
				unErr.setAttribute("style", "color: red");
			}else if(unPreg.test(un)){
				unErr.innerHTML= "valid";
				unErr.setAttribute("style", "color:green");
				unFlag=true;
			}else{
				unErr.innerHTML="name should not contain any space or any other characters than a-z/A-Z";
				unErr.setAttribute("style", "color: red");
			}
		}

		//password validation
		function passValidate(){
		pass = document.getElementById("loginForm").pass.value;
		passErr = document.getElementById("passErr");
		var pwPreg = /(?=(.*[0-9])+|(.*[ !\"#$%&'()*+,\-.\/:;<=>?@\[\\\]^_`{|}~])+)(?=(.*[a-z])+)(?=(.*[A-Z])+)[0-9a-zA-Z !\"#$%&'()*+,\-.\/:;<=>?@\[\\\]^_`{|}~]{8,}/;
		
			if(pass == ""){
				passErr.innerHTML="Password can not be empty";
				passErr.setAttribute("style","color: red");
			}else if(pass.length > 7){
				if(pwPreg.test(pass)){
					passFlag = true;
					passErr.setAttribute("style", "color: green")
					passErr.innerHTML="Valid to submit";
				}
				else{
					passErr.innerHTML = "Password must contain a digit and a Capital and a small letter";
					passErr.setAttribute("style","color: red");
				}
			}else{
				passErr.innerHTML = "Password Must Be 8 character in length";
				passErr.setAttribute("style","color: red");
			}
		}

		//Enabling the submit button if evrything is okay , disaling it if otherwise
		function loginReady(){
			if(unFlag && passFlag){
				return true;
			}else{
				return false;
			}
		}