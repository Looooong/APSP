  <?php
  	$query = "Select luongNhaMay.*, hoTen, tenCVVi,tenDangVI, maNV,thuong1,thuong2,thuong3,thuong4,chidot1,chidot2,chidot3,chidot4,chidot5
			  From luongNhaMay,hosonv,congty,danghd 
			  Where luongNhaMay.adID = hosonv.adID
			  And hosonv.cvID=congty.cvID  
			  And hosonv.dangID=danghd.dangID";
	$db->QuerySql($query);
	$result = $db->fetchToArray();
	
	$tinhtong ="select sum(luongCB) as sumluongcb ,sum(hSCV) as sumhscv ,sum(tienhSCV) as sumtienhscv , sum(hSTN) as sumhstn ,sum(tienhSTN) as sumtienhstn ,sum(coMat) as sumcomat ,sum(nuaBuoi) as sumnuabuoi ,sum(nghiPhep) as sumnghiphep ,sum(vangMat) as sumvangmat ,sum(docHai) as sumdochai,sum(phuCap) as sumphucap,sum(ngayCom) as sumngaycom,sum(tongCom) as sumtongcom,sum(nghiPhep) as sumnghiphep,sum(tongPhep) as sumtongphep,sum(vangMat) as sumvangmat,sum(tongVang) as sumtongvang,sum(tongLuong) as sumtongLuong
				from luongNhaMay 
				";
  	$db->QuerySql($tinhtong);
	$tongluongcb = $db->fetchToArray();
  ?>
  <style>
  	._w100 { width:100px}
	._w200 { width:200px;}
	.table td { text-align:center; font-size:12px;}
	.table td p{ text-align:center; font-weight:bold; color:#2a3640;}
  </style>
  <div class="block-border">
        <div class="block-header">
                <p style="margin-left:20px;text-align:left">Lầu 1,6B ôn Đức Thắng, Phường Bến Nghé, Q1</p>
                <p style="margin-left:20px; text-align:left">MST:0305715556</p>
                <p style="text-align:center; font-size:20px;"><strong>BẢNG LƯƠNG</strong></p>
            	<div class="block-content" style=" background:#F2F2F2; overflow-x:scroll; width:1057px;">   					
                    <table id="txet" class="table">
                    <thead>
                      <tr>
                        <th rowspan="3"><p>Mã NV</p></th>
                        <th rowspan="3"><p class="_w200">Họ Và Tên</p></th>
                        <th rowspan="3"><p class="_w200">Chức Vụ</p></th>
                        <th rowspan="3"><p class="_w200">Loại HĐ LĐ</p></th>
                        <th rowspan="3"><p class="_w200">Lương CB</p></th>
                        <th colspan="2" rowspan="2"><p class="_w200">PC Chức Vụ</p></th>
                        <th colspan="2" rowspan="2"><p class="_w200">PC Trách Nhiệm</p></th>
                        <th colspan="3" rowspan="2"><p class="_w200">HĐ TV</p></th>
                        <th colspan="5" rowspan="2"><p class="_w200">HĐ CT</p></th>
                        <th rowspan="3"><p class="_w200">PC Độc Hại</p></th>
                        <th rowspan="3"><p class="_w200">PC Xăng</p></th>
                        <th rowspan="3"><p class="_w200">PC Khác</p></th>
                        <th colspan="2" rowspan="2"><p class="_w200">Tiền Ăn</p></th>
                        <th colspan="2" rowspan="2"><p class="_w200">Trừ Lương- Phép</p></th>
                        <th colspan="2" rowspan="2"><p class="_w200">Trừ Nghỉ Không Lương</p></th>
                        <th rowspan="3"><p class="_w200">Ngoài Giờ</p></th>
                        <th colspan="2"><p class="_w200">BHXH + BHTN</p></th>
                        <th rowspan="3"><p class="_w200">Thưởng 1</p></th>
                        <th rowspan="3"><p class="_w200">Thưởng 2</p></th>
                        <th rowspan="3"><p class="_w200">Thưởng 3</p></th>
                        <th rowspan="3"><p class="_w200">Thưởng 4</p></th>
						<th rowspan="3"><p class="_w200">Thu Nhập</p></th>
                        <th colspan="2"><p class="_w200">Giảm Trừ Gia Cảnh</p></th>
                        <th rowspan="3"><p class="_w200">Thu Nhập Tính Thuế</p></th>
                        <th rowspan="3"><p class="_w200">Thuế TNCN</p></th>
                        <th rowspan="3"><p class="_w200">Trích KPCĐ</p></th>
                        <th rowspan="3"><p class="_w200">Đã Nhận Tiền Nhận Tàu</p></th>
                        <th rowspan="3"><p class="_w200">Nhận Đợt 1</p></th>
                        <th rowspan="3"><p class="_w200">Nhận Đợt 2 </p></th>
                        <th rowspan="3"><p class="_w200">Nhận Đợt 3 </p></th>
                        <th rowspan="3"><p class="_w200">Nhận Đợt 4 </p></th>
                        <th rowspan="3"><p class="_w200">Nhận Đợt 5 </p></th>
                        <th rowspan="3"><p class="_w200">Nhận Đợt 6 </p></th>
                        <th rowspan="3"><p class="_w200">Chi Dư (-)</p></th>
                        <th rowspan="3"><p class="_w200">Bổ Sung (+)</p></th>
                        <th rowspan="3"><p class="_w200">Còn Lại</p></th>
                        <th rowspan="3"><p class="_w200">Tổng Thu Nhập</p></th>
                     </tr>
                      <tr>
                        <th class="_w100"><p>DN trả</p></th>
                        <th class="_w100"><p>NLĐ trả</p></th>
                        <th rowspan="2" class="_w100"><p>Số Người</p></th>
                        <th rowspan="2" class="_w100"><p>TT</p></th>
                     </tr>
                      <tr>
                        <th class="_w100"><p>Hệ Số</p></th>
                        <th class="_w100"><p>TT</p></th>
                        <th class="_w100"><p>Hệ Số</p></th>
                        <th class="_w100"><p>TT</p></th>
                        <th><p>T/g BĐ-KT TV</p></th>
                        <th><p>Ngày</p></th>
                        <th><p>TT</p></th>
                        <th class="_w100"><p>Có Mặt</p></th>
                        <th class="_w100"><p>Nữa Buổi</p></th>
                        <th class="_w100"><p>Nghĩ Phép</p></th>
                        <th class="_w100"><p>Vắng Mặt</p></th>
                        <th class="_w100"><p>TT</p></th>
                        <th class="_w100"><p>Số Ngày</p></th>
                        <th class="_w100"><p>TT</p></th>
                        <th class="_w100"><p>Số Ngày</p></th>
                        <th class="_w100"><p>TT</p></th>
                        <th class="_w100"><p>Số Ngày</p></th>
                        <th class="_w100"><p>TT</p></th>
                        <th class="_w100"><p>23%</p></th>
                        <th class="_w100"><p>9,5%</p></th>
                      </tr>
                 </thead>
                 <tbody>
                      <?php
					  foreach($result as $rel){
						$nhand1 = $rel['LuongCB'] + $rel['tienHSCV'] + $rel['tienHSTN'] + + $rel['com'] + + $rel['docHai'];
						$ttnhap = $rel['tongLuong'] + $rel['thuong1'] + $rel['thuong2'] + $rel['thuong3'] + $rel['thuong4'];
						$allthunhap = $ttnhap - $rel['tienThue'];
						$endthunhap = $allthunhap - ($nhand1 + $rel['chidot1'] + $rel['chidot2'] + $rel['chidot3'] + $rel['chidot4'] + $rel['chidot5']);
					  ?>
                      <tr rel="<?=$rel['adID']?>" id="<?=$rel['adID']?>">
                        <td><?= $rel['maNV']?></td>
                        <td><?= $rel['hoTen']?></td>
                        <td><?= $rel['tenCVVi']?></td>
                        <td><?= $rel['tenDangVI']?></td>
                        <td><?=number_format($rel['luongCB'],0,",",".")?> VNĐ</td>
                        <td><?= $rel ['hSCV']?></td>
                        <td><?=number_format($rel['tienHSCV'],0,",",".")?> VNĐ</td>
                        <td><?= $rel ['hSTN']?></td>
                        <td><?=number_format($rel['tienHSTN'],0,",",".")?> VNĐ</td>
                        <td><?= $rel ['ngayThuviec']->format("d/m/Y")?> - <?= $rel ['ngayKetThuc']->format("d/m/Y")?> </td>
                        <td><?= $rel ['tongNgay']?></td>
                        <td></td>
                        <td><?= $rel ['coMat']?></td>
                        <td><?= $rel ['nuaBuoi']?></td>
                        <td><?= $rel ['nghiPhep']?></td>
                        <td><?= $rel ['vangMat']?></td>
                        <td></td>
                        <td><?= $rel ['docHai']?></td>
                        <td><?= $rel ['xang']?></td>
                        <td><?= $rel['phuCap'];?> VNĐ</td>
                        <td><?= $rel ['ngayCom']?></td>
                        <td><?= number_format($rel['tongCom'],0,",",".")?> VNĐ</td>
                        <td><?= $rel ['nghiPhep']?></td>
                        <td><?= number_format($rel['tongPhep'],0,",",".") ?> VNĐ</td>
                        <td><?= $rel ['vangMat']?></td>
                        <td><?= number_format($rel['tongVang'],0,",",".") ?> VNĐ</td>
                        <td><?= number_format($rel['lamNgoaiGio'],0,",",".")?> VNĐ</td>
                        <td><?= number_format($rel['baoHiemDN'],0,",",".") ?> VNĐ</td>
                        <td><?= number_format($rel['baoHiemNLD'],0,",",".") ?> VNĐ</td>
                      
                        <td><?= number_format($rel['thuong1'],0,",",".") ?></td>
                        <td><?= number_format($rel['thuong2'],0,",",".") ?></td>
                        <td><?= number_format($rel['thuong3'],0,",",".") ?></td>
                        <td><?= number_format($rel['thuong4'],0,",",".") ?></td>
						<td><?= number_format($ttnhap,0,",",".") ?> VNĐ</td>
                        <td><?= $rel['giamtru'];?></td>
                        <td><?= number_format($rel['ttgiamtru'],0,",",".") ?> VNĐ</td>
                        <td><?= number_format($rel['thuNhapTinhThue'],0,",",".")?> VNĐ</td>
                        <td><?= number_format($rel['tienThue'],0,",",".")?> VNĐ</td>
                     
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><?= number_format($nhand1,0,",",".") ?></td>
						<td><?= number_format($rel['chidot1'],0,",",".") ?></td>
                        <td><?= number_format($rel['chidot2'],0,",",".") ?></td>
                        <td><?= number_format($rel['chidot3'],0,",",".") ?></td>
                        <td><?= number_format($rel['chidot4'],0,",",".") ?></td>
                        <td><?= number_format($rel['chidot5'],0,",",".") ?></td>
                        
                        <td></td>
                        <td>&nbsp;</td>
                        <td><?= number_format($endthunhap,0,",",".") ?></td>
                                              
                        <td><?= number_format($allthunhap,0,",",".") ?>
                        
                        </td>                      
                      </tr>
								
                      <?php }?>
                       <?php
					  foreach($tongluongcb as $rel){
						//echo $rel['hoTen'];
					  ?>
                      <tr>
                        <td>&nbsp;</td>
                        <td colspan="2">Tổng lương...(bộ Phận)</td>
                        <td>&nbsp;</td>
                        <td><?= number_format($rel['sumluongcb'],0,",",".") ?> VNĐ</td>
                        
                        <td><?= $rel ['sumhscv']?></td>
                        <td><?= number_format($rel['sumtienhscv'],0,",",".") ?> VNĐ</td>
                        <td><?= $rel ['sumhstn']?></td>
                        <td><?= number_format($rel['sumtienhstn'],0,",",".") ?> VNĐ</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td></td>
                        
                        <td><?= $rel ['sumcomat']?></td>
                        <td><?= $rel ['sumnuabuoi']?></td>
                        <td><?= $rel ['sumnghiphep']?></td>
                        <td><?= $rel ['sumvangmat']?></td>
                        <td></td>
                        <td><?= number_format($rel['sumdochai'],0,",",".") ?> VNĐ</td>
                        <td></td>
                        <td><?= number_format($rel['sumphucap'],0,",",".") ?> VNĐ</td>
                        <td><?= $rel ['sumngaycom']?></td>
                        <td><?= number_format($rel['sumtongcom'],0,",",".") ?> VNĐ</td>
                        <td><?= $rel ['sumnghiphep']?></td>
                        <td><?= number_format($rel['sumtongphep'],0,",",".") ?> VNĐ</td>
                        
                        <td><?= $rel ['sumvangmat']?></td>
                        <td><?= number_format($rel['sumtongvang'],0,",",".") ?> VNĐ</td>
                        <td></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><?= number_format($endthunhap,0,",",".") ?>
VNĐ</td>
                        <td>&nbsp;</td>
                      
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                       
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        
                      </tr>
                      <?php }?>
                    </tbody>
                     
                    </table>
            	</div>
        </div>
    <div class="block-actions">

        <ul class="actions-left">
            <li><input type="submit" name="" class="button" onclick="saveStatus()" value="<?=$lang->get("dongY")?>"></li>		
            <li><a class="button" id="delete-button" href="javascript:delete_p();" rel=""><?=$lang->get('xoa')?></a></li>
            <li><a href = "" class="button" id = "pradd"  onclick = "javascript:printadd();" target = "_blank"><?=$lang->get('in','trang')?></a></li>
            <li><input type="button" class="button" onclick="tableToExcel('txet')" value="<?=$lang->get('xuat')?>"></li>
            <li><a href = "index.php?options=thuviec" class="button"   target = "_blank">Hộp Đồng</a></li>


<!--       		<li><input class='button' type='button' value="<?//= $lang->get('xoaDong') ?>" onclick='SomeDeleteRowFunction(this)'></li>-->
        </ul>
   </div>
   
   <!-----------------------------------------kinh doanh-------------------------------------------------------------->
     <?php
  	/*$query1 = "Select luongKinhDoanh.*, hoTen, tenCVVi,tenDangVI, maNV 
			  From luongKinhDoanh,hosonv,congty,danghd 
			  Where luongKinhDoanh.adID = hosonv.adID 
			  And hosonv.cvID=congty.cvID 
			  And hosonv.dangID=danghd.dangID";
	$db->QuerySql($query1);
	$result1 = $db->fetchToArray();*/
	
  ?>
  <!-- <div class="block-header">
            <p style="margin-left:20px">Lầu 1,6B ôn Đức Thắng, Phường Bến Nghé, Q1</p>
                    <p style="margin-left:20px">MST:0305715556</p>
                    <p style="text-align:center; font-size:20px;"><strong>BẢNG LƯƠNG</strong></p>
            	<div class="block-content" style=" background:#F2F2F2; overflow-x:scroll; width:1057px;">   
					
                    <table id="txet" class="table">
                    <thead>
                      <tr>
                        <th rowspan="3"><p>Mã NV</p></th>
                        <th rowspan="3"><p class="_w200">Họ Và Tên</p></th>
                        <th rowspan="3"><p class="_w200">Chức Vụ</p></th>
                         <th rowspan="3"><p class="_w200">Loại HĐ LĐ</p></th>
                        <th rowspan="3"><p class="_w200">Lương CB</p></th>
                        <th colspan="2" rowspan="2"><p class="_w200">PC Chức Vụ</p></th>
                        <th colspan="2" rowspan="2"><p class="_w200">PC Trách Nhiệm</p></th>
                        <th colspan="3" rowspan="2"><p class="_w200">HĐ TV</p></th>
                        <th colspan="5" rowspan="2"><p class="_w200">HĐ CT</p></th>
                        <th rowspan="3"><p class="_w200">PC Độc Hại</p></th>
                        <th rowspan="3"><p class="_w200">PC Xăng</p></th>
                        <th rowspan="3"><p class="_w200">PC Khác</p></th>
                        <th colspan="2" rowspan="2"><p class="_w200">Tiền Ăn</p></th>
                        <th colspan="2" rowspan="2"><p class="_w200">Trừ Lương- Phép</p></th>
                        <th colspan="2" rowspan="2"><p class="_w200">Trừ Nghỉ Không Lương</p></th>
                        <th colspan="3" rowspan="2"><p class="_w200">Sản Lượng</p></th>
                        <th rowspan="3"><p class="_w200">Ngoài Giờ</p></th>
                        <th rowspan="3"><p class="_w200">Dán Nhãn Chai</p></th>
                        <th rowspan="3"><p class="_w200">Nhận Tàu</p></th>
                        <th rowspan="3"><p class="_w200">Tiền Ăn Tăng Ca</p></th>
                        <th rowspan="3"><p class="_w200">Tiền ISO/GHS/Khác</p></th>
                        <th rowspan="3"><p class="_w200">SS SL</p></th>
                        <th rowspan="3"><p class="_w200">Tổng Thu</p></th>
                        <th colspan="2"><p class="_w200">BHXH + BHTN</p></th>
                        <th colspan="2"><p class="_w200">Giảm Trừ Gia Cảnh</p></th>
                        <th rowspan="3"><p class="_w200">Thu Nhập Tính Thuế</p></th>
                        <th rowspan="3"><p class="_w200">Thuế TNCN</p></th>
                        <th rowspan="3"><p class="_w200">Trích KPCĐ</p></th>
                        <th rowspan="3"><p class="_w200">Đã Nhận Tiền Nhận Tàu</p></th>
                        <th rowspan="3"><p class="_w200">Nhận Đợt 1</p></th>
                        <th rowspan="3"><p class="_w200">Nhận Đợt 2 </p></th>
                        <th rowspan="3"><p class="_w200">Chi Dư (-)</p></th>
                        <th rowspan="3"><p class="_w200">Bổ Sung (+)</p></th>
                        <th rowspan="3"><p class="_w200">Còn Lại</p></th>
                        <th rowspan="3"><p class="_w200">Tổng Thu Nhập</p></th>
                     </tr>
                  
                      <tr>
                        <th class="_w100"><p>DN trả</p></th>
                        <th class="_w100"><p>NLĐ trả</p></th>
                        <th rowspan="2" class="_w100"><p>Số Người</p></th>
                        <th rowspan="2" class="_w100"><p>TT</p></th>
                     </tr>
                      <tr>
                        <th class="_w100"><p>Hệ Số</p></th>
                        <th class="_w100"><p>TT</p></th>
                        <th class="_w100"><p>Hệ Số</p></th>
                        <th class="_w100"><p>TT</p></th>
                        <th><p>T/g BĐ-KT TV</p></th>
                        <th><p>Ngày</p></th>
                        <th><p>TT</p></th>
                        <th class="_w100"><p>Có Mặt</p></th>
                        <th class="_w100"><p>Nữa Buổi</p></th>
                        <th class="_w100"><p>Nghĩ Phép</p></th>
                        <th class="_w100"><p>Vắng Mặt</p></th>
                        <th class="_w100"><p>TT</p></th>
                        <th class="_w100"><p>Số Ngày</p></th>
                        <th class="_w100"><p>TT</p></th>
                        <th class="_w100"><p>Số Ngày</p></th>
                        <th class="_w100"><p>TT</p></th>
                        <th class="_w100"><p>Số Ngày</p></th>
                        <th class="_w100"><p>TT</p></th>
                        <th><p>Định Mức</p></th>
                        <th><p>Sản Lượng</p></th>
                        <th><p>TT</p></th>
                        
                        <th class="_w100"><p>23%</p></th>
                        <th class="_w100"><p>9,5%</p></th>
                        
                      </tr>
                 </thead>
                 <tbody>
                      <?php
					  //foreach($result1 as $rel){
						//echo $rel['hoTen'];
					  ?>
                      <tr>
                        <td><?//= $rel['maNV']?></td>
                        <td><?//= $rel['hoTen']?></td>
                        <td><?//= $rel['tenCVVi']?></td>

                        <td><?//= $rel['tenDangVI']?></td>
                        <td><?//=number_format($rel['luongCB'],0,",",".")?> VNĐ</td>
                        <td><?//= $rel ['hSCV']?></td>
                        <td><?//=number_format($rel['tienHSCV'],0,",",".")?> VNĐ</td>
                        <td><?//= $rel ['hSTN']?></td>
                        <td><?//=number_format($rel['tienHSTN'],0,",",".")?> VNĐ</td>
                        <td><?//= $rel ['ngayThuviec']->format("d/m/Y")?> - <?//= $rel ['ngayKetThuc']->format("d/m/Y")?> </td>
                        <td><?//= $rel ['tongNgay']?></td>
                        <td></td>
                        <td><?//= $rel ['coMat']?></td>
                        <td><?//= $rel ['nuaBuoi']?></td>
                        <td><?//= $rel ['nghiPhep']?></td>
                        <td><?//= $rel ['vangMat']?></td>
                        <td></td>
                        <td><?//= $rel ['docHai']?></td>
                        <td><?//= $rel ['xang']?></td>
                        <td><?//= $rel['phuCap'];?> VNĐ</td>
                        <td><?//= $rel ['ngayCom']?></td>
                        <td><?//= number_format($rel['tongCom'],0,",",".")?> VNĐ</td>
                        <td><?//= $rel ['nghiPhep']?></td>
                        <td><?//= number_format($rel['tongPhep'],0,",",".") ?> VNĐ</td>
                        <td><?//= $rel ['vangMat']?></td>
                        <td><?//= number_format($rel['tongVang'],0,",",".") ?> VNĐ</td>
                        <td><?//= $rel ['sLCT']?></td>
                        <td><?//= $rel ['tiLeSanLuong']?></td>
                        <td>&nbsp;</td>
                        <td ><?//= number_format($rel['lamNgoaiGio'],0,",",".")?>
                        VNĐ</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><?//= number_format($rel['baoHiemDN'],0,",",".") ?>
VNĐ</td>
                        <td><?//= number_format($rel['baoHiemNLD'],0,",",".") ?>
VNĐ</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>                      
                        <td>&nbsp;</td>                      
                        <td>&nbsp;</td>                      
                        <td><?//= number_format($rel['tongLuong'],0,",",".") ?> VNĐ</td>                      
                      </tr>
                      <?php //}?>
                      <tr>
                        <td>&nbsp;</td>
                        <td colspan="2">Tổng lương...(bộ Phận)</td>
                        <td>&nbsp;</td>
                        <td><?//= number_format($rel['sumluongcb'],0,",",".") ?> VNĐ</td>
                        
                        <td><?//= $rel ['sumhscv']?></td>
                        <td><?//= number_format($rel['sumtienhscv'],0,",",".") ?>
VNĐ</td>
                        <td><?//= $rel ['sumhstn']?></td>
                        <td><?//= number_format($rel['sumtienhstn'],0,",",".") ?>
VNĐ</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><?//= $rel ['sumcomat']?></td>
                        <td><?//= $rel ['sumnuabuoi']?></td>
                        <td><?//= $rel ['sumnghiphep']?></td>
                        <td><?//= $rel ['sumvangmat']?></td>
                        <td>&nbsp;</td>
                        <td><?//= number_format($rel['sumdochai'],0,",",".") ?>
VNĐ</td>
                        <td>&nbsp;</td>
                        <td><?//= number_format($rel['sumphucap'],0,",",".") ?>
VNĐ</td>
                        <td><?//= $rel ['sumngaycom']?></td>
                        <td><?//= number_format($rel['sumtongcom'],0,",",".") ?>
VNĐ</td>
                        <td><?//= $rel ['sumnghiphep']?></td>
                        <td><?//= number_format($rel['sumtongphep'],0,",",".") ?>
VNĐ</td>
                        <td><?//= $rel ['sumvangmat']?></td>
                        <td><?//= number_format($rel['sumtongvang'],0,",",".") ?>
VNĐ</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        
                      </tr>
                    </tbody>
                     
                    </table>
            	</div>
    </div>
    <div class="block-actions">

        <ul class="actions-left">
            <li><input type="submit" name="" class="button" onclick="saveStatus()" value="<?//=$lang->get("dongY")?>"></li>		
            
            <li><a class="button" id="delete-button" href="javascript:delete_p();" rel=""><?//=$lang->get('xoa')?></a></li>
            <li><a href = "pr_add.php" class="button" id = "pradd"  onclick = "javascript:printadd();" target = "_blank"><?//=$lang->get('in','trang')?></a></li>
            <li><input type="button" class="button" onclick="tableToExcel('txet')" value="<?//=$lang->get('xuat')?>"></li>
        </ul>
   </div>-->
   
 </div>
 
    <script type="text/javascript">
		$('table#txet > tbody > tr').click(function(){
			$("#edit-button").attr('rel',$(this).attr('rel'));
			$("#delete-button").attr('rel',$(this).attr('rel'));
			$("#pradd").attr('rel',$(this).attr('rel'));
			
		});
		
		function printadd(){	
		$('table#txet > tbody > tr').click(function(){
		var print_id = $("#pradd").attr("rel");
		var targetbox = $('a#pradd').attr("href","server/salary/hopdonglaodong.php?adID="+print_id);
		// $('#pradd').html(targetbox);
		}
		)};
var tableToExcel = (function() {
  var uri = 'data:application/vnd.ms-excel;base64,'
    , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--><meta http-equiv="content-type" content="text/plain; charset=UTF-8"/></head><body><table>{table}</table></body></html>'
    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
  return function(table, name) {
    if (!table.nodeType) table = document.getElementById(table)	
    var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML,}
	//var p = document.getElementById('tdecore')
	//p.style.textDecoration = 'none';
    window.location.href = uri + base64(format(template, ctx))
  }
})()
</script>

<script type = "text/javascript">
function SomeDeleteRowFunction(o) {
     var p=o.parentNode.parentNode;
         p.parentNode.removeChild(p);
}
</script>