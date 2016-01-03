<?php

class AutocompleteBox {

    public static function printBox(array $elements, Entity $selectedElement) {
        AutocompleteBox::printDatalist($elements);
        AutocompleteBox::printListEdit($selectedElement);
    }
    private static function printDatalist(array $elements)
    {        
        echo "<datalist id=\"elements\">";
        foreach($elements as $a){
            echo "<option id=\"" . $a->values['id'] .  "\" value=\"" . $a->getDescriptor(). "\"></option>";
        }
        echo "</datalist>";
    }
    private static function printListEdit(Entity $selectedElement)
    {
        ?>
    <script>
        function chooser(sel) {
            var value = sel.value;
            var list = $('#elements');
            var listEntry = $(list).find('option[value="' + value + '"]');
            var id = listEntry.attr('id');

            var field = $('#chosenElement');
            field.value = id;
        }
        function clearAutocompleteBox(){
            var autocompletebox = $('#element');
            autocompletebox.val('');
        }
    </script>

    <input id="element" list="elements" onchange="chooser(this)" value="<?php echo $selectedElement->GetDescriptor()?>" />
        <?php
    }
    
    public static function clear()
    {
        ?>
        <script> 
            clearAutocompleteBox(); 
        </script>
        <?php
    }
}