<?php 
$article = $data['article'][0];
?>
<h1><?php echo $article->title;?></h1>
<div class="content">
    <?php echo $article->content; ?>
</div>

<span>Автор: <?php echo $article->author; ?></span>