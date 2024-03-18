<?php
// lưu trữ số trang hiện tại, được truyền thông qua tham số GET từ URL
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$productsPerPage = 9; // Số sản phẩm hiển thị trên mỗi trang

// Lấy dữ liệu sản phẩm từ database
// Biến này lưu trữ danh sách tất cả sản phẩm từ database.
$result = loadAll_sanpham_sp();
//  lưu trữ danh sách sản phẩm để tính toán số lượng sản phẩm và trang.
$rows = loadAll_sanpham_sp();
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

<div class="main-content mt-[120px] grid grid-cols-[25%,1fr] gap-[30px] px-12 bg-[#fff] bg-opacity-80 ">
            <div class="box-left">
                <div class="danhmuc">
                    <!-- Danh Mục -->
                    <div class="border-b-[1px] border-solid border-yellow-800 py-[10px] px-[20px] text-center text-[#000] text-[22px]">DANH MỤC</div>
                    <div class="min-h-[200px] border-[1px] border-solid border-yellow-800 mt-2 p-4">
                        <ul>
                            <?php
                                foreach($listdanhmuc as $dm){
                                extract($dm);
                                $linkdm="index1.php?act=danhmucsp&id_danhmuc=".$id_danhmuc;// chuyển hướng đến trang sản phẩm
                                echo '<li class="border-b-[1px] border-solid border-[#ccc] my-2 pb-2 text-[20px] ""><a href="'.$linkdm.'">'.$tendanhmuc.'</a></li>';
                            }
                            ?>
                        </ul>
                    </div>
                    
                </div>
                <div class="sanphamyeuthich mt-8">
                    <!-- Sản Phẩm Yêu Thích -->
                    <div class=" border-b-[1px] border-solid border-yellow-800 py-[10px] px-[20px] text-center  text-[#000] text-[22px]">SẢN PHẨM YÊU THÍCH</div>
                    <div class="min-h-[200px] border-[1px] border-solid border-yellow-800 mt-2 p-4  mb-[50px]">
                        <ul>
                            <?php
                                foreach($dstop10 as $top10){
                                    extract($top10);
                                    $linksp="index1.php?act=sanphamct&id_product=".$id_product;
                                    $img=$anhpath.$anh;
                                    echo '<li class="border-b-[1px] border-solid border-[#ccc] my-8  pb-2 text-[16px] "><a href="'.$linksp.'" class="block hover:text-[#c51230] text-[#000]"> <img src="'.$img.'" alt="" class=w-[160px]  h-[50px>
                                    '.$tensp.'
                                   </a></li>';
                                }
                            ?>
                           
                            
                        </ul>
                    </div>
                </div>
            </div>
            <div class="box-right">
                <!-- Load Tất Cả Sản Phẩm -->
                <h2 class="m-auto py-[10px] px-[20px] text-center text-[#000] font-bold text-[26px]">TẤT CẢ SẢN PHẨM</h2>
                <div class="w-[100px] m-auto border-[3px] border-solid border-[#c51230]"></div>
                
                <div class="product grid grid-cols-3 gap-[24px]">
                    <!-- Một vòng lặp for được sử dụng để duyệt qua các sản phẩm từ $startProduct đến $endProduct. -->
                    <?php for ($i = $startProduct; $i <= $endProduct; $i++): ?>
                        <?php
                        $sp = $result[$i]; // Lấy sản phẩm từ mảng dữ liệu
                        extract($sp);
                        $linksp = "index1.php?act=sanphamct&id_product=" . $id_product;
                        $anh = $anhpath . $anh;
                        ?>
                        <div class="my-4 hover:translate-y-[-1px] hover:shadow-[0px]-[1px]-[20px]-[0px]-[#ccc]">
                            <a href="<?php echo $linksp ?>"><img src="<?php echo $anh ?>" alt="" class="w-full h-[200px]"></a>
                            <a href="<?php echo $linksp ?>">
                                <h3 class="text-[#000] text-[18px] h-[40px] font-bold text-center hover:text-[red]"><?php echo $tensp ?></h3>
                            </a>
                            <p class="text-[#000] text-[22px] h-[30px] text-center text-[#c51230] font-bold"><?php echo number_format($gia, 0, '.', ','); ?>đ</p>
                            <a href="<?php echo $linksp ?>">
                                <input type="submit" name="xemchitiet" value="XEM CHI TIẾT"
                                    class="cursor-pointer bg-[#c51230] text-[#fff] p-[10px] w-full 
                                        hover:bg-[#fff] hover:border-[2px] hover:border-solid hover:border-[#c51230] hover:text-[#c51230]">
                            </a>
                        </div>
                    <?php endfor; ?>
                </div>


                <nav aria-label="Page navigation example"  class="my-[20px] ml-[450px]">
                    <ul class="pagination">
                        <li class="page-item <?php echo ($page == 1) ? 'disabled' : ''; ?>">
                            <a class="page-link" href="index1.php?act=sanpham&page=<?php echo $page - 1; ?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <!-- Vòng lặp for được sử dụng để tạo danh sách các liên kết trang phân trang -->
                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                            <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                                <a class="page-link" href="index1.php?act=sanpham&page=<?= $i ?>"><?= $i ?></a>
                            </li>
                        <?php endfor; ?>
                        <li class="page-item <?php echo ($page == $totalPages) ? 'disabled' : ''; ?>">
                            <a class="page-link" href="index1.php?act=sanpham&page=<?php echo $page + 1; ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            
        </div>
      