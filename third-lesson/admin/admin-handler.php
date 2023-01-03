<?php 
ini_set('display_errors', '1');ini_set('display_startup_errors', '1');error_reporting(E_ALL);
require __DIR__ . '/../autoload.php';
use App\Models\Article;

if(isset($_GET['create'])){
    $article = new Article;
    $article->title = $_POST['title'];
    $article->content = $_POST['content'];
    $article->insert();
}
if(!isset($_GET['create'])){
    if(!isset($_REQUEST['id'])){
        header('Location: http://learn-php2.local/second-lesson/admin/');
        exit;
    }
    $id = $_REQUEST['id'];

    $article = Article::findById($id);
    $article = $article[0];

    if(isset($_GET['update'])){

        $article->title = $_POST['title'];
        $article->content = $_POST['content'];
        $article->save();

    }
    if(isset($_GET['delete'])){
        $article->delete();
    }
}

header('Location: http://learn-php2.local/second-lesson/admin/');
exit;