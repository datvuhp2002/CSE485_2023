<?php
declare(strict_types = 1);                                          // Use strict types
require '../backEnd/includes/database-connection.php';              // Create PDO object
require '../backEnd/includes/functions.php'; 
?>
<?php include "includes/header.php";?>
<head>
    <link rel="stylesheet" href="css/style_login.css">
</head>
    <main class="container mt-5 mb-5">
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
        <div class="d-flex justify-content-center h-100">
                <div class="card">
                    <div class="card-header">
                        <h3>Sign Up</h3>
                        <div class="d-flex justify-content-end social_icon">
                            <span><i class="fab fa-facebook-square"></i></span>
                            <span><i class="fab fa-google-plus-square"></i></span>
                            <span><i class="fab fa-twitter-square"></i></span>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="process_signup.php" method="post">

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="txtUser"><i class="fas fa-user"></i></span>
                                <input type="text" class="form-control" placeholder="username" name="signup_username" required>
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="txtPass"><i class="fas fa-key"></i></span>
                                <input type="password" class="form-control" placeholder="password" name="signup_password" required>
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="txtPass"><i class="fas fa-key"></i></span>
                                <input type="password" class="form-control" placeholder="re password" name="re_password" required>
                            </div>
                            
                            <div class="form-group">
                                <input type="submit" value="Sign Up" class="btn float-end login_btn">
                            </div>
                        </form>
                    </div>
                </div>

        </div>
    </main>
<?php include "includes/footer.php";?>