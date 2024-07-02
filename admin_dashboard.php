<?php
session_start();

if(isset($_SESSION['admin'])){
    ?>
    <!-- admin_dashboard page -->
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Online Clothing Store - Admin Dashboard</title>
    </head>
    <body>
        <h2>Admin Dashboard</h2>
    </body>
    </html>
    <?php
} else {
    echo "<script>location.href='admin_signin.php'</script>";
}
?>