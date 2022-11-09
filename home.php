<?php
    session_start();
    require 'dbconfig/config.php'
?>
<html>
    <head>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
    </head>
    <body>
        <h1>Welcome to Home page! <br>
            You are logged in through 
            <?php echo $_SESSION['name']
            ?>  
        </h1>
        <a href="site.php"><input type="submit" name="logout" value="LOGOUT"></a>
    </body>
    <?php 
        if(isset($_POST['logout']))
        {
            //echo '<script type="text/javascript"> alert("Registered successfully!  Go back to login page") </script>';
            header('location:site.php');
            session_destroy();
        }
    ?>

</html>