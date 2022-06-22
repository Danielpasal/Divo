<?php

require '../private/connection.php';
session_start();

$user_id = $_POST['user_id'];



    $sql =  'DELETE FROM tbl_gebruikers WHERE id = :id';
    $q = $conn->prepare($sql);
    $q->execute(array(
        ':id'=> $_POST['user_id']
    ));

    header('location: ../index.php?page=beheer.beheerders');

