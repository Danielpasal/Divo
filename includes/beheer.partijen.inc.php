<?php
require 'private/connection.php';


$sql = "SELECT * FROM tbl_partijen";
$query = $conn->prepare($sql);
$query->execute();



?>


<table class="table">
    <form action="index.php?page=voeg.partijen" method="post" >
        <button type="submit" class="btn btn-primary">Voeg</button>
    </form>
    <tr>
        <th scope="col">Naam</th>
        <th scope="col">Afkorting</th>
        <th scope="col">Orientatie</th>
        <th scope="col">Logo</th>
        <th scope="col">Beheer leden</th>
        <th scope="col">Actie</th>
    </tr>

    <?php

    while ($result_set = $query->fetch()) {?>
        <tr>
            <td><?php echo $result_set['naam'] ?></td>
            <td><?php echo $result_set['afkorting'] ?></td>
            <td><?php echo $result_set['oriëntatie'] ?></td>
            <td>   <img src="data:image/png;base64,<?php echo $result_set['logo'] ?>"/></td>
            <td>
                <form action="index.php?page=beheer.leden" method="post">
                    <input type="hidden" name="partij_id" value="<?php echo $result_set['id'] ?>">
                    <button type="submit" class="btn btn-secondary">Beheer</button>
                </form>
            </td>
            <td>
                <form action="index.php?page=bewerk.partijen" method="post">
                    <input type="hidden" name="id" value="<?php echo $result_set['id'] ?>">
                    <button type="submit" class="btn btn-warning">Bewerken</button>
                </form>
                <form action="php/verwijder.partij.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $result_set['id'] ?>">
                    <button type="submit" onclick="return confirm('Wil je het echt verwijderen ' +
                 'Waarschijnlijk zitten er nog partij leden in die gedeactieveerd worden')"
                            class="btn btn-danger">Verwijderen
                    </button>
                </form>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>




