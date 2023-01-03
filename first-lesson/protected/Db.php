<?php
class Db
{
    protected $dbh;

    public function __construct()
    {
        $this->dbh = new \PDO('mysql:host=localhost; dbname=learn_php_season2.1', 'root', '');
    }
    public function query($sql, $class, $data = []){
        $sth = $this->dbh->prepare($sql);
        $sth->execute($data);
        // $data = $sth->fetchAll(PDO::FETCH_ASSOC);
        $data = $sth->fetchAll(PDO::FETCH_CLASS, $class);

        // var_dump($data);
        // die;
        // $data = $this->dbh->query($sql, PDO::FETCH_ASSOC);
        // $ret = [];
        // foreach ($data as $row) {
        //     // $obj = new $class;
        //     // var_dump($obj);
        //     // foreach ($row as $key => $val) {
        //     //     $obj->$key = $val;
        //     // }

        //     // $ret[] = $obj;
        //     // $ret[] = $row;
        // }
        // return $ret;
        return $data;
    }
    public function execute($query, $params=[])
    {
        $sth = $this->dbh->prepare($query);
        return $sth->execute($params);
    }
}
