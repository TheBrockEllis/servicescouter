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
    <title>Learn | Service Scouter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Broading Service Opportunities">
    <meta name="author" content="Sharproot Media, LLC">

    <!-- styles -->
    <link href="styles/bootstrap.css" rel="stylesheet">
    <link href="styles/footer.css" rel="stylesheet">
    <link href="styles/learn.css" rel="stylesheet">
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
      <div class="hero-unit" id="learn_hero">
        <h1>We want to make volunteering as <br /> as possible</h1>
        <p><a class="btn btn-primary btn-large">Create your account today! &raquo;</a></p>
      </div>

      <!-- Example row of columns -->
      <div class="row">
        <div class="span4">
          <h2>Easy Access</h2>
           <p>There is absolutely no setup fee of any charges whatsoever for individuals. All they need to do is create an account or sign in with a Google email address, and all local service opportunities are at their fingertips! </p>
        </div>
        <div class="span4">
          <h2>Track It</h2>
           <p>Everyone loves a little friendly competition, so why not try to 'out-volunteer' your friends! Service Scouter keeps a full leader board so you can always see where you stack up. </p>
       </div>
        <div class="span4">
          <h2>Make it Fun!</h2>
          <p>Volunteering is a wonderfil experience. The intrinsic value felt after completing a big project is often overwhelimg. We try and capture that feeling by rewarding players with badges and medals for certain Achievements.</p>
        </div>
      </div>

    <?php display_footer(); ?>

    </div> <!-- /container -->
    
    <!-- javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="includes/jquery.js"></script>
    <script src="includes/bootstrap.js"></script>

  </body>
</html>
