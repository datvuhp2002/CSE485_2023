<?php 
declare(strict_types = 1);                                          // Use strict types
require '../backEnd/includes/database-connection.php';              // Create PDO object
require '../backEnd/includes/functions.php'; 

session_start();  

if (isset($_POST['username']) && isset($_POST['password'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $username = validate($_POST['uername']);

    $password = validate($_POST['password']);

    if (empty($username)) {

        header("Location: login.php?error=User Name is required");

        exit();

    }else if(empty($password)){

        header("Location: login.php?error=Password is required");

        exit();

    }else{
        //Lay tat ca nhung thong tin tu bang users khi usernmame va password trung khop
        $sql = "SELECT * FROM users WHERE UserName ='$username' AND Password='$password'";
        // $data = pdo($pdo,$sql)->fetchAll();
        //thuc thi cau lenh truy van tren co so du lieu users
        $result = $pdo->query($sql);
        //ham rowCount dung de dem so luong ban ghi cua doi tuong result va tra ve doi duong count
        $count = $result->rowCount();

        if ($count === 1) {

            $row = $result->fetch(PDO::FETCH_ASSOC);

            if ($row['UserName'] === $username && $row['Password'] === $password) {

                echo "Logged in!";

                $_SESSION['UserName'] = $row['UserName'];

                $_SESSION['Role'] = $row['Role'];

                $_SESSION['id'] = $row['id'];

                header("Location: /admin/index.php");

                exit();

            }else{

                header("Location: index.php?error=Incorect User name or password");

                exit();

            }

        }else{

            header("Location: index.php?error=Incorect User name or password");

            exit();

        }

    }

}else{

    header("Location: index.php");

    exit();

}
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
                        <h3>Sign In</h3>
                        <div class="d-flex justify-content-end social_icon">
                            <span><i class="fab fa-facebook-square"></i></span>
                            <span><i class="fab fa-google-plus-square"></i></span>
                            <span><i class="fab fa-twitter-square"></i></span>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post">

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="txtUser"><i class="fas fa-user"></i></span>
                                <input type="text" class="form-control" placeholder="username" name="username">
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="txtPass"><i class="fas fa-key"></i></span>
                                <input type="text" class="form-control" placeholder="password" name="password">
                            </div>
                            
                            <div class="row align-items-center remember">
                                <input type="checkbox">Remember Me
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Login" class="btn float-end login_btn">
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-center ">
                            Don't have an account?<a href="#" class="text-warning text-decoration-none">Sign Up</a>
                        </div>
                        <div class="d-flex justify-content-center">
                            <a href="#" class="text-warning text-decoration-none">Forgot your password?</a>
                        </div>
                    </div>
                </div>

        </div>
    </main>
<?php include "includes/footer.php";?>
