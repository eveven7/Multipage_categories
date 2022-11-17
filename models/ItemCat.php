<?php
// include $_INNER_PATH."/models/DB.php";
class ItemCat{
    public $id;
    public $title;
   public $amount;
   
    public function __construct($id = null, $title = null, $amount = null)
    {
      $this->id = $id;
      $this->title = $title;
      $this->amount = $amount;
   
    }


    public static function all(){
        $itemCatg = [];
        $db = new DB();
        $query = "SELECT `ct`.`id`, `ct`.title,
        COUNT(`it`.`id`) AS 'amount'
        FROM `items` `it`
        RIGHT JOIN `categories` `ct`
        ON `ct`.`id` = `it`.`category_id`
        GROUP BY `ct`.`id`";
        



        //  print_r($query);
        // die;
        $result = $db->conn->query($query); 
        
       

        while($row = $result->fetch_assoc()){
            $itemCatg[] = new ItemCat( $row['id'], $row['title'], $row['amount']);
        }
        $db->conn->close();
        return $itemCatg;
       
    }

    public static function create()
    {
       $db = new DB();
       $stmt = $db->conn->prepare("INSERT INTO `categories`( `title`) VALUES (?)");
       $stmt->bind_param("s", $_POST['title']);
       $stmt->execute();

       $stmt->close();
       $db->conn->close();
    }

    public static function find($id)
    {
        $itemCat = new itemCat(); //tuscias objektas
        $db = new DB();
        $query = "SELECT `ct`.`id`, `ct`.title,
        COUNT(`it`.`id`) AS 'amount'
        FROM `items` `it`
        RIGHT JOIN `categories` `ct`
        ON `ct`.`id` = `it`.`category_id`
        GROUP BY `ct`.`id`";
        $result = $db->conn->query($query);

        while($row = $result->fetch_assoc()){
            $itemCat = new itemCat( $row['id'], $row['title'], $row['amount']);
        }//grazina viena item category
        $db->conn->close();
        return $itemCat;
    }

    public function update()
    {       
        $db = new DB();
        $stmt = $db->conn->prepare("UPDATE `categories` SET `title`= ?  WHERE `id` = ?");
        $stmt->bind_param("si", $this->title, $this->id);
        $stmt->execute();
 
        $stmt->close();
        $db->conn->close();
    }

    public static function destroy($id)
    {
        $db = new DB();
        $stmt = $db->conn->prepare("DELETE FROM `categories` WHERE `id` = ?");
        $stmt->bind_param("i", $_POST['id']);
        $stmt->execute();
 
        $stmt->close();
        $db->conn->close(); 
    }

    public static function filter()
    { 
        $items = [];
        $db = new DB();
        $first = true;

        $query = "SELECT * FROM `categories`";

        if ($_GET['filter'] != "") {
            $first = false;
            $query .= "WHERE `title` = '". $_GET['filter']. "'";
        }
        


        if ($_GET['from'] != "") {
            $query .= (($first)? "WHERE" : "AND") . "`price` >= " . $_GET['from'] . " ";
                $first = false;
            }


            if ($_GET['to'] != "") {
                $query .= (($first)? "WHERE" : "AND") . "`price` <= " . $_GET['to'] . " ";
                $first = false;
         }



        switch ($_GET['sort']){
            case '1':
                $query .= "ORDER by `price`";
                break;
            case '2':
                $query .= "ORDER by `price` DESC";
                break;
            case '3':
                $query .= "ORDER by `name`";
                break;
            case '4':
                $query .= "ORDER by `name` DESC";
                break;
        }

            // print_r($_GET);
            // echo $query;
            //         die;
        $result = $db->conn->query($query);

            while($row = $result->fetch_assoc()){
                $items[] = new Item ($row['id'], $row['name'], $row['price'], $row['about'], $row['title'] );

            }
        $db->conn->close();
        return $items;
    }

    // public static function getCategories()
    // {
    //     $categories = [];
    //     $db = new DB();
    //     $query = "SELECT DISTINCT `title` FROM `categories`";
    //     $result = $db->conn->query($query);
    //     while ($row = $result->fetch_assoc()) {
    //         $categories[] = $row["title"];
    //     }
    //     // print_r($categories);
    //     // die;
    //     $db->conn->close();
    //     return $categories;
    // }

    public static function search()
    {
        $items = [];
        $db = new Db();
        $sql = "SELECT * FROM `items` WHERE `name` LIKE '%" . $_GET['search'] . "%' ";
        // print_r($sql);
        // die;
        $result = $db->conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $items[] = new Item($row['id'], $row['name'], $row['price'], $row['about']);
        }
        // print_r($items);
        // die;
        $db->conn->close();

        return $items;
    }

}
?>