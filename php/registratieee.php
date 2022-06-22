<?php


require '../private/connection.php';
session_start();
$email = $_POST['email'];
$wachtwoord = $_POST['wachtwoord'];

$roll = '2';




$passwordhash = password_hash($wachtwoord, PASSWORD_DEFAULT);



    $sql = "INSERT INTO tbl_gebruikers (email, wachtwoord,roll_id)
            VALUES (:em, :password, :roll )";
    $query = $conn->prepare($sql);
    $query->execute(array(
        ':em' => $email,
        ':password' => $passwordhash,
        ':roll' => $roll
    ));

    header('location:../index.php?page=login');
