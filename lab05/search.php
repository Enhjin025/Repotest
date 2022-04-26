<?php
//1 connection
$conn = new mysqli('localhost', 'root', '', 'pet');
if($conn->connect_error)
{
	die("Connection failed:". $conn->connect_error);
}

//2 sql command
$item = $_REQUEST["n"];
$result = $conn->query("call searchpet('$item')");
if($result->num_rows>0)
{
	$pets = array();
	while($row=$result->fetch_assoc())
	{
		$pets[] = $row;
	}
	echo json_encode($pets);
}

//3 close();
$conn->close();


?>