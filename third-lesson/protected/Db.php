<?php
namespace App;
class Db
{
    protected $dbh;

    public function __construct()
    {
        $config = \App\Config::instance();
        $dbs = 'mysql:host=' . $config->data['db']['host'] . '; dbname=' . $config->data['db']['dbname']; 
        $this->dbh = new \PDO($dbs, $config->data['db']['dbuser'], $config->data['db']['dbpass']);
        // $this->dbh = new \PDO('mysql:host=localhost; dbname=learn_php_season2.1', 'root', '');
    }
    public function query($sql, $class, $data = []){
        $sth = $this->dbh->prepare($sql);
        $sth->execute($data);

        $data = $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        
        return $data;
    }
    public function execute($query, $params=[])
    {
        $sth = $this->dbh->prepare($query);
        return $sth->execute($params);
    }
    public function lastInsertId()
    {
        $data = $this->dbh->lastInsertId();
        return $data; 
    }
}
