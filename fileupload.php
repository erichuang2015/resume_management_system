<?php
    echo "file";
    $targetDir="image/";
    $targetFile = $targetDir.basename($_FILES["filename"]["name"]);
    $uploadOk=1;
    $imageFileType=pathinfo($targetFile, PATHINFO_EXTENSION);

    if(isset($_POST["submit"])){
        $check=getimagesize($_FILES["filename"]["tmp_name"]);
        if($check !== false){
            echo "file is an image "." ".$check["mime"].".";

        }else{
            echo "file is not an image";
        }
    } 
?>

<!DOCTYPE html>
<html>
    <head>
        <title>File upload</title>
    </head>
    <body>
        <form method="post" action="fileupload.php" enctype="multipart/form-data">
            Uplaod file: <input type="file" name="filename" id="filename">
            <input type="submit" value="Submit" name="submit" />
        </form>
    </body>
</html>