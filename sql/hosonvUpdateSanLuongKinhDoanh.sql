CREATE TRIGGER hosonvUpdateSanLuongKinhDoanh ON hosonv
AFTER UPDATE
AS
BEGIN
	IF ((SELECT nhomID FROM deleted) = 3) AND ((SELECT nhomID FROM deleted) != (SELECT nhomID FROM inserted))
		DELETE sanLuongKinhDoanh
		WHERE (SELECT adID FROM inserted) = sanLuongKinhDoanh.adID
	ELSE
	IF ((SELECT nhomID FROM deleted) != 3) AND ((SELECT nhomID FROM inserted) = 3)
		INSERT INTO sanLuongKinhDoanh (adID)
		SELECT adID FROM inserted;
END;