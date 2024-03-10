<div class="main-content mt-[120px] bg-[#fff] bg-opacity-80 p-[50px]">
            <div class="content grid grid-cols-2 gap-4 ">
                <?php
                    extract($onesp);
                ?>
                <div class="content-item-pro">
                    <div class="item-pro-text ">
                        <p></p>
                    </div>
                    <div class="item-pro-img">
                        <?php
                            $anh=$anhpath.$anh;
                            echo '<img src="',$anh.'" alt="" class="w-[80%] ">';
                        ?>
                        
                    </div>
                </div>
                <div class="content-item-heading text-[#fff] ">
                    <h2 class="text-[32px] text-[#000] font-bold"><?=$tensp ?></h2>
                    <div class="text-[#d5d5d5] my-2">
                    <i class="fa-regular fa-star text-[yellow]"></i>
                    <i class="fa-regular fa-star text-[yellow]"></i>
                    <i class="fa-regular fa-star text-[yellow]"></i>
                    <i class="fa-regular fa-star text-[yellow]"></i>
                    <i class="fa-regular fa-star"></i>
                    </div>
                    <div class="flex">
                        <div class="text-[#000] text-[20px] my-2">CHIA SẺ TRÊN :</div>
                        <div class=" my-2 ">
                        <i class="text-[28px] mx-2 hover:-translate-y-2 hover:opacity-60 cursor-pointer  text-[blue] fa-brands fa-facebook"></i>
                        <i class="text-[28px] mx-2 hover:-translate-y-2 hover:opacity-60 cursor-pointer  text-[#FD1D1D] fa-brands fa-instagram"></i>
                        <i class="text-[28px] mx-2 hover:-translate-y-2 hover:opacity-60 cursor-pointer  text-cyan-400  fa-brands fa-twitter"></i>
                        </div>
                    </div>
                    <div class="flex my-2 ">
                        <p class="text-[40px] ml-[-4px] text-[red] " ><?=number_format($gia, 0, '.', ','); ?>đ</p>
                        <!-- <p class="price text-[30px] mt-2  text-[red]">200,000</p> -->
                    </div> 
                    <!-- <div class="counter">
                        <div class="text-[#000] text-left text-[28px] font-[600]">Số lượng</div>
                        <div class="counter-new">
                        <span class="down" onClick='decreaseCount(event, this)'>-</span>
                        <input type="number" value="1" min="1" max="10">
                        <span class="up" onClick='increaseCount(event, this)'>+</span>
                        </div>
                        </div> -->
                    
                    <div class="btn flex my-2">
                    <?php
                    ?>
                                <div class="">
                                <form action="index1.php?act=addtocart" method="POST">
                                <input type="hidden" name="id_product" value="<?= $id_product ?>">
                                <input type="hidden" name="tensp" value="<?= $tensp ?>">
                                <input type="hidden" name="anh" value="<?= $anh ?>">
                                <input type="hidden" name="gia" value="<?= $gia ?>">
                                <a href="" class="ml-[-12px]"><span class="text-[22px] text-[#000]">Hotline hỗ trợ : 0818803825 - 0919803825</span></a>
                                <div class="counter">
                                <div class="text-[#000] text-left text-[28px] my-4 font-[600] ml-[-12px]">
                                    <h2 class="w-[150px]">Số lượng</h2>
                                </div>
                                <div class="counter-new">
                                <span class="down" onClick='decreaseCount(event, this)'>-</span>
                                <input type="number" name="soluong" value="1" min="1" max="10" value="<?= $soluong ?>">
                                <span class="up" onClick='increaseCount(event, this)'>+</span>
                                </div>
                                </div>
                                <?php
                                $thongbao = "Số lượng vượt quá giới hạn của 10.";
                                    if(isset($_SESSION['user'])){
                                      
                                        ?>
                                        
                                        <div>
                                            <input type="submit" name="addtocart" value="THÊM VÀO GIỎ" class="add-to-cart-btn cursor-pointer bg-[#c51230] text-[#fff] p-3 w-full 
                                            hover:bg-[#fff] hover:border-[2px] hover:border-solid hover:border-[#c51230] hover:text-[#c51230] ml-[-20px]">
                                            
                                        </div>
                                        <?php
                                    }else{
                                        ?>
                                        <a href="index1.php?act=dangnhap"class="text-[24px] text-[red] font-bold text-left my-2 ml-[-70px]">Vui lòng đăng nhập để mua hàng</a>
                                        <?php
                                    }
                                    ?>
                                   
                                    </form>
                                </div>
                    <?php
                        ?>
                    
                    </div>
                </div>
            </div>

            <!-- Mô Tả -->
            <div class="main-desc my-16">
                <?php extract($onesp) ?>
                <h2 class="text-[40px] text-center  mb-4 text-[#000] font-bold">Mô Tả Sản Phẩm</h2>
                <div class="w-[100px] m-auto border-[3px] border-solid border-[#c51230]"></div>
                <div class="my-6 py-6 px-6  min-h-[900px]">
                    <?php
                        $anh=$anhpath.$anh;
                        echo ' <div class="img">
                        <img src="'.$anh.'" alt="" class="w-[50%] mx-auto py-6">
                    </div>';
                    ?>
                   
                    <div class="desc mx-auto py-6 ">
                        <h2 class="text-[26px] text-[#000] text-center mb-2  ">Thông tin chi tiết về <strong><?php echo $tensp ?></strong></h2>
                        <h2 class="text-[26px] text-[#000]  "><strong>Tên Xì Gà:</strong> <?php echo $tensp ?></h2>
                        <p class="text-[#000]  text-[26px] "><strong>Giá:</strong>  <?php echo number_format($gia, 0, '.', ','); ?>đ</p>
                        <p class="text-[#000]  text-[26px] "><strong>Mã:</strong> XG -  <?php echo $id_product ?>
                        <p class="text-[#000]  text-[24px] min-h-[200px] "><strong>Mô Tả:</strong> <?php echo $mota ?>.
                        <br><br><strong class="text-[red]">XÌ GÀ NGHIỆP DƯ cam kết:</strong><br>

                        Tất cả sản phẩm xì gà đều chính hãng mới 100% chưa qua sử dụng. <br>

                        Sản phẩm được bảo quản và ủ trong điều kiện tốt nhất trong các Humidor điện chuyên dụng.</p>
                    </div>
                </div>
            </div>
            <!-- comment -->
            <!-- <div class="comment my-12">
                <h1 class="text-[40px] text-[#000] font-bold ">Bình Luận</h1>
                <div class="py-2">
                        <table class="w-full border-[1px] border-solid border-[#000] min-h-[200px] my-2">
                            <tbody>
                                <tr>
                                    <td class="p-2"></td>
                                    <td class="p-2"></td>
                                    <td class="p-2"></td>
                                </tr>
                            </tbody>
                        </table>
                    
                    <form action="">
                        <input type="text" name="" id="" class="w-[80%] py-2 border-[1px] border-solid border-[#000]" placeholder="Bình luận tại đây...">
                        <input type="submit" value="GỬI BÌNH LUẬN" class="w-[19%] py-2 bg-slate-500 hover:bg-[green]">
                    </form>
                </div>
            </div> -->
            <!-- <div class="my-12">
                <iframe src="view/binhluan/binhluanform.php?id_product=<?=$id?>" frameborder="0" width="100%" height="300px"></iframe>
            </div> -->
            <div class="cungloai my-16">
                
                <h2 class="text-[40px] text-center mt-8 mb-4 text-[#000] font-bold">Sản phẩm tương tự</h2>
                <div class="w-[100px] m-auto border-[3px] border-solid border-[#c51230]"></div>
                <div class="w-full  min-h-[400px] my-2 grid grid-cols-4 gap-4 grid grid-cols-3 gap-4 ">
                
                    <?php
                        foreach($sp_cungloai as $sp){
                            extract($sp);
                            $linksp="index1.php?act=sanphamct&id_product=".$id_product;
                            $anh=$anhpath.$anh;
                            echo '<div class="m-auto">
                            <img src="'.$anh.'" alt="" class="w-[80%] h-[250px]">
                            <li class="p-4 list-none text-center text-[14px] font-bold "><a href="'.$linksp.'" class="hover:text-[#c51230]">'.$tensp.'</a></li>
                            </div>';
                           
                        }
                    ?>
                    
                </div>
            </div>

        </div>
       
       

