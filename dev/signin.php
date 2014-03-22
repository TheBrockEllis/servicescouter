<?php
//allow sessions to be passed so we can see if the user is logged in
session_start();
ob_start();
    /*GOOGLE LOGIN STUFF*/
	$xml_content = file_get_contents('https://www.google.com/accounts/o8/id');
	$xml = simplexml_load_string($xml_content);
    $service = $xml->XRD->Service;
	$endpoint_uri = $service->URI;
	$redirect_to_uri = 'http://www.servicescouter.com/signin.php';

require_once("includes/header.inc");
require_once("includes/footer.inc");
require_once("includes/sanitize.inc");
require_once("includes/script_begin.inc");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Sign In | Service Scouter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Broading Service Opportunities">
    <meta name="author" content="Sharproot Media, LLC">

    <!-- styles -->
    <link href="styles/bootstrap.css" rel="stylesheet">
				<link href="styles/signin.css" rel="stylesheet">    
				<link href="styles/footer.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../ico/apple-touch-icon-57-precomposed.png">
  </head>

  <body>

    <?php display_header(); ?>

    <div class="container">
    <?php
    if($_POST['submit']){
        $username = protect($_POST['username']);
        $password = protect($_POST['password']);

        if( (!$username) || (!$password) ){
            //if either un or pw is not there, display error
            print(" <center>Please enter in both a <b>username</b> and <b>password</b> to continue.</center> ");
        }else{
            //if un and pw are there...continue!
            $sql = "SELECT UserID FROM Users WHERE Username = '$username' ";
            $rs = mysql_query($sql);
            if($rs) $rsc = mysql_num_rows($rs);
            if(!$rsc){
                //no record returned from DB for username
                print("<center>There are no records with that username. Please try again.</center>");
            }else{
                //if a UN matched, keep checking
                $sql = "SELECT UserID, Active, Username, Email, CompanyID FROM Users ";
                $sql .= "WHERE Username = '$username' ";
                $sql .= "AND Password = '$password' ";
                $rs = mysql_query($sql);
                if($rs) $rsc = mysql_num_rows($rs);
                if(!$rsc){
                    //no record returned from DB for username AND password
                    print("<center>The password was not recognized. Please try again.</center>");
		  }else{
                    $uid = mysql_result($rs, 0, "UserID");
                    $active = mysql_result($rs, 0, "Active");
                    $username = mysql_result($rs, 0, "Username");
                    $email = mysql_result($rs, 0, "Email");
                    $companyid = mysql_result($rs, 0, "CompanyID");

                    if($active == 0){
                        print(" <center> You have not yet activated your account. </center> ");
                    }else{
                        //already activated, log them in
                        $_SESSION['uid'] = $uid;
                        $_SESSION['username'] = $username;
                        $_SESSION['email'] = $email;
                        $_SESSION['companyid'] = $companyid;

                        print(" <center> You have successfully logged in!</center> ");

                        //update the online field to 50 seconds into the future
                        //$time = date('U')+50;
                        //mysql_query("UPDATE 'Users' SET online = '$time' WHERE UserID = $_SESSION['uid']");

                        //redirect them to the logged in page
                        header("Location: home.php");
                    }
                }
            }
        }
    }

	if (isset($_GET['openid_mode']) && $_GET['openid_mode'] == 'id_res')
    {
        $_SESSION['google'] = $_GET;
		$email = $_SESSION['google']['openid_ext1_value_email'];						
		error_log("Email: $email");

		$sql = "SELECT UserID, Username, Active FROM Users WHERE Email = '$email'";
		$rs = mysql_query($sql);
		error_log("SQL: $sql");
		if($rs) $rsc = mysql_num_rows($rs);
		if($rsc == 0){
			//no record returned from DB for username
            print("<center>There are no records with that username. Please try again.</center>");				
		}else{
			$uid = mysql_result($rs, 0, "UserID");
			$username = mysql_result($rs, 0, "Username");
            $active = mysql_result($rs, 0, "Active");

		if($active == 0){
            print(" <center> You have not yet activated your account. </center> ");
        }else{
            //already activated, log them in
            $_SESSION['uid'] = $uid;
            $_SESSION['username'] = $username;

			//redirect them to the logged in page
            header("Location: home.php");
		}
		}
	}
				
?>

    <!-- Main hero unit for a primary marketing message or call to action -->
    <div class="hero-unit">
				
		<div id="login">

			<div id='signin_normal'>
                <form name="signin_normal" action="signin.php" method="post">
                <table cellpadding="2" cellspacing="0" border="0">
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" value="<?php echo $username ?>" /></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password" value="<?php echo $password ?>" /></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input id="login_button" class="btn btn-primary btn-large" type="submit" name="submit" value="Login" /></td>
                </tr>
                <tr>
                    <td align="center" colspan="2"><a href="register.php">Register</a> | <a href="forgot.php">Forgot Password?</a></td>
                </tr>
                </table>
                </form>
			</div> <!--/signin_normal -->
            <hr id="signin_or" />
			<div id='signin_google'>
				<form name="signin_google" method='POST' action='<?php echo $endpoint_uri; ?>'>

				<input type='hidden' name='openid.return_to' value='<?php echo $redirect_to_uri; ?>' />

				<input type='hidden' name='openid.mode' value='checkid_setup' />
				<input type='hidden' name='openid.ns' value='http://specs.openid.net/auth/2.0' />
				<input type='hidden' name='openid.claimed_id' value='http://specs.openid.net/auth/2.0/identifier_select' />
				<input type='hidden' name='openid.identity' value='http://specs.openid.net/auth/2.0/identifier_select' />

        		<input type='hidden' name='openid.ns.ax' value='http://openid.net/srv/ax/1.0' />
				<input type='hidden' name='openid.ax.mode' value='fetch_request' />
				<input type='hidden' name='openid.ax.required' value='email,firstname,lastname' />
				<input type='hidden' name='openid.ax.type.email' value='http://axschema.org/contact/email' />
				<input type='hidden' name='openid.ax.type.firstname' value='http://axschema.org/namePerson/first' />
				<input type='hidden' name='openid.ax.type.lastname' value='http://axschema.org/namePerson/last' />
								
				<input class="btn btn-primary btn-large" type='submit' value='Login With Google Account' />
				</form>
			</div><!--/signin_google -->

		</div><!--/login -->

    </div><!--/hero -->

    <?php display_footer(); ?>

    </div> <!-- /container -->
    
    <!-- javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="includes/jquery.js"></script>
    <script src="includes/bootstrap.js"></script>

  </body>
</html>
