<?php 
    use App\Models\Article;
    $articles = Article::findAll();
?>
<a href="admin-add-article.php">Add Article</a>
<table>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Content</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php foreach ($articles as $article) : ?>
        <?php
            $content = '';
            $tempContent = $article->content;
            if(!empty($tempContent)){
                $content = substr($tempContent, 0, 200) . '...';
            }
        ?>
        <tr>
            <td><?php echo $article->id; ?></td>
            <td><?php echo $article->title; ?></td>
            <td><?php echo $content; ?></td>
            <td><a href="admin-edit-article.php?id=<?php echo $article->id; ?>">Edit</a></td>
            <td><a href="admin-handler.php?id=<?php echo $article->id; ?>&&delete=true">Delete</a></td>
        </tr>
    <?php endforeach; ?>
</table>
