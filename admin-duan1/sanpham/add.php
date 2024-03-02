<div class="row mx-[20px]">
            <div class="row formtitle alert alert-info"><h1 class="font-bold text-[20px]">THÊM MỚI SẢN PHẨM</h1></div>
            <div class="row formcontent" >
                <form action="index.php?act=addsp" method="POST" enctype="multipart/form-data">
                <div class="row mb10 ">
                    <label for="" class="font-bold my-2 ml-[-12px]">Tên loại</label><br>
                    <select name="id_danhmuc" class="border-[1px] border-solid border-[#ccc]">
                        <option value="">---Chọn---</option>
                        <!-- Duyệt mảng -> dùng extract để show dữ liệu -->
                            <?php
                                foreach($listdanhmuc as $danhmuc){
                                    extract($danhmuc);
                                    echo '<option value="'.$id_danhmuc.'">'.$tendanhmuc.'</option>';
                                }
                            ?>
                            
                        </select>
                </div>
                <div class="ml-[-35px]">
                    <label class="ml-[20px] font-bold mt-[20px]"for="">Tên sản phẩm</label><br>
                    <input class="w-full border-[1px] border-solid border-[#ccc] p-[8px] mx-[20px] mt-[10px] rounded"type="text"name="tensp" value="<?php if(isset($tensp)) echo $tensp ?>"><br>
                    <?php if(!empty($error['tensp'])){
                            echo "<p class='thongbao text-[red] ml-[20px] font-bold'>{$error['tensp']}</p>";
                        } ?>
                </div>
                <div class="ml-[-10px] my-4">
                    <label for="" class="font-bold">Ảnh sản phẩm</label><br>
                    <input class="w-full p-[8px] ml-[-4px] rounded"type="file" name="anh" value="<?php if(isset($anh)) echo $anh ?>"><br>
                    <?php if(!empty($error['anh'])){
                            echo "<p class='thongbao text-[red]  font-bold'>{$error['anh']}</p>";
                        } ?>
                </div>
                <div class="ml-[-35px]">
                    <label class="ml-[20px] font-bold mt-[20px]" for="">Giá thành sản phẩm</label><br>
                    <input class="w-full border-[1px] border-solid border-[#ccc] p-[8px] mx-[20px] mt-[10px] rounded"type="text" name="gia" value="<?php if(isset($gia)) echo $gia ?>"><br>
                    <?php if(!empty($error['gia'])){
                            echo "<p class='thongbao text-[red] ml-[20px] font-bold'>{$error['gia']}</p>";
                        } ?>
                </div>
               
                <div class="row mb mt-[10px]">
                        <p class="ml-[-12px] font-bold">Mô tả</p>
                        <textarea name="mota" class="w-[400px] min-h-[200px] border-[1px] border-solid border-[#ccc]"></textarea>
                    </div>
                <div class="mt-[20px] ml-[-30px]">
                    <input class="border-[1px] border-solid border-[#ccc] p-2  hover:bg-blue-600 hover:text-[#fff] rounded ml-[20px] mb-[20px]"type="submit" value="THÊM MỚI" name="themmoi" >
                    <input class="border-[1px] border-solid border-[#ccc] p-2  hover:bg-blue-600 hover:text-[#fff] rounded ml-[20px] mb-[20px]"type="reset" value="NHẬP LẠI">
                    <a href="index.php?act=listsp"><input class="border-[1px] border-solid border-[#ccc] p-2  hover:bg-blue-600 hover:text-[#fff] rounded ml-[20px] mb-[20px]"type="button" value="DANH SÁCH"></a>
                </div>
                <?php
                // Thông báo thêm thành công
                    if(isset($thongbao) && $thongbao !=""){
                        echo '<p class="text-[green] font-bold mb-4">'.$thongbao.'</p>';
                    }
                        
                    ?>
                </form>
            </div>
        </div>