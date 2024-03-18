<?php
    if (isset($_POST['soluong'])) {
        $id_order = $_POST['id_order'];
        $soluong = $_POST['soluong'];
        $sql = "UPDATE `order_details` SET `soluong` = '$soluong' WHERE `order_details`.`id_order` = '{$id_order}'";
        pdo_execute($sql);
        header("location:index1.php?act=addtocart");
    }
?>

<div class="main-desc mt-[120px] bg-white p-[30px]">
                <h2 class="text-[40px] text-center  font-bold">GIỎ HÀNG CỦA BẠN</h2>
                <form method="post" action="index1.php?act=updatecart">
                <div class="my-6 py-6 min-h-[200px] w-full m-auto ">
                    <table class="m-auto w-full">
                        <?php
                        viewcart_sub()
                        ?>
                    </table>
                    
                </div>
                <div class="text-left">
                    <!-- <a href="index1.php?act=sanpham"> <input type="button" value="XEM THÊM SẢN PHẨM"  class="bg-[#fff] btn btn-secondary text-[stone] cursor-pointer hover:opacity-80 p-2 text-[#000] mr-4"></a> -->
                    <a href="index1.php?act=bill"> <input type="button" value="TIẾP TỤC ĐẶT HÀNG" class="bg-[#fff] text-[blue] btn btn-primary text-[#fff] cursor-pointer hover:opacity-80 p-2 text-[#000] mr-4"></a>
                    <a href="index1.php?act=deletecart" onclick="return confirm('Bạn có muốn xóa toàn bộ giỏ hàng ?')"> <input type="button" value="XÓA GIỎ HÀNG" class="bg-[#fff] btn btn-danger text-[red] cursor-pointer mx-2 hover:opacity-80 p-2 text-[#000]"></a>
                <!-- <a href=""><input type="submit" value="CẬP NHẬT"  name="updatecart" class="bg-[#fff] btn btn-secondary text-[stone] cursor-pointer hover:opacity-80 p-2 text-[#000] mr-4"></a> -->
                </div>
                </div>
                </form>
            </div>
            <script>
    function updateQuantity(index) {
        var newQuantity = parseInt(document.getElementById('soluong-' + index).value);
        var donGia = parseFloat('<?php echo $cart['gia']; ?>'); // Lấy đơn giá từ PHP
        var thanhTien = newQuantity * donGia;
        
        document.getElementById('thanhtien-' + index).innerHTML = thanhTien.toFixed(2) + ' VNĐ';

        var total = 0;
        <?php foreach ($listbill as $i => $cart) { ?>
            var quantity = parseInt(document.getElementById('soluong-<?php echo $i; ?>').value);
            total += quantity * <?php echo $cart['gia']; ?>;
        <?php } ?>
        document.getElementById('tongtien').innerHTML = 'TỔNG TIỀN: <span class="text-[red]">' + total.toFixed(2) + ' VNĐ</span>';
    }
</script>

