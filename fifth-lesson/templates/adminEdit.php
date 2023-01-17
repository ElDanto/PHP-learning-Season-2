<?php
$article = $data['article'][0];
$authors = $data['authors']
?>

<form action="/fifth-lesson/public/AdminHandler/Update/?id=<?php echo $article->id; ?>" method="post" class="article-wrapper">
    <input type="text" name="title" value="<?php echo $article->title;?>">
    <textarea name="content"><?php echo $article->content; ?></textarea>
    <label for="author-id">Author ID</label>
    <select name="author_id">
        <option selected value="<?php echo $article->author_id; ?>"><?php echo $article->author_id . ': ' . $article->author; ?></option>
        <?php foreach ($authors as $author) : ?>
            <?php 
                if ($author->id == $article->author_id) {
                    continue;
                }
            ?>
            <option value="<?php echo $author->id; ?>"><?php echo $author->id . ': ' . $author->name; ?></option>
        <?php endforeach; ?>
    </select>
    <input type="submit" value="Send">
</form>
