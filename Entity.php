<?php
interface Entity {    
    public function getDescriptor();
    public function compare($other);
}
