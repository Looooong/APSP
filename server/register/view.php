<div class="block-border">
	<div class="block-header">
		<h1><?=$lang->get('dangKy', 'nguoiDung')?></h1><div id="loaderRegister"></div><span></span>
	</div>
	
    <form id="validate-form" class="block-content form" action="" method="post">
		<div class="_100">
			<p><label for="textfield"><?=$lang->get('tenDangNhap')?></label><input id="username" name="username" class="required" type="text" value="" /></p>
		</div>

		<div class="_100">
			<p><label for="textfield"><?=$lang->get('matKhau')?></label><input id="password" name="password" class="required" type="password" value="" /></p>
		</div>

		<div class="clear"></div>

		<div class="block-actions">
			<ul class="actions-right">
				<li><input type="button" onclick="addUser()" name = "adduser"  id="btnOK" class="button" value="<?=$lang->get('them', 'nguoiDung')?>"></li>
			</ul>
		</div>
	</form>
</div>

<div class="block-border">
	<div class="block-header">
		<h1><?=$lang->get('nguoiDung')?></h1><span></span>
	</div>
	<div class="block-content">
    	<form id="form1" name="langChange" method="post" action="">
            <div id="example" style="overflow:auto; margin-top:10px">

			<table id="table-example" class="table" >
   				<thead>
					<tr>
						<th><?=$lang->get('ten', 'nguoiDung')?></th>
					</tr>
                    <tr>
                    	<th><input type="text" id="nameField" onkeyup="searchUser()" /></th>
                    </tr>
				</thead>
				<tbody id="responseUser">
				<?php
					$query = "SELECT userID, name FROM users";
					$db->querySQL($query);
	
					$result = $db->fetchToArray();
					foreach ($result as $user) {
				?>
					<tr>
        				<td onClick="//editUser()"><?=$user['name']?></td>
        			</tr>
				<?php
					};
				?>
				</tbody>
			</table>
            </div>
            
			<div class="block-actions">
				<ul class="actions-right">
					<li><input type="submit" name="editKeyLang" class="button" value="<?=$lang->get('luu')?>"></li>
				</ul>
			</div>
		</form>
	</div>
</div>
???PHPTOSCRIPT???