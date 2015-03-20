<?php
//require_once 'inc/database.class.php';
//require_once 'inc/config.php';	
//require_once "inc/languages.class.php";
//session_start();
//$lang= new languages;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
	<div class="block-border">
		<div class="block-header">
			<h1>ai bit la gi</h1><span></span>
		</div>
		<div class="block-content">
		    <div  style="overflow:auto; background:#F2F2F2; height:300px; width:100%;margin-top:5px">
           		<p style='margin:5px; width:250px; line-height:30px; float:left'><strong style=' font-weigth:bold; margin-right:5px; width:100px;'><?= $lang->get('sctban')?></strong><input style='float:right' name='' type='text' /></p>
				<p style='margin:5px; width:250px; line-height:30px; float:left'><strong style=' font-weigth:bold; margin-right:5px; width:100px;'><?= $lang->get('nct')?></strong><input style='float:right' name='' type='text' /></p>
				<p style='margin:5px; width:250px; line-height:30px; float:left'><strong style=' font-weigth:bold; margin-right:5px; width:100px;'><?= $lang->get('soquyen')?></strong><input style='float:right' name='' type='text' /></p>
				<p style='margin:5px; width:250px; line-height:30px; float:left'><strong style=' font-weigth:bold; margin-right:5px; width:100px;'><?= $lang->get('sohd')?></strong><input style='float:right' name='' type='text' /></p>
				<p style='margin:5px; width:250px; line-height:30px; float:left'><strong style=' font-weigth:bold; margin-right:5px; width:100px;'><?= $lang->get('ngayhd')?></strong><input style='float:right' name='' type='text' /></p>
                <p style='margin:5px; width:250px; line-height:30px; float:left'><strong style=' font-weigth:bold; margin-right:5px; width:100px;'><?= $lang->get('lhdon')?></strong><input style='float:right' name='' type='text' /></p>
                <p style='margin:5px; width:250px; line-height:30px; float:left'><strong style=' font-weigth:bold; margin-right:5px; width:100px;'><?= $lang->get('mkhang')?></strong><input style='float:right' name='' type='text' /></p>
                <p style='margin:5px; width:250px; line-height:30px; float:left'><strong style=' font-weigth:bold; margin-right:5px; width:100px;'><?= $lang->get('ten')?></strong><input style='float:right' name='' type='text' /></p>
                <p style='margin:5px; width:250px; line-height:30px; float:left'><strong style=' font-weigth:bold; margin-right:5px; width:100px;'><?= $lang->get('diachi')?></strong><input style='float:right' name='' type='text' /></p>
                <p style='margin:5px; width:250px; line-height:30px; float:left'><strong style=' font-weigth:bold; margin-right:5px; width:100px;'><?= $lang->get('dienthoai')?></strong><input style='float:right' name='' type='text' /></p>
                <p style='margin:5px; width:250px; line-height:30px; float:left'><strong style=' font-weigth:bold; margin-right:5px; width:100px;'><?= $lang->get('msthue')?></strong><input style='float:right' name='' type='text' /></p>
                <p style='margin:5px; width:250px; line-height:30px; float:left'><strong style=' font-weigth:bold; margin-right:5px; width:100px;'><?= $lang->get('sotk')?></strong><input style='float:right' name='' type='text' /></p>
                <p style='margin:5px; width:250px; line-height:30px; float:left'><strong style=' font-weigth:bold; margin-right:5px; width:100px;'><?= $lang->get('nghang')?></strong><input style='float:right' name='' type='text' /></p>
                <p style='margin:5px; width:250px; line-height:30px; float:left'><strong style=' font-weigth:bold; margin-right:5px; width:100px;'><?= $lang->get('nnhang')?></strong><input style='float:right' name='' type='text' /></p>
                <p style='margin:5px; width:250px; line-height:30px; float:left'><strong style=' font-weigth:bold; margin-right:5px; width:100px;'><?= $lang->get('pghang')?></strong><input style='float:right' name='' type='text' /></p>
                <p style='margin:5px; width:250px; line-height:30px; float:left'><strong style=' font-weigth:bold; margin-right:5px; width:100px;'><?= $lang->get('xuatkho')?></strong><input style='float:right' name='' type='text' /></p>
                
				<p style='margin:5px; width:250px; line-height:30px; float:left'><strong style=' font-weigth:bold; margin-right:5px; width:100px;'><?= $lang->get('ltien')?></strong><input style='float:right' name='' type='text' /></p>
				<p style='margin:5px; width:250px; line-height:30px; float:left'><strong style=' font-weigth:bold; margin-right:5px; width:100px;'><?= $lang->get('tygia')?></strong><input style='float:right' name='' type='text' /></p>
				
						
			</div>
        </div>
        <div class="block-actions">
            <ul class="actions-left">
            
                <li><input type="submit" name="addKeyLang" class="button" value="Đồng Ý"></li>
                <li><input type="button" id="addnrow" name="add-row" class="button" value="thêm Dòng" /></li>
                <li><input id = "buttonclick" style = "width:60px" type="submit" value="thoát" class = "button" /></li>
             </ul>
        </div>
   </div>

</body>
</html>