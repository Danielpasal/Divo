<?php
require 'private/connection.php';

$user_id = $_POST['user_id'] ?? $_SESSION['user_id'];

$id = 3;
$sql = "SELECT * FROM tbl_gebruikers WHERE id = :id ";
$query = $conn->prepare($sql);
$query->execute(array(
    ':id' => $user_id
));


while($rs_gebruikers = $query->fetch()){
?>

<form method="post" action="php/bewerk.beheerder.php">
    <label for="email">Email address</label>
    <div class="form-group">
        <input type="email" name="email" class="form-control"  id="email" aria-describedby="email" value="<?php echo $rs_gebruikers['email'] ?>" placeholder="Enter email">
    </div>
    <div class="form-group">
        <label for="wachtwoord">Wachtwoord</label>
        <input type="password" readonly class="form-control" name="wachtwoord" id="wachtwoord" aria-describedby="wachtwoord" value="<?php echo $rs_gebruikers['wachtwoord'] ?>" placeholder="Enter wachtwoord">
    </div>
    <div class="form-group">
        <label for="voornaam">Voornaam</label>
        <br>
        <input type="voornaam" class="voornaam" id="voornaam" name="voornaam" aria-describedby="voornaam" value="<?php echo $rs_gebruikers['voornaam'] ?>" placeholder="Enter voornaam">
    </div>
    <div class="form-group">
        <label for="tussenvoegsel">Tussenvoegsel</label>
        <input type="tussenvoegsel" class="form-control" name="tussenvoegsel" id="tussenvoegsel" aria-describedby="tussenvoegsel" value="<?php echo $rs_gebruikers['tussenvoegsel'] ?>" placeholder="Enter tussenvoegsel">
    </div>
    <div class="form-group">
        <label for="achternaam">achternaam</label>
        <input type="achternaam" class="form-control" name="achternaam" id="achternaam" aria-describedby="achternaam" value="<?php echo $rs_gebruikers['achternaam'] ?>" placeholder="Enter achternaam">
    </div>
    <div class="form-group">
        <label for="straatnaam">Straatnaam</label>
        <input type="straatnaam" class="form-control" name="straatnaam" id="straatnaam" aria-describedby="straatnaam" value="<?php echo $rs_gebruikers['straatnaam'] ?>" placeholder="Enter straatnaam">
    </div>
    <div class="form-group">
        <label for="huisnummer">Huisnummer</label>
        <input type="huisnummer" class="form-control" name="huisnummer" id="huisnummer" aria-describedby="huisnummer" value="<?php echo $rs_gebruikers['huisnummer'] ?>" placeholder="Enter huisnummer">
    </div>
    <div class="form-group">
        <label for="postcode">Postcode</label>
        <input type="postcode" class="form-control" name="postcode" id="postcode" aria-describedby="postcode" value="<?php echo $rs_gebruikers['postcode'] ?>" placeholder="Enter postcode">
    </div>
    <div class="form-group">
        <label for="provincie">Provincie</label>
        <input type="provinci" class="form-control" name="provincie" id="provincie" aria-describedby="provincie" value="<?php echo $rs_gebruikers['provincie'] ?>" placeholder="provinci email">
    </div>
    <input type="hidden" name="user_id" value="<?php echo $rs_gebruikers['id'] ?>">
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php }?>