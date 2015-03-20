
<?php   

$query = "SELECT * FROM materialOrder where ID = '".$_REQUEST['ID']."'";
$db->querySql($query);
$arr_Order = $db->fetchArray();
$query = "SELECT materialOrder.status, materialOrder.date, materialOrder.finish,materialOrderDetail.*,materials.name, materials.ID FROM materialOrder,materialOrderDetail,materials 
WHERE materialOrder.ID = materialOrderDetail.orderID
AND materials.ID = materialOrderDetail.materialID
AND materialOrDer.ID = '".$_REQUEST['ID']."'";
$db->querySql($query);
$arr_material = $db->fetchToArray();

?>
<div class="block-border">
	<div class="block-header">
		<h1>Thông tin phiếu đã nhập</h1><span></span>
	</div>
	
	<div class="block-content">
           <table class="table">
				<thead>
                    <tr>
						<th></th>
                       <th>
							<p>Ngày Lập Lệnh:</p>
                       </th>
                       <th>
							<p>Trạng Thái: </p>
                       </th> 
                       <th>
							<p>Ngày Hoàn Tất:</p>
						</th>
                    </tr>
             
			     <tr>
                    	<th></th>
                    	<th><p><input id="importDate" type="text" value="<?=(is_object($arr_Order['date']) && get_class($arr_Order['date']) == "DateTime") ? $arr_Order['date']->format('d/m/Y') : $arr_Order['date']?>" /></p></th>
                    	<th><p><select id="importStatus" onchange="changeStatus(this)">
											<option value = "0" <?=(!$arr_Order['status']) ? "selected='selected'" : ""?>>CHƯA NHẬP</option>
											<option value = "1" <?=($arr_Order['status']) ? "selected='selected'" : ""?>>ĐÃ NHẬP</option>
										</select></p></th>
                    	<th> <p><input id="importFinish" disabled="disabled" type="text" value = "<?=(is_object($arr_Order['finish']) && get_class($arr_Order['finish']) == "DateTime") ? $arr_Order['finish']->format('d/m/Y') : $arr_Order['finish']?>" /></p></th>
                    
                    </tr>
			 
                    <tr>
						<th></th>
                    	<th>
							<p>Tên</p>                        
                        </th>
                        <th>
							<p>Nguồn</p>                        
                        </th>
                        <th>
							<p>Trọng Lượng</p>                        
                        </th>
                    </tr>
               </thead>
               <tbody id="updateMaterial">
			   <?php   
					foreach($arr_material as $materi){
			   ?>
			  
<tr id = "del<?= $materi['ID'] ?>">
<td></td>

<td><p><?=$materi['name']?></p></td>
<td><p><input type = "text" name = "source" value = "<?=$materi['source']?>" /></p></td>
<td><p><input type = "text" name = "kg" value = "<?=$materi['kg']?>" /></p></td>


            </tr>   
			<?php  } ?>
			</tbody> 
           </table>
        </div>
        <div class="block-actions-tab block-actions">
            <ul style=" margin-top:3px;" class="actions-left">
           		 <li><a class="button" onclick="updateOrder()">Đồng Ý</a></li>
            </ul>
            <ul style=" margin-top:3px;" class="actions-left">
           		 <li><a class="button" onclick="document.getElementById('createForm').innerHTML = ''">Hủy</a></li>
            </ul>
        </div>		
	</div>
???PHPTOSCRIPT???
<?php
include "viewUpdate.js";
?>