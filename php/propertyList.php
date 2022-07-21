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

</html>






<html>


<?php

echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";



$city=$_POST['city'];

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


$table=$city;
$_SESSION['city']=$city;


$sql= "select * from $table";

$result=mysqli_query($conn,$sql);

$res =mysqli_fetch_all($result);
$len =mysqli_num_rows($result);


mysqli_close($conn);



?>




<link rel="stylesheet" href="css/propertyListc.css">

<script>


var num_of_properties = '<?php echo $len; ?>';
var arr = <?php echo json_encode($res); ?>;


for(var i=0;i<num_of_properties;i++){
 addDiv("* *",arr[i][0],arr[i][1],arr[i][2],arr[i][3]); 

}





function addDiv(s,propid,name,address,price){
        
    
        document.body.innerHTML+='<div class="propitem"> '+
      '<div class="imgcl"><img src="img/img1.jpg" alt="" style="width: 90% ; height:100% ;margin: 5%;"></div>'+
    
      '<div class="otcl">'+
        '<div class="ratint">'+
          '<div class="rating" id="rating">'+s+'</div>'+
          '<div class="inter"><input type="checkbox" name="accept" style="display:none;"></div>'+
        '</div>'+
        '<br>'+
         '<div class="nama">'+
           
          '<div class="nam" >'+name+'</div>'+
          '<div class="addr" name="address">'+address+'</div>'+
  
         '</div>'+
         '<br><br><div class="rateb">'+
        '<div class="rate">'+price+'/</div>'+
        '<div class="view"><form  style="height:5px;" method="post" action="propertDetail.php">'+
        '<input type="text" name="cityid" value="'+propid+'" style="display:none;" >'+
        '<button type="submit" style="color: rgb(15, 152, 190);">View</button>'+
      '</form></div></div></div></div><br>' 
        
      
      }
  
  
  




</script>










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