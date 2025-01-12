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
    <div class="container">

        <table class="table">
          <thead>
            <tr>
              <th scope="col">First Name</th>
              <th scope="col">Last Name</th>
              <th scope="col">Username</th>
              <th scope="col">Password</th>
              <th scope="col">Gender</th>
              <th scope="col">User Type</th>
              <th scope="col">Phone</th>
              <th scope="col">Email</th>
              <th scope="col">User Statu</th>
              <th scope="col">Profile Picture</th>
            </tr>
          </thead>
          <?php
        if($_SERVER['REQUEST_METHOD'] =="GET"){
            require_once('dbconn.php');

            $sql = "select * from emp_register";

            $result = $conn->query($sql);
            if($result){
               while($rows = $result->fetch_array()){
                   echo "
                    <tr>
                    <td>$rows[1]</td>
                    <td>$rows[2]</td>
                    <td>$rows[3]</td>
                    <td>$rows[4]</td>
                    <td>$rows[5]</td>
                    <td>$rows[6]</td>
                    <td>$rows[7]</td>
                    <td>$rows[8]</td>
                    <td>$rows[9]</td>
                    <td>$rows[10]</td>
                    <td>
                    <a class='btn btn-success btn-sm' href='edit.php?id=$rows[0]'>Edit</a>
                    </td>
                    <td>
                    <a class='btn btn-danger btn-sm' href='delete.php?id=$rows[0]'>Delete</a>
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