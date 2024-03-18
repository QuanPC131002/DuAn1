<?php
if (isset($bill) && is_array($bill)) {
    extract($bill);
}
?>

<div class="main-desc w-full rounded  mx-[20px]">
<div class="row mb ">
            <h1 class="alert alert-info">THÔNG TIN KHÁCH HÀNG</h1>
    </div>
    <div class="my-6 py-6 px-6">
        <li class="list-none"><strong>Họ và tên:</strong> <?=$bill['user']?></li>
        <li class="list-none"><strong>Email:</strong> <?=$bill['email']?></li>
        <li class="list-none"><strong>Địa chỉ:</strong> <?=$bill['diachi']?></li>
        <li class="list-none"><strong>SĐT:</strong> <?=$bill['sdt']?></li>
        <li class="list-none"><strong>Phương thức thanh toán:</strong> <?=Text($bill['thanhtoan'])?></li>
        <li class="list-none"><strong>SĐT:</strong> <?=$bill['sdt']?></li>
    </div>
</div>

<div class="main-desc w-full rounded my-4 mx-[20px]">
<div class="row mb ">
            <h1 class="alert alert-info">THÔNG TIN ĐƠN HÀNG</h1>
    </div>
    <div class="my-6  py-6 px-6">
        <table class="w-full">
            <?php
            bill_chi_tiet_admin($billct);
            ?>
        </table>
    </div>
</div>

