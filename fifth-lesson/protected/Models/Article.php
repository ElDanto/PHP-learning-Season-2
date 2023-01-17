<?php
namespace App\Models;

use App\Model;
use App\Db;
use App\Models\Author;

class Article
    extends Model
{
    protected static $table = 'news';

    public $title;
    public $content;  
    public $author_id;  

    // use \App\MagicTrait;

    public static function getLastNews(int $number = 10)
    {
        $sql = 'SELECT * FROM ' . self::$table . '  ORDER BY `id` DESC LIMIT ' . $number;
        $db = Db::instance();
        $result = $db->query($sql, static::class);
        return $result;
    }

    public function __get(string $key)
    {
        if ($key == 'author') {
            if (!empty($this->author_id)) {
                $author = Author::findById($this->author_id);
                return $author[0]->name;
            }
        }
    }

    protected function validateTitle(string $title)
    {
        $title = $title . ' 1';
        $errors = new \App\MultiException();
        if (strlen($title) <= 4) {
            $errors->add(new \App\Exceptions\NotValidatedException('Article title too short: ' . $title));
        }

        if (false !== strpos($title, '!')) {
            $errors->add(new \App\Exceptions\NotValidatedException('Invalid character for article title: ' . $title));
        }

        if (!$errors->empty()) {
            throw $errors;
        }

        return true;
    }

    protected function validateContent(string $content)
    {
        $errors = new \App\MultiException();
        if (strlen(trim($content)) <= 4) {
            $errors->add(new \App\Exceptions\NotValidatedException('Article content too short: ' . $content));
        }

        if (false !== strpos($content, '?')) {
            $errors->add(new \App\Exceptions\NotValidatedException('Invalid character for article content: ' . $content));
        }

        if (!$errors->empty()) {
           
            throw $errors;
        }

        return true;
    }
}
