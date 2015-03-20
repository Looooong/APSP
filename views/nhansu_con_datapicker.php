<?php ob_start();
	session_start();
	require_once "classnv.php";
	$nv=new quanly;
	if (isset($_POST['btnUpdate'])){
	$nv->themnv();
	header("location:index.php?options=hosonv");
	}
?>

 <div class="block-border">
    <div class="block-header">
        <h1><?=$lang->get("nhanSu")?></h1>
    </div>
	<form class="block-content form" action="" method="post" enctype="multipart/form-data"> 
        <div style="width:724px;overflow:hidden; margin:0 auto">
            <div id="steps">
                <div class="step">
                    <div class="block-header">
                        <h1><?=$lang->get("thongTin","canhan")?></h1>
                    </div>
                        <div class="_100">
                            <div style=" margin:0 auto; width:120px; height:150px;background:url(src/img/48x48/personal.png) no-repeat center center"></div>                            
                            <p style="text-align:center"><input size="19" name="file" id="file" type="file"></p>
                        </div>
                        <div class="clear"></div>
                        <div class="_50">
                            <p><label class="line_height_1"><?=$lang->get("hoTen")?></label><input name="hoTen" class="required fr" type="text" value="" /></p>
                        </div>
                        <div class="_50">
                            <p><label class="line_height_1"><?=$lang->get("maNV")?></label><input name="maNV" class="required fr" type="text" value="" /></p>
                        </div>
                        <div class="_50">
                            <p class="no-top-margin"><label class="line_height_1" for="firstname"><?=$lang->get("tenThuongGoi")?></label><input name="tenThuongGoi" class="required fr" type="text" value="" /></p>
                        </div>
                         <div class="_50">
                            <p><label class="line_height_1"><?=$lang->get("dienThoai")?></label><input name="dienThoai" class="required fr" type="text" value="" /></p>
                        </div>
                        <div class="_50">
                            <p><label class="line_height_1"><?=$lang->get("diDong")?></label><input name="diDong" class="required fr" type="text" value="" /></p>
                        </div>
                        <div class="_50">
                            <p><label class="line_height_1"><?=$lang->get("khanCap")?></label><input name="khanCap" class="required fr" type="text" value="" /></p>
                        </div>
                        <div class="_50">
                            <p><label class="line_height_1" for="textfield2"><?=$lang->get("nguyenQuan")?></label><input name="nguyenQuan" class="required fr" type="text" value="" /></p>
                        </div>
                        <div class="_50">
                            <p><label class="line_height_1"><?=$lang->get("aTM")?></label><input name="aTM" class="required fr" type="text" value="" /></p>
                        </div>
                        <div class="_50">
                            <p><label class="line_height_1" for="datepicker"><?=$lang->get("namSinh")?></label><input id="datepicker" name="namSinh" class="required fr" type="text" value="" /></p>
                        </div>
                        <div class="_50">
                        <p><label class="line_height_1"  for="textfield2"><?=$lang->get("luongCB")?></label><input id="textfield2" type="text" class="required fr"  value="" name="luongCB"/></p>
                        </div>
                        <div class="_50">
                               <p>
                                    <label class="line_height_1" for="select"><?=$lang->get("bophanID")?></label>
                                    <select name="bophanID" id="bophanID">

                                        <?php 
											$query="select * from bophan";
											$db->querySql($query);
											$datain = $db->fetchToArray();
											foreach ($datain as $value){?>
											<option value="<?php echo $value['bophanID'];?>"><?php echo $value['tenBPVi'];?></option>
										<?php }?>
                                    </select>
                                </p>
                            </div>
                            <div class="_50">
                               <p>
                                    <label class="line_height_1" for="select"><?=$lang->get("nhom")?></label>
                                    <select name="nhomID" id="nhomID">

                                        <?php 
											$query="select * from nhom";
											$db->querySql($query);
											$datain = $db->fetchToArray();
											foreach ($datain as $value){?>
											<option value="<?php echo $value['nhomID'];?>"><?php echo $value['tenNhomVi'];?></option>
										<?php }?>
                                    </select>
                                </p>
                            </div>
                            <div class="_50">
                               <p>
                                    <label class="line_height_1" for="select"><?=$lang->get("kvuc")?></label>
                                    <select name="cvID" id="cvID">

                                        <?php 
                                        $query="select * from kvuc";
                                        $db->querySql($query);
                                        $datain = $db->fetchToArray();
                                        foreach ($datain as $value){?>
                                       		<option value="<?php echo $value['kvID'];?>"><?php echo $value['nkvuc'];?></option>
                                        <?php }?>
                                    </select>
                                </p>
                            </div>
                            <div class="_50">
                               <p>
                                    <label class="line_height_1" for="select"><?=$lang->get("chucVu")?></label>
                                    <select name="cvID" id="cvID">

                                        <?php 
                                        $query="select * from congty";
                                        $db->querySql($query);
                                        $datain = $db->fetchToArray();
                                        foreach ($datain as $value){?>
                                        	<option value="<?php echo $value['cvID'];?>"><?php echo $value['tenCVVi'];?></option>
                                        <?php }?>
                                    </select>
                                </p>
                            </div>
                 </div><!--step-->

                <div class="step">
                 	<div class="block-header">
                        <h1><?=$lang->get("thongTin","chung")?></h1>
                    </div>                    	
                        <div class="_50">
                            <fieldset>
                                <legend><?=$lang->get("thongTin")?></legend>
                                <div class="_100">
                                    <p>
                                        <label class="line_height_1" for="select"><?=$lang->get("quocTich")?></label>
                                        <select name="qtID" id="qtID">

                                            <?php 
                                            $query="select * from quoctich";
                                            $db->querySql($query);
                                            $datain = $db->fetchToArray();
                                            foreach ($datain as $value){?>
                                            	<option value="<?php echo $value['qtID'];?>"><?php echo $value['tenQTVi'];?></option>
                                            <?php }?>
                                        </select>
                                    </p>
                                </div>
                                <div class="_100">
                                    <p>
                                        <label class="line_height_1" for="select"><?=$lang->get("danToc")?></label>

                                        <select  name="dtID" id="dtID">                
                                            <?php 
                                            $query="select * from dantoc";
                                            $db->querySql($query);
                                            $datain = $db->fetchToArray();
                                            foreach ($datain as $value){?>
                                            	<option value="<?php echo $value['dtID'];?>"><?php echo $value['tenDTVi'];?></option>
                                            <?php }?>
                                        </select>
                                    </p>
                                </div>    
                                <div class="_100">
                                    <p>
                                        <label class="line_height_1" for="select"><?=$lang->get("tonGiao")?></label>
                                        <select  name="tgID" id="tgID">

                                            <?php 
                                            $query="select * from tongiao";
                                            $db->querySql($query);
                                            $datain = $db->fetchToArray();
                                            foreach ($datain as $value){?>
                                            	<option value="<?php echo $value['tgID'];?>"><?php echo $value['tenTGVi'];?></option>
                                            <?php }?>
                                        </select>
                                    </p>
                                </div>
                                
                                <div class="_50">
                                <p>
                                    <label class="line_height_1" for="select"><?=$lang->get("vanHoa")?></label>
                                    <select name="vhID" id="vhID">

                                        <?php 
                                        $query="select * from vanhoa";
                                        $db->querySql($query);
                                        $datain = $db->fetchToArray();
                                        foreach ($datain as $value){?>
                                       		<option value="<?php echo $value['vhID'];?>"><?php echo $value['tenVHVi'];?></option>
                                        <?php }?>
                                    </select>                    
                                </p>
                            </div>            
                           <div class="_50">
                                <p>
                                    <label class="line_height_1" for="select"><?=$lang->get("chuyenMon")?></label>
                                    <select name="cmID" id="cmID">

                                        <?php 
                                        $query="select * from chuyenmon";
                                        $db->querySql($query);
                                        $datain = $db->fetchToArray();
                                        foreach ($datain as $value){?>
                                        <option value="<?php echo $value['cmID'];?>"><?php echo $value['tenCMVi'];?></option>
                                        <?php }?>
                                    </select>                    
                                </p>
                            </div>
                         	</fieldset>
                         </div>
                         	<div class="_50">
                        	 <fieldset>

                            <legend><?=$lang->get("tinhTrang","chung")?></legend>
                            <div class="_30">
                                <p><label class="line_height_1" for="textfield1"><?=$lang->get("sucKhoe")?></label><input id="textfield1" type="text" value="" name="sucKhoe" style="width:102px"/></p>
                            </div>        
                            <div class="_30">
                                <p><label class="line_height_1" for="textfield2"><?=$lang->get("chieuCao")?></label><input id="textfield2" type="text" value="" name="chieuCao" style= "width:102px"/></p>
                            </div>            
                            <div class="_30">
                                <p><label  class="line_height_1" for="textfield2"><?=$lang->get("canNang")?></label><input id="textfield2" type="text" value="" name="canNang" style="width:102px"/></p>
                            </div>
                           <div class="_100">
                                <p>
                                    <span class="label"><?=$lang->get("gioitinh")?></span>
                                    <label><input type="radio" name="gioitinh" id="0" value="0" /><?=$lang->get("nam")?></label>
                                    <label><input type="radio" name="gioitinh"  id="1" value="1" checked="checked"/><?=$lang->get("nu")?></label>
                                </p>
                            </div>
                            <div class="_100">
                                <p><label for="textarea"><?=$lang->get("ghiChu")?></label><textarea id="textarea" name="ghiChu" class="required" rows="5" cols="40"></textarea></p>
                            </div>
                        </fieldset>
                    	</div>       
                        
                        <div class="_50">
                            <fieldset>
                                <legend><?=$lang->get("cMND")?></legend>
                                <div class="_100">
                                    <p class="line_height">
                                    <label for="textfield1"><?=$lang->get("cMND")?></label><input id="textfield1" name="cMND" type="text" style="width:220px" class="fr" value=""/></p>
                                </div>            
                                <div class="_100">
                                  <p class="line_height"><label for="datepicker"><?=$lang->get("ngayCap")?></label><input id="datepicker1" name="ngayCap" class="fr" style="width:220px" type="text" value="" /></p>
                                </div>
                                <div class="_100">
                                    <p class="line_height"><label for="textfield2"><?=$lang->get("noiCap")?></label><input id="textfield2" type="text" class="fr" style="width:220px" name="noiCap" value=""/></p>
                                </div>
                                 <div class="_100">
                                <p class="line_height"><label for="textfield1"><?=$lang->get("hoKhau")?></label><input id="textfield1" type="text" class="fr" name="hoKhau" style="width:220px" value=""/></p>
                            </div>        
                            <div class="_100">
                                <p class="line_height"><label for="textfield2"><?=$lang->get("diaChi")?></label><input id="textfield2" type="text" class="fr" name="diaChi" style="width:220px" value=""/></p>
                            </div>  
                            </fieldset>
                        </div>
                       <div class="_50">
                        	  <fieldset>
                                <legend><?=$lang->get("ketNap")?></legend>
                                <div class="_100">
                                    <p style=" margin-top:5px;">
                                        <span class="label"><?=$lang->get("ketNap")?></span>
                                        <label><input type="radio" name="ketnap"   id="0" value="0"/><?=$lang->get("dangVien")?></label>
                                        <label><input type="radio" name="ketnap"   id="1" value="1" /><?=$lang->get("doanVien")?></label>
                                        <label><input type="radio" name="ketnap"   id="2" value="2" checked="checked"/><?=$lang->get("khong")?></label>
                                    </p>
                                </div>
                                <div class="_100">            
                                    <p><label class="line_height" for="datepicker"><?=$lang->get("ngayGiaNhap")?></label><input id="datepicker3" name="ngayGiaNhap" style="width:220px" class="fr" type="text" value="" /></p>
                                </div>                
                                <div class="_100">
                                    <p class="line_height"><label for="textfield2"><?=$lang->get("noiKN")?></label><input id="textfield2" type="text" class="fr" style="width:220px" name="noiKN"value=""/></p>
                                </div>
                                <div class="_100">
                                    <p class="line_height"><label for="textfield2"><?=$lang->get("chucVuKN")?></label><input id="textfield2" type="text" class="fr" style="width:220px" name="chucVuKN"value=""/></p>
                                </div>
                            </fieldset>
                        </div>
                        
                  </div><!--step-->
                 
				<div class="step">
                    <div class="block-header">
                        <h1><?=$lang->get("thongTin","congViec")?></h1>
                    </div>
                                    
         			
                     
                    <div class="_100">
                        <fieldset>
                            <legend><?=$lang->get("baoHiem")?></legend>
                            <div class="_30">
                                <p class="line_height"><label for="textfield2"><?=$lang->get("soBHXH")?></label><input id="textfield2" type="text" class="fr" style="width:120px" value="" name="soBHXH"/></p>
                            </div>
                            <div class="_30">
                                <p class="line_height"><label for="datepicker"><?=$lang->get("ngayCapBH")?></label><input id="datepicker9" name="ngayCapBH" class="fr" style="width:120px"  type="text" value="" /></p>
                            </div>
                            <div class="_30">
                                <p class="line_height"><label for="textfield2"><?=$lang->get("noicapBH")?></label><input id="textfield2" type="text" class="fr" style="width:120px" value="" name="noicapBH"/></p>
                            </div>
                            <div class="_30">
                                <p class="line_height"><label for="textfield2"><?=$lang->get("soBHYT")?></label><input id="textfield2" type="text" class="fr" style="width:120px" value="" name="soBHYT"/></p>
                            </div>
                            <div class="_30">
                               
                                <p><label for="textarea"><?=$lang->get("quatrinhBH")?></label><textarea id="textarea" name="quatrinhBH" class="required" rows="5" cols="40"></textarea></p>
                            </div>
                            <div class="_30">
                                <p class="line_height"><label for="textfield2"><?=$lang->get("BHTN")?></label><input id="textfield2" type="text" class="fr" style="width:120px" value="" name="BHTN"/></p>
                            </div>
                            
                            
                        </fieldset>
                    </div>
                     <div class="_100">
                        <fieldset>
                            <legend>Lương</legend>
                           
                            <div class="_30">
                                <p class="line_height"><label for="textfield2"><?=$lang->get("bacLuong")?></label><input id="textfield2" type="text" class="fr" style="width:120px" value="" name="bacLuong"/></p>
                            </div>
                            <div class="_30">
                                <p class="line_height"><label for="textfield2"><?=$lang->get("hSTN")?></label><input id="textfield2" type="text" class="fr" style="width:120px" value="" name="hSTN"/></p>
                            </div>
                            <div class="_30">
                                <p class="line_height"><label for="textfield2"><?=$lang->get("hSCV")?></label><input id="textfield2" type="text" class="fr" style="width:120px" value="" name="hSCV"/></p>
                            </div>
                            <div class="_30">
                                <p class="line_height"><label for="textfield2"><?=$lang->get("com")?></label><input id="textfield2" type="text" class="fr" style="width:120px" value="" name="com"/></p>
                            </div>
                            
                            <div class="_30">
                                <p class="line_height"><label for="textfield2"><?=$lang->get("anNgoaiGio")?></label><input id="textfield2" type="text" class="fr" style="width:120px" value="" name="anNgoaiGio"/></p>
                            </div>
                            <div class="_30">
                                <p class="line_height"><label for="textfield2"><?=$lang->get("xang")?></label><input id="textfield2" type="text" class="fr" style="width:120px" value="" name="xang"/></p>
                            </div>
                            <div class="_30">
                                <p class="line_height"><label for="textfield2"><?=$lang->get("docHai")?></label><input id="textfield2" type="text" class="fr" style="width:120px" value="" name="docHai"/></p>
                            </div>
                            
                            <div class="_30">
                                <p class="line_height"><label for="textfield2"><?=$lang->get("chuyenCan")?></label><input id="textfield2" type="text" class="fr" style="width:120px" value="" name="chuyenCan"/></p>
                            </div>
                         
                            <div class="_30">
                                <p class="line_height"><label for="textfield2"><?=$lang->get("dMSL")?></label><input id="textfield2" type="text" class="fr" style="width:120px" value="" name="dMSL"/></p>
                            </div>
                           
                            <div class="_30">
                                <p class="line_height"><label for="textfield2">SL Áp Dụng</label><input id="textfield2" type="text" class="fr" style="width:120px" value="" name="sLCK"/></p>
                            </div>
                            <div class="_30">
                                <p class="line_height"><label for="textfield2"><?=$lang->get("giamtru")?></label><input id="textfield2" type="text" class="fr" style="width:120px" value="" name="giamtru"/></p>
                            </div>
                           <!-- <div class="_30">
                                <p class="line_height"><label for="textfield2"><?//=$lang->get("congCu")?></label><input id="textfield2" type="text" class="fr" style="width:120px" value="" name="congCu"/></p>
                            </div>
                            <div class="_30">
                                <p class="line_height"><label for="textfield2"><?//=$lang->get("nangLuong")?></label><input id="textfield2" type="text" class="fr" style="width:120px" value="" name="nangLuong"/></p>
                            </div>
                            <div class="_30">
                                <p class="line_height"><label for="textfield2"><?//=$lang->get("dieuChuyen")?></label><input id="textfield2" type="text" class="fr" style="width:120px" name="dieuChuyen" value=""/></p>
                            </div>-->
                        </fieldset>
                    </div>
  				</div><!--step-->
                <div class="step">
                    <div class="block-header">
                        <h1><?=$lang->get("hopDong")?></h1>
                    </div>
                   
                    <div class="_100">
                        <fieldset>	
                           <legend><?=$lang->get("congViec")?></legend>
                            <div class="_30">
                                <p class="line_height_1"><label for="datepicker"><?=$lang->get("ngayThuviec")?></label><input id="datepicker4" name="ngayThuviec" style="width:120px" class="fr" type="text" value=""/></p>
                            </div>
                            <div class="_30">
                                <p class="line_height"><label for="textfield2"><?=$lang->get("soHDTV")?></label><input id="textfield2" type="text" class="fr" style="width:120px" value="" name="soHDTV"/></p>
                            </div>
                            <div class="_30">
                                <p class="line_height_1"><label for="datepicker"><?=$lang->get("ngayKetThuc")?></label><input id="datepicker5" name="ngayKetThuc" class="fr" style="width:120px" type="text" value="" /></p>
                            </div>
                            <hr style="clear:both" />
                            <div class="_30">
                                <p class="line_height_1"><label for="datepicker"><?=$lang->get("ngayBatDau")?></label><input id="datepicker6" name="ngayBatDau"style="width:120px" class="fr" type="text" value="" /></p>
                            </div>
                            <div class="_30">
                                <p class="line_height"><label for="textfield2"><?=$lang->get("soHD")?></label><input id="textfield2" type="text" class="fr" style="width:120px" value="" name="soHD"/></p>
                            </div>
                            <div class="_30">
                                <p class="line_height"><label for="textfield2"><?=$lang->get("noiLamViec")?></label><input id="textfield2" type="text" class="fr" style="width:120px" value="" name="noiLamViec"/></p>
                            </div>
                            <div class="_30">
                                <p style="margin-top:10px;">
                                    <label class="line_height_1" for="select"><?=$lang->get("danghd")?></label>
                                    <select name="dangID" id="dangID">

                                        <?php 
                                        $query="select * from danghd";
                                        $db->querySql($query);
                                        $datain = $db->fetchToArray();
                                        foreach ($datain as $value){?>
                                        <option value="<?php echo $value['dangID'];?>"><?php echo $value['tenDangVI'];?></option>
                                        <?php }?>
                                    </select>
                                </p>
                            </div>
                            <hr style="clear:both" />
                            <!--<div class="_30">
                                <p class="line_height"><label for="textfield2"><?//=$lang->get("luuTruCC")?></label><input id="textfield2" type="text" class="fr" style="width:120px" value="" name="luuTruCC"/></p>
                            </div>
                            <div class="_30">
                                <p class="line_height"><label for="textfield2"><?//=$lang->get("theodoiCC")?></label><input id="textfield2" type="text" class="fr" style="width:120px" value="" name="theodoiCC"/></p>
                            </div>
                            <div class="_30">
                                <p class="line_height"><label for="textfield2"><?//=$lang->get("tinhTrangCC")?></label><input id="textfield2" type="text" class="fr" style="width:120px" name="tinhTrangCC" value=""/></p>
                            </div>
                           
                            
                            <div class="_30">
                                <p class="line_height"><label for="textfield2"><?//=$lang->get("theoDoi")?></label><input id="textfield2" type="text" class="fr" style="width:120px" name="theoDoi" value=""/></p>
                            </div>-->
                            <div class="_30">
                                <p class="line_height"><label for="datepicker"><?=$lang->get("ngayThoiViec")?></label><input id="datepicker10" name="ngayThoiViec" class="fr" style="width:120px"  type="text" value="" /></p>
                            </div>
                            <div class="_30">
                                <p class="line_height"><label for="textfield2"><?=$lang->get("soQuyetDinh")?></label><input id="textfield2" type="text" class="fr" style="width:120px" value="" name="soQuyetDinh"/></p>
                            </div>
                            <div class="_30">
                                <p class="line_height"><label for="datepicker"><?=$lang->get("ngayQuyetDinh")?></label><input id="datepicker7" name="ngayQuyetDinh" class="fr" style="width:120px"  type="text" value="" /></p>
                            </div>
                        </fieldset>
                     </div>
                </div>
                <div class="step">
                    <div class="block-header">
                        <h1><?=$lang->get("honNhan")?></h1>
                    </div>
                   <div class="_100">
                      		  <fieldset>
                            <legend><?=$lang->get("honNhan")?></legend>
                            <div class="_30">
                                <p>
                                    <label class="line_height_1" for="select"><?=$lang->get("tinhTrang")?></label>
                                    <select name="hnID" id="hnID">
                                        
                                        <?php 
                                        $query="select * from honnhan";
                                        $db->querySql($query);
                                        $datain = $db->fetchToArray();
                                        foreach ($datain as $value){?>
                                        <option value="<?php echo $value['hnID'];?>"><?php echo $value['tenHNVi'];?></option>
                                        <?php }?>                    
                                    </select>
                                </p>
                            </div>        
                            <div class="_30">
                                <p class="line_height"><label for="textfield2"><?=$lang->get("voChong")?></label><input id="textfield2" type="text" class="fr" name="voChong" value=""/></p>
                            </div>            
                            <div class="_30">            
                                <p><label class="line_height" for="datepicker"><?=$lang->get("namSinhVC")?></label><input id="datepicker8" name="namSinhVC" class="fr" type="text" value="" /></p>
                            </div>	
                            <div class="_30">
                                <p class="line_height"><label for="textfield2"><?=$lang->get("ngheNghiep")?></label><input id="textfield2" type="text" class="fr" name="ngheNghiep" value=""/></p>
                            </div>	
                            <div class="_30">
                                <p class="line_height"><label for="textfield2"><?=$lang->get("diaChiVC")?></label><input id="textfield2" type="text" class="fr"  value="" name="diaChiVC"/></p>
                            </div>
                            <div class="_30">
                                <p class="line_height"><label for="textfield2"><?=$lang->get("soCon")?></label><input id="textfield2" type="text" class="fr"  value="" name="soCon"/></p>
                            </div>	
                             <div style="margin:0 0px;" class="_100">
                                <p><label for="textarea"><?=$lang->get("chiTietSC")?></label><textarea id="textarea" name="chiTietSC" class="required" rows="5" cols="40"></textarea></p>
                            </div>
                            			
                        </fieldset>
                    	</div>
                </div>
              </div><!--#steps-->
        </div>
 <div class="clear"></div>
  <div id="navigation" style="display:none;">
           <ul style="margin:0px; padding:0px;">
                <li class="selected">
                    <a href="#"><?=$lang->get("thongTin","caNhan")?></a>
                </li>
                <li>
                    <a href="#"><?=$lang->get("thongTin","chung")?></a>
                </li>
                
                 <li>
                    <a href="#"><?=$lang->get("thongTin","congViec")?></a>
                </li>
                <li>
                    <a href="#"><?=$lang->get("hopDong")?></a>
                </li>
                 <li>
                    <a href="#"><?=$lang->get("giaDinh")?></a>
                </li>
            </ul>
        </div>
        <div class="block-actions">
            <ul class="actions-left">
    <li><input name="btnUpdate" type="submit"  class="button"  value="<?=$lang->get('them')?>" /></li>
               
            </ul>
          
        </div>
            </form>
            
      
</div>