<?php

require "databaseConnect.php";
$db = getDb();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            color: #588c7e;
            font-family: monospace;
            font-size: 25px;
            text-align: left;
        }
        th {
            background-color: #588c7e;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2
        }
    </style>
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
            <?php
            $sql = "SELECT first_name, last_name FROM contact";
            $result = $db-> query($sql);

            if ($result-> num_rows > 0) {
                while ($row = $result-> fetch_assoc()) {
                    echo "<tr><td>". $row["first_name"] ."</td><td>". $row["last_name"] ."</td></tr>";
                }
                echo "</table>";
            }
            else {
                echo "no results";
            }
            ?>
    </div>
</body>
</html>