<?php
namespace App\Models;

use App\Model;
use App\Db;
use App\Models\Author;

class Article
    extends Model
{

    //Переписать с магией $data
    protected static $table = 'news';
    public $title;
    public $content;  
    public $author_id;   

    public static function getLastNews(int $number = 10)
    {
        $sql = 'SELECT * FROM ' . self::$table . '  ORDER BY `id` DESC LIMIT ' . $number;
        $db = new Db();
        $result = $db->query($sql, static::class);
        return $result;
    }

    public function __get( string $key )
    {
        if ($key == 'author') {
            if ( !empty( $this->author_id ) ) {
                $author = Author::findById( $this->author_id );
                return $author[0]->name;
            }
        }
    }
}
