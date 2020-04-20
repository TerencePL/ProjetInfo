<?php
  session_start();
  ?>


  <!DOCTYPE html>
  <html>
  <head>
  <title>Page Principale</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet"
   href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="C:\wamp64\www\ProjetInfo\PagePrincipaleEbay.css">
  <script type="text/javascript">
   $(document).ready(function(){
   $('.header').height($(window).height());
   });
  </script>

  </head>
  <body>

<?php include("HautDePage.php"); ?>

  <header class="page-header header container-fluid">
    <div class="overlay"></div>
    <div class="overlay"></div>
  <div class="description">

   <h1>SELECTED PRODUCT</h1>
   <p>
      EN CONSTRUCTION
   </p>
  </div>
  </header>



  <?php include("BasDePage.php"); ?>


  </body>

  </html>