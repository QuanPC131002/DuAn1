<?php
// lưu trữ số trang hiện tại, được truyền thông qua tham số GET từ URL
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$productsPerPage = 4; // Số sản phẩm hiển thị trên mỗi trang

// Lấy dữ liệu sản phẩm từ database
// Biến này lưu trữ danh sách tất cả sản phẩm từ database.
$result = loadall_order($id_user);
//  lưu trữ danh sách sản phẩm để tính toán số lượng sản phẩm và trang.
$rows = loadall_order($id_user);
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
?>
<div class="main-desc m-auto min-h-[600px] w-full rounded my-32">
<h2 class="text-[24px] text-[#000] font-bold text-center mt-32">ĐƠN HÀNG CỦA BẠN</h2>
<div class="my-6 py-6 px-6">
                   <table class="w-full mr-2">
                     <tr class="h-[100px] text-center">
                        <th class="border-b-[1px] border-solid border-[#ccc] px-2 text-[14px]">MÃ ĐƠN HÀNG</th>
                        <th class="border-b-[1px] border-solid border-[#ccc] px-2 text-[14px]">NGÀY ĐẶT</th>
                        <th class="border-b-[1px] border-solid border-[#ccc] px-2 text-[14px]">SỐ LƯỢNG</th>
                        <th class="border-b-[1px] border-solid border-[#ccc] px-2 text-[14px]">TỔNG GIÁ TRỊ</th>
                        <th class="border-b-[1px] border-solid border-[#ccc] px-2 text-[14px]">TÌNH TRẠNG</th>
                        <th class="border-b-[1px] border-solid border-[#ccc] px-2 text-[14px]">CHI TIẾT</th>
                    </tr> 
                    <?php 
                    if(is_array($listbill)){
                        for ($i = $startProduct; $i <= $endProduct; $i++){
                            $bill = $listbill[$i];
                            extract($bill);
                            $ttdh = get_trangthaidonhang($bill['trangthai']);
                            $countsp = loadAll_cart_count($bill['id_order']);
                            ?>
                            <tr class="h-[150px] text-center">
                            <td class="border-b-[1px] border-solid border-[#ccc] px-2">XG - <?php echo $bill['id_order'] ?></td>
                            <td class="border-b-[1px] border-solid border-[#ccc] px-2"><?php echo $bill['ngaydathang'] ?></td>
                            <td class="border-b-[1px] border-solid border-[#ccc] px-2"><?php echo $countsp ?></td>
                            <td class="border-b-[1px] border-solid border-[#ccc] px-2"><?php echo number_format($bill['tongdonhang'], 0, '.', ',') ?>đ</td>
                            <td class="border-b-[1px] border-solid border-[#ccc] px-2"><strong><?php echo $ttdh ?></strong></td>
                            <td class="border-b-[1px] border-solid border-[#ccc] px-2"><a href="index1.php?act=billct&id_order=<?= $id_order ?> " class="open-modal-button"><input type="submit" value="Xem chi tiết" class="p-2 text-[#fff] hover:opacity-60 bg-[blue] rounded"> </a></td>
                            </tr> 
                            <?php
                           }
                        
                    }
                    ?>
                    
                   </table>
                 
                </div>
                <nav aria-label="Page navigation example" class="my-[20px] mx-[700px]">
                            <ul class="pagination">
                                <li class="page-item <?php echo ($page == 1) ? 'disabled' : ''; ?>">
                                    <a class="page-link" href="index1.php?act=mybill&page=<?php echo $page - 1; ?>" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <!-- Vòng lặp for được sử dụng để tạo danh sách các liên kết trang phân trang -->
                                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                    <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                                        <a class="page-link" href="index1.php?act=mybill&page=<?= $i ?>"><?= $i ?></a>
                                    </li>
                                <?php endfor; ?>
                                <li class="page-item <?php echo ($page == $totalPages) ? 'disabled' : ''; ?>">
                                    <a class="page-link" href="index1.php?act=mybill&page=<?php echo $page + 1; ?>" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
            </div>