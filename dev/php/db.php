<?php

class DB {

    private $dbHost     = 'localhost';
    private $dbUsername = 'distrit1_admin';
    private $dbPassword = 'afdk79plw85w';
    private $dbName     = 'distrit1_teste';
    public $db;

    public function insert($table,$data){
        mysql_connect($dbHost, $dbUsername, $dbPassword);
        mysql_select_db($dbName);
        mysql_query("INSERT INTO ".$table." VALUES (".$data.")");
    }

}

?>
