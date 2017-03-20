<?php 
require 'AutocompleteBox.php'; 

class Searchbox
{
    public static function printSearchbox(array $elements, $selectedElement)
    {
?>

<form method="get" action="<?php echo filter_input(INPUT_SERVER, 'REQUEST_URI'); ?>" >
    <div id="autocompletebox">
        Cerca:
        <?php AutocompleteBox::printBox($elements, $selectedElement);?>
        
        <button type="submit" name="action" value="find">Cerca!</button>
        oppure: <button type="submit" name="action" value="createnew">Nuovo!</button>
    </div>
</form>    
<br>
<br>
                
<?php
    }
    public static function clear()
    {
        AutocompleteBox::clear();
    }
}
