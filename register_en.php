<?php
include_once 'dbFunctional.php';

$funcObj = new dbFunctional();
if (@$_POST['register']&&$_POST['Complete']=="TRUE") {
    @$secondname = strip_tags($_POST['Secondname']);
    @$Firstname = strip_tags($_POST['Firstname']);
    @$Patronymic = strip_tags($_POST['Patronymic']);
    @$Birthday = strip_tags($_POST['Birthday']);
    @$Location = strip_tags($_POST['Location']);
    @$Familystatus = strip_tags($_POST['Familystatus']);
    @$Education = strip_tags($_POST['Education']);
    @$Experience = strip_tags($_POST['Experience']);
    @$Contactinformat = strip_tags($_POST['Contactinformat']);
    @$Additionalinformation = strip_tags($_POST['Additionalinformation']);
    @$email = strip_tags($_POST['email']);
    @$password = strip_tags($_POST['password']);
    @$confirmPassword = strip_tags($_POST['confirm_password']);
    @$file = strip_tags($_FILES['imgupload']['name']);
    @$file_tmp_name = strip_tags($_FILES['imgupload']['tmp_name']);
    if ($password == $confirmPassword && $password != "") {
        $email_set = $funcObj->isUserExist($email);
        if (!$email_set) {
            $register = $funcObj->UserRegister($email, $password,
                $secondname, $Firstname, $Patronymic, $Birthday, $Location, $Familystatus, $Education, $Experience,
                $Contactinformat, $Additionalinformation, $file);
            if ($register) {
                echo "<script>alert('Registration Successful')</script>";
            } else {
                echo "<script>alert('Registration Not Successful')</script>";
            }
        } else {
            echo "<script>alert('Email Already Exist')</script>";
        }
    } else {
        echo "<script>alert('Password Not Match')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8"/>
    <title>Registration Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Registration Form"/>
    <meta name="keywords" content="register, login, form"/>
    <meta name="author" content="Dmitry"/>
    <link rel="shortcut icon" href="../favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/style2.css"/>
    <script type="text/javascript" src="check_fields.js"></script>
</head>
<body>
<div class="change_language">
    <a class="language" href="register_en.php">en</a>|<a class="language" href="register_ru.php">rus</a>
</div>
<div class="container">
    <header>
        <h1>Registration</h1>
    </header>
    <section>
        <div id="container_demo">
            <div id="wrapper">
                <div id="register" class="animate form">
                    <form name="register" method="post" action="register_en.php" enctype="multipart/form-data">
                        <p>
                            <label for="Secondnamesignup" class="Secondname" data-icon="u">Secondname</label>
                            <input id="Secondnamesignup" name="Secondname" required="required" type="text"
                                   placeholder="Ivanov"/>
                        </p>

                        <p>
                            <label for="Firstnamesignup" class="Firstname" data-icon="u">Firstname</label>
                            <input id="Firstnamesignup" name="Firstname" required="required" type="text"
                                   placeholder="Ivan"/>
                        </p>

                        <p>
                            <label for="Patronymicnamesignup" class="Patronymicname" data-icon="u">Patronymic</label>
                            <input id="Patronymicnamesignup" name="Patronymic" required="required" type="text"
                                   placeholder="Ivanovich"/>
                        </p>

                        <p>
                            <label for="Birthdaysignup" class="Birthday" data-icon="u">Birthday</label>
                            <input id="Birthdaysignup" name="Birthday" type="text"
                                   placeholder="1900-01-01" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}"/>
                        </p>

                        <p>
                            <label for="Locationsignup" class="Location" data-icon="u">Location</label>
                            <input id="Locationsignup" name="Location" type="text"
                                   placeholder="City, street, house #"/>
                        </p>

                        <p>
                            <label for="Familystatussignup" class="Familystatus" data-icon="u">Family status</label>
                            <input id="Familystatussignup" name="Familystatus" type="text"
                                   placeholder="Married / Single"/>
                        </p>

                        <p>
                            <label for="Educationsignup" class="Education" data-icon="u">Education</label>
                            <input id="Educationsignup" name="Education" type="text"
                                   placeholder="Education degree"/>
                        </p>

                        <p>
                            <label for="Experiencesignup" class="Experience" data-icon="u">Experience</label>
                            <input id="Experiencesignup" name="Experience" type="text"
                                   placeholder="Specify work experience"/>
                        </p>

                        <p>
                            <label for="Contactinformationsignup" class="Contactinformat" data-icon="u">Contact
                                information</label>
                            <input id="Contactinformatsignup" name="Contactinformat" type="text"
                                   placeholder="Phone, Skype and more."/>
                        </p>

                        <p>
                            <label for="Additionalinformationsignup" class="Additionalinformation" data-icon="u">Additional
                                information</label>
                            <input id="Additionalinformationsignup" name="Additionalinformation"
                                   type="text" placeholder="...."/>
                        </p>

                        <p>
                            <label for="emailsignup" class="youmail" data-icon="e">Email</label>
                            <input id="emailsignup" name="email" required="required" type="email"
                                   placeholder="mysupermail@mail.com"/>
                        </p>

                        <p>
                            <label for="passwordsignup" class="youpasswd" data-icon="p">Password</label>
                            <input id="passwordsignup" name="password" required="required" type="password"
                                   placeholder="example: X8df!90EO" min="4"/>
                        </p>

                        <p>
                            <label for="passwordsignup_confirm" class="youpasswd" data-icon="p">Confirm password</label>
                            <input id="passwordsignup_confirm" name="confirm_password" required="required"
                                   type="password" placeholder="example: X8df!90EO" min="4"/>
                        </p>

                        <p>
                            <label for="picturesignup" class="picture">Select your image</label>
                            <input type="FILE" name="imgupload">
                        </p>

                        <p class="sign in button">
                            <input type="submit" name="register" value="Sign up" onclick="check.start()"/>
                        </p>

                        <input type="hidden" value="TRUE" name="Complete" />

                        <p class="change_link">
                            Already a member ?
                            <a href="index_en.php" class="to_login"> Go and log in </a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
</body>
</html>