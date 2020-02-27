<!-- 
     NewListAction.php
     Authors: Kendra Dezenosky, Ibrahim Mekraldi, Solomon Shleifman, Danyao Wang, Anuja Thomas
     Date created: February 16, 2020
-->
<?php 
    require_once('./dao/listDAO.php'); 

    $listName = $_POST['listName'];
    $item = $_POST['itemName'];
    $location = $_POST['location'];

    // tries the DAO and sets errors if information is incorrect
    try{
        //Creates new listDAO object
        $listDAO = new listDAO();

        //Create a new list and passes variables as parameters
        // $list = new GroceryList($listName, $item, $description, $price, $priceDetails, $sale, date("Y-m-d h:i:s"), $location, $postalCode, $favourited);

        //Calls listDAO addList function with the list object as a parameter
        $getSuccess = $listDAO->removeItem($listName, $item, $location);
    }catch(Exception $e){
        // echo '<h3>Error on page.</h3>';
        // echo '<p>' . $e->getMessage() . '</p>';            
    }
    
    
?>