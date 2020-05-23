<?php

require "databaseConnect.php";
$db = getDb();

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

if(isset($_POST['search'])){
    $searchq = $_POST['search'];

    $search = $db->query("SELECT * FROM contact AS u JOIN info AS n ON u.id = n.contact_id WHERE first_name= '" . $searchq . "';");
    while ($row = $search->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr><td>" . $row["first_name"]. "</td><td>" . $row["last_name"] . "</td><td>" . $row["phone"] . "</td><td>" . $row["personal_email"] . "</td><td>"
        . $row["work_email"] . "</td><td>" . $row["facebook"] . "</td><td>" . $row["instagram"] . "</td><td>" . $row["discord"] . "</td></td>";
    }
    echo "</table>";
}

?>