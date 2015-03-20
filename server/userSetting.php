    <div class="block-border">
		<div class="block-header">
			<h1><?=$lang->get('thietLap', 'nguoiDung')?></h1><span></span>
		</div>					

		<form id="validate-form" class="block-content form" action="javascript: void(0)" method="post">
			<div style="width:100%; overflow:hidden">
				<div style=" float:left;width:20%;">
					<div class="block-header">
						<h1><?=$lang->get('ten', 'nguoiDung')?></h1>
					</div>		

					<div class="block-content">
						<select style=" font-weight:both" id="userBox" size="20" onchange="selectUser()">
						<?php
							$query = "SELECT * FROM users WHERE name NOT IN ('ADMIN')";
							$db->querySql($query);
							if($db->numRows()>0){
								$dailyban = $db->fetchToArray();
								foreach($dailyban as $index => $dly){
									echo "<option value='".$dly['userID']."'>".$dly['name']."</option>";
								};
							};
						?>
						</select>
					</div>

					<div style="margin:0px; margin-bottom:5px;" class="block-actions-tab block-actions">
    					<ul style="margin-top:5px; margin-left:0px;" class="actions-left">
							<li><input type="button" name="permit" class="button" value="<?=$lang->get('them','nguoiDung')?>" onclick="addUser()"></li>                        
						</ul>
					</div>		
				</div>

				<div id="responseModify" style=" float:left;width:79%; margin-left:5px">
				</div>

				<div style=" float:left;width:79%; margin-top:5px; margin-bottom:5px; margin-left:5px">
					<div id="responseAuthorize" class="block-content">
					</div>
				</div>
			</div>

			<div class="clear">
			</div>

			<div class="block-actions-tab block-actions">
                          <ul style=" margin-top:3px;" class="actions-right">
								<li>
					<li><a class="button red" onclick="document.getElementById('response').innerHTML='';"><?=$lang->get('quayVe')?></a></li>
                               </li>
						</ul>
			</div>		
		</form>
	</div>
???PHPTOSCRIPT???
<?php include "userSetting.js"; ?>