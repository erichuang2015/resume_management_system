<?php session_start(); ?>

<?php 
    include 'db.php';
    $profession=$nation=$presentAdd=$selfStatement=$skills=$workExp=$education="";
    $userName = trim($_SESSION["userName"]);

    $query = " select id from user where firstname='$userName' "; 
    $result = executeQuery($query);
    $fetchRes = mysqli_fetch_assoc($result);
    $id = $fetchRes["id"];

    $query = "SELECT * FROM details WHERE uid=$id ";
    $result=executeQuery($query);
    $rowcount=mysqli_num_rows($result);

    if($rowcount == 1){
        $fetchRes = mysqli_fetch_assoc($result);
        $profession = $fetchRes["profid"]; 
        $nation = $fetchRes["nationality"];
        $presentAdd = $fetchRes["address"];
        $selfStatement = $fetchRes["statement"];
        $skills=$fetchRes["skills"];
        $workExp=$fetchRes["experience"];
        $education=$fetchRes["education"];
    }





if(isset($_POST["submit"])){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        function insUpdate(){ //called from bottom of php file
        global $rowcount,$id;
        global $profession,$nation,$presentAdd,$selfStatement,$skills,$workExp,$education;
        
        if($rowcount >0 ){ //user has existing details; update 
            $query=" UPDATE details SET profid=$profession,nationality='$nation',address='$presentAdd',statement='$selfStatement',skills='$skills',experience='$workExp',education='$education' WHERE uid=$id ";
            $res = executeQuery($query);
            return $res;
        }else{ //if user has no details in "details" table; insert
            $query = "INSERT INTO details(id, uid, profid, nationality, address, statement, skills, experience, education) VALUES (NULL,$id,$profession,'$nation','$presentAdd','$selfStatement','$skills','$workExp','$education')";
            $res = executeQuery($query);
            return $res;
        }
    }

    //server side validatoin
    if(($_POST["profession"] < 1) || empty($_POST["nationality"]) || empty($_POST["presentAdd"]) || empty($_POST["statement"]) || empty($_POST["skills"]) || empty($_POST["workExp"]) || empty($_POST["education"])){
        echo "Field left empty";
    }else{
        $profession=trim($_POST["profession"]);
        $nation=trim($_POST["nationality"]);
        $presentAdd=trim($_POST["presentAdd"]);
        $selfStatement=trim($_POST["statement"]);
        $skills=trim($_POST["skills"]);
        $workExp=trim($_POST["workExp"]);
        $education=trim($_POST["education"]);
        $res=insUpdate(); //call function to update or insert

        if($res== TRUE){
            echo "edit sucessful";
        }else{
            echo "Edit unsucessful";
        }

    }
   }
}

    

    
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Edit Profile</title>
        <link rel="stylesheet" type="text/css" href="editProfile.css">
        <script type="text/javascript" language="javascript" src="editValidate.js"></script>
    </head>
    
    <body>
        <div class="center edit">
            <h3>Edit your Profile</h3>
            <form method="post" action="editProfile.php" name="editForm" id="editForm">
              
              <div class="left textbox">
                <b>Profession: </b><br/>
                <select name="profession">
                    <option value="0" <?php echo ($profession==0)?'selected="selected"':''?> >Profession</option>
                    <option value="1" <?php echo ($profession==1)?'selected="selected"':''?> >Teacher</option>
                    <option value="2"<?php echo ($profession==2)?'selected="selected"':''?> >Computer Programmer</option>
                    <option value="3" <?php echo ($profession==3)?'selected="selected"':''?> >Electrical Engineer</option>
                    <option value="4"<?php echo ($profession==4)?'selected="selected"':''?> >Accountant</option>
                </select>
                <br/> 
                <span name="profErr" id="profErr"></span><br/>

                <b>Nationality:</b><br/>
                <input type="text" name="nationality" placeholder="Nationality" value="<?php echo $nation ?>" /><br/>
                <span id="natErr"></span></br> <br/>

                <b>Present Address:</b><br/>
                <textarea name="presentAdd" placeholder="Present address include zip,country" rows=4 cols=30 value=""><?php echo $presentAdd ?> </textarea> <br/>
                <span id="addErr"></span></br> <br/>

                <b>Brief Statement About Yourself:</b><br/>
                <textarea name="statement" placeholder="say something about you" rows=4 cols=30 value=""><?php echo $selfStatement ?> </textarea> <br/>
                <span id="statementErr"></span></br> 
                </div>
              
              <div class="right textareas">
                <b>Skills:</b><br/>
                <textarea  name="skills" placeholder="enter your skills seperated by commas" value="" rows=4 cols=50 /><?php echo $skills ?></textarea><br/>
                <span name="skillErr" id="skillErr"></span><br/> <br/>

                <b>Work Experience: </b><br/>
                <textarea name="workExp" placeholder="list your all last employment along with duration and Postion at that job; seperate work experiences by comma"
                value="" rows=4 cols=50 ><?php echo $workExp ?></textarea> 
                <br/><span name="workExpErr" id="workExpErr"><br/></span><br/> <br/>

                <b>Education:</b><br/>
                <textarea  name="education" placeholder="enter your educational background, education level with Degree seperated by comma" value="" rows=4 cols=50 /><?php echo $education ?></textarea><br/>
                <span name="eduErr" id="eduErr"></span> <br/> <br/>
              </div>
              <div class="center submit">
                <input type="submit" name="submit" value="submit" onclick="return validate()" />
              <div>
            </form>
        </div>

    </body>
</html>