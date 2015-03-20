<div class="block-border">
	<div class="block-header">
		<h1>Xuất Kho Thành Phẩm</h1><span></span>
	</div>

	<div class="block-content">
           <table class="table">
				<thead>
                    <tr>
						<th></th>
                       <th>
							Ngày Lập Lệnh: <input id="exportDate" type="text" value="<?=date('d/m/Y')?>" />
                       </th>
                       <th>
							Trạng Thái: <select id="exportStatus" onchange="changeStatus(this)">
											<option value="0">Đang Xuất Kho</option>
                                            <option value="1">Đã Xuất Kho</option>
										</select>
                       </th> 
                       <th>
							Ngày Hoàn Tất: <input id="exportFinish" disabled="disabled" type="text" />
						</th>
                    </tr>
                    <tr>
						<th></th>
                    	<th>
							<p>Tên</p>                        
                        </th>
                        <th>
							<p>Số Lượng</p>                        
                        </th>
                    </tr>
                    <tr id="newLine" style="display:none">
						<td><button onclick="deleteLine(this)">Xóa</button></td>
                    	<td colspan="2">
							<input type="text" name="product" onfocus="showSelect(this)" onblur="hideSelect(this); checkLine(this)" oninput="checkSelect(this)" />
							<div>
								<div style="background:#FFFFFF; position:absolute; display:none; z-index:99">
								<?php
									$query = "SELECT maso, tensp FROM dmspham";
									$db->querySQL($query);
									$product = $db->fetchToArray();
									
									foreach ($product as $data) {
									?>
									<div name="<?=$data['maso']?>" onclick="selectProduct(this)"><?=$data['tensp']?></div>
									<?php
									};
								?>
								</div>
							</div>
                        </td>
                        <td>
							<input	type="text" name="quantity" onblur="checkLine(this)" oninput="numberInput(this)" />
                        </td>
                    </tr>
               </thead>
               <tbody id="products">
               </tbody>
           </table>
        </div>
        <div class="block-actions-tab block-actions">
            <ul style=" margin-top:3px;" class="actions-left">
           		 <li><a class="button" onclick="createOrder()">Đồng Ý</a></li>
            </ul>
            <ul style=" margin-top:3px;" class="actions-left">
           		 <li><a class="button" onclick="document.getElementById('createForm').innerHTML = ''">Hủy</a></li>
            </ul>
        </div>		
	</div>
???PHPTOSCRIPT???
<?php
	include("export.js");
?>