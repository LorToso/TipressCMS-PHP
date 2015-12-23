<?php
require_once('author.php');
require_once('EntityRepository.php');
require_once('DBConnection.php');
include('authorForm.php');

class authorRepository implements EntityRepository
{
    private $authorList = [];
        //1 => author::fromStrings(1,'Toso','Lorenzo', 'riconoscimento','bio_breve','bio','im_small','im_big','sito'),
        //2 => author::fromStrings(2,'Toso','Roberto'),
        //3 => author::fromStrings(3,'Eingrieber','Monika'),
        //4 => author::fromStrings(4,'Eingrieber-Toso','Anna-Láura'),
        //1005 => author::fromStrings(1005,'Berst','Sasha'),
    
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
    public function PrintForm($element)
    {
        PrintAuthorForm($element);
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


?>