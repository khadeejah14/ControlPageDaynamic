<?php 
header("Content-Type: application/json; charset=UTF-8");
   $host =  "localhost";
   $db = "mydb"; 
   $username = "root";
   $password = ""; 
   ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Page Title</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
<body>
<h1>The Rebort Movement</h1>
      <canvas width="400" height="400" id="canvas">canvas</canvas>
      <button  value="drow" name="drow">Drow</button>

<p id="demo"></p>


<?php 

   $con = new PDO("mysql:host=$host;dbname=$db",$username,$password); 
       // Prepare Statement : 
       $statement = $con->prepare("SELECT Br,Bl,Bf FROM move_button");
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_ASSOC);
   echo json_encode($results);

   <?php
   //drow Directional data 
   if(isset($_POST['drow'])){
     echo '<center><svg height="300" width="300" style="background-color:red">
     <path d="M50,50 L50,'.$Bf.' h '.$Br.',0 Z" style="stroke: #006666; fill:none;"/>

</svg>
   }


</script>
</body>
</html>
