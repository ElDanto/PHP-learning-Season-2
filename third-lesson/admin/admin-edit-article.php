<?php
ini_set('display_errors', '1');ini_set('display_startup_errors', '1');error_reporting(E_ALL);
require __DIR__ . '/../autoload.php';
use App\Models\Article;

if(!isset($_GET['id'])){
    header('Location: http://learn-php2.local/second-lesson/admin/');
    exit;
}
$id = $_GET['id'];

$article = Article::findById($id);
$article = $article[0];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Edit Article</title>
</head>
<body>
    <form action="admin-handler.php?update" method="post" class="article-wrapper">
        <input type="hidden" name="id" value="<?php echo $article->id; ?>">
        <input type="text" name="title" value="<?php echo $article->title;?>">
        <textarea name="content"><?php echo $article->content; ?></textarea>
        <input type="submit" value="Send">
    </form>
</body>
</html>