<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>Sign Up Page</h1>

<form action="signUp.php" method="post">
    <label>Username<input type="text" name="user" id="user"></label><br>
    <label>Password<input type="text" name="pass" id="pass"></label><br>
    <label>Re-enter Password<input type="text" name="pass1" id="pass1"></label><br>
    <input type="submit" value="Sign Up">
</form>
</body>
</html>

<?php

if(isset($_POST['user']) && isset($_POST['pass']))
{
    if($_POST['user'] && $_POST['pass'])
    {
        if($_POST['pass'] == $_POST['pass1'])
        {
            $user = $_POST['user'];
            $pass = $_POST['pass'];

            $user = htmlspecialchars($user);
            $hashpass = password_hash($pass, PASSWORD_DEFAULT);

            require("db_connect.php");
            $db = getDb();

            $query = "INSERT INTO _user(username, pass) VALUES('".$user."', '".$hashpass."');";
            $statement = $db->query($query);

            header("Location: signIn.php");
            die();
        }
    }
}

?>