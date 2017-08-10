<?php
declare(strict_types=1);

namespace Framework\Core;

use Framework\Database\DatabaseManager;

class Model
{
	public $db;

    public function __construct()
    {}

    public function save() : int 
    {

    	$obj = (array) $this;
    	$table = $obj['table']; 

        unset($obj['db']);
    	unset($obj['table']);
        unset($obj['id']);

        $params = $this->prepareParams($obj);
        $db = new DatabaseManager();

    	return $db->execute("INSERT INTO $table (`first_name`,`last_name`,`email`, `username`, `password`) 
            VALUES (:first_name, :last_name, :email, :username, :password)",$params);
    }

    public function fetchAll(string $table) : array
    {
    	$db = new DatabaseManager();
    	return $db->fetchAll("SELECT * from $table",[]);
    }

    public function fetchOne(int $id) : array 
    {
    	$db = new DatabaseManager();
    	$params = ['id' => $id];
    	return $db->fetchOne("SELECT * from users where id=:id",$params);
    }

    public function update() : int 
    {
    	$obj = (array) $this;

    	$table = $obj['table'];
    	$params = $this->prepareParams($obj);
    	$db = new DatabaseManager();
    	return $db->execute("UPDATE $table SET first_name = :first_name, last_name = :last_name, 
            email = :email, username = :username, password = :password 
            WHERE id=:id", $params);
    }

    public function delete(int $id) : int 
    {
        $params = ['id' => $id];
        $db = new DatabaseManager();
        return $db->execute("DELETE FROM users WHERE id = :id", $params);
    }

    public function prepareParams($obj)
    {
    	unset($obj['db']);
    	unset($obj['table']);

    	$params = [];

    	foreach ($obj as $key => $value) {
    		//change from camelcase to underscore
    		$newkey = strtolower(preg_replace('/([^A-Z])([A-Z])/', "$1_$2", $key)); 
    		$params[$newkey] = $value;
    	}

        return $params;
    }
}