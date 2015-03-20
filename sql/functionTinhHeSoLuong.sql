CREATE FUNCTION tinhHeSoLuong(@id INT)
RETURNS FLOAT
AS
BEGIN
	RETURN (SELECT heSoLuong FROM hosonv, danghd WHERE adID = @id AND hosonv.dangID = danghd.dangID);
END;