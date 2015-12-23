<?php

class AutocompleteBox {

    public static function printBox(array $elements, Entity $selectedElement) {
        AutocompleteBox::printDatalist($elements);
        AutocompleteBox::printForm($selectedElement);
    }
    private static function printDatalist(array $elements)
    {        
        echo "<datalist id=\"elements\">";
        foreach($elements as $a){
            echo "<option id=\"" . $a->id .  "\" value=\"" . $a->GetDescriptor(). "\"></option>";
        }
        echo "</datalist>";
    }
    private static function printForm(Entity $selectedElement)
    {
        ?>


<form method="get" action="<?php echo $_SERVER["REQUEST_URI"]; ?>" >
    Cerca:
    <script>
        function chooser(sel) {
            var value = sel.value;
            var list = $('#elements');
            var listEntry = $(list).find('option[value="' + value + '"]');
            var id = listEntry.attr('id');

            var field = document.getElementById('chosenElement');
            field.value = id;
        }
    </script>


    <input id="element" list="elements" onchange="chooser(this)" value="<?php echo $selectedElement->GetDescriptor()?>" />
    <input hidden="" id="chosenElement" name="element" value="<?php echo $selectedElement->id ?>" />
    <button type="submit" name="action" value="find">Cerca!</button>
</form>

        <?php
    }
}
?>