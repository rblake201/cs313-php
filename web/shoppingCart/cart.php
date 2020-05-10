<?php

session_start();

?>

<h1 style="text-align: center">Shopping Cart</h1>

<?php

if(array_key_exists('clear',$_POST)){
    clearCart();
    header("Refresh:0");
}

if(array_key_exists('clearApple',$_POST)){
    clearApple();
    header("Refresh:0");
}

if(array_key_exists('clearOrange',$_POST)){
    clearOrange();
    header("Refresh:0");
}

if(array_key_exists('clearBanana',$_POST)){
    clearBanana();
    header("Refresh:0");
}

function clearCart(){
    session_unset();
}

function clearApple(){
    if (($key = array_search('apple', $_SESSION['cart'])) !== false) {
        unset($_SESSION['cart'][$key]);
    }
}

function clearOrange(){
    if (($key = array_search('orange', $_SESSION['cart'])) !== false) {
        unset($_SESSION['cart'][$key]);
    }
}

function clearBanana(){
    if (($key = array_search('banana', $_SESSION['cart'])) !== false) {
        unset($_SESSION['cart'][$key]);
    }
}

if (!empty($_SESSION['cart'])){
    foreach ($_SESSION['cart'] as $value) {
        echo "<h3>".$value."<br><h3>";
    }
}

if (empty($_SESSION['cart'])){
    echo "your cart is empty<br><br>";
}

?>

<form method="post">
    <input type="submit" value="remove apple" name="clearApple" id="clearApple">
    <input type="submit" value="remove orange" name="clearOrange" id="clearOrange">
    <input type="submit" value="remove banana" name="clearBanana" id="clearBanana"><br><br>
    <input type="submit" value="clear cart" name="clear" id="clear">
</form>

<a href="browse.php">Return to browse page</a><br><br>
<a href="checkout.php">Checkout</a>