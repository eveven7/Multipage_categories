<?php 
include "../components/head.php"; 
include $_INNER_PATH ."/routes.php"; 
$old = false;
if(isset($_SESSION['POST'])){
    if(count($_SESSION['POST']) != 0){
        $old = true;
    }
}
?>
<body>

    <div class="container">
        <?php include $_INNER_PATH."./views/components/navigation.php";  ?>
        
        <!-- <?php echo $item->name;?> -->
        <div class="row">
            <div class="col-4 left"></div>
            <div class="col-4 big">

            <h1>
                Product update
            </h1>
        <form action="" method="post" class="update">

                <div class="form-group">
                    <label for="f1">Product name</label>
                    <input type="text" name="name" id="f1" value="<?=($old)? $_SESSION['POST']['name'] : $item->name?>" class="form-control"">
                </div>
               
                <div class="form-group">
                    <label for="f3">Price</label>
                    <input type="number" step=".01" name="price" id="f3" value="<?=($old)? $_SESSION['POST']['price'] : $item->price?>" class="form-control" ">
                </div>
            

                <div class="form-group">
                    <label for="f4">Product description</label>
                    <textarea class="form-control"name="about" rows="6" id="f4">  <?=($old)? $_SESSION['POST']['about'] : $item->about?> </textarea>

</div>


                <input type="hidden" name="id" value="<?=$item->id?>" >

                <select class="form-select" name ="ItemCat">
                    <option selected value = "">CHOOSE CATEGORY</option>
                    <?php foreach($itemCatg as $key => $ig) {?>
                        <option <?=($item->categoryId == $ig->id)? "selected" : "" ?> value="<?= $ig->id?>"><?= $ig->title?></option>             
                    <?php }?>
            
                 </select>




                <input type="hidden" name="id" value="<?=$item->id?>" >
                <button type="submit" name="update" class="btn btn-success mt-3 mb-3">Save</button>

        </form> 
        </div>
            <div class="col-4 right"></div>
        </div>
    </div>
</body>
</html>

<?php
    $_SESSION['POST'] = [];
?>

<style>

    
.big{
    border-top: 1px solid rgba(151, 148, 148, 0.89);
  border-bottom: 1px solid rgba(151, 148, 148, 0.89);


}

.left{
    border-top: 1px solid rgba(151, 148, 148, 0.89);
  border-bottom: 1px solid rgba(151, 148, 148, 0.89);
  border-left: 1px solid rgba(151, 148, 148, 0.89);


}

.right{
    border-top: 1px solid rgba(151, 148, 148, 0.89);
  border-bottom: 1px solid rgba(151, 148, 148, 0.89);
  border-right: 1px solid rgba(151, 148, 148, 0.89);


}


    h1{
        text-align: center;
        padding-bottom: 30px;
        font-size: 1.6em;

    }
    .container{

        font-family: "Open Sans", sans-serif;
    }

    
    .form-group
{

  transition: all 0.2s;
  
  background-color: white;
  border-radius: 5px;
  font-size: 1.875em;
  /* padding-top: 30px; */
  padding-bottom: 15px;

}
</style>