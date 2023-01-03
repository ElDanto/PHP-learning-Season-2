<?php
namespace App\Models;

use App\Model;
use App\Db;

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
        return $result;
    }
}
