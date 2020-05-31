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
    <div>
        <form action="info.php" method="post">
            <input type="text" name="searchf" placeholder="Search by first name..."/>
            <input type="text" name="searchl" placeholder="Search by last name..."/>
            <input type="submit" value="Search"/>
        </form>
    </div>
    <h3>Add contacts</h3>
    <div>
        <form action="contacts.php" method="post">
            <input type="text" name="addfn" placeholder="Enter first name..."/>
            <input type="text" name="addln" placeholder="Enter last name..."/>
            <input type="text" name="addpn" placeholder="Enter phone number..."/>
            <input type="text" name="addpe" placeholder="Enter personal email..."/>
            <input type="text" name="addwe" placeholder="Enter work email..."/>
            <input type="text" name="addfan" placeholder="Enter facebook name..."/>
            <input type="text" name="addin" placeholder="Enter instagram name..."/>
            <input type="text" name="adddn" placeholder="Enter discord name..."/>
            <input type="submit" value="Add"/>
        </form>
    </div>
</body>
</html>

<?php
    $query = "INSERT INTO contact (first_name, last_name) VALUES ('$_POST[addfn]','$_POST[addln]');
              INSERT INTO info (contact_id, phone, personal_email, work_email, facebook, instagram, discord)
              VALUES('contact_id', '$_POST[addpn]', '$_POST[addpe]', '$_POST[addwe]', '$_POST[addfan]', '$_POST[addin]', '$_POST[adddn]');";
/*     $query = "WITH new_contact AS (
              INSERT INTO contact (first_name, last_name)
              VALUES ('$_POST[addfn]', '$_POST[addln]');
              RETURNING id
              )
              INSERT INTO info (contact_id, phone, personal_email, work_email, facebook, instagram, discord) VALUES(
              SELECT id, '$_POST[addpn]', '$_POST[addpe]', '$_POST[addwe]', '$_POST[addfan]', '$_POST[addin]', '$_POST[adddn]'
              FROM   ins0
              );" */

    $result = pg_query($db, $query);
?>