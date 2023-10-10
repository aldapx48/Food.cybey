<?php
	$dbHost = "localhost";
	$dbName = "cybey_foods";
	$dbUser = "root";
	$dbPass = "";

	try {
		$conn = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);

		$conn -> setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		$conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
?>