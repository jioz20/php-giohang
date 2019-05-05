<?php 
include_once 'class/xl_sanpham.php';
class xl_giohang 
{
	function phatgiohang()
	{
		//tao session : gio hang
		if(!isset($_SESSION['giohang']))
			$_SESSION['giohang'] = array();
	}
	function muahang()
	{
		//lay cai mã san pham tren link
		if(isset($_GET['ma']) && $_GET['ma'])
		{
			//lay san pham tu he thong luu tru
			$ma = $_GET['ma'];
			$dtsp = new xl_sanpham();
			$sanpham = $dtsp->chitiet($ma);

			//check san pham  hop le
			if($sanpham && $sanpham->SoLuongTon >0)
			{
				if(!isset($_SESSION['giohang'][$sanpham->MaSanPham])){
					//them vao gio hang
					$sanphammua = array(
						'ma'=>$sanpham->MaSanPham,
						'ten'=>$sanpham->TenSanPham,
						'gia'=>$sanpham->GiaSanPham,
						'hinh'=>$sanpham->HinhURL,
						'soluong'=>1
					);
					$_SESSION['giohang'][$sanpham->MaSanPham] = $sanphammua;
				}else
				{
					$_SESSION['giohang'][$sanpham->MaSanPham]['soluong']+=1;
				}
				return true;
			}
			else
			{
				// thong bao hoăc tra ve false
				return false;
			}
			
		}else
		{
			// thong bao hoăc tra ve false
			return false;
			
		}
		
	}
	function xoasanpham()
	{
		//lay cai mã san pham tren link
		if(isset($_GET['ma']) && $_GET['ma'])
		{			
			
			if(isset($_SESSION['giohang'][$_GET['ma']])){				
				//xoa 
				unset($_SESSION['giohang'][$_GET['ma']]);
				return true;			
			}else
			{
				return false;
			}
		}else
		{
			// thong bao hoăc tra ve false
			return false;
			
		}
		
	}
	function doisoluong()
	{
		//lay cai mã san pham tren link
		if(isset($_POST['soluong']) && $_POST['soluong'] && is_array($_POST['soluong']))
		{			
			foreach($_POST['soluong'] as $ma=>$soluong)
				$_SESSION['giohang'][$ma]['soluong'] = $soluong;
			return true;
		}else
		{
			// thong bao hoăc tra ve false
			return false;
			
		}
		
	}
	function countcart()
	{
		if(isset($_SESSION['giohang']))
			return count($_SESSION['giohang']);
		return 0;
	}
}
?>