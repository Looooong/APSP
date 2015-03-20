<div class="block-border">
	<div class="block-header">
		<h1><?=$lang->get('them','heThong')?></h1><span></span>
	</div>
    
	<div class="block-content form" >
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
            	<td><input class=" required text" type="text" id="addSTT" autocomplete="off" /></td>
            	<td><input class=" required text" type="text" id="addName" autocomplete="off" /></td>
                <td><input class=" required text" type="text" id="addEn" autocomplete="off" /></td>
                <td><input class=" required text" type="text" id="addVi" autocomplete="off" /></td>
                <td><input class=" required text" type="text" id="addCh" autocomplete="off" /></td>
            </tr>
        </tbody>
    </table>
    
    <div id="oldCode" style="display:none">
    </div>
    <div id="menuData" style="display:none">
    </div>
    
 	<div class="_50">
    	<fieldset>
            <legend style=" text-align:left"><?= $lang->get('chonHe');?></legend>
                <div class="_100">
                        <div id="level0" >
                        </div>
               </div>
               <div class="_100">
                        <div id="level1" >
                        </div>
                </div>
		</fieldset>
				
        
    </div>
     	<div class="_50">

    	<fieldset>
            <legend style=" text-align:left"><?= $lang->get('ma');?></legend>
    			 <input style="margin-top:5px;" id="newCode" type="text" disabled="disabled" value="" />
          </fieldset>
     	</div>
        <div class="clear"></div>
   <div class="block-actions">
        <ul class="actions-left">
            <li><input type="button" onclick="addSystem()" class="button" value="<?=$lang->get('them')?>"></li>
        </ul>
        <ul class="actions-right">
    	<li><input type="button" onclick="callSystemEdit()" class="button red" value="<?=$lang->get('quayVe')?>"></li>
    </ul>
    </div>
</div>
???PHPTOSCRIPT???
<?php include "viewAdd.js"; ?>