<?php
include $_INNER_PATH."/models/ItemCat.php";
// include $_INNER_PATH."/helperClasses/Validator.php";
// include $_INNER_PATH."/views/item/filter.php";



class ItemCatController{

    public static function index()
    {
        $itemCatg = ItemCat::all();
        return $itemCatg;
    }

    public static function store()
    {   
        // if(Validator::validate()){
        //     header("Location: "."http://".$_SERVER['SERVER_NAME']."/Multipage"."/views/item/add.php");
        //     die;
        // }
        ItemCat::create();
    }

    public static function show($id)
    {
    
        $itemCat = ItemCat::find($id);
        return $itemCat;
    }

    public static function update()
    {
        // if(Validator::validate()){
        //     header("Location: "."http://".$_SERVER['SERVER_NAME']."/Multipage"."/views/item/edit.php?edit=&id=".$_GET['id']);
        //     die;
        // }
        
       $itemCat = new ItemCat();
       $itemCat->id = $_POST['id'];
       $itemCat->title = $_POST['title'];
        $itemCat->update();
       
    //    $itemCat->categoryId = $_POST['ItemCat'];
       
    }

    public static function destroy()
    {
        ItemCat::destroy($_POST['id']);
    }

    public static function filter()
    {
        return ItemCat::filter();
        
    }
    public static function search()
    {
        return ItemCat::search();
    }
    

    // public static function getCategories()
    // {
    //     $cats = Item::getCategories();
    //     return $cats;
    // }







}
?>