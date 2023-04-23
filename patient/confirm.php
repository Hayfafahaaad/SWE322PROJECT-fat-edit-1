<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php 
session_start(); 
include("../connection.php");

if(isset($_GET["selected_slot"])){
    $appt_id = $_GET["selected_slot"] ; 
    $_SESSION['appt_id'] = $appt_id;  
   
    echo "hiiiiiiiiiiii ur appt id  is  " . $appt_id . "<br> "; 
    // display the time and date of the appointment 

    $appt_query = "select apptdate,appttime from appointments where appt_id = $appt_id"; 
    $result_appt_query = mysqli_query($con, $appt_query); 

    while($row = mysqli_fetch_row($result_appt_query)){
            echo 'date : '. $row[0]. '<br> '; 
            echo 'time : '. $row[1]. '<br> '; 


    }
      
    

   
      echo 'doctor id :' . $_SESSION['selected_doc'].'<br> '  ; 
        $doc_id = $_SESSION['selected_doc']; 
      $query = "SELECT * from doctors where doc_id = '$doc_id' "; 
        $result = mysqli_query($con, $query); 

       while( $row = mysqli_fetch_row($result)){

            echo "doctor name" . $row[1]. "<br> ";
            echo "doctor specialty" . $row[3]. "<br> ";

       }

        


        echo 'patient age ' . $_SESSION['age'] .'<br> '  ; 
        echo 'phone  : ' .  $_SESSION['phone'] .'<br> '  ; 
        echo ' email : '  . $_SESSION['user'] .'<br> ' ;
        echo ' insurance : ' . $_SESSION['insurance'].'<br> '  ;   

    } 


      // insert patient id into patient table 
       
        $appt_id = $_SESSION['appt_id'] ; 

       echo "<form name='' action='' method='GET' > <button name='confirm_appt' type='submit' value='$appt_id' > confirm </button> </form> "; 





       if(isset($_GET['confirm_appt'])){
            $appt_id = $_GET['confirm_appt'] ; 
             

        $p_email =  $_SESSION['user'] ; 
        $query2 = "select patient_id from patients where p_email = '$p_email' "; 
        $result2 = mysqli_query($con, $query2); 

      while ( $row2 = mysqli_fetch_row($result2)){
        $p_id = $row2[0]; 
             $make_appt =  "update  appointments  set patient_id = $p_id  where appt_id = $appt_id;"  ;  
             mysqli_query($con,$make_appt) or die('not working'); 


            
       }

       header('location: index.php'); 

    } 
 


?>
    
</body>
</html>
