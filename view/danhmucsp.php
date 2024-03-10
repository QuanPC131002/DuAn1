
<div class="main-content  my-4 grid grid-cols-[25%,1fr] gap-[30px] px-12">
<div class="box-left mt-[100px]">
                <div class="danhmuc">
                    <!-- Danh Mục -->
                    <div class="border-b-[1px] border-solid border-yellow-800 py-[10px] px-[20px] text-center text-[#000] text-[22px]">DANH MỤC</div>
                    <div class="min-h-[200px] border-[1px] border-solid border-yellow-800 mt-2 p-4">
                        <ul>
                            <?php
                                foreach($listdanhmuc as $dm){
                                extract($dm);
                                $linkdm="index1.php?act=danhmucsp&id_danhmuc=".$id_danhmuc;// chuyển hướng đến trang sản phẩm
                                echo '<li class="border-b-[1px] border-solid border-[#ccc] my-2 pb-2 text-[20px] text-[#000]"><a href="'.$linkdm.'">'.$tendanhmuc.'</a></li>';
                            }
                            ?>
                        </ul>
                    </div>
                    
                </div>
                <div class="sanphamyeuthich mt-8">
                    <!-- Sản Phẩm Yêu Thích -->
                    <div class=" border-b-[1px] border-solid border-yellow-800 py-[10px] px-[20px]  text-center text-[#000] text-[22px]">SẢN PHẨM YÊU THÍCH</div>
                    <div class="min-h-[200px] border-[1px] border-solid border-yellow-800 mt-2 p-4 mb-[50px]">
                        <ul>
                            <?php
                                foreach($dstop10 as $top10){
                                    extract($top10);
                                    $linksp="index1.php?act=sanphamct&id_product=".$id_product;
                                    $img=$anhpath.$anh;
                                    echo '<li class="border-b-[1px] border-solid border-[#ccc] my-8  pb-2 text-[16px] hover:text-[red]"><a href="'.$linksp.'" class="block hover:text-[#c51230] text-[#000]"> <img src="'.$img.'" alt="" class=w-[160px] h-[50px>
                                    '.$tensp.'
                                   </a></li>';
                                }
                            ?>
                            <!-- <li><a href="" class="block text-[#000]">Xì Gà Cuba</a></li>
                            <li><a href="" class="block text-[#000]">Xì Gà đẹp</a></li> -->
                            
                        </ul>
                    </div>
                </div>
            </div>
            <div class="box-right mt-[100px]">
                <!-- Load Tất Cả Sản Phẩm -->
                <h2 class="text-center py-[10px] px-[20px] text-center text-[#000] text-[26px]">SẢN PHẨM </h2>
                <div class="w-[100px] m-auto border-[3px] border-solid border-[#c51230]"></div>
                <div class="product grid grid-cols-3 gap-[24px]">
                    <?php
                        foreach($dssp as $sp){
                            extract($sp);
                            $linksp="index1.php?act=sanphamct&id_product=".$id_product;
                            $anh=$anhpath.$anh;
                            echo '<div class="my-4 hover:translate-y-[-1px] hover:shadow-[0px]-[1px]-[20px]-[0px]-[#ccc]">
                            <a href="'.$linksp.'"><img src="'.$anh.'" alt="" class="w-full h-[200px] absolute`"></a>
                            <a href="'.$linksp.'"> <h3 class="text-[#000] text-[18px] h-[40px] font-bold text-center hover:text-[red]">'.$tensp.'</h3></a>
                            <p class="text-[#000] text-[22px] h-[30px] text-center text-[#c51230] font-bold">' . number_format($gia, 0, '.', ',') . 'đ</p>
                            <a href="'.$linksp.'"><input type="submit" name="xemchitiet" value="XEM CHI TIẾT" class="cursor-pointer bg-[#c51230] text-[#fff] p-3 w-full 
                            hover:bg-[#fff] hover:border-[2px] hover:border-solid hover:border-[#c51230] hover:text-[#c51230]"></a>
                        </div>';
                        }
                    ?>
                    
                </div>
            </div>
        </div>
