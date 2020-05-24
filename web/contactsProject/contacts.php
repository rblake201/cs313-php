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
    <div style="height:100px;width:500px;overflow:auto;">
        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
            </tr>
            <?php
            $result = $db->query("SELECT * FROM contact");
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr><td>" . $row["first_name"]. "</td><td>" . $row["last_name"] . "</td></tr>" . "<form action="info.php" method="post">
                                                                                                            <input type="hidden" name="$row[id]">
                                                                                                            <input type="submit"value="Info"/>
                                                                                                            </form>";
                }
                echo '</table>';
            ?>
    </div>
    <h3>Search</h3>
    <div style="width:500px;overflow:auto;">
        <form action="info.php" method="post">
            <input type="text" name="searchf" placeholder="Search by first name..."/>
            <input type="text" name="searchl" placeholder="Search by last name..."/>
            <input type="submit" value="search"/>
        </form>
    </div>
</body>
</html>