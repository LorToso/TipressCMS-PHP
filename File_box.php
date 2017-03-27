<?php
class Filebox
{
    public static function from($column_name, $entity_type, $file_type)
    {
        $uploadButtonID = $column_name . "_upload";
        $fileFieldID = $column_name . "_file";
        $checkMarkID = $column_name . "_checkMark";
        ?>
        <DIV>
            <input type="file" id="<?php echo $fileFieldID ?>"/>
            <input type="hidden" id="<?php echo $column_name ?>"/>
            <input type="button" id="<?php echo $uploadButtonID ?>" value="Upload"/>
            <img id="<?php echo $checkMarkID ?>" style="max-width:25px;max-height:25px;visibility: hidden"
                 src="img/check_mark.png"/>
        </DIV>
        <script>
            $('#<?php echo "$uploadButtonID"?>').on('click', function () {
                var file_data = $('#<?php echo $fileFieldID?>').prop('files')[0];
                var form_data = new FormData();
                form_data.append('file', file_data);
                form_data.append('entitytype',<?php echo $entity_type?>);
                form_data.append('filetype',<?php echo $file_type?>);
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
                        var splitIndex = php_script_response.lastIndexOf("/");
                        var path = php_script_response.substring(0, splitIndex + 1);
                        var filename = php_script_response.substring(splitIndex + 1, php_script_response.length);

                        setFile(path, filename);
                        $('#<?php echo $checkMarkID ?>').css("visibility", "visible");
                    }
                });
            });
            var setFile = function (path, filename) {
                if (!filename || 0 == filename.length) {
                    return;
                }
                var fullpath = path + filename;
                $('#<?php echo $checkMarkID ?>').css("visibility", "hidden");
                $('#<?php echo $column_name?>').val(filename);
            };
        </script>
        <?php
    }
}
?>




