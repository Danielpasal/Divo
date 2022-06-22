<?php
require '../private/connection.php';

session_start();

$partij_id = $_POST['partij_id'];


$lid_id = $_POST['user_id'];
$roll = 4;

$sql = 'UPDATE tbl_partij_leden 
        SET partij_id = :partij_id , id = :lid
        WHERE id = :lid_id
         ';
$qry = $conn->prepare($sql);
$qry->execute(array(

    ':partij_id' => $partij_id,
    ':lid' => $lid_id,
    ':lid_id' => $lid_id


));

header('location:../index.php?page=beheer.inactieve.leden');