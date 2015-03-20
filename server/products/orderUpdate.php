<?php
	if ($_REQUEST['method'] === 'create') {
		$query = "SET DATEFORMAT DMY;
					DECLARE @orderID INT;
					DECLARE @table table (ID INT);
					
					INSERT INTO productOrder(goodsID, date, start, finish, status, sample, quantity)
					OUTPUT inserted.ID INTO @table
					VALUES (".$_REQUEST['productID'].", '".$_REQUEST['date']."', '".$_REQUEST['start']."', ".((empty($_REQUEST['finish'])) ? "NULL" : "'".$_REQUEST['finish']."'").", ".$_REQUEST['status'].", ".$_REQUEST['sample'].", 1);
					
					SELECT @orderID = ID FROM @table;
					";
					
		foreach ($_REQUEST['fomulaMaterials'] as $data) {
			$query .= "INSERT INTO productOrderDetail(orderID, materialID, kg, incur)
						VALUES(@orderID, ".$data['ID'].", ".$data['kg'].", 0);
						";
		};
		
		foreach ($_REQUEST['fomulaPackages'] as $data) {
			$query .= "INSERT INTO productOrderDetailPack(orderID, packID, quantity, incur)
						VALUES(@orderID, ".$data['ID'].", ".$data['quantity'].", 0);
						";
		};
	};
	
	if ($_REQUEST['method'] === 'update') {
		$query = "DECLARE @orderID INT = ".$_REQUEST['orderID'].";
					";
	};
	
	if (isset($_REQUEST['incurMaterials']))
		foreach ($_REQUEST['incurMaterials'] as $data) {
			$query .= "IF (NOT EXISTS (SELECT * FROM productOrderDetail WHERE orderID = @orderID AND materialID = ".$data['ID']." AND incur = 1))
						BEGIN
							INSERT INTO productOrderDetail(orderID, materialID, kg, incur)
							VALUES(@orderID, ".$data['ID'].", ".$data['kg'].", 1);
						END
						ELSE
						BEGIN
							UPDATE productOrderDetail
							SET kg = ".$data['kg']."
							WHERE orderID = @orderID AND materialID = ".$data['ID']." AND incur = 1;
						END;
						";
		};
	
	if (isset($_REQUEST['incurPackages']))
		foreach ($_REQUEST['incurPackages'] as $data) {
			$query .= "IF (NOT EXISTS (SELECT * FROM productOrderDetailPack WHERE orderID = @orderID AND packID = ".$data['ID']." AND incur = 1))
						BEGIN
							INSERT INTO productOrderDetailPack(orderID, packID, quantity, incur)
							VALUES(@orderID, ".$data['ID'].", ".$data['quantity'].", 1);
						END
						ELSE
						BEGIN
							UPDATE productOrderDetailPack
							SET quantity = ".$data['quantity']."
							WHERE orderID = @orderID AND packID = ".$data['ID']." AND incur = 1;
						END;
						";
		};
	
	echo $query;
?>