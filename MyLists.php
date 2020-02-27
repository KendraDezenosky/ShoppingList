<!DOCTYPE html>
<html lang="en">


<!-- JQuery link -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

<!-- Ajax Links -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js" integrity="sha384-FzT3vTVGXqf7wRfy8k4BiyzvbNfeYjK+frTVqZeNDFl8woCbF0CYG6g2fMEFFo/i" crossorigin="anonymous"></script>

<!-- Bootstrap links -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<!-- CSS Stylesheet link -->
<link href="css/style.css" rel="stylesheet" type="text/css">

<!-- Font Awesome script for icons -->
<script src="https://kit.fontawesome.com/24a6b1f962.js" crossorigin="anonymous"></script>

<!--source: https://developers.google.com/identity/sign-in/web-->
<meta name="google-signin-scope" content="profile email">

<!--source: https://developers.google.com/identity/sign-in/web/sign-in-->
<meta name="google-signin-client_id" content="158438822057-0dkrbgfe23fsi7tst3t74jnqtdmf98qt.apps.googleusercontent.com">
<script src="https://apis.google.com/js/platform.js" async defer></script>

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

<!-- ------------------------------------------------------------------------------------------------------ -->

<script>
     // Fetches the header html page and populates into the <header> tags
     fetch("./header.html")
          .then(response => {
          return response.text()
     })
          .then(data => {
          document.querySelector("header").innerHTML = data;
     });
     
function onSignIn(googleUser) {
     
     // Useful data for your client-side scripts:
     var profile = googleUser.getBasicProfile();
     /*console.log("ID: " + profile.getId()); // Don't send this directly to your server!
     console.log('Full Name: ' + profile.getName());
     console.log('Given Name: ' + profile.getGivenName());
     console.log('Family Name: ' + profile.getFamilyName());
     console.log("Image URL: " + profile.getImageUrl());*/
     console.log("User Logged in with " + "Email: " + profile.getEmail());

     // The ID token you need to pass to your backend:
     var id_token = googleUser.getAuthResponse().id_token;
     //console.log("ID Token: " + id_token);

     // Static Variables
     var newListBtn = document.getElementById("newListBtn");
     var myListsBtn = document.getElementById("myListsBtn");

     // Now that the user is logged in, display the "New List" and "My Lists" topbar button.
     // "Sign in" button changed to display user name
     newListBtn.disabled = false;
     newListBtn.classList.remove("hide");
     myListsBtn.disabled = false;
     myListsBtn.classList.remove("hide");
     document.querySelector('#loginBtn').innerHTML = 'Welcome ' + profile.getGivenName() + "!";
     document.getElementById("closeLogin").click();
}
</script>

<!-- Script link -->
<script src="scripts/MyListsScript.js"></script>

<header>

</header>

<!-- <body> -->
</br>
<div class="jumbotron">
      <div class="display-4" id="myLists" style="text-align: center;">My Favourite Lists</div>
</div> 
<body onLoad="buildHtmlTable('#excelDataTable')">
     <table id="excelDataTable" class ="table table-hover table-striped"  style="width: 90%; border:1" >
     </table>
     </br>

     
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
