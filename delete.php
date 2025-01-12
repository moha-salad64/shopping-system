<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping System</title>
</head>
<body>
    <?php
    if(isset($_GET['id'])){

        require_once('dbconn.php');
        //get id from the url 
        $id = $_GET['id'];
        //delete user that find
        $sql = "delete from emp_register where id=$id";
        $conn->query($sql);
    }
    header('location:/shop-system/dashboard.php');
    exit;
    ?>
</body>
</html>