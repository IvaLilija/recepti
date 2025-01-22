<?php

include_once "session.php";
include_once "db.php";

$user_id = $_SESSION['user_id'];
$recipe_id = (int) $_POST['id'];
$content = $_POST['content'];
if (empty($content)) {
    $content = null;
}
$score = empty($_POST['score']) ? null : $_POST['score'];

//preverim da imam vsaj en podatek

if (!empty($content) || !empty($score)) {
    $sql = "INSERT INTO comments (content, score, user_id, recipe_id) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$content, $score, $user_id, $recipe_id]);

    //popravi povprecno oceno recepta (v bazi maš av_score)

    $sql = "UPDATE recipes SET avg_score=(SELECT AVG(score) FROM comments WHERE recipe_id=?) WHERE id=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$recipe_id, $recipe_id]);


}

header("Location: recipe.php?id=".$recipe_id);

