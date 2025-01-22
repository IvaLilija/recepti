<?php
include_once "header.php";
?>
    <h1>Dodaj kategorijo</h1>
    <form action="category_insert.php" method="post">
        <input type="text" name="title" placeholder="Vnesi ime kategorije" class="form-control" required="required" /><br />
        <textarea name="description" placeholder="Vnesi opis kategorije" class="form-control"></textarea><br />
        <input type="submit" value="Shrani" />
    </form>
<?php
include_once "footer.php";
?>