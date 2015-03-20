<style>
* { padding: 0px; margin:0px;}
.fl { float:left}  .fr { float:right}   .clr { clear:both}
.haivl { width:980px; margin:0 auto;}
.sup { vertical-align:super}
.content_saigon_1 { width:150px}
.content_saigon_2 { width:300px; border-bottom:1px solid #000}
.table{ width:100%}
.content{ background:#CCC; border-left:1px solid #000}

.table p { text-align:center}
.table tbody tr{height:30px;}
.footer { width:978px; border:1px solid #000;  overflow:hidden;background:#FFF}
.footer_1 { width:325px; min-height:100px; text-align:center}
.width_50{ width:50%} .width_35{ width:35%}  .width_15{ width:15%; margin-left: -1px; border-right:1px solid #000}
.div_haivl { height:108px; text-align:center; border-bottom:1px solid #000;border-left:1px solid #000}
</style>
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
    <p style=" float:right">Ref.No.:<strong> SN-2013</strong></p>
    <div class="clr"></div>
    <div class="title_saigon">
    	<h2 style="text-align:center">LỆNH SẢN XUẤT</h2>
        <h4 style="text-align:center">Work Order (WKO)</h4>
    </div>
    <div class="content">
    <?php
		$id = $_REQUEST['ID'];
		
		$query = "SELECT productOrder.*, tensp FROM productOrder
						INNER JOIN dmspham ON goodsID = maso
					WHERE ID = $id";
		$db->querySQL($query);
		$product = $db->fetchArray();
	?>
<table class="table" cellpadding="0" cellspacing="0" border="1" style="background:#FFF">
        	<tbody>
            	<tr>
                	<td>
                    	<div class="fl">
                   		  <p class="content_saigon_1">Ngày Xuất Phiếu<br>
                   		  <span style="font-size: 10px">LBA Issue Date</span></p>
                    	</div>
                        <div class="fl">
                        	<p align="center" style="text-align:center; line-height:30px"><strong><?=$product['date']->format('d/m/Y')?></strong></p>
                        </div>
                  </td>
                	<td>
                    	<div class="fl">
                   		  <p class="content_saigon_1">Yêu Cầu Số</p>
                   		  <p class="content_saigon_1"><span style="font-size: 10px">Order. Ref.	</span><br>
               		      </p>
                    	</div>
                        <div class="fl">
                        	<p align="center" style="text-align:center; line-height:30px"><strong></strong></p>
                        </div>
                  </td>
                  <td>
                    	<div class="fl">
                   		  <p class="content_saigon_1">Phiếu Số<br>
                   		  <span style="font-size: 10px">LBA No.</span></p>
                    	</div>
                        <div class="fl">
                        	<p align="center" style="text-align:center; line-height:30px"><strong></strong></p>
                        </div>
                  </td>
                </tr>
                <tr>
                	<td colspan="2">
                    	<div class="fl">
                   		  <p class="content_saigon_1">Khách Hàng<br>
               		      <span style="font-size:10px">Customer</span></p>
                    	</div>
                        <div class="fl">
                        	<p align="center" style="text-align:center;">APSP Salse & Marketing</p>
                        </div></td>
                  <td>
                    	<div class="fl">
                   		  <p class="content_saigon_1">Sản Phẩm<br>
                   		  <span style="font-size: 10px">Product</span></p>
                    	</div>
                        <div class="fl">
                        	<p align="center" style="text-align:center; line-height:30px"><strong><?=$product['tensp']?></strong></p>
                        </div>
                  </td>
                </tr>
                
            </tbody>
        </table>
       <table class="table" cellpadding="0" cellspacing="0" border="1" style=" margin-top: -2px;background:#FFF ">
       	  
       		   <tr>
                	<th colspan="6"><h4>YÊU CẦU CÔNG VIỆC / PRODUCTION REQUST</h4></th>
         </tr>
            	<tr>
                	<th><p>Ngày Thực Hiện</p>
                	<p style="font-size:10px">Operation Date</p></th>
                    <th><p>Loại Hình Công Việc</p>
                    <p style="font-size:10px">Operation Type</p></th>
					<th><p>ĐVT</p>
					<p style="font-size:10px">Unit</p></th>
                    <th><p>S.Lượng</p>
                    <p style="font-size:10px">Quantity</p></th>
                	<th><p>S.Lg Lấy Theo Lít</p>
                	<p style="font-size:10px">Qty. used inLitre</p></th>
                	<th><p>S.Lg Lấy Theo Kgs</p>
                	  <p style="font-size:10px">Qty. used in Kgs</p></th>
                      <th><p>Số Mẻ SX</p>
                	  <p style="font-size:10px">Batch No.</p></th>
					<th rowspan="2"><p>Người Yêu Cầu</p>
                	  <p style="font-size:10px">Ordered by</p>
                   </th>
                </tr>
               <tr>
               		<td></td>
               		<td><p>Pha Trộn Dầu Nhờn</p>
                    <p style="font-size:10px">Lubricant Blending</p></td>
               		<td></td>
               		<td></td>
               		<td></td>
               		<td></td>
               		<td></td>
   		 </tr>
 <tr>
               		<td></td>
               		<td><p>Bơm Hàng Xe Bồn</p>
                    <p style="font-size:10px">Tanker Loading</p></td>
               		<td></td>
               		<td></td>
               		<td></td>
               		<td></td>
               		<td></td>
               		<td rowspan="2"><p>Nhận Yêu Cầu</p>
                    <p style="font-size:10px">Received by</p></td>
               
</tr>
 <tr>
               		<td></td>
               		<td>
                    	<p>Bơm Hàng Ra Phuy</p>
       					<p style="font-size:10px">Drum Filling</p>
                    </td>
               		<td></td>
               		<td></td>
               		<td></td>
               		<td></td>
               		<td></td>
   		 </tr>
              
                
      </table>
      <div class="width_35 fl">
      	<table class="table" cellpadding="0" cellspacing="0" border="1" style="margin-top:-2px;background:#FFF">
        	<thead>
            	<tr>
                	<th colspan="3"><p>Vật Liệu Đóng Gói / Packing Matrials</p></th>
                </tr>
                <tr style="height:44px">
                	<th rowspan="2"><p>	
                    	<span class="content_saigon_1">Diễn Giải</span><br>
                   		 <span style="font-size: 10px">Desscription</span></p></th>
                	<th rowspan="2"><p><span class="content_saigon_1">Loại</span><br>
                    <span style="font-size: 10px">Type</span></p></th>
               	  <th rowspan="2"><p><span class="content_saigon_1">S.Lượng</span><br>
                  <span style="font-size: 10px">Quantity</span></p></th>
                </tr>
                
            </thead>
            <tbody>
              <?php
				$query = "SELECT name, volCap, quantity FROM productOrderDetailPack
							INNER JOIN packages ON packID = ID
							WHERE orderID = $id";
				$db->querySQL($query);
				$materials = $db->fetchToArray();
				
				foreach ($materials as $data) {
				?>
                <tr>
                	<td><?=$data['name']?></td>
                    <td><?=$data['volCap']?></td>
                    <td><?=$data['quantity']?></td>
                </tr>
                <?php
				};
		   ?>
            </tbody>
            <tbody>
                <tr>
               	  <td colspan="3"><p>Vật Liệu Phát Sinh/ Arisen Materials</p></td>
                  
                </tr>
          </tbody>
        
        </table>
      
      </div>
       <div class="width_50 fl">
      		<table  class="table" cellpadding="0" cellspacing="0" border="1" style="margin-top:-2px; margin-left:-2px;background:#FFF">
            	<thead>
                	<tr>
                    	<th colspan="6">
                        	<p>Nguyên Liệu Sản Xuất (kg) / Raw Materials (kgs)</p>
                        </th>
                    </tr>
                    <tr>
                    	<th rowspan="2"><p>	
                    	<span class="content_saigon_1">Diễn Giải</span><br>
                   		 <span style="font-size: 10px">Desscription</span></p></th>
                    	<th rowspan="2"><p><span class="content_saigon_1">Nguồn</span><br>
                    	<span style="font-size: 10px">Soure</span></p>                    </th>
                    	<th colspan="2"><p>Công Thức/ Formula</p>                    	 </th>
                    	<th colspan="2"><p>Thực Xuất / Stock-out</p>                    	</th>
                   	</tr>
                     <tr>
                    	<td><p>Litre</p></td>
                    	<td><p>Kilogram</p></td>
                    	<td><p>Litre</p></td>
                    	<td><p>Kilogram</p></td>
                    </tr>
                
                </thead>
                <tbody>
                 <?php
				$query = "SELECT name, source, kg, d30 FROM productOrderDetail
							INNER JOIN materials ON materialID = ID
							WHERE orderID = $id";
				$db->querySQL($query);
				$materials = $db->fetchToArray();
				
				$sum = 0;
				foreach ($materials as $data) {
				?>
                <tr>
                	<td><?=$data['name']?></td>
                    <td><?=$data['source']?></td>
                    <td><?=number_format((float) $data['kg']/$data['d30'], 3)?></td>
                    <td><?=$data['kg']?></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php
				$sum += (float) $data['kg'];
				};
		   ?>
                </tbody>
                <tbody>
                     <tr>
                    	<td colspan="6"><p>Nguyên Liệu Phát Sinh / Arisen Materials</p></td>
                    </tr>
                </tbody>
            </table>
      
      </div>
       <div style="background:#FFF" class="width_15 fl">
            <div class="div_haivl">
            	<p>Lập Công Thức</p>
               	<p style="font-size:10px">Formulation by</p>
            </div>
             <div class="div_haivl">
            	<p>Giao Vật Liệu</p>
               	<p style="font-size:10px">Stock-out by</p>
            </div>
             <div class="div_haivl">
            	<p>Nhận Vật Liệu</p>
               	<p style="font-size:10px">Receive Materials             </p>
             </div>
             <div class="div_haivl">
            	<p>Chấp Thuận Thêm</p>
               	<p style="font-size:10px">Arisen approval</p>
            </div>
             <div style="padding-bottom:1px;" class="div_haivl">
            	<p>Người Nhận Thêm</p>
               	<p style="font-size:10px">Arisen received</p>
            </div>
      </div>
      <table class="table" cellpadding="0" cellspacing="0" border="1" style=" margin-top: -2px;background:#FFF ">
         <tr>
           <th colspan="6"><h4>DỮ LIỆU SẢN XUẤT/ PRODUCTION DATA</h4></th>
         </tr>
         <tr>
           <th><p>Bồn Trộn</p>
             <p style="font-size:10px">Blend Tank</p></th>
           <th><p>Cài Máy Đóng</p>
             <p style="font-size:10px">Filler Setting</p></th>
           <th><p>Trọng Lượng Tịnh</p>
             <p style="font-size:10px">Net Weight (kgs)</p></th>
           <th rowspan="2" width="50%" style="vertical-align:top"><p style="text-align:left; margin-top:1px; ">Ghi Chú/Remarks</p></th>
           
         </tr>
         <tr>
           <td>&nbsp;</td>
           <td><p>&nbsp;</p></td>
           <td><?=number_format($sum, 3)?></td>
           
         </tr>
        
         
      </table>
<div class="clr"></div>
          <div class="footer">
             
               <div style="border-right:1px solid #000" class="footer_1 fl">
                <p>TP.Kế Hoạch &amp; Điều Vận</p>
                <p style="font-size:10px">Planning &amp; Logistics Manager</p>
           

            </div>
               <div style="border-right:1px solid #000;"class="footer_1 fl">
                <p>TP. Công Nghệ / Sản Xuất</p>
                <p style="font-size:10px">Processing & Productoin Manager</p>
          
              </div>
               <div class="footer_1 fl">
                <p>Giám Đốc Nhà Máy</p>
                <p style="font-size:10px">Plan Director</p>
               

              </div>
	  </div>          
          
    </div>
</div>
