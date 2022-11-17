<?php

class Validator{


public static function validate()
{
    $hasErrors = false;     

    if($_POST['name'] == ""){
        $_SESSION['errors'][] = "Name field can not be empty";
        $hasErrors = true;
    }
    // if($_POST['category'] == ""){
    //  $_SESSION['errors'][] = "Category field can not be empty";
    //     $hasErrors = true;
    // }
    
    if(!is_numeric($_POST['price'])){
        $_SESSION['errors'][] = "You must enter a numeric value for the unit price";
        $hasErrors = true;
    }
    if($_POST['about'] == ""){
        $_SESSION['errors'][] = "Product description field can not be empty";
        $hasErrors = true;
    }

    if($hasErrors){
        foreach ($_POST as $key => $value) {
            $_SESSION['POST'][$key] = $value;
        }
    }

    return $hasErrors;
}











}

?>