<!-- Begin of #container -->
	<div id="container">	
        <!-- Begin of #header -->
		<!-- Begin of Sidebar -->
		<aside id="sidebar" >
            <!-- Search -->
            <!-- Begin of #login-details -->
			<section id="login-details">
				<a href="index.php"><img style="width:220px" class="img-left framed" src="src/img/bg/logo.png" alt=""></a>
                <div class="clearfix"></div>
			</section> 
			<!-- Begin of Navigation -->
			<nav id="nav">
            <?php include "views/menu.php"?>
			</nav> <!--! end of #nav -->
		</aside> <!--! end of #sidebar -->
		<!-- Begin of #main -->

		<div id="main" role="main">
            <!-- Begin of titlebar/breadcrumbs -->
           <div class="clear"></div>

			<div id="title-bar">
				<ul id="breadcrumbs">
					<li><a href="index.php" title="Home"><span id="bc-home"></span></a></li>

                    <li class="no-hover"><?=$lang->get('bangDieuKhien')?></li>
				</ul>
                
                
                <div id="user-info">
				<p style="margin:0px 5px;">
					<span class="messages"><a   style="color:#000; font-weight:bold; text-decoration:none" href="javascript:void(0);"><?=$_SESSION['user']['name']?></a></span>
					<a href="index.php?options=logout" class="button red"><?=$lang->get('dangXuat')?></a>
				</p>
			</div> <!--! end of #user-info --> 
            
			<div id="user-info">
				<p style="margin:0px 5px;">
                	<?php
						$request_uri = $_SERVER['REQUEST_URI'];
                    	$langRequest = array('&lang=en', '&lang=vi', '?lang=en', '?lang=vi');
						$request_uri = str_replace($langRequest,'',$request_uri);
						$alternative = (strstr($request_uri,'?')) ? $alternative = '&' : $alternative = '?';
					?>
					<a href="<?=$request_uri.$alternative.'lang=vi'?>"><img style="margin-top:5px" title="Tiếng Việt" src="src/img/bg/vi.png" alt="" border="0" /></a>
					<a href="<?=$request_uri.$alternative.'lang=en'?>"><img style="margin-top:5px" title="English" src="src/img/bg/en.jpg" alt="" border="0" /></a>
				</p>
			</div> <!--! end of #user-info -->  
			</div> <!--! end of #title-bar -->
			<div class="shadow-bottom shadow-titlebar"></div>
			<!-- Begin of #main-content -->
			<div id="main-content">
            	<!--<pre>
					<div id="debug">
					</div>
                </pre>-->
          		<div class="container_12">
                <?php
					if($_SESSION['user']['name'] == 'ADMIN'){
                     include "views/bangdieukhien.php";
					 }
						echo '<div style="text-align:center; margin-top:10px" id="response">';
	 					if (isset($_GET['options'])) require_once "controllers/maincontrol.php";
					echo '</div>';
					//include "html/html.php";
				//include "server/salary/salarytest.php";
				//include "server/Baocao/lenhsanxuat.php";
//include "views/insurance.php"
					//include "server/Storage/Storage.php";
				?>
				</div>
                <pre>
                	<div id="debug">
                	</div>
                </pre>
                <div style="display:none" id="exportData"></div>
       		</div> <!--! end of #main-content -->
		</div> <!--! end of #main -->
	</div> <!--! end of #container -->
<script type="text/javascript">
	$().ready(function() {
		/*
		 * Form Validation
		 
		$.validator.setDefaults({
			submitHandler: function(e) {
				$.jGrowl("Form was successfully submitted.", { theme: 'success' });
				$(e).parent().parent().fadeOut();
				v.resetForm();
				v2.resetForm();
				v3.resetForm();
			}
		});
		var v = $("#create-user-form").validate();
		jQuery("#reset").click(function() { v.resetForm(); $.jGrowl("User was not created!", { theme: 'error' }); });
		
		var v2 = $("#write-message-form").validate();
		jQuery("#reset2").click(function() { v2.resetForm(); $.jGrowl("Message was not sent.", { theme: 'error' }); });
		
		var v3 = $("#create-folder-form").validate();
		jQuery("#reset3").click(function() { v3.resetForm(); $.jGrowl("Folder was not created!", { theme: 'error' }); });
		
		var validateform = $("#validate-form").validate();
		$("#reset-validate-form").click(function() {
			validateform.resetForm();
			$.jGrowl("You resetted the form.", { theme: 'error' });
		});*/
		
		$( "#datepicker" ).datepicker();
				$( "#datepicker1" ).datepicker();
				$( "#datepicker2" ).datepicker();
				$( "#datepicker3" ).datepicker();
				$( "#datepicker4" ).datepicker();
				$( "#datepicker5" ).datepicker();
				$( "#datepicker6" ).datepicker();
				$( "#datepicker7" ).datepicker();
				$( "#datepicker8" ).datepicker();
				$( "#datepicker9" ).datepicker();		
				$( "#datepicker10").datepicker();	
	});
  </script>
                                                  