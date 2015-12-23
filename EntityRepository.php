<?php
interface EntityRepository
{
    public function getElementList();
    public function getDefaultElement();
    public function getElementById($id);
    public function printForm($element);
}
