<?php

if(isset($_GET['msg'])){
    $msg=$_GET['msg'];
    if($msg=="add"){
        echo '<script>alert("Contact Added!")</script>';
        header('Location: contacts.php');
    }
    else if($msg=="delete"){
        echo '<script>alert("Contact Deleted!")</script>';
        header('Location: contacts.php');
    }
    else if($msg=="edit"){
        echo '<script>alert("Contact Edited!")</script>';
        header('Location: contacts.php');
    }
}

?>