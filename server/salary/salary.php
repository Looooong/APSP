<?php
	$query = "SELECT adID, hoTen,hinhanh, aTM, tenNhomVi,tenCVVi, ngayBatDau, bacLuong,LuongCB,hSCV,hSTN, com,xang,docHai,
	(luongCB*(1 + hSTN + hSCV) + com + xang + docHai) AS TongLuong FROM hosonv, nhom ,congty  where nhom.nhomID = hosonv.nhomID and congty.cvID = hosonv.cvID";
	$db->querySQL($query);
	$personel = $db->fetchToArray();
?>
	<style type="text/css">
    .table .gread{ font-size:12px;}
	.gread_width { width:200px;}
    </style>
    <div class="block-border">
        <div class="block-header">
            <h1>Bảng Lương</h1><span></span>
        </div>
        <div class="block-content" style="overflow:scroll; min-width:800px; max-width:1500px; height:500px; background:#f2f2f2">
            <table class="table">
                <thead>
                    <tr>
						<?php
                            foreach ($personel[0] as $key => $value) {
                                echo "<th class='gread_width'><p>".$lang->get($key)."</p></th>";							
                            };
                        ?>
                    </tr>
                </thead>
                <tbody>
					<?php
                        foreach ($personel as $data) {
                    ?>
                        <tr class="gread">
							<?php
                                foreach ($data as $value_s => $resval) {
                                    if($resval instanceof DateTime){
                                        echo"<td class='gread_width'>".$resval->format("d/m/Y")."</td>";
                                    }
                                    elseif (is_numeric($resval)){
                                        echo "<td class='gread_width'>".number_format($resval,2,",",".")."</td>";
                                    }
                                    elseif (is_file($resval)){
                                        echo "<td class='gread_width'><p style='text-align:center'><img style='width:80px; ' src=".$resval."></p></td>";
                                    }
                                    else{
                                        echo "<td class='gread_width'>".$resval."</td>";
                                    }
                                    
                                        /*echo "<td>".(($value instanceof DateTime) ? $value->format("d/m/Y") ? : $value)."</td>";*/
                                };
                            ?>
                        </tr>
                    <?php
                        };
                    ?>
                </tbody>
            </table>
        </div>
    </div> 