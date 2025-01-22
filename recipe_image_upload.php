<?php
include_once 'session.php';
$recipe_id = (int) $_POST['id'];
$target_dir = "images/";
$unique = date("YmdHis") . rand();
$target_file = $target_dir . $unique . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    $uploadOk = 0;
}

// Check if $uploadOk is set to 1
if ($uploadOk == 1) {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        //vse je ok
        include_once "db.php";
        $sql = "INSERT INTO images(url, recipe_id) VALUES (?,?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$target_file, $recipe_id]);
    }
}
header("location: recipe.php?id=".$recipe_id);
?>