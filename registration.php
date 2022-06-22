
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body>

<?php
    require('db.php');

    // inserting values to database
    if (isset($_REQUEST['email'])) {
        // removes backslashes
        $firstname = stripslashes($_REQUEST['firstname']);
        $firstname = mysqli_real_escape_string($con, $firstname);
      
        $secondname = stripslashes($_REQUEST['secondname']);
        $secondname = mysqli_real_escape_string($con, $secondname);
         
        
        
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");

        $query="select * from users where (email='$email');";
        $res=mysqli_query($con,$query);

    if (mysqli_num_rows($res) > 0) {
        
        $row = mysqli_fetch_assoc($res);
        if($email==isset($row['email']))
        {
                echo "<div class='form'>
                  <h3>Email already exist</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    
        }

    else {
    $query    = "INSERT into `users` (firstname,secondname, password, email, create_datetime)
                     VALUES ( '$firstname', '$secondname', '" . md5($password) . "', '$email', '$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login1.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }    
        
        }
    } else {
?>


    <form class="form" action="" method="post">
        <div class="container"><h2 style="color: blue;" align="center" >Recruiter CRM</h2></div>
        <h1 class="login-title">Sign up</h1>
        <input type="text" class="login-input" name="firstname" placeholder="firstname" required />
        <input type="text" class="login-input" name="secondname" placeholder="secondname" required />
       
        <input type="email" class="login-input" name="email" placeholder="Email Adress" required>
        <input type="password" class="login-input" name="password" placeholder="Password" required>
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link"><a href="login1.php">Click to Login</a></p>
    </form>
<?php
    }
?>
</body>
</html>
