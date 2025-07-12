<?php
    session_start();

    include("db.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $firstname = $_POST['fname'];
        $lastname = $_POST['lname'];
        $num = $_POST['contactno'];
        $gmail = $_POST['email'];
        $password = $_POST['password'];

        if(!empty($gmail) && !empty($password) && !is_numeric($gmail))
        {
            echo "<script type='text/javascript'> alert('Successfully Register')</script>";
            
            header ("location: login.php");

            $query = "insert into rh (fname, lname, contactno, email, password) values ('$firstname', '$lastname', '$num', '$gmail', '$password')";

            mysqli_query($con, $query);

            
            
        }
        else{
            echo "<script type='text/javascript'> alert('Please Enter Valid Information')</script>";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
    

</style>
<body> 
       
    
        <div class="container">
        <h2>Sign Up</h2>
        <form id="signup-form" method="POST">
            <label for="name">First Name:</label>
            <input type="text" id="first name" name="fname" required>
            <label for="name">Last Name:</label>
            <input type="text" id="first name" name="lname" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="number">Contact Number:</label>
            <input type="number" id="number" name="contactno" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Sign Up</button>
        </form>
        <p>Already have an account? <a href="login.php">Login</a></p>
        
        </div>

    
</body>
</html>
