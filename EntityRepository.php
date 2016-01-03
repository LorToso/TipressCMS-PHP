<?php
require_once 'Entity.php';

interface EntityRepository
{
    public function getElementList();
    public function getDefaultElement();
    public function getElementById($id);
    public function newFromPostParameters($post);
    
    
    public function printModificationForm(Entity $element);
    public function printAdditionForm();
}
