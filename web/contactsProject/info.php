<?php

if(isset($_POST['search'])){
    $searchq = $_POST['search'];

    $search = $db->query("SELECT * FROM contact WHERE first_name = $searchq ");
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr><td>" . $row["first_name"]. "</td></td>";
    }
    echo '</table>';
    echo "hello";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
        </tr>
</body>
</html>