
<?php
include('connection.php');
session_start();
?>
<!DOCTYPE html>
 <html lang="en" class="no-js">
    <head>
        <meta charset="UTF-8" />
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="css/login.css" />
    </head>
    <body background="images/a4.jpg">
        <div class="container">				
                <div id="container_demo" >
                    <div id="wrapper">
                        <div id="login" class="animate form">
                        	<div class="change_link"><a href="index.php">
                        		<img src="images/logo.png" width="150px" height="50px" ></a>
                        	</div>
                            <form action="user_login.php" method="post" > 
                                <h1>Log in</h1> 
                                <p> 
                                    <label for="username" class="uname" data-icon="" > Your email </label>
                                    <input id="username" name="username" required="required" type="email" placeholder="mymail@mail.com"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon=""> Your password </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" /> 
                                </p>
                                <p class="login button"> 
                                    <input type="submit" value="Login" name ='login' /> 
								</p>
                                <p class="change_link">
									Not a member yet ?
									<a href="user_signup.php">Join us</a>
								</p>
                            </form>
                        </div>
						
                    </div>
                </div>  
            </div>
    </body>
</html>


<!-- #################################### PHP CODE ######################### -->

<?php
	if(isset($_POST['login']))
	{
		$email = $_POST['username'];
		$password = $_POST['password'];

		/* ############ Verification as user existence ################# */

		$user_query = $conn->query("select email, password,userid from register where email = '$email'");
		$user_query_res = $user_query->fetch_array(MYSQLI_BOTH);
		$rowcount=mysqli_num_rows($user_query);
		if($rowcount==0)
		{
			echo "<center>You are not registered...";
            echo "<a href='user_signup.php'>Click to join </a></center>";
		}
		else if($email = $user_query_res['email'] and $password == $user_query_res['password'])
		{
			// SESSION VARIABLE SETTING 
			$_SESSION['email'] = $email;
			$_SESSION['userid'] = $user_query_res['userid'];
			

			$moderator_query = $conn->query("select * from user where email = '$email'");
			$modcount=mysqli_num_rows($moderator_query);
			if($modcount>0)
			{
				header('location:user_portal.php');
			}
			else
		{
				header('location:user_portal.php');
			}
		}
		else
		{
			echo "<center><font color='red'>Email or password is wrong...try again</font></center>";	
		}
	}
?>