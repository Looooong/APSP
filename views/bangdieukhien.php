<script language="javascript" type="text/javascript">
//------------------ Languages -------------------
	function callLanguages() {
		ajax("server/server.php", "response", loaderBig, {"callAjax": "languageEdit.php", "lang": "<?=$lang->lang?>"}, true, true);
	};

//------------------- User Setting ---------------
	function callUserSetting() {
		ajax("server/server.php", "response", loaderBig, {"callAjax": "userSetting.php", "lang": "<?=$lang->lang?>"}, true, true);
	};

//---------------------------------- System Edit --------------------------------
	function callSystemEdit() {
		ajax("server/server.php", "response", loaderBig, {"callAjax": "systemEdit.php", "lang": "<?=$lang->lang?>"}, true, true);
	};
//---------------------------uploadAdministrative-----------------------------------
	function upload() {
		ajax("server/server.php", "response", loaderBig, {"callAjax": "../models/upload.php", "lang": "<?=$lang->lang?>"}, true, true);
	};
</script>

<div class="block-border">
    <div class="block-content">
        <ul class="shortcut-list">
             <li>
                <a onclick="callUserSetting()">
                    <img src="src/img/bg/Service Manager.png">
                    <?=$lang->get("capQuyen")?>
                </a>
            </li>
            <li>
                <a onclick="callLanguages()">
                    <img src="src/img/bg/networksettings.png">
                    <?=$lang->get("ngonNgu")?>
                </a>
            </li>
               
             <li>
                <a onclick="callSystemEdit()">
                    <img src="src/img/bg/advancedsettings.png">
                    <?=$lang->get("heThong")?>
                </a>
            </li>  
           <!-- <li>
                <a onclick="upload()">
                    <img src="src/img/bg/advancedsettings.png">
                    <?//=$lang->get("upload")?>
                </a>
            </li>-->
            <img style="float:right; height:72px;" src="src/img/bg/apsp.png" />
                    </ul>
        <div class="clear"></div>
    </div>
</div>
        <div class="clear"></div>