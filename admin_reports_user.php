<?php
session_start();

include 'connection.php';

if (isset($_SESSION['admin'])) {
    $result = Database::search("SELECT * FROM `user` INNER JOIN `user_type` ON user.user_type_id = user_type.id ORDER BY `user`.`user_id` ASC");

    ?>
    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Online Clothing Store - Admin Dashboard - Reports - User report</title>
        <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="container mt-3">
            <a href="admin_reports.php"><img src="assets/img/back.png" alt="back-icon" height="25"></a>
        </div>

        <div class="container mt-3" id="stock-report">
            <h2 class="text-center">User Report</h2>
            <table class="table table-hover mt-5">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>User Type</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        for ($i = 0; $i < $result->num_rows; $i++) {
                            $data = $result->fetch_assoc();
                            echo "<tr>";
                            echo "<td>".$data['user_id']."</td>";
                            echo "<td>".$data['fname']."</td>";
                            echo "<td>".$data['lname']."</td>";
                            echo "<td>".$data['email']."</td>";
                            echo "<td>".$data['mobile']."</td>";
                            echo "<td>".$data['type']."</td>";
                            if ($data['status'] == 1) {
                                $data['status'] = "Active";
                            } else {
                                $data['status'] = "Inactive";
                            }
                            echo "<td>".$data['status']."</td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-end container mt-5 mb-5">
            <button class="btn btn-outline-info col-2" onclick="printScreen();">Print</button>
        </div>

         <!-- footer start -->
         <div class="fixed-bottom col-12">
            <p class="text-center">&copy; 2024 online clothing store | All rights reserved</p>
        </div>
        <!-- footer end -->

    <script src="vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
    </body>
    </html>

    <?php

} else {
    echo "<script>location.href='admin_signin.php'</script>";
}

?>
