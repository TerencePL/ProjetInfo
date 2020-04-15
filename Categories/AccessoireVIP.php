  <!DOCTYPE html>
  <html>
  <head>
  <title>Accesoires VIP</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet"
   href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="C:\wamp64\www\ProjetInfo\Categorie.css">
  <script type="text/javascript">
   $(document).ready(function(){
   $('.header').height($(window).height());
   });
  </script>
<?php include("C:\wamp64\www\ProjetInfo\HautDePage.php"); ?>
  </head>
  <body>


 <!-- Page Content -->
  <div class="container-fluid">

    <div class="row">

      <div class="col-lg-3">

        <h1 class="my-4">Catégorie</h1>
        <div class="list-group">
          <a href="http://localhost/ProjetInfo/FerrailleTresor.php" class="list-group-item">Ferraille et trésor</a>
          <a href="http://localhost/ProjetInfo/BonMusee.php" class="list-group-item">Bon pour le Musée</a>
          <a href="http://localhost/ProjetInfo/AccessoireVIP.php" class="list-group-item">Accessoire VIP</a>
        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="tresor1.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="tresor2.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="tresor3.jpg" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev" style="color: black">
            <span class="carousel-control-prev-icon" aria-hidden="true" ></span>
            <span class="sr-only" style="color: black">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next" style="color: black">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only" style="color: black">Next</span>
          </a>
        </div>

        <div class="row">

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="chicago.jpg" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#">Louis d'Or</a>
                </h4>
                <h5>$2400.99</h5>
                <p class="card-text">Louis d'Or</p>
              </div>
              <div class="card-footer">
                <button>Acheter</button>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="tresor2.jpg" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#">Couronne de l'Impératrice Eugénie</a>
                </h4>
                <h5>$1200.99</h5>
                <p class="card-text" href="chicago.php">Jordan1 Off White Chicago</p>
              </div>
              <div class="card-footer">
                <button>Acheter</button>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="tresor3.jpg" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#">The Angelsey tiara, periodo vittoriano</a>
                </h4>
                <h5>$2000.99</h5>
                <p class="card-text">Jordan 1 Off White NRG</p>
              </div>
              <div class="card-footer">
                <button>Acheter</button>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="fragment.jpg" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#">Item Four</a>
                </h4>
                <h5>$24.99</h5>
                <p class="card-text">Jordan 1 Fragment</p>
              </div>
              <div class="card-footer">
                <button>Acheter</button>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="bredtoe.jpg" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#">Item Five</a>
                </h4>
                <h5>$24.99</h5>
                <p class="card-text">Jordan 1 Bred Toe</p>
              </div>
              <div class="card-footer">
                <button>Acheter</button>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="pinegreen.jpg" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#">Item Six</a>
                </h4>
                <h5>$24.99</h5>
                <p class="card-text">Jordan 1 Pine Green</p>
              </div>
              <div class="card-footer">
                <button>Acheter</button>
              </div>
            </div>
          </div>

        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
  
  <?php include("C:\wamp64\www\ProjetInfo\BasDePage.php"); ?>


  </body>

  </html>
