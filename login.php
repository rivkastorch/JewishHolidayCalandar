<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="\projectTTI\CSS\style.css" type="text/css"/>    
</head>
<body>
<?php
    require 'dbConnect.php';
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($conn, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM user WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($conn, $query) or die("could not login");
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            $_SESSION["success"] = "";
            // Redirect to user index page
            header("Location: index.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Login</h1>
        <br><br><br><br><br>
        <p>
        <input type="text" size="28" class="login-input" name="username" placeholder="Username" autofocus="true"/>
        <input type="password" size="28" class="login-input" name="password" placeholder="Password"/>
        </p><br>
        <button type="submit" value="Login" name="login_user">Submit</button>
        <p class="link"><a href="registration.php">New Registration</a></p>
    </form>
<?php
    }
    ?>
</body>
</html>