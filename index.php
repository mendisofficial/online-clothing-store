<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <title>Online Clothing Store</title>
    <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="body">
<!-- Sign In box start -->
<div class="signin-box" id="signin-box">
    <h2 class="text-center">Sign In</h2>
    <div class="mt-3">
        <label for="form-label">Username:</label>
        <input type="text" id="username" name="username" class="form-control">
    </div>
    <div class="mt-2">
        <label for="form-label">Password:</label>
        <input type="password" id="password" name="password" class="form-control">
    </div>
    <div class="mt-2">
        <input type="checkbox" id="remember" name="remember" class="form-check-input">
        <label for="form-label">Remember Me</label>
    </div>
    <div class="mt-2 d-none">
        <div class="alert alert-danger"></div>
    </div>
    <div class="mt-2">
        <button class="btn btn-secondary col-12">Sign In</button>
    </div>
    <div class="mt-2">
        <button class="btn btn-outline-secondary col-12" onclick="changeView();">New to Online Clothing Store? Sign Up</button>
    </div>
</div>
<!-- Sign In box end -->

<!-- Sign Up box start -->
<div class="signup-box d-none" id="signup-box">
    <h2 class="text-center">Sign Up</h2>
    <div class="row mt-3">
        <div class="col-6">
            <label for="form-label">First Name:</label>
            <input type="text" id="firstname" name="firstname" class="form-control">
        </div>
        <div class="col-6">
            <label for="form-label">Last Name:</label>
            <input type="text" id="lastname" name="lastname" class="form-control">
        </div>
    </div>
    <div class="mt-2">
        <label for="form-label">Email:</label>
        <input type="email" id="email" name="email" class="form-control">
    </div>
    <div class="mt-2">
        <label for="form-label">Mobile:</label>
        <input type="text" id="mobile" name="mobile" class="form-control">
    </div>
    <div class="mt-2">
        <label for="form-label">Username:</label>
        <input type="text" id="username-signup" name="username" class="form-control">
    </div>
    <div class="mt-2">
        <label for="form-label">Password:</label>
        <input type="password" id="password-signup" name="password" class="form-control">
    </div>
    <div class="mt-3 d-none">
        <div class="alert alert-danger"></div>
    </div>
    <div class="mt-3">
        <button class="btn btn-secondary col-12">Sign Up</button>
    </div>
    <div class="mt-2">
        <button class="btn btn-outline-secondary col-12" onclick="changeView();">Already have an account? Sign In</button>
    </div>
</div>
<!-- Sign Up box end -->

<script src="js/script.js"></script>
</body>
</html>