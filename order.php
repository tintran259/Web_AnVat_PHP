<?php
    $title = 'Đặt Hàng';
    require_once 'include/header.php'
?>
<section class="list-oder">
    <div class="form-table">
      <table class="table">
         <thead>
               <tr>
               <th scope="col">#</th>
               <th scope="col">Tên sản phẩm</th>
               <th scope="col">Số Lượng</th>
               <th scope="col">Giá</th>
               </tr>
         </thead>
         <tbody>
               <tr>
                  <th scope="row">1</th>
                  <td>Khô gà</td>
                  <td>2</td>
                  <td>240.000 VND</td>
               </tr>
               <tr>
                  <th scope="row"></th>
                  <td></td>
                  <td></td>
                  <td class="count_prices">Tổng : 240.000 VND</td>
               </tr>
         </tbody>
      </table>
      <div class="payment">
         <a href="#" class="btn-pay">Thanh Toán</a>
      </div>
    </div>
</section>
