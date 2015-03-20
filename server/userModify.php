<?php
	if ($_REQUEST['method'] == "modify") {
?>
	<div class="block-header">
		<h1><?=$lang->get('chinhSua')?></h1>
	</div>

       <div style=" overflow:hidden" class="block-content">
		<p style="margin:5px 0" class="inline-mini-label">
			<label style=" width:120px; text-align:left" for="title"><?=$lang->get('ten')?></label>
			<input readonly="readonly" id="username" style="width:86%" type="text" class="required text" value="<?=urldecode($_REQUEST['username'])?>" />
		</p>
		<p  style="margin:5px 0" class="inline-mini-label">
			<label  style=" width:120px; text-align:left" for="title"><?=$lang->get('matKhau','cu')?></label>
			<input id="oldPassword" style="width:86%" type="password" class="required text">
		</p>
		<p  style="margin:5px 0" class="inline-mini-label">
			<label  style=" width:120px" for="title"><?=$lang->get('matKhau','moi')?></label>
			<input id="newPassword" style="width:86%" type="password" class="required text">
		</p>
	</div>
    <div style=" margin:0px;" class="block-actions-tab block-actions">
    		<ul style="margin-top:5px ; text-align:left" class="actions-left">
                <li id="loaderModify"></li>
                <li><input type="submit" class="button" value="<?=$lang->get('capNhat', 'nguoiDung')?>" onclick="modifyUser()"></li>
                <li><input type="button" class="button" value="<?=$lang->get('xoa', 'nguoiDung')?>" onclick="deleteUser()"></li>
            </ul>
            
            
      </div>
???PHPTOSCRIPT???
<?php include "userModify.js"; ?>
<?php
	} else if ($_REQUEST['method'] == "add") {
?>
	<div class="block-header">
		<h1><?=$lang->get('dangKy', 'nguoiDung')?></h1>
	</div>

       <div class="block-content">
		<p  style="margin:5px 0" class="inline-mini-label">
			<label  style=" width:100px" for="title"><?=$lang->get('ten')?></label>
			<input id="username" style="width:90%" type="text" name="title" class="required" autocomplete="off" />
		</p>

		<p  style="margin:5px 0" class="inline-mini-label">
			<label style=" width:100px" for="title"><?=$lang->get('matKhau')?></label>
			<input id="password" style="width:90%" type="password" name="title" class="required">
		</p>
	</div>
    <div style="margin:0px;" class="block-actions-tab block-actions">
    	<ul style="margin-top:5px" class="actions-left">
                <li id="loaderRegister"></li>
                <li><input type="submit" class="button" value="<?=$lang->get('them', 'nguoiDung')?>" onclick="registerUser()"></li>

            </ul>
            
            </div>
???PHPTOSCRIPT???
<?php include "userModify.js"; ?>
<?php	
	} else if ($_REQUEST['method'] == "register") {
		$username = urldecode($_REQUEST['username']);
		$password = md5(urldecode($_REQUEST['password']));

		$query = "SELECT * FROM users WHERE name = '".$username."'";
		$db->querySql($query);
		
		if ($db->numrows()) {
		?>
			???PHPTOSCRIPT??? alert('<?=$lang->get('errorUsernameDuplicate')?>');
		<?php
		} else {
		$query = "INSERT INTO users(name, password) VALUES('".$username."', '".$password."')";
		$db->querySql($query);
		
		?>???PHPTOSCRIPT??? alert('<?=$lang->get('dangKy', 'nguoiDung', 'thanhCong')?>\n<?=$lang->get('ten')?>: <?=$username?>\n<?=$lang->get('matKhau')?>: <?=urldecode($_REQUEST['password'])?>'); callUserSetting();<?php
		};
	} else if ($_REQUEST['method'] == "change") {
		$query = "SELECT password FROM users WHERE name = N'".$_REQUEST['username']."'";
		$db->querySql($query);
		$result = $db->fetchArray();
		if (md5($_REQUEST['oldpassword']) != $result['password']) echo "???PHPTOSCRIPT??? alert('".$lang->get('invalidPassword')."')";
		else {
		$username = urldecode($_REQUEST['username']);
		$password = md5(urldecode($_REQUEST['newpassword']));
		
		$query = "UPDATE users SET password = '".$password."' WHERE name = '".$username."'";
		$db->querySql($query);
		?>
        ???PHPTOSCRIPT??? alert('<?=$lang->get('thayDoi', 'matKhau', 'thanhCong')?>\n<?=$lang->get('matKhau')?>: <?=urldecode($_REQUEST['newpassword'])?>');
        <?
	};
};
?>