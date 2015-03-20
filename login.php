<script type="text/javascript">
 //  function changeStyle(url) {
 // document.getElementById('stylesheet').href = url;
  // }
</script>
 <?php include "loader.php";?>
<style>
.slideTogglebox { display:none}
.dn_login {  color:#FFF; text-shadow:none}
</style>
  
<div class="wrapper">
    <div style="height:50px"></div>
<div style="position:relative" class="login fl">
        	<h2 class="dn_login">đăng nhập</h2>    <button  style=" position:absolute; top: 142px;
left: 237px;" id=slideToggle>Tùy Chọn</button>  <a class="fr"   href="#"  ><img   title="Tiếng Việt" alt="" border="0" src="scr/img/bg/vi.png" /></a>
                    <a  class="fr" href="#"><img  title="English" alt="" border="0"src="scr/img/bg/en.jpg" /></a>

			<p class="div_dn">Mật Khẩu</p>
            	<form action = "" method = "post" />
            <p class="div_title_pa">
            	<span style="line-height:20px; width:90px" class="div_title fl">tên dang nhap</span><span class="fl"><input  style="width:150px; margin-left:10px"class="input_dn" name="username" type="text" value = "" /></span>
            </p>     
            <p class="div_title_pa">
            	<span style="line-height:20px; width:90px " class="div_title fl">Mật Khẩu</span><span class="fl"><input style="width:150px; margin-left:10px" class="input_dn" name="pword" type="password" value = "" /></span>
            </p>
            <div style=" clear:both"></div>
            <p class="div_title_pa"><span class="div_title">Kết Nối</span></p>
            <div class="slideTogglebox" style=" background:rgba(153, 153, 153, 0.46); border-radius:10px; padding:10px">
                     <p class="div_title_pa">
                            <span class="div_title fl">máy chu</span>
                            <input class="port_dn" name="svname" type="text" value = ""  />
                       </p>
                       <p class="div_title_pa">
                                <span class="div_title fl">Cổng</span><input class="port_dn" name="portdb" type="text" value = "1433" />
                    </p>     
                    <p class="div_title_pa">
                        <span class="div_title fl">csdl:</span><input class="input_dn" name="dtbase" type="text" value = "" />
                    </p> 
               </div>
                  <p  style="text-align:center; margin:2px ">
                    <span><input style=" padding:5px 20px; width:100px" class="button_dn" type="submit" name = "submit" value="Đồng Ý" /></span> 
               </p> 
               <p class="div_title_pa">
                    <span class="div_title fl">luu mat khau:</span>
                    <span class="fl" style="width:20px; height:13px;"><input class="input_dn" name="remember" type="checkbox" value = "0" /></span>
                  
                    </p>	
                        </form>
 <!-- onClick="changeStyle('css/1.css');return false;"   onClick="changeStyle('css/2.css');return false;" -->
      </div>
        <script type="text/javascript">
			$("#slideToggle").click(function () {
		   $('.slideTogglebox').slideToggle();

		});
   </script>
   
	
    </div>