<style type="text/css">
.cd_0 { color:#F00}
td.tooltipa {outline:none; }
td.tooltipa strong {line-height:30px;}
td.tooltipa:hover {text-decoration:none;} 
td.tooltipa span {
    z-index:10;display:none; padding:14px 20px;
    margin-top:-30px; margin-left:10px;
    width:300px; line-height:16px;
}
td.tooltipa:hover span{
    display:inline; position:absolute; color:#111;
    border:1px solid #DCA; background:#fffAF0; z-index:9999}
.callout {z-index:20;position:absolute;top:30px;border:0;left:-12px;}
    
/*CSS3 extras*/
td.tooltipa span
{
    border-radius:4px;
    -moz-border-radius: 4px;
    -webkit-border-radius: 4px;
    -moz-box-shadow: 5px 5px 8px #CCC;
    -webkit-box-shadow: 5px 5px 8px #CCC;
    box-shadow: 5px 5px 8px #CCC;
}

</style>
 <?php
  	$query = "select adID, tenCVVi,hinhanh,namSinh,dienThoai, hoTen,noiLamViec,thamgiacongdoan,ngaythamgiaCD,tenDangVI,luongCB from congty,hosonv,danghd where hosonv.cvID=congty.cvID and hosonv.dangID=danghd.dangID and nhomID=1";
	$db->QuerySql($query);
	$result = $db->fetchToArray();
	
  ?>
 
  					
                    <table id="txet" class="table">
                    <thead>
                      <tr>
                        <th><p>Họ Tên</p></th>
	                    <th><p>Lương CB</p></th>
                        <th><p>Kinh Phí CĐ 2%</p></th>
                        <th><p>Đoàn Phí 1%</p></th>
                        <th><p>Tham Gia</p></th>
                        <th><p>Tình Trạng</p></th>
                        <th><p>Ngày Tham Gia</p></th>
                        <th><p>Tổng Cộng</p></th>
                        <th><p></p></th>
                     </tr>
                     
                 </thead>
                 <tbody>
                      <?php
					  foreach($result as $rel){
						$relKP = $rel['luongCB']*2/100*$rel['thamgiacongdoan'];
						$relDP = $rel['luongCB']*1/100*$rel['thamgiacongdoan'];
						$relTC = ($relKP + $relDP) *$rel['thamgiacongdoan']
					  ?>
                      <tr rel="<?=$rel['adID']?>" id="<?=$rel['adID']?>" class=" cd_<?= $rel['thamgiacongdoan']?>">
                      
                        <td class="tooltipa"><?= $rel['hoTen']?>
                         <span>
                         <div style="float:left; margin-right:10px">
                         	<img style="width:100px;" src="<?= $rel['hinhanh']?>" />
                         </div>
                         <div style="float:left">
                        	<strong>Chức Vụ:</strong>&nbsp;&nbsp;&nbsp;<?= $rel ['tenCVVi'];?><br />
                        	<strong>Nơi Làm Việc:</strong>&nbsp;&nbsp;&nbsp;<?= $rel ['noiLamViec'];?><br />
                        	<strong>Năm Sinh:</strong>&nbsp;&nbsp;&nbsp;<?= $rel ['namSinh']->format("d/m/Y");?><br />
	                        <strong>Số Điện Thoại:</strong>&nbsp;&nbsp;&nbsp;<?= $rel ['dienThoai'];?><br />
    					</div>
                      </span>
                        </td>
                        <td><?= $rel['luongCB']?></td>
       					<td><?= $relKP ?></td>
       					<td><?= $relDP ?></td>
                        <td><?= ($rel['thamgiacongdoan']==1)? "Đã Tham Gia": "Chưa Tham Gia"?></td>
                        <td><?= $rel['tenDangVI']?></td>
                        <td>
							<?php
							 	if(isset( $rel ['ngaythamgiaCD'])==true){
								echo $rel ['ngaythamgiaCD']->format("m/Y");}
								elseif ($rel['thamgiacongdoan']==0){
								echo "";
							}
							?>
								
                        		
                        </td>
       					<td><?= $relTC ?></td>
                        <td>
                        <a class="button" href="index.php?options=capnhatcongdoan&amp;adID=<?= $rel['adID']?>">Cập Nhật</a> 

                        </td>
                      </tr>

					   <?php }?>		
                     <tr style="height:100px;"></tr>
                      
                    </tbody>
                     
                    </table>
