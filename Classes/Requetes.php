<?php
/**
 * Created by PhpStorm.
 * User: Deniau
 * Date: 08/03/2018
 * Time: 11:34
 */

class Requetes
{
    private $dsn = "mysql:dbname=auxitec;host=localhost;charset=utf8";
    private $user = "auxitec";
    private $password = "Poseidon76*";
    private $Db;

    function __construct()
    {
        try {
            $this->Db = new PDO($this->dsn, $this->user, $this->password);
            $this->Db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            Log::logWrite($e->getMessage());
        }
    }

    function __destruct()
    {
        unset($this ->Db);
    }

    function insert($sql)
    {
        return $this->Db->exec($sql);
    }
    function select ($sql){
        return $this->Db->query($sql);
    }
    function update ($sql){
        return $this->Db->exec($sql);
    }

    function getLastId(){
        return $this->Db->lastInsertId();
    }
}