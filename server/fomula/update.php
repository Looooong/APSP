<?php
if ($id = $_REQUEST['id']) {
	$query = "";
		
	if ($material = (isset($_REQUEST['material'])) ? $_REQUEST['material'] : 0) {
		$cluster = "(";
		foreach ($material as $name=>$value) {
			$query .= "IF (NOT EXISTS(SELECT ratio FROM fomula WHERE goodID = ".$id." AND materialID = ".$name."))
						BEGIN
							INSERT INTO fomula(goodID, materialID, ratio)
							VALUES(".$id.", ".$name.", ".$value.");
						END
					ELSE
						BEGIN
							UPDATE fomula
							SET ratio = ".$value."
							WHERE goodID = ".$id." AND materialID = ".$name."
						END;
						";
			$cluster .= " ".$name.",";
		};
		$cluster = rtrim($cluster, ",").")";
		$query .= "DELETE fomula
					WHERE goodID = ".$id. " AND materialID NOT IN ".$cluster.";
					";
	} else
		$query .= "DELETE fomula
					WHERE goodID = ".$id.";
					";
		
	if ($package = (isset($_REQUEST['package'])) ? $_REQUEST['package'] : 0) {		
		$cluster = "(";
		foreach ($package as $name=>$value) {
			$query .= "IF (NOT EXISTS(SELECT quantity FROM fomula_pack WHERE goodID = ".$id." AND packID = ".$name."))
						BEGIN
							INSERT INTO fomula_pack(goodID, packID, quantity)
							VALUES(".$id.", ".$name.", ".$value.");
						END
					ELSE
						BEGIN
							UPDATE fomula_pack
							SET quantity = ".$value."
							WHERE goodID = ".$id." AND packID = ".$name."
						END;
						";
			$cluster .= " ".$name.",";
		};
		$cluster = rtrim($cluster, ",").")";
		$query .= "DELETE fomula_pack
					WHERE goodID = ".$id. " AND packID NOT IN ".$cluster.";
					";
	} else
		$query .= "DELETE fomula_pack
					WHERE goodID = ".$id.";
					";
	
	$db->querySQL($query);
	echo $query;
};
?>