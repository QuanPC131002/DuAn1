<div class="mb my-32 ">
              <div class="box_title text-[24px] text-center font-bold my-4">TÀI KHOẢN</div>
              <div class=" text-center w-[400px] m-auto ">
                <?php
                if(isset($_SESSION['user'])){
                  extract($_SESSION['user']);
                    ?>
                     <h2 class="text-[20px] inline-block">Xin Chào</h2>
                 <strong class="text-[red] text-[24px]"><?=$user?> </strong>
                 
                 <li class="hover:text-[red] text-center">
                  <a href="index1.php?act=quenmk">Quên mật khẩu</a>
                </li>
                 <li class="hover:text-[red] text-center">
                  <a href="index1.php?act=edit_taikhoan">Cập nhật tài khoản</a>
                </li>
                <?php 
                 if($role==1){
                ?>
                <li class="hover:text-[red] text-center">
                  <a href="admin-duan1/index.php">Đăng nhập admin</a>
                </li>
                <?php }?>
                <li class="hover:text-[red] text-center">
                  <a href="index1.php?act=thoat">Thoát </a>
                </li>
                    <?php
                }else{
                ?>
                <div class="w-[400px] m-auto">
                  <form action="index1.php?act=dangnhap" method="POST">
                    <div class="my-4">
                  <h4 class="text-left text-[20px] mb-[-20px] font-bold">Tên đăng nhập</h4><br>
                  <input type="text" name="user" value="<?php if(isset($user)) echo $user ?>" class="block border-[1px] border-solid border-[#ccc] w-full py-2 outline-none">
                  <?php if(!empty($error['user'])){
                            echo "<p class='thongbao font-bold text-[red]'>{$error['user']}</p>";
                        } ?>
                  </div>
                  <div class="">
                  <h4 class="text-left text-[20px] mb-[-20px] font-bold">Mật khẩu</h4><br>
                  <input type="password" name="pass" value="<?php if(isset($pass)) echo $pass ?>" class="block border-[1px] border-solid border-[#ccc] w-full py-2 outline-none"><br>
                  <?php if(!empty($error['pass'])){
                            echo "<p class='thongbao font-bold text-[red]'>{$error['pass']}</p>";
                        } ?>
                  </div>
                  <br><input type="submit" value="Đăng nhập" name="dangnhap" class="mt-[-10px] bg-[#c51230] text-[#fff] w-full py-2 hover:opacity-80">
                  <!-- <input type="checkbox" name="" id="" class="hover:text-[red]">Ghi nhớ tài khoản? -->
                 <li class="form_li hover:text-[red]"><a href="index1.php?act=quenmk">Quên mật khẩu</a></li>
                 <li class="form_li hover:text-[red]"><a href="index1.php?act=dangky">Đăng kí thành viên</a></li>
                </form>
                <?php
                    if(isset($thongbao)&&($thongbao!="")){
                      echo '<p class="text-[red] font-bold">'.$thongbao.'</p>';
                    }
                ?>
                </div>
               <?php }?>
              </div>
           </div>