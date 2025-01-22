<?php
include_once 'header.php';
?>

    <h1>Registracija</h1>

    <form action="user_insert.php" method="post">
        <input type="text" name="first_name" placeholder="Vnesi ime" required="required" class="form-control" /><br />
        <input type="text" name="last_name" placeholder="Vnesi priimek" required="required" class="form-control" /><br />
        <input type="email" name="email" placeholder="Vnesi e-pošto" required="required" class="form-control" /><br />
        <input type="password" name="pass" placeholder="Vnesi geslo" required="required" class="form-control" /><br />
        <input type="password" name="pass2" placeholder="Ponovi geslo" required="required" class="form-control" /><br />
        <select name="city_id" required="required" class="form-control">
            <?php
            include_once 'db.php';
            $sql = "SELECT * FROM cities";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            while ($row = $stmt->fetch()) {
                echo '<option value="'.$row['id'].'">'.$row['title'].'</option>';
            }
            ?>
        </select> <br />
        <input type="submit" value="Shrani" />
    </form>

<?php
include_once 'footer.php';