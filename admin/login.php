<?php include('../config/constants.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <div class="login">
        <h1 class="text-center">Login</h1>
        <br>
        <?php
                if(isset($_SESSION['login'])){
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset($_SESSION['no_login_message'])){
                    echo $_SESSION['no_login_message'];
                    unset($_SESSION['no_login_message']);
                }
            ?>
        <!-- Login Form Start Here -->
        <form action="" method="post" class="text-center">
            <div class="user_form">
                <label for="">Tài khoản</label>
                <input type="text" name="username" placeholder="Nhập vào tài khoản">
            </div>

            <div class="password_form">
                <label for="">Mật khẩu</label>
                <input type="password" name="password" placeholder="Nhập vào mật khẩu">
            </div>
            
            <input type="submit" name="submit" value="Login" class="btn_add">
        </form>
        <!-- Login Form End Here -->
    </div>    
</body>
</html>

<?php
    // Kiểm tra đã submit hay chưa  
    if(isset($_POST['submit'])){
        // Xử lý đăng nhập 
        // 1. Lấy dữ liệu từ form đăng nhập
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        
        // 2. $sql dùng để kiểm tra rằng tài khoản của người dùng có tồn tại hay không
        $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
        
        // Thực thi câu lệnh
        $res = mysqli_query($conn, $sql);

        // Đếm số hàng để kiểm tra user đó có tồn tại hay không
        $count = mysqli_num_rows($res);
        if($count==1){
            $_SESSION['login'] = "<div class='success'>Đăng nhập thành công</div>";
            $_SESSION['user'] = $username;// kiểm tra người dùng đã đăng nhập hay chưa hoặc chưa đăng xuất đều sẽ bị hủy

            // chuyển đến trang chủ admin
            header('location:'.SITEURL.'admin/');
        }else{
            $_SESSION['login'] = "<div class='error text-center'>Tài khoản hoặc mật khẩu của bạn không đúng</div>";
            // trở lại trang đăng nhập
            header('location:'.SITEURL.'admin/login.php');
        }

        // Kiểm tra câu lệnh đã được thực thi hay chưa
    }
?>