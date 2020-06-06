<?php

require "databaseConnect.php";
$db = getDb();

if(isset($_POST['edit'])){
    $searchq = $_POST['edit'];
    $GLOBALS['a'] = $_POST['edit'];

    $searchi = $db->query("SELECT * FROM contact AS u JOIN info AS n ON u.id = n.contact_id WHERE contact_id= '" . $searchq . "';");
    while ($row = $searchi->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr><td>" . $row["first_name"]. "</td><td>" . $row["last_name"] . "</td><td>" . $row["phone"] . "</td><td>" . $row["personal_email"] . "</td><td>"
        . $row["work_email"] . "</td><td>" . $row["facebook"] . "</td><td>" . $row["instagram"] . "</td><td>" . $row["discord"] . "</td></tr>";
    }
}

if(isset($_POST['posted'])){
    $addfn = $_POST['addfn'];
    $addln = $_POST['addln'];
    $addpn = $_POST['addpn'];
    $addpe = $_POST['addpe'];
    $addwe = $_POST['addwe'];
    $addfan = $_POST['addfan'];
    $addin = $_POST['addin'];
    $adddn = $_POST['adddn'];

    var_dump $GLOBALS['a'];

    // $query = "UPDATE contact SET first_name = ".$addfn.",
    //                              last_name = ".$addln." WHERE id= " . $searchq . ";";
    
    // $query1 = "UPDATE info SET phone = ".$addpn."
    //                            personal_email = ".$addpe."
    //                            work_email = ".$addwe."
    //                            facebook =  ".$addfan."
    //                            instagram = ".$addin."
    //                            discord = ".$adddn."
    //            WHERE contact_id= " . $searchq . ";";

    // $edit = $db->query($query);
    // $edit1 = $db->query($query1);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
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
        .center {
            margin: auto;
            width: 50%;
        }
        h1 {
            text-align: center;
            font: arial;
        }
    </style>
</head>
<body>
<div class="center">
<h1>Edit Contact</h1>
<form name="editform" action="edit.php" method="post">
    <input type="hidden" name="posted" value=true>
    <input type="text" name="addfn" placeholder="Enter first name..."/><br>
    <input type="text" name="addln" placeholder="Enter last name..."/><br>
    <input type="text" name="addpn" placeholder="Enter phone number..."/><br>
    <input type="text" name="addpe" placeholder="Enter personal email..."/><br>
    <input type="text" name="addwe" placeholder="Enter work email..."/><br>
    <input type="text" name="addfan" placeholder="Enter facebook name..."/><br>
    <input type="text" name="addin" placeholder="Enter instagram name..."/><br>
    <input type="text" name="adddn" placeholder="Enter discord name..."/><br>
    <input type="submit" value="Save"/>
</form>
</div>
</body>
</html>