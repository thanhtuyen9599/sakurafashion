<?php
session_start();
	if(isset($_SESSION["userName"]))
	{
		//da dang nhap roi,khong can dang nhap lai nua, vao truc tiep trang chu
		header("Location:trangcanhan.php");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
        <meta charset="utf-8">
        <title>Sakurafashion</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
        <!-- bootstrap -->
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">      
        <link href="../bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <style>
			table{ position:absolute; top:150px; left:450px; width:400px}
			#adn {position: absolute; top:80px; left:590px; color:#C00}
        </style>
    </head>

<body>
        <div id="wrapper" class="container">
                <div class="navbar-inner main-menu">                
                    <nav id="menu" class="pull-right">
                        <ul style="height:900px">
                            <?php
								if(isset($_GET["err"]))
								{
								echo"Try again!";	
								}
								$user="";
								$pass="";
								if(isset($_COOKIE["userName"])&&isset($_COOKIE["passWord"]))
								{
								$user=$_COOKIE["userName"];
								$pass=$_COOKIE["passWord"];
								}
								?>
								<form action="loginprocess.php" method="post">                              
              <table >
                	<div id="adn"><h3>Admin Login</h3></div>
    			<tr>
        			<th style="width: 150px">Username:<input type="text" name="txtUser" value="<?php echo($user);?>"/><br /></th>
                 </tr>
          	  	<tr>
                	<th style="width: 750px">Password:<input type="password" name="txtPass" value="<?php echo($pass);?>"/><br /></th>
                 </tr>
                 <tr>
            		<th style="width: 750px"><input type="checkbox" name="ckbDangNhap" value="1" <?php if($user!=""){?> checked="checked"<?php }?>/>Remember<br /></th>
                 </tr>
                 <tr>
            		<th style="width: 250px"><input type="submit" value="Login" /></th>
        		</tr>
            </table>								 
    							</form>
          				</ul>
                    </nav>
                </div>
        </div>
</body>
</html>