 <?php
  	$query = "Select luongVanPhong.*, hoTen, tenCVVi,tenDangVI, maNV,thuong1,thuong2,thuong3,thuong4,chidot1,chidot2,chidot3,chidot4,chidot5
			  From luongVanPhong,hosonv,congty,danghd 
			  Where luongVanPhong.adID = hosonv.adID
			  And hosonv.cvID=congty.cvID  
			  And hosonv.dangID=danghd.dangID";
	$db->QuerySql($query);
	$result = $db->fetchToArray();
	
	$tinhtong ="select sum(luongCB) as sumluongcb ,sum(hSCV) as sumhscv ,sum(tienhSCV) as sumtienhscv , sum(hSTN) as sumhstn ,sum(tienhSTN) as sumtienhstn ,sum(coMat) as sumcomat ,sum(nuaBuoi) as sumnuabuoi ,sum(nghiPhep) as sumnghiphep ,sum(vangMat) as sumvangmat ,sum(docHai) as sumdochai,sum(phuCap) as sumphucap,sum(ngayCom) as sumngaycom,sum(tongCom) as sumtongcom,sum(nghiPhep) as sumnghiphep,sum(tongPhep) as sumtongphep,sum(vangMat) as sumvangmat,sum(tongVang) as sumtongvang,sum(tongLuong) as sumtongLuong
				from luongVanPhong 
				";
  	$db->QuerySql($tinhtong);
	$tongluongcb = $db->fetchToArray();
  ?>
  					
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
            	