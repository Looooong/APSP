<div class="block-border">
	<div class="block-header">
		<h1>Bảng Định Mức Nguyên Liệu</h1><span></span>
	</div>

	<div class="block-content">
		<table class="table">
			<tr>
                <th>
					<label for="textfield2">Sản Phẩm</label>
				</th>
				<th>
					<input id="product" type="text"/>
					<div>
						<div id="prod" name="" style="position:absolute; background-color:#F8F8F8; z-index: -20; opacity:0; overflow-y:hidden; max-width:400px">
						</div>
					</div>
                </th>
                <th>
                	<label for="select">Bao Bì</label>
						<select id="pack" onchange="selectPack()">
							<option value="0">Tất cả</option>
                            <?php
								$query = "SELECT DISTINCT solit FROM dmspham ORDER BY solit";
								$db->querySQL($query);
								$package = $db->fetchToArray();
								
								foreach ($package as $data) {
								?>
							<option value="<?=$data['solit']?>"><?=$data['solit']." lit"?></option>
								<?php
								};
							?>
						</select>
                </th>
              </tr>
           </table>
              <table class="table">
           <thead>
                <th></th>
                <th>Nguyên Liệu</th>
                <th>Tỷ Lệ</th>
              </tr>
           </thead>
           <tbody>
          </tbody>
            </table>
    
        <div class="block-actions">
                <ul class="actions-left">
                    <li><input type="submit" name="addKeyLang" class="button" value="ok"></li>
                    <li><input id = "buttonclick" style = "width:60px" type="submit" value="Xóa" class = "button" /></li>
         		</ul>
      </div>
  </div>
</div>

<script type="text/javascript" language="javascript" src="server/fomula.js">
</script>