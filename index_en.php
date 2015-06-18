<?php
include_once 'dbFunctional.php';

$funcObj = new dbFunctional();
if (@$_POST['login']) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user = $funcObj->Login($email, $password);
    if ($user) {
        header("Location: home.php");
    } else {
        echo "<script>alert('Email / Password not match')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8"/>
    <title>Login Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Login Form"/>
    <meta name="keywords" content="register, login, form"/>
    <meta name="author" content="Dmitry"/>
    <link rel="shortcut icon" href="../favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/style2.css"/>
</head>
<body>
<div class="change_language">
    <a class="language" href="index.php?lang=en">en</a>|<a class="language" href="index.php?lang=ru">rus</a>
</div>
<div class="container">
    <header>
        <h1>Login </h1>
    </header>
    <section>
        <div id="container_demo">
            <div id="wrapper">
                <div id="login" class="animate form">
                    <form name="login" method="post" action="">
                        <p>
                            <label for="emailsignup" class="youmail" data-icon="e"> Your email</label>
                            <input id="emailsignup" name="email" required="required" type="email"
                                   placeholder="mysupermail@mail.com"/>
                        </p>

                        <p>
                            <label for="password" class="youpasswd" data-icon="p"> Your password </label>
                            <input id="password" name="password" required="required" type="password"
                                   placeholder="password"/>
                        </p>

                        <p class="keeplogin">
                            <input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping"/>
                            <label for="loginkeeping">Keep me logged in</label>
                        </p>

                        <p class="login button">
                            <input type="submit" name="login" value="Login"/>
                        </p>

                        <p class="change_link">
                            Not a member yet ?
                            <a href="register_en.php" class="to_register">Join us</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
</body>
</html>