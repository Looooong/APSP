<?php
	$lang->init();
	$query = "SELECT * FROM languages WHERE ".$_REQUEST['column']." LIKE N'%".urldecode($_REQUEST['value'])."%'";
	$db->querySql($query);
	$result = $db->fetchToArray();

	foreach ($result as $key) {
?>
		<tr style="font-size:12px; color:#CCC">
        	<td>
            	<input readonly="readonly" name="keyLang" id="<?="keyLang_".$lang->index[$key['keyLang']]?>" class="required text" type="text" value="<?=$key['keyLang']?>" autocomplete="off"/>
            </td>
            <td>
            	<input name="en" id="<?="en_".$lang->index[$key['keyLang']]?>" class="required text" type="text" value="<?=$key['en']?>" autocomplete="off" onblur="updateLang(this)" />
            </td>
            <td>
            	<input name="vi" id="<?="vi_".$lang->index[$key['keyLang']]?>" class="required text" type="text" value="<?=$key['vi']?>" autocomplete="off" onblur="updateLang(this)" />
            </td>
            <td>
            	<input name="ch" id="<?="ch_".$lang->index[$key['keyLang']]?>" class="required text" type="text" value="<?=$key['ch']?>" autocomplete="off" onblur="updateLang(this)" />
            </td>
            <td style="text-align:center"><input name="delete" id="<?="delete_".$lang->index[$key['keyLang']]?>" class="required" type="checkBox" value="1"/></td>
        </tr>
<?php
	};
?>