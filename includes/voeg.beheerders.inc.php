<?php
if (isset($_SESSION['fout_melding'])) { ?>
<div class="alert alert-danger" role="alert">

    <?php
    echo '<p class="melding">' . $_SESSION['fout_melding'] . "</p>";
    unset($_SESSION['fout_melding']);
    } ?>
</div>

    <form method="post" action="php/voeg_beheerder.php">
        <label for="email">Email address</label>
        <div class="form-group">
            <input type="email" name="email" class="form-control"  id="email" aria-describedby="email" value="" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="wachtwoord">Wachtwoord</label>
            <input type="password"  class="form-control" name="wachtwoord" id="wachtwoord" aria-describedby="wachtwoord" value="" placeholder="Enter wachtwoord">
        </div>
        <div class="form-group">
            <label for="voornaam">Voornaam</label>
            <br>
            <input type="voornaam" class="voornaam" id="voornaam" name="voornaam" aria-describedby="voornaam" value="" placeholder="Enter voornaam">
        </div>
        <div class="form-group">
            <label for="tussenvoegsel">Tussenvoegsel</label>
            <input type="tussenvoegsel" class="form-control" name="tussenvoegsel" id="tussenvoegsel" aria-describedby="tussenvoegsel" value="" placeholder="Enter tussenvoegsel">
        </div>
        <div class="form-group">
            <label for="achternaam">achternaam</label>
            <input type="achternaam" class="form-control" name="achternaam" id="achternaam" aria-describedby="achternaam" value="" placeholder="Enter achternaam">
        </div>
        <div class="form-group">
            <label for="straatnaam">Straatnaam</label>
            <input type="straatnaam" class="form-control" name="straatnaam" id="straatnaam" aria-describedby="straatnaam" value="<" placeholder="Enter straatnaam">
        </div>
        <div class="form-group">
            <label for="huisnummer">Huisnummer</label>
            <input type="huisnummer" class="form-control" name="huisnummer" id="huisnummer" aria-describedby="huisnummer" value="" placeholder="Enter huisnummer">
        </div>
        <div class="form-group">
            <label for="postcode">Postcode</label>
            <input type="postcode" class="form-control" name="postcode" id="postcode" aria-describedby="postcode" value="" placeholder="Enter postcode">
        </div>
        <div class="form-group">
            <label for="provincie">Provincie</label>
            <input type="provinci" class="form-control" name="provincie" id="provincie" aria-describedby="provincie" >
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
