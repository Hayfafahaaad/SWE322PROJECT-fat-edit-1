<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/admin.css">
    <title>Document</title>
</head>
<body>

<style> 
       .dashbord-tables{
            animation: transitionIn-Y-over 0.5s;
        }
        .filter-container{
            animation: transitionIn-Y-bottom  0.5s;
        }
        .sub-table,.anime{
            animation: transitionIn-Y-bottom 0.5s;
        }



</style> 

<?php 
session_start(); 
include("../connection.php");

if(isset($_GET["selected_slot"])){
    $appt_id = $_GET["selected_slot"] ; 
    $_SESSION['appt_id'] = $appt_id;  
   
    
    // display the time and date of the appointment 

    $appt_query = "select apptdate,appttime from appointments where appt_id = $appt_id"; 
    $result_appt_query = mysqli_query($con, $appt_query); 
?>


<div class="container">
        <div class="menu">
            <table class="menu-container" border="0">
                <tr>
                    <td style="padding:10px" colspan="2">
                        <table border="0" class="profile-container">
                            <tr>
                                <td width="30%" style="padding-left:21px" >
                                </td>
                                <td style="padding:0px;margin:0px;">
                                    <p class="profile-title"><?php echo  $_SESSION['name']  ?>..</p>
                                    <p class="profile-subtitle"><?php echo $_SESSION['user']  ?></p>
                                    <p class="profile-subtitle">Age: <?php echo $_SESSION['age']  ?></p>
                                    <p class="profile-subtitle">Phone: <?php echo $_SESSION['phone']  ?></p>
                                    <p class="profile-subtitle">Insurance: <?php echo $_SESSION['insurance']  ?></p>
                                </td>
                            </tr>

                    </table>
                    </td>
                </tr>
                <td class="menu-btn menu-icon-session">
                        <a href="index.php" class="non-style-link-menu"><div><p class="menu-text">Home</p></a></div></a>
                        
                    </td>
                </tr>
                
                
                <tr class="menu-row" >
                <td class="menu-btn menu-icon-home menu-active menu-icon-home-active" >
                        <a href="mybookings.php" class="non-style-link-menu non-style-link-menu-active"><div><p class="menu-text">My Appointments</p></div></a>
                    </td>
                </tr>
                <tr>
                                <td class="menu-btn menu-icon-session">
                                    <a href="../logout.php" class="non-style-link-menu"><div><p class="menu-text">Log Out</p></div></a>
                                </td>
                            </tr>
                
                
                
            </table>
        </div>
        <div class="dash-body" style="margin-top: 15px">
            <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;" >
                        
                        <tr >
                            
                            <td colspan="1" class="nav-bar" >
                            <p style="font-size: 23px;padding-left:12px;font-weight: 600;margin-left:20px;">Appointments</p>
                          
                            </td>
                            <td width="25%">

                            </td>
                            <td width="15%">
                                <p style="font-size: 14px;color: rgb(119, 119, 119);padding: 0;margin: 0;text-align: right;">
                                    Today's Date
                                </p>
                                <p class="heading-sub12" style="padding: 0;margin: 0;">
                                    <?php 
                                date_default_timezone_set('Asia/Riyadh');
        
                                $today = date('Y-m-d');
                                echo $today;

                         
                                ?>
                                </p>
                            </td>
                            <td width="10%">
                            </td>
        
        
                        </tr>
                <tr>
                    <td colspan="4" >
                        
                    <center>
                    <table class="filter-container doctor-header patient-header" style="border: none;width:95%" border="0" >
                    <tr>
                        <td >
                            <h3>Confirm appointment:</h3>







<?php
    while($row = mysqli_fetch_row($result_appt_query)){
            echo 'Date : '. $row[0]. '<br> '; 
            echo 'Time : '. $row[1]. '<br> '; 


    }
      
    

      echo "Appointment ID:" . $appt_id . "<br> "; 
      echo 'Doctor ID :' . $_SESSION['selected_doc'].'<br> '  ; 
        $doc_id = $_SESSION['selected_doc']; 
      $query = "SELECT * from doctors where doc_id = '$doc_id' "; 
        $result = mysqli_query($con, $query); 

       while( $row = mysqli_fetch_row($result)){

            echo "Doctor Name: " . $row[1]. "<br> ";
            echo "Doctor Specialty: " . $row[3]. "<br> ";

       }

        

       
  

    } 


      // insert patient id into patient table 
       
        $appt_id = $_SESSION['appt_id'] ; 

       echo "<form name='' action='' method='GET' > <button name='confirm_appt' type='submit' class='sub-btn btn-primary-soft btn' value='$appt_id' > confirm </button> </form> "; 





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
