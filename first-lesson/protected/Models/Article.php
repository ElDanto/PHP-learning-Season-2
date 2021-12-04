<?php
require_once __DIR__ . '/../Model.php';

class Article
    extends Model
{
    protected static $table = 'news';
    public $title;
    public $content;  

    public static function getLastNews(int $number = 10)
    {
        $sql = 'SELECT * FROM ' . self::$table . '  ORDER BY `id` DESC LIMIT ' . $number;
        $db = new Db();
        $result = $db->query($sql, static::class);
        // var_dump($result);
        return $result;
    }
}
