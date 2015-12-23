<?php 
require 'AutocompleteBox.php'; 

class Searchbox
{
    public static function printSearchbox(array $elements, Entity $selectedElement) 
    {
?>

<form method="get" action="<?php echo $_SERVER["REQUEST_URI"]; ?>" >
    <div id="autocompletebox">
        Cerca:
        <input hidden="" id="chosenElement" name="element" value="<?php echo $selectedElement->id ?>" />
        <?php AutocompleteBox::printBox($elements, $selectedElement); ?>
        <button type="submit" name="action" value="find">Cerca!</button>
        <button type="submit" name="action" value="new">Nuovo!</button>
    </div>
    
<br>
<br>
</form>
                
<?php
    }
}

