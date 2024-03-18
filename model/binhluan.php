<?php
function insert_binhluan($noidung,$id_user,$id_product,$ngaybinhluan){
    $sql ="INSERT INTO `binhluan` ( `noidung`, `id_user`, `id_product`, `ngaybinhluan`) VALUES ( '$noidung', '$id_user', '$id_product', '$ngaybinhluan');";
    pdo_execute($sql);
}
function delete_binhluan($id_bl){
    $sql = "DELETE FROM binhluan WHERE `binhluan`.`id_bl` = {$id_bl}";
    pdo_execute($sql);
}
function load_binhluan($id_product){
    $sql = "select * from binhluan where id_product='".$id_product."' order by id_bl desc";
    $listbinhluan=pdo_query($sql);
    return $listbinhluan;
}
function loadAll_binhluan($id_sp){
    $sql="select * from binhluan where 1";
    if($id_sp>0){

        $sql.=" AND id_sp='".$id_sp."'";
    }else{

        $sql.=" order by id_bl desc";
    }
    $listbinhluan=pdo_query($sql);
    return $listbinhluan;
    

}
?>