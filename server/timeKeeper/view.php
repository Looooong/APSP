<?php
	//Lấy tên tất cả cơ sơ dữ liệu
	$query = "SELECT name FROM sys.databases";
	$db->querySQL($query);
	$result = $db->fetchToArray();
	
	//Chức năng lọc ra cơ sở dữ liệu bắt đầu bằng APSP
	function searchAPSP($var) {
		return preg_match('/APSP_/', $var['name']);
	};
	
	//Lọc tên ra biến mới
	$databases = array_filter($result, 'searchAPSP');
	
	//Đưa dữ liệu vào mảng mới
	//cấu trúc [năm][tháng]
	foreach ($databases as $data) {
		$datum = explode("_", $data['name']); //APSP_tháng_năm
		$selection[$datum[2]][] = $datum[1]; //       [1]  [2]
	};
	
	function sortAPSP($a, $b) {
		if ($a > $b)
			return -1;
		else if ($a < $b)
			return 1;
		else
			return 0;
	};
	
	uksort($selection, 'sortAPSP');
	foreach ($selection as $data) {
		usort($data, 'sortAPSP');
	};
	
	setcookie("selection", serialize($selection));
?>
	<style type="text/css">
    .table .gread{ font-size:12px;}
	.thang_cc { font-weight:bold; font-size:20px;line-height:20px;}
	.thang_cc_tit { color:#212AFA; float:right; font-size:12px; font-weight:bold; line-height:25px; margin-right:20px;}
	.point_gread:hover { cursor:pointer}
    </style>

    <div class="block-border" style="overflow:hidden">
        <div class="block-header">
       		<h1>Chấm Công</h1><span></span>
        </div>
    <div class="block-content">
    	<p style=" background:#D7E9EA">
    		<span class="thang_cc">
            	<select id='months' onchange='selectMonth()'>
                	<option value='<?=date('n')?>'><?=$lang->get('thang'.date('n'))?></option>
                    <?php
						foreach ($selection as $index => $data) {
							if ($index == date('Y')) {
								foreach ($data as $value) {
						?>
                        	<option value='<?=$value?>'><?=$lang->get("thang".$value)?></option>
                        <?php
								};
							};
						};
					?>
                </select>
                <select id='years' onchange='selectYear()'>
                	<option value='<?=date('Y')?>'><?=$lang->get('year', date('Y'))?></option>
                    <?php
						foreach ($selection as $index => $data) {
							if ($index != date('Y')) {
						?>
                        	<option value='<?=$index?>'><?=$lang->get("year", $index)?></option>
                        <?php
							};
						};
					?>
                </select>
                <input type="hidden" id="curMonth" value="<?=date('n')?>" />
                <input type="hidden" id="curYear" value="<?=date('Y')?>" />
            </span>
    		<span class="thang_cc_tit">C: Có Mặt - V:Vắng - N:Nữa Buổi Có Phép - I:Nữa Buổi Không Phép - P:Phép - G:Ngoài Giờ</span>
    	</p>
        		<div id="coverer" style="display: none; position: absolute; width:98.4%; z-index:999; background:rgba(229, 238, 17, 0.18); height:485px">
    			</div>
                <div id="timeTable" style="position:relative;  background:#F2F2F2; overflow:scroll; height:500px;">
                </div>
                <div class="block-actions">
                    <ul class="actions-left">
                        <li><input type="button" id="saveButton" class="button" onclick="saveStatus()" value="<?=$lang->get("ghi")?>"></li>	
                         <li><input type="button" class="button"  value="<?=$lang->get("chot")?>" onclick="saveStatus(); changeLock(document.getElementById('locker'))"></li>	

                    </ul>
                </div>
        </div>
    </div>
    
  
<style>
._w100 { width:100px}
._w200 { width:200px;}
.table td { text-align:center; font-size:12px;}
.table td p{ text-align:center; font-weight:bold; color:#2a3640;}
</style>

 <div class="block-border">

    <div id="tab-panel2">
        <div class="block-header">
            <p style="margin-left:20px;text-align:left">Lầu 1,6B ôn Đức Thắng, Phường Bến Nghé, Q1</p>
            <p style="margin-left:20px; text-align:left">MST:0305715556</p>
            <p style="text-align:center; font-size:20px;"><strong>BẢNG BHXH - BHTN - BHYT</strong></p>
               
        </div>   
        <div class="block-header">
            <ul class="tabs">
                    <li><a style=" color:#333; font-weight:bold" href="#a">Nhà Máy</a></li>
                    <li><a style=" color:#333; font-weight:bold" href="#b">Kinh Doanh</a></li>
                    <li><a style=" color:#333; font-weight:bold" href="#c">Văn Phòng</a></li>
                   
            </ul> 
        </div> 
    
            <div style=" background:#F2F2F2; overflow-x:scroll; width:1057px;" class=" load block-content tab-container">
                <div  id="a" class="tab-content">
				
                </div><!---#a--->
                <div  id="b" class="tab-content">
               
                </div><!---#b--->
                <div id="c" class="tab-content">
               
                </div><!---#c--->
               
            </div>
           <div class="block-actions">

        <ul class="actions-left">
           
            <li><input type="button" class="button" onclick="tableToExcel('txet')" value="<?=$lang->get('xuat')?>"></li>


<!--       		<li><input class='button' type='button' value="<?//= $lang->get('xoaDong') ?>" onclick='SomeDeleteRowFunction(this)'></li>-->
        </ul>
   </div>
       
    </div> 

</div>
  <script type="text/javascript">
		$('table#txet > tbody > tr').click(function(){
			$("#edit-button").attr('rel',$(this).attr('rel')); 
			$("#delete-button").attr('rel',$(this).attr('rel'));
			$("#pradd").attr('rel',$(this).attr('rel'));
			
		});
		
		function printadd(){	
		$('table#txet > tbody > tr').click(function(){
		var print_id = $("#pradd").attr("rel");
		var targetbox = $('a#pradd').attr("href","server/salary/hopdonglaodong.php?adID="+print_id);
		// $('#pradd').html(targetbox);
		}
		)};
var tableToExcel = (function() {
  var uri = 'data:application/vnd.ms-excel;base64,'
    , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--><meta http-equiv="content-type" content="text/plain; charset=UTF-8"/></head><body><table>{table}</table></body></html>'
    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
  return function(table, name) {
    if (!table.nodeType) table = document.getElementById(table)	
    var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML,}
	//var p = document.getElementById('tdecore')
	//p.style.textDecoration = 'none';
    window.location.href = uri + base64(format(template, ctx))
  }
})()
</script>

<script type = "text/javascript">
	function SomeDeleteRowFunction(o) {
		 var p=o.parentNode.parentNode;
			 p.parentNode.removeChild(p);
	}
</script>
<script>
	$().ready(function() {
		$("#tab-panel2").createTabs();
	});
</script>
<!--???PHPTOSCRIPT???-->
<script language="javascript" type="text/javascript">
<?php
	include "view.js";
?>
</script>