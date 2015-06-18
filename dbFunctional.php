<?php
require_once 'dbConnect.php';
session_start();

class dbFunctional
{

    function __construct()
    {
        $db = new dbConnect();
    }

    function __destruct()
    {

    }
    //register
    function UserRegister($email, $password, $secondname, $Firstname, $Patronymic, $Birthday, $Location, $Familystatus, $Education, $Experience,
                          $Contactinformat, $Additionalinformation, $img_name)
    {
        //set default value if birthday empty
        if(empty($Birthday)){
           $Birthday = "1900-01-01";
        }

        try {

            $query = mysql_query("
                insert into user (
                    Email,
                    Password)
                values (
                    '" . $email . "',
                    '" . $password . "');
            ");

            $query2 = mysql_query("
                insert into personaldata (
                    idUser,
                    Secondname,
                    Firstname,
                    Patronymic,
                    Birthday,
                    Location,
                    FamilyStatus,
                    Education,
                    Experience,
                    ContactInformation,
                    AdditionalInformation,
                    image)
                values (
                    last_insert_id(),
                    '" . $secondname . "',
                    '" . $Firstname . "',
                    '" . $Patronymic . "',
                    '" . $Birthday . "',
                    '" . $Location . "',
                    '" . $Familystatus . "',
                    '" . $Education . "',
                    '" . $Experience . "',
                    '" . $Contactinformat . "',
                    '" . $Additionalinformation . "',
                    '" . $img_name . "');
                ") or die(mysql_error());

        } catch (Exception $e) {

            echo $e->getMessage();

        }

        return $query2;

    }
    //login
    function Login($email, $password)
    {
        $res = mysql_query("SELECT * FROM user WHERE email = '" . $email . "' AND password = '" . $password . "'") or die(mysql_error());
        $user_data = mysql_fetch_array($res);
        $row_number = mysql_num_rows($res);

        if ($row_number == 1) {

            $_SESSION['login'] = true;
            $_SESSION['id'] = $user_data['id'];
            $_SESSION['username'] = $user_data['username'];
            $_SESSION['email'] = $user_data['Email'];
            return TRUE;
        } else {
            return FALSE;
        }

    }
    //check that user is exist
    function isUserExist($email)
    {
        $qr = mysql_query("SELECT * FROM user WHERE email = '" . $email . "'");
        $row = mysql_num_rows($qr);
        if ($row > 0) {
            return true;
        } else {
            return false;
        }
    }
    //get profile information
    function getUserInformation($email)
    {
        $query = mysql_query("SELECT * FROM user INNER JOIN personaldata ON user.idUser = personaldata.idUser WHERE user.Email = '" . $email . "';");

        while ($row = mysql_fetch_assoc($query)) {
            echo "<div class = 'profile'>";
            foreach ($row as $key => $value) {
                if ($key != "Password" && $key != "idUser" && $key != "idPersonalData") {
                    echo "<div class = '" . $key . "'><p><b>" . $key . "</b></p><p>" . $value . "</p></div>";
                }
            }
            echo "</div>";
        }
    }

}
?>