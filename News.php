<?php

use Base\News as BaseNews;

/**
 * Skeleton subclass for representing a row from the 'news' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class News extends BaseNews
{
    public static function getPathFor($filetype)
    {
        die("error: Invalid operation.");
    }

    public static function getDefaultImagePath()
    {
        return 'img/default_book.jpg';
    }
    public function getDescriptor()
    {
        return $this->getTitolo();
    }
    public static function fromPost(News &$element)
    {
        $element->setTitolo($_POST["titolo"]);
        $element->setTestoBreve($_POST["testo_breve"]);
        $element->setTesto($_POST["testo"]);
    }
}
