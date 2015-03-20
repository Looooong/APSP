<meta charset = "utf-8">
<?php
error_reporting(E_ALL & ~ E_NOTICE);  
	//$table = $_POST['table'];
$data = array();

function add_person( $hoTen, $gioiTinh, $namSinh , $nguyenQuan ,$quocTich,$danToc, $tonGiao, $cMND , $ngayCap ,$noiCap,$hoKhau, $diaChi, $dienThoai , $diDong ,$tinhTrang,$honNhan, $vanHoa, $chuyenMon , $dangVien ,$doanVien,$ngayGiaNhap, $noiKN, $chucVuD , $aTM ,$ghiChu,$maNV, $voChong, $namSinhVC , $ngheNghiep ,$diaChiVC,$soCon, $cTCon, $ngayThuviec , $ngayKetThuc ,$ngayBatDau,$soHD, $dangHD, $boPhan , $noiLamViec ,$luongCB,$bac , $hSTN ,$hSCV,$com, $anNgoaiGio, $xang , $docHai ,$chuyenCan,$phuCap, $dMSL, $sLAD , $sLCK ,$congCu,$nangLuong, $dieuChuyen , $soBHXH ,$ngayCapBH,$noicapBH, $soBHYT, $quaTrinhBH , $BHTN  )
{
	global $data;
	$data[]=array('hoTen'=>$hoTen,'gioiTinh'=>$gioiTinh,'namSinh'=>$namSinh,'nguyenQuan'=>$nguyenQuan,'quocTich'=>$quocTich,'danToc'=>$danToc,'tonGiao'=>$tonGiao,'cMND'=>$cMND,'ngayCap'=>$ngayCap,'noiCap'=>$noiCap,'hoKhau'=>$hoKhau,'diaChi'=>$diaChi,'dienThoai'=>$dienThoai,'diDong'=>$diDong,'tinhTrang'=>$tinhTrang,'honNhan'=>$honNhan,'vanHoa'=>$vanHoa,'chuyenMon'=>$chuyenMon,'dangVien'=>$dangVien,'doanVien'=>$doanVien,'ngayGiaNhap'=>$ngayGiaNhap,'noiKN'=>$noiKN,'chucVuD'=>$chucVuD,'aTM'=>$aTM,'ghiChu'=>$ghiChu,'maNV'=>$maNV,'voChong'=>$voChong,'namSinhVC'=>$namSinhVC,'ngheNghiep'=>$ngheNghiep,'diaChiVC'=>$diaChiVC,'soCon'=>$soCon,'cTCon'=>$cTCon,'ngayThuviec'=>$ngayThuviec,'ngayKetThuc'=>$ngayKetThuc,'ngayBatDau'=>$ngayBatDau,'soHD'=>$soHD,'dangHD'=>$dangHD,'boPhan'=>$boPhan,'noiLamViec'=>$noiLamViec,'luongCB'=>$luongCB,'bac'=>$bac,'hSTN'=>$hSTN,'hSCV'=>$hSCV,'com'=>$com,'anNgoaiGio'=>$anNgoaiGio,'xang'=>$xang,'docHai'=>$docHai,'chuyenCan'=>$chuyenCan,'phuCap'=>$phuCap,'dMSL'=>$dMSL,'sLAD'=>$sLAD,'sLCK'=>$sLCK,'congCu'=>$congCu,'nangLuong'=>$nangLuong,'dieuChuyen'=>$dieuChuyen,'soBHXH'=>$soBHXH,'ngayCapBH'=>$ngayCapBH,'ngayCapBH'=>$ngayCapBH,'soBHYT'=>$soBHYT,'quaTrinhBH'=>$quaTrinhBH,'BHTN'=>$BHTN);
}
	
if( $_FILES['file']['tmp_name'])
{
 $dom = DOMDocument::load( $_FILES['file']['tmp_name'] );
 $rows = $dom->getElementsByTagName('Row');
 $first_row = true;
 foreach ($rows as $row)
 {
   if( !$first_row)
   {
     $hoTen= ""; 
	 $gioiTinh= ""; 
	 $namSinh = "";
	 $nguyenQuan = "";
	 $quocTich= "";
	 $danToc= "";
	 $tonGiao= "";
	 $cMND= "";
	 $ngayCap= "";
	 $noiCap= "";
	 $hoKhau= "";
	 $diaChi= "";
	 $dienThoai= "";
	 $diDong= "";
	 $tinhTrang= "";
	 $honNhan= "";
	 $vanHoa= "";
	 $chuyenMon= "";
	 $dangVien= "";
	 $doanVien= "";
	 $ngayGiaNhap= "";
	 $noiKN= "";
	 $chucVuD= "";
	 $aTM= "";
	 $ghiChu= "";
	 $maNV= "";
	 $voChong= "";
	 $namSinhVC= "";
	 $ngheNghiep= "";
	 $diaChiVC= "";
	 $soCon= "";
	 $cTCon= "";
	 $ngayThuviec= "";
	 $ngayKetThuc= "";
	 $ngayBatDau= "";
	 $soHD= "";
	 $dangHD= "";
	 $boPhan= "";
	 $noiLamViec= "";
	 $luongCB= "";
	 $bac= "";
	 $hSTN= "";
	 $hSCV= "";
	 $com= "";
	 $anNgoaiGio= "";
	 $xang= "";
	 $docHai= "";
	 $chuyenCan= "";
	 $phuCap= "";
	 $dMSL= "";
	 $sLAD= "";
	 $sLCK= "";
	 $congCu= "";
	 $nangLuong= "";
	 $dieuChuyen= "";
	 $soBHXH= "";
	 $ngayCapBH= "";
	 $noicapBH= "";
	 $soBHYT= "";
	 $quaTrinhBH= "";
	 $BHTN= ""; 
	
     $index = 1;
     $cells = $row->getElementsByTagName( 'Cell' );
     foreach( $cells as $cell )
     {
       $ind = $cell->getAttribute( 'Index' );
       if ( $ind != null ) $index = $ind;

       if ( $index == 1 ) $hoTen= $cell->nodeValue; 
	if ( $index == 2 ) $gioiTinh= $cell->nodeValue; 
	if ( $index == 3 ) $namSinh = $cell->nodeValue;
	if ( $index == 4 ) $nguyenQuan = $cell->nodeValue;
	if ( $index == 5 ) $quocTich= $cell->nodeValue;
	if ( $index == 6 ) $danToc= $cell->nodeValue;
	if ( $index == 7 ) $tonGiao= $cell->nodeValue;
	if ( $index == 8 ) $cMND= $cell->nodeValue;
	if ( $index == 9 ) $ngayCap= $cell->nodeValue;
	if ( $index == 10 ) $noiCap= $cell->nodeValue;
	if ( $index == 11 ) $hoKhau= $cell->nodeValue;
	if ( $index == 12 ) $diaChi= $cell->nodeValue;
	if ( $index == 13 ) $dienThoai= $cell->nodeValue;
	if ( $index == 14 ) $diDong= $cell->nodeValue;
	if ( $index == 15 ) $tinhTrang= $cell->nodeValue;
	if ( $index == 16 ) $honNhan= $cell->nodeValue;
	if ( $index == 17 ) $vanHoa= $cell->nodeValue;
	if ( $index == 18 ) $chuyenMon= $cell->nodeValue;
	if ( $index == 19 ) $dangVien= $cell->nodeValue;
	if ( $index == 20 ) $doanVien= $cell->nodeValue;
	if ( $index == 21 ) $ngayGiaNhap= $cell->nodeValue;
	if ( $index == 22 ) $noiKN= $cell->nodeValue;
	if ( $index == 23 ) $chucVuD= $cell->nodeValue;
	if ( $index == 24 ) $aTM= $cell->nodeValue;
	if ( $index == 25 ) $ghiChu= $cell->nodeValue;
	if ( $index == 26 ) $maNV= $cell->nodeValue;
	if ( $index == 27 ) $voChong= $cell->nodeValue;
	if ( $index == 28 ) $namSinhVC= $cell->nodeValue;
	if ( $index == 29 ) $ngheNghiep= $cell->nodeValue;
	if ( $index == 30 ) $diaChiVC= $cell->nodeValue;
	if ( $index == 31 ) $soCon= $cell->nodeValue;
	if ( $index == 32 ) $cTCon= $cell->nodeValue;
	if ( $index == 33 ) $ngayThuviec= $cell->nodeValue;
	if ( $index == 34 ) $ngayKetThuc= $cell->nodeValue;
	if ( $index == 35 ) $ngayBatDau= $cell->nodeValue;
	if ( $index == 36 ) $soHD= $cell->nodeValue;
	if ( $index == 37 ) $dangHD= $cell->nodeValue;
	if ( $index == 38 ) $boPhan= $cell->nodeValue;
	if ( $index == 39 ) $noiLamViec= $cell->nodeValue;
	if ( $index == 40 ) $luongCB= $cell->nodeValue;
	if ( $index == 41 ) $bac= $cell->nodeValue;
	if ( $index == 42 ) $hSTN= $cell->nodeValue;
	if ( $index == 43 ) $hSCV= $cell->nodeValue;
	if ( $index == 44 ) $com= $cell->nodeValue;
	if ( $index == 45 ) $anNgoaiGio= $cell->nodeValue;
	if ( $index == 46 ) $xang= $cell->nodeValue;
	if ( $index == 47 ) $docHai= $cell->nodeValue;
	if ( $index == 48 ) $chuyenCan= $cell->nodeValue;
	if ( $index == 49 ) $phuCap= $cell->nodeValue;
	if ( $index == 50 ) $dMSL= $cell->nodeValue;
	if ( $index == 51 ) $sLAD= $cell->nodeValue;
	if ( $index == 52 ) $sLCK= $cell->nodeValue;
	if ( $index == 53 ) $congCu= $cell->nodeValue;
	if ( $index == 54 ) $nangLuong= $cell->nodeValue;
	if ( $index == 55 ) $dieuChuyen= $cell->nodeValue;
	if ( $index == 56 ) $soBHXH= $cell->nodeValue;
	if ( $index == 57 ) $ngayCapBH= $cell->nodeValue;
	if ( $index == 58 ) $noicapBH= $cell->nodeValue;
	if ( $index == 59 ) $soBHYT= $cell->nodeValue;
	if ( $index == 60 ) $quaTrinhBH= $cell->nodeValue;
	if ( $index == 61 ) $BHTN= $cell->nodeValue; 
	
	   $index += 1;
     }
	 
    add_person( $hoTen, $gioiTinh, $namSinh , $nguyenQuan ,$quocTich,$danToc, $tonGiao, $cMND , $ngayCap ,$noiCap,$hoKhau, $diaChi, $dienThoai , $diDong ,$tinhTrang,$honNhan, $vanHoa, $chuyenMon , $dangVien ,$doanVien,$ngayGiaNhap, $noiKN, $chucVuD , $aTM ,$ghiChu,$maNV, $voChong, $namSinhVC , $ngheNghiep ,$diaChiVC,$soCon, $cTCon, $ngayThuviec , $ngayKetThuc ,$ngayBatDau,$soHD, $dangHD, $boPhan , $noiLamViec ,$luongCB,$bac , $hSTN ,$hSCV,$com, $anNgoaiGio, $xang , $docHai ,$chuyenCan,$phuCap, $dMSL, $sLAD , $sLCK ,$congCu,$nangLuong, $dieuChuyen , $soBHXH ,$ngayCapBH,$noicapBH, $soBHYT, $quaTrinhBH , $BHTN);
   
   }

   $first_row = false;
 }
}
?>

<?php
$url_get= $_SERVER["HTTP_REFERER"];
echo $url_get;
	 foreach($data as $row)
	 {
			//luu y : du lieu 1 dong trong file xml neu rong o 1 o^ nao do, thi se khong import dong do vao db
			require_once('../inc/database.class.php');
			require_once('../inc/config.php');				
			
			//neu tieude trong file excel rỗng thì chèn vào database 1 khoảng trắng(tùy ý),tuong tu voi tacgia
		    $a1 =$row['hoTen'];
			if($a1=='') $a1='';
		
			$a2 =$row['gioiTinh'];
			if($a2=='') $a2='';
			
			$a3 =$row['namSinh'];
			if($a3=='') $a3=' ';
			
 			$a4 =$row['nguyenQuan'];
			if($a4=='') $a4=' ';
			$a1 =$row['quocTich'];
			if($a1=='') $a1='';
		
			$a2 =$row['danToc'];
			if($a2=='') $a2='';
			
			$a3 =$row['tonGiao'];
			if($a3=='') $a3=' ';
			
 			$a4 =$row['cMND'];
			if($a4=='') $a4=' ';
			
			$a1 =$row['ngayCap'];
			if($a1=='') $a1='';
		
			$a2 =$row['noiCap'];
			if($a2=='') $a2='';
			
			$a3 =$row['hoKhau'];
			if($a3=='') $a3=' ';
			
 			$a4 =$row['diaChi'];
			if($a4=='') $a4=' ';
			
			$a1 =$row['dienThoai'];
			if($a1=='') $a1='';
		
			$a2 =$row['diDong'];
			if($a2=='') $a2='';
			
			$a3 =$row['tinhTrang'];
			if($a3=='') $a3=' ';
			
 			$a4 =$row['honNhan'];
			if($a4=='') $a4=' ';
			
			
			$a1 =$row['vanHoa'];
			if($a1=='') $a1='';
		
			$a2 =$row['chuyenMon'];
			if($a2=='') $a2='';
			
			$a3 =$row['dangVien'];
			if($a3=='') $a3=' ';
			
 			$a4 =$row['doanVien'];
			if($a4=='') $a4=' ';
			
			
			$a1 =$row['ngayGiaNhap'];
			if($a1=='') $a1='';
		
			$a2 =$row['noiKN'];
			if($a2=='') $a2='';
			
			$a3 =$row['chucVuD'];
			if($a3=='') $a3=' ';
			
 			$a4 =$row['aTM'];
			if($a4=='') $a4=' ';
			
			
			$a1 =$row['ghiChu'];
			if($a1=='') $a1='';
		
			$a2 =$row['maNV'];
			if($a2=='') $a2='';
			
			$a3 =$row['voChong'];
			if($a3=='') $a3=' ';
			
 			$a4 =$row['namSinhVC'];
			if($a4=='') $a4=' ';
			
			
			$a1 =$row['ngheNghiep'];
			if($a1=='') $a1='';
		
			$a2 =$row['diaChiVC'];
			if($a2=='') $a2='';
			
			$a3 =$row['soCon'];
			if($a3=='') $a3=' ';
			
 			$a4 =$row['cTCon'];
			if($a4=='') $a4=' ';
			
			
			$a1 =$row['ngayThuviec'];
			if($a1=='') $a1='';
		
			$a2 =$row['ngayKetThuc'];
			if($a2=='') $a2='';
			
			$a3 =$row['ngayBatDau'];
			if($a3=='') $a3=' ';
			
 			$a4 =$row['soHD'];
			if($a4=='') $a4=' ';
			
			$a1 =$row['dangHD'];
			if($a1=='') $a1='';
		
			$a2 =$row['boPhan'];
			if($a2=='') $a2='';
			
			$a3 =$row['noiLamViec'];
			if($a3=='') $a3=' ';
			
 			$a4 =$row['luongCB'];
			if($a4=='') $a4=' ';
			
			$a1 =$row['bac'];
			if($a1=='') $a1='';
		
			$a2 =$row['hSTN'];
			if($a2=='') $a2='';
			
			$a3 =$row['hSCV'];
			if($a3=='') $a3=' ';
			
 			$a4 =$row['com'];
			if($a4=='') $a4=' ';
			
			
			$a1 =$row['anNgoaiGio'];
			if($a1=='') $a1='';
		
			$a2 =$row['xang'];
			if($a2=='') $a2='';
			
			$a3 =$row['docHai'];
			if($a3=='') $a3=' ';
			
 			$a4 =$row['chuyenCan'];
			if($a4=='') $a4=' ';
			
			$a4 =$row['phuCap'];
			if($a4=='') $a4=' ';
			$a4 =$row['dMSL'];
			if($a4=='') $a4=' ';
			$a4 =$row['sLAD'];
			if($a4=='') $a4=' ';$a4 =$row['sLCK'];
			if($a4=='') $a4=' ';$a4 =$row['congCu'];
			if($a4=='') $a4=' ';$a4 =$row['nangLuong'];
			if($a4=='') $a4=' ';$a4 =$row['dieuChuyen'];
			if($a4=='') $a4=' ';$a4 =$row['soBHXH'];
			if($a4=='') $a4=' ';$a4 =$row['ngayCapBH'];
			if($a4=='') $a4=' ';$a4 =$row['noicapBH'];
			if($a4=='') $a4=' ';$a4 =$row['soBHYT'];
			if($a4=='') $a4=' ';$a4 =$row['quaTrinhBH'];
			if($a4=='') $a4=' ';$a4 =$row['BHTN'];
			if($a4=='') $a4=' ';
		$query=("Insert into Administrative(hoTen, gioiTinh, namSinh , nguyenQuan ,quocTich,danToc, tonGiao, cMND , ngayCap ,noiCap,hoKhau, diaChi, dienThoai , diDong ,tinhTrang,honNhan, vanHoa, chuyenMon , dangVien ,doanVien,ngayGiaNhap, noiKN, chucVuD , aTM ,ghiChu,maNV, voChong, namSinhVC , ngheNghiep ,diaChiVC,soCon,cTCon, ngayThuviec , ngayKetThuc ,ngayBatDau,soHD, dangHD, boPhan , noiLamViec ,luongCB,bac , hSTN ,hSCV,com, anNgoaiGio, xang , docHai ,chuyenCan,phuCap, dMSL, sLAD , sLCK ,congCu,nangLuong, dieuChuyen , soBHXH ,ngayCapBH,noicapBH, soBHYT, quaTrinhBH , BHTN) values (N'$a1',N'$a2',$a3,N'$a4',N'$a5',N'$a6',N'$a7',$a8,$a9,N'$a10',N'$a11',N'$a12',$a13,$a14,N'$a15',N'$a16',N'$a17',N'$a18',N'$a19',N'$a20',$a21,N'$a22',N'$a23',$a24,N'$a25',N'$a26',N'$a27',$a28,N'$a29',N'$a30',$a31,N'$a32',$a33,$a34,$a35,N'$a36',N'$a37',N'$a38',N'$a39',$a40,N'$a41',N'$a42',N'$a43',$a44,$a45,N'$a46',N'$a47',$a48,$a49,N'$a50',N'$a51',N'$a52',N'$a53',N'$a54',N'$a55',N'$a56',$a57,N'$a58',N'$a59',N'$a60',N'$a61')");	
					$db->querySql($query);
			//echo $query;exit;
			
					
					echo '<script type = "text/javascript">window.location.href = "index.php"';
			}
			
			
		//print_r($data);
		?>