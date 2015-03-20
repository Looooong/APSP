<div class="block-border">
	<div class="block-header">
		<h1><?=$lang->get('chinhSua','heThong')?></h1><span></span>
	</div>
    
	<div class="block-content form"  >
	<table class="table">
    	<thead>
        	<tr>
				<th style="width:40px"><?=$lang->get('soThuTu')?></th>
				<th><?=$lang->get('keyWord')?></th>
				<th><?=$lang->get('en')?></th>
				<th><?=$lang->get('vi')?></th>
				<th><?=$lang->get('ch')?></th>
            </tr>
        </thead>
        <tbody>
        	<tr>
            	<td><input class=" required text" type="text" value="<?=urldecode($_REQUEST['idSTT'])?>" id="idSTT" autocomplete="off" /></td>
            	<td><input class=" required text" type="text" value="<?=urldecode($_REQUEST['name'])?>" id="name" autocomplete="off" /></td>
                <td><input class=" required text" type="text" value="<?=urldecode($_REQUEST['en'])?>" id="en" autocomplete="off" /></td>
                <td><input class=" required text" type="text" value="<?=urldecode($_REQUEST['vi'])?>" id="vi" autocomplete="off" /></td>
                <td><input class=" required text" type="text" value="<?=urldecode($_REQUEST['ch'])?>" id="ch" autocomplete="off" /></td>
            </tr>
        </tbody>
    </table>
    
    <input type="hidden" id="menuID" value="<?=$_REQUEST['menuID']?>" />
    
 	<div class="_50">
    	<fieldset>
            <legend style=" text-align:left"><?= $lang->get('heThong');?></legend>
				<div id="level_0" style="margin:5px 0" class="_100">
                <?php
					echo (strlen(trim(urldecode($_REQUEST['code']))) == 1) ? "<input type='text' disabled value='".$lang->get('heCha')."' />" : "";
					for ($level = 1; $level < strlen(trim(urldecode($_REQUEST['code']))); $level++) {
						$ch = substr(trim(urldecode($_REQUEST['code'])), 0, $level);
						$query = "SELECT en, vi, ch FROM menus WHERE substring(code, 1, ".$level.") = '".$ch."'";
						$db->querySql($query);
	
						$result = $db->fetchArray();
						echo ($level != 1) ? "<br/>" : "";
						echo "<input type='text' disabled value='".$lang->get('heThongCon', 'cua').": ".$result[$_REQUEST['lang']]."' />";
					}
				?>
				</div>
		</fieldset>
				
    </div>
     	<div class="_50">

    	<fieldset>
            <legend style=" text-align:left"><?= $lang->get('ma');?></legend>
    			 <input style="margin-top:5px;" id="code" type="text" disabled="disabled" value="<?=trim(urldecode($_REQUEST['code']))?>" />
          </fieldset>
     	</div>
        <div class="clear"></div>
   <div class="block-actions">
    <ul class="actions-left">
    	<li><input type="button" onclick="updateSystem()" class="button" value="<?=$lang->get('chinhSua')?>"></li>
        <li><input type="button" onclick="deleteSystem()" class="button" value="<?=$lang->get('xoa')?>"></li>
        

	</ul>
    <ul class="actions-right">
    	<li><input type="button" onclick="callSystemEdit()" class="button red" value="<?=$lang->get('quayVe')?>"></li>
    </ul>
    </div>
</div>
???PHPTOSCRIPT???
<?php include "viewEdit.js"; ?>