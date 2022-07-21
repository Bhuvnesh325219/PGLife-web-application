<?php
  
  session_start();
  

  if(isset($_SESSION['username'])){
  
    $name1="Hii ".$_SESSION['username'];
    $name2="Home";

    $href1="../myprofile.php";
    $href2="../index.php";
    
     


    $onclick=true;
  }
  
  else{
   $href1="../signup.html";
   $href2="../signin.html";
   
   $name1="SIGN UP";
   $name2="SIGN IN";

   }


$message = "Added in your cart";


?>







<html>

<link rel="stylesheet" href="css/style.css">




<div class="header">
        <div class="pgicon"><img src="img/logo.png" alt="" class="pgic"></div>
        <div class="gap"></div>
        <div class="bgroup">
 
        <button><a href="<?php echo $href1;?>" id="signup"><?php echo $name1;?></a></button>
         <button><a href="<?php echo $href2;?>" id="signin"><?php echo $name2;?></a></button>
        </div>
       
     </div>
     <br>
     <br>
     <br>
     <br>

</html>














<html>


<?php

 $cityid =$_POST['cityid'];

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
 

 $table=$_SESSION['city'];



 $sql= "select * from $table where propID='$cityid'";
 
 $result=mysqli_query($conn,$sql);
 

 //$res =mysqli_fetch_all($result);
 $res=mysqli_fetch_assoc($result);
 $len =mysqli_num_rows($result);
 
 


 //mysqli_close($conn);


?>











<link rel="stylesheet" href="css/propertyDetailc.css">
<link rel="stylesheet" href="css/propertyListc.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
crossorigin="anonymous">






<div class="slideshow">


<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="img/img1.jpg" alt="First slide" style="height: 400px; ">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/img2.jpg" alt="Second slide"style="height: 400px;">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/img3.jpg" alt="Third slide"style="height: 400px;">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


</div>







<br>
<br>


  
<div class="propitem">
    <div class="imgcl"><img src="img/img1.jpg" alt="" style="width: 90% ; height:100% ;margin: 5%;"></div>
  
    <div class="otcl">
      <div class="ratint">
        <div class="rating">*****</div>
        <div class="inter"><input type="checkbox" name="propID" id="<?php echo $res['propID'];?>">
         <div id="ratin"></div></div>
      </div>
      <br>
       <div class="nama">
         
        <div class="nam"><?php echo $res['name'] ?></div>
        <div class="addr"><?php echo $res['address'] ?></div>

       </div>
       <br><br><div class="rateb">
      <div class="rate">Rs <?php echo $res['price'] ?>/-</div>
      <div class="view"><form  style="height:5px;" method="post" action="propertDetail.php">
      <button type="submit" style="color: rgb(15, 152, 190);"><a href="propertyBook.php">Book Now</a></button>
    </form></div></div></div></div><br>






<br><br>

<div class="amenities">
  <div><h3 class="amen">Amenities</h3></div>
  <br>
 
  <ul style="margin-left: 550px;">
  <li><?php echo $res['amen1'] ?></li>
  <li><?php echo $res['amen2'] ?></li>
  <li><?php echo $res['amen3'] ?></li>
  <li><?php echo $res['amen4'] ?></li>
  <li><?php echo $res['amen5'] ?></li>
  <li><?php echo $res['amen6'] ?></li>
</ul>



</div>

<br><br>

<div class="about">
<div><h3 class="head">About</h3></div>
<br>
<div class="ab"><?php echo $res['about'] ?></div>
</div>

<br><br>


<div class="about">
<div><h3 class="head">What people say</h3></div>
<br>
<div class="ab">"<?php echo $res['about'] ?>" - Karan Johar</div>
<br>
<div class="ab"><?php echo $res['about'] ?></div>

</div>





<?php


$table="interested";
$att1="personID";
$att2="intstr";

$attp="personID";
$currAns=$res['propID'];


$existData="SELECT * FROM $table WHERE $att1='$_SESSION[$attp]';";
$existRes=mysqli_query($conn,$existData);
$existAns=mysqli_fetch_assoc($existRes);


if($existAns==null){
$qur = "INSERT INTO $table VALUES ('$_SESSION[$attp]','$currAns');";
mysqli_query($conn,$qur);
}
else{
$str = "";

 

  if(!strpos(implode($str,$existAns),$currAns)){
$qur ="UPDATE $table SET $att2='$currAns$existAns[$att2]' WHERE $att1='$_SESSION[$attp]';";
mysqli_query($conn,$qur);
  }
  else{
    if(!isset($_SESSION['username'])){
    $message= "Please Login";}
    else{
      $message= "Already in your cart";
    }
    
  }
  

}



mysqli_close($conn);

?>



<script>
var clicks=0;
var check=false;
var el = document.getElementById(<?php echo $res['propID'];?>);
el.onclick=function(b){
clicks++;
check=!check;
console.log(check);

el.style.display='none';
document.getElementById("ratin").innerHTML='<?php echo $message;?>';
}


</script>












<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" 
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" 
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" 
crossorigin="anonymous"></script>






</html>




















<html>

<link rel="stylesheet" href="css/style.css">
<br>
<br>
<div class="footer">

     <div class="foot">
        
        <div class="cityname">
          <div class="cityitem">PG in delhi</div>
          <div class="cityitem">PG in Mumbai</div>
          <div class="cityitem">PG in Chennai</div>
          <div class="cityitem">PG in hyderabad</div>

        </div>
        <br>
       <div class="copy">Copyright 2022(All right reserved)</div>

       
     </div>

    </div>

</html>



