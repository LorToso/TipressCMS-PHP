<?php

class AutocompleteBox {

    public static function printBox(array $elements, $selectedElement) {
        AutocompleteBox::printDatalist($elements);
        AutocompleteBox::printListEdit($selectedElement);
    }
    private static function printDatalist(array $elements)
    {        
        echo '<datalist id="elementDataList">';
        foreach($elements as $a){
            echo '<option id="' . $a->getId() .  '" value="' . $a->getDescriptor(). '"></option>';
        }
        echo "</datalist>";
    }
    private static function printListEdit($selectedElement)
    {
        ?>
    <script>
        function chooser() {
            var a = $("#autocompleteboxEdit");
            
            var autocompletebox = $('#autocompleteboxEdit');
            var datalist = $('#elementDataList');
            
            var selectedValue = autocompletebox.val();
            
            var selectedListEntry = datalist.find('option[value="' + selectedValue + '"]');
            var id = selectedListEntry.attr('id');

            var field = $('#chosenElement');
            field.val(id);
        }
        function clearAutocompleteBox(){
            var autocompletebox = $('#autocompleteboxEdit');
            autocompletebox.val('');
        }
    </script>

    <input id="autocompleteboxEdit" list="elementDataList" onchange="chooser()" value="<?php echo $selectedElement->getDescriptor(); ?>" />
    <input type="hidden" id="chosenElement" name="id" value="<?php echo $selectedElement->getId(); ?>" />
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