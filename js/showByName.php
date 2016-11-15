<?php
	include('config.php');
	$db = new DB();
	$data = $db->qryWind();
	echo json_encode($data);
?>