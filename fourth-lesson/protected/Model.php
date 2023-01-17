<?php
namespace App;
use App\Db;
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
        return $result;
    }

    public function insert()
    {
        $db = new Db();

        $data = get_object_vars($this);

        $bindings = [];
        $columns = []; 
        $values = [];

        foreach($data as $key => $value){
            if($key == 'id'){
                continue;
            }
            $columns[] = $key;
            $bindings[] = ':'. $key;
            $values[':'. $key] = $value;
        }

        $sql = 'INSERT INTO ' . static::$table . 
        ' ('. implode(',', $columns) .') 
        VALUES ('.implode(',',$bindings).')';

        $result = $db->execute($sql, $values);
        
        if ($result) {
            $this->id = $db->lastInsertId();
            return $result;
        } else {
            return $result;
        } 
        

    }

    public function update($id)
    {

        $db = new Db();

        $data = get_object_vars($this);

        $bindings = [];
        $values = [];

        foreach($data as $key => $value){
            if($key == 'id'){
                continue;
            }
            $bindings[] = '`' . $key . '`= :' . $key;  
            $values[':'. $key] = $value;
        }
        $values[':id'] = $id;

        $sql = 'UPDATE ' . static::$table . '
                SET ' . implode(',',$bindings) . ' 
                WHERE `id` = :id';

        return $db->execute($sql, $values);     

    }

    public function save()
    {
        $id = $this->id;
        if(!empty($id)){
            return $this->update($id);
        }else{
            return $this->insert();
        }
    }

    public function delete($id = '')
    {
        $db = new Db();

        if(empty($id)){
            $id = $this->id;
        }

        $sql = 'DELETE 
                FROM ' . static::$table . 
              ' WHERE `id`=:id';
        $args = [
            ':id' => $id
        ];
        return $db->execute($sql, $args); 
    }
}