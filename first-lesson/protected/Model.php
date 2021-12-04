<?php
abstract class Model
{
    protected static $table = null;
    public $id;

    public static function findAll()
    {
        $sql = 'SELECT * FROM ' . static::$table;
        $db = new Db();
        return $db->query($sql, static::class);
    }
    public static function findById($id)
    {
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=' . $id;
        $db = new Db();
        $result = $db->query($sql, static::class);
        if (!empty($result)) {
            return $result;
        } else {
            return false;
        }
        
    }
    public function create(array $request)
    {
        $sql = 'INSERT INTO ' . static::$table . ' (`title`, `content`) VALUES (:title , :content)';
        $db = new Db();
        $result = $db->execute($sql, $request);
        var_dump($sql);
        var_dump($request);
        return $result;
    }
}