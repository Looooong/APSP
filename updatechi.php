<?php
if(isset($_POST['uptl'])){
if(!$_POST['chi']){
echo '<script type = "text/javascript">alert("Chưa nhập số tiền!!!")</script>';
echo '<script type = "text/javascript">window.location.reload();</script>';
}
		$chi = $_POST['chi'];
		$mabp = $_POST['mabp'];
		$macv = $_POST['macv'];
		
		if($_POST['ldthuong'] == 1 && ($mabp == 0 OR $macv == 0)){	
		$query = "UPDATE hosonv SET chidot1 = '$chi'";
		$db->querySql($query);
		}
		if($_POST['ldthuong'] == 2 && ($mabp == 0 OR $macv == 0)){
		$query = "UPDATE hosonv SET chidot2 = '$chi'";
		$db->querySql($query);
		}	
		if($_POST['ldthuong'] == 3 && ($mabp == 0 OR $macv == 0)){
		$query = "UPDATE hosonv SET chidot3 = '$chi'";
		$db->querySql($query);
		}
		if($_POST['ldthuong'] == 4 && ($mabp == 0 OR $macv == 0)){
		$query = "UPDATE hosonv SET chidot4 = '$chi'";
		$db->querySql($query);
		}
		if($_POST['ldthuong'] == 5 && ($mabp == 0 OR $macv == 0)){
		$query = "UPDATE hosonv SET chidot5 = '$chi'";
		$db->querySql($query);
		}
		if($_POST['ldthuong'] == 1 && $mabp != 0 && $macv == 0){
		$query = "UPDATE hosonv SET chidot1 = '$chi' WHERE bophanID = '$mabp'";
		$db->querySql($query);
		}
		if($_POST['ldthuong'] == 2 && $mabp != 0 && $macv == 0){
		$query = "UPDATE hosonv SET chidot2 = '$chi' WHERE bophanID = '$mabp'";
		$db->querySql($query);
		}
		if($_POST['ldthuong'] == 3 && $mabp != 0 && $macv == 0){
		$query = "UPDATE hosonv SET chidot3 = '$chi' WHERE bophanID = '$mabp'";
		$db->querySql($query);
		}
		if($_POST['ldthuong'] == 4 && $mabp != 0 && $macv == 0) {
		$query = "UPDATE hosonv SET chidot4 = '$chi' WHERE bophanID = '$mabp'";
		$db->querySql($query);
		}
		if($_POST['ldthuong'] == 5 && $mabp != 0 && $macv == 0) {
		$query = "UPDATE hosonv SET chidot5 = '$chi' WHERE bophanID = '$mabp'";
		$db->querySql($query);
		}
		if($_POST['ldthuong'] == 1 && $macv != 0 && $mabp == 0){
		$query = "UPDATE hosonv SET chidot1 = '$chi' WHERE cvID = '$macv'";
		$db->querySql($query);
		}
		if($_POST['ldthuong'] == 2 && $macv != 0 && $mabp == 0){
		$query = "UPDATE hosonv SET chidot2 = '$chi' WHERE cvID = '$macv'";
		$db->querySql($query);
		}
		if($_POST['ldthuong'] == 3 && $macv != 0 && $mabp == 0){
		$query = "UPDATE hosonv SET chidot3 = '$chi' WHERE cvID = '$macv'";
		$db->querySql($query);
		}
		if($_POST['ldthuong'] == 4 && $macv != 0 && $mabp == 0) {
		$query = "UPDATE hosonv SET chidot4 = '$chi' WHERE cvID = '$macv'";
		$db->querySql($query);
		}
		if($_POST['ldthuong'] == 5 && $macv != 0 && $mabp == 0) {
		$query = "UPDATE hosonv SET chidot5 = '$chi' WHERE cvID = '$macv'";
		$db->querySql($query);
		}
		if($_POST['ldthuong'] == 1 && $macv != 0 && $mabp != 0) {
		$query = "UPDATE hosonv SET chidot1 = '$chi' WHERE cvID = '$macv' AND bophanID = '$mabp'";
		$db->querySql($query);
		}
		if($_POST['ldthuong'] == 2 && $macv != 0 && $mabp != 0) {
		$query = "UPDATE hosonv SET chidot2 = '$chi' WHERE cvID = '$macv' AND bophanID = '$mabp'";
		$db->querySql($query);
		}
		if($_POST['ldthuong'] == 3 && $macv != 0 && $mabp != 0) {
		$query = "UPDATE hosonv SET chidot3 = '$chi' WHERE cvID = '$macv' AND bophanID = '$mabp'";
		$db->querySql($query);
		}
		if($_POST['ldthuong'] == 4 && $macv != 0 && $mabp != 0) {
		$query = "UPDATE hosonv SET chidot4 = '$chi' WHERE cvID = '$macv' AND bophanID = '$mabp'";
		$db->querySql($query);
		}
		if($_POST['ldthuong'] == 5 && $macv != 0 && $mabp != 0) {
		$query = "UPDATE hosonv SET chidot5 = '$chi' WHERE cvID = '$macv' AND bophanID = '$mabp'";
		$db->querySql($query);
		}
	}

$query = "SELECT * FROM bophan";
$db->querySql($query);
$arr_bp = $db->fetchToArray();

$query = "SELECT * FROM congty";
$db->querySql($query);
$arr_cv = $db->fetchToArray();
?>
            <form action = "" method = "POST">

	<div class="block-border">
        <div class="block-header">
        	<h1>Cập Nhật Chi</h1>
        
        </div>
        <div class="block-content">
            <table class="table">
                <tr>
                    <td>
                        <h5>Mã Bộ Phận : </h5>
                    </td>
                    <td>
                        <p><select style = "width:200px" name = "mabp">
                        <option value = "0">Tất cả các bộ phận</option>
                            <?php
                            foreach($arr_bp as $bp){
                            if($_POST['mabp'] == $bp['bophanID']) $selected = " selected";
                            else $selected = "";
                            echo "<option value = '".$bp['bophanID']."' ".$selected.">".$bp['tenBPVi']."</option>";
                            }
                            ?>
                        </select> </p>
                   </td>
            
                </tr>
                <tr>
                    <td>
                        <h5>Mã Chức Vụ : </h5>
                    </td>
                    <td>
                        <p><select style = "width:200px" name = "macv">
                        <option value = "0">Tất cả các chức vụ</option>
                            <?php
                            foreach($arr_cv as $cv){
                            
                            if($_POST['macv'] == $cv['cvID']) $selected = " selected";
                            else $selected = "";
                            echo "<option value = '".$cv['cvID']."' ".$selected.">".$cv['tenCVVi']."</option>";
                            }
                            ?>
                        </select> </p>
                   </td>
                </tr>
                <tr>
                    <td><h5>Số Lần Chi: </h5></td>
                    <td>
                        <p><select name = "ldthuong">
                            <option value = "1">Chi lần 2</option>
                            <option value = "2">Chi lần 3</option>
                            <option value = "3">Chi lần 4</option>
                            <option value = "4">Chi lần 5</option>
                            <option value = "5">Chi lần 6</option>
                        </select></p>
                    </td>
                </tr>
                <tr>
                    <td><h5>Nhập Chi : </h5></td>
                    <td><p><input style = "width:150px" type = "text" name = "chi" value = "" /></p></td>
                </tr>
            
               
            </table>
		</div>
            <div class="block-actions">
                <ul class="actions-left">
              	  <li><input class="button" type = "submit" name = "uptl" value = "Cập Nhập" onclick="return confirm('Bạn chắc chắn muốn thuốc hiện???');" /></li>		
                </ul>
            </div>
        </div>

            </form>
