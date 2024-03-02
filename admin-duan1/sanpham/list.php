<?php
// lưu trữ số trang hiện tại, được truyền thông qua tham số GET từ URL
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$productsPerPage = 9; // Số sản phẩm hiển thị trên mỗi trang

// Lấy dữ liệu sản phẩm từ database
// Biến này lưu trữ danh sách tất cả sản phẩm từ database.
$result = loadAll_sanpham();
//  lưu trữ danh sách sản phẩm để tính toán số lượng sản phẩm và trang.
$rows = loadAll_sanpham();
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
<div class="row mx-[20px]">
            <div class="row formtitle mb alert alert-info">
                <h1 class="font-bold text-[20px]">DANH SÁCH LOẠI HÀNG HÓA</h1>
            </div>
            <form action="index.php?act=listsp" method="POST" class="my-4 ml-[-20px]">
                        <input type="text" name="kyw" id="" class="w-[300px] border-[1px] border-solid border-[#ccc]">
                        <select name="id_danhmuc" class="border-[1px] border-solid border-[#ccc] h-[25px]">
                            <option value="0" selected>Tất Cả</option>
                        <!-- Duyệt mảng -> dùng extract để show dữ liệu -->
                            <?php
                                foreach($listdanhmuc as $danhmuc){
                                    extract($danhmuc);
                                    echo '<option value="'.$id_danhmuc.'">'.$tendanhmuc.'</option>';
                                }
                            ?>
                            
                        </select>
                        <input type="submit" name="listOK" value="TÌM KIẾM" class="h-[25px] w-[100px] bg-[#ccc] hover:opacity-50">
                    </form>
            <div class="row formcontent">
                <div class="row mb10">
                
                </div>
                <div class="row mb10 formds ml-[-20px]">
                   
                    <table class="w-full">
                        <tr>
                            <th class="w-[15%] text-center  border-[1px] border-solid border-[#ccc]">MÃ LOẠI</th>
                            <th class="w-[30%] text-center  border-[1px] border-solid border-[#ccc]">TÊN SẢN PHẨM</th>
                            <th class="w-[25%] text-center  border-[1px] border-solid border-[#ccc]">Ảnh</th>
                            <th class="w-[15%] text-center  border-[1px] border-solid border-[#ccc]">Giá</th>
                            <th class="w-[15%] text-center  border-[1px] border-solid border-[#ccc]">Thao tác</th>
                        </tr>
                        <?php
                        // Mỗi lần lặp giá trị của i sẽ tăng lên 1
                        // Kiểm tra xem chỉ số $i có tồn tại trong mảng $listsanpham hay không.
                        //  Nếu tồn tại, nó gán giá trị tại chỉ số đó cho $sanpham. Nếu chỉ số không tồn tại, nó gán null cho $sanpham.
                        for ($i = $startProduct; $i <= $endProduct; $i++) {
                            $sanpham = isset($listsanpham[$i]) ? $listsanpham[$i] : null;
                                if (is_array($sanpham)) {
                                    extract($sanpham);
                                    // Tiếp tục sử dụng các biến được trích xuất
                                } else {
                                    // Xử lý trường hợp $sanpham không phải là mảng
                                    continue; // hoặc thực hiện xử lý khác tùy theo trường hợp cụ thể
                                }
                            $suasp = "index.php?act=suasp&id_product=" . $id_product;
                            $xoasp = "index.php?act=xoasp&id_product=" . $id_product;
                            $anhpath = "../upload/" . $anh;

                            if (is_file($anhpath)) {
                                $anh = "<img src='" . $anhpath . "' width='140px' style='display: block; margin: 0 auto;'>";
                            } else {
                                $anh = "Không có ảnh";
                            }
                        ?>
                            <tr>
                                <td class="w-[15%] text-center  border-[1px] border-solid border-[#ccc]"><?php echo $id_product ?></td>
                                <td class="w-[30%] text-center  border-[1px] border-solid border-[#ccc]"><?php echo $tensp ?></td>
                                <td class="w-[25%] text-center  border-[1px] border-solid border-[#ccc]"><?php echo $anh ?></td>
                                <td class="w-[15%] text-center  border-[1px] border-solid border-[#ccc]"><?php echo number_format($gia, 0, '.', ','); ?>đ</td>
                                <td class="w-[15%] text-center  border-[1px] border-solid border-[#ccc]"><a href="<?=$suasp ?>"><input class="text-white bg-blue-500 w-[100px] rounded ml-[20px] mb-[20px] hover:opacity-60" type="button" name=""value="SỬA"><a href="<?=$xoasp ?>" onclick="return confirm('Bạn có muốn xóa không?')"><input class="text-white bg-red-500 w-[100px] rounded ml-[20px] mb-[20px] hover:opacity-60" type="button" name=""value="XÓA"></td>
                            </tr>  
                            <?php
                            }
                        ?>
                         
                    </table>
                    <nav aria-label="Page navigation example" class="my-[20px] mx-[450px]">
                    <ul class="pagination">
                        <li class="page-item <?php echo ($page == 1) ? 'disabled' : ''; ?>">
                            <a class="page-link" href="index.php?act=listsp&page=<?php echo $page - 1; ?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <!-- Vòng lặp for được sử dụng để tạo danh sách các liên kết trang phân trang -->
                         <!-- Vòng lặp chạy từ trang 1 đến trang tổng số trang -->
                         <!-- $totalPages chứa tổng số trang cần hiển thị -->
                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                            <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                            <!-- Tạo một liên kết đến trang $i của danh sách sản phẩm -->
                            <!-- $i là số trang hiện tại -->
                                <a class="page-link" href="index.php?act=listsp&page=<?= $i ?>"><?= $i ?></a>
                            </li>
                        <?php endfor; ?>
                        <!-- Phần này tạo liên kết đến trang tiếp theo -->
                        <!-- Nếu trang hiện tại là trang cuối cùng, thì thêm lớp 'disabled' -->
                        <!-- Lớp 'disabled' sẽ ngăn người dùng nhấp vào trang tiếp theo khi họ ở trang cuối cùng -->
                        <li class="page-item <?php echo ($page == $totalPages) ? 'disabled' : ''; ?>">
                            <a class="page-link" href="index.php?act=listsp&page=<?php echo $page + 1; ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                </div>
                <div class="row mb10">
                    <!-- <input type="submit" value="CHỌN TẤT CẢ">
                    <input type="reset" value="BỎ CHỌN TẤT CẢ">
                    <input type="reset" value="XÓA CÁC MỤC ĐÃ CHỌN"> -->
                    <a href="index.php?act=addsp"><input class="text-black w-[100px] rounded ml-[-20px] my-[10px] py-[10px] hover:bg-blue-600 hover:text-[#fff] border-[1px] border-solid border-[#ccc] "type="button" value="NHẬP THÊM"></a>
                </div>
            </div>
            
        </div>