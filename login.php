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
    $login_success = false;
    $login_error = false;
    $check_input_fields = false;
    //check the user request of the user are post
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        require_once('dbconn.php');
        //hold the value from input fields
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        //check if the input fields are empty
        if(empty($username) && empty($password)){
            $check_input_fields = true;
        }
        else{
            //retraive the username and password from database
            $sql = "select * from emp_register where user_name = '$username' and password = '$password'";
            //execute the query
            $result = $conn->query($sql);
            //check if the value of the result is true or false
            if($result){
                $user = mysqli_num_rows($result);
                 if($user > 0){
                    $login_success = true;
                 }
                 else{
                    $login_error = true;
                 }
            }

        }
    }
    ?>
    <div class="container  logincontainer">
        <form action="" method="POST">
            <div class="d-flex justfy-content-between align-items-center">
                <h3 class="fs-1 fw-bold text-center flex-grow-1">Login</h3>
            </div>
            <?php  
                if($check_input_fields){
                echo '<div class="alert alert-danger alert-dismissible" role="alert">
                    <strong>Pleace fill the input fields!</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                };
            ?>
            <?php  
                if($login_success){
                 header("location:/shop-system/index.php");
                };
            ?>
            <?php  
                if($login_error){
                echo '<div class="alert alert-danger alert-dismissible" role="alert">
                    <strong>Invalid username || password!</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                };
            ?>
            <div class="mt-2">
              <label  class="form-label fs-3 fw-bold">Username</label>
              <input type="text" class="form-control fs-3" name ="username" placeholder="Enter username">
            </div> 
            <div class="mt-2">
              <label class="form-label fs-3 fw-bold">Password</label>
              <input type="password" class="form-control fs-3" name="password" placeholder="Enter Password">
            </div> 
            <div class="m-3 d-flex gap-5">
                <div class="form-check">
                    <input class="form-check-input fs-4" type="radio" name=""  unchecked>
                    <label class="form-check-label fs-4" > Remember me </label>
                </div>
                <div class="d-flex justify-content-between ms-auto gap-2">
                    <div>
                        <span> 
                        <a class="link-offset-2 link-underline link-underline-opacity-0 fs-4" href="#">Forget password</a>
                        </span>
                    </div>
                    <div>
                        <span> 
                        <a class="link-offset-2 link-underline link-underline-opacity-0 fs-4" href="register.php">Sign Up</a>
                        </span>
                    </div>
                </div>
             </div>
        <div class="mt">
            <button type="submti" class="btn btn-success w-50">Log in</button>
            <button type="reset" class="btn btn-danger  w-50">Cancel</button>
        </div>

        </form>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>
</html>