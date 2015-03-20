<div class="block-border">
        <div class="block-header">
            <h1><?=$lang->get('dangKy', 'nguoiDung')?></h1><span></span>
        </div>
        <form id="validate-form" class="block-content form" action="" method="post">
	        <div class="_100">
                <p><label for="textfield"><?=$lang->get('tenDangNhap')?></label><input id="textfield" name="username" class="required" type="text" value="" /></p>
            </div>
            <div class="_100">
                <p><label for="textfield"><?=$lang->get('matKhau')?></label><input id="textfield" name="password" class="required" type="password" value="" /></p>
            </div>
           
            <div class="clear"></div>
             <div class="block-actions">
							
							<ul class="actions-right">
								<li><input type="submit" name = "adduser"  id="btnOK" class="button" value="<?=$lang->get('them', 'nguoiDung')?>"></li>
                                
							</ul>
						</div>
              
           
        </form>
		
     </div>