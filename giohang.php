<?php 
session_start();
include 'class/database.php';
include 'class/xl_sanpham.php';
include 'class/xl_donhang.php';
include 'class/xl_giohang.php';
if(isset($_POST['soluong']))
{
	$dtgh  = new xl_giohang();
	if($dtgh->doisoluong())
	{
		echo 'cap nhat thanh cong';
	}else
	{
		echo 'cap nhat khong thanh cong';
	}
}
?>

<form method="post">
<table width="800px" align="center" cellpadding="10" cellspacing="0" border="1" style="border-collapse:collapse"> 
    <tr>
		<td>Mã</td>    
        <td>Sản phẩm</td>    
        <td>Giá</td>    
        <td>Số lượng</td>
        <td>Thành tiền</td>
        <td><button name="capnhat">Cập nhật</button></td>    
    </tr>
	<?php
	$tong = 0;


foreach($_SESSION['giohang'] as $item)
{
	$tt = $item['soluong']*$item['gia'];
	$tong +=$tt;
	?>
         <tr>
		<td><?=$item['ma']?></td>    
        <td><img src="img/sp.jpg" width="25" /> <?=$item['ten']?></td>    
        <td><?=$item['gia']?></td>    
        <td><input name="soluong[<?=$item['ma']?>]" value="<?=$item['soluong']?>" /></td>
         <td align="right"><?=$tt?></td> 
        <td><a href="xoahang.php?ma=<?=$item['ma']?>">Xoá</a></td>    
    </tr>
<?php } ?>
         <tr>		
         <td colspan="5" align="right">Tổng: <?=$tong?></td> 
         <td>&nbsp;</td>        
    </tr>
    
</table>
</form>
<div style="text-align:right;width:800px">
<a href="index.php">Mua tiếp</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="thanhtoan.php">Thanh toán</a>
</div>