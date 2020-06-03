<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>Sign In Page</h1>

<form action="signIn.php" method="post">
    <input type="hidden" name="posted" value=true>
    <label>Username<input type="text" name="user"></label><br>
    <label>Password<input type="password" name="pass"></label><br>
    <input type="submit" value="Sign In">
</form>
</body>
</html>

<?php

if(isset($_POST['user']) && isset($_POST['pass']))
{
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    require("db_connect.php");
    $db = getDb();

    $query = "SELECT pass FROM _user WHERE username = '".$user."';";
    $statement = $db->query($query);

    if($statement)
    {
        $row = $statement->fetch();
		$hashpass = $row['pass'];

		if (password_verify($pass, $hashpass))
		{
			$_SESSION['user'] = $user;
			header("Location: welcome.php");
			die();
        }

    }
    else
    {
        echo '<script>alert("Incorrect Username and Password")</script>';
    }
}

?>