<?php

session_start();
require "databaseConnect.php";
$db = getDb();

if(isset($_POST['edit'])){
    $searchq = $_POST['edit'];
    $_SESSION['edit'] = $_POST['edit'];

    $searchi = $db->query("SELECT * FROM contact AS u JOIN info AS n ON u.id = n.contact_id WHERE contact_id= '" . $searchq . "';");
    while ($row = $searchi->fetch(PDO::FETCH_ASSOC)) {
        $_SESSION['fn'] = $row["first_name"];
        $_SESSION['ln'] = $row["last_name"];
        $_SESSION['pn'] = $row["phone"];
        $_SESSION['pe'] = $row["personal_email"];
        $_SESSION['we'] = $row["work_email"];
        $_SESSION['fa'] = $row["facebook"];
        $_SESSION['in'] = $row["instagram"];
        $_SESSION['di'] = $row["discord"];
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

    $searchq = $_SESSION['edit'];

    $query = "UPDATE contact SET first_name = '".$addfn."',
                                 last_name = '".$addln."' WHERE id= " . $searchq . ";";
    
    $query1 = "UPDATE info SET phone = '".$addpn."',
                               personal_email = '".$addpe."',
                               work_email = '".$addwe."',
                               facebook =  '".$addfan."',
                               instagram = '".$addin."',
                               discord = '".$adddn."'
               WHERE contact_id= " . $searchq . ";";

    $edit = $db->query($query);
    $edit1 = $db->query($query1);

    echo "<script type='text/javascript'>alert('Contact Updated!');</script>";

    echo "<script type='text/javascript'> document.location = 'redirect.php'; </script>";
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
        label {
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="center">
<h1>Edit Contact</h1>
<form name="editform" action="edit.php" method="post">
    <input type="hidden" name="posted" value=true>
    <label>First name: <input type="text" name="addfn" value="<?php echo $_SESSION['fn']; ?>"/></label><br>
    <label>Last name: <input type="text" name="addln" value="<?php echo $_SESSION['ln']; ?>"/></label><br>
    <label>Phone number:<input type="text" name="addpn" value="<?php echo $_SESSION['pn']; ?>"/></label><br>
    <label>Personal Email: <input type="text" name="addpe" value="<?php echo $_SESSION['pe']; ?>"/></label><br>
    <label>Work Email: <input type="text" name="addwe" value="<?php echo $_SESSION['we']; ?>"/></label><br>
    <label>Facebook name: <input type="text" name="addfan" value="<?php echo $_SESSION['fa']; ?>"/></label><br>
    <label>Instagram name: <input type="text" name="addin" value="<?php echo $_SESSION['in']; ?>"/></label><br>
    <label>Discord name: <input type="text" name="adddn" value="<?php echo $_SESSION['di']; ?>"/></label><br>
    <label> <input type="submit" value="Save"/>
</form>
</div>
</body>
</html>