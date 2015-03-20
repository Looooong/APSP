<style>
.slideTogglebox { display:none}
.dn_login {  color:#FFF; text-shadow:none; margin-bottom:5px; margin-top:5px}
.loader {width:200px}
.image:hover {-webkit-transform: rotate(270deg);
-moz-transform: rotate(270deg);
-o-transform: rotate(270deg);
writing-mode: tb-rl;}
</style>
<script language="javascript" type="text/javascript">
	function login() {
		call = ('login.php');
		username = document.getElementById('username').value.replace(/\|\+|\-|\'|\"|\%|\*|\?/g,"");
		password = document.getElementById('password').value.replace(/\|\+|\-|\'|\"|\%|\*|\?/g,"");
		remember = document.getElementById('remember').checked;
		svname = document.getElementById('svname').value;
		portdb = document.getElementById('portdb').value;
		dtbase = document.getElementById('dtbase').value;
		lang = '<?=$lang->lang?>';
		
		var data = {
			"callAjax": call,
			"username": username,
			"password": password,
			"remember": remember,
			"svname": svname,
			"portdb": portdb,
			"dtbase": dtbase,
			"lang": lang
		};
		
		ajax("server/server.php", "loader", loaderLoginBlue, data, false);
	};
</script>

<div class="<?=($lang->lang == 'vi') ? vi : en?>">
	<div style="height:50px"></div>
	
    <div style="position:relative" class="login fl">
		<h2 class="dn_login"><?=$lang->get('khoangTrang')?><?=$lang->get('dangNhap')?></h2>    
		<div style=" position:absolute; top: 150px;left:7px; padding:10px">
		<span style="line-height:20px; width:102px" class="div_title fl"><?=$lang->get('tuyChon')?>:</span><input  type="checkbox"  id=slideToggle>
        </div>

		<div style=" position:absolute;left: 20px; height:20px; overflow:hidden; width:205px" id="loader"></div>

		<p>  <a class="fr" href="index.php?lang=vi"><img class="image" title="Tiếng Việt" alt="Tiếng Việt" border="0" src="src/img/bg/vi.png" /></a>
		<a class="fr" href="index.php?lang=en"><img class="image" style="margin-right:5px" title="English" alt="English" border="0"src="src/img/bg/en.jpg" /></a></p>

		<div style=" clear:both"></div>

		<form action = "javascript: void(0)" method = "post" />
			<p class="div_title_pa">
               	<span style="line-height:20px; width:90px" class="div_title fl"><?=$lang->get('tenDangNhap')?>:</span>
				<span class="fl"><input onfocus="this.value = getCookie('username')" id="username" style="width:160px; margin-left:10px"class="input_dn" name="username" type="text" /></span>
			</p>     

			<p class="div_title_pa">
				<span style="line-height:20px; width:90px " class="div_title fl"><?=$lang->get('matKhau')?>:</span>
				<span class="fl"><input id="password" style="width:160px; margin-left:10px" class="input_dn" name="pword" type="password" value = "<?php if(isset($_COOKIE['password'])) echo $_COOKIE['password']; ?>" /></span>
			</p>

			<p class="div_title_pa">
				<span style="line-height:20px; width:90px "  class="div_title fl"><?=$lang->get('luuMatKhau')?>:</span>
				<span class="fl" style="width:20px; height:13px; margin-left:8px"><input id="remember" class="input_dn" name="remember" type="checkbox" value = "1" <?= ($_COOKIE['rememberLogin']) ? 'checked="checked"' : ''?>/></span>
			</p>	

			<div style=" clear:both"></div>

			<p  style="text-align:center; margin:2px ">
				<span><input style=" padding:5px 20px; width:100px" class="button_dn" type="submit" name="submit" value="<?=$lang->get('dangNhap')?>" onclick="login()" /></span>
				<span><input style=" padding:5px 20px; width:100px" class="button_dn" type="reset" name = "submit" value="<?=$lang->get('thoat')?>" /></span> 
			</p>

			<div style=" border-top:1px solid #CCC; height:22px; clear:both"></div>

			<div class="slideTogglebox" style=" background:rgba(153, 153, 153, 0.46); border-radius:10px; padding:10px">
				<p class="div_title_pa">
					<span class="div_title fl"><?=$lang->get('mayChu')?>:</span>
					<input id="svname" class="port_dn" name="svname" type="text" value = "<?php if(isset($_COOKIE['svnamemain'])) echo $_COOKIE['svnamemain']; ?>"  />
				</p>

				<p class="div_title_pa">
					<span class="div_title fl"><?=$lang->get('cong')?></span>
					<input id="portdb" class="port_dn" name="portdb" type="text" value = "1433" />
				</p>     

				<p class="div_title_pa">
					<span class="div_title fl"><?=$lang->get('cSDL')?>:</span>
					<input id="dtbase" class="input_dn" name="dtbase" type="text" value = "<?php if(isset($_COOKIE['dtbasemain'])) echo $_COOKIE['dtbasemain']; ?>" />
				</p> 
			</div>
		</form>
    <!-- onClick="changeStyle('css/1.css');return false;"   onClick="changeStyle('css/2.css');return false;" -->
	</div>
    <script type="text/javascript">
   		$("#slideToggle").click(function () {
    		$('.slideTogglebox').slideToggle();
    	});
		document.getElementById("username").focus();
    </script>
</div>