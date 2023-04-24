

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<style> 
table, th, td {
  border: 1px solid black;
}

</style> 
    



<?php
session_start(); 
 include("../connection.php");

 if(isset($_GET["selected_doc"])){
    
    $selected_doc = $_GET["selected_doc"] ; 
    $_SESSION['selected_doc'] =  $selected_doc; 
echo "choose an appointment :  <br> "; 
   // echo "hiiiiiiiiiiii ur doctor's id is " . $_SESSION['selected_doc']; 
    // display the time table of the selected doctor 

 

$_SESSION['APPT_DATE'] = '' ; 
   
    $query = " SELECT  DISTINCT apptdate FROM appointments where doc_id = '$selected_doc' ORDER BY  apptdate ASC; ";
   

$result = mysqli_query($con,$query);


if($result){
echo "<table border-style='solid'>"; 


    while($row = mysqli_fetch_row($result)){
        
        echo '<tr>' ; 

       echo  "<td>". $row[0]. "</td>" ; 


       $date =  $row[0]; 
       $_SESSION['APPT_DATE'] = $date ;


       $query2 = "SELECT appttime,appt_id,patient_id FROM appointments where doc_id = '$selected_doc' and apptdate = '$date' ORDER BY appttime ASC";
       $result2 = mysqli_query($con, $query2 ); 
       
     while($row2 = mysqli_fetch_row($result2)){
        if($row2[2] == NULL ){
         $time = $row2[0];
                    // send the id of the selected appointment to confirm.php
            echo  "<td><form name='' action='confirm.php' method='GET'> <button type='submit' name='selected_slot' value=' $row2[1]'> $row2[0].</input> </form> </td>" ;
            } else {
                echo "<td>unavailable</td>";  continue; }
            
            }

      } 


      echo '</tr>' ; 

    
   }

    echo '</table> '; 

   $appt_date = $_SESSION['APPT_DATE']; 



 }

 

?> 
</body>
</html>




