<?php 
    //Setting default timezone
    date_default_timezone_set("EST");

    require_once('./dao/listDAO.php'); 

    // tries the DAO and sets errors if information is incorrect
    try{
        //Creates new listDAO object
        $listDAO = new listDAO();

        //Calls listDAO addList function with the list object as a parameter
        echo $listDAO->fetchMyList();

    }catch(Exception $e){
        // echo '<h3>Error on page.</h3>';
        // echo '<p>' . $e->getMessage() . '</p>';            
    }
    
    
?>