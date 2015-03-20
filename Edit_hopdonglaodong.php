<?php
	require_once"classnv.php";
	$nv=new quanly();
	$query = "SELECT * FROM mauHopDong where hdID=1";
	$db->querySql($query);	
	$thuviec = $db->fetchToArray();
                                       	
	if (isset($_POST['btnOK'])==true) {
	$hdID = $$_POST['hdID'];
	$adID = $$_POST['adID'];
	$diaChi = $_POST['diaChi'];		
	$thongTin = $_POST['thongTin'];		
	$tieuDe = $_POST['tieuDe'];		
	$noiDung = $_POST['noiDung'];		
	settype($hdID,"int");
	settype($adID,"int");	


	$sql="	UPDATE mauHopDong 
			SET diaChi=N'$diaChi', thongTin=N'$thongTin', tieuDe=N'$tieuDe', noiDung=N'$noiDung'
			WHERE hdID=1 ";
	$db->querySql($sql);
	header("location:index.php?options=bCLuongBP&name=");
	}
?>
<script type="text/javascript" src="js/jquery.js"></script> 
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="ckfinder/ckfinder.js"></script>
<script type="text/javascript">
function BrowseServer( startupPath, functionData ){
	var finder = new CKFinder();
	finder.basePath = 'ckfinder/'; //Đường path nơi đặt ckfinder
	finder.startupPath = startupPath; //Đường path hiện sẵn cho user chọn file
	finder.selectActionFunction = SetFileField; // hàm sẽ được gọi khi 1 file được chọn
	finder.selectActionData = functionData; //id của text field cần hiện địa chỉ hình
	finder.selectThumbnailActionFunction = ShowThumbnails; //hàm sẽ được gọi khi 1 file thumnail được chọn	
	finder.popup(); // Bật cửa sổ CKFinder
} //BrowseServer

function SetFileField( fileUrl, data ){
	document.getElementById( data["selectActionData"] ).value = fileUrl;
}
function ShowThumbnails( fileUrl, data ){	
	var sFileName = this.getSelectedFile().name; // this = CKFinderAPI
	document.getElementById( 'thumbnails' ).innerHTML +=
	'<div class="thumb">' +
	'<img src="' + fileUrl + '" />' +
	'<div class="caption">' +
	'<a href="' + data["fileUrl"] + '" target="_blank">' + sFileName + '</a> (' + data["fileSize"] + 'KB)' +
	'</div>' +
	'</div>';
	document.getElementById( 'preview' ).style.display = "";
	return false; // nếu là true thì ckfinder sẽ tự đóng lại khi 1 file thumnail được chọn
}
</script>

<?php foreach ($thuviec as $value){ ?>
	<div class="block-border">
					<div class="block-header">
						<h1>Form-Chỉnh</h1><span></span>
					</div>
                    <?php ob_start();?>

					<form id="validate-form formNewsDetail" class="block-content form" name="formNewsDetail" method="post" action="" enctype="multipart/form-data" >
					
						<div class="_100">
							<p><label for="diaChi">Địa Chỉ:</label>
                            <div style=" clear:both"></div>
                            <textarea id="diaChi" name="diaChi" class="required" rows="5" cols="40">{diaChi}</textarea>
                            	<script type="text/javascript">
									var editor = CKEDITOR.replace( 'diaChi',{
										uiColor : '#9AB8F3',
										language:'vi',
										skin:'office2003',
										filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?Type=Images',
										filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?Type=Flash',
										filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
										filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
										toolbar:[
										['Source','-','Templates'],
										['Styles','Format','Font','FontSize'],
										['Undo','Redo'],
										
										['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
										
										['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
										['TextColor','BGColor'],
										['Table','HorizontalRule',]
										
										
										
										]
									});		
								</script>
                            <script>		  		  	
							setTimeout("HienDuLieu()", 1000);	//delay biến {content} 1s Để trình duyệt kịp sắp xếp dữ liệu	
							function HienDuLieu(){
								var str= "{diaChi}";			
								var oEditor = CKEDITOR.instances.Content;			
								oEditor.setData( str);				
							}
							</script>
                            </p>
						</div>
						<div class="_100">
							<p><label for="thongTin">Thông Tin:</label>
                            <div style=" clear:both"></div>

                            <textarea id="thongTin" name="thongTin" class="required" rows="5" cols="40">{thongTin}</textarea>
                               <script type="text/javascript">
									var editor = CKEDITOR.replace( 'thongTin',{
										uiColor : '#9AB8F3',
										language:'vi',
										skin:'office2003',
										filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?Type=Images',
										filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?Type=Flash',
										filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
										filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
										toolbar:[
										['Source','-','Templates'],
										['Styles','Format','Font','FontSize'],
										['Undo','Redo'],
										
										['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
										
										['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
										['TextColor','BGColor'],
										['Table','HorizontalRule',],
										]
									});		
								</script>
                            <script>		  		  	
							setTimeout("HienDuLieu()", 1000);	//delay biến {content} 1s Để trình duyệt kịp sắp xếp dữ liệu	
							function HienDuLieu(){
								var str= "{thongTin}";			
								var oEditor = CKEDITOR.instances.Content;			
								oEditor.setData( str);				
							}
							</script>
                            
                            </p>
						</div>
						<div class="_100">
							<p><label for="tieuDe">Tiêu Đề:</label>
                                                        <div style=" clear:both"></div>

                            <textarea id="tieuDe" name="tieuDe" class="required" rows="5" cols="40">{tieuDe}</textarea>
                            	<script type="text/javascript">
									var editor = CKEDITOR.replace( 'tieuDe',{
										uiColor : '#9AB8F3',
										language:'vi',
										skin:'office2003',
										filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?Type=Images',
										filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?Type=Flash',
										filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
										filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
										toolbar:[
										['Source','-','Templates'],
										['Styles','Format','Font','FontSize'],
										['Undo','Redo'],
										
										['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
										
										['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
										['TextColor','BGColor'],
										['Table','HorizontalRule',],
										]
									});		
								</script>
                            <script>		  		  	
							setTimeout("HienDuLieu()", 1000);	//delay biến {content} 1s Để trình duyệt kịp sắp xếp dữ liệu	
							function HienDuLieu(){
								var str= "{tieuDe}";			
								var oEditor = CKEDITOR.instances.Content;			
								oEditor.setData( str);				
							}
							</script>
                            
                            </p>
						</div>
						<div class="_100">
							<p><label for="textarea">Chi Tiết:</label>
                                                        <div style=" clear:both"></div>

                            <textarea id="noiDung" name="noiDung" class="required txt" rows="5" cols="40">{noiDung}</textarea>
                            	<script type="text/javascript">
									var editor = CKEDITOR.replace( 'noiDung',{
										uiColor : '#9AB8F3',
										language:'vi',
										skin:'office2003',
										filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?Type=Images',
										filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?Type=Flash',
										filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
										filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
										toolbar:[
										['Source','-','Templates'],
										['Styles','Format','Font','FontSize'],
										['Undo','Redo'],
										
										['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
										
										['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
										['TextColor','BGColor'],
										['Table','HorizontalRule',],
										]
									});		
								</script>
                            <script>		  		  	
							setTimeout("HienDuLieu()", 1000);	//delay biến {content} 1s Để trình duyệt kịp sắp xếp dữ liệu	
							function HienDuLieu(){
								var str= "{noiDung}";			
								var oEditor = CKEDITOR.instances.Content;			
								oEditor.setData( str);				
							}
							</script>
                            
                            </p>
						</div>
						<div class="clear"></div>
						<div class="block-actions">
							<ul class="actions-left">
								<li><input type="reset"name="btnXoa" id="btnXoa" class="button red" value="Xóa"></li>
							</ul>
							<ul class="actions-right">
								<li><input type="submit" name="btnOK" id="btnOK" class="button" value="OK!!!"></li>
                                
							</ul>
                           
                            
                            
						</div>
					</form>
 
				</div>
                <br /></br><br /><br />
			
          
         <?php }?>
	<?php
		$str=ob_get_clean(); 
		$str = str_replace("{diaChi}" , $value['diaChi'],$str);
		$str = str_replace("{thongTin}" , $value['thongTin'],$str);
		$str = str_replace("{tieuDe}" , $value['tieuDe'],$str);
		$str = str_replace("{noiDung}" , $value['noiDung'],$str);
		echo $str;
	?>
