<?php
include_once 'header.php';
include_once 'db.php';

$id = $_GET['id'];
$sql = "SELECT * FROM recipes WHERE id=?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

$row = $stmt->fetch();

?>

    <h1>Uredi recept</h1>
    <form action="recipe_update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>" />
        <input type="text" name="title" value="<?php echo $row['title']; ?>" placeholder="Vnesi naslov recepta" required="required" class="form-control" /><br />
        <select name="category_id" required="required" class="form-control">
            <?php

            $sql = "SELECT * FROM categories";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            while ($row2 = $stmt->fetch()) {
                if ($row2['id']!=$row['category_id'])
                    echo '<option value="'.$row2['id'].'">'.$row2['title'].'</option>';
                else
                    echo '<option value="'.$row['id'].'" selected="selected">'.$row2['title'].'</option>';
            }
            ?>
        </select> <br />
        <textarea name="description" placeholder="Vnesi opis recepta" required="required" class="form-control"><?php echo $row['description']; ?></textarea><br />
        <input type="text" name="duration" value="<?php echo $row['duration']; ?>" placeholder="Vnesi čas priprave (min)" class="form-control" /><br />
        <input type="number" name="level" min="1" max="5" value="<?php echo $row['level']; ?>" placeholder="Vnesi zahtevnost recepta" class="form-control" /><br />
        <input type="number" name="number_of_people" min="1" max="20" value="<?php echo $row['number_of_people']; ?>" placeholder="Vnesi število oseb" class="form-control" /><br />
        <textarea name="proceedings" placeholder="Vnesi postopek recepta" required="required" class="form-control"><?php echo $row['proceedings']; ?></textarea><br />
        <textarea name="ingredients" placeholder="Vnesi sestavine recepta" required="required" class="form-control"><?php echo $row['ingredients']; ?></textarea><br />
        <input type="submit" value="Shrani" />
    </form>

<?php
include_once 'footer.php';
?>