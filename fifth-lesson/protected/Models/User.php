<?php

namespace App\Models;

use App\Model;
use App\Db;

class User
    extends Model
{
    protected static $table = 'users';
    public $email;
    public $password;

    public static function findByEmail(string $email)
    {
        $sql = 'SELECT * FROM ' . self::$table . ' WHERE email LIKE \'' . $email . '\'';
        $db = Db::instance();
        $result = $db->query($sql, '\App\Models\User');

        if (!empty($result)) {
            return $result;
        } 
        return false;
    }
}