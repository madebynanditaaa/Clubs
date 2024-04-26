<?php
    require_once 'includes/signup_view.inc.php';
    require_once 'includes/config_session.inc.php';
?>

<DOCTYPE html>
<html lang="en">
    <head>
    <link rel="stylesheet" href="styles.css">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
    <h1>Login</h1>
        <form action="includes/login.inc.php" method="post">
            <input required type="text" name="username" placeholder="Username">
            <br><br>
            <input required type="text" name="pwd" placeholder="Password">
            <br><br>
            <button>Login</button>
        </form>
        <h1>Signup</h1>
        <form action="includes/signup.inc.php" method="post">
            <input required type="text" name="username" placeholder="Username">
            <br><br>
            <input required type="text" name="pwd" placeholder="Password">
            <br><br>
            <input required type="text" name="email" placeholder="E-mail">
            <br><br>
            <button>Signup</button>
        </form>

<?php
check_signup_error();
?>

    </body>
</html>