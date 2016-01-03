<?php 
require 'AutocompleteBox.php'; 

class Searchbox
{
    public static function printSearchbox(array $elements, Entity $selectedElement) 
    {
?>

<form method="get" action="<?php echo self::getCurrentURL() ?>" >
    <div id="autocompletebox">
        Cerca:
        <?php AutocompleteBox::printBox($elements, $selectedElement);?>
        
        <input type="hidden" id="chosenElement" name="element" value="<?php echo $selectedElement->values['id']; ?>" />
        <button type="submit" value="find">Cerca!</button>
        oppure: <button type="submit" name="action" value="createnew">Nuovo!</button>
    </div>
    
<br>
<br>
</form>
                
<?php
    }
    private static function getCurrentURL()
    {
        return filter_input(INPUT_SERVER, 'REQUEST_URI');
    }
    public static function clear()
    {
        AutocompleteBox::clear();
    }
}

