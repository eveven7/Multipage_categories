<?php
include $_INNER_PATH."/models/DB.php";
class Item{
    public $id;
    public $name;
    public $price;
    public $about;
    public $title;
    public $categoryId;

 
    public function __construct($id = null, $name = null,  $price = null, $about = null, $title = null, $categoryId = null)
    {
      $this->id = $id;
      $this->name = $name;
      $this->price = $price;
      $this->about = $about;
      $this->title = $title;
      $this->categoryId = $categoryId;

    }


    public static function all(){
        $items = [];
        $db = new DB();
        $query = "SELECT
        `it`.`id`,
        `it`.`name`,
        `it`.`price`,
        `it`.`about`,
        `it`.`category_id`,
        `ct`.`title`
    FROM
        `items` `it`
    JOIN `categories` `ct` ON
        `ct`.`id` = `it`.`category_id`";
        $result = $db->conn->query($query);

        while($row = $result->fetch_assoc()){
            $items[] = new Item( $row['id'], $row['name'], $row['price'], $row['about'], $row['title'] ,$row['category_id']);
        }
        $db->conn->close();
        return $items;
    }

    public static function create()
    {
       $db = new DB();
    //    $tempVal = 1;
       $stmt = $db->conn->prepare("INSERT INTO `items`( `name`, `price`, `about`, `category_id`) VALUES (?,?,?,?)");
       $stmt->bind_param("sdsi", $_POST['name'], $_POST['price'], $_POST['about'], $_POST['ItemCat']);
            $stmt->execute();
        // if(!$stmt->execute())
        // {
        //     echo $stmt->error;
        // }
       $stmt->close();
       $db->conn->close();
    }

    public static function find($id)
    {
        $item = new Item();
        $db = new DB();
        $query = "SELECT
                    `it`.`id`,
                    `it`.`name`,
                    `it`.`price`,
                    `it`.`about`,
                    `it`.`category_id`,
                    `ct`.`title`
                FROM
                    `items` `it`
                JOIN `categories` `ct` ON
                    `ct`.`id` = `it`.`category_id` where `it`.`id`=". $id;

                    // echo $query;
                    // die;
        $result = $db->conn->query($query);

        while($row = $result->fetch_assoc()){
            $item = new Item( $row['id'], $row['name'], $row['price'], $row['about'], $row['title'], $row['category_id']);
        }
        $db->conn->close();
        return $item;
    }

    public function update()
    {     
        // print_r($_POST);
        // die;

        $db = new DB();
        $stmt = $db->conn->prepare("UPDATE `items` SET `name`= ? ,`price`= ? ,`about`= ?,`category_id`= ? WHERE `id` = ?");
        $stmt->bind_param("sisii", $this->name, $this->price, $this->about, $this->categoryId, $this->id);
        $stmt->execute();

        
//   if(!$stmt->execute())
//         {
//             echo $stmt->error_list;
//         }
//         die;
        $stmt->close();
        $db->conn->close();
    }

    public static function destroy($id)
    {
        $db = new DB();
        $stmt = $db->conn->prepare("DELETE FROM `items` WHERE `id` = ?");
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

        $query = "SELECT * FROM `items`";

        // if ($_GET['filter'] != "") {
        //     $first = false;
        //     $query .= "WHERE `category` = '". $_GET['filter']. "'";
        // }
        


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
                $items[] = new Item ($row['id'], $row['name'], $row['price'], $row['about'] );

            }
        $db->conn->close();
        return $items;
    }


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