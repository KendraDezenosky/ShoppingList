<!-- 
     NewListAction.php
     Authors: Kendra Dezenosky, Ibrahim Mekraldi, Solomon Shleifman, Danyao Wang, Anuja Thomas
     Date created: February 16, 2020
-->
<?php 

    require_once('./dao/storeDAO.php'); 

    $data = $_POST['data'];
    // json_decode($data);
    // echo json_encode($data);

    // $age=array("Peter"=>"35","Ben"=>"37","Joe"=>"43");

    // foreach($data as $x=>$x_value){

    // echo "Key=" . $x . ", Value=" . $x_value;
    // echo "<br>";
    // }

    $keys = array_keys( $data ); 
      
echo "The keys array: "; 
  
// print_r($keys); 

$review1 = $keys[0];
echo $review1;

    
// echo toStr($data);
    
    // $review1 = $data[0];
    // $review2 = $data[1];
    // $review3 = $data[2];
    // $review4 = $data[3];

    // $label1 = $data[4];
    // $label2 = $data[5];
    // $label3 = $data[6];
    // $label4 = $data[7];
    
    // tries the DAO and sets errors if information is incorrect
    try{
        //Creates new listDAO object
        $storeDAO = new storeDAO();
        
        if( isset($review1) && isset($label1)) { 
            $store1 = new Store($label1, $review1);
            $getSuccess = $storeDAO->reviewStore($store1);
        } 

        if( isset($review2) && isset($label2)) { 
            $store2 = new Store($label2, $review2);
            $getSuccess = $storeDAO->reviewStore($store2);
        } 

        if( isset($review3) && isset($label3)) { 
            $store3 = new Store($label3, $review3);
            $getSuccess = $storeDAO->reviewStore($store3);
        } 

        if( isset($review4) && isset($label4)) { 
            $store4 = new Store($label4, $review4);
            $getSuccess = $storeDAO->reviewStore($store4);
        } 
          
        //Create a new list and passes variables as parameters
        

        //Calls listDAO addList function with the list object as a parameter
        
    }catch(Exception $e){
        // echo '<h3>Error on page.</h3>';
        // echo '<p>' . $e->getMessage() . '</p>';            
    }
    
    
?>