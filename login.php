<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/animations.css">  
    <link rel="stylesheet" href="css/main.css">  
    <link rel="stylesheet" href="css/login.css">
        
    <title>Login</title>

    
    
</head>
<body>
    <?php

    //learn from w3schools.com
    //Unset all the server side variables

    session_start();

    $_SESSION["user"]="";
   


    

    //import database
    include("connection.php");





if(isset($_POST['Login'])){
    $error='<label for="promter" class="form-label"></label>'; 
    $email = $_POST["useremail"];  
    $password = $_POST["userpassword"];  
      
        //to prevent from mysqli injection  
        $email = stripcslashes($email);  
        $password = stripcslashes($password);  
        $email = mysqli_real_escape_string($con, $email);  
        $password = mysqli_real_escape_string($con, $password);  

        $sql_0 = "select * from patients where p_email='$email'";
        $email_exist = mysqli_query($con,$sql_0);

       if (mysqli_num_rows($email_exist)== 1){
        $sql = "select * from patients where p_email = '$email' and patient_pass ='$password'; " ;  
        $result = mysqli_query($con, $sql) or die('there is error in the sql query'); 

        $records = mysqli_num_rows($result);

        if($records == 1){  
            echo "Login successful ";  
           
                   
                    //   Patient dashbord
                    $_SESSION['user']=$email;
                    $_SESSION['usertype']='p';

                   
                    while($row = mysqli_fetch_row($result)){
                            $_SESSION['name'] = $row[1]; 
                            $_SESSION['age'] = $row[2]; 
                            $_SESSION['phone'] = $row[3]; 
                            $_SESSION['insurance'] = $row[4]; 
                    }

                    
                    header('location: patient/index.php');

                }else{
                    $error='<label for="" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Wrong credentials: Invalid email or password</label>';
                        echo $error; 
                }

          
        }   else{
        echo '<label for="" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">We cant find any acount for this email.</label>';
    }

      
}

    

    ?>





    <center>
    <div class="container">
        <table border="0" style="margin: 0;padding: 0;width: 60%;">
            <tr>
                <td>
                    <p class="header-text">Welcome Back!</p>
                </td>
            </tr>
        <div class="form-body">
            <tr>
                <td>
                    <p class="sub-text">Login with your details to continue</p>
                </td>
            </tr>
            <tr>
                <form name= "login_form" action="" method="POST" >
                <td class="label-td">
                    <label for="useremail" class="form-label">Email: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td">
                    <input type="email" name="useremail" class="input-text" placeholder="Email Address" required>
                </td>
            </tr>
            <tr>
                <td class="label-td">
                    <label for="userpassword" class="form-label">Password: </label>
                </td>
            </tr>

            <tr>
                <td class="label-td">
                    <input type="Password" name="userpassword" class="input-text" placeholder="Password" required>
                </td>
            </tr>


            <tr>
                <td><br>
                
                </td>
            </tr>

            <tr>
                <td>
                    <input type="submit" value="Login" name="Login" class="login-btn btn-primary btn">
                </td>
            </tr>
        </div>
            <tr>
                <td>
                    <br>
                    <label for="" class="sub-text" style="font-weight: 280;">Don't have an account&#63; </label>
                    <a href="signup.php" class="hover-link1 non-style-link">Sign Up</a>
                    <br><br><br>
                </td>
            </tr>
                        
                        
    
                        
                    </form>
        </table>

    </div>
</center>
</body>
</html>