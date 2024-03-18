<div class="text-center my-32">
    
    <div class="border-hidden text-[24px] font-bold">Đăng ký thành viên</div>
    <div class="w-[400px] m-auto">
    <div class="my-2">
      <form action="index1.php?act=dangky" method="post">
          <div>
          <p class="text-left font-bold">Email</p>
          <input type="email" name="email" placeholder="Email" value="<?php if(isset($email)) echo $email ?>" class="block border-[1px] border-solid border-[#ccc] w-full py-2 outline-none" >
          <?php if(!empty($error['email'])){
                            echo "<p class='thongbao font-bold text-[red]'>{$error['email']}</p>";
                        } ?>
          </div>
          <div>
          <p class="text-left font-bold mt-4 ">Tên tài khoản</p>
          <input type="text" name="user"  placeholder="Tên tài khoản" value="<?php if(isset($user)) echo $user ?>" class="block border-[1px] border-solid border-[#ccc] w-full py-2 outline-none" >
          <?php if(!empty($error['user'])){
                            echo "<p class='thongbao font-bold text-[red]'>{$error['user']}</p>";
                        } ?>
          </div>
          <p class="text-left font-bold mt-4 mb-[-14px]">Mật khẩu</p>
          <div>
          <input type="password" name="pass"  placeholder="Password" value="<?php if(isset($pass)) echo $pass ?>" class="block border-[1px] border-solid border-[#ccc] w-full py-2 outline-none my-4" >
          <?php if(!empty($error['pass'])){
                            echo "<p class='thongbao my-[-14px] font-bold text-[red]'>{$error['pass']}</p>";
                        } ?>
          </div>
         <!-- Thêm trường Địa chỉ -->
         <div>
                    <p class="text-left font-bold mt-4">Địa chỉ</p>
                    <input type="text" name="diachi"  placeholder="Địa chỉ" value="<?php if(isset($diachi)) echo $diachi ?>" class="block border-[1px] border-solid border-[#ccc] w-full py-2 outline-none">
                    <?php if(!empty($error['diachi'])){
                        echo "<p class='thongbao font-bold text-[red]'>{$error['diachi']}</p>";
                    } ?>
        </div>
        <!-- Thêm trường Số điện thoại -->
        <div>
            <p class="text-left font-bold mt-4">Số điện thoại</p>
            <input type="text" name="sdt"  placeholder="Số điện thoại" value="<?php if(isset($sdt)) echo $sdt ?>" class="block border-[1px] border-solid border-[#ccc] w-full py-2 outline-none">
            <?php if(!empty($error['sdt'])){
                echo "<p class='thongbao font-bold text-[red]'>{$error['sdt']}</p>";
            } ?>
        </div>
          <input type="submit" value="Đăng ký" name="dangky" class="bg-[#c51230] text-[#fff] w-full py-2 hover:opacity-80 mt-4">
          <input type="reset" value="Nhập lại" class=" my-4 bg-[#c51230] text-[#fff] w-full py-2 hover:opacity-80">
      </form>
      <?php
          if(isset($thongbao)&&($thongbao!="")){
            echo '<p class="text-[green] font-bold">'.$thongbao.'</p>';
          }
      ?>
 </div>
 </div>
  
</div>
