<?php
	include 'db.php';
	$fName=$lName=$gender=$age=$email=$passOne=$passTwo="";
	$fNameErr=$lNameErr=$genderErr=$ageErr=$emailErr=$passOneErr=$passTwoErr="";
	$fnFlag = $lnFlag = $genFlag = $ageFlag = $emlFlag = $pw1Flag = $pw2Flag = false;
	function stripData($data) //trim data , empty spaces 
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	//write validated Data to Databse
	function writeToDB(){
		global $fName,$lName,$gender,$age,$email,$passOne,$passTwo;
		//INSERT INTO user(id, firstname,lastname, gender,age, email, password) VALUES ('default','fName','lName','male',20,'email@demo.com','Passone1')
		$queryString = "INSERT INTO user(id, firstname,lastname, gender,age, email, password) VALUES (NULL,'$fName','$lName','$gender',$age,'$email','$passOne')";
		$res = executeQuery($queryString);
		if($res== TRUE){
			$fName=$lName=$gender=$age=$email=$passOne=$passTwo="";
			header("Location: login.php");
		}else{
			echo "registration error";
		}
	}

	//validation process starts 
	if(isset($_POST["submit"])){
		if($_SERVER["REQUEST_METHOD"] == "POST"){ 
			//post request processing starts here

			//first name validation
			if(!empty($_POST["fn"])){
				$fName=stripData($_POST["fn"]);
				$fnFlag = true;
			}else{
				$fNameErr = "First Name Can not be empty";
			}

			//last name validation
			if(!empty($_POST["ln"])){
				$lName=stripData($_POST["ln"]);
				$lnFlag = true;
			}else{
				$lNameErr = "Last Name Can not be empty";
			}

			//gender validation
			if(!empty($_POST["gender"])){
				$gender=stripData($_POST["gender"]);
				$genFlag=true;
			}else{
				$genderErr="Select Your Gender";
			}

			//age validation
			if(!empty($_POST["age"])){
				if($_POST["age"]>9 && $_POST["age"] < 114){
					$age=stripData($_POST["age"]);
					$ageFlag=true;
				}else{
					$ageErr = "you must be 10 years old to continue";
				}
			}else{
				$ageErr="Age can Not Be empty";
			}

			//email validation
			if(!empty($_POST["eml"])){
				$temp=stripData($_POST["eml"]);
				if(filter_var($temp, FILTER_VALIDATE_EMAIL)){
					$email = $temp;
					$emlFlag=true;
				}else{
					$emailErr="email is not valid";
				}
			}else{
				$emailErr= "email can not be empty ";
			}
		}

		//First password validation
		if(!empty($_POST["pw1"])){
			$temp=trim($_POST["pw1"]);
			$passPreg="/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])/";

			if(strlen($temp)>7){
				if(preg_match($passPreg, $temp)){
					$passOne=$temp;
					$pw1Flag=true;
				}else{
					$passOneErr= "Must contain a Capital letter, a small letter and a digit";
				}
			}else{
				$passOneErr="Password must be 8 characters long ";
			}
		}else{
			$passOneErr="Password can not be empty";
		}

		//second password validation
		if(!empty($_POST["pw2"])){
			$temp = trim($_POST["pw2"]);
			if($pw1Flag){
				if(!strcmp($passOne,$temp)){
					$passTwo = $temp;
					$pw2Flag = true;
				}else{
					$passTwoErr="Password Didnt match";
				}
			}
		}else{
			$passTwoErr="password can not be empty";
		}

		//if everything is validated and acceptable
		if($fnFlag && $lnFlag && $genFlag && $ageFlag && $emlFlag && $pw1Flag && $pw2Flag){
			writeToDB();
		}else{
			echo "validation error";
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>text field for validation javascript and php</title>
		<link rel="stylesheet" type="text/css" href="register.css">
		<script type="text/javascript" language="javascript" src="regValidate.js"></script>
	</head>
	


	<body>
		<div class="center">

			<form method="post" action="register.php" id="regForm" name="regForm" >
				<br/>
				<input type="text" name="fn" value="<?php echo $fName ?>" placeholder="First Name" onblur="fnValidate()"/> <?php echo $fNameErr ?>
					<br/>	<span id="fnErr" name="fnErr"> </span> <br/>

				<br/>
				<input type="text" name="ln" value="<?php echo $lName?>" placeholder="Last Name"/ onblur="lnValidate()"><?php echo $lNameErr ?>
					<br/>	<span id="lnErr" name="lnErr"> </span> <br/>

				<b> Gender:</b>  	<?php echo  $genderErr; ?> <span id="genErr" name="genErr"> </span><br/>
					<input type="radio" name="gender" id="male"  value="male" <?php echo ($gender=='male')?'checked':''?> /><label for="male">Male </label><br/>
					<input type="radio" name="gender" id="female" value="female"<?php echo($gender=='female')?'checked':''?> /><label for="female">Female </label> <br/>
					<input type="radio" name="gender" id="other" value="other" <?php echo ($gender=='other')?'checked':''?> /><label for="other">Other</label> <br/>
					<!-- using checked attribute is buggy in html if same name is used as "input field name (eg: here "gender" is used as common variable name for radio buttons)" so it is better to echo that "checked" attribute where it is actually checked as a result of logic operation-->

				<br/>
				<input type="text" name="age" value="<?php echo $age ?>" placeholder="Age" onblur="ageValidate()" onmouseover="genValidate()"/> <?php echo $ageErr?>
					<br/><span id="ageErr" name="ageErr" > </span> <br/>

				<br/>
				<input type="text" name="eml" value="<?php echo $email ?>" placeholder="E-mail" onblur="emlValidate()"/> <?php echo $emailErr ?>
					<br/><span id="emlErr" name="emlErr"> </span> <br/>

				<br/>
				<input type="text" name="pw1" value="<?php echo $passOne ?>" placeholder="Password" onblur="pwValidate()"/> <?php echo $passOneErr ?> 
					<br/><span id="pw1Err" name="pw1Err"> </span> <br/>

				<br/>
				<input type="text" name="pw2" value="<?php echo $passTwo ?>" placeholder="Confirm Password" onkeyup="pwMatchValidate()"/> <?php echo $passTwoErr ?> 
					<br/><span id="pw2Err" name="pw2Err"> </span> <br/>

				<input type="submit" name="submit" value="submit" onclick="return submitReady()"/>

			</form>
		</div>
	</body>
</html>