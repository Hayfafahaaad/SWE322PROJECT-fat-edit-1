

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

 if(isset($_GET["selected_doc"])){
    
    $selected_doc = $_GET["selected_doc"] ; 
    $_SESSION['selected_doc'] =  $selected_doc; 

   // echo "hiiiiiiiiiiii ur doctor's id is " . $_SESSION['selected_doc']; 
    // display the time table of the selected doctor 

 

$_SESSION['APPT_DATE'] = '' ; 
   
    $query = " SELECT  DISTINCT apptdate FROM appointments where doc_id = '$selected_doc' ORDER BY  apptdate ASC; ";
   

$result = mysqli_query($con,$query);

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
                            <h3>Choose an appointment:</h3>

                            <?php
                            
if($result){
    echo "<table border='2' class='gridtable'><tr>";
                        echo "<td> Date </td>" ; 
                        
 
    
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
                echo  "<td><form name='' action='confirm.php' method='GET'> <button type='submit' name='selected_slot' class='time-btn btn-primary-soft btn' value=' $row2[1]'> $row2[0].</input> </form> </td>" ;
                
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




