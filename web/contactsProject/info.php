<?php

require "databaseConnect.php";
$db = getDb();

echo "<table>
<tr>
    <th>First Name</th>
    <th>Last Name</th>
</tr>"

if(isset($_POST['search'])){
    $searchq = $_POST['search'];

    $search = $db->query("SELECT first_name, last_name FROM contact WHERE first_name= '" . $searchq . "';");
    while ($row = $search->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr><td>" . $row["first_name"]. "</td><td>" . $row["last_name"] . "</td></td>";
    }
    echo "</table>";
}

?>