<?php
    session_start();

    include("db.php"); 


    if($_SERVER['REQUEST_METHOD']== 'POST')
    {

        $gmail = $_POST['EmailId'];
        $password = $_POST['pass'];

        if(!empty($gmail) && !empty($password) && !is_numeric($gmail))
        {
            $query = "select * from form where EmailId ='$gmail' limit 1 ";
            $result = mysqli_query($con, $query);

            if($result)
            {
                if($result && mysqli_num_rows($result) >0)
                {
                    $user_data = mysqli_fetch_assoc($result);

                    if($user_data['pass'] == $password )
                    {
                        header("location: index.php");
                        die;

                    }
                }
            }
            echo "<script type='text/javascript'> alert('Wrong User Name Or Password')</script>";
        }
        else
        {
            echo "<script type='text/javascript'> alert('Wrong User Name Or Password')</script>";
        }
    }


    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login">
        <h1>Log In</h1>
        <form method="POST">
            
            <label >Email Id</label>
            <input type="email" name="EmailId" required>
            <label >Enter Password</label>
            <input type="password" name="pass" required> 
            <input type="submit" name="" value="Submit">
        </form>
        <p>Not have an account? <a href="signup.php">Sign up here</a></p>
</body>
</html>