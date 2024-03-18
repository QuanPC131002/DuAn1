<?php
    if(isset($bill)&&(is_array($bill))){
        extract($bill);
    }
?>
<div class="main-desc my-32 m-auto shadow-xl min-h-[600px] w-[700px] rounded my-4">
<h2 class="text-[24px] mt-32 text-[#000] font-bold text-center">THÔNG TIN ĐƠN HÀNG</h2>
                <div class="my-6 py-6 px-6">
                    <li class="list-none"><strong>Mã đơn hàng:</strong> XG -<?=$bill['id_order']?></li>
                     <li class="list-none"><strong>Ngày đặt hàng:</strong> <?=$bill['ngaydathang']?></li>
                    <li class="list-none"><strong>Họ và tên:</strong> <?=$bill['user']?></li>
                    <li class="list-none"><strong>Email:</strong> <?=$bill['email']?></li>
                    <li class="list-none"><strong>Địa chỉ:</strong> <?=$bill['diachi']?></li>
                    <li class="list-none"><strong>SĐT:</strong> <?=$bill['sdt']?></li>
                    <li class="list-none"><strong>Phương thức thanh toán:</strong> <?=Text($bill['thanhtoan'])?></li>

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
<!-- <div class="main-desc my-12">
<h1 class="text-[40px] text-[#000] font-bold">THÔNG TIN ĐẶT HÀNG</h1>
<div class="my-6 w-[500px] mx-auto border-[1px] border-solid border-[#000] min-h-[500px] shadow-2xl">
                    <div class="mx-4 my-2">
                        <label for="" class="font-bold text-[20px]">Họ và tên</label>
                        <input type="text" name="user" value="<?=$bill['user']?>" class="w-full border-[1px] border-solid border-[#ccc] py-2">
                    </div>
                        <div class="mx-4 my-2">
                        <label for="" class="font-bold text-[20px]">Email</label>
                        <input type="email" name="email" value="<?=$bill['email']?>" class="w-full border-[1px] border-solid border-[#ccc] py-2">
                    </div>
                        <div class="mx-4 my-2">
                        <label for="" class="font-bold text-[20px]">Địa chỉ</label>
                        <input type="text" name="diachi" value="<?=$bill['diachi']?>" class="w-full border-[1px] border-solid border-[#ccc] py-2">
                    </div>
                        <div class="mx-4 my-2">
                        <label for="" class="font-bold text-[20px]">Số điện thoại</label>
                        <input type="text" name="sdt" value="<?=$bill['sdt']?>" class="w-full border-[1px] border-solid border-[#ccc] py-2">
                    </div>
                
                    <h2 class="text-[red] text-[22px] mx-4 font-bold">Phương thức thanh toán</h2>
                    <table class="mx-4 my-3">
                    
                    <td><input type="radio" value="1" name="thanhtoan" id="">Trả tiền khi nhận hàng</td>
                    <td><input type="radio" value="2" name="thanhtoan" id="">Chuyển khoản ngân hàng</td>
                    <td><input type="radio" value="3" name="thanhtoan" id="">Thanh toán online</td>
                    </tr>
                
                    </table>  
        </div>
</div> -->
<div class="text-center my-4">
            <a href="index1.php?act=success"> <input type="submit" value="XÁC NHẬN ĐƠN HÀNG" name="dongydathang" class="bg-[red] hover:bg-[#fff] hover:border-[2px] hover:border-solid hover:border-[#c51230] hover:text-[#c51230] cursor-pointer  p-2 text-[#fff]"></a>
            </div>