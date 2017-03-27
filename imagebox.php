<DIV id="imagebox">
    <div style="width: auto; max-height:500px">
        <img id="outputimage" style="max-width:200px;max-height:200px;" src='img/default.jpg'/>
    </div>
    <!--<input type="file" accept="image/*" onchange="loadFile(event)">-->

<!--onchange="loadFile(event)"-->
    <input type="file" name="img_big" id="picture"  value="<?php echo $element->getImgBig()?>"/>
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
                setImage(php_script_response);
                $('#check_mark').css("visibility","visible");
                //var output = document.getElementById('outputimage');
                //output.src = URL.createObjectURL(event.target.files[0]);
                //alert(php_script_response); // display response from the PHP script, if any
            }
        });
    });
    var setImage = function(imagename) {
        var output = document.getElementById('outputimage');
        output.src = imagename;
        $('#check_mark').css("visibility","hidden");
    };
</script>