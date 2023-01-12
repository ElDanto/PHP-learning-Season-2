<?php 
    $news = $data['news'];
?>
<a href="/fourth-lesson/public/Admin/Add/">Add Article</a>
<table>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Content</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php foreach ($news as $article) : ?>
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
            <td><a href="/fourth-lesson/public/Admin/Edit/?id=<?php echo $article->id; ?>">Edit</a></td>
            <td><a href="/fourth-lesson/public/AdminHandler/Delete/?id=<?php echo $article->id; ?>">Delete</a></td>
        </tr>
    <?php endforeach; ?>
</table>
