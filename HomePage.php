<!-- 
     HomePage.php
     Authors: Kendra Dezenosky, Ibrahim Mekraldi, Solomon Shleifman, Danyao Wang, Anuja Thomas
     Date created: January 26, 2020

     This is the first loaded view for the shopper. It provides a brief description of the product and the services we offer.
     Please note that some comments and function names will be removed or altered upon publication to the public.
-->

<!DOCTYPE html>
<html lang="en">

<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

<!-- Ajax -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js" integrity="sha384-FzT3vTVGXqf7wRfy8k4BiyzvbNfeYjK+frTVqZeNDFl8woCbF0CYG6g2fMEFFo/i" crossorigin="anonymous"></script>

<!-- Bootstrap -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<!-- CSS Stylesheet -->
<link href="css/style.css" rel="stylesheet" type="text/css">

<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/24a6b1f962.js" crossorigin="anonymous"></script>

<!-- ------------------------------------------------------------------------------------------------------ -->

<!-- Google Sign In -->
    <!-- source: https://developers.google.com/identity/sign-in/web-->
    <meta name="google-signin-scope" content="profile email">
    <!--source: https://developers.google.com/identity/sign-in/web/sign-in-->
    <meta name="google-signin-client_id" content="158438822057-0dkrbgfe23fsi7tst3t74jnqtdmf98qt.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>

<!-- Scripts -->
    <script src="scripts/LoginScript.js"></script>
    <script src="scripts/Database.js"></script>

<?php include "./header.html" ?>
<!-- ------------------------------------------------------------------------------------------------------ -->

<body>
     <!-- Background image with text overlay -->
     <div class="container-image text-center">
          <img src="images/berries.jpg" style="width: 100%;" alt="Berries">
          <div class="text-image-overlay" style="background: rgba(230, 255, 250, 0.8); border-radius: 20px; padding: 20px; box-shadow: 0 0 20px gray;">
               <h2>ABOUT US</h2>
               <h4>Gone are the days of paper lists and coupon clipping.</h4>
               <p>At Clipp our mission is to make savings accessible to all. Use Clipp as your One Stop Shop for savings on groceries. </p>
          </div>
     </div>

     <!-- Services section -->
     <div class="container-fluid bg-grey text-center">
          <h2>SERVICES</h2>
          <h4>What we offer</h4>
          <br>
          <div class="row">
               <div class="col-sm-4">
                    <span><img src="images/store.png" style="width: 100px;" alt=""></span>
                    <h4>SELECT YOUR STORES</h4>
                    <p>Customize how many stores you would like to visit for your shopping list. </p>
               </div>
               <div class="col-sm-4">
                    <span><img src="images/sale.png" style="width: 100px;" alt=""></span>
                    <h4>FIND THE SALES</h4>
                    <p>Clipp will tell you which stores have your items on sale</p>
               </div>
               <div class="col-sm-4">
                    <span><img src="images/lowPrice.png" style="width: 100px;" alt=""></span>
                    <h4>GET THE BEST DEAL</h4>
                    <p>If your items are not on sale, Clipp will tell you which store has the best price for you.</p>
               </div>
          </div>
     </div>

     <!-- Login Pop Up & User Authentication -->
     <div class="modal fade" id="loginModalCenter" tabindex="-1" role="dialog" aria-labelledby="modalCenterTitle"
          aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
               <div class="modal-content">
                    <!-- Pop up name set and Font Awesome icon included -->
                    <div class="modal-header">
                         <span id="modalCenterTitle"><i class="fas fa-user-circle"></i> Select a login method</span>
                         <!-- Close button created -->
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeLogin">
                              <span aria-hidden="true">&times;</span>
                         </button>
                    </div>
                    <!-- Section for login options with appropriate buttons -->
                    <div class="main">
                         <p>TODO: Facebook login options</p>
                         <div class="btn g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>
                    </div>
               </div>
          </div>
     </div>
     
</body>

</html>