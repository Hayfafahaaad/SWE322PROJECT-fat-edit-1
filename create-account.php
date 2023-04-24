<?php

     
    include('connection.php');  
    session_start();

if(isset($_POST['signup'])){

    $email = $_POST["newemail"];  
   // $password = $_POST["password"];  
    $name = $_POST["fname"] . "  " $_POST["lname"]; ; 
    $age = $_POST["age"]; 
    $phone = $_POST["phone"]; 
    $insurance = $_POST["insurance"]; 

    $newpassword=$_POST['newpassword'];
    $cpassword=$_POST['cpassword'];
    
    if ($newpassword==$cpassword){
        $check_duplicate= "select * from patients WHERE p_email='$email'; ";
        $emailcheck = mysqli_query($con, $check_duplicate)or die('there is error in the sql query'); 
        

            if (mysqli_num_rows($emailcheck)== 1){
                $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Already have an account for this Email address.</label>';
            }else{
                $email = stripcslashes($email);  
                $cpassword = stripcslashes($cpassword);  
                $email = mysqli_real_escape_string($con, $email);  
                $password = mysqli_real_escape_string($con, $password);  
                
                $_SESSION['patient-name'] = $name ; 

                $_SESSION['age'] = $age ; 
                $_SESSION['phone']= $phone ; 
                $SESSION['insurance'] = $insurance ; 

            
                $sql = "INSERT INTO patients (patient_name,age,phone,insurance, p_email,patient_pass )  VALUES  ('$name','$age','$phone', '$insurance','$email','$cpassword' )" ;  
                $result = mysqli_query($con, $sql); 
            
            
                if($result){
                    echo "
                               
                    <div class='form'>
            <h3>You are registered successfully.</h3>
            <br/>Click here to <a href='login.php'>Login</a></div>" ;
                }
                
            }

  

   
        }else{


        // code for when the passwords dont match //
    echo 'there was an error while signing up.'; 
  
   
}
} 

?>