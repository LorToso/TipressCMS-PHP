<?php

/**
 * DBConnection short summary.
 *
 * DBConnection description.
 *
 * @version 1.0
 * @author tk4990
 */
class DBConnection
{
    private static $instance;
    private $mysqli;

    public static function getInstance()
    {
        if(!self::$instance)
            self::$instance = new DBConnection();
        return self::$instance;
    }
    function __construct()
    {
        $this->mysqli = new mysqli(test);
        if($this->mysqli.connect_errno)
        {
            printf("Connect failed: %s\n", $this->mysqli.connect_errno);
            exit();
        }
    }
    public function getById(string $table, int $id)
    {
        $query = 'SELECT * FROM ' . $table . ' WHERE Id=?';
        $stmt = $this->mysqli->prepare($query);
        $stmt->bind_param("i",$id);
        
        $stmt->execute();
        $stmt->bind_result($
    }
}
