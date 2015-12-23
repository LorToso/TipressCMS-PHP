<?php
require_once('Author.php');
require_once('EntityRepository.php');
require_once('DBConnection.php');
require('AuthorForm.php');

class AuthorRepository implements EntityRepository
{
    private $authorList = [];
    
    public function getElementList()
    {
        global $authorList;
        if (count($authorList) != 0) {
            return $authorList;
        }

        $instance = DBConnection::getInstance();
        $result = $instance->getByColumns('autori',['id','cognome','nome']);
        
        foreach($result as $element)
        {
            $author = author::fromStrings($element->values[0],$element->values[1],$element->values[2]);
            $authorList[$author->id] = $author;
        }
        return $authorList;
    }
    public function getDefaultElement()
    {
        $list = $this->getElementList();
        return array_shift(array_values($list));
    }
    public function printForm($element)
    {
        AuthorForm::printForm($element);
    }
    public function getElementById($id)
    {
        $instance = DBConnection::getInstance();
        $result = $instance->getById('autori',$id);
        
        if (count($result) == 0) {
            return $this->getDefaultElement();
        }
        
        return author::fromDBResult($result[0]);
    }
}