<style>
.nhom1 { color:#0D3DFF ; font-weight:bold}
.nhom2 { color:rgb(6, 145, 0);font-weight:bold }
.nhom3 { color:#F00;font-weight:bold }
</style>
<?php
	if (isset($_REQUEST['database'])) {
		
		$database = $_REQUEST['database'];
		$month = explode("_", $database);
		$year = (isset($month[2])) ? $month[2] : date('y');
		$month = (isset($month[1])) ? $month[1] : date('m');
		
		$dayInMonth = ($month) ? date('t', mktime( 0, 0, 0, $month, 1, $year)) : date('t');
		
		$query = "SELECT value FROM ".$database.".dbo.CONSTANCES WHERE name = 'lock_timeKeeper'";
		$db->querySQL($query);
		$lock = $db->fetchArray();
		$lock = $lock['value'];
		
		$query = "SELECT ".$database.".dbo.timeKeeper.*, hoTen, tenCVVi, nhomID
					FROM ".$database.".dbo.timeKeeper, ".$database.".dbo.hosonv, ".$database.".dbo.congty
					WHERE ".$database.".dbo.congty.cvID = ".$database.".dbo.hosonv.cvID
						AND ".$database.".dbo.timeKeeper.adID = ".$database.".dbo.hosonv.adID
					ORDER BY nhomID, hosonv.adID";
		$db->querySQL($query);
		$timeTable = $db->fetchToArray();
		?>
	<table style="width:1200px" class="table">
		<thead>
			<tr>
				<th rowspan="2"></th>
				<th rowspan="2"><p>Họ Tên</p></th>
				<th rowspan="2"><p>Chức Vụ</p></th>
				<?php
					$j = ($database === 'APSP') ? date('d') : 0;

					for ($i = 1; $i <= $dayInMonth; $i++) {
						if ($j && $i == $j)
							echo "<th style=' text-align:center; background:#F00; '><p style='width:40px;color:#fff'>".$i."</p></th>";
						else
							echo "<th style=' text-align:center'><p style='width:40px;'>".$i."</p></th>";
					};
				?>
			</tr>
			<tr>
			<?php
				//for ($i = 0; $i < 3; $i++) {
				//	echo "<th></th>";
				//};
				for ($i = 1; $i <= $dayInMonth; $i++) {
					echo "<th style='width:40px; text-align:center' onclick='fillDay(\"$i\")'><p>".date('D', mktime(0, 0, 0, $month, $i, $year))."</p></th>";
				};
			?>
			</tr>
		</thead>
		<tbody id="timeKeeper">
		<?php
			foreach ($timeTable as $data) {
		?>
			<tr class='nhom<?=$data['nhomID']?>' style="border-bottom: 1px dashed #ccc; font-size:14px;" name="<?=$data['adID']?>">
				<td><p><?=$data['adID']?></p></td>
				<td><p style="width:120px;"><?=$data['hoTen']?></p></td>
				<td><p style="width:100px;"><?=$data['tenCVVi']?></p></td>
		<?php
			for ($i = 1; $i <= $dayInMonth; $i++) {
				echo "<td class='point_gread' style='text-align:center' name='".$i."|".$data["_".$i]."|0'"." onClick='changeStatus(this)'>";
					switch ($data["_".$i]) {
					case(-2):
						echo "P";//Vắng có phép
					break;
					case(-1):
						echo "V";//Vắng
					break;
					case(0):
						echo " ";//Trống
					break;
					case(1):
						echo "N";//Nửa buổi
					break;
					case(2):
						echo "C";//Có mặt
					break;
					case(3):
						echo "G";//Ngoài giờ
					break;
				};
				echo "</td>";
			};
		?>
			</tr>
			<?php
			};
			?>
		</tbody>
	</table>
    <input type="hidden" id="locker" value="<?=$lock?>" />
	<?php
	} else {
		if (!isset($_REQUEST['database'])) echo "No database set!<br/>";
	};
?>