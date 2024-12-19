<html>
<head>
    <title>Recepti</title>
</head>
<body>
<h1>Kraji</h1>
<a href="city_add.php">DODAJ KRAJ</a>
<ul>
    <?php
    include_once "db.php";
    $sql = "SELECT * FROM `cities`";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    while ($row = $stmt->fetch()) {
        echo "<li>" . $row['title'] . "</li>";
    }
    ?>

</ul>
</body>
</html>
