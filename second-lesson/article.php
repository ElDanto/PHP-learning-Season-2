<?php 
require __DIR__ . '/autoload.php';
use App\Models\Article;

$article = Article::findById($_GET['id']);
$article = $article[0];
?>
<h1><?php echo $article->title;?></h1>
<div class="content">
    <?php echo $article->content; ?>
</div>