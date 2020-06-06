<?php

require "databaseConnect.php";
$db = getDb();

?>

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
    <input type="submit" value="Add"/>
</form>