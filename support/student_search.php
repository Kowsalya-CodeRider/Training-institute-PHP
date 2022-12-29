<?php
include('db_connect.php');

$keyword = strval($_POST['query']);
	$search_param = "{$keyword}%";
	$conn =new mysqli("localhost","root","","innovaskill_partners");

	$sql = $conn->prepare("SELECT * FROM students WHERE st_name LIKE ?");
	$sql->bind_param("s",$search_param);			
	$sql->execute();
	$result = $sql->get_result();
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		$countryResult[] = $row["st_name"];
		}
		echo json_encode($countryResult);
	}
	$conn->close();
?>