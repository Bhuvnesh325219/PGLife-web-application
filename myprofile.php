<?php
  
  session_start();
     
  

  
  if(isset($_SESSION['username'])){
  
    $name1="Home";
    $name2="Logout";

    $href1="index.php";
    $href2="php/logout.php";
     
    $onclick=true;
    $cookie_name = "click";
    $cookie_value = $onclick;
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    
  }
  
  else{
   $href1="signup.html";
   $href2="signin.html";
   
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
         <button class="dis"><a href="<?php echo $href2;?>" id="signin"><?php echo $name2;?></a></button>
        </div>
       
       
     </div>

   <br>
   <br>
   <br>
   <br>  
   <br>
   <br>


</html>


<html>

<link rel="stylesheet" href="css/myprofilec.css">
<link rel="stylesheet" href="php/css/propertyListc.css">



   
   <div class="profile">
     
      <h1 style="margin-left: 10%;">My Profile</h1>
       
   </div>
   <br>
    <div class="details">
      <br>
      <div class="cont">
       
        <div class="pic"><img src="img/man.png" alt="" style="width: 120%; border-radius:50%; "></div>

        <div class="det">
          <div style="font-size: 30px;"><?php echo $_SESSION['username']?></div>
          <br>
          <div>Delhi</div>
          <br>
          <div><?php echo $_SESSION['college']?></div>

        </div>
        
        <div class="edit"  style="margin-top: 15%;"><a  href="">Edit profile</a></div>



      </div>


    </div>
     <br>
    <div class="interested">
    <h1 style="margin-left: 10%;">Interested Properties</h1>
    

    </div>
      

    <br><br><br>


   

    <?php
    
    





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
    
    
    
    $sql= "select * from $table";
    
    $result=mysqli_query($conn,$sql);
    
    $res =mysqli_fetch_all($result);
    $len =mysqli_num_rows($result);


    $table="interested";
    $att1="personID";
    $att2="intstr";
    
    $attp="personID";
    
    
    $existData="SELECT * FROM $table WHERE $att1='$_SESSION[$attp]';";
    $existRes=mysqli_query($conn,$existData);
    $existAns=mysqli_fetch_assoc($existRes);
    
    
   
    
    
    ?>


<script>


var num_of_properties = '<?php echo strlen($existAns['intstr']); ?>';
var arr = <?php echo json_encode($res); ?>;
var intList ='<?php echo $existAns['intstr'];?>';


for(var i=0;i<num_of_properties;i++){
  var id =intList[i]-1;
 addDiv("* *",arr[id][0],arr[id][1],arr[id][2],arr[id][3]); 

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
        '<div class="view"><form  style="height:5px;" method="post" action="php/propertDetail.php">'+
        '<input type="text" name="cityid" value="'+propid+'" style="display:none;" >'+
        '<button type="submit" style="color: rgb(15, 152, 190);">View</button>'+
      '</form></div></div></div></div><br>' 
        
      
      }
  
  
  


</script>



     
    
     





</html>

















<html>

<link rel="stylesheet" href="css/style.css">


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