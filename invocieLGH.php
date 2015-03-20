<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Đơn Hàng Bán</title>
<style type="text/css">
* { padding:0px; margin:0px;}  
.input_hd{font-weight:bold; color:#FFF; padding:5px 100px; background:#03F}
.input_hd:hover { color:#00F; background:#FFF }
</style>
	<div style="width:980px; margin:0 auto; font-size:18px;">

    	<div style="overflow:hidden; clear:both">
        	<p style=" text-align:center"><?=$lang->get('bms') ?></p>
        	<div style="margin:5px 0">
            	<div style=" width:600px; overflow:hidden; float:left" >
                	<h2>AP SAIGON PETRO JSC</h2>
                    <p>Office:Floor 1, 6B Ton Duc Thang St,Dist,1,HCMC</p>
                    <p>Plant: Thanh My Loi Ward,Dist 2,HCMC</p>
                </div>
            	<img height="72" align="right" src="src/img/bg/apsp.png" />
            </div><!--com_hd-->
        </div><!--title_hd-->
        <div class="content_hd">
        	<h1 style="text-align:center"><?= $lang->get('lghin')?></h1>
		
            <div  style="float:right">
                <p>HCM PPK 1311-154</p>
                <p><?php if(isset($result['0']['ngayhd'])) echo date_format($result['0']['ngayhd'],"d/m/Y");?></p>
			</div>
            <div style=" clear:both"></div>
            <div style=" overflow:hidden">
            	<div style="width:150px; float:left">
                	<h3><?= $lang->get('kinhGui')?>:</h3>
                </div><!--info_kg-->   
                <div style="float:left">
                	<p>- Tổng Giám Đốc</p>
                    <p>- Kế Toán Trưởng</p>
            
                </div><!--info_nd-->
            </div><!--content_info-->
            <div style=" overflow:hidden">
				<div style="width:150px; float:left">
                	<p><?= $lang->get('kinhTrinh')?>:</p>
                    <p><?= $lang->get('lkhang')?>:</p>
					<p><?= $lang->get('dchi')?>:</p>
					<p>MST:</p>
                </div><!--info_kg-->   
                <div style="float:left">
                	<p><?= $lang->get('bGDCTXD')?></p>
                    <p><?php if(isset($result['0']['tenkh'])) echo $result['0']['tenkh'];?></p>
					<p><?php if(isset($result['0']['dchi'])) echo $result['0']['dchi'];?></p>
					<p><?php if(isset($result['0']['msthue'])) echo $result['0']['msthue'];?></p>
                </div><!--info_nd-->
            </div><!--content_info-->
			<p><?= $lang->get('vSLHHNS')?></p>
        	<div class="table_hd">
			<?php
			
            	echo '<table width="980" border="1" cellspacing="0" cellpadding="0">
                   <tr>
                     <th width="27" scope="col">'.$lang->get('sTT').'</th>
                    <th width="411" scope="col">'.$lang->get('mhang').'</th>
                    <th width="207" scope="col">'.$lang->get('moTaKyThuat').'t</th>
                    <th width="97" scope="col">'.$lang->get('dvtinh').'</th>
                    <th width="110" scope="col">'.$lang->get('sluong').'</th>
					 <th width="114" scope="col">'.$lang->get('ghichu').'</th>
              
                  </tr>';
				  $stt = 1;
					foreach($result as $res){
                 echo '<tr>
                    <td  style="padding:5px; width:27px; text-align:center">'.$stt.'</td>
                    <td  style="padding:5px; width:411px; text-align:left">'.$res['tensp'].'</td>
                    <td  style="padding:5px; width:207px; text-align:left">'.$res['motakt'].'</td>
                    <td  style="padding:5px; width:97px; text-align:center">'.$res['dvtinh'].'</td>
                    <td  style="padding:5px; width:110px; text-align:center">'.$res['sluong'].'</td>
					 <td  style="padding:5px; width:110px; text-align:center">Gởi lại '.$res['slhgui'].'</td>
                  </tr>';
				  $stt++;
				  }
           
              echo '</table>';
			   
			 $query = "
			  SELECT *
			  FROM $rel1 as d,$rel2 as t
			  WHERE d.$primary = t.$primary AND d.$primary = '".$_GET['id']."' AND hkmai = '1' AND slhgui = '0'";
			  $db->querySql($query);
			 
				if($db->numrows() > 0){
		      $result2 = $db->fetchToArray();	
		 		echo '<h3 style="margin:10px 0">'.$lang->get('hkmai').'</h3>';
				
				
            	echo '<table width="980" border="1" cellspacing="0" cellpadding="0">
                  <tr>
                     <th width="27" scope="col">'.$lang->get('sTT').'</th>
                    <th width="411" scope="col">'.$lang->get('mhang').'</th>
                    <th width="207" scope="col">'.$lang->get('moTaKyThuat').'t</th>
                    <th width="97" scope="col">'.$lang->get('dvtinh').'</th>
                    <th width="110" scope="col">'.$lang->get('sluong').'</th>
					<th width="110" scope="col">'.$lang->get('ghichu').'</th>
                  </tr>';
				   $stt2 = 1;
				
				  foreach($result2 as $res2){
              echo '<tr>
                    <td  style="padding:5px; width:27px; text-align:center">'.$stt.'</td>
                    <td  style="padding:5px; width:411px; text-align:left">'.$res2['tensp'].'</td>
                    <td  style="padding:5px; width:207px; text-align:left">'.$res2['motakt'].'</td>
                    <td  style="padding:5px; width:97px; text-align:center">'.$res2['dvtinh'].'</td>
                    <td  style="padding:5px; width:110px; text-align:center">'.$res2['sluong'].'</td>
					 <td  style="padding:5px; width:110px; text-align:center">'.$res2['ghichu'].'</td>
                  </tr>';
				  $stt2++;
				  }
				  
                echo '</table>';
				}
				?>
            </div><!--table_hd-->
            <div style="margin-top:5px;">
            	<span style="float:left">* Điểm Giao Hàng:</span><p style="text-align:center">Nhà Máy Dầu Nhờn Cát Lái</p>
            </div>
            <div style="width:490px; float:left">
            	<span style=" margin-right:125px">* Xe Giao Hàng:</span><span><?php if(isset($result['0']['xghang'])) echo $result['0']['xghang'];?></span>
                <div style=" clear:both"></div>
				<span style=" margin-right:125px">* Hình thức thanh toán:</span><span>Chuyển khoản</span>
                
            </div>
            <div style="width:490px; margin-top:5px; float:left">
            	<span style="margin-right:125px">* Người Nhận:</span><span><?php if(isset($result['0']['nnhang'])) echo $result['0']['nnhang'];?></span>
                <div style=" clear:both"></div>
                <span style="margin-right:125px;">* Số CMND:</span><span>0<?php  if(isset($result['0']['socmnd']))echo $result['0']['socmnd'];?></span>
            </div>
			
			<div style="margin-top:5px;">
			<span style=" margin-right:125px">* Lệnh xuất hằng ngày:</span><span><?php if(isset($result['0']['ngayhd'])) echo date_format($result['0']['ngayhd'],"d/m/Y");?></span>
            </div>
             <div style="margin-top:5px;">
            	<span style="float:left">* Người Phụ Trách:</span><p style="text-align:center"><?php if(isset($result['0']['nphutrach'])) echo $result['0']['nphutrach'];?></p>
            </div>
            <div style="margin-top:20px;clear: both;">
            	<div style=" width:326px; text-align: center; float:left" >
                	<h3 style="margin-bottom:100px;">Tổng Giám Đốc</h3>
                    <p>Lê Văn Toàn</p>
                </div>
                <div style=" width:326px; text-align: center; float:left" >
                	<h3 style="margin-bottom:100px;">Kế Toán Trưởng</h3>
                	<p>Mai Thành Thanh Nhã</p>
                </div>
                <div style=" width:326px; text-align: center; float:left" >
					<h3 style="margin-bottom:100px;">Giám Đốc Nhà Máy</h3> 
                    <p>Phùng Lễ Minh</p>               
                </div>
            </div><!--footer_hd-->
        </div>
    </div>
            
            <div style="clear:both"></div>
