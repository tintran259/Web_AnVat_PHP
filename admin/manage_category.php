<?php
    require 'partials/header_admin.php'
?>

<!-- MainContent Sections Start -->
<div class="main_content">
        <div class="wrapper">
            <h2>Quản lý Thực Đơn</h2>

            <br>
            <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];// Hiện thị phiên thông báo
                    unset($_SESSION['add']);// Hủy phiên thông báo
                } 

                if(isset($_SESSION['remove']))
                {
                    echo $_SESSION['remove'];// Hiện thị phiên thông báo
                    unset($_SESSION['remove']);// Hủy phiên thông báo
                } 

                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];// Hiện thị phiên thông báo
                    unset($_SESSION['delete']);// Hủy phiên thông báo
                } 

                if(isset($_SESSION['no_category_found']))
                {
                    echo $_SESSION['no_category_found'];// Hiện thị phiên thông báo
                    unset($_SESSION['no_category_found']);// Hủy phiên thông báo
                } 

                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];// Hiện thị phiên thông báo
                    unset($_SESSION['update']);// Hủy phiên thông báo
                } 

                if(isset($_SESSION['upload']))
                {
                    echo $_SESSION['upload'];// Hiện thị phiên thông báo
                    unset($_SESSION['upload']);// Hủy phiên thông báo
                } 

                if(isset($_SESSION['failed_remove']))
                {
                    echo $_SESSION['failed_remove'];// Hiện thị phiên thông báo
                    unset($_SESSION['failed_remove']);// Hủy phiên thông báo
                } 
            ?>
            <a href="<?php echo SITEURL?>admin/add_category.php" class="btn_add"><i class="fas fa-plus"></i> Thêm loại món</a>
            <table class="tbl_full">
                <tr>
                    <th>STT</th>
                    <th>Tên loại món ăn</th>
                    <th>Hình ảnh</th>
                    <th>Đặc điểm</th>
                    <th>Trạng thái</th>
                    <th>Hoạt động</th>
                </tr>

                <!-- Hiện thị thông tin ra màn hình -->
                <?php
                    $sql = "SELECT * FROM categories";
                    $res = mysqli_query($conn, $sql);

                    $sn=1;

                    $count = mysqli_num_rows($res);
                    if($count>0){
                        while($row=mysqli_fetch_assoc($res)){
                           $id = $row['cate_id'];
                           $title = $row['cate_title'];
                           $image = $row['cate_image'];
                           $featured = $row['featured'];
                           $active = $row['active'];
                           
                           ?>
                                <tr>
                                    <td><?php echo $sn++;?></td>
                                    <td><?php echo $title;?></td>
                                    <td>
                                        <?php
                                            if($image!="")
                                            {
                                                ?>
                                                    <img src="<?php echo SITEURL;?>images/category/<?php echo $image;?>" alt="" width="200px" height="100px" style="object-fit: cover;">
                                                <?php
                                            }else{
                                                echo "<div class='error'>Không có ảnh nào được thêm</div>";
                                            } 

                                        ?>
                                    </td>
                                    <td><?php echo $featured;?></td>
                                    <td><?php echo $active;?></td>
                                    <td>
                                        <a href="<?php echo SITEURL;?>admin/update_category.php?cate_id=<?php echo $id;?>" class="btn_update"><i class="fas fa-edit"></i> Cập nhật</a>
                                        <a href="<?php echo SITEURL;?>admin/delete_category.php?cate_id=<?php echo $id;?>&cate_image=<?php echo $image;?>" class="btn_delete"><i class="far fa-trash-alt"></i> Xóa</a>
                                    </td>
                                </tr>
                           <?php
                        }
                    }else{
                        ?>
                        <tr>
                            <td colspan="6"><div class="error">Không có loại món ăn nào được thêm</div></td>
                        </tr>
                    <?php
                    }
                ?>

                
                
            </table>
        </div>
    </div>
<!-- MainContent Sections End -->

<?php
    require 'partials/footer_admin.php'
?>