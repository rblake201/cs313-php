<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Activity 2</title>
</head>
<body>
    <form action = "teamActivity2.php" method = "post">
        Name: <input type="text" name="name"><br>
        E-mail: <input type="text" name="email"><br>
        Major:<br>
        <input type="radio" name="major" value="Computer Science">
        <label for="male">Computer Science</label><br>
        <input type="radio" name="major" value="Web Design and Development">
        <label for="female">Web Design and Development</label><br>
        <input type="radio" name="major" value="Computer Information Technology">
        <label for="other">Computer Information Technology</label><br>
        <input type="radio" name="major" value="Computer Engineering">
        <label for="other">Computer Engineering</label><br>
        Comments: <input type="text" name="comments"><br>
        <input type = "submit">
    </form>
</body>
</html>