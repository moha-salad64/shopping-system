<?php
$userCheck = false;
$inputCheck = false;
$success = false;

// the requist of the user as post
if($_SERVER["REQUEST_METHOD"] == "POST"){

    require_once('dbconn.php');

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $usertype = $_POST['usertype'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $status = $_POST['status'];
    if(!empty($_FILES['image']['name'])){
        $extantion = explode("." , $_FILES['image']['name']);
        $extantion = end($extantion);
        //uploading image in the file 
        move_uploaded_file($_FILES['image']['tmp_name'], "upload/". $_POST['username']."$extantion");
        $image = $_POST['username']."$extantion";
    }
     else{
            $image = "";

         //checking varaibles that hold the value of the input fields
        if(empty($firstname) && empty($lastname) && empty($username) && empty($password) && empty($gender) && empty($usertype) && empty($phone) && empty($email) && empty($status)){
            $inputCheck = true;
        }
        else{
            //reterif the data from database to check username same as username in db 
            $sql = "select * from emp_register where user_name = '$username'";
            //excute the query
            $result = $conn->query($sql);
            //check the username are match the usename from input
            if($result){
                $row = mysqli_num_rows($result);
                if($row > 0){
                    $userCheck = true;
                }
                else{
                    $sql = "insert into emp_register(first_name , last_name , user_name , password , gender , user_type , phone , email , user_status , profile_picture) 
                                   values(' $firstname' , '$lastname' , '$username' , '$password' , '$gender' , '$usertype' , '$phone' , '$email' , '$status' , '$image')";
                            
                            //excute query of insert
                            $result = $conn->query($sql);
                            if($result){
                                $success = true;
                            }
                            else{
                                die("invalid insert data " . $conn->error);
                            }
                }
            }

        }

    }
   
}


?>

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
    <div class="container rounded-4 mt-3 p-2 shadow bg-body-tertiary">
        <form method="POST" action="">
            <div class="row">
            <?php
                if($success){
                echo '<div class="alert alert-success alert-Success" fade show role="alert">
                        <strong>Employee Resgister Successfuly</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                };
            ?>
            <?php
                if($inputCheck){
                echo '<div class="alert alert-danger alert-dismissible" fade show role="alert">
                        <strong>Empty Fields!</strong> All input fields are required!.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                };
            ?>
            <?php
            if($userCheck){
                echo  '<div class="alert alert-danger alert-dismissible" fade show role="alert">
                <strong>User name!</strong> already Created!.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
            ?>
                <div class="d-flex justfy-content-between align-items-center">
                    <a class="link-offset-2 link-underline link-underline-opacity-0" href="index.php">
                    <img src="images/b_arrow.png" alt="back to home page" width="50" height="50">
                    </a>
                    <h1 class="text-center fs-1 fw-bolder flex-grow-1">Regestrasion</h1>
                 </div>
                <div class="col">
                <label class="form-label fs-3">First Name</label>
                    <input class="form-control fs-5" type="text" placeholder="First Name" name="firstname">
                    <label class="form-label fs-3">Last Name</label>
                    <input class="form-control fs-5" type="text" placeholder="Last Name" name="lastname">
                    <label class="form-label fs-3">Username</label>
                    <input class="form-control fs-5" type="text" placeholder="Username" name="username">
                    <label class="form-label fs-3">Password</label>
                    <input class="form-control fs-5" type="password" placeholder="Password" name="password">
                    <label class="form-label fs-3">Gender</label>
                    <div   class="form-check d-flex align-items-center gap-5">
                        <div class="d-flex align-items-centerg gap-1">
                            <input class="form-check-input fs-5" type="radio" value="male" name="gender" unchecked>
                            <label class="form-check-label fs-5">
                                Male
                            </label>        
                        </div>
                        <div class="d-flex align-items-centerg gap-1">
                            <input class="form-check-input fs-5" type="radio" value="female" name="gender" unchecked>
                            <label class="form-check-label fs-5">
                                Female
                            </label>        
                        </div>
                    </div>
                </div>
                <div class="col">
                        <label class="form-label fs-3">User Type</label>
                        <input class="form-control fs-5" type="text" placeholder="User Type" name="usertype">
                        <label class="form-label fs-3">Profile Picture</label>
                        <input class="form-control fs-5" type="file" placeholder="Profile Picture" name="image">
                        <label class="form-label">Phone</label>
                        <input class="form-control fs-5" type="text" placeholder="Phone" name="phone">
                        <label class="form-label fs-3">Email</label>
                        <input class="form-control fs-5" type="email" placeholder="Email" name="email">
                        <label class="form-label fs-3">User status</label>
                        <div class="form-check d-flex align-items-center gap-5"> 
                            <div class="form-check">
                                <input class="form-check-input fs-5" type="radio" value="active" name="status" id="" unchecked>
                                <label class="form-check-label fs-5">
                                    Active
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input fs-5" type="radio" value="no active" name="status" id="" unchecked>
                                <label class="form-check-label fs-5">
                                   No Active
                                </label>
                            </div>
                        </div>
                </div>
            </div>
            <div class="row gap-3 justify-content-center mt-4 p-2">
                <button type="submit" class="btn btn-primary w-25 fs-3 rounded-3" name="btnsave">Save</button>
                <button type="reset" class="btn btn-danger w-25 fs-3 rounded-3" name="btncancel">Cancel</button>
            </div>
        </form>
    </div> 
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>