<?php

/**
 * EntityRepository short summary.
 *
 * EntityRepository description.
 *
 * @version 1.0
 * @author tk4990
 */
interface EntityRepository
{
    public function getElementList();
    public function getDefaultElement();
    public function getElementById($id);
    public function PrintForm($element);
}
