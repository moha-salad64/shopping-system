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

if($_SERVER["REQUEST_METHOD"] == "POST"){

    require_once('dbconn.php');

    $itemname = $_POST['itemname'];
    $itemprice = $_POST['itemprice'];
    $itemnumber = $_POST['itemnumber'];

         //checking varaibles that hold the value of the input fields
        if(empty($itemname) && empty($itemprice) && empty($itemnumbe)){
            $inputCheck = true;
        }
        else{
                $sql = "insert into shopping_items(item_name , item_price , itme_number) 
                            values('$itemname' , '$itemprice' , '$itemnumber')"; 
                $result = $conn->query($sql);
                if($result){
                    $success = true;
                }
                else{
                    die("invalid insertion error" .$conn->error);
                }
        }      
}
?>
    <div class="container mt-5 w-75">
        <form action="" method="post">
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
                    if($success){
                        header("location:/shop-system/shopping.php");
                    };
                ?>
            <label class="form-label fs-3 fw-bold">Item Name</label>
            <input class="form-control fs-5 fw-bold w-50" type="text" placeholder="Add Item Name" name="itemname">
            <label class="form-label fs-3 fw-bold">Item Price</label>
            <input class="form-control fs-5 fw-bold w-50" type="number" placeholder="Add Item Price" name="itemprice">
            <label class="form-label fs-3 fw-bold">Item Number</label>
            <input class="form-control fs-5 fw-bold w-50" type="number" placeholder="Add Item Number" name="itemnumber">
            <div class="row gap-3 mt-4 p-2">
                <button type="submit" class="btn btn-primary w-25 fs-3 rounded-3">Save</button>
                <button type="reset" class="btn btn-danger w-25 fs-3 rounded-3">Cancel</button>
            </div>
        </form>

    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>