<?php

function viewcart($delete){
    // global $anhpath;
    // Mỗi lần ra khỏi vòng lặp thì sẽ tính tổng của tất cả các thành tiền
                        // Biến i là vị trí của từng phần tử trong mảng
                        $tong=0;
                        $i=0;
                        if($delete==1){
                            $xoasp_th='<th class="px-4 py-2 border-b-[1px] border-solid border-[#ccc] text-center">Thao tác</th>';
                            $xoasp_tdtt ='<td class="px-4 py-2 "></td>';
                        }else{
                            $xoasp_th = '';
                            $xoasp_tdtt = '';
                        }
                        echo '<tr class="h-[100px]">
                        <th class="px-4 py-2 border-b-[1px] border-solid border-[#ccc]">Ảnh</th>
                        <th class="px-4 py-2 border-b-[1px] border-solid border-[#ccc]">Sản phẩm</th>
                        <th class="px-4 py-2 border-b-[1px] border-solid border-[#ccc]">Đơn giá</th>
                        <th class="px-4 py-2 border-b-[1px] border-solid border-[#ccc]">Số lượng</th>
                        <th class="px-4 py-2 border-b-[1px] border-solid border-[#ccc]">Thành tiền</th>
                        '.$xoasp_th.'
                    
                        </tr>';
                            foreach($_SESSION['mycart'] as $a => $cart){
                                // $anh=$cart[2].$anhpath; // vị trí số 2 trong mảng
                                $thanhtien =$cart[4]*$cart[3];
                                $tong = $tong + $thanhtien;
                                // Nếu = 1 thì sẽ có cột xóa và cột thao tác ngược lại sẽ rỗng
                                if($delete==1){
                                    $xoasp_td ='<td class="p-2 text-center "><a href="index1.php?act=deletecart&id_cart='.$i.'"><input type="button" value="X" class="  hover:opacity-50 cursor-pointer"></a></td>';
                                }else{
                                    $xoasp_td = ''; 
                                }
                                ?>
                                <tr class="h-[100px]">
                                <td class="px-4 py-2 "><img src="../upload/<?php echo $cart[2] ?>"></td>
                                <td class="px-4 py-2 "><?php echo $cart[1] ?></td>
                                <td class="px-4 py-2 "><?php echo $cart[3] ?></td>
                                <td class="px-4 py-2 ">
                                <input type="number" min="1" max="10" name="soluong" id="soluong-<?php echo $a; ?>" value="<?php echo $cart[4] ?>" onchange="updateQuantity(<?php echo $a; ?>)"></td>
                                <td class="px-4 py-2 " id="thanhtien-<?php echo $a; ?>"><?php echo $thanhtien ?> VNĐ</td>
                                <?php echo $xoasp_td ?>
                            </tr>
                                <?php
                                
                            $i+=1;
                            }
                            echo '<tr>
                            <td colspan="4" class="px-4 py-2 font-bold" id="tong">TỔNG TIỀN: <span class="text-[red]">'.$tong.'  VNĐ</span></td>
                            '.$xoasp_tdtt.'
                            </tr>';
}
function viewcart_0(){
    $tong=0;
    
    echo '<tr class="h-[100px]">
    <th class="px-4 py-2 text-[14px] w-[150px] border-b-[1px] border-solid border-[#ccc]">Sản phẩm</th>
    <th class="px-4 w-[250px] text-left py-2 border-b-[1px] border-solid border-[#ccc]"</th>
    <th class="px-4 py-2 w-[100px] border-b-[1px] border-solid border-[#ccc]"></th>
    <th class="px-4 w-[100px] text-[14px] text-right py-2 border-b-[1px] border-solid border-[#ccc]">Thành tiền</th>

    </tr>';
        foreach($_SESSION['mycart'] as $a => $cart){
            global $anhpath;
            $anhpath = $cart[2]; // Tạo đường dẫn hoàn chỉnh đến tệp ảnh
            $thanhtien =$cart[4]*$cart[3];
            $tong = $tong + $thanhtien;
            if (is_file($anhpath)) {
                $cart[2] = "<img src='" . $anhpath . "' height='80px'>";
            } else {
                $cart[2] = "Không có ảnh";
                echo "$anhpath";
            }
            ?>
            <tr class="h-[100px]">
            <td class="px-4 w-[100px] text-left py-2 "><?php echo $cart[2] ?></td>
            <td class="px-4 w-[300px] text-left py-2 text-[14px]"><?php echo $cart[1] ?> </td>
            <td class="px-4 w-[50px] text-left py-2 "><span class="text-[red] font-bold">X</span> <?php echo $cart[4] ?></td>
            <td class="px-4 text-right py-2 w-[100px]" id="thanhtien-<?php echo $a; ?>"><?php echo number_format($thanhtien, 0, '.', ','); ?>đ</td>
        </tr>
            <?php
        }
        echo '<tr class="border-t-[1px] border-solid border-[#000]">
            <td colspan="3" class="px-4 py-2 font-bold" id="tong">TỔNG TIỀN:</td>
            <td class="px-4 text-right py-2 text-[red] font-bold">' . number_format($tong, 0, '.', ',') . 'đ</td>
        </tr>';
}
// cart ở file viewcart
function viewcart_sub(){
    // Kiểm tra sự tồn tại của mảng đã khai báo bên index1 là số lượng sản phẩm > 0 thì hiển thị ra giỏ hàng
    // Dùng foreach duyệt mảng để hiển thị ra sản phẩm trong giỏ hàng
    if (isset($_SESSION['mycart']) && count($_SESSION['mycart']) > 0) {
        global $anhpath;
        $tong = 0;
        echo '<tr class="h-[100px]">
            <th class="px-4 py-2 border-b-[1px] border-solid border-[#ccc]">Sản phẩm</th>
            <th class="px-4 py-2 border-b-[1px] border-solid border-[#ccc]"></th>
            <th class="px-4 py-2 border-b-[1px] border-solid border-[#ccc]">Đơn giá</th>
            <th class="px-4 py-2 border-b-[1px] border-solid border-[#ccc]">Số lượng</th>
            <th class="px-4 py-2 border-b-[1px] border-solid border-[#ccc]">Thành tiền</th>
            <th class="px-4 py-2 border-b-[1px] border-solid border-[#ccc]">Thao tác</th>
        </tr>';
        foreach ($_SESSION['mycart'] as $i => $cart) {
            $anhpath = $cart[2]; // Tạo đường dẫn hoàn chỉnh đến tệp ảnh
            // Kiểm tra sự tồn tại của file ảnh
            if (is_file($anhpath)) {
                $cart[2] = "<img src='" . $anhpath . "' height='80px'>";
            } else {
                $cart[2] = "Không có ảnh";
                echo "$anhpath";
            }
            $thanhtien = $cart[4] * $cart[3];
            $tong += $thanhtien;
            echo '<tr class="h-[100px]">';
            echo '<td class="px-4 py-2 w-[150px] h-[100px]">' . $cart[2] . '</td>';
            echo '<td class="px-4 py-2 ">' . $cart[1] . '</td>';
            echo '<td class="px-4 py-2 ">' . number_format($cart[3], 0, '.', ',') . 'đ</td>';
            echo '<td class="px-4 py-2"><input class="text-center border-[1px] border-solid border-[#ccc]" type="number" min="1" max="10" id="soluong-' . $i . '" name="soluong[' . $i . ']" value="' . $cart[4] . '" onchange="updateQuantity(' . $i . ')"></td>';
            echo '<td class="px-4 py-2 " id="thanhtien-' . $i . '">' . number_format($thanhtien, 0, '.', ',') . 'đ</td>';
            echo '<td class="px-4 py-2 ">
                    <a href="index1.php?act=deletecart&id_cart=' . $i . '"><input type="button" value="XÓA" onclick="return confirm(\'Bạn có chắc chắn muốn xóa ?\')" class="p-2 text-[14px] bg-red-600 text-[#fff] rounded hover:opacity-60  cursor-pointer"></a>
                    <a href=""><input type="submit" value="CẬP NHẬT"  name="updatecart" class="p-2 text-[14px] text-[#fff] hover:opacity-60 bg-[blue] rounded cursor-pointer"></a>
                    </td> ';
            echo '</tr>';
        }
        echo '<tr>';
        echo '<td class="px-4 py-2 " colspan="4" class="px-4 py-2 font-bold">TỔNG TIỀN: <span class="text-[red] font-bold">' . number_format($tong, 0, '.', ',') . 'đ</span></td>';
        echo '<td class="px-4 py-2 "></td>';
        echo '<td class="px-4 py-2 "></td>';
        echo '</tr>';
        echo '<tr>';
        echo '</tr>';
        
    } else {
        echo '<p class="text-center text-[24px] text-[red]">Giỏ hàng hiện tại đang chưa có sản phẩm.</p>';
        
    }
    

    
}
function tongdonhang(){
    // Mỗi lần ra khỏi vòng lặp thì sẽ tính tổng của tất cả các thành tiền
                        $tong=0;
                            foreach($_SESSION['mycart'] as $cart){
                                
                                $thanhtien =$cart[4]*$cart[3];
                                $tong = $tong + $thanhtien;
                                
}
return $tong;
}
// inser ở bảng oder
function insert_bill($id_user,$user, $email, $sdt, $diachi, $ngaydathang, $tongdonhang, $thanhtoan){
    $sql = "INSERT INTO `order` (`id_user`, `user`, `email`, `sdt`, `diachi`, `ngaydathang`, `thanhtoan`, `tongdonhang`) VALUES ('$id_user', '$user', '$email', '$sdt', '$diachi', '$ngaydathang', '$thanhtoan', '$tongdonhang')";
    return pdo_execute_return_lastInsertId($sql);
}
// Thêm sản phẩm ở bản order_details
function insert_cart($id_product, $id_order, $gia, $soluong, $id_user, $anh, $tensp, $thanhtien){
    $sql = "INSERT INTO `order_details` (`id_product`, `id_order`, `gia`, `soluong`, `id_user`, `anh`, `tensp`, `thanhtien`) VALUES ('$id_product', '$id_order', '$gia', '$soluong', '$id_user', '$anh', '$tensp', '$thanhtien')";
    return pdo_execute($sql);
}
// Load 1 đơn hàng
function loadOne_bill($id_order){
    $sql = "SELECT * FROM `order` WHERE `id_order` = $id_order";
    $bill = pdo_query_one($sql);
    return $bill;
}
// Load tất cả hóa đơn chi tiết
function loadAll_cart($id_order){
    $sql = "SELECT * FROM `order_details` WHERE `id_order`= $id_order";
    $bill = pdo_query($sql);
    return $bill;
}
function loadAll_cart_count($id_order){
    $sql = "SELECT * FROM `order_details` WHERE `id_order`= $id_order";
    $bill = pdo_query($sql);
    return sizeof($bill);
}
// Load tất cả đơn hàng ở mybill
function loadall_order($id_user){
    $sql = "SELECT * FROM `order` WHERE id_user=" . $id_user;
    $listbill = pdo_query($sql);
    return $listbill;
}
// Load tất cả đơn hàng ở phần list trong admin
function loadAll_bill($kyw="",$id_user=0){
    $sql = "SELECT * FROM `order` WHERE 1";
    if($id_user>0) $sql.=" AND `id_user`=".$id_user;
    if($kyw !="") $sql.=" AND `id_order` like '%" .$kyw. "%'";
    $sql.=" ORDER BY id_order desc";
    $listbill = pdo_query($sql);
    return $listbill;
}
function delete_donhang($id_order){
    $sql = "DELETE FROM order WHERE `order`.`id_order` = $id_order";
    pdo_execute($sql);
}
function update_ttdh($id_order,$trangthai){
    $sql = "UPDATE `order` SET `trangthai` = '$trangthai' WHERE `order`.`id_order` = $id_order";
    pdo_execute($sql);
}
function get_trangthaidonhang($n){
    switch ($n) {
        case '0':
            $tt = "Đơn hàng mới";
            break;
        case '1':
            $tt = "<span style='color: blue; font-weight: 600;'>Đang xử lí</span>";
            break;
        case '2':
            $tt = "<span style='color: orange; font-weight: 600;'>Đang giao hàng</span>";
            break;
        case '3':
            $tt = "<span style='color: green; font-weight: 600;'>Đã giao hàng</span>";
            break;
        case '4':
            $tt = "<span style='color: red; font-weight: 600;'>Đơn hàng đã bị hủy</span>";
            break;
        default:
            $tt = "Đơn hàng mới";
            break;
    }
    return $tt;
}
function Text($value) {
    switch ($value) {
        case '0':
            return 'Trả tiền khi nhận hàng (COD)';
        case '1':
            return 'Chuyển khoản ngân hàng';
        default:
            return 'Không xác định';
    }
}
function bill_chi_tiet($listbill) {
    global $anhpath;
    $tong = 0; // Tính tổng thành tiền
    echo '
        <tr>
            <th class="px-4 py-2 text-[14px] border-b-[1px] border-solid border-[#ccc]">Mã</th>
            <th class="px-4 py-2 text-[14px] border-b-[1px] border-solid border-[#ccc]">Sản phẩm</th>
            <th class="px-4 py-2 text-[14px] border-b-[1px] border-solid border-[#ccc] w-[200px]"></th>
            <th class="px-4 py-2 text-[14px] border-b-[1px] border-solid border-[#ccc]">Giá</th>
            <th class="px-4 py-2 text-[14px] border-b-[1px] border-solid border-[#ccc]">Số lượng</th>
            <th class="px-4 py-2 text-[14px] border-b-[1px] border-solid border-[#ccc]">Thành tiền</th>
        </tr>';
    foreach ($listbill as $i => $cart) {
        $anhpath = $cart['anh']; // Tạo đường dẫn hoàn chỉnh đến tệp ảnh
        if (is_file($anhpath)) {
            $cart['anh'] = "<img src='" . $anhpath . "' height='80px'>";
        } else {
            $cart['anh'] = "Không có ảnh";
            echo "$anhpath";
        }
        // Cập nhật giá trị thành tiền của mục
        $cart['thanhtien'] = $cart['gia'] * $cart['soluong'];
        // Cộng giá trị thanh tiền của mục vào tổng
        $tong = $tong + $cart['thanhtien'];
        echo '
        <tr>
            <td class="px-4 py-2 text-[14px]">' . $cart['id_order'] . '</td>
            <td class="px-4 py-2 ">' . $cart['anh'] . '</td>
            <td class="px-4 py-2 text-[14px] w-[200px]">' . $cart['tensp'] . '</td>
            <td class="px-4 py-2 text-[14px]">' . number_format($cart['gia'], 0, '.', ',') . 'đ</td>
            <td class="px-4 py-2 text-[14px] text-center">' . $cart['soluong'] . '</td>
            <td class="px-4 py-2 text-[14px]"  id="thanhtien-' . $i . '">' . number_format($cart['thanhtien'], 0, '.', ',') . 'đ</td>
        </tr>';
    }
    echo '
    <tr class="border-t-[1px] border-solid border-[#ccc]">
        <td colspan="5" class="px-4 py-2  font-bold">TỔNG TIỀN:</td>
        <td class="px-4 py-2 text-[red] font-bold">' . number_format($tong, 0, '.', ',') . 'đ</td>
    </tr>';

}
function bill_chi_tiet_admin($listbill) {
    global $anhpath;
    $tong = 0; // Tính tổng thành tiền
    echo '
        <tr>
            <th class="px-4 py-2 border-b-[1px] border-solid border-[#ccc] text-center">Mã</th>
            <th class="px-4 py-2 border-b-[1px] border-solid border-[#ccc] text-center">Ảnh</th>
            <th class="px-4 py-2 border-b-[1px] border-solid border-[#ccc] text-center">Sản phẩm</th>
            <th class="px-4 py-2 border-b-[1px] border-solid border-[#ccc] text-center">Giá</th>
            <th class="px-4 py-2 border-b-[1px] border-solid border-[#ccc] text-center">Số lượng</th>
            <th class="px-4 py-2 border-b-[1px] border-solid border-[#ccc] text-center">Thành tiền</th>
        </tr>';
    foreach ($listbill as $cart) {
        $anhpath = "../".$cart['anh']; // Tạo đường dẫn hoàn chỉnh đến tệp ảnh
        if (is_file($anhpath)) {
            $cart['anh'] = "<img src='" . $anhpath . "' height='80px' width='100px'";
        } else {
            $cart['anh'] = "Không có ảnh";
        }
         // Cập nhật giá trị thành tiền của mục
         $cart['thanhtien'] = $cart['gia'] * $cart['soluong'];
         // Cộng giá trị thanh tiền của mục vào tổng
         $tong = $tong + $cart['thanhtien'];
        echo '
        <tr>
            <td class="px-4 py-2 text-center ">XG-' . $cart['id_order'] . '</td>
            <td class="px-4 py-2 text-center ">' . $cart['anh'] . '</td>
            <td class="px-4 py-2 text-center ">' . $cart['tensp'] . '</td>
            <td class="px-4 py-2 text-center ">' . number_format($cart['gia'], 0, '.', ',') . 'đ</td>
            <td class="px-4 py-2 text-center">' . $cart['soluong'] . '</td>
            <td class="px-4 py-2 text-center">' . number_format($cart['thanhtien'], 0, '.', ',') . 'đ</td>
        </tr>';
    }
    echo '
    <tr class="border-t-[1px] border-solid border-[#ccc]">
        <td colspan="5" class="px-4 py-2  font-bold">TỔNG TIỀN:</td>
        <td class="px-4 py-2 text-[red] font-bold text-center">' . number_format($tong, 0, '.', ',') . 'đ</td>
    </tr>';
}
?>


                                      