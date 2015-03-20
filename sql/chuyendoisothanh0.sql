CREATE FUNCTION noNegative(@num INT)
RETURNS INT
AS
BEGIN
	DECLARE @result INT;
	IF @num < 0
		SET @result = 0
	ELSE
		SET @result = @num;
	
	RETURN @result;
END