<?php
// Thêm sản phẩm
function insert_sanpham($tensp,$gia,$mota,$id_danhmuc,$anh){
    $sql = "INSERT INTO `product` ( `tensp`, `gia`,  `mota`, `id_danhmuc`, `anh`) VALUES ( '$tensp', '$gia', '$mota', '$id_danhmuc', '$anh')";
    pdo_execute($sql);
}
// Load tất cả sản phẩm
function loadAll_sanpham(){
    $sql = "SELECT * FROM `product` order by id_product desc";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
// Load sản phẩm lên trang chủ
function loadAll_sanpham_home(){
    $sql = "select * from product where 1 order by id_product desc limit 0,12"; // lấy 9 sản phẩm mới nhất
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
// Load sản phẩm lên trag sản phẩm
function loadAll_sanpham_sp(){
    $sql = "select * from product where 1 order by id_product desc limit 0,30"; // lấy 30 sản phẩm mới nhất
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
// Sản phẩm yêu thích
function loadAll_sanpham_top10(){
    $sql = "select * from product where 1 order by id_product desc limit 0,5"; // lấy 10 sản phẩm mới nhất
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
// Sản phẩm cùng loại
function load_sanpham_cungloai($id_product,$id_danhmuc){
    $sql = "select * from product where id_danhmuc=".$id_danhmuc."  AND id_product <>".$id_product;
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
// Load sản phẩm theo danh mục
function loadAll_sanpham_danhmuc($kyw,$id_danhmuc){
    $sql = "select * from product where 1"; 
    // load sp theo keyword
    // sp có những từ giống keyword nhập -> show
    if($kyw!=""){
        $sql.=" and tensp like '%".$kyw."%'";
    }
    if($id_danhmuc>0){
        $sql.=" and id_danhmuc ='".$id_danhmuc."'";
    }
    $sql.=" order by id_danhmuc desc";
    $listdanhmuc = pdo_query($sql);
    return $listdanhmuc;
}
// Xóa sản phẩm
function delete_sanpham($id_product){
    $sql = "DELETE FROM product WHERE `product`.`id_product` = $id_product";
    pdo_execute($sql);
}
// load tên của danh mục ở trang danh mục
function load_ten_dm($id_danhmuc){
    if($id_danhmuc > 0){

        $sql = "SELECT * FROM danhmuc where `id_danhmuc`= $id_danhmuc";
        $dm=pdo_query_one($sql);
        extract($dm);
        return $tendanhmuc;
    }else{
        return "";
    }
}
// Load 1 sản phẩm
function loadOne_sanpham($id_product){
    $sql = "SELECT * FROM product where `id_product`= $id_product";
    $sp=pdo_query_one($sql);
    return $sp;
}
// Cập nhật sản phẩm
// Nếu có ảnh thì hiển thị để sửa <> Không thì thôi
function update_sanpham($tensp,$anh,$gia,$id_danhmuc,$mota,$id_product){
    if($anh!=""){
        $sql ="UPDATE product set id_danhmuc='".$id_danhmuc."', tensp='".$tensp."',gia='".$gia."',mota='".$mota."',anh='".$anh."' where id_product=".$id_product ;
    }else{
        $sql ="UPDATE product set id_danhmuc='".$id_danhmuc."', tensp='".$tensp."',gia='".$gia."',mota='".$mota."' where id_product=".$id_product ;
    }
    pdo_execute($sql);
    
}
?>