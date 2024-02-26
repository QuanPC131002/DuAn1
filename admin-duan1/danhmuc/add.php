<div class="w-full mt-0 bg-[#fff] ">
            <div class="mb-[20px] ml-[20px] font-bold alert alert-info"><h1 class="ml-[10px] font-bold text-[20px]">THÊM DANH MỤC</h1></div>
            <div class="my-[20px] mx-[20px]">
                <form action=""method="POST">
                    <!-- <div class="row mb10">
                    <label for="">Mã loại</label><br>
                    <input type="text"name="maloai" disabled><br>
                </div> -->
                <div class="row mb10">
                    <label for="" class="font-bold ml-[10px]">Tên loại</label><br>
                    <input class="w-[50%] mr-5 p-[8px] border-[1px] border-solid border-[#ccc] m-[20px] rounded"  type="text" name="tendanhmuc" value="<?php if(isset($tendanhmuc)) echo $tendanhmuc ?>"><br>
                    <!-- validate -->
                    <?php if(!empty($error['tendanhmuc'])){
                            echo "<p class='thongbao font-bold text-[red] ml-2'>{$error['tendanhmuc']}</p>";
                        } ?>
                </div>
                <div class="mt-2">
                    <input class=" text-black hover:bg-blue-600 hover:text-[#fff] border-[1px] border-solid border-[#ccc]  w-[100px] rounded ml-[10px] mb-[20px] py-2" type="submit" value="THÊM MỚI" name="themmoi" >
                    <input class=" text-black hover:bg-blue-600 hover:text-[#fff] border-[1px] border-solid border-[#ccc]  w-[100px] rounded ml-[10px] mb-[20px] py-2"type="reset" value="NHẬP LẠI">
                    <a class="" href="index.php?act=listdm">
                    <input class=" text-black hover:bg-blue-600 hover:text-[#fff] border-[1px] border-solid border-[#ccc]  w-[100px] rounded ml-[10px] mb-[20px] py-2"type="button" value="DANH SÁCH">
                    </a><br>
                </div>
                <?php
                    // Thông báo thêm thành công
                    if(isset($thongbao) && $thongbao !=""){
                        echo '<p class="text-[green] font-bold ml-2">'.$thongbao.'</p>';
                    }
                        
                    ?>
                </form>
            </div>
            </div>
</div>