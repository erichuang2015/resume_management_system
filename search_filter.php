<?php include_once("db.php");?>

<?php
	$key = $_GET['q'];
	$query = "SELECT *FROM profession WHERE id like '%{$key}%'";

	$result=mysqli_query(getConn(), $query);

	while($data = mysqli_fetch_assoc($result)){
		$pid=$data['id'];
	}

	
	$query1 = "SELECT *FROM details WHERE profid='$pid'";
	$result1=mysqli_query(getConn(), $query1);


		echo '<table>
				<tr>
				<th>Name</th>
				<th>Nationality</th>
				<th>Address</th>
				<th>Skills</th>
				<th>Experience</th>
				<th>Education</th>
				<th>View Profile</th>
				</tr>';

	while($data1 = mysqli_fetch_assoc($result1)){

			$id=$data1["uid"];
			$query2= "SELECT * FROM  USER where id=$id ";
			$result2=mysqli_query(getConn(), $query2);
			$data2=mysqli_fetch_assoc($result2);
			$username = $data2["firstname"];
			$link="<a href=" . "'view.php?user=".$username."'".">View Profile</a>";

		echo '<tr align="center">
				<td>'.$data2['firstname']." ".$data2['lastname'].'</td>
				<td>'.$data1['nationality'].'</td>
				<td>'.$data1['address'].'</td>
				<td>'.$data1['skills'].'</td>
				<td>'.$data1['experience'].'</td>
				<td>'.$data1['education'].'</td>
				<td>'.$link.'</td>
				</tr>';
	}
	echo '</table>';
	?>

