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
            color: black;
            font-family: monospace;
            font-size: 25px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2
        }
        * {
             box-sizing: border-box;
        }
        .column {
            float: left;
            width: 33.33%;
            padding: 10px;
            height: 300px;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        @media only screen and (max-width: 1200px) {
                .column {
                float: left;
                height: 33.33%;
                padding: 10px;
                width: 400px;
            }

            .row:after {
                content: "";
                display: table;
                clear: both;
            }
        }

        input[type=text], select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        h3, h1 {
            text-align: center;
            font: arial;
        }
    </style>
</head>
<body>
    <h1>Contacts</h1>
    <div class="row">
    <div class="column">
    <h3>Contacts List</h3>
    <div style="overflow:auto; height:550px;">
        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Info</th>
                <th>Delete</th>
            </tr>
            <?php
            $result = $db->query("SELECT * FROM contact ORDER BY first_name ASC");
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    echo "<form name='infoForm_$i' action='info.php' method='post'>";
                    $id = $row[id];

                    echo "<tr><td>" . $row["first_name"]. "</td><td>" . $row["last_name"] . "</td><td>" . "<input type='hidden' name='info' value='$id'>
                                                                                                           <input type='submit' value='Info'/>"
                                                                                          . "</td><td>" . "</form>" . "<form name='deleteForm_$i' action='contacts.php' method='post'>" .
                                                                                                          "<input type='hidden' name='delete' value='$id'>
                                                                                                           <input type='submit' value='Delete'/>" . "</td></tr>";

                    echo '</form>';
                }
                echo '</table>';
            ?>
    </div>
    </div>
    <div class="column">
    <h3>Search</h3>
        <form action="info.php" method="post">
            <input type="text" name="searchf" placeholder="Search by first name..."/><br>
            <input type="text" name="searchl" placeholder="Search by last name..."/><br>
            <input type="submit" value="Search"/>
        </form>
    </div>
    <div class="column">
    <h3>Add contact</h3>
        <form name="addform" action="contacts.php" method="post">
            <input type="hidden" name="posted" value=true>
            <input type="text" name="addfn" placeholder="Enter first name..."/><br>
            <input type="text" name="addln" placeholder="Enter last name..."/><br>
            <input type="text" name="addpn" placeholder="Enter phone number..."/><br>
            <input type="text" name="addpe" placeholder="Enter personal email..."/><br>
            <input type="text" name="addwe" placeholder="Enter work email..."/><br>
            <input type="text" name="addfan" placeholder="Enter facebook name..."/><br>
            <input type="text" name="addin" placeholder="Enter instagram name..."/><br>
            <input type="text" name="adddn" placeholder="Enter discord name..."/><br>
            <input type="submit" value="Add"/>
        </form>
    </div>
    </div>
</body>
</html>

<?php

    if(isset($_POST['posted']))
    {
        if($_POST['addfn'] == '')
        {
            echo '<script>alert("Please enter first name")</script>';
        }
        else
        {

        
            $addfn = $_POST['addfn'];
            $addln = $_POST['addln'];
            $addpn = $_POST['addpn'];
            $addpe = $_POST['addpe'];
            $addwe = $_POST['addwe'];
            $addfan = $_POST['addfan'];
            $addin = $_POST['addin'];
            $adddn = $_POST['adddn'];

            $query = "WITH new_contact AS (
                        INSERT INTO contact(first_name, last_name) VALUES ('".$addfn."','".$addln."') RETURNING id)
                        INSERT INTO info (contact_id, phone, personal_email, work_email, facebook, instagram, discord)
                        SELECT id, '".$addpn."', '".$addpe."', '".$addwe."', '".$addfan."', '".$addin."', '".$adddn."'
                        FROM new_contact;";


            $result = $db->query($query);

            echo '<script>alert("Contact Added!")</script>';

            header("Refresh:0");
        }
    }

    if(isset($_POST['delete'])){
        $searchq = $_POST['delete'];
    
        $delete = $db->query("DELETE FROM info WHERE contact_id= " . $searchq . ";");
        $delete1 = $db->query("DELETE FROM contact WHERE id= " . $searchq . ";");

        echo '<script>alert("Contact Deleted!")</script>';
    
        header("Refresh:0");
    }
?>