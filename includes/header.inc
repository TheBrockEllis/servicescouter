<?php

function display_header() {

?>

<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </a>
            <a class="brand" href="index.php">Service Scouter</a>
          
            <div class="nav-collapse">
            <div class="nav pull-right">
                <ul class="nav">
                    <li class="divider-vertical"></li>                
                    <li><a href="learn.php">Learn</a></li>
                    <li class="divider-vertical"></li>
                    <li><a href="about.php">About</a></li>
                    <li class="divider-vertical"></li>
                    <li><a href="help.php">Help</a></li>
                    
                    <?php
                    if(strcmp($_SESSION['uid'],"") == 0){
                    //display SIGN IN and REGISTER
                    ?>  
                    
                    <li><a href="signin.php">Sign In</a></li>
                    <li><a href="register.php">Create Account</a></li>
                
                    <?php }else{ ?>
                    
                    <li><a href="logoff.php">Log Off, <?php echo $_SESSION['username'] ?></a></li>
                    <li><a href="home.php">Home</a></li>
                    
                    <?php } ?>
                    
                </ul> <!-- end nav ul -->
            </div>    
            </div><!--/.nav-collapse -->
        </div> <!--/.container -->
    </div> <!--/.navabr-inner -->
</div> <!--/.navbar navbar-fixed-top -->

<?php } //end function ?>