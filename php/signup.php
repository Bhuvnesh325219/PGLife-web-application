<html>

<?php




$name=$_POST['name'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$password=$_POST['password'];
$college=$_POST['college'];
$gender=$_POST['gender'];


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

$insert=true;


for( $row=0;$row<$len;$row++){
  if($res[$row][3]==$email){
    $insert=false;
    break;
  }
  
}


$result="";

if($insert){

$insql = "INSERT INTO $table VALUES ('$len+1','$name','$phone','$email','$college','$gender','','$password');";
$result=mysqli_query($conn,$insql);
}
else{
  echo "Email already exist";
}



if($result){
    session_start();
    $_SESSION['username']=$name;
    $_SESSION['college']=$college;
    $_SESSION['personID']=$len+1;
    $toast= $_SESSION['username']. "Your account is created";
    header("Location: ../index.php");
}
else{
    $toast="Something wrong";
}

echo $toast;


mysqli_close($conn);



?>



<script>




</script>







</html>