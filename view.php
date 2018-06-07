<?php
include 'db.php';
    $userName = trim($_GET["user"]) ;
    //echo "$userName";

    //all variable declaration for datas
    $firstname=$lastname=$gender=$age=$email=$nationality=$address=$statement=$skills=$experience=$education=$profname="";
    //data from user table
    $query= "SELECT * FROM user where firstname='$userName'";
    $res = executeQuery($query);
    $userDetails = mysqli_fetch_assoc($res);
    $uid = $userDetails["id"]; // id(user),uid(details)
    $firstname=$userDetails["firstname"];//
    $lastname=$userDetails["lastname"];//
    $gender=$userDetails["gender"];//
    $age=$userDetails["age"];//
    $email=$userDetails["email"];//

    //data from details table
    $query= "SELECT * FROM details where uid=$uid ";
    $res = executeQuery($query);
    $profileDetails = mysqli_fetch_assoc($res);
    $profid = $profileDetails["profid"]; //id(profession), profid(details) 
    $nationality=$profileDetails["nationality"];//
    $address=$profileDetails["address"];//
    $statement=$profileDetails["statement"];
    $skills=$profileDetails["skills"];
    $experience=$profileDetails["experience"];
    $education=$profileDetails["education"];

    //data from profession table
    $query= "SELECT * FROM profession where id=$profid ";
    $res = executeQuery($query);
    $profession = mysqli_fetch_assoc($res);
    $profname=$profession["profname"];

    //left information part 
    //   echo $firstname."<br/>".$lastname."<br/>".$gender."<br/>".$age."<br/>".$email."<br/>".$nationality."<br/>".$address."<br/>".$statement."<br/>".$skills."<br/>".$experience."<br/>".$education."<br/>".$profname."<br/>" ;
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Profile</title>
        <link rel="stylesheet" type="text/css" href="view.css"/>
    </head>

    <body>
        <div class="center container">
        
            <div class="upper">
                <h3 style="text-align: center">Resume For <?php echo $userName ?></h3>
                <div class="upper-left">
                    <b>E-mail: </b> <?php echo $email ?><br/>
                    <b>Address:</b> <?php echo $address ?><br/>
                </div>
                
                <div class="upper-right">
                <!-- empty space for image -->
                </div>
            </div>
            
            <div class="mid personDetail">

                <!--Basic Information-->
                <b></b><br/>
                <b>Name: </b><?php echo $firstname." ".$lastname?><br/>
                <b>Age: </b><?php echo $age ?><br/>
                <b>Gender: </b><?php echo $gender?><br/>
                <b>Nationality: </b><?php echo $nationality?><br/>
                <b>Profession: </b><b><?php echo $profname?></b><br/>

                <br/><br/> <!--Professional summery/Self Statement-->
                <h3>Summery: <br/></h3>
                <p><?php echo $statement?></p>
            </div>
            
            <div class="lowmid skills">
                <!--Professional Skills-->
                <h4>Skills: </h4>
                    <p><?php echo $skills?></p>
                    <br/><br/>
                <!--Past Employment-->
                <h4>Employment: </h4>
                    <p><?php echo $experience?></p>
                    <br/>
            </div>

            <div class="low education">
                <!--Professional Skills-->
                <h4>Education: </h4>
                    <p><?php echo $education?></p>
                    <br/>
            </div>        
        </div>
    </body>
</html>