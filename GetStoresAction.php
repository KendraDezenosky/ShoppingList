
<?php 

require_once('./dao/storeDAO.php'); 

    $listName = $_POST['listName'];
    $postalCode = $_POST['postalCode'];

    // tries the DAO and sets errors if information is incorrect
    try{
        //Creates new listDAO object
        $storeDAO = new storeDAO();

        //Create a new list and passes variables as parameters
        // $stores = new Store($storeName, $starRating);

        //Calls listDAO addList function with the list object as a parameter
        $stores = $storeDAO->getAllStores($listName, $postalCode);

        foreach($stores as $store) {
            echo $store . "|";
        }

    }catch(Exception $e){
        // echo '<h3>Error on page.</h3>';
        // echo '<p>' . $e->getMessage() . '</p>';            
    }
    
    
?>