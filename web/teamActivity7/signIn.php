<?php

if($_POST['user'] != "" && $_POST['pass'] != "")
{
    echo "hello";

    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $user = htmlspecialchars($user);
    $hashpass = password_hash($pass, PASSWORD_DEFAULT);

    require("../contactsProject/databaseConnect.php");
    $db - get_db();

    $query = "INSERT INTO _user(username, pass) VALUES('".$user."', '".$hashpass."');";
    $statement = $db->query($query);

}


?>