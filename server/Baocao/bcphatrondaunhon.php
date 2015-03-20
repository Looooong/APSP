<style>
* { padding: 0px; margin:0px;}
.fl { float:left}  .fr { float:right}   .clr { clear:both}
.haivl { width:980px; margin:0 auto;}
.sup { vertical-align:super}
.content_saigon_1 { width:150px}
.content_saigon_2 { width:300px; border-bottom:1px solid #000}
.table{ width:100%}
.table p { text-align:center}
.content{ background:#CCC; border-left:1px solid #000}
.table tbody tr{height:30px;}
.footer { width:978px; border:1px solid #000;  overflow:hidden; background:#fff}
.footer_1 { width:325px; min-height:100px; text-align:center}
</style>
<?php
	$id = $_REQUEST['ID'];
	
	$query = "SELECT productOrder.*, tensp FROM productOrder
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
    <p style=" float:right">Ref.No.:<strong> SN-2013</strong></p>
    <div class="clr"></div>
    <div class="title_saigon">
    	<h2 style="text-align:center">BÁO CÁO PHA TRỘN DẦU NHỚN</h2>
        <h4 style="text-align:center">Lubricant Blending Advice (LBA)</h4>
    </div>
    <div class="content">
       <table style=" background:#fff"  class="table" cellpadding="0" cellspacing="0" border="1">
        	<tbody>
            	<tr>
                	<td>
                    	<div class="fl">
                   		  <p class="content_saigon_1">Ngày Xuất Phiếu<br>
                   		  <span style="font-size: 10px">LBA Issue Date</span></p>
                    	</div>
                        <div class="fl">
                        	<p align="center" style="text-align:center; line-height:30px"><strong><?=$product['date']->format("d/m/Y")?></strong></p>
                        </div>
                  </td>
                	<td>
                    	<div class="fl">
                   		  <p class="content_saigon_1">Yêu Cầu Số</p>
                   		  <p class="content_saigon_1"><span style="font-size: 10px">Order. Ref. </span><br>
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
                        	<p align="center" style="text-align:center;">APSP Sales & Marketing</p>
                        </div></td>
                  <td>
                    	<div class="fl">
                   		  <p class="content_saigon_1">Sản Phẩm<br>
                   		  <span style="font-size: 10px">Product</span></p>
                    	</div>
                        <div class="fl">
                        	<p align="center" style="text-align:center; line-height:30px"><strong><?//=$product['tensp']?></strong></p>
                        </div>
                  </td>
                </tr>
                
            </tbody>
        </table>
<table  class="table" cellpadding="0" cellspacing="0" border="1" style=" margin-top: -2px;  background:#fff ">
         	<thead>
            	<tr>
                	<td colspan="3">
                    	<p style="text-align:center"><strong>THÔNG TIN SẢN PHẨM / PRODUCT INFO</strong></p>
                    </td>
                </tr>
            </thead>
        	<tbody>
            	<tr>
                	<td>
                    	<div class="fl">
                   		  <p class="content_saigon_1">Ngày SảnXuất<br>
                   		  <span style="font-size: 10px">Production Date</span></p>
                    	</div>
                        <div class="fl">
                        	<p align="center" style="text-align:center; line-height:30px"><strong><?=(@$product['finish']->format('d')) ? $product['finish']->format('d/m/Y') : ""?></strong></p>
                        </div>
                  </td>
                	<td>
                    	<div class="fl">
                   		  <p class="content_saigon_1">Mẻ Số:</p>
                   		  <p class="content_saigon_1"><span style="font-size: 10px">Batch No. </span><br>
               		      </p>
                    	</div>
                        <div class="fl">
                        	<p align="center" style="text-align:center; line-height:30px"><strong></strong></p>
                        </div>
                  </td>
                  <td>
                    	<div class="fl">
                   		  <p class="content_saigon_1">Mã Số Sản Phẩm<br>
                   		  <span style="font-size: 10px">Produuct Code.</span></p>
                    	</div>
                        <div class="fl">
                        	<p align="center" style="text-align:center; line-height:30px"><strong></strong></p>
                        </div>
                  </td>
                </tr>
                <tr>
                	<td>
                    	<div class="fl">
                   		  <p class="content_saigon_1">Đạt / Không đạt<br>
               		      <span style="font-size:10px">Passed / Failed</span></p>
                    	</div>
                        <div class="fl">
                        	<p align="center" style="text-align:center; line-height:30px">đạt</p>
                        </div></td>
                  <td colspan="2">
                    	<div class="fl">
                   		  <p class="content_saigon_1">Giải Pháp Đề Xuất<br>
                   		  <span style="font-size: 10px">Solution Propose</span></p>
                    	</div>
                        <div class="fl">
                        	<p align="center" style="text-align:center;line-height:30px"><strong></strong></p>
                        </div>
                  </td>
                </tr>
                
            </tbody>
        </table>
        <table class="table" cellpadding="0" cellspacing="0" border="1" style=" margin-top: -2px;  background:#fff" >
       	  <thead>
          		<tr>
                	<th colspan="6"><h4>BÁO CÁO VẬT LIỆU SẢN XUẤT / RAW MATERRIAL USAGE REPOST</h4></th>
                </tr>
            	<tr>
                	<th><p>Loaị Vật Liệu</p>
                	<p style="font-size:10px">Material type</p></th>
                    <th><p>Diễn Giải</p>
                    <p style="font-size:10px">Desription</p></th>
					<th><p>Nguồn Hàng</p>
					<p style="font-size:10px">Material Source</p></th>
                	<th><p>S.Lg Lấy Theo Litre</p>
                	<p style="font-size:10px">Qty. used inLitre</p></th>
                	<th><p>S.Lg Lấy Theo Kgs</p>
                	  <p style="font-size:10px">Qty. used in Kgs</p></th>
					<th><p>Ghi Chú</p>
                	  <p style="font-size:10px">Remarks</p>
                   </th>
                </tr>
           </thead>
           <tbody>
           <?php
				$query = "SELECT name, source, baseOil, kg, d30 FROM productOrderDetail
							INNER JOIN materials ON materialID = ID
							WHERE orderID = $id";
				$db->querySQL($query);
				$materials = $db->fetchToArray();
				
				$sum = 0;
				foreach ($materials as $data) {
				?>
                <tr>
                	<td><?=$data['baseOil'] ? "BaseOil" : "Addtive"?></td>
                    <td><?=$data['name']?></td>
                    <td><?=$data['source']?></td>
                    <td></td>
                    <td><?=$data['kg']?></td>
                    <td></td>
                </tr>
                <?php
				$sum += (float) $data['kg'];
				};
		   ?>
           </tbody>
           <tbody>
               <tr>
               		<td colspan="3">
						<h4 style="text-align:center">TỔNG CỘNG VẬT LIỆU/ TOTAL RAW MATERIALS</h4>
                    </td>
                    <td><p>0.00</p></td>
                    <td><p><?=number_format($sum, 3)?></p></td>
                    <td><p></p></td>
               </tr>
            </tbody>
          </table>
         <table class="table" cellpadding="0" cellspacing="0" border="1" style=" margin-top: -2px; background:#fff  ">
       	  
          		<tr>
                	<th colspan="7"><h4>BÁO CÁO ĐÓNG GÓI / PACKING REPOST</h4></th>
                </tr>
         </table>
         <div class="fl" style="width:70%; background:#EEE; ">
         <table class="table" cellpadding="0" cellspacing="0" border="1"  style=" margin-top:-2px; background:#fff" >
         	<thead>
            	<tr>
                	<th><p>Kiểu Đóng Gói</p>
                	<p style="font-size:10px">Packing type</p></th>
                    <th><p>Nguyên Liệu Đóng Gói</p>
                    <p style="font-size:10px">Packing Material</p></th>
					<th><p>Nguồn Sử Dụng</p>
					<p style="font-size:10px">Material Source</p></th>
                	<th><p>S.Lg Sử Dụng</p>
                	<p style="font-size:10px">Qty. used</p></th>
                	<th><p>S.Lg Hư Hỏng</p>
                	  <p style="font-size:10px">Qty. Damaged</p></th>
                </tr>
             </thead>
             <tbody>
             <?php
				$query = "SELECT name, source, volCap, quantity FROM productOrderDetailPack
							INNER JOIN packages ON packID = ID
							WHERE orderID = $id";
				$db->querySQL($query);
				$materials = $db->fetchToArray();
				
				foreach ($materials as $data) {
				?>
                <tr>
                	<td></td>
                	<td><?=$data['name']?></td>
                    <td><?=$data['source']?></td>
                    <td><?=$data['volCap']*$data['quantity']?></td>
                    <td></td>
                </tr>
                <?php
				};
				?>
             </tbody>
             <tbody>
               <tr style="line-height:48px;">
               		<td colspan="5" rowspan="4"><b>Ghi Chú:</b></td>
       		   </tr>
               </tbody>
          </table>
      </div>
         <div class="fl" style="width:30%">
         	<table  class="table" cellpadding="0" cellspacing="0" border="1" style=" margin-top:-2px; margin-left:-1px; background:#fff">
            	<tr>
                	<td colspan="2"><p>Số Liệu Khác</p>
                    <p style="font-size:10px">Order data</p></td>
                </tr>
            	<tr>
                	<td><p>S.Lg Yêu Cầu</p>
                    <p style="font-size:10px">Qty. Ordered</p></td>
                	<td><p>S.Lg Thực Đóng</p>
                    <p style="font-size:10px">Qty. actual Filled</p></td>
                </tr>
                <tr>
                	<td><p></p></td>
                	<td><p></p></td>
                </tr>
                <tr>
                	<td><p>S.Lg Lấy Mẫu</p>
                  <p style="font-size:10px">Qty. Sample (Kg)</p></td>
                	<td><p>S.Lg Phế Phẩm</p>
                    <p style="font-size:10px">Qty. Slopping (kg)</p></td>
                </tr>
                <tr>
                	<td><p></p></td>
                	<td><p></p></td>
                </tr>
                <tr>
                	<td><p>T.Lg tịnh Từng đơn vị</p>
                  <p style="font-size:10px">NW. Per unit</p></td>
                	<td><p>Tổng T.lg tịnh đóng</p>
                    <p style="font-size:10px">Total NW. Filled (Kg)</p></td>
                </tr>
                <tr>
                	<td><p></p></td>
                	<td><p></p></td>
                </tr>
                <tr>
                	<td colspan="2"><p>Số Dư Vật Liệu Thực Sử Dụng &amp; Đóng Gói</p>
                    <p style="font-size:10px">Difference from Materials used &amp; filled</p><p></p></td>
               	</tr>
                <tr>
                	<td colspan="2"><p></p></td>
               	</tr>
                <tr>
                	<td colspan="2"><p>Giải Pháp Sử Lý Số Dư</p>
                    <p style="font-size:10px">Difference from Materials used &amp; filled</p><p></p></td>
               	</tr>
                <tr>
                	<td colspan="2"><p></p></td>
               	</tr>
            </table>
         </div>
          <div class="footer">
             
               <div style="border-right:1px solid #000" class="footer_1 fl">
                <p>TP.Kế Hoạch &amp; Điều Vận</p>
                <p style="font-size:10px">Planning &amp; Logistics Manager</p>
               	<p style="margin-top:100px"><strong>Phạm Hoàng Pha</strong></p>

            </div>
               <div style="border-right:1px solid #000;"class="footer_1 fl">
                <p>TP. Công Nghệ / Sản Xuất</p>
                <p style="font-size:10px">Processing & Productoin Manager</p>
                <p style="margin-top:100px"><strong>Cao Hoàng Duy</strong></p>
              </div>
               <div class="footer_1 fl">
                <p>Giám Đốc Nhà Máy</p>
                <p style="font-size:10px">Plan Director</p>
                <p style="margin-top:100px"> <strong>Phùng Lễ Minh</strong></p>

              </div>
	  </div>          
          
  </div>
</div>