<?php
    require 'partials/header_admin.php'
?>

<!-- MainContent Sections Start -->
<div class="main_content">
        <div class="wrapper">
            <h2>Quản lý Món Ăn</h2>
            <a href="<?php echo SITEURL; ?>admin/add_food.php" class="btn_add"><i class="fas fa-plus"></i> Thêm món ăn</a>
            <br>
            <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];// Hiện thị phiên thông báo
                    unset($_SESSION['add']);// Hủy phiên thông báo
                } 

                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];// Hiện thị phiên thông báo
                    unset($_SESSION['delete']);// Hủy phiên thông báo
                } 

                if(isset($_SESSION['unauthorize']))
                {
                    echo $_SESSION['unauthorize'];// Hiện thị phiên thông báo
                    unset($_SESSION['unauthorize']);// Hủy phiên thông báo
                }

                if(isset($_SESSION['upload']))
                {
                    echo $_SESSION['upload'];// Hiện thị phiên thông báo
                    unset($_SESSION['upload']);// Hủy phiên thông báo
                } 

                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];// Hiện thị phiên thông báo
                    unset($_SESSION['update']);// Hủy phiên thông báo
                } 
            ?>
            <table class="tbl_full">
                <tr>
                    <th>STT</th>
                    <th>Tên món ăn</th>
                    <th>Mô tả món ăn</th>
                    <th>Giá món ăn</th>
                    <th>Hình ảnh</th>
                    <th>Tác vụ</th>
                </tr>

                <?php 
                    $sql = "SELECT * FROM foods";

                    $res = mysqli_query($conn,$sql);

                    $count = mysqli_num_rows($res);
                    
                    $sn =1;
                    if($count > 0)
                    {
                        while($row=mysqli_fetch_assoc($res))
                        {
                            $id = $row['food_id'];
                            $title = $row['food_title'];
                            $description = $row['food_description'];
                            $price = $row['food_price'];
                            $image = $row['food_image'];

                            ?>
                                <tr>
                                    <td><?php echo $sn++;?></td>
                                    <td><?php echo $title;?></td>
                                    <td><?php echo $description;?></td>
                                    <td><?php echo $price;?></td>
                                    <td>
                                        <?php 
                                            if($image == "")
                                            {
                                                echo "<div class='error'>Không có ảnh nào được thêm</div>";
                                            }
                                            else {
                                                ?>
                                                    <img src="<?php echo SITEURL;?>images/foods/<?php echo $image?>" width="210px" height="100px" style="object-fit: cover;">
                                                <?php
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo SITEURL;?>admin/update_food.php?food_id=<?php echo $id;?>" class="btn_update"><i class="fas fa-edit"></i> Cập nhật</a>
                                        <a href="<?php echo SITEURL;?>admin/delete_food.php?food_id=<?php echo $id;?>&food_image=<?php echo $image;?>" class="btn_delete"><i class="far fa-trash-alt"></i>Xóa</a>
                                    </td>
                                </tr>

                            <?php

                        }
                    }
                    else
                    {
                        echo "<tr><td colspan='7' class='error'>Không có món ăn nào được thêm</td></tr>";
                    }
                ?>
            </table>
        </div>
    </div>
<!-- MainContent Sections End -->

<?php
    require 'partials/footer_admin.php'
?>