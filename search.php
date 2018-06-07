<?php include_once("db.php");?>
<!DOCTYPE html>
<html>
    <head>
        <title>Filtered Search Result</title>
		<style>
		table {
				border-collapse: collapse;
				width: 100%;
				border:1px solid green;
			}

		th, td {
				text-align: left;
				padding: 8px;
			}

		tr:nth-child(even){background-color: #f2f2f2} /* table row color interchange */

		th {
			background-color: #b70e13;
			color: white;
		}
		</style>

		<script type="text/javascript" language="javascript">
            function showHint(str) {
					if (str.length == 0) {
						document.getElementById("txtHint").innerHTML = "";
						return;
					} else {
						var xmlhttp = new XMLHttpRequest();
						xmlhttp.onreadystatechange = function() {
							if (this.readyState == 4 && this.status == 200) {
								document.getElementById("txtHint").innerHTML = this.responseText;
							}
						};
						xmlhttp.open("GET", "search_filter.php?q=" + str, true);
						xmlhttp.send();
					}
				}
        </script>
    </head>
    
	<body>
		<select name="profession" onchange="showHint(this.value)">
						<option>Select Your Catagory</option> 
						<?php   //retrieving professions from profession table
								$get_cats = "select *from profession";
								$run_cats= mysqli_query(getConn(), $get_cats);
								
								while($row_cats=mysqli_fetch_assoc($run_cats)){
								   $prof_id=$row_cats['id'];
								   $prof_title=$row_cats['profname'];		   
								   echo "<option value='$prof_id'>$prof_title</option>";
								}
						?>
		</select>


		<a href="Welcome.php" class="button" style="text-decoration:none; color: Black;">Home</a>

		<div id="txtHint">Professional profile will appear here</div>
	</body>
</html>