<?php
    require 'partials/header_admin.php'
?>

<!-- MainContent Sections Start -->
<div class="main_content">
        <div class="wrapper">
            <h2>Quản lý Món Ăn</h2>
            <a href="<?php echo SITEURL; ?>admin/add_food.php" class="btn_add"><i class="fas fa-plus"></i> Thêm món ăn</a>
            <table class="tbl_full">
                <tr>
                    <th>STT</th>
                    <th>Họ tên</th>
                    <th>Tài khoản</th>
                    <th>Hoạt động</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Quốc Anh</td>
                    <td>a@gmail.com</td>
                    <td>
                        <a href="" class="btn_update"><i class="fas fa-edit"></i> Cập nhật</a>
                        <a href="" class="btn_delete"><i class="far fa-trash-alt"></i> Xóa</a>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Quốc Anh</td>
                    <td>a@gmail.com</td>
                    <td>
                        <a href="" class="btn_update"><i class="fas fa-edit"></i> Cập nhật</a>
                        <a href="" class="btn_delete"><i class="far fa-trash-alt"></i> Xóa</a>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Quốc Anh</td>
                    <td>a@gmail.com</td>
                    <td>
                        <a href="" class="btn_update"><i class="fas fa-edit"></i> Cập nhật</a>
                        <a href="" class="btn_delete"><i class="far fa-trash-alt"></i> Xóa</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
<!-- MainContent Sections End -->

<?php
    require 'partials/footer_admin.php'
?>