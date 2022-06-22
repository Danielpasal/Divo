<?php

require '../private/connection.php';
session_start();

$user_id = $_POST['user_id'];
$partij_id = $_POST['partij_id'];

$sql =  'DELETE FROM tbl_partij_leden WHERE id = :id';
$q = $conn->prepare($sql);
$q->execute(array(
    ':id'=> $user_id
));


$_SESSION['partij_id'] =  $partij_id;
header('location: ../index.php?page=beheer.leden');

