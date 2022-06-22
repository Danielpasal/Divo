<?php
if (isset($_SESSION['email_melding'])) {
    echo '<p class="melding">' . $_SESSION['email_melding'] . "</p>";
    unset($_SESSION['email_melding']);
}

?>

<div class="container">
    <div class="row">
        <div class="col-sm">
        </div>
        <div class="col-sm">
            <h1>Registration</h1>
            <form action="PHP/registratieee.php" method="post"">

            <div class="form-group">
                <label for="username">Email</label>
                <input required name="email" type="email" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Email">

            <div class="form-group">
                <label for="straat">Wachtwoord</label>
                <input required name="wachtwoord" type="password" class="form-control" id="straat" placeholder="swachtwoord">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="col-sm">
        </div>
    </div>
</div>

