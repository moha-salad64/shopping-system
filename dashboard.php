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
    <div class="container_dash">
        <div class="col sectionpart">
            <div class="sidenav">
            <div class="d-flex justfy-content-between align-items-center m-3">
                    <a class="link-offset-2 link-underline link-underline-opacity-0" href="index.php">
                    <img src="images/b_arrow.png" alt="back to home page" width="30" height="30">
                    </a>
                 </div>
                <?php
                $admin = 'admin';
                    if($_SERVER['REQUEST_METHOD'] =="GET"){
                        require_once('dbconn.php');
                        $sql = "select user_type , profile_picture from emp_register where user_type ='$admin'";
                        $result = $conn->query($sql);
                        if ($result && $result->num_rows > 0) {
                            $user = $result->fetch_assoc();
                            $user_type = $user['user_type'];
                            $profile_picture = $user['profile_picture'];
                        } else {
                            $user_type = '';
                            $profile_picture = '';
                        }
                    }
                    else{
                        header('location:/dashboard.php');
                    }
                ?>
                <div class="profile">
                <?php if ($user_type == 'admin'): ?>
                    <div class="profile-section">
                        <img 
                            src="upload/<?php echo !empty($profile_picture) ? $profile_picture : 'default.jpg'; ?>" 
                            alt="Admin Profile Picture" 
                            class="img-thumbnail" 
                            style="width: 150px; height: 150px; object-fit: cover;"
                        >
                        <p class="text-center fw-bold text-light">Admin</p>
                    </div>
                <?php endif; ?>

                    <!-- <img src="images/profile-img.jpeg" alt="prifile picture">  -->
                </div>
                <h2>Dashboard</h2>
                <ul>
                    <li><a href="dashboard.php">employee</a></li>
                    <li><a href="shopping.php">Shopping List</a></li>
                </ul>
                <ul class="logout">
                    <li><a href="login.php">log out</a></li>
                </ul>
            </div>
            <div class="sidebox">
             <div class="dash-header">
                 <a class='btn btn-primary btn-sm' href='login.php'>Register Now</a>
             </div>   
            <table class="table table-striped table-hover tablecontainer">
            <thead >
                <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Username</th>
                <th>Password</th>
                <th>Gender</th>
                <th>User Type</th>
                <th>Phone</th>
                <th>Email</th>
                <th>User Statu</th>
                <th>Profile Picture</th>
                <th>Action</th>
                </tr>
            </thead>
            <?php
            if($_SERVER['REQUEST_METHOD'] =="GET"){
                require_once('dbconn.php');
                //select all employee from database
                $sql = "select * from emp_register";
                //excution of the query
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
                            <a class='btn btn-danger btn-sm' href='delete.php?id=$rows[0]'>Delete</a>
                            </td>
                        </tr>";
                    }
                }
            }
            ?> 
        </table>
            </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>