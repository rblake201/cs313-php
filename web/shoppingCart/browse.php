<?php

function addApple()
{
   session_start();

   if (empty($_SESSION['cart'])){
       $_SESSION['cart'] = array();
   }

   array_push($_SESSION['cart'], 'apple');

   $message = "apple added to cart";
   echo "<script type='text/javascript'>alert('$message');</script>";
}

function addOrange()
{
    session_start();

    if (empty($_SESSION['cart'])){
        $_SESSION['cart'] = array();
    }

    array_push($_SESSION['cart'], 'orange');

    $message = "orange added to cart";
    echo "<script type='text/javascript'>alert('$message');</script>";
}

function addBanana()
{
    session_start();

    if (empty($_SESSION['cart'])){
        $_SESSION['cart'] = array();
    }

    array_push($_SESSION['cart'], 'banana');

    $message = "banana added to cart";
    echo "<script type='text/javascript'>alert('$message');</script>";
}

if(array_key_exists('apple',$_POST)){
    addApple();
}

if(array_key_exists('orange',$_POST)){
    addOrange();
}

if(array_key_exists('banana',$_POST)){
    addBanana();
}
 

?>

<h1 style="text-align: center">Fruit Store</h1>

<form method="post">
    <div>
        <h3>Apple</h3>
        <input type="submit" value="add to cart" name="apple" id="apple">
    </div>
    <div>
        <h3>Orange</h3>
        <input type="submit" value="add to cart" name="orange" id="orange">
    </div>
    <div>
        <h3>Banana</h3>
        <input type="submit" value="add to cart" name="banana" id="banana">
    </div>
    <br>
        <h3>
        <a href="cart.php">View cart</a>
        </h3>
    </div>
</form>