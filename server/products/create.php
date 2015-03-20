<style>
.table p { text-align:left}
.button:visit {
box-shadow: 0px 0px 6px rgba(0, 0, 0, 10) inset; -moz-box-shadow:0px 0px 6px rgba(0, 0, 0, 10) inset; -webkit-box-shadow: 0px 0px 6px rgba(0, 0, 0, 10) inset; padding:5px 20px; border:none	
	}
</style>
<div class="block-border">
	<div class="block-content">
		<div class="block-header">
			<h2 style="text-align:center; line-height:25px;">
				LỆNH SẢN XUẤT
			</h2>
		</div>

		<table class="table">
			<thead>
				<tr style="border:1px dotted #bebebe">
					<th><p style=" width:102px;">Ngày Xuất Lệnh:</p></th>
	        	    <th><p><input style="width:100%" id="produceDate" type="text" value="<?=date('d/m/Y')?>" /></p></th>
					<th><p style=" width:80px;">Sản Phẩm:</p></th>
					<th colspan="4"><p><input style=" float:left" id="product" type="text" /></p>
						<div>
							<div id="prod" name="" style="top:50px; position:absolute; background-color:#F8F8F8; z-index: -20; opacity:0; overflow-y:hidden; max-width:400px">
							</div>
						</div>
					</th>
                    <th><p> <input style=" width:50px; float:left" id="deleteProduct" class="button" type="button" value="X" onclick="deleteProduct(this)" /></p></th>
                    </tr>
                    <tr>
                    <th>
						<p>Ngày Hoàn Tất:</p>
					</th>
					<th>
						<p><input id="productFinish" type="text" disabled="disabled" /></p>
					</th>
					<th><p>Bao Bì:</p></th>
					<th><p>
						<select id="pack" onchange="selectPack(); product.value = ''">
							<option value="0" selected="selected">Tất Cả</option>
							<?php
								$query = "SELECT DISTINCT solit
											FROM dmspham";
								$db->querySQL($query);
								$package = $db->fetchToArray();
						
								foreach ($package as $data) {
								?>
							<option value="<?=$data['solit']?>"><?=$data['solit']." lit"?></option>
								<?php
								};
							?>
						</select></p>
					</th>
					<th><p>Số Lượng:</p></th>
					<th> <p><input id="quantity" type="text" value="1" oninput="numberInput(this); calculate()" onblur="this.value = this.value.replace(/^0{0,}$/, 1); calculate()" style="width:100%" /></p></th>
					<th><p>Trạng Thái:</p></th>
					<th><p><select id="status" onchange="changeStatus(this)">
								<option value="0">Chưa Sản Xuất</option>
								<option value="1">Đã Sản Xuất</option>
							</select></p>
					</th>
					
				</tr>
			</thead>
		</table>

		<div class="block-header">
			<h2 style="text-align:center; line-height:25px;">YÊU CẦU NGUYÊN VẬT LIỆU / MATERIALS REQUISATION</h2>
		</div>

		<table class="table">
			<thead>
				<tr>
					<th><p>Nguyên Liệu</p></th>
					<th><p>Tỉ Lệ</p></th>
					<th><p>Dung Tích</p></th>
					<th><p>Khối Lượng</p></th>
				</tr>
			</thead>
			<tbody id="requirements">
			</tbody>
            <tbody id="base" style="display:none">
            </tbody>
		</table>

		<div class="block-actions">
			<ul class="actions-left">
				<li>
    	        	<input class="button" id="submitOrder" disabled="disabled" style="visibility:hidden" type="button" value="OK" onclick="newOrder()">
       	    	</li>
				<li><input type="button" class="button" value="Hủy" onclick="document.getElementById('createForm').innerHTML = ''" /></li>
			</ul>
		</div>
	</div>
</div>
???PHPTOSCRIPT???
<?php include "create.js"?>