<?php

class DBResult 
{
    public $values = [];
    
    public function __construct($row)
    {
        $this->values = $row;
    }
}
