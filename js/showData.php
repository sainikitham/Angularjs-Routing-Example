<?php
	include('config.php');
	$db = new DB();
	$data = $db->qryIce();
	echo json_encode($data);
?>