<script type="text/javascript" src="../../views/js/EditDeletePage.js"></script> 

	
        <style type="text/css">
     	      
            #loading{
                width: 100%;
                position: absolute;
                top: 100px;
                left: 100px;
				margin-top:200px;
            }
            #containerd .pagination ul li.inactive,
            #containerd .pagination ul li.inactive:hover{
                background-color:#ededed;
                color:#bababa;
                border:1px solid #bababa;
                cursor: default;
            }
            #containerd .data ul li{
                list-style: none;
                font-family: verdana;
                margin: 5px 0 5px 0;
                color: #000;
                font-size: 13px;
            }

            
            #containerd .pagination ul li{
                list-style: none;
                float: left;
                border: 1px solid #006699;
                padding: 2px 6px 2px 6px;
                font-family: arial;
                font-size: 14px;
                color: #006699;
                font-weight: bold;
                background-color: #f2f2f2;
            }
            #containerd .pagination ul li:hover{
                color: #fff;
                background-color: #006699;
                cursor: pointer;
            }
			.go_button
			{
			background-color:#f2f2f2;border:1px solid #006699;color:#cc0000;padding:2px 6px 2px 6px;cursor:pointer;position:absolute;margin-top:-1px;
			}
			.total
			{
			float:right;font-family:arial;color:#999; line-height:19px;
			}
			.editbox
			{
			display:none;
			
			}
			
			.editbox
			{
			padding:4px;
			
			}
			
			*/
        </style>


<div id="loading"></div>  
<div class="block-border" >
	<div class="block-header">
		<h1><?=$lang->get('chuanBiDe', 'in', 'trang', 'heThong')?></h1><span></span>
	</div>
	<div style="margin:5px -3px" class="block-actions">
        <ul class="actions-left">
        	<li  style="margin-top:5px; padding:0 1px" ><a class="button  thickbox" id="reset-validate-form" href="../../views/addrow.php?height=180&amp;width=410"><?=$lang->get('them')?></a></li>
        	<li  style="margin-top:5px;padding:0 1px" ><a class="button " id="edit-button" href="javascript:show_edit();" rel=""><?=$lang->get('chinhSua')?></a></li>
        	<form  style="float:left" action="../../views/models/addDB.php" method="post" enctype="multipart/form-data">       
        		<li style="padding:0 1px"><input style="margin-top:5px" type="button" name="submit" class="button" value="<?=$lang->get('in', 'trang')?>" onClick="printContent('txtHint')" /></li>
        		<li style="padding:0 1px"><input style="margin-top:5px" type="button" id="clickExcel" name="submit" class="button" value="<?=$lang->get('xuat')?>"  /></li>
        	</form>
        <li  style="margin-top:5px;padding:0 1px" ><a class="button "  href="../../views/index.php?options=upload" rel=""><?=$lang->get('tailen')?></a></li>
        </ul>
   	</div>
		<div id = "txtHint">
            <div id = "example22">
                <div id="containerd"> 
                
                 </div>
              
        </div>
	</div>
    <div style="margin:5px -3px" class="block-actions">
          <ul class="actions-left">
								<li  style="margin-top:5px; padding:0 1px" ><a class="button  thickbox" id="reset-validate-form" href="../../views/addrow.php?height=180&amp;width=410"><?=$lang->get('them')?></a></li>
								<li  style="margin-top:5px;padding:0 1px" ><a class="button " id="edit-button" href="javascript:show_edit();" rel=""><?=$lang->get('chinhSua')?></a></li>
							    <form  style="float:left" action="../../views/models/addDB.php" method="post" enctype="multipart/form-data">

   
<li style="padding:0 1px"><input style="margin-top:5px" type="button" name="submit" class="button" value="<?=$lang->get('in', 'trang')?>" onClick="printContent('txtHint')" /></li>
            	<li style="padding:0 1px"><input style="margin-top:5px" type="button" id="clickExcel" name="submit" class="button" value="<?=$lang->get('xuat')?>"  /></li>
</form>
								<li  style="margin-top:5px;padding:0 1px" ><a class="button "  href="../../views/index.php?options=upload" rel=""><?=$lang->get('tailen')?></a></li>

                            </ul>
      
            
	</div>
</div>

   
<script type="text/javascript">
function show_edit(){
	var id = $("#edit-button").attr('rel');
	var url = 'editrow.php?id='+id+'&height=300&width=520';
	tb_show('Edit',url);
}

$("#clickExcel").click(function(){      
var example22 = $('#example22').html();
window.open('data:application/vnd.ms-excel,' + encodeURIComponent($('#example22').html()));
});
</script>
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
