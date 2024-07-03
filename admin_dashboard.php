<?php
session_start();

if(isset($_SESSION['admin'])){
    ?>
    <!-- admin_dashboard page -->
    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Online Clothing Store - Admin Dashboard</title>
        <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body class="admin-body" onload="loadUser();">
        <!-- nav bar start -->
        <?php include 'components/admin-nav.php'; ?>
        <!-- nav bar end -->

        <div class="col-10">
            <h2 class="text-center">User Management</h2>
            <!-- user status change start -->
            <div class="row d-flex justify-content-end mt-4">
                <div class="d-none" id="admin-um-msg-div" onclick="reload();">
                    <div class="alert alert-danger" id="admin-um-msg"></div>
                </div>
                <div class="col-2">
                    <input type="text" id="user-id" placeholder="Enter user id" class="form-control">
                </div>
                <button class="btn btn-outline-light col-2" onclick="updateUserStatus();">Change status</button>
            </div>
            <!-- user status change end -->
            <div class="mt-3">
                <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">User ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody id="users-table">
                    <!-- table row start -->

                    <!-- table row end -->
                </tbody>
                </table>
            </div>
        </div>

        <!-- footer start -->
         <div class="fixed-bottom col-12">
            <p class="text-center">&copy; 2024 online clothing store | All rights reserved</p>
         </div>
        <!-- footer end -->
    </body>

    <script src="vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
    </html>
    <?php
} else {
    echo "<script>location.href='admin_signin.php'</script>";
}
?>