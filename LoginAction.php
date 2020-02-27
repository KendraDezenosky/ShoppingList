
<?php 
    require_once('./dao/shopperDAO.php'); 

    $shopperName = $_POST['shopperName'];
    $email = $_POST['email'];
    $details = $_POST['details'];   

    // tries the DAO and sets errors if information is incorrect
    try{
        //Creates new shopperDAO object
        $shopperDAO = new shopperDAO();

        //Create a new shopper and passes variables as parameters
        $shopper = new Shopper($shopperName, $email, $details);

        //Calls shopperDAO addShopper function with the shopper object as a parameter
        $getSuccess = $shopperDAO->addShopper($shopper);

    }catch(Exception $e){
        // echo '<h3>Error on page.</h3>';
        $error = $e->getMessage();
        echo '<p>' . $error . '</p>';            
    }

?>