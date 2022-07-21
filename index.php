
<?php
  
  session_start();
 
    $secondbt="block";


  if(isset($_SESSION['username'])){
  
    $name1="Hii ".$_SESSION['username'];
    $name2="Logout";

    $href1="myprofile.php";
    $href2="php/logout.php";

    $secondbt="none";
    
     
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






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
       
<link rel="stylesheet" href="css/style.css">
    
   
    <style>
     


     .dis{
      display: <?php  echo $secondbt;?>;
     }

    </style>





</head>
<body>
   
<script type="text/javascript">
   
</script>


  
    <div class="header">
        <div class="pgicon"><img src="img/logo.png" alt="" class="pgic"></div>
        <div class="gap"></div>
        <div class="bgroup">
 
         <button><a href="<?php echo $href1;?>" id="signup"><?php echo $name1;?></a></button>
         <button class="dis"><a href="<?php echo $href2;?>" id="signin"><?php echo $name2;?></a></button>
  
        </div>
       
       
     </div>

     

     



     



    
    
    <div class="container" style="background-image: url(img/bg.png);">
          
       



      <div class="content">
        <div class="txt">Happiness is near to you</div>
        <br>
        
        <div class="search">
            <form  method="post" action="php/propertyList.php">
                <input type="text" name="city" placeholder="Enter your city name" style="width:350px ;height: 30px; background: none; ">
                
                <button type="submit">Search</button>
                
              </form>
           
        </div>
      </div>
    

        
    </div>

    








   <div class="page">

      <div class="insbox">
         
       <div class="info">Major Cities</div>
       <br>
       <br>
       <div class="cities">
       <div class="item"><img src="img/delhi.png" alt="" width="150px"></div>
       <div class="item"><img src="img/mumbai.png" alt=""  width="150px"></div>
      
       <div class="item"><img src="img/chennai.png" alt=""  width="150px"></div>
       <div class="item"><img src="img/hyderabad.png" alt="" width="150px"></div>
      
       </div>
      </div>
      


   </div>






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



</body>
</html>