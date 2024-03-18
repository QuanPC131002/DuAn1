<?php
function insert_taikhoan($email,$user,$pass,$diachi,$sdt){
    $sql="INSERT INTO `user` ( `user`, `email`, `pass`, `diachi`, `sdt`) VALUES ( '$user', '$email','$pass','$diachi','$sdt'); ";
    pdo_execute($sql);
}
function delete_taikhoan($id_user){
    $sql = "DELETE FROM user WHERE `user`.`id_user` = {$id_user}";
    pdo_execute($sql);
}
function checkuser($user,$pass){
    $sql="select * from user where user='".$user."' AND pass='".$pass."'" ;
    $sp=pdo_query_one($sql);
    return $sp;
}
function update_taikhoan($id_user,$user,$pass,$email,$diachi,$sdt){
    $sql=  "UPDATE `user` SET `user` = '{$user}', `pass` = '{$pass}', `email` = '{$email}', `diachi` = '{$diachi}',  `sdt` = '{$sdt}' WHERE `user`.`id_user` = $id_user";
    pdo_execute($sql);
}
function checkemail($email){
    $sql="select * from user where `email`='".$email."'";
    $sp=pdo_query_one($sql);
    return $sp;
}
function loadall_taikhoan(){
    $sql="select * from user order by id_user desc";
    $listtaikhoan=pdo_query($sql);
    return  $listtaikhoan;
}

?>