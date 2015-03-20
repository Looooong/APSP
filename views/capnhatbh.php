<? 	
	$database = $_SESSION['database'];
	$adID=$_GET['adID'];
	settype($adID,"int");
	$query="SELECT thamgiabh FROM ".$database.".dbo.hosonv WHERE adID=$adID";
	$db->QuerySql($query);
	$result = $db->fetchToArray();
	if (isset($_POST['btnOK'])==true){
	$thamgiabh = $_POST['thamgiabh'];
	settype($thamgiabh,"int");
	$query="UPDATE ".$database.".dbo.hosonv SET thamgiabh = $thamgiabh 				
		WHERE adID = $adID";
		$db->querySql($query);
echo '<script type = "text/javascript">window.location.href="index.php?options=chamcong&name="</script>';		
	}	
?>

<div class="container_12">
			<div class="grid_6">

				<div class="block-border">
					<div class="block-header">
						<h1>Cập Nhật Trạng Thái Bảo Hiểm</h1><span></span>
					</div>
					<form id="validate-form form1" class="block-content form" name="form1" action="" method="post">
						<br />
                         <?php
					  foreach($result as $rel){?>
                          <div class="_100">
			  <p>
								<span class="label">Trạng Thái:</span>
								<label><input type="radio" name="thamgiabh"  id="0" value="0"  <? echo ($rel['thamgiabh']==0)? "checked=checked":""; ?>/> Chưa Tham Gia</label>
								<label><input type="radio" name="thamgiabh" id="1" value="1" <? echo ($rel['thamgiabh']==1)? "checked=checked":""; ?> /> Đã Tham Gia</label>
                                
                              
							</p>
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
