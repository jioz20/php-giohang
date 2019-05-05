<?php 
session_start();
if(isset($_GET['ma'])){
	include 'class/database.php';
	include 'class/xl_giohang.php';
	$xl_giohang = new xl_giohang();
	if($xl_giohang->muahang())
	{
		header('location: giohang.php');
	}
	else
		header('location: index.php');
}
else
	header('location: index.php');