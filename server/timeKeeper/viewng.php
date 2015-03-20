<?php
	$query = "SELECT * FROM timeKeeper";
	$db->querySQL($query);
	$timeTable = $db->fetchToArray();

	$query = "SELECT adID, hoTen, tenCVVi FROM hosonv,congty where congty.cvID=hosonv.cvID";
	$db->querySQL($query);
	$users = $db->fetchToArray();
	
	foreach ($users as $data) {
		$iduser[$data['adID']] = $data['hoTen'];
		$cvID[$data['adID']] = $data['tenCVVi'];
	}; 
	
	
	$dayInMonth = date("t");
	//echo date("t"); exit;
?>
	<style type="text/css">
    .table .gread{ font-size:12px;}
	.thang_cc { font-weight:bold; font-size:20px;line-height:30px;}
	.thang_cc_tit { color:#212AFA; float:right; font-size:15px; line-height:30px; margin-right:20px;}
	.point_gread:hover { cursor:pointer}
    </style>
    <div class="block-border" style="overflow:hidden">
        <div class="block-header">
       		<h1>Chấm Công</h1><span></span>
        </div>
    <div class="block-content">
    	<p style=" background:#D7E9EA">
    		<span class="thang_cc"><?php if ($lang->lang == "en") echo date("F"); else echo $lang->get('thang')." ".date("n");?></span>
    		<span class="thang_cc_tit">C: Có Mặt - V:Vắng - N:Nữa Buổi - P:Phép - G:Ngoài Giờ</span>
    	</p>
        <div style=" background:#F2F2F2; overflow:scroll; height:500px">   
            <table style="width:1200px;" class="table">
                <thead>
                    <tr>
                        <th></th>
                        <th>Họ Tên</th>
                        <th>Chức Vụ</th>
            
                            <?php
                                for ($i = 1; $i <= $dayInMonth; $i++) {
                                    echo "<th style=' width:40px; text-align:center'>".$i."</th>";
            
                                };
                                
                            ?>
                    </tr>
                </thead>
                <tbody id="timeTable">
                <?php
                    foreach ($timeTable as $data) {
                ?>
                    <tr style="border-bottom: 1px dashed #ccc; font-size:14px;" name="<?=$data['adID']?>">
                        <td><?=$data['adID']?></td>
                        <td style="width:320px; overflow:hidden"><?=$iduser[$data['adID']]?></td>
                        <td style="width:320px; overflow:hidden"><?=$cvID[$data['adID']]?></td>
            
                    <?php
                        for ($i = 1; $i <= $dayInMonth; $i++) {
                            echo "<td class='point_gread' style='text-align:center'>";
                           
                            echo "<input style='width:20px' name='' type='text' /></td>";
                        };
                    ?>
                    </tr>
                <?php
                    };
                ?>
                </tbody>
            </table>
        </div>
                <div class="block-actions">
                    <ul class="actions-left">
                        <li><input type="submit" name="" class="button" onclick="saveStatus()" value="<?=$lang->get("dongY")?>"></li>		
                        
                        <li><a class="button" id="delete-button" href="javascript:delete_p();" rel=""><?=$lang->get('xoa')?></a></li>
                        <li><a href = "pr_add.php" class="button" id = "pradd"  onclick = "javascript:printadd();" target = "_blank"><?=$lang->get('in','trang')?></a></li>
                        <li><a class ="button" href = "exceladdphieu.php" target = "_blank"><?=$lang->get('xuat')?></a></li>
                    </ul>
                </div>
            
            
        </div>
    </div>
    <?php
		//$query = "SELECT ( _1 + _2 +_3 + _4 +_5 + _6 +_7 + _8 +_9 + _10 + _11 + _12 +_13 + _14 +_15 + _16 +_17 + _18 +_19 + _20 + _21 + _22 +_23 + _24 +_25 + _26 +_27 + _28 +_29 + _30 + _31) as TongLuongLam FROM timeKeeper";
		//$db->querySQL($query);
		//$total = $db->fetchToArray();
	?>
    <!--<div class="block-border" style="overflow:hidden">
        <div class="block-header">
            <h1>Tổng</h1><span></span>
        </div>
        <div class="block-content">
        	<table class="table">
            	<thead>
                	<tr>
                    <th>Tổng Ngày Trong Tháng</th>
                    	 <?php
						//foreach ($total[0] as $key => $value) {
							//echo "<th class='gread_width'>".$lang->get($key)."</th>";							
						//};
					?>
                    	
                    	<th>Tổng Ngày Nghỉ</th>
                    </tr>
                </thead>
                <tbody>
                 <?php
					//foreach ($total as $data1) {
				?>
                
                	<tr>
                      <?php
											
						//foreach ($data1 as $value_s => $resval) {?>
                        
                    <?php
						//echo"<td>";
							//$resval = 0;
							//for($i=0; $i<=count($resval); $i++){
							//echo $i;						
						//} 
						//echo"</td>";
					?>
                    		<td><? //=$resval?></td>
                            <td><? //=$dayInMonth*2 - $resval - 10 - 2 ?></td>
                    	<?php //}?>
                       </tr>
				<?php //}?>
                </tbody>
            </table>
        
        </div>
     </div>-->
<!--???PHPTOSCRIPT???-->
<script language="javascript" type="text/javascript">
<?php
	include "view.js";
?>
</script>