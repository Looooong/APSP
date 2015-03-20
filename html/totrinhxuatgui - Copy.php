<?php
require_once 'inc/database.class.php';
require_once 'inc/config.php';
require_once "inc/languages.class.php";
session_start();
$lang= new languages;// khai báo bien lang goi da ngon ngu

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tờ Trình</title>
<style type="text/css">
* { padding:0px; margin:0px;}  
.input_hd{font-weight:bold; color:#FFF; padding:5px 100px; background:#03F}
.input_hd:hover { color:#00F; background:#FFF }
</style>
<script type="text/javascript">
                        function printContent(id) {
                            str = document.getElementById(id).innerHTML
                            newwin = window.open();
                            newwin.document.write('<HTML>\n<HEAD>\n')
                            newwin.document.write('<TITLE>Print Page</TITLE>\n')
                            newwin.document.write('<script>\n')
                            newwin.document.write('function chkstate(){\n')
                            newwin.document.write('if(document.readyState=="complete"){\n')
                            newwin.document.write('window.close()\n')
                            newwin.document.write('}\n')
                            newwin.document.write('else{\n')
                            newwin.document.write('setTimeout("chkstate()",2000)\n')
                            newwin.document.write('}\n')
                            newwin.document.write('}\n')
                            newwin.document.write('function print_win(){\n')
                            newwin.document.write('window.print();\n')
                            newwin.document.write('chkstate();\n')
                            newwin.document.write('}\n')
                            newwin.document.write('<\/script>\n')
                            newwin.document.write('</HEAD>\n')
                            newwin.document.write('<BODY onload="print_win()">\n')
                            newwin.document.write(str)
                            newwin.document.write('</BODY>\n')
                            newwin.document.write('</HTML>\n')
                            newwin.document.close()
                        }
                    </script>
                 
   <div id="txthint">

	<div style="width:980px; margin:0 auto; font-size:18px;">

    	<div style="overflow:hidden; clear:both">
        	<p style=" text-align:center">(Biểu mẫu số:PCS-SNM-002)</p>
        	<div style="margin:5px 0">
            	<div style=" width:600px; overflow:hidden; float:left" >
                	<h2>AP SAIGON PETRO JSC</h2>
                    <p>Office:Floor 1, 6B Ton Duc thang St,Dist,1,HCMC</p>
                    <p>Plant: thanh My Loi Ward,Dist 2,HCMC</p>
                </div>
            	<img height="72" align="right" src="../src/img/bg/apsp.png" />
            </div><!--com_hd-->
        </div><!--title_hd-->
        <div class="content_hd">
        	<h1 style="text-align:center"><?= $lang->get('toTrinh','xuatGui')?></h1>
            <p style="text-align:center">( <?= $lang->get('coGiaTri')?> )</p>
            <div  style="float:right">
                <p><strong><?= $lang->get('toTrinh')?>:</strong> DN LT 1310-105</p>
                <p><strong><?= $lang->get('ngay')?>:</strong> 18/10/2013</p>
			</div>
            <div style=" overflow:hidden">
            	<div style="width:150px; float:left">
                	<h3><?= $lang->get('kinhGui')?>:</h3>
                </div><!--info_kg-->   
                <div style="float:left">
                	<p>- Tổng Giám Đốc</p>
                    <p>- Kế Toán Trưởng</p>
                    <p>- Giám Đốc Nhà Máy</p>
                </div><!--info_nd-->
            </div><!--content_info-->
            <div style=" overflow:hidden">
				<div style="width:150px; float:left">
                	<p><?= $lang->get('kinhTrinh')?>:</p>
                    <p><?= $lang->get('lkhang')?>:</p>
                </div><!--info_kg-->   
                <div style="float:left">
                	<p><?= $lang->get('gDKDGDNM')?></p>
                    <h3>Cty TNHH LIÊN thẮNG</h3>
                </div><!--info_nd-->
            </div><!--content_info-->
			<p><?= $lang->get('vSLHHNS')?></p>
        	<div class="table_hd">
            	<table width="980" border="1" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="39" scope="col"><?= $lang->get('sTT')?></td>
                    <td width="560" scope="col"><?= $lang->get('mhang')?></td>
                    <td width="88" scope="col"><?= $lang->get('dvtinh')?></td>
                    <td width="149" scope="col"><?= $lang->get('sluong')?></td>
                    <td width="132" scope="col"><?= $lang->get('ghiChu')?></td>
                  </tr>
                  <tr>
                    <td  style="padding:5px; text-align:center">1</td>
                    <td  style="padding:5px; text-align:center"><div align="left">Dầu nhờn SP Hydraulic VG 68_200L</div></td>
                    <td  style="padding:5px; text-align:center">Phuy</td>
                    <td  style="padding:5px; text-align:center">5</td>
                    <td  style="padding:5px; text-align:center">&nbsp;</td>
                  </tr>
                  <tr>
                    <td  style="padding:5px; text-align:center">2</td>
                    <td  style="padding:5px; text-align:center"><div align="left">Dầu nhờn AP Hydraulic VG 68_290L</div></td>
                    <td  style="padding:5px; text-align:center">Phuy</td>
                    <td  style="padding:5px; text-align:center">2</td>
                    <td  style="padding:5px; text-align:center">&nbsp;</td>
                  </tr>
                  <tr>
                    <td  style="padding:5px; text-align:center">3</td>
                    <td  style="padding:5px; text-align:center"><div align="left">Dầu nhờn SP Hydraulic VG 68_200L</div></td>
                    <td  style="padding:5px; text-align:center">Phuy</td>
                    <td  style="padding:5px; text-align:center">1</td>
                    <td  style="padding:5px; text-align:center">&nbsp;</td>
                  </tr>
                  <tr>
                    <td  style="padding:5px; text-align:center">4</td>
                    <td  style="padding:5px; text-align:center"><div align="left">Dầu nhờn SP Hydraulic VG 99_200L</div></td>
                    <td  style="padding:5px; text-align:center">Chai</td>
                    <td  style="padding:5px; text-align:center">24</td>
                    <td  style="padding:5px; text-align:center">&nbsp;</td>
                  </tr>
               </table>
				
          </div><!--table_hd-->
            <div style="margin-top:5px;">
            	<span style="float:left">* Điểm Giao Hàng:</span><p style="text-align:center">Nhà Máy Dầu Nhờn Cát Lái</p>
            </div>
            <div style="width:490px; float:left">
            	<span style=" margin-right:125px">* Xe Giao Hàng:</span><span>54V-6789</span>
                <div style=" clear:both"></div>
                <span style=" margin-right:125px">* Lệnh Xuất Hàng Ngày:</span><span>18\10\2013</span>
            </div>
            <div style="width:490px; margin-top:5px; float:left">
            	<span style="font-weight:bolh; margin-right:125px">* Người Nhận:</span><span>Đỗ Đăng Quang</span>
                <div style=" clear:both"></div>
                <span style="font-weight:bold; margin-right:125px;">* Số CMND:</span><span>022.928.209</span>
            </div>
             <div style="margin-top:5px;">
            	<span style="float:left">* Người Phụ Trách:</span><p style="text-align:center">Trần Cao Đạt</p>
            </div>
            <div style="margin-top:20px;">
            	<div style=" width:326px; text-align: center; float:left" >
                	<h3 style="margin-bottom:100px;">Tổng Giám Đốc</h3>
                    <p>Lê Văn Toàn</p>
                </div>
                <div style=" width:326px; text-align: center; float:left" >
                	<h3 style="margin-bottom:100px;">Kế Toán Trưởng</h3>
                	<p>Mai thành thanh Nhã</p>
                </div>
                <div style=" width:326px; text-align: center; float:left" >
					<h3 style="margin-bottom:100px;">Giám Đốc Nhà Máy</h3> 
                    <p>Phùng Lễ Minh</p>               
                </div>
            </div><!--footer_hd-->
        </div>
    </div>
            </div>
            <div style="clear:both"></div>
    <p style="border:5px groove #FFF; background:#886126; text-align: center"><input class="input_hd"   type="button" name="submit" value="Print page" onClick="printContent('txthint')" />

