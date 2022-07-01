<?php require_once('connection.php');?>

<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Imalka Cake Creations - Admin Panel</title>
    <meta name="description" content="Ajax Multiple Image Uploader">
    <meta name="author" content="tharindulucky">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" href="dist/css/styles.css">
    <link rel="stylesheet" href="dist/css/upload_product.css">

    <!-- Latest compiled JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- These are the necessary files for the image uploader -->
    <script src="dist/assets/jquery-file-upload/js/vendor/jquery.ui.widget.js"></script>
    <script src="dist/assets/jquery-file-upload/js/jquery.iframe-transport.js"></script>
    <script src="dist/assets/jquery-file-upload/js/jquery.fileupload.js"></script>
</head>

<body>

<div class="container" style="background: #ffeeee; width: 1000px;">
        <div class="imagelogo">
        <img src="../image/underline.svg" alt="" width="250">
        </div>
      <h2 class="text-center" style="color: #c45555; font-weight: bold; font-size: 30px;">Add New Product</h2>
        <!-- <h3>Update Product Details</h3> -->
        <hr style="height:10px; background-color: #c45555">
        <br>


                        <!-- This area will show the uploaded files -->
                        <!-- <div class="row">
                            <div id="uploaded_images">

                            </div>
                        </div>

                        <br>
                        <br>

                        <div id="select_file">
                            <div class="form-group">
                                <label class="subtopic">Upload Image</label>
                            </div>
                            <div class="form-group">
                                The fileinput-button span is used to style the file input field as button -->
                                <!-- <span class="btn btn-success fileinput-button">
                                <i class="glyphicon glyphicon-plus"></i>
                                <span>Select file...</span> -->
                                    <!-- The file input field used as target for the file upload widget -->
                                <!-- <input id="fileupload" type="file" name="files" accept="image/x-png, image/gif, image/JPEG" >
                            </span>
                                <br>
                                <br> -->
                                <!-- The global progress bar -->
                                <!-- <div id="progress" class="progress">
                                    <div class="progress-bar progress-bar-success"></div>
                                </div> -->
                                <!-- The container for the uploaded files -->
                                <!-- <div id="files" class="files"></div>
                                <input type="text" name="uploaded_file_name" id="uploaded_file_name" hidden>
                                <br>
                            </div>
                        </div>  -->

        <?php 
            $pid = $_GET['p_id'];
            $query = "SELECT * FROM product where product.p_id = '$pid'";
            $result = mysqli_query($connection, $query);
            
            $row = mysqli_fetch_assoc($result);

        ?>


      <form method="post" action="server/form_process.php">
            <label for="code" class="subtopic">Product Code :</label><br>
            <input type="text" name="code" value="<?php echo $row['p_code']; ?>" style=" border: 1px solid #c45555;">
            <br><br>

            <label for="name" class="subtopic">Product Name :</label><br>
            <input type="text" name="name" value="<?php echo $row['p_name']; ?>" style=" border: 1px solid #c45555;">
            <br><br>

            <label for="name" class="subtopic">Weight / Flavour :</label><br>
            <input type="text" name="wf" id="wf" value="<?php echo $row['wf']; ?>" style=" border: 1px solid #c45555;">
            <br><br>

            <label for="weight" class="subtopic">Price</label><br>
           <input type="text" name="price" value="<?php echo $row['p_price']; ?>" style=" border: 1px solid #c45555;"><br>
           <!-- <font style="font-size: 16px;color: #c45555;">1Kg</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="weight[]" value="1Kg" id="size" style="width: 15px;height: 15px;"><input class="pricet" type="text" name="price[]" id="price" style=" border: 1px solid #c45555;"><br>
           <font style="font-size: 16px;color: #c45555;">2Kg</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="weight[]" value="2Kg" id="size" style="width: 15px;height: 15px;"><input class="pricet" type="text" name="price[]" id="price" style=" border: 1px solid #c45555;"><br>
           <font style="font-size: 16px;color: #c45555;">3Kg</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="weight[]" value="3Kg" id="size" style="width: 15px;height: 15px;"><input class="pricet" type="text" name="price[]" id="price" style=" border: 1px solid #c45555;"> -->
           <br><br>

            <!-- <label for="price" class="subtopic">Price :</label><br>
            <input type="text" name="price" id="price" style=" border: 1px solid #c45555;">
            <br><br> -->

            <!-- <label for="flavour" class="subtopic">Flavour :</label><br>
            <font style="font-size: 16px;color: #c45555;">Vege</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
            <input class="pricet" type="text" name="fprice" style=" border: 1px solid #c45555;"><br> -->
           <!-- <font style="font-size: 16px;color: #c45555;">Egg</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="flavour[]" value="Egg" id="size" style="width: 15px;height: 15px;"><input class="pricet" type="text" name="price" id="price" style=" border: 1px solid #c45555;"><br>
           <font style="font-size: 16px;color: #c45555;">Fish</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="flavour[]" value="Fish" id="size" style="width: 15px;height: 15px;"><input class="pricet" type="text" name="price" id="price" style=" border: 1px solid #c45555;"><br>
           <font style="font-size: 16px;color: #c45555;">Chicken</font>&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="flavour[]" value="Chicken" id="size" style="width: 15px;height: 15px;"><input class="pricet" type="text" name="price" id="price" style=" border: 1px solid #c45555;"> -->


            <!-- <label class="subtopic">Category :</label><br>
            <input type="text" name="catname" style=" border: 1px solid #c45555;" value="">
            <br><br> -->
           
            <label class="subtopic">Description :</label><br>
            <textarea type="text" name="des" rows="4" cols="30" style=" border: 1px solid #c45555;"><?php echo $row['p_des']; ?></textarea>
            <br><br>

            <input type="hidden" name="pid" value="<?php echo $row['p_id']; ?>">
            <button type="submit" class="btn btn-primary1" name="update_product">UPDATE</button>
            
            <a href="../editproduct.php" class="btn btn-primary1">BACK</a>

            <br>
            <br>
            <br>
            <br>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    /*jslint unparam: true */
    /*global window, $ */

    var max_uploads = 1

    $(function () {
        'use strict';

        // Change this to the location of your server-side upload handler:
        var url = 'server/upload.php';
        $('#fileupload').fileupload({
            url: url,
            dataType: 'html',
            done: function (e, data) {

                if(data['result'] == 'FAILED'){
                    alert('Invalid File');
                }else{
                    $('#uploaded_file_name').val(data['result']);
                    $('#uploaded_images').append('<div class="uploaded_image"> <input type="text" value="'+data['result']+'" name="uploaded_image_name[]" id="uploaded_image_name" hidden> <img src="server/uploads/'+data['result']+'" /> <a href="#" class="img_rmv btn btn-danger"><i class="fa fa-times-circle" style="font-size:48px;color:red"></i></a> </div>');

                    if($('.uploaded_image').length >= max_uploads){
                        $('#select_file').hide();
                    }else{
                        $('#select_file').show();
                    }
                }

                $('#progress .progress-bar').css(
                    'width',
                    0 + '%'
                );

                $.each(data.result.files, function (index, file) {
                    $('<p/>').text(file.name).appendTo('#files');
                });

            },
            progressall: function (e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
                $('#progress .progress-bar').css(
                    'width',
                    progress + '%'
                );
            }
        }).prop('disabled', !$.support.fileInput)
            .parent().addClass($.support.fileInput ? undefined : 'disabled');
    });

    $( "#uploaded_images" ).on( "click", ".img_rmv", function() {
        $(this).parent().remove();
        if($('.uploaded_image').length >= max_uploads){
            $('#select_file').hide();
        }else{
            $('#select_file').show();
        }
    });
</script>

</body>
</html>