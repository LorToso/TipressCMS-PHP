<DIV id="imagebox">
    <div style="width: auto; max-height:500px">
        <img id="outputimage" style="max-width:200px;max-height:200px;" src='img/default.jpg'/>
    </div>
    <!--<input type="file" accept="image/*" onchange="loadFile(event)">-->

<!--onchange="loadFile(event)"-->
    <input type="file" id="picture"/>
    <input type="hidden" name="img_big" id="img_name"/>
    <input type="button" id="upload" value="Upload"/>
    <img id="check_mark" style="max-width:25px;max-height:25px;visibility: hidden" src="img/check_mark.png"/>
</DIV>



<script>
    $('#upload').on('click', function() {
        var file_data = $('#picture').prop('files')[0];
        var form_data = new FormData();
        form_data.append('file', file_data);
        //alert(form_data);
        $.ajax({
            url: 'file_upload.php', // point to server-side PHP script
            dataType: 'text',  // what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function(php_script_response){
                var splitIndex = php_script_response.lastIndexOf("/");
                var path = php_script_response.substring(0,splitIndex+1);
                var filename = php_script_response.substring(splitIndex+1,php_script_response.length);

                setImage(path, filename);
                $('#check_mark').css("visibility","visible");
            }
        });
    });
    var setImage = function(path, filename) {
        if(!filename || 0 == filename.length)
        {
            return;
        }
        var fullpath = path + filename;
        $('#outputimage').attr("src",fullpath);
        $('#check_mark').css("visibility","hidden");
        $('#img_name').val(filename);
    };
</script>