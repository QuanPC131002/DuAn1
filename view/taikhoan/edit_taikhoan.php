<div class="my-32">
    
    <div class="text-[24px] text-center font-bold">Cập nhật tài khoản</div>
    <div class="w-[400px] m-auto text-left">
        <?php
        if(isset($_SESSION['user']) && (is_array($_SESSION['user']))){
            extract($_SESSION['user']);
        }
        ?>
      <form action="index1.php?act=edit_taikhoan" method="post">
        <div>
        <p class=" font-bold">Email</p>
        <input type="email" name="email" value="<?=$email?>" placeholder="email" class="block border-[1px] border-solid border-[#ccc] w-full py-2 outline-none">
        <?php if(!empty($error['email'])){
                            echo "<p class='thongbao font-bold text-[red]'>{$error['email']}</p>";
                        } ?> 
        </div>
        <div>
        <p class="font-bold">Tên đăng nhập</p>
        <input type="text" name="user" value="<?=$user?>"  placeholder="Tên tài khoản" class="block border-[1px] border-solid border-[#ccc] w-full py-2 outline-none" disabled>
        <input type="hidden" name="user" value="<?=$user?>"> <!-- Thêm input ẩn để giữ nguyên tên tài khoản -->
        </div>
        <p class="mt-2  font-bold">Mật khẩu</p>
        <div>
        <input type="password" name="pass" value="<?=$pass?>"  placeholder="pass" class="block border-[1px] border-solid border-[#ccc] w-full py-2 outline-none">
        <?php if(!empty($error['pass'])){
                            echo "<p class='thongbao font-bold text-[red]'>{$error['pass']}</p>";
                        } ?>  
        </div>
        <p class="mt-2  font-bold">Địa chỉ</p>
        <div>
        <input type="text" name="diachi" value="<?=$diachi?>"  placeholder="address" class="block border-[1px] border-solid border-[#ccc] w-full py-2 outline-none">
        <?php if(!empty($error['diachi'])){
                            echo "<p class='thongbao font-bold text-[red]'>{$error['diachi']}</p>";
                        } ?> 
        </div>
        <p class="mt-2  font-bold">Điện thoại</p>
        <div>
        <input type="text" name="sdt" value="<?=$sdt?>"  placeholder="tel" class="block border-[1px] border-solid border-[#ccc] w-full py-2 outline-none">
        <?php if(!empty($error['sdt'])){
                            echo "<p class='thongbao font-bold text-[red]'>{$error['sdt']}</p>";
                        } ?> 
        </div>
        <input type="hidden" name="id_user" value="<?=$id_user?>">
        <input type="submit" value="Cập nhật" name="capnhat" class="bg-[#c51230] text-[#fff] w-full py-2 hover:opacity-80 my-4">
        <input type="reset" value="Nhập lại" class="bg-[#c51230] text-[#fff] w-full py-2 hover:opacity-80">
      </form>
      <?php
      if(isset($thongbao)&&($thongbao!="")){
        echo '<p class="text-[red] font-bold">'.$thongbao.'</p>';
      }
      ?>
 </div>
  
</div>
