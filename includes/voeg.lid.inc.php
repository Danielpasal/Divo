<?php



if (isset($_SESSION['fout_melding'])) { ?>
<div class="alert alert-danger" role="alert">

    <?php
    echo '<p class="melding">' . $_SESSION['fout_melding'] . "</p>";
    unset($_SESSION['fout_melding']);
    }
    $id = $_POST['partij_id'];
?>


</div>


<form method="post" action="php/voeg.lid.php">
    <div class="form-group">
        <label for="voornaam">Voornaam</label>
        <br>
        <input type="voornaam" required class="voornaam" id="voornaam" name="voornaam" aria-describedby="voornaam" value="" placeholder="Enter voornaam">
    </div>
    <div class="form-group">
        <label for="tussenvoegsel">Tussenvoegsel</label>
        <input type="tussenvoegsel"  class="form-control" name="tussenvoegsel" id="tussenvoegsel" aria-describedby="tussenvoegsel" value="" placeholder="Enter tussenvoegsel">
    </div>
    <div class="form-group">
        <label for="achternaam">Achternaam</label>
        <input type="achternaam"  class="form-control" name="achternaam" id="achternaam" aria-describedby="achternaam" value="" placeholder="Enter achternaam">
    </div>
    <div class="form-group">
        <label for="geboorte-datum">Geboorte datum</label>
        <input type="date" required  class="form-control" name="geboorte-datum" id="geboorte-datum" aria-describedby="geboorte-datum" value="" placeholder="Enter geboorte datum">
    </div>
    <div class="form-group">
        <label for="woonplaats">Woonplaats</label>
        <input type="text" required class="form-control" name="woonplaats" id="woonplaats" aria-describedby="woonplaats" value="" placeholder="Enter woonplaats">
    </div>
    <div class="form-group">
        <label for="geslacht">Geslacht</label>
        <select required name="geslacht" id="geslacht">
            <option value="Man">Man</option>
            <option value="Vrouw">Vrouw</option>
        </select>
    </div>
    <input type="hidden" name="id" value="<?php echo $id ?>">
        <button type="submit" class="btn btn-primary">Submit</button>
</form>
