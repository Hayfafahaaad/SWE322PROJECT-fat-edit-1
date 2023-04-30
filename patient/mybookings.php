
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
                            <h3>Confirmed:</h3>
<?php
    while ($row2 = mysqli_fetch_row($find_my_bookings)){
        
        echo "<table border='2' class='gridtable'><tr>";
        echo "<td> Appointment id: $row2[0]" ; 
        echo "<td> Patient ID: $row2[1]";
        echo "<td> Date: $row2[3]";
        echo "<td> Time: $row2[4]";
        echo "<td> Doctor's Name: $row2[6]";
        echo "</td>";
       echo "</tr>";
       echo "</table>";
        
        
        echo "<form name='' action='mybookings.php' method='GET'><button name='delete' class='delete-btn btn-primary-soft btn' type='submit' value='$row2[0]'> Delete Appointment</button> </form> "; 
        
            
            
    if (isset($_GET['delete'])){

        $deleted_appt = $_GET['delete']; 

        $delete_sql = "UPDATE `appointments` SET `patient_id` = NULL WHERE `appointments`.`appt_id` = $deleted_appt;" ;  
        $result = mysqli_query($con, $delete_sql)or die('unable to delete'); 

        //header('location:mybookings.php');

        

    }


    }
    

?>


    

   
</body>
</html>
