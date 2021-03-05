<?php
    require('partials/header_admin.php');
?>

<!-- MainContent Sections Start -->
<div class="main_content">
        <div class="wrapper">
            <h2>Cập nhật Admin</h2>

            <?php
            // 1. Lấy ra id của admin được chọn
            $id = $_GET['id'];

            // 2. Tạo câu lệnh truy vấn để lấy thông tin chi tiết
            $sql = "SELECT * FROM admin WHERE id = $id";

            // Thực thi câu lệnh
            $res = mysqli_query($conn,$sql);

            // Kiểm tra câu lệnh có thực thi ok hay chưa
            if($res == true){
                // kiểm tra dữ liệu có sẵn hay chưa
                $count = mysqli_num_rows($res);
                // kiểm tra đã có dữ liệu của admin hay chưa
                if($count==1){
                    // Lấy ra thông tin chi tiết
                    $row=mysqli_fetch_assoc($res);

                    $fname = $row['name'];
                    $username = $row['username'];
                }else{
                    // chuyển đến trang quản lý admin
                    header('location:'.SITEURL.'admin/manage_admin.php');
                }
            }


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
                        <td><input type="text" name="fname" value="<?php echo $fname?>"></td>
                    </tr>
                    <tr>
                        <td>Tài khoản: </td>
                        <td><input type="text" name="username" value="<?php echo $username?>"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                            <input type="submit" name="submit" value="Cập nhật admin" class="btn_update">
                        </td>
                    </tr>
                </table>
            </form>
           
        </div>
    </div>
<!-- MainContent Sections End -->


<?php
    require('partials/footer_admin.php');
?>
<?php
    // Xử lý form add
    if(isset($_POST['submit'])){

        // dat ten bien
        $id = $_POST['id'];
        $fname = $_POST['fname'];
        $username = $_POST['username'];
        
        // truy van
        $sql = "UPDATE admin SET
            name = '$fname',
            username = '$username'
            WHERE id= '$id'
        ";

        // Thực thi lệnh truy vấn
        $res = mysqli_query($conn, $sql);
        
        // Kiểm tra nếu câu lệnh được thực thi thì sẽ được thêm vào bảng dữ liệu 
        if($res == TRUE){
            
            // Tạo phiện giá trị để xuất thông tin ra màn hình
            $_SESSION['update'] = "<div class='success'>Cập nhật admin thành công</div>";

            //Chuyển đến trang quản lý admin
            header('location:'.SITEURL.'admin/manage_admin.php');
        }else{
           // Tạo phiện giá trị để xuất thông tin ra màn hình
           $_SESSION['add'] = "<div class='error'>Cập nhật admin thất bại</div>";

           //Chuyển đến trang quản lý admin
           header('location:'.SITEURL.'admin/add_admin.php');
        }
    }

?>
