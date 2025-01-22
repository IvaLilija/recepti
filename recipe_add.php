<?php
include_once 'header.php';
?>

    <h1>Dodaj recept</h1>
    <form action="recipe_insert.php" method="post">
        <input type="text" name="title" placeholder="Vnesi naslov recepta" required="required" class="form-control" /><br />
        <select name="category_id" required="required" class="form-control">
            <?php
            include_once 'db.php';
            $sql = "SELECT * FROM categories";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            while ($row = $stmt->fetch()) {
                echo '<option value="'.$row['id'].'">'.$row['title'].'</option>';
            }
            ?>
        </select> <br />
        <textarea name="description" placeholder="Vnesi opis recepta" required="required" class="form-control"></textarea><br />
        <input type="text" name="duration" placeholder="Vnesi čas priprave (min)" class="form-control" /><br />
        <input type="number" name="level" min="1" max="5" placeholder="Vnesi zahtevnost recepta" class="form-control" /><br />
        <input type="number" name="number_of_people" min="1" max="20" placeholder="Vnesi število oseb" class="form-control" /><br />
        <textarea name="proceedings" placeholder="Vnesi postopek recepta" required="required" class="form-control"></textarea><br />
        <textarea name="ingredients" placeholder="Vnesi sestavine recepta" required="required" class="form-control"></textarea><br />
        <input type="submit" value="Shrani" />
    </form>

<?php
include_once 'footer.php';
?>