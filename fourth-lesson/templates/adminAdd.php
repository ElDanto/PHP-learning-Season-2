<?php 
$authors = $data['authors'];
?>
<form action="/fourth-lesson/public/AdminHandler/Create/" method="post" class="article-wrapper">
    <input type="text" name="title" placeholder="Article title">
    <textarea name="content" placeholder="Article content"></textarea>
    <label for="author-id">Author ID</label>
    <select name="author_id" required>
        <option selected disabled>Author ID</option>
        <?php foreach ( $authors as $author ) : ?>
            <option value="<?php echo $author->id; ?>"><?php echo $author->id . ': ' . $author->name; ?></option>
        <?php endforeach; ?>
    </select>
    <input type="submit" value="Send">
</form>