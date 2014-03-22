<?php
//allow sessions to be passed so we can see if the user is logged in
session_start();

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
    <meta name="description" content="Broading Service Opportunities">
    <meta name="author" content="Sharproot Media, LLC">

    <!-- styles -->
    <link href="styles/bootstrap.css" rel="stylesheet">
    <link href="styles/footer.css" rel="stylesheet">
    <link href="styles/index.css" rel="stylesheet">    
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

      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit" id="index_hero">
        <h1>Broadcasting Service Opportunities</h1>
        <p>Service Scouter is a service that aims to make matching passionate volunteers with non-profit organizations as easy as possible.</p>
        <p><a class="btn btn-primary btn-large">Learn more &raquo;</a></p>
      </div>

      <!-- Example row of columns -->
      <div class="row">
        <div class="span6">
          <h2>Shouting</h2>
           <p>Service Scouter's aim is to broadcast service opportunities. We know that non-profit organizations are often deperate for volunteers. We also know that there are plenty of potential volunteers out there, but they just don't know where to look. </p>
          <p><a class="btn" href="#">Learn How &raquo;</a></p>
        </div>
        <div class="span6">
          <h2>Connecting</h2>
           <p>We want to become the central hub for all service opportunities. By connecting volunteers to service organizations, as well as keeping them engaged with leaderboards and acheivements, Service Scouter will become a value asset to your organization.</p>
            <p><a class="btn" href="#">View details &raquo;</a></p>
       </div>
      </div>

    <?php display_footer(); ?>

    </div> <!-- /container -->
    
    <!-- javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.js"></script>

  </body>
</html>
