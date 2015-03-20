
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
                    	<th><p><input id="importDate" type="text" value="<?=(is_object($arr_Order['date']) && get_class($arr_Order['date']) == "DateTime") ? $arr_Order['date']->format('d/m/Y') : $arr_Order['date']?>" /></p></th>
                    	<th><p><select id="importStatus" onchange="changeStatus(this)">
											<option value = "0" <?=(!$arr_Order['status']) ? "selected='selected'" : ""?>>CHƯA NHẬP</option>
											<option value = "1" <?=($arr_Order['status']) ? "selected='selected'" : ""?>>ĐÃ NHẬP</option>
										</select></p></th>
                    	<th> <p><input id="importFinish" disabled="disabled" type="text" value = "<?=(is_object($arr_Order['finish']) && get_class($arr_Order['finish']) == "DateTime") ? $arr_Order['finish']->format('d/m/Y') : $arr_Order['finish']?>" /></p></th>
						<th> <p><input id="importQuantity" type="text" value = "<?=$arr_Order['quantity']?>" /></p></th>
                    
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