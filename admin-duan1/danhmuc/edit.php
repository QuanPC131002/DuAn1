<?php
// kiểm tra sự tồn tại của mảng -> show mảng
    if(is_array($dm)){
        extract($dm);
    }
?>
<div class="row mx-[20px]">
            <div class=" alert alert-info"><h1 class="font-bold text-[20px]">CẬP NHẬT LOẠI HÀNG HÓA</h1></div>
            <div class="row formcontent">
                <form   action="index.php?act=updatedm" method="POST">
                    
                <!-- Nếu tồn tại tên danh mục và tên danh mục khác rỗng -> echo ra tên danh mục đó -->
                <div class="row mb10">
                    <label class="font-bold text-[18px]" for="">Tên loại</label><br>
                    <input class="mt-[20px] ml-[10px]  text-xl  border-[1px] border-solid border-[#ccc] w-full p-2 rounded" type="text" name="tendanhmuc" value="<?php if(isset($tendanhmuc) && ($tendanhmuc != "")) echo $tendanhmuc ?>"><br>
                    <!-- validate -->
                    <?php if(!empty($error['tendanhmuc'])){
                            echo "<p class='thongbao font-bold text-[red] ml-2'>{$error['tendanhmuc']}</p>";
                        } ?>
                </div>
                <div class="mt-[20px] ml-[-20px]">
                    <!-- Nếu tồn tại id danh mục và id danh mục > 0 -> echo ra tên danh mục đó -->
                    <!-- Input hidden để lưu id  -->
                    <input type="hidden" name="id_danhmuc" value="<?php if(isset($id_danhmuc)&&($id_danhmuc > 0)) echo $id_danhmuc ?>">
                    <input class="text-black border-[1px] border-solid border-[#ccc] w-[100px]  w-[100px] p-2 hover:bg-blue-600 hover:text-[#fff] ml-[20px] mb-[20px]" type="submit" value="CẬP NHẬT" name="capnhat"  onclick="alert('Cập nhật thành công!')" >
                    <input class="text-black border-[1px] border-solid border-[#ccc] w-[100px]  w-[100px] p-2 hover:bg-blue-600 hover:text-[#fff] ml-[20px] mb-[20px]"type="reset" value="NHẬP LẠI">
                    <a href="index.php?act=listdm"><input class="text-black border-[1px] border-solid border-[#ccc] w-[100px]  w-[100px] p-2 hover:bg-blue-600 hover:text-[#fff] ml-[20px] mb-[20px]"type="button" value="DANH SÁCH"></a>
                </div>
                <?php
                // Thông báo thêm thành công
                    if(isset($thongbao) && $thongbao !=""){
                        echo '<p class="text-[green] font-bold">'.$thongbao.'</p>';
                    }
                        
                    ?>
                </form>
            </div>
            </div>
</div>