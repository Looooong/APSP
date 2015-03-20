<? 
require_once "classnv.php";
	$nv=new quanly;
	$adID=$_GET['adID'];
	settype($adID,"int");
	$query="SELECT thamgiacongdoan,ngaythamgiaCD FROM hosonv WHERE adID=$adID";
	$db->QuerySql($query);
	//echo $query;exit;
	$result = $db->fetchToArray();
	if (isset($_POST['btnOK'])==true){
	$nv->CapNhatCongDoan($adID);
	header("location:index.php?options=bCCD");
}	

?>

<div class="container_12">
			<div class="grid_6">

				<div class="block-border">
					<div class="block-header">
						<h1>Cập Nhật Trạng Thái Công Đoàn</h1><span></span>
					</div>
					<form id="validate-form form1" class="block-content form" name="form1" action="" method="post">
						<br />
                         <?php
					  foreach($result as $rel){?>
                      
                          <div class="_100">
			  <p>
								<span class="label">Trạng Thái:</span>
								<label><input type="radio" name="thamgiacongdoan"  id="0" value="0"  <? echo ($rel['thamgiacongdoan']==0)? "checked=checked":""; ?>/> Chưa Tham Gia</label>
								<label><input type="radio" name="thamgiacongdoan" id="1" value="1" <? echo ($rel['thamgiacongdoan']==1)? "checked=checked":""; ?> /> Đã Tham Gia</label>
                                
                              
							</p>
						</div>
                         <div class="_100">            
                                <p><label class="line_height" for="datepicker">Ngày Tham Gia</label><input name="ngaythamgiaCD" class="fr" type="text" value="<?php if(isset( $rel ['ngaythamgiaCD'])==true){
							echo $rel ['ngaythamgiaCD']->format("d/m/Y");}
							else {
								echo "";
							}
							?>" /></p>
                            </div>	
                        <? }?>
                        
			    <div class="clear"></div>
						<div class="block-actions">
							<ul class="actions-left">
								<li><input type="submit" name="btnOK" id="btnOK" class="button" value="Cập Nhật"></li>
							</ul>
						</div>
					</form>
				</div>
			</div>
</div></div>