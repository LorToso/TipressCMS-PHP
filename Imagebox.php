<?php

/**
 * Created by PhpStorm.
 * User: Lorenzo Toso
 * Date: 28.03.2017
 * Time: 21:28
 */
class Imagebox extends Filebox
{
    private $imageId;
    protected function __construct($column_name,$content,$entity_type)
    {
        $this->imageId = uniqid("image_box_");
        parent::__construct($column_name,$content,$entity_type,'Image');
    }

    public static function from($column_name, $content, $entity_type, $file_type = "")
    {
        return new Imagebox($column_name,$content,$entity_type);
    }
    protected function printSelectionField($column_name, $content)
    {
        echo '<input type="hidden" id="' . $column_name .'" name="' . $column_name . '" value="' . $content . '" readonly/>';
    }
    protected function printBox($column_name, $content, $entity_type)
    {
        echo "<DIV style='text-align: center'>";
        $this->printImageBox($entity_type::getDefaultImagePath());
        $this->setImage($entity_type, $content);
        parent::printBox($column_name, $content, $entity_type,"image");
        echo '</DIV>';
    }
    private function printImageBox($defaultImage)
    {
        echo '<div style="width: auto; max-height:500px">';
        echo '<img id="' . $this->imageId . '" style="max-width:200px;max-height:200px;" src="' . $defaultImage . '"/>';
        echo '</div>';
    }

    public function setImage($entity_type, $content)
    {
        if($content != null && $content != "")
        {
            $path = $entity_type::getPathFor('Image');
            $p = $path . $content;
            if(file_exists($p))
            {
                echo "<script>$('#" . $this->imageId . "').attr('src','" . $p . "')</script>";
            }
        }
    }
}