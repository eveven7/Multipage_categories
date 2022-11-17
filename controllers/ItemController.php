<?php
include $_INNER_PATH."/models/Item.php";
include $_INNER_PATH."/helperClasses/Validator.php";
// include $_INNER_PATH."/views/item/filter.php";



class ItemController{

    public static function index()
    {
        $item = Item::all();
        return $item;
    }

    public static function store()
    {   
        if(Validator::validate()){
            header("Location: "."http://".$_SERVER['SERVER_NAME']."/Multipage_categories"."/views/item/add.php");
            die;
        }
        Item::create();
    }

    public static function show($id)
    {
        // print_r($item);
        // echo"something";
        // die;
        $item = Item::find($id);
        return $item;
    }

    public static function update()
    {
        if(Validator::validate()){
            header("Location: "."http://".$_SERVER['SERVER_NAME']."/Multipage_categories"."/views/item/edit.php?edit=&id=".$_GET['id']);
            die;
        }
        // echo"something";
        // die;
       $item = new Item();
       $item->id = $_POST['id'];
       $item->name = $_POST['name'];
       $item->categoryId = $_POST['ItemCat'];// ateina is views/item/Edit
       $item->title = $_POST['ItemCat'];// ateina is views/item/Edit

       $item->price = $_POST['price'];
       $item->about = $_POST['about'];
       $item->update();
    }

    public static function destroy()
    {
        Item::destroy($_POST['id']);
    }

    public static function filter()
    {
        return Item::filter();
        
    }
    public static function search()
    {
        return Item::search();
    }
    

    // public static function getCategories()
    // {
    //     $cats = Item::getCategories();
    //     return $cats;
    // }







}
?>