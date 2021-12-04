<?php 
require_once __DIR__ . '/protected/Db.php';
require __DIR__ . '/protected/Models/Article.php';
$article = Article::findById($_GET['id']);
// var_dump($article);
$article = $article[0];
?>
<h1><?php echo $article->title;?></h1>
<div class="content">
    <?php echo $article->content; ?>
</div>