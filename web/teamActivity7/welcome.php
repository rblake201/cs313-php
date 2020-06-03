 <?php

session_start();

if (isset($_SESSION['user']))
{
	$user = $_SESSION['user'];
}
else
{
	header("Location: signIn.php");
	die();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Welcome <?php echo "$user";?></h1>
</body>
</html>

