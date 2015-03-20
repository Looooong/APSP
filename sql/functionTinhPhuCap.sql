CREATE FUNCTION tinhPhuCap(@id INT)
RETURNS INT
AS
BEGIN
	DECLARE @result INT = (SELECT SUM(tien) FROM phuCap WHERE adID = @id);
	IF @result IS NULL
		SET @result = 0;
		
	RETURN @result;
END;