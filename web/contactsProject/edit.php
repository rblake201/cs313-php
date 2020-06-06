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