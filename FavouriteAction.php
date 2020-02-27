<!-- 
     FavouriteAction.php
     Authors: Kendra Dezenosky, Ibrahim Mekraldi, Solomon Shleifman, Danyao Wang, Anuja Thomas
     Date created: February 20, 2020
-->
<?php 
    require_once('./dao/listDAO.php'); 

    $listName = $_POST['listName'];
    $favourited = $_POST['favourited'];

    // tries the DAO and sets errors if information is incorrect
    try{
        //Creates new listDAO object
        $listDAO = new listDAO();

        //Calls listDAO addList function with the list object as a parameter
        $getSuccess = $listDAO->favouriteList($listName, $favourited);
    }catch(Exception $e){
        // echo '<h3>Error on page.</h3>';
        // echo '<p>' . $e->getMessage() . '</p>';            
    }
    
    
?>