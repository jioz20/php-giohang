<?php 
session_start();
include 'class/database.php';
include 'class/xl_sanpham.php';
include 'class/xl_donhang.php';
include 'class/xl_giohang.php';
$xl_sanpham = new xl_sanpham();
$xl_giohang = new xl_giohang();
$xl_giohang->phatgiohang();
$ds = $xl_sanpham->ds();
//var_dump($_SESSION);
// echo '<pre>';
// print_r($ds);
// echo '</pre>';



?>
<div style="text-align:right;position:relative"><a href="giohang.php"><img src="img/gh.jpg"/><span style="position:absolute;color:#f00;font-weight:bold;right:55px;font-size:30px"><?=$xl_giohang->countcart()?></span></a></div>
<div style="overflow:hidden">
<?php 
foreach($ds as $item){
?>
	<div style="float:left;width:200;margin:15px ">
		<img src="img/sp.jpg" width="150"/>
        <h3><?=$item->TenSanPham;?></h3>
        <span><?=$item->GiaSanPham;?></span>
        <a href="dathang.php?ma=<?=$item->MaSanPham?>" style="text-decoration:none;border:1px solid #F00;border-radius:4px;display:block;width:50px;padding:2px">Mua</a>
	</div>
  <?php } ?> 
</div>