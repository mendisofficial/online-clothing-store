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
    <body class="admin-body">
        <!-- nav bar start -->
        <?php include 'components/admin-nav.php'; ?>
        <!-- nav bar end -->

        <div class="col-10">
            <h2 class="text-center">User Management</h2>
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
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Sahan</td>
                        <td>Perera</td>
                        <td>sahan@gmail.com</td>
                        <td>0778761458</td>
                        <td>Active</td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>Sahan</td>
                        <td>Perera</td>
                        <td>sahan@gmail.com</td>
                        <td>0778761458</td>
                        <td>Active</td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>Sahan</td>
                        <td>Perera</td>
                        <td>sahan@gmail.com</td>
                        <td>0778761458</td>
                        <td>Active</td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>Sahan</td>
                        <td>Perera</td>
                        <td>sahan@gmail.com</td>
                        <td>0778761458</td>
                        <td>Active</td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>Sahan</td>
                        <td>Perera</td>
                        <td>sahan@gmail.com</td>
                        <td>0778761458</td>
                        <td>Active</td>
                    </tr>
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