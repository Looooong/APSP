<style type="text/css">
.bh_0 { color:#F00}
</style>
 <?php
  	$query = "Select adID,hoTen ,luongCB,thamgiabh,tenDangVI from hosonv,danghd where hosonv.dangID=danghd.dangID and nhomID=1";
	$db->QuerySql($query);
	$result = $db->fetchToArray();
	
  ?>
  					
                    <table id="txet" class="table">
                    <thead>
                      <tr>
                        <th><p>Họ Tên</p></th>
	                    <th><p>Lương CB</p></th>
                        <th><p>Mức Nộp BHXH 24%</p></th>
                        <th><p>Mức Nộp BHYT 4.5%</p></th>
                        <th><p>Mức Nộp BHTN 2%</p></th>
                        <th><p>Tham Gia</p></th>
                        <th><p>Tình Trạng</p></th>
                      	<th><p>Tổng Cộng</p></th>
                        <th><p></p></th>
                     </tr>
                     
                 </thead>
                 <tbody>
                      <?php
					  foreach($result as $rel){
						$relXH = $rel['luongCB']*24/100*$rel['thamgiabh'];
						$relYT = $rel['luongCB']*4.5/100*$rel['thamgiabh'];
						$relTN = $rel['luongCB']*2/100*$rel['thamgiabh'];
						$relTC = $relXH + $relYT + $relTN
					  ?>
                      <tr rel="<?=$rel['adID']?>" id="<?=$rel['adID']?>" class="bh_<?=$rel['thamgiabh']?>">
                        <td><?= $rel['hoTen']?></td>
                        <td><?= $rel['luongCB']?></td>
       					<td><?= $relXH ?></td>
       					<td><?= $relYT ?></td>
       					<td><?= $relTN ?></td>
                        <td><?= ($rel['thamgiabh']==1)? "Đã Tham Gia": "Chưa Tham Gia"?></td>
                        <td><?= $rel['tenDangVI']?></td>
       					<td><?= $relTC ?></td>
                        <td>
                        <a class="button" href="index.php?options=capnhatbh&amp;adID=<?= $rel['adID']?>">Cập Nhật</a> 
                        </td>
                      </tr>
								
                      <?php }?>
                      
                    </tbody>
                     
                    </table>
            	