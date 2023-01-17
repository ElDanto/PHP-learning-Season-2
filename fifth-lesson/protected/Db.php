<?php

namespace App;

use App\Singleton;

class Db
    extends Singleton
{
    protected $dbh;

    protected function __construct()
    {
        $config =  new  \App\Config();
        $dbs = 'mysql:host=' . $config->data['db']['host'] . '; dbname=' . $config->data['db']['dbname']; 
        
        try {
            $this->dbh = new \PDO($dbs, $config->data['db']['dbuser'], $config->data['db']['dbpass']);
        } catch (\PDOException  $e) {
            throw new \App\Exceptions\DbConnectionException('Error establishing a DB connection. ' . $_SERVER["REQUEST_URI"]);
        }
        
        // $config =  \App\Config::instance();
        // $dbs = 'mysql:host=' . $config->data['db']['host'] . '; dbname=' . $config->data['db']['dbname']; 
        // $this->dbh = new \PDO($dbs, $config->data['db']['dbuser'], $config->data['db']['dbpass']);
        // $this->dbh = new \PDO('mysql:host=localhost; dbname=learn_php_season2.1', 'root', '');
    }


    public function query($sql, $class, $data = []){
        try{
            $sth = $this->dbh->prepare($sql);
            $sth->execute($data);
            $data = $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        } catch (\PDOException $e) {
            throw new App\Exceptions\DbQueryException('SQL query execution error: ' . $sql . ', ' . $data . ', ' . $e->getMessage());
        }
        
        return $data;
    }
    public function execute($query, $params=[])
    {
        try{
            $sth = $this->dbh->prepare($query);
            return $sth->execute($params);
        } catch (\PDOException $e) {
            throw new App\Exceptions\DbQueryException('SQL query execution error: ' . $sql . ', ' . $params . ', ' . $e->getMessage());
        }
    }
    public function lastInsertId()
    {
        $data = $this->dbh->lastInsertId();
        return $data; 
    }
}
