<?php
// Thêm danh mục
function insert_danhmuc($tendanhmuc){
    $sql = "INSERT INTO `danhmuc` ( `tendanhmuc`) VALUES  ( '$tendanhmuc');";
    pdo_execute($sql);
}
// Load tất cả danh mục
function loadAll_danhmuc(){
    $sql = "SELECT * FROM `danhmuc` order by id_danhmuc desc";
    $listdanhmuc = pdo_query($sql);
    return $listdanhmuc;
}
// Xóa danh mục
function delete_danhmuc($id_danhmuc){
    $sql = "DELETE FROM danhmuc WHERE `danhmuc`.`id_danhmuc` = $id_danhmuc";
    pdo_execute($sql);
}
// Load 1 danh mục
function loadOne_danhmuc($id_danhmuc){
    $sql = "select * from danhmuc where id_danhmuc=".$id_danhmuc;
    $dm=pdo_query_one($sql);
    return $dm;
}
// Cập nhật danh mục
function update_danhmuc($id_danhmuc,$tendanhmuc){
    $sql = "UPDATE `danhmuc` SET `tendanhmuc` = '$tendanhmuc' WHERE `danhmuc`.`id_danhmuc` = $id_danhmuc";
    pdo_query($sql);
}
?>