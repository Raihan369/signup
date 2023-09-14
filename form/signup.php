 <?php
    session_start();

    include("db.php"); 

    if($_SERVER['REQUEST_METHOD']== 'POST')
    {
        $username = $_POST['userName'];
        $gmail = $_POST['EmailId'];
        $MobileNUMBER = $_POST['MobileNumber'];
        $ADDRESS = $_POST['Address'];
        $password = $_POST['pass'];
        $CONFIRMpassword = $_POST['Cpass'];
        
        if(!empty($gmail) && !empty($password) && !empty($CONFIRMpassword) && !is_numeric($gmail))
        {
            $query = "insert into form (userName,EmailId,MobileNumber,Address,pass,Cpass) values ('$username','$gmail','$MobileNUMBER','$ADDRESS','$password','$CONFIRMpassword')";

            mysqli_query($con,$query);

            echo "<script type='text/javascript'> alert('Successfully Register')</script>";
        }  

        else
        {
            echo "<script type='text/javascript'> alert('Please Enter Some Valid Information')</script>";
        }
    }

 ?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form login and register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="signup">
        <h1>Sign Up</h1>
        <form method="POST">
            <label >User Name</label>
            <input type="text" name="userName" required>
            <label >Email Id</label>
            <input type="email" name="EmailId" required>
            <label >Mobile Number</label>
            <input type="tel" name="MobileNumber" required>
            <label >Address</label>
            <input type="text" name="Address" required>
            <label >Enter Password</label>
            <input type="password" name="pass" required>
            <label >Confirm Password</label>
            <input type="password" name="Cpass" required>
            <input type="submit" name="" value="Submit">
        </form>
        <p>By clicking the signup button,you are agree to our <br>
        <a href="">Terms and Condition</a> and <a href="#">Policy Privacy</a>
        </p>
        <p>Already have an account? <a href="login.php">Login Here</a></p>
    </div>
</body>
</html>