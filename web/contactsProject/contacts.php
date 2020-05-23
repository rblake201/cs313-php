<?php

require "databaseConnect.php";
$db = getDb();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 style="text-align:center">Contacts</h1>
    <h3>Contacts List</h3>
    <div style="height:100px;overflow:auto;">
        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
            </tr>
        </table>
    </div>
</body>
</html>