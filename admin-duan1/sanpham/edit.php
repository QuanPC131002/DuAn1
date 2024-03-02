<?php
// Kiểm tra xem có phải mảng không -> dùng extract dể show dữ liệu
    if(is_array($sp)){
        extract($sp);
    }
// Kiểm tra sự tồn tại của file ảnh
    $anhpath="../upload/".$anh;
    if(is_file($anhpath)){
        $anh="<img src='".$anhpath."' height = '80px'>";
            }else{
                $anh="Không có ảnh";
            }
?>
<div class="row mx-[20px]">
            <div class="row formtitle alert alert-info"><h1 class="font-bold text-[20px]">CẬP NHẬT HÀNG HÓA</h1></div>
            <div class="row formcontent">
                <form action="index.php?act=updatesp" method="POST" enctype="multipart/form-data">
                <div class="row mb10 my-4">
                    <label for="" class="font-bold">Tên loại</label><br>
                    <select name="id_danhmuc"  class="border-[1px] border-solid border-[#ccc] ">
                            <?php
                                foreach($listdanhmuc as $danhmuc){
                                    extract($danhmuc);
                                    if($id_danhmuc == $id_danhmuc) $s = "selected"; $s = "";
                                    echo '<option value="'.$id_danhmuc.'">'.$tendanhmuc.'</option>';
                                }
                            ?>
                            
                        </select>
                </div>
                <div class="row mb10 my-4">
                    <label for="" class="font-bold">Tên sản phẩm</label><br>
                    <input type="text"name="tensp" value="<?=$tensp ?>" class="border-[1px] border-solid border-[#ccc] py-2"><br>
                    <?php if(!empty($error['tensp'])){
                            echo "<p class='thongbao text-[red] ml-[20px] font-bold'>{$error['tensp']}</p>";
                        } ?>
                </div>
                <div class="row mb10 my-4">
                    <label for="" class="font-bold">Ảnh sản phẩm</label><br>
                    <input type="file" name="anh" ><br>
                    <div class="w-[150px] h-[120px]"><?=$anh ?></div>
                    <?php if(!empty($error['anh'])){
                            echo "<p class='thongbao text-[red]  font-bold'>{$error['anh']}</p>";
                        } ?>
                </div>
                <div class="row mb10 my-4">
                    <label for="" class="font-bold">Giá thành sản phẩm</label><br>
                    <input type="text" name="gia" value="<?=$gia ?>" class="border-[1px] border-solid border-[#ccc] py-2"><br>
                    <?php if(!empty($error['gia'])){
                            echo "<p class='thongbao text-[red] ml-[20px] font-bold'>{$error['gia']}</p>";
                        } ?>
                </div>
               
                <div class="row mb my-4">
                        <p class="font-bold">Mô tả</p>
                        <textarea name="mota" class="w-[400px] min-h-[200px] border-[1px] border-solid border-[#ccc]" cols="30" rows="10"><?=$mota ?></textarea>
                        
                    </div>
                <div class="row mb10 ">
                    <input type="hidden" name="id_product" value="<?=$id_product?>">
                    <input class="text-black border-[1px] border-solid border-[#ccc] w-[100px]  w-[100px] p-2 hover:bg-blue-600 hover:text-[#fff] mb-[20px]" type="submit" value="CẬP NHẬT" name="capnhat" onclick="alert('Cập nhật thành công!')">
                    <input class="text-black border-[1px] border-solid border-[#ccc] w-[100px]  w-[100px] p-2 hover:bg-blue-600 hover:text-[#fff] ml-[20px] mb-[20px]"type="reset" value="NHẬP LẠI">
                </div>
                <?php
                    if(isset($thongbao) && $thongbao !=""){
                        echo '<p class="text-[green] font-bold mb-4">'.$thongbao.'</p>';
                    }
                        
                    ?>
                </form>
            </div>
        </div>