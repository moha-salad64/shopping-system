<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- main.css file link -->
    <link rel="stylesheet" href="main.css"> 
</head>
<body>
    <div class="container  mt-4">
    <label class="form-label fs-3">First Name</label>
    <input class="form-control fs-5" type="text" placeholder="First Name" name="firstname">
    <label class="form-label fs-3">Last Name</label>
    <input class="form-control fs-5" type="text" placeholder="Last Name" name="lastname">
    <label class="form-label fs-3">Gender</label>
    <div   class="form-check d-flex align-items-center gap-5">
        <div class="d-flex align-items-centerg gap-1">
            <input class="form-check-input fs-5" type="radio" name="chkmale"  unchecked>
            <label class="form-check-label fs-5">
                Male
            </label>        
        </div>
        <div class="d-flex align-items-centerg gap-1">
            <input class="form-check-input" type="radio" name="chkfemale"  unchecked>
            <label class="form-check-label fs-5">
                Female
            </label>        
        </div>
    </div>
    <label class="form-label fs-3">Username</label>
    <input class="form-control fs-5" type="text" placeholder="Username" name="username">
    <label class="form-label fs-3">Password</label>
    <input class="form-control fs-5" type="password" placeholder="Password" name="password">
    <label class="form-label">Phone</label>
    <input class="form-control fs-5" type="text" placeholder="Phone" name="phone">
    <label class="form-label fs-3">Email</label>
    <input class="form-control fs-5" type="email" placeholder="Email" name="email">
    <label class="form-label fs-3">User Type</label>
    <input class="form-control fs-5" type="text" placeholder="User Type" name="usertype">
    <label class="form-label fs-3">Profile Picture</label>
    <input class="form-control fs-5" type="image" placeholder="Profile Picture" name="profilepicture">
    <label class="form-label fs-3">User status</label>
    <div class="form-check d-flex align-items-center gap-5">
        <div class="d-flex align-items-centerg gap-1">
            <input class="form-check-input fs-5" type="radio" name="useractive"  unchecked>
            <label class="form-check-label fs-5">
              Active
            </label>         
        </div>    
        <div class="d-flex align-items-center gap-1">
        <input class="form-check-input" type="radio" name="usernoactive" unchecked>
            <label class="form-check-label fs-5">
              No Active
            </label>  
        </div>
    </div>
    <div class="row gap-3 justify-content-center mx-auto">
        <button type="submit" class="btn btn-primary w-25 fs-3" name="btnsave">Save</button>
        <button type="reset" class="btn btn-danger w-25 fs-3" name="btncancel">Cancel</button>
    </div>
</div> 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>