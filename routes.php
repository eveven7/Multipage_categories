<?php 
include $_INNER_PATH."/controllers/ItemController.php"; 
include $_INNER_PATH."/controllers/ItemCatController.php"; 



if(str_contains($_SERVER['REQUEST_URI'], "/item/") !== false){
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        
        if(isset($_POST['save'])){
            ItemController::store();
        header("Location: ".$_OUTER_PATH."/views/item/index.php");
        die;
        }
            
        if(isset($_POST['update'])){
            
            ItemController::update();        
           header("Location: ".$_OUTER_PATH."/views/item/index.php");
           die;
        }
        
        if(isset($_POST['destroy'])){
            ItemController::destroy();
            header("Location: ".$_OUTER_PATH."/views/item/index.php");
            die;
        }    

    }

        if($_SERVER['REQUEST_METHOD'] == "GET"){
            if(count($_GET) == 0){
                $items = ItemController::index();
            }
            
            if(isset($_GET['show']) ){
                $item = ItemController::show($_GET['id']);     
                $items = ItemController::index();
            }

            if (isset($_GET['search'])) {
                $items = ItemController::search();
                // $items = ItemController::index();
            }
            
            if(isset($_GET['edit'])){
                $item = ItemController::show($_GET['id']);
                $items = ItemController::index();
            }  
            if (isset($_GET['filter']) ) {
                $items = ItemController::filter();
            }
        }
        $categories = ItemCatController::index();

}



if(str_contains($_SERVER['REQUEST_URI'], "/categories/") !== false){
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        
        if(isset($_POST['save'])){
            ItemCatController::store();
        header("Location: ".$_OUTER_PATH."/views/categories/index.php");
        die;
        }
            
        if(isset($_POST['update'])){
            ItemCatController::update();        
           header("Location: ".$_OUTER_PATH."/views/categories/index.php");
           die;
        }
        
        if(isset($_POST['destroy'])){
            ItemCatController::destroy();
            header("Location: ".$_OUTER_PATH."/views/categories/index.php");
            die;
        }    

    }

        if($_SERVER['REQUEST_METHOD'] == "GET"){
            if(count($_GET) == 0){
                $itemCatg = ItemCatController::index();
            }
            
            if(isset($_GET['show']) ){
                $itemCat = ItemCatController::show($_GET['id']);     
                $itemCatg = ItemCatController::index();
            }

            if (isset($_GET['search'])) {
                $itemCatg = ItemCatController::search();
            }
            
            if(isset($_GET['edit'])){
                $itemCat = ItemCatController::show($_GET['id']);
                $itemCatg = ItemCatController::index();
            }  
            if (isset($_GET['filter']) ) {
                $itemCatg = ItemCatController::filter();
            }

        }
        //  $categories = ItemController::getCategories(); 
        
    }
    
    $itemCatg= ItemCatController::index(); 
    



?>