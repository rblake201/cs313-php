<?php

session_start();


?>

<h1 style="text-align: center">Order Confirmation</h1>

<?php

if (isset($_POST['submit'])) { 
    echo "<h3>Shipping address: "."<br>";
    echo $_POST["address"]."<br>";
    echo $_POST['city'].", ";
    echo $_POST['state']." ";
    echo $_POST['zipcode'];  
    echo "<br><br>"."Purchased items:"."<br>";
    if (!empty($_SESSION['cart'])){
        foreach ($_SESSION['cart'] as $value) {
            echo $value."<br>";
        }
    }
    echo "</h3>";
} 

?>