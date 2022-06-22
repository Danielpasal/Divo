<?php
require 'private/connection.php';

$id = 3;
$sql = "SELECT * FROM tbl_gebruikers WHERE roll_id = :id ";
$query = $conn->prepare($sql);
$query->execute(array(
    ':id' => $id
));

?>




<table class="table">
    <form action="index.php?page=voeg.beheerders" method="post">
        <button type="submit" class="btn btn-primary">Voeg</button>
    </form>
    <tr>
        <th scope="col">Email</th>
        <th scope="col">Wachtwoord</th>
        <th scope="col">Voornaam</th>
        <th scope="col">Tussenvoegsel</th>
        <th scope="col">Acternaam</th>
        <th scope="col">Straatnaam</th>
        <th scope="col">Huisnummer</th>
        <th scope="col">Postcode</th>
        <th scope="col">Provincie</th>
        <th scope="col">Actie</th>

    </tr>
    <?php while($result_set = $query->fetch()) { ?>
    <tr>
        <td><?php echo $result_set['email']?></td>
        <td><input type="password" readonly value="<?php echo $result_set['wachtwoord']?>"> </td>
        <td><?php echo $result_set['voornaam']?></td>
        <td><?php echo $result_set['tussenvoegsel']?></td>
        <td><?php echo $result_set['achternaam']?></td>
        <td><?php echo $result_set['straatnaam']?></td>
        <td><?php echo $result_set['huisnummer']?></td>
        <td><?php echo $result_set['postcode']?></td>
        <td><?php echo $result_set['provincie']?></td>
        <td>
            <form action="index.php?page=bewerk.beheerder" method="post">
                <input type="hidden" name="user_id" value="<?php echo $result_set['id']?>">
                <button type="submit" class="btn btn-warning">Bewerken</button>
            </form>
            <form action="php/verwijder.beheerder.php" method="post">
                <input type="hidden" name="user_id" value="<?php echo $result_set['id']?>">
                <button type="submit" onclick="return confirm('Wil je het echt verwijderen')" class="btn btn-danger">Verwijderen</button>
            </form>
        </td>
    </tr>
    <?php }?>
    </tbody>
</table>




