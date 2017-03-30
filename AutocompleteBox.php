<?php
require_once('DatalistManager.php');

class AutocompleteBox {

    private $boxId;
    private $datalistId;
    private $name;

    public static function of(array $elements, $name = "")
    {
        return new AutocompleteBox($elements, $name);
    }

    private function __construct(array $elements, $name)
    {
        $this->boxId = uniqid("autocomplete_edit_");
        $this->datalistId = DatalistManager::add($elements);
        $this->name = $name;
    }
    public function select($selectedElement = null)
    {
        if($selectedElement == null)
        {
            $value = "";
            $id = "";
        }
        else
        {
            $value = $selectedElement->getDescriptor();
            $id = $selectedElement->getId();
        }


        echo "<script>";
        echo "$('#" . $this->boxId . "').val('" . $value . "');";
        echo "$('#" . $this->boxId . "_chosenElement').val('" . $id . "');";
        echo"</script>";

        return $this;
    }
    public function printBox()
    {
        ?>
    <script>
        function chooser_<?php echo $this->boxId?>() {
            var autocompletebox = $('#<?php echo $this->boxId?>');
            var datalist = $('#<?php echo $this->datalistId?>');
            
            var selectedValue = autocompletebox.val();
            
            var selectedListEntry = datalist.find('option[value="' + selectedValue + '"]');
            var id = selectedListEntry.attr('id');

            var field = $('#<?php echo $this->boxId?>_chosenElement');
            field.val(id);
        }
    </script>

    <input type="text" id="<?php echo $this->boxId?>" list="<?php echo $this->datalistId?>" onchange="chooser_<?php echo $this->boxId?>()" value="" />
    <input type="hidden" id="<?php echo $this->boxId?>_chosenElement" name ="<?php echo $this->name ?>" value="" />
        <?php
        return $this;
    }
    
    public function clear()
    {
        $this->select(null);
        return $this;
    }
}