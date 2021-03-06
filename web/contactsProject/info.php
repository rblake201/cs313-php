<?php

require "databaseConnect.php";
$db = getDb();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Info</title>
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
    </style>
</head>
<body>
    <a href="contacts.php">Contacts</a>
    <h1 style="text-align: center">Contact Info</h1>
</body>
</html>

<?php

echo "<table>
<tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Phone Number</th>
    <th>Personal Email</th>
    <th>Work Email</th>
    <th>Facebook</th>
    <th>Instagram</th>
    <th>Discord</th>
</tr>";

if($_POST['searchf'] !== '' && $_POST['searchl'] !== ''){
    $searchqf = $_POST['searchf'];
    $searchql = $_POST['searchl'];

    $search = $db->query("SELECT * FROM contact AS u JOIN info AS n ON u.id = n.contact_id WHERE last_name= '" . $searchql . "' AND first_name= '" . $searchqf . "';");
    while ($row = $search->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr><td>" . $row["first_name"]. "</td><td>" . $row["last_name"] . "</td><td>" . $row["phone"] . "</td><td>" . $row["personal_email"] . "</td><td>"
        . $row["work_email"] . "</td><td>" . $row["facebook"] . "</td><td>" . $row["instagram"] . "</td><td>" . $row["discord"] . "</td></tr>";
    }

}
else if($_POST['searchl'] !== ''){
    $searchq = $_POST['searchl'];

    $searchl = $db->query("SELECT * FROM contact AS u JOIN info AS n ON u.id = n.contact_id WHERE last_name= '" . $searchq . "' ;");
    while ($row = $searchl->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr><td>" . $row["first_name"]. "</td><td>" . $row["last_name"] . "</td><td>" . $row["phone"] . "</td><td>" . $row["personal_email"] . "</td><td>"
        . $row["work_email"] . "</td><td>" . $row["facebook"] . "</td><td>" . $row["instagram"] . "</td><td>" . $row["discord"] . "</td></tr>";
    }

}
else if($_POST['searchf'] !== ''){
    $searchq = $_POST['searchf'];

    $searchf = $db->query("SELECT * FROM contact AS u JOIN info AS n ON u.id = n.contact_id WHERE first_name= '" . $searchq . "';");
    while ($row = $searchf->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr><td>" . $row["first_name"]. "</td><td>" . $row["last_name"] . "</td><td>" . $row["phone"] . "</td><td>" . $row["personal_email"] . "</td><td>"
        . $row["work_email"] . "</td><td>" . $row["facebook"] . "</td><td>" . $row["instagram"] . "</td><td>" . $row["discord"] . "</td></tr>";
    }
}

if(isset($_POST['info'])){
    $searchq = $_POST['info'];

    $searchi = $db->query("SELECT * FROM contact AS u JOIN info AS n ON u.id = n.contact_id WHERE contact_id= '" . $searchq . "';");
    while ($row = $searchi->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr><td>" . $row["first_name"]. "</td><td>" . $row["last_name"] . "</td><td>" . $row["phone"] . "</td><td>" . $row["personal_email"] . "</td><td>"
        . $row["work_email"] . "</td><td>" . $row["facebook"] . "</td><td>" . $row["instagram"] . "</td><td>" . $row["discord"] . "</td></tr>";
    }
}

echo "</table>";

?>