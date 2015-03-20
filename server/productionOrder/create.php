<style>
.table p { text-align:left}

</style>
<div class="block-border">

<div class="block-content">
	<div class="block-header">
		<h2 style="text-align:center; line-height:25px;">
			LỆNH SẢN XUẤT
		</h2>

		<h4 style="text-align:center ;line-height:20px;">
			Word Order (WKO)
		</h4>
	</div>

	<table class="table">
    <thead>
		<tr style="border:1px dotted #bebebe">
			<th><p style=" width:102px;">Ngày Xuất Lệnh:</p></th>
            <th><p  style=" width:80px;"><input style="width:100%" id="produceDate" type="text" value="<?=date('d/m/Y')?>" /></p></th>
			<th><p  style=" width:80px;">Sản Phẩm:</p></th>
			<th>
				<p  style=" width:345;"><input id="product" type="text" /></p>
				<div>
					<div id="prod" name="" style="position:absolute; background-color:#F8F8F8; z-index: -20; opacity:0; overflow-y:hidden; max-width:400px">
					</div>
				</div>
			</th>
			<th><p>Bao Bì:</p></th>
            <th><p  style=" width:150px;">
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
            <th> <p  style=" width:50px;"><input  id="quantity" type="text" value="1" oninput="numberInput(this); calculate()" style="width:100%" /></p></th>
		</tr>
        </thead>
	</table>

	<div class="block-header">
		<h2 style="text-align:center; line-height:25px;">YÊU CẦU NGUYÊN VẬT LIỆU / MATERIALS REQUISATION</h2>
	</div>

	<table class="table">
		<thead>
			<tr>
				<td><p>Nguyên Liệu</p></td>
				<td><p>Tỉ Lệ</p></td>
				<td><p>Dung Tích (1000 lit)</p></td>
				<td><p>Khối Lượng (1000 kg)</p></td>
			</tr>
		</thead>
		<tbody id="materials">
		</tbody>
	</table>

	<div class="block-actions">
		<ul class="actions-left">
			<li>
            	<input style="box-shadow: 0px 0px 6px rgba(0, 0, 0, 10) inset; -moz-box-shadow:0px 0px 6px rgba(0, 0, 0, 10) inset; -webkit-box-shadow: 0px 0px 6px rgba(0, 0, 0, 10) inset; padding:5px 20px; border:none" id="submitOrder" disabled="disabled" type="button"  value="OK" onclick="newOrder()">
           	</li>
			<li><input type="button" class="button" value="Xóa" /></li>
		</ul>
	</div>
</div>
</div>
<script src="server/productionOrder/create.js">
</script>