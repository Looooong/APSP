CREATE TRIGGER hosonvDeleteSanLuongKinhDoanh ON hosonv
AFTER DELETE
AS
BEGIN
	IF (SELECT nhomID FROM deleted) = 3
		DELETE sanLuongKinhDoanh
		WHERE (SELECT adID FROM deleted) = adID;
END;