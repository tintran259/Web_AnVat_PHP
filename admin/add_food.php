<?php
    require 'partials/header_admin.php';
?>
<!-- MainContent Sections Start -->
<div class="main_content">
        <div class="wrapper">
            <h2>Thêm Admin</h2>

            <?php
            // kiem tra thong bao
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];// Hiện thị phiên thông báo
                    unset($_SESSION['add']);// Hủy phiên thông báo
                }
            ?>
            
            <form action="" method="post">
                <table class="tbl_add">
                    <tr>
                        <td>Họ tên: </td>
                        <td><input type="text" name="fname" placeholder="Nhập vào họ tên"></td>
                    </tr>
                    <tr>
                        <td>Tài khoản: </td>
                        <td><input type="text" name="username" placeholder="Nhập vào tài khoản"></td>
                    </tr>
                    <tr>
                        <td>Mật khẩu: </td>
                        <td><input type="password" name="password" placeholder="Nhập vào mật khẩu"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Thêm admin" class="btn_update">
                        </td>
                    </tr>
                </table>
            </form>
           
        </div>
    </div>
<!-- MainContent Sections End -->
<?php
    require 'partials/footer_admin.php'
?>
