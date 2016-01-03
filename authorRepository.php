<?php
require_once('Author.php');
require_once('EntityRepository.php');
require_once('DBConnection.php');
require('AuthorForm.php');

class AuthorRepository implements EntityRepository
{   
    public function getElementList()
    {
        $instance = DBConnection::getInstance();
        $result = $instance->getByColumns('autori',['id','cognome','nome'],'cognome');
        
        foreach($result as $element)
        {
            $author = author::fromStrings($element->values[0],$element->values[1],$element->values[2]);
            $authorList[$author->values['id']] = $author;
        }
        return $authorList;
    }
    public function getDefaultElement()
    {
        $list = $this->getElementList();
        $firstElement = array_shift(array_values($list));
        return $this->getElementById($firstElement->values['id']);
    }
    public function printModificationForm(Entity $element)
    {
        AuthorForm::printModificationForm($element);
    }
    public function printAdditionForm()
    {
        AuthorForm::printAdditionForm();
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
    public function printBox(Entity $element){
        if($element != NULL){
            $descriptor = $element->getDescriptor();
        }
        else{
            $descriptor = "Nessuno.";
        }
        
        ?>
        <div id="chosenElementBox">
           Autore scelto: <?php echo $descriptor; ?>.
        </div>
        <?php
    }
    
    public function newFromPostParameters($post) {
        return Author::fromStrings($post['id'], $post['cognome'], $post['nome'], $post['riconoscimenti'], $post['biografia_breve'], $post['biografia'], $post['img_small'], $post['img_big'], $post['sito']);
    }
    public function insert($element){
        
    }

}