<!-- 
     NewListAction.php
     Authors: Kendra Dezenosky, Ibrahim Mekraldi, Solomon Shleifman, Danyao Wang, Anuja Thomas
     Date created: February 16, 2020
-->
<?php 
    //Setting default timezone
    date_default_timezone_set("EST");

    require_once('./dao/listDAO.php'); 

    $listName = $_POST['listName'];
    $item = $_POST['item'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $priceDetails = $_POST['priceDetails'];
    $sale = $_POST['sale'];
    $location = $_POST['location'];
    $postalCode = $_POST['postalCode'];
    $favourited = $_POST['favourited'];

    // tries the DAO and sets errors if information is incorrect
    try{
        //Creates new listDAO object
        $listDAO = new listDAO();

        //Create a new list and passes variables as parameters
        $list = new GroceryList($listName, $item, $description, $price, $priceDetails, $sale, date("Y-m-d h:i:s"), $location, $postalCode, $favourited);

        //Calls listDAO addList function with the list object as a parameter
        $getSuccess = $listDAO->addList($list);
    }catch(Exception $e){
        // echo '<h3>Error on page.</h3>';
        // echo '<p>' . $e->getMessage() . '</p>';            
    }
    
    
?>