<?php 
include "../components/head.php"; 
// include ".../models/Item.php"; 

include $_INNER_PATH ."/routes.php"; 
?>
<body>
<div class="container">
    <?php include $_INNER_PATH."./views/components/navigation.php";  ?>


    <div class="form-group">
            <label for="f1">Category title</label>
            <h2><?=$itemCat->title?> </h2>
        </div>
       
    <div class="form-group">
            <label for="f1">Category amount: </label>
            <h2><?=$itemCat->amount?> </h2>
        </div>
       





        <form action="<?=$_OUTER_PATH.'/views/categories/edit.php'?>" method="post">
            <input type="hidden" name="id" value=" <?=$itemCat->id?>">
            <button type="submit" name="edit" class="btn btn-success">Edit</button>
        </form>

</div>
</body>
</html>


