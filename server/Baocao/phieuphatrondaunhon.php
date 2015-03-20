<style>
* { padding: 0px; margin:0px;}
.fl { float:left}  .fr { float:right}   .clr { clear:both}
.haivl { width:980px; margin:0 auto;}
.sup { vertical-align:super}
.content_saigon_1 { width:150px}
.content_saigon_2 { width:300px; border-bottom:1px solid #000}
.table{ width:100%}
.table p { text-align:center}
.table tbody tr{height:30px;}
.footer { width:978px; border:1px solid #000; border-top:none; overflow:hidden}
.footer_1 { width:325px; min-height:200px; text-align:center}
</style>
<?php
	$id = $_REQUEST['ID'];
	
	$query = "SELECT productOrder.*, tensp, maso FROM productOrder
					INNER JOIN dmspham ON goodsID = maso
				WHERE ID = $id";
	$db->querySQL($query);
	$product = $db->fetchArray();
?>
<div class="haivl">
	<div class="haivl_saigon">
    	<div class="haivl_saigon_left fl">
        	<h2>AP SAIGON PETRO JSC</h2>
            <p>Office: 1<span class="sup">st</span>Floor, 6B Ton Duc Thang St, Dist, HCMC, Viet Nam</p>
            <p>Plan:990 Nguyen Thi Dinh St.District 2, HCMC, Viet Nam</p>
        </div><!--haivl_saigon_left-->
        <div class="haivl_saigon_right fr">
        	<img style="width:200px;" src="http://<?=$_SERVER['SERVER_NAME'];?>/apsp/src/img/bg/apsp.png">
        </div><!--haivl_saigon_right-->
    </div><!--haivl_saigon-->
    <div class="clr"></div>
    <div class="title_saigon">
    	<h2 style="text-align:center">PHIẾU PHA TRỘN DẦU NHỜN</h2>
        <h4 style="text-align:center">PRODUCTION JOB SLIP</h4>
    </div>
    <div class="content">
        <div style="float:left">
           <table style=" width:50%;">
        	<tbody>
            	<tr>
                	<td><p class="content_saigon_1">Ngày:<br><span style="font-size:10px">Date</span></p></td>
                    <td><p class="content_saigon_2"><?=$product['date']->format('d/m/Y')?></p></td>
               	</tr>
                <tr>
                	<td><p class="content_saigon_1">Sản Phẩm:<br><span style="font-size:10px">Product.</span></p></td>
                    <td><p class="content_saigon_2"><?=$product['tensp']?></p></td>
               	</tr>
                <tr>
                	<td><p class="content_saigon_1">Mã Sản Phẩm:<br><span style="font-size:10px">Product code</span></p></td>
                    <td><p class="content_saigon_2"><?=$product['maso']?></p></td>
               	</tr>
                <tr>
                	<td><p class="content_saigon_1">Số Mẻ:<br><span style="font-size:10px">Batch no..</span></p></td>
                    <td><p class="content_saigon_2"></p></td>
               	</tr>
            </tbody>
        </table>
        </div>
        <div style="float:left">
         <table cellpadding="0" cellspacing="0" border="1" style="width:50%; margin-left:15%">
        	<thead>
            <tr>
            	<th colspan="6"><p><strong>QUI CÁCH ĐÓNG GÓI/ PACKING MODE</strong></p></th>
            </tr>
            <tr>
            	<th colspan="2"><p class="content_saigon_1">Số Lượng Bao Bì<br><span style="font-size:10px">Quantity of Packs</span></p></th>
                <th colspan="2"><p class="content_saigon_1">Khối Lượng Tịnh<br><span style="font-size:10px">Net Volume</span></p></th>
                <th colspan="2"><p class="content_saigon_1">Trọng Lượng Tịnh<br><span style="font-size:10px">Net Weight</span></p></th>
            </tr>
            
            </thead>
            <tbody>
            <?php
				$query = "SELECT name, volCap, quantity FROM productOrderDetailPack
							INNER JOIN packages ON packID = ID
							WHERE orderID = $id
								AND volCap > 0";
				$db->querySQL($query);
				$materials = $db->fetchToArray();
				$sum = 0;
				foreach ($materials as $data) {
				?>
                 <tr>
           	 		<td><p><?=$data['quantity']?></p></td>
                	<td><p><?=$data['name']?></p></td>
            		<td><p><?=$data['quantity']*$data['volCap']?></p></td>
                	<td><p>liters</p></td>
            		<td><p></p></td>
                	<td><p>kgs</p></td>
            	</tr>
                <?php
				$sum += $data['quantity']*$data['volCap'];
				};
		   ?>
           
            <tr>
            	<td colspan="2">Lấy mẫu</td>
                <td>
                <?php
					$query = "SELECT sample FROM productOrder WHERE ID = $id";
					$db->querySQL($query);
					$sample = $db->fetchArray();
					
					$sum += $sample['sample'];
				?>
                	<?=$sample['sample']?>
                </td>
                <td><p>liters</p></td>
                <td colspan="2"></td>
            </tr>
            <tr>
            	<td colspan="2"><p>Tổng Cộng</p></td>
            	<td><p><strong><?=$sum?></strong></p></td>
            	<td><p>liters</p></td>
            	<td><p>SG@30<sup>0</sup>C:</p></td>
            	<td><p></p></td>
                
            </tr>
                
            </tr>
            </tbody>
        </table>
</div>
        <div style=" clear:both;height:10px;"></div>
         <table class="table" cellpadding="0" cellspacing="0" border="1">
       	  
          		<tr>
                	<th colspan="8"><h4>CÔNG THỨC/FORMULATION</h4></th>
                </tr>
            	<tr>
                	<th>Nguyên Vật Liệu</p><p style="font-size:10px">Material</p></th>
                    <th><p>Nguồn</p><p style="font-size:10px">Source</p></th>
                	<th><p>SG</p><p style="font-size:10px">@30<sup>0</sup>C</p></th>
                	<th><p>%Weight</p><p style="font-size:10px">Formula.</p></th>
                	<th><p>%Weight</p><p style="font-size:10px">Calculate.</p></th>
                	<th><p>%Weight</p>
                	<p style="font-size:10px">against SG</p></th>
                	<th><p>%Volume</p><p style="font-size:10px">Calculate</p></th>
                	<th><p>Ghi Chú</p><p style="font-size:10px">Remarks</p></th>

                </tr>
                 <?php
				$query = "SELECT ID, name, source, kg, d30, baseOil FROM productOrderDetail
							INNER JOIN materials ON materialID = ID
							WHERE orderID = $id";
				$db->querySQL($query);
				$materials = $db->fetchToArray();
				
				$query = "SELECT materialID, ratio FROM fomula WHERE goodID = ".$product['goodsID'];
				$db->querySQL($query);
				$result = $db->fetchToArray();
				
				foreach ($result as $data) {
					$fomula[$data['materialID']] = $data['ratio'];
				};
				?>
                <tr>
                	<th colspan="8"><h4>DẦU GỐC/BASE OIL</h4></th>
                </tr>
                <?php
                	foreach ($materials as $data) {
						if ($data['baseOil']) {
				?>
            	<tr>
                	<td><?=$data['name']?></td>
                	<td><?=$data['source']?></td>
                	<td><?=$data['d30']?></td>
                	<td><?=$fomula[$data['ID']]."%"?></td>
                	<td><?=number_format((float) $sum*$data['d30']*$fomula[$data['ID']]/100, 3)?></td>
                	<td><?=number_format((float) $sum*$data['d30']*$fomula[$data['ID']]/100/$data['d30'], 3)?></td>
                	<td><?=number_format((float) $sum*$fomula[$data['ID']]/100, 3)?></td>
                    <td></td>
                </tr>
				<?php
						};
					};
				?>
                <tr>
                	<td colspan="4"><p>Tổng Cộng dẦU Gốc /Subtotal Base oil</p></td>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                </tr>
                <tr>
                	<th colspan="8"><h4>PHỤ GIA/ADDITIVE</h4></th>
                </tr>
                <?php
                	foreach ($materials as $data) {
						if (!$data['baseOil']) {
				?>
            	<tr>
                	<td><?=$data['name']?></td>
                	<td><?=$data['source']?></td>
                	<td><?=$data['d30']?></td>
                	<td><?=$fomula[$data['ID']]."%"?></td>
                	<td><?=number_format((float) $sum*$data['d30']*$fomula[$data['ID']]/100, 3)?></td>
                	<td><?=number_format((float) $sum*$data['d30']*$fomula[$data['ID']]/100/$data['d30'], 3)?></td>
                	<td><?=number_format((float) $sum*$fomula[$data['ID']]/100, 3)?></td>
                    <td></td>
                </tr>
				<?php
						};
					};
				?>
                <tr>
                	<td colspan="4"><p>Tổng Cộng Phụ Gia /Subtotal additive</p></td>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                </tr>
				<tr>
                	<td colspan="4"><h4>TỔNG CỘNG/ GRAND TOTAL</h4></td>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                </tr>
                <tr>
                	<td colspan="8"> <p style="float:left"><strong>Ghi Chú /Remarks:</strong></p>
</td>
                </tr>
          </table>
           <table class="table" cellpadding="0" cellspacing="0" border="1" style="margin-top:-2px;">
       	  
          		<tr>
                	<th colspan="8"><h4>KẾT QUẢ KIỂM TRA/ TEST RESULT</h4></th>
                </tr>
            	<tr>
                	<th></th>
                    <th><p>kv@40<sup>0</sup>C</p></th>
                	<th><p>kv@100<sup>0</sup>C</p></th>
                	<th><p>VI</p></th>
                	<th><p>Appr/Color</p></th>
                	<th><p>d15</p></th>
                	<th><p>TBN</p></th>
                	<th><p>Tested by</p></th>

                </tr>
                <tr>
                	<td>Test1</td>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>

                </tr>
                <tr>
                	<td>Test2</td>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>

                </tr>
                <tr>
                
                	<td>Test3</td>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>

                </tr>
                <tr>
                	<td>Pass/Fail</td>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>
                	<td></td>

                </tr>
            </table>
          <div class="footer">
             
               <div style="border-right:1px solid #000" class="footer_1 fl">
                	<p>TP.Nghiên Cứu & P.Triển KCS</p><p style="font-size:10px">R&D and QC Manager</p>
               		<p style="margin-top:100px"><strong>Nguyễn Nam Ninh</strong></p>
              </div>
               <div style="border-right:1px solid #000;"class="footer_1 fl">
                	<p>TP Công Nghệ & SX</p><p style="font-size:10px">Processing & Productoin Manager</p>
                	<p style="margin-top:100px"><strong>Cao Hoang Duy</strong></p>
              </div>
               <div class="footer_1 fl">
                	<p>Giám Đốc Nhà Máy</p><p style="font-size:10px">Plan Director</p>
                	<p style="margin-top:100px"> <strong>Phùng Lễ Minh</strong></p>
              </div>
		</div>          
          
    </div>
</div>