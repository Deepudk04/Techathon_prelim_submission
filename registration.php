<?php 
    require 'dbconfig/config.php'
?> 
<html>
  <head>
    <title>Signup Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
  </head>
  <body>
    <h1>Signup</h1>
    <form action="registration.php" method="post">
      <div>
        <label for="uname">Username : </label>
        <input type="text" id="uname" name="uname" required>
      </div>
      <div>
        <label for="umail">Email : </label>
        <input type="email" id="umail" name="umail" required>
      </div>
      <div>
        <label for="upass">Password : </label>
        <input type="password" id="upass" name="upass" required>
      </div>
      <div>
        <label for="cpass">Confirm Password : </label>
        <input type="password" id="cpass" name="cpass" required>
      </div>
      <div>
        <label for="uphone">Phone Number: </label>
        <input type="text" id="uphone" name="uphone" required>
      </div>
      <input type="submit" name="sub" value="SIGN UP" />
      <a href="site.php"><input name= "backtologin" value="Back To Login" type="button"></a>
    </form>
  </body>
</html>
<?php
    if(isset($_POST["sub"]))
    {
   
    if (empty($_POST['uname'])) {
        die("Name is required");
    }
    
    if( ! filter_var($_POST["umail"], FILTER_VALIDATE_EMAIL)) {
        die("Valid email address is required");
    }
    
    if(strlen($_POST["upass"])<8) {
        die("Password must be at least 8 charachters long");
    }
    
    if( ! preg_match("/[a-z]/i", $_POST['upass'])) {
        die("Password must contain at least one alphabet");
    }
    
    if( ! preg_match("/[0-9]/i", $_POST['upass'])) {
        die("Password must contain at least one number");
    }
    
    if($_POST['upass'] != $_POST['cpass']) {
        die("Password confirmation failed");
    }
    
    if( ! preg_match("/[0-9]/i", $_POST['uphone'])) {
        die("Phone number nust contain only digits");
    }
    if(strlen($_POST['uphone']) != 10) {
        die("Invalid phone number");
    }
    $unname = $_POST['uname'];
    $unemail = $_POST['umail'];
    $unphone = $_POST['uphone'];
    $password_hash = password_hash($_POST['upass'], PASSWORD_DEFAULT);
  
    $query="INSERT INTO user(username,email,password,phonenumber) values ('$unname','$unemail','$password_hash','$unphone')";
    $query_run =mysqli_query($con,$query);
    echo '<script type="text/javascript"> alert("Registered successfully!!!  Go back to login") </script>';
    //print_r($_POST);
  }
?>