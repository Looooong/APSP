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
            <p style="text-align:center; font-size:20px;"><strong>BẢNG CÔNG ĐOÀN</strong></p>
               
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
                	<?php include "cdnhamay.php";?>
                </div><!---#a--->
                <div  id="b" class="tab-content">
                
               			<?php include "cdkinhdoanh.php";?>
                
                </div><!---#b--->
                <div id="c" class="tab-content">
                
                <?php include "cdvanphong.php";?>
                
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