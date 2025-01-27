<?php
include_once "header.php";
?>
    <h1>Kraji</h1>
<?php
if (isAdmin()) {
    echo '<a href="city_add.php">Dodaj kraj</a>';
}
?>
    <ul>
        <?php
        include_once "db.php";
        $sql = "SELECT * FROM cities";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        while ($row = $stmt->fetch()) {
            echo '<li>'.$row['title'];
            if (isAdmin()) {
                echo ' <a href="city_delete.php?id=' . $row['id'] . '" onclick="return confirm(\'Prepričani?\')">(x)</a>';
                echo ' <a href="city_edit.php?id=' . $row['id'] . '">(u)</a>';
            }
            echo '</li>';
        }
        ?>
    </ul>
<?php
include_once "footer.php";
?>