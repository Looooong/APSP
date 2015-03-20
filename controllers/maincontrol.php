<?php
if(isset($_GET['options']) == TRUE){
if($_GET['options'] == 'logout'){
		session_destroy();
		setcookie("requestedURL", "", time() - 86400);
		echo '<script type="text/javascript">window.location.href="index.php";</script>';
	}
	/*if($_GET['options'] == 'register'){
		require_once 'views/register.php';
	}*/
	if($_GET['options'] == 'pemissions'){
		require_once 'views/pemissions.php';
	}
	
	if($_GET['options'] == 'xgui'){
	require_once 'views/xuatgui.php';
	}
	if($_GET['options'] == 'lsxg'){
	require_once 'hislxg.php';
	}
	if($_GET['options'] == 'bckd'){
	require_once 'bckd.php';
	}
	if($_GET['options'] == 'languageEdit'){
		require_once 'php/languageEdit.php';
	}
	if($_GET['options'] == 'systemEdit'){
		require_once 'server/systemEdit.php';
	}
	
	if($_GET['options'] == 'systemPrint'){
		require_once 'php/systemPrint.php';
	}
	if($_GET['options'] == 'languagePrint'){
		require_once 'php/languagePrint.php';
	}
	if($_GET['options'] == 'upload'){
		require_once 'models/upload.php';
	}
	if($_GET['options'] == 'uploadLang'){
	require_once 'models/uploadLang.php';
	}
	if($_GET['options'] == 'updatetl'){
		require_once 'updatetl.php';
	}
	if($_GET['options'] == 'updatechi'){
		require_once 'updatechi.php';
	}	
	if($_GET['options'] == 'congty'){
		require_once 'views/datatab1.php';
	}
	if($_GET['options'] == 'dantoc'){
		require_once 'views/datatab1.php';
	}
	if($_GET['options'] == 'tongiao'){
		require_once 'views/datatab1.php';
	}
	if($_GET['options'] == 'chuyenmon'){
		require_once 'views/datatab1.php';
	}
	if($_GET['options'] == 'dmspham'){
		require_once 'views/datatab1.php';
	}
	if($_GET['options'] == 'honnhan'){
		require_once 'views/datatab1.php';
	}
	if($_GET['options'] == 'hosonv'){
		require_once 'views/datatab_nv.php';
	}
	if($_GET['options'] == 'chitiet'){
		require_once 'views/datatab_nv.php';
	}
	if($_GET['options'] == 'quoctich'){
		require_once 'views/datatab1.php';
	}
	if($_GET['options'] == 'vanhoa'){
		require_once 'views/datatab1.php';
	}
	if($_GET['options'] == 'dchuyen'){
		require_once 'views/datatab1.php';
	}
	if($_GET['options'] == 'bophan'){
		require_once 'views/datatab1.php';
	}
	if($_GET['options'] == 'themnv'){
		require_once 'views/nhansu.php';
	}
	if($_GET['options'] == 'dangHD'){
		require_once 'views/datatab1.php';
	}
	if($_GET['options'] == 'nhom'){
		require_once 'views/datatab1.php';
	}
	if($_GET['options'] == 'phucap'){
		require_once 'views/datatab1.php';
	}
	if($_GET['options'] == 'ngoaigio'){
		require_once 'views/datatab_ng.php';
	}
	if($_GET['options'] == 'mhang'){
		require_once 'views/datatab1.php';
	}
	if($_GET['options'] == 'qgia'){
		require_once 'views/datatab1.php';
	}
	if($_GET['options'] == 'thanh'){
		require_once 'views/datatab1.php';
	}
	if($_GET['options'] == 'ltien'){
		require_once 'views/datatab1.php';
	}
	if($_GET['options'] == 'lkhang'){
		require_once 'views/datatab1.php';
	}
	if($_GET['options'] == 'nkhang'){
		require_once 'views/datatab1.php';
	}
	if($_GET['options'] == 'kvuc'){
		require_once 'views/datatab1.php';
	}
	if($_GET['options'] == 'donvi'){
		require_once 'views/datatab1.php';
	}
	if($_GET['options'] == 'phucap'){
	require_once 'views/datatab1.php';
	}
	if($_GET['options'] == 'dangNgoaiGio'){
		require_once 'views/datatab1.php';
	}
	if($_GET['options'] == 'baohiem'){
		require_once 'views/datatab1.php';
	}
	if($_GET['options'] == 'bCBH'){
		require_once 'views/insurance.php';
	}
	if($_GET['options'] == 'bCCD'){
		require_once 'views/federation.php';
	}
	if($_GET['options'] == 'capnhatcongdoan'){
		require_once 'views/capnhatcongdoan.php';
	}
	if($_GET['options'] == 'capnhatbh'){
		require_once 'views/capnhatbh.php';
	}
	/*---------------kho---------------*/
	
	if($_GET['options'] == 'storage'){
		require_once 'server/products/view.php';
	}
	if($_GET['options'] == 'goods'){
		require_once 'views/datatab1.php';
	}
	if($_GET['options'] == 'materials'){
		require_once 'views/datatab1.php';
	}
	if($_GET['options'] == 'materialOrder'){
		require_once 'server/materials/view.php';
	}
	if($_GET['options'] == 'lenhsx'){
		require_once 'server/productionOrder/create.php';
	}
	
	if($_GET['options'] == 'fomula'){
		require_once 'server/fomula/index.php';
	}
	/*---------------end kho---------------*/

	if($_GET['options'] == 'phep'){
		require_once 'views/datatab1.php';
	}
	if($_GET['options'] == 'sanLuongKinhDoanh'){
		require_once 'views/datatab1.php';
	}
	if($_GET['options'] == 'pxban'){
		require_once 'views/addphieu.php';
	}
	if($_GET['options'] == 'xuatkho'){
		require_once 'views/addphieu_xk.php';
	}
	if($_GET['options'] == 'dhban'){
		require_once 'views/addphieu.php';
	}
	if($_GET['options'] == 'lghang'){
		require_once 'views/addphieu.php';
	}
	if($_GET['options'] == 'bCLuongBP'){
		require_once 'server/salary/salarytest.php';
	}
	if($_GET['options'] == 'thuviec'){
		require_once 'Edit_hopdonglaodong.php';
	}
	
	if($_GET['options'] == 'chitietnv'){
		require_once 'server/salary/chitiethopdong.php';
	}
	/*------chấm công------*/
	if($_GET['options'] == 'luong'){
		require_once'server/salary/salary.php';

	}
	if($_GET['options'] == 'chamcong'){
		require_once'server/timeKeeper/view.php';

	}
	if($_GET['options'] == 'cCNhaMay'){
		require_once'server/timeKeeper/viewnm.php';

	}
	if($_GET['options'] == 'ngoaiGio'){
		require_once'server/timeKeeper/viewng.php';

	}
}
?>
