<div class="grid_12" >
    <div class="block-border">
 		<div class="block-header">
            <h1>ADMIN</h1><span></span>
        </div>					
		<form id="validate-form" class="block-content form" action="dashboard.html" metdod="post">
        <div style="widtd:100%; overflow:hidden">
            <div style=" float:left;widtd:30%;">
                <div class="block-header">
                    <h1>USER</h1>
                </div>		
                <div class="block-content">
                <select id="userBox" size="10" onchange="selectUser()">
						<?php
							echo '<option value="">'.$lang->get('chon', 'nguoiDung').'</option>';

							$query = "SELECT * FROM users WHERE name NOT IN ('ADMIN')";
							$db->querySql($query);

							if($db->numRows()>0){
								$dailyban = $db->fetchToArray();

								foreach($dailyban as $index => $dly){
									echo "<option value='".$dly['userID']."' ".$selected.">".$dly['name']."</option>";
								};
							};
						?>
						</select>
                </div>
            </div>
            <div style=" float:left;widtd:69%; margin-left:5px">
                <div class="block-header">
               		 <h1>ĐĂNG KÝ</h1>
                </div>
                <div class="block-content">
                    <p class="inline-mini-label">
                        <label style="margin-right:50px" for="title">TÊN:</label>
                        <input style="widtd:96%" type="text" name="title" class="required">
                    </p>
                    <p class="inline-mini-label">
                        <label for="title">MẬT KHẨU:</label>
                        <input  style="widtd:96%" type="text" name="title" class="required">
                    </p>
                </div>
             </div>
             
               <div style=" float:left;widtd:69%; margin-top:5px; margin-left:5px">
                    
                    <div id="responseAutdorize" class="block-content">
					</div>
                </div>
       </div>
       <div class="clear"></div>
                
                <div class="block-actions-tab block-actions">
                    <ul class="actions-right">
                        <li><input type="submit" name="permiss" class="button" value="<?=$lang->get('luu')?>"></li>
                    </ul>
                </div>		
    </form>
</div>
    </div>
</div>

