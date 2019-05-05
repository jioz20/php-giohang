<?php 
class xl_sanpham extends database
{
	function ds()
	{
		$this->setquery('select * from sanpham limit 0,10');
		return $this->loadrows();
	}
	function chitiet($id)
	{
		$this->setquery('select * from sanpham where masanpham=? and bixoa=0');
		return $this->loadrow(array($id));
	}
}
?>