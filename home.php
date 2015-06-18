<?php
include_once 'dbFunctional.php';
if (@$_POST['welcome']) {
    // remove all session variables
    session_unset();

    // destroy the session
    session_destroy();
}
if (!($_SESSION)) {
    header("Location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8"/>
    <title>Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Profile"/>
    <meta name="keywords" content="register, login, form"/>
    <meta name="author" content="Dmitry"/>
    <link rel="shortcut icon" href="../favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/style2.css"/>
    <link rel="stylesheet" type="text/css" href="css/style2.css"/>
    <link rel="stylesheet" type="text/css" href="css/animate-custom.css"/>
</head>
<body>
<div class="container">
    <header>
        <h1>Profile</h1>
    </header>
    <section>
        <div id="container_demo">
            <div id="wrapper">
                <div id="login" class="animate form">
                    <form name="login" method="post" action="">
                        <h1>Welcome </h1>

                        <?php

                            $funcobj = new dbFunctional();
                            $funcobj->getUserInformation($_SESSION['email']);

                        ?>

                        <p class="login button">
                            <input type="submit" name="welcome" value="Logout"/>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
</body>
</html>