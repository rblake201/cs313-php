<?php
    echo "Today is " . date("Y/m/d") . "<br>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <script src="homepage.js"></script>
    <link rel="stylesheet" href="homepage.css" />
</head>
<body>
    <h1>Homepage</h1>
    <p class = "assign"><a href="assignments.php">Assignments</a></p>
    <p class = "description">
        I provided a Pokedex for my homepage. I thought it would be a fun way to show my interest in both Pokemon and web development. Try clicking one of the Pokemon...
    </p>
    <br>
    <div class="flex-container" id="pokedex"></div>
</body>
</html>