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
      <!-- FORM -->
      <div class="form_wrapper">
         <div class="form_container">
            <div class="title_container">
               <h2>Rebote Moving</h2>
            </div>
            <div class="row clearfix">
               <form action='' method='POST'>
                  <label>Type the Direction you want to delete : </label><br/>
                  <input type="number" name="id" ><br/>
                  <input type="submit" value="Delete Data">
               </form>
            </div>
         </div>
      </div>
      
      <?php
         $host =  "localhost";
         $db = "mydb"; 
         $username = "root";
         $password = ""; 
         $con = new PDO("mysql:host=$host;dbname=$db",$username,$password); 
         
         if(isset($_POST['id'])){
           try{
             // Prepare Statement : 
             $stmnt = $con->prepare("DELETE from mydb.move_button
                                     where id=:id");
             // Bind Parameters : 
             $stmnt->bindparam(':id',$_POST['id']);
             // Execute Statement ; 
             $stmnt->execute();
             echo " Data Deleted Successfuly :) ";
           }catch(PDOException $e){
                 echo " Error : ". $e->getMessage();
           }
           }
           $conn = null;
         ?>
   </body>
</html>