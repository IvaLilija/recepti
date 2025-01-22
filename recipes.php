<?php
include_once 'header.php';
include_once 'db.php';
?>

    <h1>Pregled receptov</h1>

    <a href="recipe_add.php">Dodaj recept</a> <br />

    <ul>
        <?php
        $sql = "SELECT r.id, r.title AS recipe, c.title AS category 
    FROM recipes r INNER JOIN categories c ON c.id=r.category_id ORDER BY r.title";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        while ($row = $stmt->fetch()) {
            echo '<li>';
            echo '<a href="recipe.php?id='.$row['id'].'">';
            echo $row['recipe'].' ('.$row['category'].')';
            echo '</a>';
            echo ' <a href="recipe_delete.php?id='.$row['id'].'">(x)</a>';
            echo ' <a href="recipe_edit.php?id='.$row['id'].'">(u)</a>';
            echo '</li>';
        }
        ?>
    </ul>

<?php
include_once 'footer.php';
?>