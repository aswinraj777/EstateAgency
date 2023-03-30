<?php  
 $connect = mysqli_connect("localhost", "root", "", "images");  
 if(isset($_POST["insert"]))  
 {   
     $land_name =  $_REQUEST['landname'];
     $lcost = $_REQUEST['landcost'];
     $landsize =  $_REQUEST['landsize'];
     $owner = $_REQUEST['landowner'];
     $landarea = $_REQUEST['landarea'];
     $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));  
     $query = "INSERT INTO tbl_images VALUES (0,'$file','$land_name',$lcost,'$owner',$landsize,'$landarea')";  
     if(mysqli_query($connect, $query))  
     {  
          echo '<script>alert("Image Inserted into Database")</script>';  
     }  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Admin image upload</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link href="img\admin.png" rel="icon">
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:500px;">  
                <h3 align="center">Admin image upload</h3>  
                <br />  
                <form method="post" enctype="multipart/form-data">  
                     Image:<input type="file" name="image" id="image" />  
                     <br />  
                     Landname:<input type="text" name="landname" id="landname"><br><br>
                     Landcost:<input type="text" name="landcost" id="landcost"><br><br>
                     Landsize(arces):<input type="text" name="landsize" id="landsize"><br><br>
                     Landowner Name:<input type="text" name="landowner" id="landowner"><br><br>
                     landarea:<input type="text" name="landarea" id="landarea"><br><br>
                     <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info" />  
                </form>  
                <br />  
                <br />  
                
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#insert').click(function(){  
           var image_name = $('#image').val();  
           if(image_name == '')  
           {  
                alert("Please Select Image");  
                return false;  
           }  
           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#image').val('');  
                     return false;  
                }  
           }  
      });  
 });  
 </script>  