<?php
require_once('Connection.php');
require_once('DBResult.php');

class DBConnection
{
    protected static $_instance = null;
    private $mysqli;
    
    public static function getInstance()
    {
        if (null === self::$_instance)
        {
            self::$_instance = new self;
            self::$_instance->connect();
        }
        return self::$_instance;
    }
    protected function __clone() {}
    protected function __construct() {}
    public function connect()
    {
        global $hostname_conn;
        global $username_conn;
        global $password_conn;
        global $database_conn;
        $this->mysqli = new mysqli($hostname_conn, $username_conn, $password_conn, $database_conn);
        if ($this->mysqli->connect_error) 
        {
            die('Connect Error (' . $this->mysqli->connect_errno . ') ' . $this->mysqli->connect_error);
        }
        $this->setUtf8();
    }
    public function getById($table, $id)
    {
        $query = 'SELECT * FROM ' . $table . ' WHERE Id=?';
        $stmt = $this->mysqli->prepare($query);
        $stmt->bind_param("i",$id);
        
        $stmt->execute();
        $result = $stmt->get_result();
        
        return $this->generateResultArray($result);
    }
    public function getByColumns($table, $columnArray)
    {
        $queryString = 'SELECT ';
        foreach ($columnArray as $column) {
            $queryString = $queryString . $column . ', ';
        }
        $queryString = substr($queryString, 0, strlen($queryString)-2);
        $queryString = $queryString . ' FROM ' . $table;
        
        $stmt = $this->mysqli->prepare($queryString);
        
        $stmt->execute();
        $result = $stmt->get_result();
        
        return $this->generateResultArray($result);
    }
    public function generateResultArray($sqlResult)
    {
        $resultElements = [];
        while ($row = $sqlResult->fetch_array(MYSQLI_NUM))
        {
            $element = new DBResult($row);
            array_push($resultElements, $element);
        }
                
        return $resultElements;
    }
    private function setUtf8()
    {
        if (!$this->mysqli->set_charset("utf8")) {
            printf("Error loading character set utf8: %s\n", $mysqli->error);
            exit();
        }
    }
}
