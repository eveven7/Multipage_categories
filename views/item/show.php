<?php 
include "../components/head.php"; 
// include ".../models/Item.php"; 

include $_INNER_PATH ."/routes.php"; 
print_r($item);
?>
<body>
    <div class="row-5"> </div>
<div class="container">
    <?php include $_INNER_PATH."./views/components/navigation.php";  ?>



 
            
            </div>
            <div class="col-4 big">


    <div class="form-group">
            <label class = "f1" for="f1">Product name</label>
            <p><?=$item->name?> </p>
        </div>
        <div class="form-group">
            <label class = "f1" for="f1">Product category</label>
            <p><?=$item->title?> </p>
        </div>
        
        <div class="form-group">
            <label class = "f1" for="f3">Price</label>
            <p><?=$item->price?></p>
        </div>
        <div class="form-group">
            <label class = "f1" for="f4">Product description</label>
           <p><?=$item->about?></p>
        </div>

    



        <form action="<?=$_OUTER_PATH.'/views/item/edit.php'?>" method="get" class="button">
            <input type="hidden" class= "btn" name="id" value=" <?=$item->id?>">
            <button type="submit" name="edit" class="btn btn-success">EDIT</button>
       

        </div>
            <div class="col-4 right"></div>
        </div>

 </form>
</div>

<style>



</style>
            
</body>
</html>


