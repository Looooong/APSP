<?php 
	require_once 'inc/database.class.php';
	require_once 'inc/config.php';
	require_once 'inc/languages.class.php';
	session_start();
	if (isset($_GET['adID'])==false) die('Không biết nhân viên nào'); 
	$adID = $_GET['adID']; settype($adID,"int");	
	$query = "
				Select hs.adID,maNV,hinhanh,hoTen,tenThuongGoi,gioiTinh,namSinh,nguyenQuan,cMND,ngayCap,noiCap,hoKhau,diaChi,dienThoai,diDong,khanCap,sucKhoe,chieuCao,canNang,ketnap,ngayGiaNhap,noiKN,chucVuKN,aTM,ghiChu,voChong,namSinhVC,ngheNghiep,diaChiVC,soCon,chiTietSC,ngayThuviec,ngayKetThuc,ngayBatDau,soHD,noiLamViec,luongCB,bacLuong,hSTN,hSCV,com,anNgoaiGio,xang,docHai,chuyenCan,dMSL,sLAD,sLCK,nangLuong,dieuChuyen,soBHXH,ngayCapBH,noicapBH,soBHYT,quaTrinhBH,BHTN,theoDoi,ngayThoiViec,soQuyetDinh,ngayQuyetDinh,giamtru
,tenCVVi, tenQTVi, tenDTVi, tenDTVi,tenTGVi,tenHNVi,tenVHVi,tenNhomVi,tenBPVi, tenCMVi,tenDangVI
from hosonv as hs, congty,quoctich,dantoc,tongiao,honnhan,vanhoa,nhom,bophan,chuyenmon,danghd
where  adID=$adID
And hs.cvID= congty.cvID
And hs.qtID = quoctich.qtID
And hs.dtID = dantoc.dtID
And hs.tgID = tongiao.tgID
And hs.hnID = honnhan.hnID
And hs.vhID = vanhoa.vhID
And hs.nhomID = nhom.nhomID
And hs.bophanID = bophan.bophanID
And hs.cmID = chuyenmon.cmID
And hs.dangID = danghd.dangID		
";	
	$db->querySQL($query);
	$result = $db->fetchToArray();


?>
<style type="text/css">
.text_hd:hovev { color:#09F}
.text_imgload { 
	border-left:4px double #DFDADA; 
	float:right; 
	width:39%; 
	margin:5px;
	-webkit-box-shadow: -5px 0px 20px rgba(10, 10, 10, 0.13);
	-moz-box-shadow: -5px 0px 20px rgba(10, 10, 10, 0.13);
	box-shadow: -5px 0px 20px rgba(10, 10, 10, 0.13);}
.text_imgload hr { -webkit-box-shadow: -5px 0px 20px rgba(10, 10, 10, 1);
	-moz-box-shadow: -5px 0px 20px rgba(10, 10, 10, 1);
	box-shadow: -5px 0px 20px rgba(10, 10, 10, 1);}
.text_title { font-weight:bold; margin-right:20px;; width:102px; line-height:20px; }
.text_content { line-height:20px; text-align:center}
.tab-content { padding:20px; }
._100:hover {
 -webkit-box-shadow: -5px 0px 20px rgba(10, 10, 10, 0.16);
	-moz-box-shadow: -5px 0px 20px rgba(10, 10, 10, 0.16);
	box-shadow: -5px 0px 20px rgba(10, 10, 10, 0.16)
}

</style>
 <div class="block-border">

    <div id="tab-panel2">
        <div class="block-header">
            <h1>Hồ Sơ:</h1>
            <ul class="tabs">
                <li><a style=" color:#333; font-weight:bold" href="#a"><?= $lang->get('caNhan')?></a></li>
                <li><a style=" color:#333; font-weight:bold" href="#b"><?= $lang->get('quaTrinh')?></a></li>
                <li><a style=" color:#333; font-weight:bold" href="#c"><?= $lang->get('thongTin','lienQuan')?></a></li>
                <li><a style=" color:#333; font-weight:bold" href="#d"><?= $lang->get('hopDong ')?></a></li>
                <li><a style=" color:#333; font-weight:bold" href="#e"><?= $lang->get('giaDinh')?></a></li>
            </ul>    
        </div>    
              <?php foreach ($result as $value) {
                 
                  ?>
              
    
            <div style="overflow:hidden" class=" load block-content tab-container">
                <div style="float:left;width:50%" id="a" class="tab-content">
                    <div class="_100">
                        <h6 class="text_title fl">Mã Nhân Viên:</h6>
                        <p class="text_content"><?= $value['hoTen']?></p>
    
                     </div> 
                     
                     <div class="_100">
                       <h6 class="text_title fl">ATM:</h6>
                       <p class="text_content"><?= $value['aTM']?></p>
    
                     </div>
                     
                      <div class="_100">
                       <h6 class="text_title fl">Lương Căn Bản:</h6>
                       <p class="text_content"><?= $value['luongCB']?></p>
    
                     </div>
                     
                     <div class="_100">
                       <h6 class="text_title fl">Điện Thoại:</h6>
                       <p class="text_content"><?= $value['dienThoai']?></p>
    
                     </div> 
                     
                      <div class="_100">
                       <h6 class="text_title fl">Di Động:</h6>
                       <p class="text_content"><?= $value['diDong']?></p>
    
                     </div> 
                     
                     <div class="_100">
                       <h6 class="text_title fl">Khẩn Cấp:</h6>
                       <p class="text_content"><?= $value['khanCap']?></p>
    
                     </div> 
                     
                     <div class="_100">
                       <h6 class="text_title fl">Biệt Danh:</h6>
                       <p class="text_content"><?= $value['tenThuongGoi']?></p>
    
                     </div>   
                     
                     
                     <div class="_100">
                       <h6 class="text_title fl">Nguyên Quán:</h6>
                       <p class="text_content"><?= $value['nguyenQuan']?></p>
    
                     </div>   
                     <div class="_100">
                       <h6 class="text_title fl">Năm Sinh:</h6>
                       <p class="text_content"><?= $value['namSinh']->format('d/m/Y')?></p>
    
                     </div>   
                </div><!---#a--->
                <div style="float:left;width:50%" id="b" class="tab-content">
                    <div class="_100">
                        <h6 class="text_title fl">Số BHXH:</h6>
                        <p class="text_content"><?= $value['soBHXH']?></p>
    
                     </div> 
                     <div class="_100">
                        <h6 class="text_title fl">Ngày Cấp BH:</h6>
                        <p class="text_content"><?= $value['ngayCapBH']->format('d/m/Y')?></p>
    
                     </div>
                     <div class="_100">
                        <h6 class="text_title fl">Nơi Cấp BH:</h6>
                        <p class="text_content"><?= $value['noicapBH']?></p>
    
                     </div>
                      <div class="_100">
                        <h6 class="text_title fl">Số BHYT:</h6>
                        <p class="text_content"><?= $value['soBHYT']?></p>
    
                     </div> 
                     <div class="_100">
                        <h6 class="text_title fl">BH Tai Nạn:</h6>
                        <p class="text_content"><?= $value['BHTN']?></p>
    
                     </div> 
                     <div class="_100">
                        <h6 class="text_title fl">Quá Trình BH:</h6>
                        <p class="text_content"><?= $value['quaTrinhBH']?></p>
    
                     </div> 
                     <div class="_100">
                        <h6 class="text_title fl">Bạc Lương:</h6>
                        <p class="text_content"><?= $value['bacLuong']?></p>
    
                     </div> 
                     <div class="_100">
                        <h6 class="text_title fl">Hệ Số TN:</h6>
                        <p class="text_content"><?= $value['hSTN']?></p>
    
                     </div> 
                     <div class="_100">
                        <h6 class="text_title fl">Hệ Số CV:</h6>
                        <p class="text_content"><?= $value['hSCV']?></p>
    
                     </div> 
                     <div class="_100">
                        <h6 class="text_title fl">Cơm:</h6>
                        <p class="text_content"><?= $value['com']?></p>
    
                     </div> 
                     
                     <div class="_100">
                        <h6 class="text_title fl">Ăn Ngoài Giờ:</h6>
                        <p class="text_content"><?= $value['anNgoaiGio']?></p>
    
                     </div> 
                      <div class="_100">
                        <h6 class="text_title fl">Xăng:</h6>
                        <p class="text_content"><?= $value['xang']?></p>
    
                     </div>
                     
                     <div class="_100">
                        <h6 class="text_title fl">Dộc Hại:</h6>
                        <p class="text_content"><?= $value['docHai']?></p>
    
                     </div> 
                     
                     <div class="_100">
                        <h6 class="text_title fl">Chuynê Cần:</h6>
                        <p class="text_content"><?= $value['chuyenCan']?></p>
    
                     </div>
                     
                     <div class="_100">
                        <h6 class="text_title fl">Định Mức SL:</h6>
                        <p class="text_content"><?= $value['dMSL']?></p>
    
                     </div>
                     <div class="_100">
                        <h6 class="text_title fl">SL Chiết Khấu:</h6>
                        <p class="text_content"><?= $value['sLCK']?></p>
    
                     </div>
                     <div class="_100">
                        <h6 class="text_title fl">Giảm Trừ Gia Cảnh:</h6>
                        <p class="text_content"><?= $value['giamtru']?></p>
    
                     </div>
                </div><!---#b--->
                <div style="float:left;width:50%" id="c" class="tab-content">
                      <div class="_100">
                           <h6 class="text_title fl">Quốc Tịch:</h6>
                           <p class="text_content"><?= $value['tenQTVi']?></p>
                         </div>
                         
                         <div class="_100">
                           <h6 class="text_title fl">Dân Tộc:</h6>
                           <p class="text_content"><?= $value['tenDTVi']?></p>
                         </div>  
                         
                         <div class="_100">
                           <h6 class="text_title fl">Tôn Giáo:</h6>
                           <p class="text_content"><?= $value['tenTGVi']?></p>
                         </div>
                        
                        <div class="_100">
                           <h6 class="text_title fl">Văn Hóa:</h6>
                           <p class="text_content"><?= $value['tenVHVi']?></p>
                         </div>
                        
                        <div class="_100">
                           <h6 class="text_title fl">Chuyên Môn:</h6>
                           <p class="text_content"><?= $value['tenCMVi']?></p>
                         </div>
                        <div class="_100">
                           <h6 class="text_title fl">Sức Khỏe:</h6>
                           <p class="text_content"><?= $value['sucKhoe']?></p>
                         </div>
                        <div class="_100">
                           <h6 class="text_title fl">Chiều Cao:</h6>
                           <p class="text_content"><?= $value['chieuCao']?></p>
                         </div>
                        <div class="_100">
                           <h6 class="text_title fl">Cân Nặng:</h6>
                           <p class="text_content"><?= $value['canNang']?></p>
                         </div>
                         
                         <div class="_100">
                           <h6 class="text_title fl">Giới Tính:</h6>
                           <p class="text_content"><?= $value['gioiTinh']?></p>
                         </div>
                        
                        <div class="_100">
                           <h6 class="text_title fl">Ghi Chú:</h6>
                           <p class="text_content"><?= $value['ghiChu']?></p>
                         </div>
                    
                        <div class="_100">
                           <h6 class="text_title fl">CMND:</h6>
                           <p class="text_content"><?= $value['cMND']?></p>
                         </div>
    
                        <div class="_100">
                           <h6 class="text_title fl">Ngày Cấp CMND:</h6>
                           <p class="text_content"><?= $value['ngayCap']->format('d/m/Y')?></p>
                         </div>
                         
                         
                        <div class="_100">
                           <h6 class="text_title fl">Nơi Cấp:</h6>
                           <p class="text_content"><?= $value['noiCap']?></p>
                         </div>
                         
                         
                        <div class="_100">
                           <h6 class="text_title fl">Hộ Khẩu:</h6>
                           <p class="text_content"><?= $value['hoKhau']?></p>
                         </div>
                         
                        <div class="_100">
                           <h6 class="text_title fl">Địa Chỉ:</h6>
                           <p class="text_content"><?= $value['diaChi']?></p>
                         </div>
                  
                        <div class="_100">
                           <h6 class="text_title fl">Kết Nạp:</h6>
                           <p class="text_content"><?= $value['ketnap']?></p>
                         </div>
                    
                        <div class="_100">
                           <h6 class="text_title fl">Ngày Gia Nhập:</h6>
                           <p class="text_content"><?= $value['ngayGiaNhap']->format('d/m/Y')?></p>
                         </div>
                         <div class="_100">
                           <h6 class="text_title fl">Nơi Kết Nạp:</h6>
                           <p class="text_content"><?= $value['noiKN']?></p>
                         </div>
                         <div class="_100">
                           <h6 class="text_title fl">Chức Vụ KN:</h6>
                           <p class="text_content"><?= $value['chucVuKN']?></p>
                         </div>
                </div><!---#c--->
                <div style="float:left;width:50%" id="d" class="tab-content">
                    <div class="_100">
                        <h6 class="text_title fl">Ngày Thử Việc:</h6>
                        <p class="text_content"><?= $value['ngayThuviec']->format('d/m/Y')?></p>
    
                     </div>
                     <div class="_100">
                        <h6 class="text_title fl">Ngày Kết Thúc:</h6>
                        <p class="text_content"><?= $value['ngayKetThuc']->format('d/m/Y')?></p>
    
                     </div>
                     <div class="_100">
                        <h6 class="text_title fl">Ngày Bắt Đầu:</h6>
                        <p class="text_content"><?= $value['ngayBatDau']->format('d/m/Y')?></p>
    
                     </div>
                     <div class="_100">
                        <h6 class="text_title fl">Số Hợp Đồng:</h6>
                        <p class="text_content"><?= $value['soHD']?></p>
    
                     </div>
                     <div class="_100">
                        <h6 class="text_title fl">Nơi Làm Việc:</h6>
                        <p class="text_content"><?= $value['noiLamViec']?></p>
    
                     </div>
                     <div class="_100">
                        <h6 class="text_title fl">Dạng Hợp Đồng:</h6>
                        <p class="text_content"><?= $value['tenDangVi']?></p>
    
                     </div>
                      <div class="_100">
                        <h6 class="text_title fl">Ngày Nghỉ Việc:</h6>
                        <p class="text_content"><?= $value['ngayThoiViec']->format('d/m/Y')?></p>
    
                     </div>
                      <div class="_100">
                        <h6 class="text_title fl">Số Quyết Định:</h6>
                        <p class="text_content"><?= $value['soQuyetDinh']?></p>
    
                     </div>
                      <div class="_100">
                        <h6 class="text_title fl">Ngày Quyết Định:</h6>
                        <p class="text_content"><?= $value['ngayQuyetDinh']->format('d/m/Y')?></p>
    
                     </div>
                </div><!---#d--->
                <div style="float:left;width:50%" id="e" class="tab-content">
                    <div class="_100">
                        <h6 class="text_title fl">Tình Trạng:</h6>
                        <p class="text_content"><?= $value['tenHNVi']?></p>
    
                     </div>
                     <div class="_100">
                        <h6 class="text_title fl">Tên Vợ/Chồng:</h6>
                        <p class="text_content"><?= $value['voChong']?></p>
    
                     </div>
                     <div class="_100">
                        <h6 class="text_title fl">Năm Sinh VC:</h6>
                        <p class="text_content"><?= $value['namSinhVC']->format('d/m/Y')?></p>
    
                     </div>
                     <div class="_100">
                        <h6 class="text_title fl">Nghề Nghiệp:</h6>
                        <p class="text_content"><?= $value['ngheNghiep']?></p>
    
                     </div>
                     <div class="_100">
                        <h6 class="text_title fl">Địa Chỉ VC:</h6>
                        <p class="text_content"><?= $value['diaChiVC']?></p>
    
                     </div>
                      <div class="_100">
                        <h6 class="text_title fl">Số Con:</h6>
                        <p class="text_content"><?= $value['soCon']?></p>
    
                     </div>
                      <div class="_100">
                        <h6 class="text_title fl">Chi Tiết:</h6>
                        <p class="text_content"><?= $value['chiTietSC']?></p>
    
                     </div>
                </div><!--#e-->
                <div class="text_imgload">
                    <img style="width:50%; padding:2px; border:1px solid #000; margin:10px"src="<?= $value['hinhanh']?>" />
                    <span><a href="server/salary/hopdonglaodong.php?adID=<?= $value['adID']?>" target="_blank"><img style="width:35%" src="src/img/contract.jpeg" ></a></span>
                    <hr />
                    <div style="margin:10px;">
                             <h6 class="text_title fl">Họ Và Tên:</h6>
                            <p class="text_content"><?= $value['hoTen']?></p>
                            <h6 class="text_title fl">Nhóm:</h6>
                            <p class="text_content"><?= $value['tenNhomVi']?></p>
                            <h6 class="text_title fl">Bộ Phận:</h6>
                            <p class="text_content"><?= $value['tenBPVi']?></p>
                            <h6 class="text_title fl">Chức Vụ:</h6>
                            <p class="text_content"> <?= $value['tenCVVi']?></p>
                       
                    </div>                    
                </div>
            </div>
          
       
    </div> 
     <?php }?>

</div>

<script>
	$().ready(function() {
$("#tab-panel2").createTabs();
});
</script>