<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Clothing Store - Admin Signin</title>
    <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="admin-signin-body">
    <div class="admin-signin-box">
        <h2 class="text-center">Admin Signin</h2>
        <div class="mt-3">
            <label for="form-label">Username:</label>
            <input type="text" id="admin-username" class="form-control border-black bg-transparent" placeholder="Enter your username">
        </div>
        <div class="mt-2">
            <label for="form-label">Password:</label>
            <input type="password" id="admin-password" class="form-control border-black bg-transparent" placeholder="Enter your password">
        </div>
        <div class="mt-3 d-none" id="admin-signin-msg-div">
            <div class="alert alert-danger" id="admin-signin-msg-box"></div>
        </div>
        <div class="mt-3">
            <button class="btn btn-secondary col-12" onclick="adminSignin();">Sign In</button>
        </div>
    </div>


<script src="js/script.js"></script>
</body>
</html>