<!Doctype>
<html>

<head>

<title>create</title>
</head>

<body>
<?php
	$server = "localhost";
	$username = "root";
	$password = "";	
	$dbname = "dti_procurement";								//add when adding table
	$con = new mysqli($server, $username , $password,$dbname);

	if($con->connect_errno)
		die("Could not connect: ".$con->connect_error);

	//$sql = "CREATE DATABASE centuryDb";
	//$sql = "CREATE table user(username text, password text);";
	//$sql = "insert into user(username,password) values ('admin','adminpass')";
	/*$sql = "CREATE table client(client_id int primary key auto_increment,client_name text,
	lab_test_availed text, lab_test_result text,date_of_the_test date)";*/
	/*$sql = "INSERT INTO CLIENT (client_name,
	lab_test_availed , lab_test_result ,date_of_the_test) VALUES ('dan','Urinalysis' ,'broken rib' ,'2017-11-10')";*/
	/*$sql = "INSERT INTO CLIENT (client_name,
	lab_test_availed , lab_test_result ,date_of_the_test) VALUES ('padada','X-ray' ,'broken spine' ,'2017-11-10')";*/
	/*$sql = "INSERT INTO client (client_name,
	lab_test_availed , lab_test_result ,date_of_the_test) VALUES ('padada','X-ray' ,'broken spine' ,'2017-11-10')";*/
	/*if($con->query($sql))
		//echo "Database created successfully";successfully created I
		echo "Database was created successfully";
	else
		die("error creating database");

	$con->close();
	*/
?>
</body>
</html>
