<?php
    if(isset($bill)&&(is_array($bill))){
        extract($bill);
    }
?>
<div class="main-desc my-32 mx-auto shadow-xl min-h-[600px] w-[700px] rounded my-4">
<h2 class="text-[24px] mt-32 text-[#000] font-bold text-center">THÔNG TIN ĐƠN HÀNG</h2>
                <div class="my-6 py-6 px-6">
                    <li class="list-none"><strong>Mã đơn hàng:</strong> XG - <?=$bill['id_order']?></li>
                     <li class="list-none"><strong>Ngày đặt hàng:</strong> <?=$bill['ngaydathang']?></li>
                    <li class="list-none"><strong>Họ và tên:</strong> <?=$bill['user']?></li>
                    <li class="list-none"><strong>Email:</strong> <?=$bill['email']?></li>
                    <li class="list-none"><strong>Địa chỉ:</strong> <?=$bill['diachi']?></li>
                    <li class="list-none"><strong>Phương thức thanh toán:</strong> <?=Text($bill['thanhtoan'])?></li>
                    <li class="list-none"><strong>SĐT:</strong> <?=$bill['sdt']?></li>

                </div>
<h2 class="text-[24px] text-[#000] font-bold text-center">CHI TIẾT GIỎ HÀNG</h2>
<div class="my-6 py-6 px-6">
                   <table class="max-w-[680px] mr-2">
                    <!-- <tr>
                        <th>STT</th>
                        <th>Ảnh</th>
                        <th>Sản phẩm</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </tr> -->
                    <?php
                        bill_chi_tiet($billct);
                    ?>
                    <!-- <tr>
                        <td>1</td>
                        <td><img src="" alt=""></td>
                        <td>Xì Gà Cuba</td>
                        <td>10000</td>
                        <td>1</td>
                        <td>10000</td>
                    </tr> -->
                   </table>
                </div>
            </div>
</div>
