<?php
include('connection.php');
?>


<!DOCTYPE html>
 <html lang="en" class="no-js">
    <head>
        <meta charset="UTF-8" />
        <title>Signup</title>
        <link rel="stylesheet" type="text/css" href="css/login.css" />
    </head>
    <body background="images/a4.jpg">
        <div class="container">				
                <div id="container_demo" >
                    <div id="wrapper">
                        <div id="login" class="animate form"><div class="change_link"><a href="index.html">Home</a></div>
                            <form  action = "user_signup.php", method="post"> 
                                <h1>Join Us</h1> 
                                <p> 
                                    <label for="username" class="uname" data-icon="" > Name </label>
                                    <input id="username" name="name" required="required" type="text" placeholder="Your Name"/>
                                </p>
                                <p> 
                                    <label for="username" class="uname" data-icon="" >Email </label>
                                    <input id="username" name="username" required="required" type="email" placeholder="mymail@mail.com"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon=""> Password </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" /> 
                                </p>
                                <p class="login button"> 
                                    <input type="submit" value="Continue" name = "submit" /> 
								</p>
                                <p class="change_link">
									Already registered?
									<a href="user_login.php">Click to login</a>
								</p>
                            </form>
                        </div>
						
                    </div>
                </div>  
            </div>
    </body>
</html>


<!-- ####################### PHP CODE ################################ -->

<?php
    if(isset($_POST['submit']))
    {
        $name = $_POST['name'];
        $email = $_POST['username'];
        $password = $_POST['password'];
        $date = date("Y-m-d");
    echo "<h1><font color='white'>hello";
	
/* ############## CHECKING FOR ALREADY REGISTRATION ########### */

        $reg_user_query = $conn->query("select * from register where email = '$email' ");
        $rowcount=mysqli_num_rows($reg_user_query);
        if($rowcount>0)
        {
            echo "<div style='float:right'><center>You are already registered...";
            echo "<a href='user_login.php'>Click to login </a></center><div><br><br>";
        }
        else
        {
            /* ################# user id generation ############### */
            $reg_user_query = $conn->query("select * from register order by userid desc");
            $reg_user_res = $reg_user_query->fetch_array(MYSQLI_BOTH);
            $temp = $reg_user_res['userid'];
            $i=2;
            $str = "";
			echo $temp;
           while( $temp[$i] != 'U' && $temp[$i] != 'H')
           {
               $str = $str.$temp[$i];
               $i =$i + 1;
echo $str;			   
            }
            // echo $str;
            $str = $str +1; 
             $userid = "VB".$str."UR";

             ########### USER DATA INSERTION ############### */

            $registration_query = $conn->query("insert into register(userid,email,password)values('$userid','$email', '$password')");
           $user_query = $conn->query("insert into user(userid,user_name,date,email)values('$userid','$name','$date','$email')");
           if($registration_query && $user_query)
           {
               echo "<div style='float:right'><font color='blue'><center><h3>Registration successful...</h3>";
               echo "<a href='user_login.php'>Click to login </a></center></div><br><br>";
           }
        }
    }

?>