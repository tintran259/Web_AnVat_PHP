<?php
    require 'partials/header_admin.php'
?>

<!-- MainContent Sections Start -->
    <div class="main_content">
        <div class="wrapper">
            <h2>Quản lý Admin</h2>

            <br>
            <?php
            // kiem tra thong bao 
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];// Hiện thị phiên thông báo
                    unset($_SESSION['add']);// Hủy phiên thông báo
                }

                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];// Hiện thị phiên thông báo
                    unset($_SESSION['update']);// Hủy phiên thông báo
                }

                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];// Hiện thị phiên thông báo
                    unset($_SESSION['delete']);// Hủy phiên thông báo
                }

                if(isset($_SESSION['user_not_found']))
                {
                    echo $_SESSION['user_not_found'];// Hiện thị phiên thông báo
                    unset($_SESSION['user_not_found']);// Hủy phiên thông báo
                }

                if(isset($_SESSION['pwd_not_match']))
                {
                    echo $_SESSION['pwd_not_match'];// Hiện thị phiên thông báo
                    unset($_SESSION['pwd_not_match']);// Hủy phiên thông báo
                }

                if(isset($_SESSION['change_pwd']))
                {
                    echo $_SESSION['change_pwd'];// Hiện thị phiên thông báo
                    unset($_SESSION['change_pwd']);// Hủy phiên thông báo
                }
            ?>
            <br>


            <a href="add_admin.php" class="btn_add"><i class="fas fa-plus"></i> Thêm</a>
            <table class="tbl_full">
                <tr>
                    <th>STT</th>
                    <th>Họ tên</th>
                    <th>Tài khoản</th>
                    <th>Tác vụ</th>
                </tr>

                <?php
                    //Truy vấn lấy tất cả dữ liệu trong bản admin  
                    $sql = "SELECT * FROM admin";
                    // Thực thi câu lệnh
                    $res = mysqli_query($conn, $sql);

                    //kiem tra câu lệnh đã được thực thi hay chưa
                    if($res == true){
                        // Đếm số hàng để kiểm tra có dữ liệu trong bảng hay kh
                        $row = mysqli_num_rows($res);// có chức năng lấy hết tất cả hàng trong bảng
                        $sn = 1; // Tạo ra 1 biến và gán giá trị

                        // Kiểm số thứ tự của hàng
                        if($row>0){

                            //Có dữ liệu trong bảng
                            while($row = mysqli_fetch_assoc($res))
                            {
                                // Sử dụng vòng lặp while để lấy tất cả dữ liệu
                                $id = $row['id'];
                                $fname = $row['name'];
                                $username = $row['username'];

                                ?>
                                    <tr>
                                        <td><?php echo $sn++;?></td>
                                        <td><?php echo $fname;?></td>
                                        <td><?php echo $username;?></td>
                                        <td>
                                        <a href="<?php echo SITEURL;?>admin/changepassword.php?id=<?php echo $id;?>" class ="btn_add"><i class="fas fa-unlock-alt"></i> Đổi mật khẩu</a>
                                            <a href="<?php echo SITEURL;?>admin/update_admin.php?id=<?php echo $id;?>" class ="btn_update"><i class="fas fa-edit"></i> Cập nhật</a>
                                            <a href="<?php echo SITEURL;?>admin/delete_admin.php?id=<?php echo $id;?>" class="btn_delete"><i class="far fa-trash-alt"></i> Xóa</a>
                                        </td>
                                    </tr>
                                <?php                                
                            }
                        }
                    }
                ?>
            </table>
        </div>
    </div>
<!-- MainContent Sections End -->

<?php
    require 'partials/footer_admin.php'
?>