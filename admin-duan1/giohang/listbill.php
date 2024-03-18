<?php
// lưu trữ số trang hiện tại, được truyền thông qua tham số GET từ URL
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$productsPerPage = 4; // Số sản phẩm hiển thị trên mỗi trang

// Lấy dữ liệu sản phẩm từ database
// Biến này lưu trữ danh sách tất cả sản phẩm từ database.
$result = loadAll_bill($kyw="",$id_user=0);
//  lưu trữ danh sách sản phẩm để tính toán số lượng sản phẩm và trang.
$rows = loadAll_bill($kyw="",$id_user=0);
//  Số lượng tổng cộng của sản phẩm.
$rowcount = count($rows);

// Tính tổng số trang dựa trên số lượng sản phẩm và số sản phẩm trên mỗi trang
$totalPages = ceil($rowcount / $productsPerPage);

// Xác định sản phẩm bắt đầu và kết thúc trên trang hiện tại
$startProduct = ($page - 1) * $productsPerPage;
$endProduct = $startProduct + $productsPerPage - 1;
if ($endProduct >= $rowcount) {
    $endProduct = $rowcount - 1;
}

    if (isset($_POST['trangthai'])) {
        $id_order = $_POST['id_order'];
        $trangthai = $_POST['trangthai'];
        $sql = "UPDATE `order` SET `trangthai` = '$trangthai' WHERE `order`.`id_order` = $id_order";
        pdo_execute($sql);
        header("location:index.php?act=listbill");  
    }
?>

<div class="row mx-[20px]">
            <div class="row mb formtitle alert alert-info" style="height: 50px; margin-left: 2px;">
                <h1 style="margin: auto; font-size: 20px; font-weight: 700;">DANH SÁCH ĐƠN HÀNG</h1>
            </div>
            <form action="index.php?act=listbill" method="POST" class="my-4 ml-[-10px]">
                        <input type="text" name="kyw" id="" class="w-[300px] border-[1px] border-solid border-[#ccc]">
                            <input type="submit" name="listOK" value="TÌM KIẾM" class="h-[25px] w-[100px] bg-[#ccc] hover:opacity-50">
                    </form>
            <div class="row formcontent">
                <div class="row mb10">
                
                </div>
                <div class="row mb10 formds">
                    <table>
                        <tr>
                            <th class="text-center border-[1px] border-solid border-[#ccc] p-2">ID</th>
                            <th class="text-center border-[1px] border-solid border-[#ccc] p-2">Khách hàng</th>
                            <th class="text-center border-[1px] border-solid border-[#ccc] p-2">Số lượng hàng</th>
                            <th class="text-center border-[1px] border-solid border-[#ccc] p-2">Giá trị đơn hàng</th>
                            <th class="text-center border-[1px] border-solid border-[#ccc] p-2">Ngày đặt hàng</th>
                            <th class="text-center border-[1px] border-solid border-[#ccc] p-2">Trạng thái đơn</th>
                            <th class="text-center border-[1px] border-solid border-[#ccc] p-2">Tùy chỉnh</th>
                            <th class="text-center border-[1px] border-solid border-[#ccc] p-2">Thao tác</th>
                        </tr>
                        <?php
                             for ($i = $startProduct; $i <= $endProduct; $i++){
                                $bill = isset($listbill[$i]) ? $listbill[$i] : null;
                                if (is_array($bill)) {
                                    extract($bill);
                                    // Tiếp tục sử dụng các biến được trích xuất
                                } else {
                                    // Xử lý trường hợp $bill không phải là mảng
                                    continue; // hoặc thực hiện xử lý khác tùy theo trường hợp cụ thể
                                }
                                $suadh ="index.php?act=suattdh&id_order=".$id_order;
                                $xoadh ="index.php?act=xoadh&id_order=".$id_order;
                                $billct ="index.php?act=billct&id_order=".$id_order;
                                $countsp = loadAll_cart_count($bill['id_order']);
                                $ttdh = get_trangthaidonhang($bill['trangthai']);
                                ?>
                                
                                 <tr>
                                <td class="text-center border-[1px] border-solid border-[#ccc] p-2">XG - <?php echo $bill['id_order'] ?></td>
                                <td class="text-center border-[1px] border-solid border-[#ccc] p-2"><?php echo $bill['user']?></td>
                                <td class="text-center border-[1px] border-solid border-[#ccc] p-2"><?php echo $countsp?> </td>
                                <td class="text-center border-[1px] border-solid border-[#ccc] p-2"><?php echo number_format($bill['tongdonhang'], 0, '.', ',');?>đ</td>
                                <td class="text-center border-[1px] border-solid border-[#ccc] p-2"><?php echo $bill['ngaydathang']?></td>
                                <td class="text-center border-[1px] border-solid border-[#ccc] p-2"><?php echo $ttdh?></td>
                                <td class="text-center border-[1px] border-solid border-[#ccc] p-2">
                                    <form action="" method="post">
                                    <input type="text" name="id_order" value="<?= $bill['id_order'] ?>" hidden>
                                        <select name="trangthai" id="" onchange="submit()" 
                                        class="<?php 
                                        if($bill['trangthai']==1){
                                            echo "bg-blue-600 text-[#fff]" ;
                                        } else if($bill['trangthai']==2){
                                            echo "bg-orange-600 text-[#fff]";
                                        }
                                        else if($bill['trangthai']==3){
                                            echo "bg-green-600 text-[#fff]";
                                        }
                                        else if($bill['trangthai']==4){
                                            echo "bg-red-600 text-[#fff]";
                                        }
                                        
                                        ?>"
                                        <?php if ($bill['trangthai'] == 3) echo "disabled"; ?> > <!-- Thêm điều kiện disabled nếu trạng thái là "Đã giao hàng" -->
                                         
                                            <option value="0">Đơn hàng mới</option>
                                            <option value="1" <?php if ($bill['trangthai'] == 1) echo "selected"?>>Đang xử lí</option>
                                            <option value="2" <?php if ($bill['trangthai'] == 2) echo "selected" ?>>Đang giao hàng</option>
                                            <option value="3" <?php if ($bill['trangthai'] == 3) echo "selected" ?>>Đã giao hàng</option>
                                            <option value="4" <?php if ($bill['trangthai'] == 4) echo "selected" ?>>Hủy</option>
                                        </select>
                                    </form>
                                </td>
                            <td class="text-center border-[1px] border-solid border-[#ccc] p-2">
                                <a href="index.php?act=billct&id_order=<?= $id_order ?>" class="p-[4px]  text-white hover:opacity-60 bg-blue-800 rounded">Chi tiết</a>
                            </td>

                            </tr>
                                <?php
                               
                            }
                        ?>
                        
                      </table>  
                </div>
                <nav aria-label="Page navigation example"  class="my-[20px] ml-[450px]">
                            <ul class="pagination">
                                <li class="page-item <?php echo ($page == 1) ? 'disabled' : ''; ?>">
                                    <a class="page-link" href="index.php?act=listbill&page=<?php echo $page - 1; ?>" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <!-- Vòng lặp for được sử dụng để tạo danh sách các liên kết trang phân trang -->
                                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                    <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                                        <a class="page-link" href="index.php?act=listbill&page=<?= $i ?>"><?= $i ?></a>
                                    </li>
                                <?php endfor; ?>
                                <li class="page-item <?php echo ($page == $totalPages) ? 'disabled' : ''; ?>">
                                    <a class="page-link" href="index.php?act=listbill&page=<?php echo $page + 1; ?>" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                
            </div>
            
        </div>
        