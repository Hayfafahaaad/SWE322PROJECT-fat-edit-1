<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/animations.css">  
    <link rel="stylesheet" href="css/main.css">  
    <link rel="stylesheet" href="css/signup.css">
        
    <title>Sign Up</title>
    
</head>
<body>




    <center>
    <div class="container">
        <table border="0">
            <tr>
                <td colspan="2">
                    <p class="header-text">Let's Get Started</p>
                    <p class="sub-text">Add Your Personal Details to Continue</p>
                </td>
            </tr>
            <tr>
            <form name="f2" action = "create-account.php"  method = "POST">  
                <td class="label-td" colspan="2">
                    <label for="name" class="form-label">Name: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td">
                    <input type="text" name="fname" class="input-text" placeholder="First Name" required>
                </td>
                <td class="label-td">
                    <input type="text" name="lname" class="input-text" placeholder="Last Name" required>
                </td>
            </tr>
            
            <tr> 
                <td class="label-td" colspan="2">
                    <label for="age" class="form-label">Age: </label>
                </td>
            </tr>

            <tr>
                <td class="label-td" colspan="2">
                    <input type="number" name="age" class="input-text" placeholder="age" required>
                </td>
            </tr>

            <tr>
            <td class="label-td" colspan="2">
                    <label for="phone" class="form-label">Phone Number: </label>
                </td>
            </tr>

            <tr>
                <td class="label-td" colspan="2">
                    <input type="tel" name="phone" class="input-text"  placeholder="ex: 055123456" required>
                </td>
            </tr>
            <!-- --------------------------INSURANCE----------------------------------------> 
            <tr>
                <td class="label-td" colspan="2">
            <label for="insurance" class="form-label"> Do you have insurance: </label>  
                <select name = "insurance" required> 
                <option class="input-text" value="yes">yes</option>
                <option class="input-text" value="no">no</option>
                </select> 
            <!-- ---------------------- EMAIL ----------------------------------------------------- -->
            <tr>
                <td class="label-td" colspan="2">
                    <label for="newemail" class="form-label">Email: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <input type="email" name="newemail" class="input-text" placeholder="Email Address" required>
                </td>
                
            </tr>
            <!-- ---------------------- PASSWORD ----------------------------------------------------- -->
            <tr>
                <td class="label-td" colspan="2">
                    <label for="newpassword" class="form-label">Create New Password: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <input type="password" name="newpassword" class="input-text" placeholder="New Password" required>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <label for="cpassword" class="form-label">Confirm Password: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <input type="password" name="cpassword" class="input-text" placeholder="ConfIrm Password" required>
                </td>
            </tr>

           <!-- ---------------------- SUBMIT ----------------------------------------------------- --> 

            <tr>
                <td>
                    <input type="reset" value="Reset" class="login-btn btn-primary-soft btn" >
                </td>
                <td>
                   <!--  old button <input type="submit" value="Next" >--> 
                    <input type =  "submit" id = "btn" value = "signup" name="signup" class="login-btn btn-primary btn"/>  
                </td>

            </tr>
            <tr>
                <td colspan="2">
                    <br>
                    <label for="" class="sub-text" style="font-weight: 280;">Already have an account&#63; </label>
                    <a href="login.php" class="hover-link1 non-style-link">Login</a>
                    <br><br><br>
                </td>
            </tr>

                    </form>
            </tr>
        </table>

    </div>
</center>



</body>
</html>