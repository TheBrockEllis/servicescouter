<?php
//allow sessions to be passed so we can see if the user is logged in
session_start();
if(strcmp($_SESSION['uid'],"") == 0){
    //display and error message
    header("Location: signin.php");
}

require_once("includes/header.inc");
require_once("includes/footer.inc");
require_once("includes/script_begin.inc");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Home | Service Scouter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Broadcasting Service Opportunities">
    <meta name="author" content="Sharproot Media, LLC">

    <!-- styles -->
    <link href="styles/bootstrap.css" rel="stylesheet">
    <link href="styles/footer.css" rel="stylesheet">
    <link href="styles/home.css" rel="stylesheet">
    
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <link rel="shortcut icon" href="../ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../ico/apple-touch-icon-57-precomposed.png">
  </head>

  <body>

    <?php display_header(); ?>

<div class="container-fluid">
    
    <div class="row-fluid">
        
    <div class="span3 well" id="home_sidebar">

    <?php if(isset($_SESSION['companyid'])) print(" <p><img src='/Locations/1000/Companies/1000-profile.jpg' class='photo-polaroid' /></p> ");
    ?>
    <ul class="nav nav-list">
        <li><a href="#"><i class="icon-align-justify"></i>Leaderboard</a></li>
        <li><a href="#"><i class="icon-time"></i>Pending Logs</a></li>
        <li><a href="#"><i class="icon-ok"></i>Confirmed Logs</a></li>
        <li class="divider"></li>
        <li><a href="#profile_div" data-toggle="modal"><i class="icon-edit"></i>Edit Profile</a></li>
        <li><a href="#"><i class="icon-certificate"></i>Achievements</a></li>
    </ul>

    <div id="recent_awards">
        <p>Recent Awards</p>
        <p>IMAGE HERE</p>
    </div>
    
    </div> <!-- /span2 -->
    
    <div class="span9 well" id="home_content">
        <ul class="nav nav-tabs" id="navTabs">
            <li class="active"><a href="#tab1" data-toggle="tab">Leaderboard</a></li>
            <li><a href="#tab2" data-toggle="tab">Active Opportunities</a></li>
            <li><a href="#tab3" data-toggle="tab">Pending Logs</a></li>
            <li><a href="#tab4" data-toggle="tab">Approved Logs</a></li>
        </ul>    
    
        <!-- TABBED CONTENT -->
        <div class="tab-content">
    
            <div class="tab-pane active" id="tab1">
                <div class="loading"></div>
            </div>
    
            <div class="tab-pane" id="tab2">
                <div id="optablediv">
                    <?php //include("activeopportunities.php"); ?> <div class="loading"></div>
                </div> 
            </div>
            
            <div class="tab-pane" id="tab3"><div class="loading"></div></div>
            
            <div class="tab-pane" id="tab4"><div class="loading"></div></div>
    
        </div>
        <!-- /TABBED CONTENT -->
        
        <div class="loading"></div>
                  
    </div> <!-- /span10 -->
    
    </div> <!-- /row-fluid -->
    
</div> <!-- /container -->
    
    <!-- modal forms
    ================================================= -->
    <!-- Placed at the end of the document to make code more legible -->
    
    <!-- PROFILE FORM -->
    <div id="profile_div" class="modal" tabindex="-1" role="dialog">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            <h3 id="myModalLabel">Edit Your Profile</h3>
        </div>
        <div class="modal-body">        
            <FORM name="profile_form" id="profile_form" method="POST" action="editprofile.php" enctype="multipart/form-data">
            <INPUT type="hidden" name="action" value="edit" />
            <TABLE>
                <TR>
                    <td>Username:</td>
                    <td><INPUT type="text" name="profile_username" size="36" /></td>
                </TR>
                <TR>
                    <td>Photo:</td>
                    <td><INPUT type="file" name="profile_photo" /></td>
                </TR>
            </TABLE>
            
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            <button class="btn btn-primary" id="profile_submit">Save</button>
        </div>
        </FORM>
    </div>
    <!-- END PROFILE FORM -->
    
    <!-- NEW OPPORTUNITY FORM -->
    <div id="newop_div" class="modal" tabindex="-1" role="dialog">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            <h3 id="myModalLabel">New Opportunity</h3>
        </div>
        <div class="modal-body">        
            <FORM name="newop_form" id="newop_form" method="POST" action="activeopportunities.php">
            <INPUT type="hidden" name="action" value="newop" />
            <TABLE>
                <TR>
                    <td>Title:</td>
                    <td><INPUT type="text" name="newop_title" size="36" /></td>
                </TR>
                <TR>
                    <td>Description:</td>
                    <td><INPUT type="text" name="newop_description" size="36" maxlength="128" /></td>
                </TR>
            </TABLE>
            
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            <button class="btn btn-primary" id="newop_submit">Submit</button>
        </div>
        </FORM>
    </div>
    <!-- END NEW OPPORTUNITY FORM -->
    
    <!-- javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.pack.js"></script>
    <script type="text/javascript" src="includes/jquery.form.js"></script>
    <script type="text/javascript" src="includes/bootstrap.js"></script>
    <script type="text/javascript" src="includes/home.js"></script>

    <script>
        $(document).ready(function() {
            var bodyheight = $(document).height();
            var bodyheight = bodyheight - 125;
            $("#home_sidebar").height(bodyheight);
            $("#home_content").height(bodyheight);
        });

        // for the window resize
        $(window).resize(function() {
            var bodyheight = $(document).height();
            var bodyheight = bodyheight - 125;
            $("#home_sidebar").height(bodyheight);
            $("#home_content").height(bodyheight).css("max-height", bodyheight);
            
        });
                
        $(function() {
            var baseURL = 'http://www.servicescouter.com/dev/ajax/';
            //load content for first tab and initialize
            $('#tab1').load(baseURL+'tab1.php', function() {
                $('#navTabs').tab(); //initialize tabs
            });    
        
            $('#navTabs').on('show', function(e) {
                $('.loading').show();
                var pattern=/#.+/gi //use regex to get anchor(==selector)
                var contentID = e.target.toString().match(pattern)[0]; //get anchor
                //load content for selected tab
                $(contentID).load(baseURL+contentID.replace('#','')+'.php', function(){
                    $('#navTabs').tab(); //reinitialize tabs
                });
                $('.loading').hide();
            });
        });
    </script>
    
  </body>
</html>
