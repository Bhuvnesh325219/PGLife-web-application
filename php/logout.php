<?php

session_start();

$oncl =$_COOKIE['click'];

if($oncl){
    session_destroy();
    echo "You are logged out";
}

echo "<br>";


header("Location: ../index.php");

?>

<html>


</html>