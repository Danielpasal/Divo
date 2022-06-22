<?php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "divo";



try {
$conn = new PDO("mysql:host=$host;dbname=divo", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
echo "Connection failed:" . $e->getMessage();
die();
}
?>


