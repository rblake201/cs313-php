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
    <div style="flex-box">
    <div style="height:300px;width:500px;overflow:auto;">
        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Info</th>
            </tr>
            <?php
            $result = $db->query("SELECT * FROM contact");
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    $i = 0;
                    echo "<form name='myform_$i' action='info.php' method='post'>";
                    $id = $row[id];

                    echo "<tr><td>" . $row["first_name"]. "</td><td>" . $row["last_name"] . "</td><td>" . "<input type='hidden' name='info' value='$id'>
                                                                                                           <input type='submit' value='Info'/>" . "</td></tr>";

                    $i++;
                    echo '</form>';
                }
                echo '</table>';
            ?>
    </div>
    <br>
    <h3>Search</h3>
    <div style="width:500px;overflow:auto;">
        <form action="info.php" method="post">
            <input type="text" name="searchf" placeholder="Search by first name..."/>
            <input type="text" name="searchl" placeholder="Search by last name..."/>
            <input type="submit" value="search"/>
        </form>
    </div>
    </div>
</body>
</html>