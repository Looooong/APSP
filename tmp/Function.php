<?php 
include "inc/database.class.php";
require_once "inc/config.php";


if($_GET['mod']=='addrow'){
	if($_POST['name']!="" && $_POST['quyen'] != "" && $_POST['ma'] != ""){
		$name=$_POST['name'];
		$en = $_POST['tanh'];
		$vi = $_POST['tviet'];
		$ch = $_POST['tch'];
		$quyen = $_POST['quyen'];
		$ma = $_POST['ma'];
		$query = "INSERT INTO menus(name,en,vi,ch,level,code) VALUES(N'$name','N$en',N'$vi',N'$ch','$quyen',N'$ma')";
		$db->querySql($query);
	//	echo $query;
		echo "Insert thanh cong";
		
		}
			else
				{
					echo '"Xin vui lòng nhập đầy đủ thông tin!';
				}
}
if($_GET['mod']=='addrowu'){
	if($_POST['name']!="" && $_POST['pword'] != "" ){
		$name=$_POST['name'];
		$pword = md5($_POST['pword']);
		$query = "INSERT INTO users(name,password) VALUES('$name','$pword')";
		$db->querySql($query);
	//	echo $query;
		echo "Insert thanh cong";
		}
			else
				{
					echo '"Xin vui lòng nhập đầy đủ thông tin!';
				}
}
if($_GET['mod']=='editrow'){
	if($_POST['name'] != "" && $_POST['quyen']!= "" && $_POST['ma'] != ""){
		$id = $_POST['idmenu'];
		$name =$_POST['name'];
		$en = $_POST['tanh'];
		$vi = $_POST['tviet'];
		$quyen = $_POST['quyen'];
		$code = $_POST['ma'];
		//$giokhoihanh = date("H:i:s",strtotime($giokhoihanh)) GioKhoiHanh='$giokhoihanh' ,;
		$query = "UPDATE menus SET name = N'$name', en = N'$en', vi = N'$vi', level = '$quyen', code = N'$code' WHERE menuID='".$id."'";
		$db->querySql($query);
		echo "Update Thanh Cong";
		
	}
	else{
		Die('Thieu thong tin');	
	}
}
if($_GET['mod']=='editrowu'){
		$id = $_POST['iduser'];
		$pword =md5($_POST['pword']);
		$query = "UPDATE users SET password = '$pword' WHERE userID='".$id."'";
		$db->querySql($query);
		echo "Update Thanh Cong";
		}
if($_GET['mod']=='xoaf'){
 if(isset($_POST['xoa'])){
  $id = $_POST['idmenu']; 
  $query = "DELETE FROM menus WHERE menuID='".$id."'";
  $db->querySql($query);
 
 }
 else{
  die('ThieuThongTin'); 
 }
}
if($_GET['mod']=='xoafu'){
 if(isset($_POST['xoa'])){
  $id = $_POST['iduser']; 
  $query = "DELETE FROM permiision WHERE userID='".$id."'";
  $db->querySql($query);
  $query = "DELETE FROM users WHERE userID='".$id."'";
  $db->querySql($query);
  echo "Xoa Thanh Cong";
 }
 else{
  die('ThieuThongTin'); 
 }
}
?>
