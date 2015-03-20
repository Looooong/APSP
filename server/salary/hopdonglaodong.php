<?php
	require_once '../../inc/database.class.php';
	require_once '../../inc/config.php';
	require_once "../../inc/languages.class.php";
	session_start();
		if (isset($_GET['adID'])==false) die('Không biết nhân viên nào'); 

	$adID = $_GET['adID']; settype($adID,"int");	

	$query = "Select mauHopDong.diaChi,thongTin,tieuDe,noiDung,namSinh,nguyenQuan,tenCVVi, hoTen,hoKhau,cMND,ngayCap,noiCap 
	from mauHopDong ,hosonv as hs, congty where hdID=1 and hs.adID=$adID and hs.cvID= congty.cvID ";	
	$db->querySQL($query);
	$result = $db->fetchToArray();
	//$query = "SELECT max(adID) FROM stt";
	//$db->querySql($query);
	$query = "SELECT * FROM stt";
	$db->querySql($query);
	$arr_stt = $db->fetchArray();
	$arr_hd = $arr_stt['msHd'];
	$arr_idenhd = $arr_hd + 001;
	$arr_sv = $arr_stt['msSv'];
	$arr_idensv = $arr_sv + 0001;
?>
<style>
	* { padding:0px; margin:0px;}
	.fl{ float:left}  .fr { float:right}   .clr { clear:both}
	.hopdongld { width:980px; margin:0 auto; }
	.hd_adr { width:490PX; float:left}
	.hd_main { width:980px;}
	.hd_title { width:100%}
	.hd_container { width:100%}
	.hd_center { text-align:center}
	.hd_container ul { list-style:none}
	.hd_container ul li { clear:both; line-height:25px;}
	.hd_container ul li p { float:left}
	._width300 { width:335px;}  ._width200 { width:235px;}  ._width500 { width:500px;}   ._width920 { width:920px} ._width900{ width:872px;} ._width600 { width:627px;}
	.hd_bottom { text-align:center; border-bottom:1px dashed #000}
	.hd_footer { width:980px}
	.hd_footer .hd_footer_chi { width:490px; height:300px;}</style>
    <?php foreach ($result as $value) {?>
<div class="hopdongld">
    	<div class="hd_adr">
    		<?= $value['diaChi'];?>
			<p>Số: <?= $arr_idenhd; ?>/<?= $arr_stt['kyhieuhd'];?></p>
			<p>MSNV: <?= $arr_idensv; ?></p>
        </div>
		
        <div class="hd_adr">
        	<?= $value['thongTin']?>

            
        </div>
                    <div class="clr"></div>

        <div class="hd_main">
        	<div class="hd_title">
            	<?= $value['tieuDe']?>
           	</div>
            
            <div class="hd_container">
            	<ul>
                	<li>
                    	<p>Chúng Tôi, Một Bên Là Ông:</p>
                        <p class="hd_bottom _width500"><strong>Lê Văn Toàn</strong></p>
                        <p>Quốc Tịch:</p>
                        <p class="hd_bottom _width200">Việt Nam</p>
                    </li>
                   <li>
                    	<p>Chức Vụ:</p><p class="hd_bottom _width920">Tổng Giám Đốc Công Ty</p>
                    </li>
                    <li>
                    	<p>Đại Diện Cho (1):</p><p class="hd_bottom _width900"><strong>Công Ty Cổ Phần AP Saigon Petro</strong></p>
                    </li>
                    <li>
                    	<p>Địa Chỉ:</p>
                        <p class="hd_bottom _width600"><strong>Lầu 1,6B Tôn Đức Thắng,P.BN,Q1,TPHCM</strong></p>
                        <p>Điện Thoại:</p>
                        <p class="hd_bottom _width200">08.3822.4848</p>
                    </li>
                     <li>
                    	<p>Và Một Bên Là Ông (Bà):</p>
                        <p class="hd_bottom" style="width:518px"><strong><?= $value['hoTen']?></strong></p>
                        <p>Quốc Tịch:</p>
                        <p class="hd_bottom _width200">Việt Nam</p>
                    </li>
                     <li>
                    	<p>Sinh Ngày:</p>
                        <p class="hd_bottom"  style="width:623px"><?= $value['namSinh']->format('d/m/Y')?></p>
                        <p>Nơi Sinh:</p>
                        <p class="hd_bottom _width200"><?= $value['nguyenQuan']?></p>
                    </li>
                    <li>
                    	<p>Nghề Nghiệp (2):</p>
                        <p class="hd_bottom" style="width:874px"><strong><?= $value['tenCVVi']?></strong></p>
                    </li>
                    <li>
                    	<p>Địa Chỉ Thường Trú:</p>
                        <p class="hd_bottom" style="width:855px"><?= $value['hoKhau']?></p>
                    </li>
                    <li>
                    	<p>Số CMND:</p>
                        <p class="hd_bottom" style="width:310px"><?= $value['cMND']?></p>
                        <p>Cấp Ngày:</p>
                        <p class="hd_bottom" style="width:255px"><?= $value['ngayCap']->format('d/m/Y')?></p>
                        <p>Tại:</p>
                        <p class="hd_bottom" style="width:255px"><?= $value['noiCap']?></p>
                    </li>
                   	<li>
                    	<p>Số sổ Lao Động:</p>
                        <p class="hd_bottom" style="width:255px">024857300</p>
                        <p>Cấp Ngày:</p>
                        <p class="hd_bottom" style="width:255px">10/08/2012</p>
                        <p>Tại:</p>
                        <p class="hd_bottom" style="width:279px">CA.TP.HCM</p>
                    </li>
                   	<?= $value['noiDung']?>
                </ul>
                
           	</div>
        </div>
    </div>
<?php  }?>
	<script>
        window.print();
        //window.close();
    </script>