<?php
class quanly
{ 
 function themnv()
			{
			global $db;
			//echo 'a';
			$dir = "upload/nhanvien/";// no cung cap voi class ma .. deo gi test di
			$kieuFile=array('image/gif','image/jpeg','image/pjpeg','image/png','');
			$maxsize = 20*1024*1024; //20MB 
			$type = $_FILES['file']["type"];
			$size = $_FILES['file']["size"]; //Tinh bang byte
			$name = strip_tags($_FILES['file']["name"]);
			$tmp_name = $_FILES['file']["tmp_name"];
			
			if (in_array($type,$kieuFile)==false) die ("Kiểu file này không được chấp nhận");
			if ($size > $maxsize) die ("Kích thước file quá lớn");
			//if (file_exists($dir.$name)) die($name." đã có rồi");      
			$url = $dir . $name; 
			move_uploaded_file($tmp_name, $url);// lenh nay Sam ko hieu, roi sao google
			$hinhanh = "upload/nhanvien/".$name;
			//Tiếp nhận dữ liệu từ form may cai nay dung chua la sao 
			$maNV = $_POST['maNV'];
			$hoTen = $_POST['hoTen'];
			$tenThuongGoi = $_POST['tenThuongGoi'];
			$gioitinh = $_POST['gioitinh'];
			$namSinh = $_POST['namSinh'];
			$nguyenQuan = $_POST['nguyenQuan'];
			$qtID = $_POST['qtID'];
			$dtID = $_POST['dtID'];
			$tgID = $_POST['tgID'];
			$cMND = $_POST['cMND'];	
			$ngayCap = $_POST['ngayCap'];
			$noiCap = $_POST['noiCap'];
			$hoKhau = $_POST['hoKhau'];
			$diaChi = $_POST['diaChi'];
			$dienthoai = $_POST['dienthoai'];
			$diDong = $_POST['diDong'];
			$khanCap = $_POST['khanCap'];
			$sucKhoe = $_POST['sucKhoe'];
			$chieuCao = $_POST['chieuCao'];
			$canNang = $_POST['canNang'];
			$hnID = $_POST['hnID'];
			$vhID = $_POST['vhID'];
			$nhomID =$_POST['nhomID'];
			$bophanID =$_POST['bophanID'];

			$cmID = $_POST['cmID'];
			$ketnap = $_POST['ketnap'];
			$ngayGiaNhap = $_POST['ngayGiaNhap'];
			$noiKN = $_POST['noiKN'];
			$chucVuKN = $_POST['chucVuKN'];
			
			
			$aTM = $_POST['aTM'];
			$ghiChu = $_POST['ghiChu'];
			$voChong = $_POST['voChong'];
			$namSinhVC = $_POST['namSinhVC'];
			$ngheNghiep = $_POST['ngheNghiep'];
			$diaChiVC = $_POST['diaChiVC'];
			$soCon = $_POST['soCon'];
			$chiTietSC = $_POST['chiTietSC'];
			$ngayThuviec = $_POST['ngayThuviec'];
			$ngayKetThuc = $_POST['ngayKetThuc'];
			$ngayBatDau = $_POST['ngayBatDau'];
			$soHD = $_POST['soHD'];
			$soHDTV = $_POST['soHDTV'];

			$dangID = $_POST['dangID'];
			$cvID = $_POST['cvID'];
			$noiLamViec = $_POST['noiLamViec'];
			$luongCB = $_POST['luongCB'];
			$bacLuong = $_POST['bacLuong'];
			$hSTN = $_POST['hSTN'];
			$hSCV = $_POST['hSCV'];
			$com = $_POST['com'];
			$anNgoaiGio = $_POST['anNgoaiGio'];
			$xang = $_POST['xang'];
			$docHai = $_POST['docHai'];
			$chuyenCan = $_POST['chuyenCan'];
			$dMSL = $_POST['dMSL'];
			//$sLAD = $_POST['sLAD'];
			$sLCK = $_POST['sLCK'];
		/*	$nangLuong = $_POST['nangLuong'];
			$dieuChuyen = $_POST['dieuChuyen'];*/
			$soBHXH = $_POST['soBHXH'];
			$ngayCapBH = $_POST['ngayCapBH'];
			$noicapBH = $_POST['noicapBH'];
			$soBHYT = $_POST['soBHYT'];
			$quatrinhBH = $_POST['quatrinhBH'];
			$BHTN = $_POST['BHTN'];
			//$theoDoi = $_POST['theoDoi'];
			$ngayThoiViec = $_POST['ngayThoiViec'];
			$soQuyetDinh = $_POST['soQuyetDinh'];
			$ngayQuyetDinh = $_POST['ngayQuyetDinh'];
		
			$giamtru = $_POST['giamtru'];

			//Kiểm tra dữ liệu đã nhận
			settype($qtID,"int");
			
			settype($dtID,"int");		
			settype($tgID,"int");
			settype($cMND,"int");
			settype($dienthoai,"int");
			settype($didong,"int");
			settype($chieuCao,"int");		
			settype($canNang,"int");
			settype($hnID,"int");
			settype($vhID,"int");
			settype($cmID,"int");
			settype($ketnap,"int");
			settype($aTM,"int");		
			settype($soCon,"int");
			
			settype($cvID,"int");
			settype($luongCB,"int");
			settype($bacLuong,"int");		
			settype($com,"int");
			settype($anNgoaiGio,"int");
			settype($xang,"int");
			
			settype($docHai,"int");
			settype($chuyenCan,"int");
			settype($phuCap,"int");
			//settype($nangLuong,"int");
			settype($giamtru,"int");

			$NamSinh_arr = explode("/",$namSinh); //  
			if (count($NamSinh_arr)==3) { 
				$d = $NamSinh_arr[0]; //17 
				$m = $NamSinh_arr[1]; //11 
				$y = $NamSinh_arr[2]; //2010
			if (checkdate($m,$d,$y)==false) $namSinh == NULL; 
			else $namSinh = "'".$y."-".$m."-".$d."'"; 
			} 
			else $namSinh = (empty($namSinh)) ? "NULL" : "'".date("Y-m-d")."'";
			
			
			$NgayGiaNhap_arr = explode("/",$ngayGiaNhap); //  
			if (count($NgayGiaNhap_arr)==3) { 
				$d = $NgayGiaNhap_arr[0]; //17 
				$m = $NgayGiaNhap_arr[1]; //11 
				$y = $NgayGiaNhap_arr[2]; //2010
			if (checkdate($m,$d,$y)==false) $ngayGiaNhap == NULL; 
			else $ngayGiaNhap = "'".$y."-".$m."-".$d."'"; 
			} 
			else $ngayGiaNhap = (empty($ngayGiaNhap)) ? "NULL" : "'".date("Y-m-d")."'";
			
			$NamSinhVC_arr = explode("/",$namSinhVC); //  
			if (count($NamSinhVC_arr)==3) { 
				$d = $NamSinhVC_arr[0]; //17 
				$m = $NamSinhVC_arr[1]; //11 
				$y = $NamSinhVC_arr[2]; //2010
			if (checkdate($m,$d,$y)==false) $namSinhVC == NULL; 
			else $namSinhVC = "'".$y."-".$m."-".$d."'"; 
			} 
			else $namSinhVC = (empty($namSinhVC)) ? "NULL" : "'".date("Y-m-d")."'";
			
			$NgayThuviec_arr = explode("/",$ngayThuviec); //  
			if (count($NgayThuviec_arr)==3) { 
				$d = $NgayThuviec_arr[0]; //17 
				$m = $NgayThuviec_arr[1]; //11 
				$y = $NgayThuviec_arr[2]; //2010
			if (checkdate($m,$d,$y)==false) $ngayThuviec == NULL; 
			else $ngayThuviec = "'".$y."-".$m."-".$d."'"; 
			} 
			else $ngayThuviec = (empty($ngayThuviec)) ? "NULL" : "'".date("Y-m-d")."'";
			
			$NgayKetThuc_arr = explode("/",$ngayKetThuc); //  
			if (count($NgayKetThuc_arr)==3) { 
				$d = $NgayKetThuc_arr[0]; //17 
				$m = $NgayKetThuc_arr[1]; //11 
				$y = $NgayKetThuc_arr[2]; //2010
			if (checkdate($m,$d,$y)==false) $ngayKetThuc == NULL; 
			else $ngayKetThuc = "'".$y."-".$m."-".$d."'"; 
			} 
			else $ngayKetThuc = (empty($ngayKetThuc)) ? "NULL" : "'".date("Y-m-d")."'";
			
			$NgayBatDau_arr = explode("/",$ngayBatDau); //  
			if (count($NgayBatDau_arr)==3) { 
				$d = $NgayBatDau_arr[0]; //17 
				$m = $NgayBatDau_arr[1]; //11 
				$y = $NgayBatDau_arr[2]; //2010
			if (checkdate($m,$d,$y)==false) $ngayBatDau == NULL; 
			else $ngayBatDau = "'".$y."-".$m."-".$d."'"; 
			} 
			else $ngayBatDau = (empty($ngayBatDau)) ? "NULL" : "'".date("Y-m-d")."'";
			
			
			$NgayCap_arr = explode("/",$ngayCap); //  
			if (count($NgayCap_arr)==3) { 
				$d = $NgayCap_arr[0]; //17 
				$m = $NgayCap_arr[1]; //11 
				$y = $NgayCap_arr[2]; //2010
			if (checkdate($m,$d,$y)==false) $ngayCap == NULL; 
			else $ngayCap = "'".$y."-".$m."-".$d."'"; 
			} 
			else $ngayCap = (empty($ngayCap)) ? "NULL" : "'".date("Y-m-d")."'";
		
			$NgayCapBH_arr = explode("/",$ngayCapBH); //  
			if (count($NgayCapBH_arr)==3) { 
				$d = $NgayCapBH_arr[0]; //17 
				$m = $NgayCapBH_arr[1]; //11 
				$y = $NgayCapBH_arr[2]; //2010
			if (checkdate($m,$d,$y)==false) $ngayCapBH == NULL; 
			else $ngayCapBH = "'".$y."-".$m."-".$d."'"; 
			} 
			else $ngayCapBH = (empty($ngayCapBH)) ? "NULL" : "'".date("Y-m-d")."'";
			
			
			$SoBHYT_arr = explode("/",$soBHYT); //  
			if (count($SoBHYT_arr)==3) { 
				$d = $SoBHYT_arr[0]; //17 
				$m = $SoBHYT_arr[1]; //11 
				$y = $SoBHYT_arr[2]; //2010
			if (checkdate($m,$d,$y)==false) $soBHYT == NULL; 
			else $soBHYT = "'".$y."-".$m."-".$d."'"; 
			} 
			else $soBHYT = (empty($soBHYT)) ? "NULL" : "'".date("Y-m-d")."'";
			
			
			
			
			$NgayThoiViec_arr = explode("/",$ngayThoiViec); //  
			if (count($NgayThoiViec_arr)==3) { 
				$d = $NgayThoiViec_arr[0]; //17 
				$m = $NgayThoiViec_arr[1]; //11 
				$y = $NgayThoiViec_arr[2]; //2010
			if (checkdate($m,$d,$y)==false) $ngayThoiViec == NULL; 
			else $ngayThoiViec = "'".$y."-".$m."-".$d."'"; 
			} 
			else $ngayThoiViec = (empty($ngayThoiViec)) ? "NULL" : "'".date("Y-m-d")."'";
			
			
			$NgayQuyetDinh_arr = explode("/",$ngayQuyetDinh); //  
			if (count($NgayQuyetDinh_arr)==3) { 
				$d = $NgayQuyetDinh_arr[0]; //17 
				$m = $NgayQuyetDinh_arr[1]; //11 
				$y = $NgayQuyetDinh_arr[2]; //2010
			if (checkdate($m,$d,$y)==false) $ngayQuyetDinh == NULL; 
			else $ngayQuyetDinh = "'".$y."-".$m."-".$d."'"; 
			} 
			else $ngayQuyetDinh = (empty($ngayQuyetDinh)) ? "NULL" : "'".date("Y-m-d")."'";
			
			
			//chèn vào db		
			$query="INSERT INTO hosonv(maNV,hoTen,tenThuongGoi,gioitinh, namSinh, nguyenQuan, qtID, dtID, tgID, cMND, ngayCap, noiCap, hoKhau, diaChi, dienthoai , diDong, khanCap, sucKhoe, chieuCao, canNang, hnID, vhID, nhomID, bophanID,  cmID, ketnap, ngayGiaNhap, noiKN, chucVuKN, aTM, ghiChu, voChong, namSinhVC, ngheNghiep, diaChiVC ,soCon ,chiTietSC ,ngayThuviec ,ngayKetThuc ,ngayBatDau, soHD,soHDTV, dangID, cvID, noiLamViec, luongCB, bacLuong, hSTN, hSCV, anNgoaiGio, xang, docHai, chuyenCan, dMSL,  sLCK, soBHXH, ngayCapBH, noicapBH, soBHYT, quatrinhBH, BHTN,  ngayThoiViec, soQuyetDinh, ngayQuyetDinh,hinhanh,giamtru,com) 
			VALUES(N'maNV',N'$hoTen',N'$tenThuongGoi',N'$gioitinh',$namSinh, N'$nguyenQuan','$qtID', '$dtID', '$tgID', '$cMND', $ngayCap, N'$noiCap', N'$hoKhau', N'$diaChi', '$dienthoai','$diDong','$khanCap', N'$sucKhoe', '$chieuCao', '$canNang', '$hnID', '$vhID',  '$nhomID', '$bophanID','$cmID', '$ketnap', $ngayGiaNhap, N'$noiKN', N'$chucVuKN', '$aTM', N'$ghiChu', N'$voChong', $namSinhVC, N'$ngheNghiep', N'$diaChiVC' ,'$soCon' ,N'$chiTietSC',$ngayThuviec ,$ngayKetThuc ,$ngayBatDau, '$soHD','$soHDTV', '$dangID', '$cvID', N'$noiLamViec', '$luongCB', '$bacLuong', '$hSTN', '$hSCV', '$anNgoaiGio', '$xang', '$docHai', '$chuyenCan','$dMSL', N'$sLCK', '$soBHXH', $ngayCapBH, '$noicapBH', $soBHYT, '$quatrinhBH', N'$BHTN',$ngayThoiViec, '$soQuyetDinh', $ngayQuyetDinh,'$hinhanh','$giamtru','$com')";
			//echo"<pre>"; 
			//print_r ($query);
		//	echo "</pre><br>";
			// exit;
			$db->querySql($query);
		//print '<pre>'.$query.'</pre><br>'; exit;
}
	
	public function CapNhatCongDoan($adID)
	{
		global $db;
		$thamgiacongdoan = $_POST['thamgiacongdoan'];
		$ngaythamgiaCD = $_POST['ngaythamgiaCD'];
		settype($thamgiacongdoan,"int");
		$Ngay_arr = explode("/",$ngaythamgiaCD); //  
		if (count($Ngay_arr)==3) { 
			$d = $Ngay_arr[0]; //17 
			$m = $Ngay_arr[1]; //11 
			$y = $Ngay_arr[2]; //2010  
		if (checkdate($m,$d,$y)==false) $ngaythamgiaCD == NULL; 
		else $ngaythamgiaCD = "'".$y."-".$m."-".$d."'"; 
		//else $ngaythamgiaCD == NULL;
	} 
		//else $ngaythamgiaCD= date("Y-m-d");
		else $ngaythamgiaCD = (empty($ngaythamgiaCD)) ? "NULL" : "'".date("Y-m-d")."'";
		$query="UPDATE hosonv SET thamgiacongdoan = $thamgiacongdoan, ngaythamgiaCD = $ngaythamgiaCD 				
				WHERE adID = $adID";
		//echo $query;exit;
		$db->querySql($query);
		//echo $result;exit;
	}
	
	public function CapNhatBaoHiem($adID)
	{
		global $db;
		$thamgiabh = $_POST['thamgiabh'];
		settype($thamgiabh,"int");
		$query="UPDATE hosonv SET thamgiabh = $thamgiabh 				
				WHERE adID = $adID ";
			//echo $query;exit;
			$db->querySql($query);
			//echo $result;exit;
	}
	
	function ChiTietNV($adID){
		global $db;
		$sql="select * from hosonv where adID=$adID";
		$db->querySql($query);

	}
}

?>