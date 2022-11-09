<?php 
    session_start();
    require 'dbconfig/config.php'
?>
<html>
    <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
    </head>
    <body>
        <form action="site.php" method="post">
            Email: <input type="email" name="name" required><br>
            Password: <input type="password" name="pass" required>
            <input name="sname" type="Submit" value="LOGIN">
            <a href="registration.php"><input name="register" type="button" value="SIGN UP"></a>
            <a href="reset.php">forgot password?</a>
        </form>
        <br>
    </body>
</html>
<?php
    if(isset($_POST["sname"]))
    {
        //echo '<script type="text/javascript"> alert("Submit is clicked") </script>';
        $uname = $_POST["name"];
        //$password_hash = password_hash($_POST['pass'], PASSWORD_DEFAULT);
        $query = "select password from user where email = '$uname'";
        $query_run = mysqli_query($con,$query);
        $check=$_POST['pass'];
        $check_pass= password_verify( $check, $query);

        // if (password_verify($check, $query)) {
        //     echo 'Password is valid!';
        // } else {
        //     echo 'Invalid password.';
        // }
        // $query = "select * from user where email = '$uname' AND password='$password_hash'";
        // $query_run = mysqli_query($con,$query);
        if(mysqli_num_rows($query_run)>0)
        {
            
            $_SESSION['name']=$uname;
            header('location:home.php');
            //echo '<script type="text/javascript"> alert("Login done successfully") </script>';
        }
        else
        {
            echo '<script type="text/javascript"> alert("Invalid Credentials")
             </script>';
        }
    }
?>