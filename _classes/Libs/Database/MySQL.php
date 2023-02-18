<?php 
 namespace Libs\Database;

 use PDO;
 use PDOException;

 class MySql{
    public function __construct(
        private $dbhost = 'localhost',
        private $dbname = 'project',
        private $dbuser = 'root',
        private $dbpass = '',
        private $db = null,
    ){

    }
    public function connect(){
        try{
            $this->db = new PDO("mysql:dbhost=$this->dbhost;dbname=$this->dbname",
            $this->dbuser,$this->dbpass,[
                PDO::ATTR_ERRMODE =>PDO::ERRMODE_WARNING,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            ]);
            return $this->db;
        }catch(PDOException $e){
                return $e.getMessage();
        }
    }
 }