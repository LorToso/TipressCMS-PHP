<?php
/**
 * Created by PhpStorm.
 * User: Lorenzo Toso
 * Date: 30.03.2017
 * Time: 14:47
 */
$dev = false;
if($dev)
{
    $author_image_path      = '../tipress/img/autori/';
    $author_document_path   = '../tipress/pdf/';
    $book_image_path        = '../tipress/img/libri/';
    $book_document_path     = '../tipress/pdf/';
    $client_image_path      = '../tipress/img/clienti/';
    $client_document_path   = '../tipress/pdf/';
}
else
{
    $author_image_path      = '../img/autori/';
    $author_document_path   = '../pdf/';
    $book_image_path        = '../img/libri/';
    $book_document_path     = '../pdf/';
    $client_image_path      = '../img/clienti/';
    $client_document_path   = '../pdf/';
}

