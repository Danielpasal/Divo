<?php

require '../private/connection.php';
session_start();

$id = $_POST['id'];



$sql =  'DELETE FROM tbl_partijen WHERE id = :id';
$q = $conn->prepare($sql);
$q->execute(array(
    ':id'=> $id
));

header('location: ../index.php?page=beheer.partijen');

