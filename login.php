<?php session_start(); ?>
<?php
include 'db.php';
//php login validation
	$uName=$pass=$remember="";
	$unErr=$passErr=""; 

	//if user has valid cookie stored ; redirect
	if(isset($_COOKIE["cookieName"])){
		$_SESSION["userName"]=$_COOKIE["cookieName"];
		header("Location: options.php");
	}
	
	if(isset($_POST["login"])){
		if($_SERVER["REQUEST_METHOD"] == "POST"){

			if(isset($_POST['check'])){
				$remember="remember";
			}


			if(!empty($_POST["un"])){ //if userName is not empty
				$temp = trim($_POST["un"]);
				$uName=$temp; //redundant code  

				if(!empty($_POST["pass"])){ //if passWord is not empty
					//match value of pass against retrieved information from databse 
					//using user provided user name ; collected from the form
					$pass=trim($_POST["pass"]);
					$query = "SELECT id FROM user WHERE firstname='$uName' and password='$pass' ";
					$res = executeQuery($query);
					
					//if and only if one row exists ; valid user
					$count = mysqli_num_rows($res);
					if($count == 1){
						$_SESSION["userName"] = $uName;
							if($remember=="remember"){
								setcookie("cookieName", $uName, time() + 300 ,"/");//name , value, validity , path
							}
							header("Location: options.php");
					}else{
						$passErr="user name and password didnt match the records";
					}
					
					//var_dump($res);
				}else{//if password is empty
					$passErr = "Password can not be empty";
				}
			}else{//user name is empty
				$unErr="User Name Can not Be empty";
			}
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login page</title>
	
	<link rel="stylesheet" type="text/css" href="login.css"> <!-- linking style sheet -->
	<script type="text/javascript" language="javascript" src="login.js">

	</script>
</head>

<body>
	<dev class="center">
	<form method="post" action="login.php" id="loginForm" name="loginForm" >
		<br/>
		<input type="text" name="un" value="<?php echo $uName ?>" placeholder="User Name" onblur="nameValidate()"/><br/><span style="color: white;"> <?php echo $unErr ?></span>
			<br/><span id="unErr" name="unErr"> </span> <br/>
			<br/>
		<input type="text" name="pass" value="" placeholder="Password" onkeyup="passValidate()"/><br/><span style="color:white;"> <?php echo $passErr ?></span> 
			<br/><span id="passErr" name="passErr"> </span> <br/>

		<input type="checkbox" name="check" value="remember" <?php echo ($remember == "remember") ? 'checked' : '' ?> /><label for="check">Remember Me</label><br/>
		<input type="submit" name="login" value="login" onclick="return loginReady()"/>
		<br/><a href="register.php" class="button" style="margin-top:10px; color:white;">Sign Up</a>
	</form>
	</div>
</body>
</html>
