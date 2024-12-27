<?php
include_once 'db.php';
$id = $_GET['id'];
$sql = "SELECT * FROM cities WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

$row = $stmt->fetch();
?>
<?php
include_once "header.php";
?>

<h1>Uredi kraj</h1>
<form action="city_update.php" method="post">
    <input type="hidden" name="id" value="<?php echo $row['id'];?>">
    Vnesi kraj: <input type="text" name="title" value="<?php echo $row['title'];?>" /> <br />
    Vnesi poštno številko: <input type="text" name="post_number" value="<?php echo $row['post_number'];?>" /><br />
    <input type="submit" value="Shrani" />
</form>

<?php
include_once "footer.php";
?>
