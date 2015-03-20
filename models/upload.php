<div class="grid_12">
    
 <div class="block-border">
    <div class="block-header">
        <h1><?=$lang->get('taiLen', 'tep')?></h1><span></span>
    </div>
    <form id="validate-form" class="block-content form" action="models/addDB.php" method="post" enctype="multipart/form-data">
        	<!--	<select name="table">
                	<option value="menus">Menu</option>
                </select>-->
        
        <div style="line-height:33px;" class="_100">
            <p>
                <label for="file"><?=$lang->get('chon', 'tep')?></label>
                <input placeholder="<?=$lang->get('chon', 'tep')?>" style="float:left; margin-top:5px; width:300px"name="file" type="file" value="<?=$lang->get('chon', 'tep')?>">
            </p>
        </div>
        
           <div class="_100">
            <p>
                <input type="hidden" name="MAX_FILE_SIZE" value="10485760"/> 

            </p>
        </div>
                
        <div class="clear"></div>
        <div class="block-actions">

            <ul style=" margin-top:3px;" class="actions-right">
<li><a class="button red" href="<?php echo $_SERVER['HTTP_REFERER'];?>"><?=$lang->get('quayVe')?></a></li>
</ul>
            <ul class="actions-left">
                <li><input type="submit" class="button" value="<?=$lang->get('taiLen')?>"></li>
            </ul>
        </div>
        
        
    </form>
    </div>
</div>
        <div class="clear"></div>
