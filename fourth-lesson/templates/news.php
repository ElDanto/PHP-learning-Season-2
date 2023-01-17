<?php
$data = $data['news'];
?>
    <h1>News</h1>
<?php foreach ($data as $article): ?>
    <a href="One/?id=<?php echo $article->id;?>">
        <h1><?php echo $article->title;?></h1>
    </a>
    <div class="content">
        <?php echo $article->content; ?>
    </div>
    <span>Автор: <?php echo $article->author; ?></span>
<?php endforeach; ?>