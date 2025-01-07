<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- main.css file link -->
    <link rel="stylesheet" href="main.css"> 
</head>
<body>
    <div class="container  logincontainer">
            <h3 class="fs-1 fw-bold text-center">Login</h3>
            <div class="mt-2">
              <label  class="form-label">Username</label>
              <input type="text" class="form-control" name ="username" placeholder="Enter username">
            </div> 
            <div class="mt-2">
              <label class="form-label">Password</label>
              <input type="password" class="form-control" name="password" placeholder="Enter Password">
            </div> 
            <div class="mt-2 d-flex justify-content-between">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault"  unchecked>
                    <label class="form-check-label" > Remember me </label>
                </div>
                <div class="">
                    <p>
                        <span> <a class="link-offset-2 link-underline link-underline-opacity-0" href="#">Forget password</a></span>
                    </p>
                </div>
            </div>
        <div class="mt">
            <button type="button" class="btn btn-success p-1  w-50">Log in</button>
            <button type="button" class="btn btn-danger  w-50">Cancel</button>
        </div>
    </div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>
</html>