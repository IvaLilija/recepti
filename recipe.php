<?php
include_once 'header.php';
include_once 'db.php';

$id = (int) $_GET['id'];

$sql = "SELECT r.*, c.title AS category, u.first_name, u.last_name 
FROM users u INNER JOIN recipes r ON r.user_id = u.id INNER JOIN categories c ON c.id=r.category_id
WHERE r.id=?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

$row = $stmt->fetch();
?>

    <h1>Pregled recepta</h1>

    <div id="recpet">
        <div id="ime_recepta"><?php echo $row['title'];?></div>
        <div id="kategorija"><?php echo $row['category'];?></div>
        <div id="slike">
            <?php
            $sql = "SELECT * FROM images WHERE recipe_id = ? ORDER BY date_add";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id]);

            while ($image = $stmt->fetch()) {
                echo '<div class="slika"><img src="'.$image['url'].'" alt="" width="100px"/></div>';
            }

            ?>
        </div>
        <form action="recipe_image_upload.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <input type="file" name="fileToUpload" required="required" placeholder="Naloži sliko recepta" />
            <input type="submit" name="submit" value="Naloži" />
        </form>
        <div id="opis_recepta"><?php echo $row['description'];?></div>
        <div id="podrobnosti">
            <div id="postopek"><?php echo $row['proceedings'];?></div>
            <div id="sestavine"><?php echo $row['ingredients'];?></div>
        </div>
        <div id="trajanje">
            <div id="cas"><?php echo $row['duration'];?> min</div>
            <div id="zahtevnost"><?php echo $row['level'];?></div>
        </div>
    </div>
    <hr />
    <div id="komentarji">
        <div class="oddaja">
            <form action="recipe_comment.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id;?>">
                <input type="text" placeholder="Vnesi komentar recepta", name="content" class="form-control" /><br />
                <input type="number" min="1" max="5" name="score" placeholder="Vnesi oceno recepta" class="form-control"/> <br />
                <input type="submit" name="submit" value="Naloži" /> <input type="reset" value="Prekliči" />
            </form>
        </div>
        <br />
        <div class="izpis">
            <?php
            $sql = "SELECT c.*, u.first_name, u.last_name FROM comments c INNER JOIN users u ON u.id=c.user_id WHERE recipe_id=?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id]);

            while($row = $stmt->fetch()) {
                echo '<div class="komentar">';
                echo '<div class="oseba">'.$row['first_name'].' '.$row['last_name'].' ('.$row['date_add'].')</div>';
                echo '<div class="ocena">'.$row['score'].'</div>';
                echo '<div class="vsebina">'.$row['content'].'</div>';
                //preverim ali je trenutno prijavljen uporabnik napisal ta komentar
                if ($_SESSION['user_id'] == $row['user_id']) {
                    echo '<div class="akcija"><a href="comment_delete.php?id='.$row['id'].'" onclick="return confirm(\'Prepričan?\')">X</a></div>';
                }
                echo '</div>';
            }

            ?>

        </div>
    </div>

<?php
include_once 'footer.php';
?>