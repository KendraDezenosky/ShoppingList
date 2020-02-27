<!-- 
     NewList.php
     Authors: Kendra Dezenosky, Ibrahim Mekraldi, Solomon Shleifman, Danyao Wang, Anuja Thomas
     Date created: January 26, 2020
     The New List page allows a shopper to add items to a shopping list. The table pulls data from Flipp to populate with the retrieved prices.
     The shopper has the option to Finish List, Review Stores, and Save as Favourite
-->

<?php 
     include "./header.html" ;
     require_once('./dao/listDAO.php'); 
     // session_start();

 ?>

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
     <script src="scripts/NewListScript.js"></script>

<!-- ------------------------------------------------------------------------------------------------------ -->

<!-- Datatable -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>     


<body>
     </br>
     <!-- Bootstrap jumbotron created with blank placeholders for the list name, postal code, and number of stores. Favourites star included -->
     <div class="jumbotron">
          <div class="display-4" id="infoListName" style="text-align: center;">
               <a href="javascript:saveFavourites();"><i id="favStar" class="far fa-star"></i></a>
          </div>
          <div class="lead" id="infoPC-stores" style="text-align: center;"></div>    
     </div>

     <div class="listTable">
          <!-- Form created with input field for grocery items to be entered. When entered, addItem() function called and item name is sent as parameter -->
          <form id="groceryItemForm">  
               <div class="form-group has-feedback">
                    <label class="control-label">Enter the name of your grocery item:</label>
                    <input type="text" class="form-control" id="item" placeholder="Grocery Item"/> </br>
                    
                    <button type="button" id="addItemBtn" class="btn btn-dark" onclick="addItem(document.getElementById('item').value);"><i class="fa fa-shopping-cart"></i> Add Item </button>
                </div>
               </br></br>
          </form>

               <!-- Table created with headers and empty tbody to be populated with data later -->
               <table id="groceryListTable" class="table table-striped table-bordered">
                    <thead>
                         <tr>
                              <th id="itemName">Item Name</th>
                              <th id="itemPrice">Item Price</th>
                              <th id="saleInfo">Sale</th>
                              <th id="itemLocation">Location</th>
                              <th></th>
                         </tr>
                    </thead>
                    <tbody></tbody>
               </table>
               
               <button class="btn btn-dark" id="finishBtn" style="margin: 5px;" onclick="finishList();">Mark as Complete</button>

          <!-- Review Button created. Class set to 'hide' so it is not visible until list finished -->
          <button class="btn btn-dark hide" id="reviewBtn" style="margin: 5px;" data-toggle="modal" data-target="#reviewModalCenter">Review Stores</button>
     </div>

     <!-- Review Stores Pop Up Modal -->
     <div class="modal fade" id="reviewModalCenter" tabindex="-1" role="dialog" aria-labelledby="modalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
               <div class="modal-content">
                    <!-- Modal header set with Font Awesome icon -->
                    <div class="modal-header">
                         <span id="modalCenterTitle"><i class="fas fa-pencil-alt"></i> Rate each store to receive personalized lists</span>
                         <!-- Close button created -->
                         <button type="button" id="closeReview" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                         </button>
                    </div>
                    <div id="reviewForm" class="main">
                         <div id="review">
                              <div>
                                   <label id="storeLabel1" for="reviewDropDown1"></label>
                                   <select name="reviewDropDown" id="reviewDropDown1" label="" class="hide form-control"> </select> </br>
                              </div>
                              <div>
                                   <label id="storeLabel2" for="reviewDropDown2"></label>
                                   <select name="reviewDropDown" id="reviewDropDown2" label="" class="hide form-control"></select> </br>
                              </div>
                              <div>
                                   <label id="storeLabel3" for="reviewDropDown3"></label>
                                   <select name="reviewDropDown" id="reviewDropDown3" label="" class="hide form-control"></select> </br>
                              </div>                              
                              <div>
                                   <label id="storeLabel4" for="reviewDropDown4"></label>
                                   <select name="reviewDropDown" id="reviewDropDown4" label="" class="hide form-control"></select> </br>
                              </div>
                              <script>
                                   var storeReview1 = document.getElementById("reviewDropDown1");
                                   var storeReview2 = document.getElementById("reviewDropDown2");
                                   var storeReview3 = document.getElementById("reviewDropDown3");
                                   var storeReview4 = document.getElementById("reviewDropDown4");

                                   // var storeLabel1 = document.getElementById("storeLabel1");
                                   // var storeLabel2 = document.getElementById("storeLabel2");
                                   // var storeLabel3 = document.getElementById("storeLabel3");
                                   // var storeLabel4 = document.getElementById("storeLabel4");

                                   
                              </script>
                              <button type="button" id="submitReviewBtn" class="btn btn-dark" onclick="submitReview(storeReview1, storeReview2, storeReview3, storeReview4);">Submit Review</button>
                         </div>
                    </div>
               </div>
          </div>
     </div>

<!--           https://backflipp.wishabi.com/flipp/items/search?locale=[Your Language preference here]&postal_code=[Your postal code here]&q=[Your merchant here]

               <a href="https://backflipp.wishabi.com/flipp/items/search?locale=en-ca&postal_code=K2K2J5&q=milk">Flipp API Test</a>
-->

     <!-- Login Pop Up & User Authentication -->
     <div class="modal fade" id="loginModalCenter" tabindex="-1" role="dialog" aria-labelledby="modalCenterTitle"aria-hidden="true">
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
 