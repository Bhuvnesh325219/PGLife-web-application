<?php


$email=$_POST['email'];
$password=$_POST['password'];


/*
$db_hostname="127.0.0.1";
$db_username="root";
$db_password="";
$db_name="college";
*/

$db_hostname="sql202.epizy.com";
$db_username="epiz_32134038";
$db_password="BdsPhz4hr10";
$db_name="epiz_32134038_college";






$conn=mysqli_connect($db_hostname,$db_username,$db_password,$db_name);


$table="users";


$sql= "select * from $table";
$res =mysqli_fetch_all(mysqli_query($conn,$sql));

$len=mysqli_num_rows(mysqli_query($conn,$sql));

$can=false;
$toast="";
for($row=0;$row<$len;$row++){
    if($res[$row][3]==$email && $res[$row][7]==$password){
       $can=true;
       break;
    }
  
}



if($can){
    session_start();
    $_SESSION['username']=$res[$row][1];
    $_SESSION['college']=$res[$row][4];
    $_SESSION['personID']=$res[$row][0];
    $toast= $_SESSION['username']. "Your are logged in ";
    header("Location: ../index.php");
}
else{
    $toast="Your email not registered with us";
}


echo $toast;

mysqli_close($conn);





?>