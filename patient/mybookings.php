
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
//echo $_SESSION['user']; 
$p_email = $_SESSION['user']; 



$query2 = "select patient_id from patients where p_email = '$p_email' "; 
        $result2 = mysqli_query($con, $query2); 

        while($row = mysqli_fetch_row($result2)){
            $p_id = $row[0]; 
        }
    

    $bookings = "select * from appointments  inner join doctors on appointments.doc_id = doctors.doc_id where patient_id = $p_id ";
    $find_my_bookings = mysqli_query($con,$bookings) or die('appointments error'); 

    while ($row2 = mysqli_fetch_row($find_my_bookings)){
            echo "<div id='appt'>" ;
        echo '<br> <br> <br> ' ; 

        echo 'Appointment id: ' . $row2[0] .'<br> '; 
        echo 'Patient_id : ' . $row2[1] .'<br> ' ; 
        echo 'Patient name: ' . $_SESSION['name']. '<br> '; 
        echo 'Date: ' . $row2[3] .'<br> ' ; 
        echo 'Time: ' . $row2[4] .'<br> ' ; 
       
        echo "Doctor's name : " . $row2[6] .'<br> ' ; 

        echo "<form name='' action='mybookings.php' method='GET'><button name='delete' type='submit' value='$row2[0]'> delete appointment</button> </form> "; 
            echo "</div>";
            
    if (isset($_GET['delete'])){

        $deleted_appt = $_GET['delete']; 

        $delete_sql = "UPDATE `appointments` SET `patient_id` = NULL WHERE `appointments`.`appt_id` = $deleted_appt;" ;  
        $result = mysqli_query($con, $delete_sql)or die('unable to delete'); 

        //header('location:mybookings.php');

        




    }

    }

    echo "<a href='index.php' > HOME </a href > " ; 

    





?>



</body>
</html><?php
