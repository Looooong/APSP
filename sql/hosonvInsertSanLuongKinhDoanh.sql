CREATE TRIGGER hosonvInsertSanLuongKinhDoanh ON hosonv
AFTER INSERT
AS
BEGIN
	IF (SELECT nhomID FROM inserted) = 3
		INSERT INTO sanLuongKinhDoanh (adID)
		VALUES (@@IDENTITY);
END;