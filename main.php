<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="\projectTTI\CSS\style.css" type="text/css"/>    
    <title>Main</title>
</head>
<body>
<?php include 'C:\xampp\htdocs\projectTTI\sidebar.php'?>
        <div class="main">
            <h2>Main page</h2>
            <p>Thanks for logging in and registering</p>
            <p>Feel free to add your own recipes and look at the calendar for recipes for certain holidays.</p>
        <?php
        if(isset($_SESSION['success'])): ?>
        <div>
            <h3>
                <?php
                   echo $_SESSION['success'];
                   unset($_SESSION['success']);
                ?>
            </h3>
        </div>
        <?php endif ?>
        <br>
           <button onclick="location.href='/projectTTI/logout.php'">Logout</button>
        </div>
</body>
</html>