<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- main.css file link -->
    <link rel="stylesheet" href="main.css"> 
</head>
<body>
    <?php
    $inputCheck = false;
    $success = false;
    $itempriceControl = false;
    $itemnumberControl = false;
    if($_SERVER['REQUEST_METHOD'] == "GET"){
        require_once('dbconn.php');
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $sql = "SELECT * FROM shopping_items WHERE id = $id";
            $result = $conn->query($sql);
            $row = $result->fetch_array();
            if(!$row){
                header("location:/shop-sytem/shopping.php");
                exit;
            }
            else{
                $item_name = $row['item_name'];
                $item_price = $row['item_price'];
                $item_number = $row['itme_number'];
            }    
        }
    }
    
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        require_once('dbconn.php');
        $item_name = $_POST['itemname'];
        $item_price = $_POST['itemprice'];
        $item_number = $_POST['itemnumber'];
        if(empty($item_name) && empty($item_price) && empty($item_number)){
            $inputCheck = true;
        }
        else{
            if($item_price <= 0){
                $itempriceControl = true;
            }
            elseif($item_number < 0){
                $itemnumberControl = true;
            }
            else{
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $sql = "UPDATE shopping_items SET item_name = '$item_name', item_price = '$item_price', itme_number = '$item_number' WHERE id = $id";
                } else {
                    $sql = "INSERT INTO shopping_items (item_name, item_price, item_number) VALUES ('$item_name', '$item_price', '$item_number')";
                }
                $result = $conn->query($sql);
                if($result){
                    $success = true;
                    header("location:/shop-system/shopping.php");
                }
            }
        }
    }
    ?>
    <div class="container mt-5 w-75">
        <form action="" method="POST">
            <h2 class="fs-1 fw-bolder ">Add New Item</h2>
            <?php
                    if($inputCheck){
                    echo '<div class="alert alert-danger alert-dismissible w-50" fade show role="alert">
                            <strong>Empty Fields!</strong> All input fields are required!.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                    };
                ?>

                <?php
                    if($itempriceControl){
                    echo '<div class="alert alert-danger alert-dismissible w-50" fade show role="alert">
                            <strong>Item price must be greater then 0.</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                    };
                ?>

                <?php
                    if($itemnumberControl){
                    echo '<div class="alert alert-danger alert-dismissible w-50" fade show role="alert">
                            <strong>Number of items must be 0 || greater then.</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                    };
                ?>

            <label class="form-label fs-3 fw-bold">Item Name</label>
            <input class="form-control fs-5 fw-bold w-50" type="text" placeholder="Add Item Name" name="itemname" value= "<?php echo $item_name ?>" >
            <label class="form-label fs-3 fw-bold">Item Price</label>
            <input class="form-control fs-5 fw-bold w-50" type="number" placeholder="Add Item Price" name="itemprice" value = "<?php echo $item_price ?>">
            <label class="form-label fs-3 fw-bold">Item Number</label>
            <input class="form-control fs-5 fw-bold w-50" type="number" placeholder="Add Item Number" name="itemnumber" value="<?php echo $item_number ?>">
            <div class="row gap-3 mt-4 p-2">
                <button type="submit" class="btn btn-primary w-25 fs-3 rounded-3">Save</button>
            </div>
        </form>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
