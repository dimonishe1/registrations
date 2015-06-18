<?php
    class dbConnect{

        function __construct(){
            require_once 'dbConfig.php';
            @$conn = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
            mysql_select_db(DB_DATABASE, $conn);
            if(!$conn)
            {
                die ("Cannot connect to the database");
            }
            return $conn;
        }
        public function Close_Connection(){
            mysql_close();
        }

    }

?>