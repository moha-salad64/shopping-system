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
    $errorMessage = false;
    $inputError = false;
    $id = $_GET['id'] ?? null;

    if(isset($id)) {
        require_once('dbconn.php');

        // Fetch user data
        $sql = "SELECT * FROM emp_register WHERE id = $id";
        $result = $conn->query($sql);
        $row = $result->fetch_array();
        
        if(!$row){
            header('Location: /shop-system/dashboard.php');
            exit;
        }

        // Hold data from database in variables
        $firstname = $row['first_name'];
        $lastname = $row['last_name'];
        $username = $row['user_name'];
        $password = $row['password'];
        $gender = $row['gender'];
        $mcheck = $gender == 'male' ? 'checked' : '';
        $fcheck = $gender == 'female' ? 'checked' : '';
        $usertype = $row['user_type'];
        $phone = $row['phone'];
        $email = $row['email'];
        $userstatus = $row['user_status'];
        $active = $userstatus == 'active' ? 'checked' : '';
        $noactive = $userstatus == 'no active' ? 'checked' : '';
        $image = $row['profile_picture'];
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $gender = $_POST['gender'];
        $usertype = $_POST['usertype'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $userstatus = $_POST['status'];
        $image = $_FILES['image']['name'] ?? '';

        if (empty($fname) || empty($lname) || empty($username) || empty($password) || empty($gender) || empty($usertype) || empty($phone) || empty($email) || empty($userstatus)) {
            $inputError = true;
        }

        if (!$inputError) {
            // Handle file upload
            if (!empty($_FILES['image']['name'])) {
                $targetDir = "uploads/";
                $targetFile = $targetDir . basename($_FILES['image']['name']);
                move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);
            }

            // Update employee data
            $sql = "UPDATE emp_register SET 
                    first_name = '$fname', 
                    last_name = '$lname', 
                    user_name = '$username', 
                    password = '$password', 
                    gender = '$gender', 
                    user_type = '$usertype', 
                    phone = '$phone', 
                    email = '$email', 
                    user_status = '$userstatus', 
                    profile_picture = '$image' 
                    WHERE id = $id";
            $result = $conn->query($sql);

            if (!$result) {
                $errorMessage = true;
            } else {
                header('Location: /shop-system/dashboard.php');
                exit;
            }
        }
    }
    ?>

    <div class="container rounded-4 mt-3 p-2 shadow bg-body-tertiary">
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="row">
                <div class="d-flex justify-content-between align-items-center">
                    <a class="link-offset-2 link-underline link-underline-opacity-0" href="dashboard.php">
                        <img src="images/b_arrow.png" alt="back to home page" width="40" height="40">
                    </a>
                    <h1 class="text-center fs-1 fw-bolder flex-grow-1">Employee Update</h1>
                </div>
                <?php
                if ($errorMessage) {
                    echo '<div class="alert alert-danger alert-dismissible" role="alert">
                            <strong>Sorry!!!</strong> Nothing Updated!.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                }
                if ($inputError) {
                    echo '<div class="alert alert-danger alert-dismissible" role="alert">
                            <strong>Sorry fields are not work!</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                }
                ?>
                <div class="col">
                    <label class="form-label fs-3 fw-bold">First Name</label>
                    <input class="form-control fs-5 fw-bold" type="text" placeholder="First Name" name="firstname" value="<?php echo $firstname ?>">
                    <label class="form-label fs-3">Last Name</label>
                    <input class="form-control fs-5 fw-bold" type="text" placeholder="Last Name" name="lastname" value="<?php echo $lastname ?>">
                    <label class="form-label fs-3 fw-bold">Username</label>
                    <input class="form-control fs-5 fw-bold" type="text" placeholder="Username" name="username" value="<?php echo $username ?>">
                    <label class="form-label fs-3 fw-bold">Password</label>
                    <input class="form-control fs-5 fw-bold" type="password" placeholder="Password" name="password" value="<?php echo $password ?>">
                    <label class="form-label fs-3 fw-bold">Gender</label>
                    <div class="form-check d-flex align-items-center gap-5">
                        <div class="d-flex align-items-center gap-1">
                            <input class="form-check-input fs-5 fw-bold" type="radio" name="gender" value="male" <?php echo $mcheck ?>>
                            <label class="form-check-label fs-5 fw-bold">Male</label>        
                        </div>
                        <div class="d-flex align-items-center gap-1">
                            <input class="form-check-input fs-5 fw-bold" type="radio" name="gender" value="female" <?php echo $fcheck ?>>
                            <label class="form-check-label fs-5 fw-bold">Female</label>        
                        </div>
                    </div>
                </div>

                <div class="col">
                    <label class="form-label fs-3 fw-bold">User Type</label>
                    <input class="form-control fs-5 fw-bold" type="text" placeholder="User Type" name="usertype" value="<?php echo $usertype ?>">
                    <label class="form-label fs-3 fw-bold">Profile Picture</label>
                    <input class="form-control fs-5 fw-bold" type="file" placeholder="Profile Picture" name="image">
                    <label class="form-label fs-3 fw-bold">Phone</label>
                    <input class="form-control fs-5 fw-bold" type="text" placeholder="Phone" name="phone" value="<?php echo $phone ?>">
                    <label class="form-label fs-3 fw-bold">Email</label>
                    <input class="form-control fs-5 fw-bold" type="email" placeholder="Email" name="email" value="<?php echo $email ?>">
                    <label class="form-label fs-3 fw-bold">User Status</label>
                    <div class="form-check d-flex align-items-center gap-5">
                        <div class="form-check">
                            <input class="form-check-input fs-5 fw-bold" type="radio" value="active" name="status" <?php echo $active ?>>
                            <label class="form-check-label fs-5 fw-bold">Active</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input fs-5 fw-bold" type="radio" value="no active" name="status" <?php echo $noactive ?>>
                            <label class="form-check-label fs-5 fw-bold">No Active</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row gap-3 justify-content-center mt-4 p-2">
                <button type="submit" class="btn btn-primary w-25 fs-3 rounded-3">Save</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
