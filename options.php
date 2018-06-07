<?php session_start(); ?>
<?php
$prof="";
    if($_SESSION["userName"]){
        global $prof;
        $prof = trim($_SESSION["userName"]);

    }else{
        header("Location: login.php");
    }
    $viewlink = "view.php?user=".$prof;
?>
<!DOCTYPE html>
<head>
	<title>Choose Option to continue </title>

    <style type="text/css">
        a.button {
           
            appearance: button;

            text-decoration: none;
            color: initial;
            background-color:#9978CB;
            height: 20px;
            width: 100px;
            margin: 4px;
            padding:4px 4px;
            text-align: center;
            color: white;
            display: block;
            margin-left: 150px;
            margin-top: 40px;
            padding: 10px;
            border: 2px solid  LightSteelBlue;
            border-radius: 2px;
    
        }
        .center{
            height: 400px;
            width: 400px;
            margin: 0 auto;
            border: 4px solid green;
            background-color: #6376AB;
            text-align: center;
            color: PaleGoldenrod;
        }
        h4{
            
            font-color: PaleGoldenrod;
            
            font-size: 30px;
            font-family:Comic Sans MS;
        }
    </style>
</head>
<body>
    <div class="center">
        <h4>Choose any option </h4>
        <a href="editProfile.php" class="button ">Edit Profile</a>
        <a href="<?php echo $viewlink ?>" class="button ">View Profile</a>
        <a href="logout.php" class="button " onclick="logout()" >Log Out</a>
    </div>
</body>