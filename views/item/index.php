<?php 
include "../components/head.php"; 
include $_INNER_PATH ."/routes.php"; 

?>
<body>

    <?php include $_INNER_PATH."./views/components/navigation.php";  ?>

    <div class="container">
    <form action="" method="get">
    <div class="row">
        <div class="col-2">
            <select class="form-select" name = "filter">
                <option selected value = "">CHOOSE CATEGORY</option>
                <?php foreach($categories as $key => $category) {?>
                    <option <?=(isset($_GET["filter"]))?($_GET["filter"] == $category) ? "selected" : '':'';?> value="<?= $category->id?>"><?= $category->title ?></option>             
               
                 
                    <?php }?>
            
                </select>
        </div>
        <div class="col-3">
        <input type="text" class="form-control" <?=(isset($_GET["from"])) ? ($_GET["from"] != "") ? 'value = ' . $_GET["from"] : '': '';?> name = "from" placeholder="PRICE FROM">        </div>
        <div class="col-3">
        <input type="text" class="form-control" <?=(isset($_GET["to"])) ? ($_GET["to"] != "") ? 'value = ' . $_GET["to"] : '': '';?> name = "to" placeholder="PRICE TO">
        </div>
        <div class="col-2">
            <select class="form-select" name = "sort">
                <option <?=(isset($_GET["sort"]))?($_GET["sort"] == 0) ? "selected" : '':'';?> selected value="0">SORT</option>
                <option <?=(isset($_GET["sort"]))?($_GET["sort"] == 1) ? "selected" : '':'';?> value="1">Price Ascending Order</option>
                <option <?=(isset($_GET["sort"]))?($_GET["sort"] == 2) ? "selected" : '':'';?>value="2">Price Descending Order</option>
                <option <?=(isset($_GET["sort"]))?($_GET["sort"] == 3) ? "selected" : '':'';?>value="3">Product name A-Z Order</option>
                <option <?=(isset($_GET["sort"]))?($_GET["sort"] == 4) ? "selected" : '':'';?>value="4">Product name Z-A Order</option>
            </select>
        </div>
        <div class="col-2">
        <button type="submit" class="btn btn-primary" >Filter</button>
        </div>
    </div>
</form>



    <table class="table table-striped table-hove">
            <thead>
                <tr>
                <!-- <th>ID</th> -->

                    <th>Name</th>
                    <th>Category</th>
                    <!-- <th>Category amount</th> -->

                    <th>Price</th>
                    <th>About</th>


                    <th>Show</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item) { ?>
                <tr>                        
                    
                

                        <td> <?=$item->name?> </td>
                        <td> <?=$item->title?> </td>

                        <td> <?=$item->price?> </td>
                        <td> <?=$item->about?> </td>

                        <td>
                            <form action="<?=$_OUTER_PATH.'/views/item/show.php'?>" method="get">
                                <input type="hidden" name="id" value=" <?=$item->id?>">
                                <button type="submit" name="show" class="btn btn-primary">Show</button>
                            </form>
                        </td>
                        <td>
                            <form action="<?=$_OUTER_PATH.'/views/item/edit.php'?>" method="get">
                                <input type="hidden" name="id" value="<?=$item->id?>">
                                <button type="submit" name="edit" class="btn btn-success">Edit</button>
                            </form>
                        </td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="id" value="<?=$item->id?>">
                                <button type="submit" name="destroy" class="btn btn-danger">Delete</button>
                            </form>
                        </td>

                </tr>
                <?php  } ?>
            </tbody>
        </table>
        </div>


        <style>

                    input:focus::placeholder {
                    color: transparent;
                    }
                    body > * { 
                    text-align: center;
                    margin-left: 50px; }

                    table {
                        border-spacing: 30px 20px;
                        margin: 200px auto;
                        font-family: "Open Sans", sans-serif;

                        width: 100%;
 
                    }

                    

                    thead > tr {
                        
                        border: 0.5px solid rgba(151, 148, 148, 0.89);
                        padding: 40px 60px;
                        }

                        table td, table th {
                            padding: 10px; /* cellpadding */
                        }
                        


                        tr:not(.no-hover):hover {
                        background-color:  rgb(216, 216, 216);
                        }

                       

          </style> 
</body>
</html>