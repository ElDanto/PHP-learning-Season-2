<?php 
ini_set('display_errors', '1');ini_set('display_startup_errors', '1');error_reporting(E_ALL);
require __DIR__ . '/autoload.php';
use App\Models\Product;
use App\Models\Article;

$config = App\Config::instance();

$news = Article::getLastNews(3);

$user = new App\Models\User;
$user->email = 'test@test.test';
$user->password = '1234567';
// $user->insert();
// var_dump($user);
// var_dump($user->update(21));

foreach($news as $article){
    // $article->title .= $article->id;
    // $article->save();
    // $article->delete();
    include __DIR__ . '/news-template.php';
}

// $test = new Article;
//     $test->title = 'test';
//     $test->content = 'TestContent';
// var_dump($test);
// $test->save();

// $testUser = App\Models\User::findById(21);
// $tempUser = $testUser[0];
// $tempUser->delete();


if(isset($_GET['create-art'])){
$article = new Article;
$args = [
    ':title' => 'Заголовок',
    ':content' => 'Контент',
];
$res = $article->create($args);
}
