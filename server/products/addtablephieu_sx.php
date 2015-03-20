<div class="block-border">
<?php   

$query = "SELECT * FROM productOrder where ID = '".$_REQUEST['ID']."'";
$db->querySql($query);
$arr_Order = $db->fetchArray();
$query = "SELECT productOrder.status, productOrder.date,productOrderDetail.materialID, productOrder.goodsID,productOrder.finish,productOrderDetail.*,materials.ID, materials.name FROM productOrder,productOrderDetail,materials 
WHERE productOrder.ID = productOrderDetail.orderID
AND materials.ID = productOrderDetail.materialID
AND productOrder.ID = '".$_REQUEST['ID']."'";
$db->querySql($query);
$arr_material = $db->fetchToArray();
$query = "SELECT * FROM productOrderDetailPack INNER JOIN packages ON packID = ID WHERE OrderID = '".$_REQUEST['ID']."'";
$db->querySql($query);
$arr_packgae = $db->fetchArray();

?>

<div class="block-border">
	<div class="block-header">
		<h1>Thông tin phiếu đã nhập</h1><span></span>
	</div>
	
	<div class="block-content">
           <table class="table">
				<thead>
                    <tr>
                       <th>
							<p>Ngày Lập Lệnh:</p>
                       </th>
                       <th>
							<p>Trạng Thái: </p>
                       </th> 
                       <th>
							<p>Ngày Hoàn Tất:</p>
						</th>
						
						<th>
							<p>Số Lượng:</p>
						</th>
                    </tr>
             </thead>
             <tbody>
			     <tr>
                    	<td><p><?=(is_object($arr_Order['date']) && get_class($arr_Order['date']) == "DateTime") ? $arr_Order['date']->format('d/m/Y') : $arr_Order['date']?></p></td>
                    	<td><p>
						<?php
						if($arr_Order['status'] == 1){
									echo 'ĐÃ NHẬP';		
						}
						if($arr_Order['status'] == 0){
									echo 'CHƯA NHẬP';		
						}
										?></p></td>
                    	<td> <p><?=(is_object($arr_Order['finish']) && get_class($arr_Order['finish']) == "DateTime") ? $arr_Order['finish']->format('d/m/Y') : $arr_Order['finish']?></p></td>
						<td> <p><?=$arr_Order['quantity']?></p></td>
                    
                    </tr>
			</tbody>
            </table>
            <table class="table">
           	 <thead>
                    <tr>
                    	<th>
							<p>Tên</p>                        
                        </th>
                     
                        <th>
							<p>Trọng Lượng</p>                        
                        </th>
                    </tr>
               </thead>
               
               <tbody id="updateDMspham">
			   <?php   
					foreach($arr_material as $materi){
			   ?>
                                  
                    <tr id = "del<?= $materi['ID'] ?>">
                    <td><p><?=$materi['name']?></p></td>
                    <td><p><?=$materi['kg']?></p></td>
                    

            </tr>   
			<?php  } ?>
			
			</tbody> 
           </table>
		   <div class="block-header">
				<h1>NGUYÊN LIỆU ĐÓNG GÓI</h1><span></span>
			</div>
		   <table class="table">
				<thead>
                    <tr>
                       <th>
							<p>Tên Nguyên Liệu:</p>
                       </th>
                       <th>
							<p>Ghi Chú:</p>
                       </th> 
                       <th>
							<p>Khối Lượng:</p>
						</th>
						
						<th>
							<p>Thể Tích:</p>
						</th>
                    </tr>
             </thead>        
            <tbody>
             <tr>
                <td><p><?=$arr_packgae['name']?></p></td>
                <td><p><?=$arr_packgae['note'] ?></p></td>
                <td><p><?=$arr_packgae['kg']?></p></td>
                <td><p><?=$arr_packgae['volCap']?></p></td>
            </tr>
            </tbody>
          </table>
        </div>
        <div class="block-actions-tab block-actions">
            <ul style=" margin-top:3px;" class="actions-left">
           		 <li><input type = "button" onclick = "callPrint_sx(<?=$_REQUEST['ID']?>)" class="button" VALUE = "IN LỆNH SẢN XUẤT"/></li>
				 <li><input type = "button" onclick = "callPrint_bc(<?=$_REQUEST['ID']?>)" class="button" VALUE = "IN BÁO CÁO PHA TRỘN DẦU NHỜN"/></li>
				 <li><input type = "button" onclick = "callPrint_ct(<?=$_REQUEST['ID']?>)" class="button" VALUE = "IN CÔNG THỨC PHA TRỘN DẦU NHỜN"/></li>
				 <li><input type = "button" onclick = "callPrint_pt(<?=$_REQUEST['ID']?>)" class="button" VALUE = "IN PHIẾU PHA TRỘN DẦU NHỜN"/></li>
            </ul>
            <ul style=" margin-top:3px;" class="actions-left">
           		 <li><a class="button" onclick="document.getElementById('createForm').innerHTML = ''">Hủy</a></li>
            </ul>
        </div>		
	</div>

	