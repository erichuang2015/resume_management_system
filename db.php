<?php
function getConn(){
			$servername = "127.0.0.1:3306";
			$username = "root";
			$password = "";
			$dbname = "resume";

			// Create connection
			$conn = mysqli_connect($servername, $username, $password, $dbname);

			// Check connection
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
			return $conn;
		}	

function executeQuery($queryString){
	$conn=getConn();
	$result = mysqli_query($conn, $queryString);
	return $result;
}
/*
function updateQuery($queryString){
	$conn=getConn();
	$result = mysqli_query($conn, $queryString);
	return $result;
}*/
?> 