<?php
class Filebox
{
    protected $uploadButtonId;
    protected $fileFieldId;
    protected $checkMarkId;

    public static function from($column_name, $content, $entity_type, $file_type)
    {
        return new Filebox($column_name,$content,$entity_type,$file_type);
    }
    protected function __construct($column_name, $content, $entity_type, $file_type)
    {
        $this->uploadButtonID = $column_name . "_upload";
        $this->fileFieldID = $column_name . "_file";
        $this->checkMarkID = $column_name . "_checkMark";

        $this->printBox($column_name, $content, $entity_type, $file_type);
    }
    protected function printBox($column_name, $content, $entity_type, $file_type)
    {
        $this->printControls($column_name,$content);
        $this->printJavaScript($column_name, $entity_type, $file_type);
    }
    protected function printControls($column_name,$content)
    {
        echo "<DIV>";
        $this->printSelectionField($column_name,$content);
        echo '<input type="file" id="' . $this->fileFieldID . '"/>';
        echo '<input type="button" id="' . $this->uploadButtonID . '" value="Upload"/>';
        echo '<img id="' . $this->checkMarkID . '" style="max-width:25px;max-height:25px;visibility: hidden" src="img/check_mark.png"/>';
        echo '</DIV>';
    }
    protected function printJavaScript($column_name, $entity_type, $file_type)
    {
        ?>
        <script>
            $('#<?php echo "$this->uploadButtonID"?>').on('click', function () {
                var file_data = $('#<?php echo $this->fileFieldID?>').prop('files')[0];
                var form_data = new FormData();
                form_data.append('file', file_data);
                form_data.append('entitytype','<?php echo $entity_type?>');
                form_data.append('filetype','<?php echo $file_type?>');
                //alert(form_data);
                $.ajax({
                    url: 'file_upload.php', // point to server-side PHP script
                    dataType: 'text',  // what to expect back from the PHP script, if anything
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    type: 'post',
                    success: function (php_script_response) {
                        <?php
                        $this->handleUploadResult($column_name);
                        ?>
                    }
                });
            });
            var setFile_<?php echo $column_name?> = function (path, filename) {
                if (!filename || 0 == filename.length) {
                    return;
                }
                var fullpath = path + filename;
                $('#<?php echo $this->checkMarkID ?>').css("visibility", "hidden");
                $('#<?php echo $column_name?>').val(filename);
            };
        </script>
        <?php
    }
    protected function handleUploadResult($column_name)
    {
        ?>
        if(php_script_response.toString().startsWith("error"))
        {
            alert(php_script_response.toString());
            return;
        }
        var splitIndex = php_script_response.lastIndexOf("/");
        var path = php_script_response.substring(0, splitIndex + 1);
        var filename = php_script_response.substring(splitIndex + 1, php_script_response.length);

        setFile_<?php echo $column_name?>(path, filename);
        $('#<?php echo $this->checkMarkID ?>').css("visibility", "visible");
        <?php
    }
    protected function printSelectionField($column_name, $content)
    {
        echo '<input type="text" id="' . $column_name .'" name="' . $column_name . '" value="' . $content . '" readonly/>';
    }
}
?>




