<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>Sign Up Page</h1>

<form action="signIn.php" method="post">
    <input type="hidden" name="posted" value=true>
    <label>Username<input type="text" name="user"></label><br>
    <label>Password<input type="text" name="pass"></label><br>
    <input type="submit">
</form>
</body>
</html>

<?php

if($_POST['user'] != "" && $_POST['pass'] != "")
{
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $user = htmlspecialchars($user);
    $hashPass = password_hash($pass, PASSWORD_DEFAULT);

    require("\db_connect.php");
    $db = getDb();

    $query = "INSERT INTO _user(username, pass) VALUES(:user, :pass);";
    $statement = $db->prepare($query);

    $statement->bindValue(':user', $user);
    $statement->bindValue(':pass', $hashPass);
    
    $statement->execute();

    header("Location: signIn.php");

}


?>