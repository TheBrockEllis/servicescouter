<?php
//allow sessions to be passed so we can see if the user is logged in
session_start();
require_once("includes/script_begin.inc");
 
//check if the login session does no exist
if(strcmp($_SESSION['uid'],"") == 0){
    //if it doesn't display an error message
    echo "<center>You need to be logged in to log out!</center>";
    
    //redirect
    header("Location: signin.php");
    
}else{
    
    //if it does continue checking
 
    //update to set this users online field to the current time
    mysql_query("UPDATE `users` SET `online` = '".date('U')."' WHERE `id` = '".$_SESSION['uid']."'");
 
    //destroy all sessions canceling the login session
    session_destroy();
 
    //redirect
    header("Location: signin.php");
}
 
?>