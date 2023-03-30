<?php
include "config.php";


if(isset($_POST['but_submit'])){

    $uname = mysqli_real_escape_string($con,$_POST['txt_uname']);
    $password = mysqli_real_escape_string($con,$_POST['txt_pwd']);


    if ($uname != "" && $password != ""){

        $sql_query = "select count(*) as cntUser from users where username='".$uname."' and password='".$password."'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            $_SESSION['uname'] = $uname;
            header('Location: admin.php');
        }else{
            echo "Invalid username and password";
        }

    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="singupstyles.css">
  <link rel="icon" href="img\admin.png" type="image/icon type">
  <title>Admin login</title>
</head>
<body>
    <!-- Container Start -->
    <div id="container">
      <!-- Form Wrap Start -->
      <div class="form-wrap">
        <h1>Admin login</h1>
    
        <!-- Form Start -->
        <form method="post" action="">
          <div class="form-group">
            <label for="first-name" >UserName</label>
            <input type="text" id="txt_uname" name="txt_uname" placeholder="Username">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="txt_uname" name="txt_pwd" placeholder="Password"  required>
          </div>

          <button type="submit" value="submit" name="but_submit" id="but_submit">login</button>
         
        </form>
        <!-- Form Close -->
      </div>
      <!-- Form Wrap Close -->

    </div>
    <!-- Container Start -->
    <script src="java.js"></script>
</body>
</html>




































