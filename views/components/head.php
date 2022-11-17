
<?php
session_start();
$_INNER_PATH = $_SERVER['DOCUMENT_ROOT']."/Multipage_categories";
$_OUTER_PATH = "http://".$_SERVER['SERVER_NAME']."/Multipage_categories";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
            crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
            integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">

            <link rel="stylesheet" href="<?= $_OUTER_PATH ."/css/style.css"?>">

            <title>IKEA CATALOG RECORDS</title>


</head>

<?php
if(isset($_SESSION['errors'])){
    foreach ($_SESSION['errors'] as $error) { ?>
       <div class="alert alert-danger" role="alert">
            <?=$error?>
        </div>
    <?php } } 
    $_SESSION['errors'] = []; ?>