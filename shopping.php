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
    <div class="container mt-4">
        <?php require('include_files/header.html'); ?>
            <div class="d-flex justfy-content-between align-items-center gap-lg-5">
                <a class='btn btn-primary btn-sm fs-4' href='add_item.php'>Add New Item</a>
                <h2 class="fs-1 fw-bolder">Wellcome to Shopping List Page</h2>
                 </div>   
        <table class="table table-striped table-hover w-50 table-bordered">
                <thead class="fs-3 fw-bold" >
                    <tr>
                    <th>Item Name</th>
                    <th>Item Price</th>
                    <th>Item Number</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <?php
                if($_SERVER['REQUEST_METHOD'] =="GET"){
                    require_once('dbconn.php');
                    //select all employee from database
                    $sql = "select * from shopping_items";
                    //excution of the query
                    $result = $conn->query($sql);
                    if($result){
                    while($rows = $result->fetch_array()){
                        echo "
                            <tr class='fs-5'>
                            <td>$rows[1]</td>
                            <td>$rows[2]</td>
                            <td>$rows[3]</td>
                             <td>
                                <a class='btn btn-success btn-sm fs-5' href='edit_item.php?id=$rows[0]'>Edit</a>
                                <a class='btn btn-danger btn-sm fs-5' href='delete_item.php?id=$rows[0]'>Delete</a>
                                </td>
                            </tr>";
                        }
                    }
                }
                ?> 
            </table>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>