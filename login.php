<?php
     session_start();

     include("db.php");

     if($_SERVER['REQUEST_METHOD'] == "POST")
     {
        $gmail = $_POST['email'];
        $password = $_POST['password'];
       
        if(!empty($gmail) && !empty($password) && !is_numeric($gmail))
        {
           $query = "select * from rh where email = '$gmail' limit 1";
           $result = mysqli_query($con, $query);

           if($result)
           {
              if($result && mysqli_num_rows($result) > 0)
              {
                $user_data = mysqli_fetch_assoc($result);
                
                if($user_data['password'] == $password)
                {
                    
                    header ("location: home.html");
                    die;
                    

                   
                    
                }
                
              }
              
           }
           echo "<script type='text/javascript'> alert('wrong username or password')</script>";

        }
        else{
            echo "<script type='text/javascript'> alert('wrong username or password')</script>";
        }

     }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="container">
        <h2>Login</h2>
        <form id="login-form" method="POST">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <p class="forget">
                <a href="#">forget password</a>     
            </p>
            
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="signup.php">Sign up</a></p>
    </div>
    
    

    <script></script>
</body>
</html>
