<?php
include_once 'header.php';
?>
    <h1>Prijava</h1>

    <form action="login_check.php" method="post">
        <input type="email" name="email" placeholder="Vnesi e-pošto" required="required" class="form-control" /> <br />
        <input type="password" name="pass" placeholder="Vnesi geslo" required="required" class="form-control" /> <br />
        <input type="submit" value="Prijavi" />
    </form>

<?php
include_once 'footer.php';