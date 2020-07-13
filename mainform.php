<?php 
   // Simple connection using PDO : 
    $host =  "localhost";
    $db = "mydb"; 
    $username = "root";
    $password = ""; 
    $con = new PDO("mysql:host=$host;dbname=$db",$username,$password); 
   
    
   ?> 
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>IOT</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="style.css">
   </head>
   <body>
      <!-- Form --> 
      <div class="form_wrapper">
         <div class="form_container">
            <div class="title_container">
               <h2>Rebote Moving</h2>
            </div>
            <div class="row clearfix">
               <form action='' method='POST' >
                  <input type="number" name="Br" placeholder="Type Right Button" class="input_field"><br/>
                  <input type="number" name="Bl" placeholder="Type Left Button"class="input_field"><br/>
                  <input type="number" name="Bf" placeholder="Type Forword Button"class="input_field"><br/>
                  <input type="submit" value="submit" name="submit">
                  <input type="submit" value="drow" name="drow">
                  <a href="view.php">
                  <input type="button" value="view" />
                  </a>
                  <a href="delet.php">
                  <input type="button" value="delet" />
                  </a>
               </form>
            </div>
         </div>
      </div>
</div>
      <?php
         //insert Directional data 
         $Bf=(int) $_POST['Bf'];
             $Br=(int) $_POST['Br'];
             $Bl=(int) $_POST['Bl'];
         if(isset($_POST['submit'])){
           try{
             // Prepare Statement : 
             $stmnt = $con->prepare("Insert Into 
             mydb.move_button(Br,Bl,Bf)
                                     values(:Br,:Bl,:Bf)");
             // Bind Parameters : 
             $stmnt->bindparam(':Br',$_POST['Br']);
             $stmnt->bindparam(':Bl',$_POST['Bl']);
             $stmnt->bindparam(':Bf',$_POST['Bf']);
           
             // Execute Statement ; 
             $stmnt->execute();
             
             echo " Data Added Successfuly :) ";
           }catch(PDOException $e){
                 echo " Error : ". $e->getMessage();
           }
           
           }
           
           elseif(isset($_POST['drow'])){
             //drow Directional data 
          
               try{ 
                // Prepare Statement : 
                $statement = $con->prepare("SELECT Br,Bl,Bf FROM move_button ORDER BY id DESC LIMIT 1");
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
           //  $Bf =  $results['Bf'];
           //  $Bl =  $results['Bl'];
           //  $Br =  $results['Br'];
            
               echo '<center><svg height="200" width="400" style="background-color:white">
               <path d="M50,50 L50,'.$Bf.' h '.$Br.',0 Z" style="stroke: #cccccc; fill:none;"/>
          
          </svg>';
             }
             catch(PDOException $e){
               echo " Error : ". $e->getMessage();
         }
           }
         
         ?>
   </body>
   
</html>