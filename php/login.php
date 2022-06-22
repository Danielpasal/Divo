<?php
session_start();
//session_start () maakt een sessie aan of hervat de huidige op basis van een sessie-ID die is doorgegeven via
// een GET- of POST-verzoek, of doorgegeven via een cookie.

//hier inkopieren we de connectie
require '../private/connection.php';
/*
door dat we de functie session_start(); gebruiken.Kunnen we global $_SESSION ook gebruiken
de $_SESSION superglobal en is een manier om toegang te krijgen tot informatie over meerdere pagina's
dat op geslagen word als een globale variabele $_SESSIONS. In dit geval gebruiken de $_SESSIONS voor een melding
te displayen op de page waar vekeerd ingelogd is.

Kort maar krachtig de session_start(); functie zorgt dat de sessie word gestart en onthouden word op de volgende pagina
.en de waarde van de variable $_SESSION word onthouden als je het daar de session_start(); en $_SESSION gebruikt.

de header zorgt ervoor dat als de na de conditie
*/
$password = $_POST['wachtwoord'];
$email = $_POST['email'];
/* Execute a prepared statement by passing an array of values */
$sql = 'SELECT g.email ,g.wachtwoord ,r.roll FROM tbl_gebruikers g INNER JOIN tbl_rollen r join tbl_burgers tb on r.id = g.roll_id
    where email = :email';
$sth = $conn->prepare($sql);
$sth->execute(array(':email' => $email));

$rsUser = $sth->fetch(PDO::FETCH_ASSOC);

if ($email == $rsUser['email'] && password_verify($password, $rsUser['wachtwoord'])) {
    $roll = $rsUser['roll'];
    var_dump($rsUser['roll']);

    switch ($roll) {
        case "admin":

            $_SESSION['user'] = $rsUser['roll'];
            header('location:../index.php?page=beheer.partijen');;
            break;
        case "beheerder":
            $_SESSION['user'] = $rsUser['roll'];;
            header('location:../index.php?page=build');
            break;
        case "burger":
            $_SESSION['user'] = $rsUser['roll'];;
            header('location:../index.php?page=stem');
            break;
        case "lid":
            header('location:../index.php?page=');
            $_SESSION['user'] = $rsUser['roll'];;
            break;
        default:
            $_SESSION['user'] = 'gebruiker';
            $_SESSION['melding'] = 'Er is iets fouts';
            header('location:../index.php?page=login');
            break;
    }
} else {
    $_SESSION['user'] = 'gebruiker';
    $_SESSION['melding'] = 'Er is iets fouts gegaan';
    header('location:../index.php?page=login.gebruikers');
}


//



