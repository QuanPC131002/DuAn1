<?php
 function loadAll_thongke(){
    $sql = "select danhmuc.id_danhmuc as madm, danhmuc.tendanhmuc as tendm, count(product.id_product) as countsp, min(product.gia) as mingia, max(product.gia) as maxgia, avg(product.gia) as avggia
    from product left join danhmuc on danhmuc.id_danhmuc=product.id_danhmuc 
    group by danhmuc.id_danhmuc
    order by danhmuc.id_danhmuc desc";
    $listthongke=pdo_query($sql);
    return $listthongke;
}
?>