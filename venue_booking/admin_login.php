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
    <body background="images/terrace.jpg">
   
	
	
        <div class="container">				
                <div id="container_demo" >
                    <div id="wrapper">
                        <div id="login" class="animate form">
                        	<div class="change_link"><a href="index.html">
                        		<img src="images/logo.png" width="150px" height="50px" ></a>
                        	</div>
                            <form action="admin_login.php" method="post" > 
                                <h1>Log in</h1> 
                                <p> 
                                    <label for="username" class="uname" data-icon="" > Your email </label>
                                    <input id="username" name="username" required="required" type="email" placeholder="mymail@mail.com"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon=""> Your password </label>
									 
                                    <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" /> 
                                </p>
								 <p> 
                                    <label for="password" class="youpasswd" data-icon=""> Security password </label>
									 
                                    <input id="password" name="special_p" required="required" type="password" placeholder="eg. X8df!90EO" /> 
                                </p>
                                <p class="login button"> 
                                    <input type="submit" value="Login" name ='login' /> 
								</p>
                                
								</form>
                        </div>
						
                    </div>
                </div>  
				 </div>
						<?php
						if(isset($_POST['login'])){
							$email_id=$_POST['username'];
							$password=$_POST['password'];
							$special_p=$_POST['special_p'];
							$result=$conn->query("select email_id,password,special_password from admin");
							$row=$result->num_rows;
							
							if($row>0)
							{
								while($s=$result->fetch_array(MYSQLI_BOTH))
								{
						        	if($s['email_id']==$email_id && $s['password']==$password
									&& $s['special_password']==$special_p )
						        	{
							    	   $_SESSION['email_id'] = $email_id;
						     		   header('location:admin_portal.php');
									
							        }
									else{
								echo "<br><br><br><center><font size='250px' color='black'>Wrong...id!...</font>";
								}
							}
							
							
							}
						}
					
					?>			
								
								
								
                            
           
    </body>
</html>

