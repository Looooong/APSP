<?php
	$lang->init();
?>
<div class="block-border">
	<div class="block-header">
		<h1><?=$lang->get('chinhSua', 'ngonNgu')?></h1><span></span>
	</div>
	<div class="block-content">
    	<form id="form1" name="langChange" action="javascript: void(0)">
            <table id="table-example" class="table">
   				<thead>
					<tr style="font-size:12px">
						<th><?=$lang->get('keyWord')?></th>
						<th><?=$lang->get('en')?></th>
                        <th><?=$lang->get('vi')?></th>
						<th><?=$lang->get('ch')?></th>
                        <th style=" width:40px;"></th>
					</tr>
				</thead>
				<tbody>
					<tr class="gradeX">
						<td>
							<input id="addKey" class="required  text" type="text" autocomplete="off"/>
						</td>
						<td>
							<input id="addEn" class="required  text" type="text" autocomplete="off"/>
						</td>
						<td>
							<input id="addVi" class="required  text" type="text" autocomplete="off"/>
						</td>
						<td>
							<input id="addCh" class="required  text" type="text" autocomplete="off"/>
						</td>
					</tr>
				</tbody>
			</table>
			<div class="block-actions">
				<ul style=" margin-top:5px;" class="actions-left">
					<li><input type="submit" onclick="addKeyLang()" class="button" value="<?=$lang->get('them')?>"></li>
					 <li><input type="button" class="button" value="<?=$lang->get('in', 'trang')?>" onClick="prepareToExport('languages', '<?=$lang->lang?>'); printContent('exportData');" /></li>
                    <li><input type="button" class="button" value="<?=$lang->get('xuat')?>" onclick="prepareToExport('languages', '<?=$lang->lang?>'); contentToExcel('exportData');" /></li>
                    <li><a class="button "  href="index.php?options=upload" rel=""><?=$lang->get('tailen')?></a></li>
					<li><a class="button " onclick="deleteKeyLang()" rel=""><?=$lang->get('xoa')?></a></li>
					<li><input type="button" class="button" value="<?=$lang->get('luu')?>"></li>

				</ul>
              <ul style=" margin-top:3px;" class="actions-right">
					<li><a class="button red" onclick="document.getElementById('response').innerHTML='';"><?=$lang->get('quayVe')?></a></li>
				</ul>
			</div>
       		
            <div class="clear"></div>
            <div id="notice"></div>
     <!------------------------------------------>
            <div  style="overflow:auto; height:500px; margin-top:5px">
		<table style="font-size:12PX" id="table-example" class="table" >
   				<thead>
					<tr style="font-size:12px">
						<th><?=$lang->get('keyWord')?></th>
						<th><?=$lang->get('en')?></th>
                        <th><?=$lang->get('vi')?></th>
						<th><?=$lang->get('ch')?></th>
                        <th rowspan="2" style="width:23px;" onclick="deleteKeyLang()"><?=$lang->get('xoa')?></th>
					</tr>
                    <tr style="font-size:12px;">
						<th><input type="text" class="required  text" name="searchLang" id="keyLang" onkeyup="searchLanguage(this)" /></th>
                        <th><input type="text" class="required  text" name="searchLang" id="en" onkeyup="searchLanguage(this)" /></th>
                        <th><input type="text" class="required  text" name="searchLang" id="vi" onkeyup="searchLanguage(this)" /></th>
                        <th><input type="text" class="required  text" name="searchLang" id="ch" onkeyup="searchLanguage(this)" /></th>
					</tr>
				</thead>
				<tbody id="responseLang">
<?php
	foreach ($lang->data as $key) {
?>
		<tr style="font-size:12px; color:#CCC">
        	<td>
            	<input readonly="readonly" name="keyLang" id="<?="keyLang_".$lang->index[$key['keyLang']]?>" class="required  text" type="text" value="<?=$key['keyLang']?>" autocomplete="off"/>
            </td>
            <td>
            	<input name="en" id="<?="en_".$lang->index[$key['keyLang']]?>" class="required  text" type="text" value="<?=$key['en']?>" autocomplete="off" onblur="updateLang(this)" />
            </td>
            <td>
            	<input name="vi" id="<?="vi_".$lang->index[$key['keyLang']]?>" class="required  text" type="text" value="<?=$key['vi']?>" autocomplete="off" onblur="updateLang(this)" />
            </td>
            <td>
            	<input name="ch" id="<?="ch_".$lang->index[$key['keyLang']]?>" class="required  text" type="text" value="<?=$key['ch']?>" autocomplete="off" onblur="updateLang(this)" />
            </td>
            <td style="text-align:center"><input name="delete" id="<?="delete_".$lang->index[$key['keyLang']]?>" class="required  text" type="checkBox" value="1"/></td>
        </tr>
<?php
	};
?>
				</tbody>
			</table>
            </div>
            <div class="block-actions">
            <ul style=" margin-top:3px;" class="actions-left">
					<li>
                    	<input type="submit" onclick="addKeyLang()" class="button" value="<?=$lang->get('them')?>">

                    </li>
                    <li id="loaderLanguage"></li>
					 <li><input type="button" class="button" value="<?=$lang->get('in', 'trang')?>" onClick="prepareToExport('languages', '<?=$lang->lang?>'); printContent('exportData');" /></li>
                    <li><input type="button" class="button" value="<?=$lang->get('xuat')?>" onclick="prepareToExport('languages', '<?=$lang->lang?>'); contentToExcel('exportData');" /></li>
                    <li><a class="button "  href="index.php?options=uploadLang" rel=""><?=$lang->get('tailen')?></a></li>
                    					<li><a class="button " onclick="deleteKeyLang()" rel=""><?=$lang->get('xoa')?></a></li>

                    <li><input type="button" class="button" value="<?=$lang->get('luu')?>"></li>

				</ul>
				 <ul style=" margin-top:3px;" class="actions-right">
					<li><a class="button red" onclick="document.getElementById('response').innerHTML='';"><?=$lang->get('quayVe')?></a></li>
				</ul>
		</div>
		</form>
	</div>
</div>
???PHPTOSCRIPT???
<?php include "languageEdit.js"; ?>