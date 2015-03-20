<div class="block-border">
	<div class="block-header">
		<h1>Nhập Nguyên Liệu</h1><span></span>
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
                    	<th><p><input id="importDate" type="text" value="<?=date('d/m/Y')?>" /></p></th>
                    	<th><p><select id="importStatus" onchange="changeStatus(this)">
											<option value="0">Đang Nhập</option>
                                            <option value="1">Đã Nhập</option>
										</select></p></th>
                    	<th> <p><input id="importFinish" disabled="disabled" type="text" /></p></th>
                    
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
                    <tr id="newLine" style="display:none">
						<td style="width:42px;"><p><button class="button" onclick="deleteLine(this)">Xóa</button></p></td>
                    	<td>
							<p><input type="text" name="material" onfocus="showSelect(this)" onblur="hideSelect(this); checkLine(this)" oninput="checkSelect(this)" /></p>
							<div>
								<div style="background:#FFFFFF; position:absolute; display:none; z-index:99">
								<?php
									$query = "SELECT ID, name FROM materials";
									$db->querySQL($query);
									$material = $db->fetchToArray();
									
									foreach ($material as $data) {
									?>
									<div name="<?=$data['ID']?>" onclick="selectMaterial(this)"><?=$data['name']?></div>
									<?php
									};
								?>
								</div>
							</div>
                        </td>
                        <td>
							<p><input type="text" name="source" onblur="checkLine(this)" /></p>
                        </td>
                        <td>
							<p><input	type="text" name="kg" onblur="checkLine(this)" oninput="numberInput(this)" /></p>
                        </td>
                    </tr>
               </thead>
               <tbody id="materials">
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
	include("create.js");
?>